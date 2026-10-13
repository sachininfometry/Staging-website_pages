<?php
define( 'ABSPATH', __DIR__ . DIRECTORY_SEPARATOR );
define( 'INFOMETRY_CT_URL', './' );
function get_header() {}
function get_footer() {}
function home_url( $path = '/' ) { return '#' . trim( $path, '/' ); }
function esc_url( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_html( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function esc_attr( $value ) { return htmlspecialchars( $value, ENT_QUOTES, 'UTF-8' ); }
function wp_date( $format ) { return date( $format ); }
?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Sunrun Enterprise Data &amp; Analytics Case Study</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&amp;family=Open+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/case-studies/sunrun-enterprise-data-analytics.css?v=<?php echo rawurlencode( (string) filemtime( __DIR__ . '/assets/css/case-studies/sunrun-enterprise-data-analytics.css' ) ); ?>">
	<style>html,body{margin:0;min-height:100%}</style>
</head>
<body class="infometry-sunrise-case-study-page">
<?php require __DIR__ . '/templates/case-studies/sunrun-enterprise-data-analytics/sunrun-enterprise-data-analytics.php'; ?>
<script src="assets/js/sunrun-enterprise-data-analytics.js?v=<?php echo rawurlencode( (string) filemtime( __DIR__ . '/assets/js/sunrun-enterprise-data-analytics.js' ) ); ?>"></script>
</body>
</html>
