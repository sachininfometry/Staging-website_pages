<?php
/** Render the Sunrise case-study WordPress template as standalone HTML. */

declare(strict_types=1);

$project_root = dirname(__DIR__);
$output_file  = $project_root . DIRECTORY_SEPARATOR . 'preview-sunrise-case-study.html';

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
	<title>Sunrise Case Study | Infometry Preview</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/sunrise-case-study.css">
	<style>
		html,body{margin:0}.preview-nav{position:relative;z-index:10;display:flex;height:82px;padding:0 4vw;align-items:center;background:#061a3a}.preview-nav img{width:210px;height:auto}.preview-nav nav{display:flex;gap:34px;margin-left:auto}.preview-nav a{color:#fff;font:600 12px/1.2 Arial,sans-serif;text-decoration:none}.preview-old-slider{height:320px;background:#09162e}@media(max-width:767px){.preview-nav{height:68px;padding:0 16px}.preview-nav img{width:175px}.preview-nav nav{display:none}}
	</style>
</head>
<body class="infometry-sunrise-case-study-page">
	<header class="preview-nav"><img src="assets/images/infometry-logo-white.png" alt="Infometry"><nav><a href="#">SERVICES</a><a href="#">INDUSTRIES</a><a href="#">CASE STUDIES</a><a href="#">INSIGHTS</a><a href="#">ABOUT</a></nav></header>
	<div id="mfn-rev-slider" class="mfn-rev-slider preview-old-slider">Old injected theme slider</div>
HTML;
}

function get_footer(): void {
	echo <<<'HTML'
</body>
</html>
HTML;
}

ob_start();
require $project_root . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'page-sunrise-case-study.php';
$html = ob_get_clean();

if (!is_string($html) || $html === '') { fwrite(STDERR, "The Sunrise preview rendered no output.\n"); exit(1); }
if (file_put_contents($output_file, $html . PHP_EOL) === false) { fwrite(STDERR, "Unable to write {$output_file}.\n"); exit(1); }

echo "Rendered {$output_file}\n";
