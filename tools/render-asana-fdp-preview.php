<?php
/** Render the Asana FDP case-study WordPress template as standalone HTML. */

declare(strict_types=1);

$project_root = dirname(__DIR__);
$output_file  = $project_root . DIRECTORY_SEPARATOR . 'preview-asana-fdp-case-study.html';

define('ABSPATH', $project_root . DIRECTORY_SEPARATOR);
define('INFOMETRY_CT_URL', '');

function preview_escape(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function esc_url(string $value): string { return preview_escape($value); }
function esc_html(string $value): string { return preview_escape($value); }
function esc_attr(string $value): string { return preview_escape($value); }
function home_url(string $path = '/'): string { return 'https://www.infometry.net/' . ltrim($path, '/'); }
function has_custom_logo(): bool { return false; }
function get_nav_menu_locations(): array { return array(); }
function get_bloginfo(string $show = ''): string { return 'Infometry Inc.'; }
function wp_date(string $format): string { return date($format); }

function get_header(): void {
	echo <<<'HTML'
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Asana FDP Snowflake Case Study | Infometry Preview</title>
	<link rel="stylesheet" href="assets/css/asana-fdp-case-study.css?v=2.8.3">
</head>
<body class="infometry-asana-fdp-page">
HTML;
}

function get_footer(): void {
	echo <<<'HTML'
</body>
</html>
HTML;
}

ob_start();
require $project_root . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'page-asana-fdp-case-study.php';
$html = ob_get_clean();

if (!is_string($html) || $html === '') { fwrite(STDERR, "The Asana FDP preview rendered no output.\n"); exit(1); }
if (file_put_contents($output_file, $html . PHP_EOL) === false) { fwrite(STDERR, "Unable to write {$output_file}.\n"); exit(1); }

echo "Rendered {$output_file}\n";
