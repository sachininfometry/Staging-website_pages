param(
    [switch]$RegenerateInformaticaPreview,
    [switch]$RegenerateSnowflakePreview,
    [switch]$RegenerateAsanaFdpPreview
)

$ErrorActionPreference = 'Stop'
$projectRoot = Split-Path -Parent $PSScriptRoot
$failures = [System.Collections.Generic.List[string]]::new()

function Resolve-ProjectTool {
    param(
        [Parameter(Mandatory)] [string]$Name,
        [string[]]$Fallbacks = @()
    )

    $command = Get-Command $Name -ErrorAction SilentlyContinue
    if ($command) {
        return $command.Source
    }

    foreach ($fallback in $Fallbacks) {
        if ($fallback -and (Test-Path -LiteralPath $fallback)) {
            return $fallback
        }
    }

    throw "Required tool '$Name' was not found. Open a new terminal after installing it."
}

$node = Resolve-ProjectTool -Name 'node' -Fallbacks @('C:\Program Files\nodejs\node.exe')
$phpFallback = $null
if ($env:LOCALAPPDATA) {
    $phpFallback = Get-ChildItem "$env:LOCALAPPDATA\Microsoft\WinGet\Packages" -Recurse -Filter php.exe -File -ErrorAction SilentlyContinue |
        Where-Object { $_.FullName -match 'PHP\.PHP\.8\.4' } |
        Select-Object -First 1 -ExpandProperty FullName
}
$php = Resolve-ProjectTool -Name 'php' -Fallbacks @($phpFallback)

if ($RegenerateInformaticaPreview) {
    & $php (Join-Path $PSScriptRoot 'render-informatica-preview.php')
    if ($LASTEXITCODE -ne 0) {
        throw 'Informatica preview generation failed.'
    }
}

if ($RegenerateSnowflakePreview) {
    & $php (Join-Path $PSScriptRoot 'render-snowflake-preview.php')
    if ($LASTEXITCODE -ne 0) {
        throw 'Snowflake preview generation failed.'
    }
}

if ($RegenerateAsanaFdpPreview) {
    & $php (Join-Path $PSScriptRoot 'render-asana-fdp-preview.php')
    if ($LASTEXITCODE -ne 0) {
        throw 'Asana FDP preview generation failed.'
    }
}

$requiredFiles = @(
    'infometry-custom-templates.php',
    'templates/pages/home/home.php',
    'templates/products/infofiscus-conversa/infofiscus-conversa.php',
    'templates/products/informatica-connectors/informatica-connectors.php',
    'templates/products/google-cloud-connectors/google-cloud-connectors.php',
    'templates/products/google-drive-connector/google-drive-connector.php',
    'templates/products/snowflake-native-apps/snowflake-native-apps.php',
    'templates/case-studies/asana-fdp-snowflake-modernization/asana-fdp-snowflake-modernization.php',
    'templates/case-studies/insurance-snowflake-modernization/insurance-snowflake-modernization.php',
    'templates/case-studies/sunrun-enterprise-data-analytics/sunrun-enterprise-data-analytics.php',
    'assets/css/pages/home.css',
    'assets/js/home.js',
    'assets/css/products/infofiscus-conversa.css',
    'assets/js/infofiscus-conversa.js',
    'assets/css/products/informatica-connectors.css',
    'assets/js/informatica-connectors.js',
    'assets/css/case-studies/insurance-snowflake-modernization.css',
    'assets/images/case-studies/insurance-snowflake/hero-user-supplied.png',
    'assets/css/products/google-cloud-connectors.css',
    'assets/css/products/google-drive-connector.css',
    'assets/js/google-cloud-connectors.js',
    'assets/css/products/snowflake-native-apps.css',
    'assets/js/snowflake-native-apps.js',
    'assets/css/case-studies/asana-fdp-snowflake-modernization.css',
    'assets/css/case-studies/sunrun-enterprise-data-analytics.css',
    'assets/js/sunrun-enterprise-data-analytics.js',
    'assets/images/case-studies/asana-fdp-modernization.png',
    'assets/images/case-studies/asana-fdp-technologies.png',
    'preview-full.html',
    'preview-conversa.html',
    'preview-informatica.html',
    'preview-snowflake-native-apps.html',
    'preview-asana-fdp-case-study.html',
    'preview-insurance-snowflake-case-study.php',
    'preview-sunrise-case-study.php'
)

foreach ($relativePath in $requiredFiles) {
    if (-not (Test-Path -LiteralPath (Join-Path $projectRoot $relativePath))) {
        $failures.Add("Missing required file: $relativePath")
    }
}

Get-ChildItem $projectRoot -Recurse -Filter *.php -File |
    Where-Object { $_.FullName -notmatch '[\\/]\.git[\\/]' } |
    ForEach-Object {
        & $php -l $_.FullName | Out-Host
        if ($LASTEXITCODE -ne 0) {
            $failures.Add("PHP syntax failed: $($_.FullName)")
        }
    }

Get-ChildItem (Join-Path $projectRoot 'assets/js') -Filter *.js -File |
    ForEach-Object {
        & $node --check $_.FullName
        if ($LASTEXITCODE -ne 0) {
            $failures.Add("JavaScript syntax failed: $($_.FullName)")
        }
    }

$localReferencePattern = [regex]'(?:src|href)=["'']([^"''#?]+)'
Get-ChildItem $projectRoot -Filter 'preview*.html' -File | ForEach-Object {
    $preview = $_
    $content = Get-Content -Raw $preview.FullName
    foreach ($match in $localReferencePattern.Matches($content)) {
        $reference = $match.Groups[1].Value
        if ($reference -match '^(?:https?:|mailto:|tel:|javascript:|data:|//)') {
            continue
        }

        $target = Join-Path $preview.DirectoryName ($reference -replace '/', [IO.Path]::DirectorySeparatorChar)
        if (-not (Test-Path -LiteralPath $target)) {
            $failures.Add("Broken local reference in $($preview.Name): $reference")
        }
    }
}

if ($failures.Count -gt 0) {
    Write-Host "`nVerification failed:" -ForegroundColor Red
    $failures | Sort-Object -Unique | ForEach-Object { Write-Host " - $_" -ForegroundColor Red }
    exit 1
}

Write-Host "`nProject verification passed: 9 templates, PHP syntax, JavaScript syntax, and preview assets." -ForegroundColor Green
