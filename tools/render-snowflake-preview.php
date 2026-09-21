<?php
/** Render the Snowflake Native Apps WordPress template as standalone HTML. */

declare(strict_types=1);

$project_root = dirname(__DIR__);
$output_file  = $project_root . DIRECTORY_SEPARATOR . 'preview-snowflake-native-apps.html';

define('ABSPATH', $project_root . DIRECTORY_SEPARATOR);
define('INFOMETRY_CT_URL', '');

function preview_escape(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function esc_url(string $value): string { return preview_escape($value); }
function esc_html(string $value): string { return preview_escape($value); }
function esc_attr(string $value): string { return preview_escape($value); }
function home_url(string $path = '/'): string { return 'https://www.infometry.net/' . ltrim($path, '/'); }

function get_header(): void {
	echo <<<'HTML'
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Snowflake Native Apps | Infometry Preview</title>
	<link rel="stylesheet" href="assets/css/snowflake-native-apps.css?v=2.7.1">
	<style>
		.preview-site-header{display:flex;min-height:76px;padding:12px 5%;align-items:center;justify-content:space-between;background:#fff;font-family:Inter,Arial,sans-serif}
		.preview-site-header .brand{color:#08225f;font:800 22px Manrope,Arial,sans-serif;letter-spacing:-.04em}.preview-site-header nav{display:flex;align-items:center;gap:24px}.preview-site-header a{color:#0b2871;font-size:12px;font-weight:700;text-decoration:none}.preview-site-header .demo{padding:10px 18px;border-radius:6px;color:#fff;background:#087cf2}
		@media(max-width:820px){.preview-site-header nav{display:none}}
	</style>
</head>
<body class="infometry-snowflake-native-apps-page">
	<header class="preview-site-header"><a class="brand" href="https://www.infometry.net/">infometry</a><nav><a href="#isn-apps">Products</a><a href="#isn-process-title">Solutions</a><a href="https://www.infometry.net/resources/blog/">Resources</a><a href="https://www.infometry.net/company/">Company</a><a class="demo" href="https://www.infometry.net/contact-us/">Let's Talk</a></nav></header>
HTML;
}

function get_footer(): void {
	echo <<<'HTML'
<script src="assets/js/snowflake-native-apps.js?v=2.7.1"></script>
</body>
</html>
HTML;
}

ob_start();
require $project_root . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'page-snowflake-native-apps.php';
$html = ob_get_clean();

if (!is_string($html) || $html === '') { fwrite(STDERR, "The Snowflake preview rendered no output.\n"); exit(1); }
if (file_put_contents($output_file, $html . PHP_EOL) === false) { fwrite(STDERR, "Unable to write {$output_file}.\n"); exit(1); }

echo "Rendered {$output_file}\n";
