<?php
/**
 * Small SEO fixes that have no visible effect on any page.
 *
 *   - Home page: Yoast's WebPage schema used the page's stored SEO title and
 *     description (a copy of the Conversa page), while the <title> and Open Graph
 *     tags already use the home values. The schema now matches them.
 *   - /advanced-analytics-2/ (an older duplicate of /advanced-analytics/ that
 *     canonicalised to itself) redirects permanently to /advanced-analytics/.
 *     This can later move to the Redirection plugin; remove it here if so.
 *   - Case-study templates can print ImageObject data (name and description) for
 *     their images with infometry_ct_print_image_schema().
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Home page WebPage schema: same name and description as its title and meta tags. */
function infometry_ct_home_webpage_schema( $data ) {
	if ( ! function_exists( 'infometry_ct_should_use_home_template' ) || ! infometry_ct_should_use_home_template() ) {
		return $data;
	}

	if ( defined( 'INFOMETRY_CT_HOME_META_TITLE' ) ) {
		$data['name'] = INFOMETRY_CT_HOME_META_TITLE;
	}
	if ( defined( 'INFOMETRY_CT_HOME_META_DESCRIPTION' ) ) {
		$data['description'] = INFOMETRY_CT_HOME_META_DESCRIPTION;
	}
	return $data;
}
add_filter( 'wpseo_schema_webpage', 'infometry_ct_home_webpage_schema', 20 );

/**
 * Print ImageObject structured data for a custom template's images, so each
 * image carries a name and description for search engines (the images are
 * plugin assets, not Media Library items, so they have no title or
 * description fields of their own).
 *
 * @param array $images List of array( path under assets/images/, name, description ).
 */
function infometry_ct_print_image_schema( $images ) {
	$graph = array();
	foreach ( $images as $index => $image ) {
		list( $path, $name, $description ) = $image;
		$file = INFOMETRY_CT_PATH . 'assets/images/' . $path;
		if ( ! is_readable( $file ) ) {
			continue;
		}

		$url  = INFOMETRY_CT_URL . 'assets/images/' . $path;
		$item = array(
			'@type'       => 'ImageObject',
			'contentUrl'  => $url,
			'url'         => $url,
			'name'        => $name,
			'caption'     => $name,
			'description' => $description,
		);
		$size = @getimagesize( $file );
		if ( $size ) {
			$item['width']  = $size[0];
			$item['height'] = $size[1];
		}
		if ( 0 === $index ) {
			$item['representativeOfPage'] = true;
		}
		$graph[] = $item;
	}

	if ( $graph ) {
		echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@graph' => $graph ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}

/** Permanent redirects for retired duplicate URLs. */
function infometry_ct_retired_url_redirects() {
	if ( empty( $_SERVER['REQUEST_URI'] ) ) {
		return;
	}

	$redirects = array(
		'/advanced-analytics-2' => '/advanced-analytics/',
	);

	$path = untrailingslashit( (string) wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) );
	if ( isset( $redirects[ $path ] ) ) {
		wp_safe_redirect( home_url( $redirects[ $path ] ), 301, 'Infometry Custom Templates' );
		exit;
	}
}
add_action( 'template_redirect', 'infometry_ct_retired_url_redirects', 1 );

/*
 * Conversa Slack integration press release: its own title and description (the
 * WordPress page had the site-wide default description) and NewsArticle data.
 */
define( 'INFOMETRY_CT_CONVERSA_SLACK_PR_TITLE', 'Infometry Introduces Slack Integration for INFOFISCUS Conversa | Infometry' );
define( 'INFOMETRY_CT_CONVERSA_SLACK_PR_DESCRIPTION', 'Infometry launches a Slack integration for INFOFISCUS Conversa: ask data questions in Slack and get executive summaries, charts, data tables and auditable SQL.' );

/** True on the Conversa Slack press release. */
function infometry_ct_is_conversa_slack_pr_page() {
	return function_exists( 'infometry_ct_should_use_conversa_slack_pr_template' ) && infometry_ct_should_use_conversa_slack_pr_template();
}

/** Press release title for the document, Yoast and social tags. */
function infometry_ct_conversa_slack_pr_title( $title ) {
	return infometry_ct_is_conversa_slack_pr_page() ? INFOMETRY_CT_CONVERSA_SLACK_PR_TITLE : $title;
}
add_filter( 'pre_get_document_title', 'infometry_ct_conversa_slack_pr_title', 99 );
add_filter( 'wpseo_title', 'infometry_ct_conversa_slack_pr_title', 99 );
add_filter( 'wpseo_opengraph_title', 'infometry_ct_conversa_slack_pr_title', 99 );
add_filter( 'wpseo_twitter_title', 'infometry_ct_conversa_slack_pr_title', 99 );

/** Press release description for Yoast and social tags. */
function infometry_ct_conversa_slack_pr_description( $description ) {
	return infometry_ct_is_conversa_slack_pr_page() ? INFOMETRY_CT_CONVERSA_SLACK_PR_DESCRIPTION : $description;
}
add_filter( 'wpseo_metadesc', 'infometry_ct_conversa_slack_pr_description', 99 );
add_filter( 'wpseo_opengraph_desc', 'infometry_ct_conversa_slack_pr_description', 99 );
add_filter( 'wpseo_twitter_description', 'infometry_ct_conversa_slack_pr_description', 99 );

/** Share image: the Slack thread screenshot from the banner. */
function infometry_ct_conversa_slack_pr_og_image( $image ) {
	return infometry_ct_is_conversa_slack_pr_page() ? INFOMETRY_CT_URL . 'assets/images/press-releases/conversa-slack/conversa-slack-thread.jpg' : $image;
}
add_filter( 'wpseo_opengraph_image', 'infometry_ct_conversa_slack_pr_og_image', 99 );
add_filter( 'wpseo_twitter_image', 'infometry_ct_conversa_slack_pr_og_image', 99 );

/** NewsArticle structured data for the press release (printed by its template). */
function infometry_ct_print_press_release_schema() {
	$path = (string) wp_parse_url( wp_unslash( isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '/' ), PHP_URL_PATH );
	$url  = home_url( trailingslashit( $path ) );
	$data = array(
		'@context'         => 'https://schema.org',
		'@type'            => 'NewsArticle',
		'headline'         => 'Infometry Introduces Slack Integration for INFOFISCUS Conversa, Bringing Enterprise Decision Intelligence Into the Flow of Work',
		'description'      => INFOMETRY_CT_CONVERSA_SLACK_PR_DESCRIPTION,
		'datePublished'    => '2026-10-27',
		'dateModified'     => '2026-10-27',
		'dateline'         => 'FREMONT, Calif., USA',
		'articleSection'   => 'Press Releases',
		'image'            => INFOMETRY_CT_URL . 'assets/images/press-releases/conversa-slack/conversa-slack-thread.jpg',
		'mainEntityOfPage' => $url,
		'url'              => $url,
		'author'           => array( '@type' => 'Organization', 'name' => 'Infometry Inc.', 'url' => home_url( '/' ) ),
		'publisher'        => array(
			'@type' => 'Organization',
			'name'  => 'Infometry Inc.',
			'url'   => home_url( '/' ),
			'logo'  => array( '@type' => 'ImageObject', 'url' => INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ),
		),
		'about'            => array(
			array( '@type' => 'SoftwareApplication', 'name' => 'INFOFISCUS Conversa', 'applicationCategory' => 'BusinessApplication', 'url' => home_url( '/product/infofiscus-conversa-decision-intelligence/' ) ),
			array( '@type' => 'SoftwareApplication', 'name' => 'Slack', 'applicationCategory' => 'BusinessApplication' ),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
