<?php
/**
 * Template Name: Sales Analytics Native App Product
 * Template Post Type: page, product
 *
 * Redesign of the INFOFISCUS Sales Analytics Snowflake Native App page on the shared connector
 * system (google-sheets-connector.css + google-drive-connector.css/.js + sales-analytics-native-app.css).
 * Every heading, paragraph, list item, image (with its alt text), video and link of the original
 * page is kept visible; the visuals are additions. The original's second H1 is an H2 here.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

/* Page helpers (this page only): uploads images, FAQ + schema, other products, free trial form, video, footer. */
if ( ! function_exists( 'infometry_ct_sal_upload' ) ) {
	/** URL of a file in wp-content/uploads (path after uploads/), so the original page images keep their URLs. */
	function infometry_ct_sal_upload( $path ) {
		return home_url( '/wp-content/uploads/' . ltrim( $path, '/' ) );
	}

	/** One of the original page's images, with its original alt text. */
	function infometry_ct_sal_wp_img( $path, $alt, $class = '', $width = 0, $height = 0 ) {
		printf(
			'<img%s src="%s" alt="%s"%s loading="lazy" decoding="async">',
			$class ? ' class="' . esc_attr( $class ) . '"' : '',
			esc_url( infometry_ct_sal_upload( $path ) ),
			esc_attr( $alt ),
			( $width && $height ) ? sprintf( ' width="%d" height="%d"', (int) $width, (int) $height ) : ''
		);
	}

	/** Tags allowed in FAQ answers and rich copy. */
	function infometry_ct_sal_allowed() {
		return array(
			'a'      => array( 'href' => array(), 'target' => array(), 'rel' => array() ),
			'p'      => array(),
			'ul'     => array(),
			'ol'     => array(),
			'li'     => array(),
			'b'      => array(),
			'strong' => array(),
			'em'     => array(),
			'br'     => array(),
			'h4'     => array(),
		);
	}

	/** Extra sprite icons used by these pages (shared igs-* icons come from connector-sprite.php). */
	function infometry_ct_sal_sprite() {
		?>
		<svg class="igs-sprite" aria-hidden="true" focusable="false">
			<symbol id="gcx-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></symbol>
			<symbol id="gcx-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></symbol>
			<symbol id="gcx-star" viewBox="0 0 24 24"><path d="m12 3 2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9L12 3Z"/></symbol>
			<symbol id="gcx-key" viewBox="0 0 24 24"><circle cx="8" cy="14" r="4.5"/><path d="m11.3 10.7 8.2-8.2M17 5l2.5 2.5M14.5 7.5 16.5 9.5"/></symbol>
			<symbol id="gcx-table" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2.5"/><path d="M3 9.5h18M3 15h18M9 9.5V20"/></symbol>
			<symbol id="gcx-row" viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="8" rx="2"/><path d="M8 8v8"/></symbol>
			<symbol id="gcx-trash" viewBox="0 0 24 24"><path d="M4 7h16M9 7V4.5h6V7M6.5 7l1 13h9l1-13M10 11v5M14 11v5"/></symbol>
			<symbol id="gcx-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m4 7 8 6 8-6"/></symbol>
			<symbol id="gcx-send" viewBox="0 0 24 24"><path d="M21 3 10 14M21 3l-7 18-4-7-7-4 18-7Z"/></symbol>
			<symbol id="gcx-inbox" viewBox="0 0 24 24"><path d="M3 13h5l1.5 3h5L16 13h5"/><path d="M5.5 5h13L21 13v6H3v-6l2.5-8Z"/></symbol>
			<symbol id="gcx-camera" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2.5"/><circle cx="12" cy="13.5" r="3.5"/><path d="M8.5 7 10 4.5h4L15.5 7"/></symbol>
			<symbol id="gcx-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.6 3.8 5.6 3.8 9s-1.2 6.4-3.8 9c-2.6-2.6-3.8-5.6-3.8-9S9.4 5.6 12 3Z"/></symbol>
			<symbol id="gcx-trend" viewBox="0 0 24 24"><path d="M3 17 9 11l4 4 8-8"/><path d="M15 7h6v6"/></symbol>
			<symbol id="gcx-coin" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M14.8 9.2c-.5-.9-1.6-1.4-2.8-1.4-1.7 0-2.8.9-2.8 2.1 0 2.9 5.8 1.5 5.8 4.3 0 1.2-1.2 2.1-3 2.1-1.3 0-2.5-.6-3-1.6M12 6v1.8M12 16.3V18"/></symbol>
			<symbol id="gcx-rocket" viewBox="0 0 24 24"><path d="M14 4c3-1 6-1 6-1s0 3-1 6l-6 6-5-5 6-6Z"/><path d="m8 10-4 .5L3 13l4 1M14 16l-.5 4-2.5 1-1-4"/><circle cx="15" cy="9" r="1.5"/></symbol>
			<symbol id="gcx-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.2"/></symbol>
			<symbol id="gcx-gauge" viewBox="0 0 24 24"><path d="M4.5 18a9 9 0 1 1 15 0"/><path d="m12 13 4-5"/><circle cx="12" cy="13" r="1.4"/></symbol>
			<symbol id="gcx-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
			<symbol id="gcx-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
			<symbol id="gcx-funnel" viewBox="0 0 24 24"><path d="M3 4h18l-7 8.5V20l-4-2v-5.5L3 4Z"/></symbol>
			<symbol id="gcx-pie" viewBox="0 0 24 24"><path d="M12 3v9h9a9 9 0 1 1-9-9Z"/><path d="M15 3.5A9 9 0 0 1 20.5 9H15V3.5Z"/></symbol>
			<symbol id="gcx-robot" viewBox="0 0 24 24"><rect x="4" y="8" width="16" height="12" rx="3"/><path d="M12 8V4M9 13h.01M15 13h.01M9 17h6"/><circle cx="12" cy="3.5" r="1"/></symbol>
			<symbol id="gcx-api" viewBox="0 0 24 24"><path d="M8 7 3 12l5 5M16 7l5 5-5 5M14 4l-4 16"/></symbol>
			<symbol id="gcx-plug" viewBox="0 0 24 24"><path d="M9 3v5M15 3v5M6 8h12v3a6 6 0 0 1-12 0V8ZM12 17v4"/></symbol>
		</svg>
		<?php
	}

	/** FAQ: two columns of details, a support bar and FAQPage schema built from the same text. */
	function infometry_ct_sal_faq( $args ) {
		$args = wp_parse_args(
			$args,
			array(
				'id'      => 'gcx-faq',
				'kicker'  => 'FAQ',
				'title'   => 'Frequently Asked Questions',
				'faqs'    => array(),
				'email'   => 'info@infometry.net',
				'contact' => home_url( '/contact-us/' ),
				'bar'     => 'Support is available 24/7 with local time-zone coverage',
			)
		);
		$faqs   = $args['faqs'];
		$half   = (int) ceil( count( $faqs ) / 2 );
		$schema = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array_map(
				function ( $faq ) {
					return array(
						'@type'          => 'Question',
						'name'           => $faq[0],
						'acceptedAnswer' => array( '@type' => 'Answer', 'text' => trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( str_replace( '<', ' <', $faq[1] ) ) ) ) ),
					);
				},
				$faqs
			),
		);
		?>
		<section class="igs-section gdc-faq gcx-faq" aria-labelledby="<?php echo esc_attr( $args['id'] ); ?>-title">
			<div class="igs-shell">
				<div class="igs-head" data-igs-reveal>
					<span class="igs-kicker"><?php echo esc_html( $args['kicker'] ); ?></span>
					<h2 id="<?php echo esc_attr( $args['id'] ); ?>-title"><?php echo esc_html( $args['title'] ); ?></h2>
				</div>
				<div class="gdc-faq-cols">
					<?php foreach ( $half ? array_chunk( $faqs, $half ) : array() as $column ) : ?>
						<div class="gdc-faq-col">
							<?php foreach ( $column as $i => $faq ) : ?>
								<details<?php echo 0 === $i ? ' open' : ''; ?>>
									<summary><?php echo esc_html( $faq[0] ); ?><span aria-hidden="true"><svg><use href="#igs-plus"/></svg></span></summary>
									<div class="gcx-faq-a"><?php echo wp_kses( false === strpos( $faq[1], '<p>' ) ? '<p>' . $faq[1] . '</p>' : $faq[1], infometry_ct_sal_allowed() ); ?></div>
								</details>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="gdc-faq-bar" data-igs-reveal>
					<span><svg><use href="#igs-chat"/></svg></span>
					<p><b>Still have questions?</b><?php echo esc_html( $args['bar'] ); ?> · <a href="mailto:<?php echo esc_attr( $args['email'] ); ?>"><?php echo esc_html( $args['email'] ); ?></a></p>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $args['contact'] ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				</div>
			</div>
			<script type="application/ld+json"><?php echo wp_json_encode( $schema ); ?></script>
		</section>
		<?php
	}

	/**
	 * Other products. Each card: url, icon (array: 'plugin' => url | 'upload' => path), alt, title, copy, link label.
	 */
	function infometry_ct_sal_related( $id, $title, $cards ) {
		?>
		<section class="igs-section igs-related gdc-related gcx-related" aria-labelledby="<?php echo esc_attr( $id ); ?>">
			<div class="igs-shell">
				<div class="igs-head" data-igs-reveal>
					<span class="igs-kicker">Explore more</span>
					<h2 id="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $title ); ?></h2>
				</div>
				<div class="igs-related-grid">
					<?php foreach ( $cards as $card ) : ?>
						<a class="igs-related-card" href="<?php echo esc_url( $card['url'] ); ?>" data-igs-reveal>
							<span>
								<?php
								if ( ! empty( $card['upload'] ) ) {
									infometry_ct_sal_wp_img( $card['upload'], $card['alt'] );
								} else {
									infometry_ct_igs_img( $card['plugin'], $card['alt'] );
								}
								?>
							</span>
							<div><h3><?php echo esc_html( $card['title'] ); ?></h3><p><?php echo esc_html( $card['copy'] ); ?></p><em><?php echo esc_html( isset( $card['label'] ) ? $card['label'] : 'Read more' ); ?> <svg><use href="#igs-arrow"/></svg></em></div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}

	/** Free trial / demo section with the WPForms form. */
	function infometry_ct_sal_cta( $args ) {
		$args  = wp_parse_args(
			$args,
			array(
				'id'        => 'freetrialform',
				'kicker'    => 'Free trial',
				'title'     => 'Free Trial',
				'copy'      => '',
				'checks'    => array(),
				'resources' => array(),
				'form_id'   => 351429,
				'form_head' => 'Request Free Trial',
				'email'     => 'info@infometry.net',
				'contact'   => home_url( '/contact-us/' ),
				'anchor2'   => '',
			)
		);
		$title_id = $args['id'] . '-title';
		?>
		<section class="igs-cta gdc-cta gcx-cta" id="<?php echo esc_attr( $args['id'] ); ?>" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
			<?php if ( $args['anchor2'] ) : ?><span id="<?php echo esc_attr( $args['anchor2'] ); ?>" class="gcx-anchor"></span><?php endif; ?>
			<div class="igs-shell igs-cta-grid">
				<div class="igs-cta-copy">
					<span class="igs-kicker"><?php echo esc_html( $args['kicker'] ); ?></span>
					<h2 id="<?php echo esc_attr( $title_id ); ?>"><?php echo esc_html( $args['title'] ); ?></h2>
					<?php if ( $args['copy'] ) : ?><p><?php echo wp_kses( $args['copy'], infometry_ct_sal_allowed() ); ?></p><?php endif; ?>
					<?php if ( $args['checks'] ) : ?>
						<ul class="igs-cta-checks">
							<?php foreach ( $args['checks'] as $check ) : ?>
								<li><svg><use href="#igs-check"/></svg><?php echo esc_html( $check ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<?php if ( $args['resources'] ) : ?>
						<div class="gdc-cta-res">
							<?php foreach ( $args['resources'] as $res ) : ?>
								<a href="<?php echo esc_url( $res['url'] ); ?>"<?php echo 0 === strpos( $res['url'], 'http' ) ? ' target="_blank" rel="noopener"' : ''; ?>>
									<span<?php echo ! empty( $res['class'] ) ? ' class="' . esc_attr( $res['class'] ) . '"' : ''; ?>>
										<?php
										if ( ! empty( $res['img'] ) ) {
											infometry_ct_igs_img( $res['img'], '' );
										} else {
											printf( '<svg><use href="#%s"/></svg>', esc_attr( $res['icon'] ) );
										}
										?>
									</span>
									<b><?php echo esc_html( $res['title'] ); ?></b><small><?php echo esc_html( $res['sub'] ); ?></small>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="igs-form">
					<h3><?php echo esc_html( $args['form_head'] ); ?></h3>
					<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
						<?php echo do_shortcode( sprintf( '[wpforms id="%d" title="false" description="false"]', absint( $args['form_id'] ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php else : ?>
						<p>The request form is temporarily unavailable. Email us at <a href="mailto:<?php echo esc_attr( $args['email'] ); ?>"><?php echo esc_html( $args['email'] ); ?></a>.</p>
						<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $args['contact'] ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<?php
	}

	/** Click-to-play YouTube cards (data-igs-video) open in this modal; google-sheets-connector.js runs it. */
	function infometry_ct_sal_video_modal() {
		?>
		<div class="igs-modal" data-igs-modal hidden>
			<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Video">
				<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
				<div class="igs-modal-frame" data-igs-frame></div>
			</div>
		</div>
		<?php
	}

	/** A video card: YouTube id, title, tag, and the two logos shown on the cover. */
	function infometry_ct_sal_video_card( $video_id, $title, $tag, $logo_a, $logo_b, $class = '' ) {
		?>
		<a class="gdc-video gcx-video <?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $video_id ); ?>" target="_blank" rel="noopener" data-igs-video="<?php echo esc_attr( $video_id ); ?>" data-igs-reveal>
			<span class="gdc-video-cover" aria-hidden="true">
				<span class="gdc-vc-tile"><?php echo $logo_a; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built from escaped helpers. ?></span>
				<span class="gdc-vc-arrow"><svg><use href="#igs-arrow"/></svg></span>
				<span class="gdc-vc-tile"><?php echo $logo_b; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<span class="gdc-vc-play"><svg><use href="#igs-play"/></svg></span>
			</span>
			<span class="gdc-video-info"><em><?php echo esc_html( $tag ); ?></em><b><?php echo esc_html( $title ); ?></b><small>Watch video <svg><use href="#igs-arrow"/></svg></small></span>
		</a>
		<?php
	}

	/** Captured img tag (for places that need the markup as a string). */
	function infometry_ct_sal_img_html( $url, $alt = '' ) {
		ob_start();
		infometry_ct_igs_img( $url, $alt );
		return ob_get_clean();
	}

	/** Site footer shared by the redesigned product pages. */
	function infometry_ct_sal_footer() {
		$img          = INFOMETRY_CT_URL . 'assets/images/';
		$contact_url  = home_url( '/contact-us/' );
		?>
		<footer class="infometry-custom-footer" id="infometry-footer" aria-label="Infometry website footer">
			<div class="infometry-shell">
				<div class="infometry-footer-grid">
					<div class="infometry-footer-connect">
						<h2>Connect with us</h2>
						<a class="infometry-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img width="500" height="142" src="<?php echo esc_url( $img . 'infometry-logo-white.png' ); ?>" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
						<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
						<div class="infometry-footer-social" aria-label="Infometry social profiles">
							<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-facebook.png' ); ?>" alt=""></a>
							<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img width="500" height="500" src="<?php echo esc_url( $img . 'social-x.png' ); ?>" alt=""></a>
							<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-linkedin.png' ); ?>" alt=""></a>
							<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-youtube.png' ); ?>" alt=""></a>
							<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-pinterest.png' ); ?>" alt=""></a>
							<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-instagram.png' ); ?>" alt=""></a>
							<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img width="512" height="512" src="<?php echo esc_url( $img . 'social-g2.png' ); ?>" alt=""></a>
						</div>
						<a class="infometry-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span aria-hidden="true">→</span></a>
					</div>
					<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( home_url( '/product/infofiscus-conversa-decision-intelligence/' ) ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/informatica-connectors/' ) ); ?>">Informatica Connectors</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( home_url( '/product/accelerators-for-data-warehouse-migration-automation/' ) ); ?>">Accelerators</a></nav>
					<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
					<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( home_url( '/company/customers-partners/' ) ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
				</div>
				<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
			</div>
		</footer>
		<?php
	}
}

$contact_url   = home_url( '/contact-us/' );
$guide_url     = 'https://docs.google.com/document/d/1Hg7l8XYJ3g-6S7fBx-w1RIJTqyaDlh34/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$sf_market_url = 'https://app.snowflake.com/marketplace/providers/GZSTZ3867OQ/Infometry';
$img           = INFOMETRY_CT_URL . 'assets/images/';
$sf_icon       = $img . 'google-sheets/eco-snowflake.png';
$sfdc_icon     = $img . 'google-sheets/eco-salesforce.png';
$support_email = 'info@infometry.net';

// Hero dashboard: pipeline stages (stage, amount, deals, bar %).
$sal_stages = array(
	array( 'Prospecting', '$4.8M', '212', 92 ),
	array( 'Qualification (MQL → SQL)', '$3.6M', '148', 74 ),
	array( 'Proposal', '$2.7M', '91', 56 ),
	array( 'Negotiation', '$1.9M', '46', 40 ),
	array( 'Closed Won', '$1.3M', '38', 28 ),
);
$sal_jobs = array(
	array( 0, 'ingest', 'Ingest', 'from Salesforce' ),
	array( 1, 'xform', 'Transform (Python)', 'dimensional model' ),
	array( 2, 'metric', 'Compute KPIs', 'virtual warehouse' ),
	array( 4, 'ai', 'Forecast', 'AI/ML model' ),
);

$sal_features = array(
	array( 'igs-sync', 'Efficient data pipeline:', 'Ingest data in near real-time from sources like Salesforce, NetSuite, and Workday directly into Snowflake.' ),
	array( 'igs-chart', 'Scalable dashboards:', 'Tailored for sales teams, providing adaptable, in-depth analytics to match your business’s growth.' ),
	array( 'gcx-star', 'Unique sales analytics suite:', 'Stand out in a competitive landscape with distinctive features.' ),
	array( 'gcx-rocket', 'Unmatched scalability:', 'Extend across dashboards, scorecards, and comprehensive organizational analytics.' ),
	array( 'gcx-lock', 'Secure datasets:', 'Regular updates and robust security protocols ensure data integrity and address any concerns.' ),
	array( 'igs-shield', 'INFOFISCUS assurance:', 'Trust us for the integrity and security of your data.' ),
);

$sal_values = array(
	array( '90%', 'Simplified Installation.' ),
	array( '70%', 'Cost-Effective Data Management.' ),
	array( '99%', 'Customizable Data Transformations.' ),
	array( '', 'Pre-built application environments.' ),
	array( '', 'Optimized dimensional models and metrics.' ),
	array( '', 'Ready-to-use data pipelines.' ),
	array( '', 'Agentic AI–enabled adaptability for evolving business needs.' ),
);

$sal_faqs = array(
	array( '1. What is Sales Analytics Snowflake Native Application, and how does it redefine data analytics?', 'INFOFISCUS Sales Analytics is a powerful native application featured in the Snowflake Marketplace. It offers comprehensive insights into Sales, Marketing, Finance, and Supply Chain Analytics by seamlessly integrating with ERPs, CRMs, and forecasting applications.' ),
	array( '2. How does INFOFISCUS streamline the data analytics process?', 'INFOFISCUS eliminates the need for building an end-to-end data warehouse and visualization platform. It efficiently synchronizes data from Salesforce to Snowflake, providing real-time, in-depth analytics for Sales operations and executive decision-making.' ),
	array( '3. What are the key benefits of using Sales Analytics Snowflake Native Application?', 'Simplified Installation and Implementation, Cost-Efficient Data Management, Ready-to-Use Data Pipelines, Comprehensive Data Warehouse Structure, Optimized Dimensional Models and Metrics, Pre-Built Application Environments, Customizable Data Transformations, Innovative and Forward-Thinking Roadmap.' ),
	array( '4. Can you explain the high-level architecture of Sales Analytics Snowflake Native Application?', 'The architecture involves data ingestion from diverse sources, data extraction and transformation using Python, computing with a consumer Snowflake virtual warehouse, support for historic and incremental data load, and the use of AI/ML libraries for insightful analytics.' ),
	array( '5. What use cases and applications does INFOFISCUS address?', 'INFOFISCUS addresses organizations’ challenges with critical business data trapped in ERP and CRM systems. It automates the integration of data into Snowflake, providing intuitive sales, marketing, finance, and supply chain dashboards empowered by embedded AI models.' ),
	array( '6. How can businesses use and implement INFOFISCUS Sales Analytics Snowflake Native Application?', 'Getting started is easy. Users need a Snowflake paid account, access to the Snowflake Marketplace, and a basic understanding of Snowflake Native App. They can install the application from the marketplace and follow the step-by-step instructions in the provided readme file.' ),
	array( '7. What is on the horizon for INFOFISCUS?', 'The roadmap includes deeper integrations with popular CRM & ERP systems, enhanced AI-driven predictive analytics, and more. These updates promise to provide more depth and breadth in insights, further elevating the data analytics experience.' ),
	array( '8. What does the INFOFISCUS Sales Analytics Snowflake Native Application dashboard offer in terms of visual representation?', 'The dashboard provides visualizations like charts, graphs, and gauges for open opportunities, closed opportunities, and customer analysis. It includes key performance indicators (KPIs) such as total opportunities amount, number of customers, won/loss ratio, and more.' ),
	array( '9. How can users access support and guidance for INFOFISCUS Sales Analytics Snowflake Native Application?', 'Users can find the INFOFISCUS Sales Analytics application on the Snowflake Marketplace. The user guide is available in the document section, and after installation, users can refer to the readme file for step-by-step instructions.' ),
	array( '10. How can businesses stay updated on INFOFISCUS developments and updates?', 'Users can keep abreast of INFOFISCUS developments by checking the roadmap, which promises deeper integrations, enhanced AI-driven analytics, and comprehensive financial planning and analysis tools. Regularly visiting the Snowflake Marketplace and INFOFISCUS documentation will provide the latest information.' ),
);
?>
<main class="igs-page gdc-page gcx-page gcx-snow gcx-sales" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php infometry_ct_sal_sprite(); ?>

	<!-- Hero -->
	<section class="igs-hero gdc-hero gcx-hero" aria-labelledby="sal-title">
		<div class="igs-shell gdc-hero-grid">
			<div class="gdc-hero-copy">
				<span class="gdc-badge"><?php infometry_ct_igs_img( $sf_icon, '' ); ?>INFOFISCUS · Snowflake Native App</span>
				<h1 id="sal-title">INFOFISCUS Sales Analytics <em>Snowflake Native Application</em></h1>
				<p>The INFOFISCUS Sales Analytics Snowflake Native Application revolutionizes the analytics landscape by sparing customers the effort and resources required to design and build an end-to-end data warehouse and visualization platform. This Analytics Snowflake App from INFOFISCUS is meticulously designed to empower customers with robust insights into Sales Growth, Pipelines, Forecast, MQL, and SQL. It seamlessly integrates with industry-standard ERPs, CRMs, and forecasting applications, now enhanced with Agentic AI to deliver adaptive, intelligent analytics.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary gdc-btn-drive" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download Our User Guide Now!</a>
					<a class="igs-btn igs-btn-ghost" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
				</div>
				<ul class="gdc-hero-drives" aria-label="Insights">
					<li><svg><use href="#gcx-trend"/></svg>Sales Growth</li>
					<li><svg><use href="#gcx-funnel"/></svg>Pipelines</li>
					<li><svg><use href="#igs-chart"/></svg>Forecast</li>
					<li><svg><use href="#gcx-target"/></svg>MQL &amp; SQL</li>
				</ul>
			</div>

			<div class="gdc-stage gcx-stage" data-gdc-stage aria-label="Animated example: Salesforce data is ingested, transformed and turned into sales pipeline KPIs inside Snowflake by the INFOFISCUS Sales Analytics Native App">
				<div class="gdc-window gcx-window gcx-dash" aria-hidden="true">
					<div class="gdc-win-top">
						<span class="gdc-win-logo"><?php infometry_ct_igs_img( $sf_icon, '' ); ?><b>Sales Analytics</b></span>
						<span class="gcx-win-tag">FY26 · Q4</span>
					</div>
					<div class="gcx-kpis">
						<div><small>Opportunities amount</small><b>$14.3M</b><em>+18%</em></div>
						<div><small>Customers</small><b>1,284</b><em>+6%</em></div>
						<div><small>Won / loss ratio</small><b>1.9</b><em>+0.3</em></div>
						<div><small>Forecast attainment</small><b>94%</b><em>on track</em></div>
					</div>
					<ul class="gcx-rows gcx-bars">
						<?php foreach ( $sal_stages as $i => $stage ) : ?>
							<li style="--w: <?php echo (int) $stage[3]; ?>%" data-gdc-file="<?php echo (int) $i; ?>">
								<span><?php echo esc_html( $stage[0] ); ?></span>
								<i><i></i></i>
								<b><?php echo esc_html( $stage[1] ); ?></b>
								<small><?php echo esc_html( $stage[2] ); ?> deals</small>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="gdc-queue gcx-queue">
					<header>
						<span><?php infometry_ct_igs_img( $sf_icon, '' ); ?></span>
						<div><b>Analytics pipeline</b><small>INFOFISCUS · Snowflake Native App</small></div>
						<em data-gdc-count><?php echo count( $sal_jobs ); ?> of <?php echo count( $sal_jobs ); ?> done</em>
					</header>
					<ol>
						<?php foreach ( $sal_jobs as $job ) : ?>
							<li class="is-<?php echo esc_attr( $job[1] ); ?>" data-gdc-job="<?php echo (int) $job[0]; ?>">
								<span class="gdc-job-ic"><svg><use href="#<?php echo esc_attr( array( 'ingest' => 'igs-sync', 'xform' => 'igs-code', 'metric' => 'igs-chart', 'ai' => 'igs-bolt' )[ $job[1] ] ); ?>"/></svg></span>
								<div class="gdc-job-text">
									<b><?php echo esc_html( $job[2] ); ?> <span><?php echo esc_html( $sal_stages[ $job[0] ][0] ); ?></span></b>
									<small>→ <?php echo esc_html( $job[3] ); ?></small>
									<i class="gdc-job-bar"><i></i></i>
								</div>
								<span class="gdc-job-state"><svg><use href="#igs-check"/></svg></span>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
				<span class="gdc-chip is-auth" aria-hidden="true"><?php infometry_ct_igs_img( $sfdc_icon, '' ); ?>Salesforce · NetSuite · Workday</span>
				<span class="gdc-chip is-store" aria-hidden="true"><svg><use href="#igs-bolt"/></svg>Agentic AI analytics</span>
			</div>
		</div>
	</section>

	<!-- Features -->
	<section class="igs-section gcx-features" aria-labelledby="sal-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Features</span>
				<h2 id="sal-feat-title">INFOFISCUS Sales Analytics Snowflake Native App Features</h2>
				<p>INFOFISCUS efficiently synchronizes data from Salesforce to Snowflake, crunching critical metrics in near real-time. This ensures the availability of in-depth, detailed, and Agentic AI–driven cognitive analytics, essential for optimizing Sales operations and facilitating executive decision-making. Users can easily get started by visiting the <a href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener">Snowflake Marketplace</a>, finding the INFOFISCUS Sales Analytics application, and installing it. It will revolutionize how businesses approach data analytics and set a new standard in the industry.</p>
			</div>
			<div class="gcx-tiles is-three">
				<?php foreach ( $sal_features as $i => $feature ) : ?>
					<article class="gdc-tile gcx-tile is-c<?php echo (int) ( $i % 4 ); ?>" data-igs-reveal>
						<span class="gdc-tile-ic"><svg><use href="#<?php echo esc_attr( $feature[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $feature[1] ); ?></h3>
						<p><?php echo esc_html( $feature[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Why choose -->
	<section class="igs-section gdc-how gcx-why" aria-labelledby="sal-why-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Why INFOFISCUS</span>
				<h2 id="sal-why-title">Why Choose INFOFISCUS Sales Analytics Snowflake Native Application?</h2>
			</div>
			<div class="gcx-why-grid">
				<div class="gcx-why-copy" data-igs-reveal>
					<p>The INFOFISCUS Sales Analytics Snowflake Native Application, deployed with the Snowflake Native App framework architecture, involves data ingestion from diverse sources, data extraction and transformation using Python, computing with a consumer Snowflake virtual warehouse, historic and incremental data load, and support for AI/ML libraries for insightful analytics.</p>
					<p>With Agentic AI, INFOFISCUS takes this a step further by enabling self-directed analytics, automated pipeline adjustments, and proactive recommendations. This empowers businesses to not only analyze sales data but also anticipate trends, detect anomalies, and optimize decisions in real time.</p>
					<p>INFOFISCUS addresses the challenge of extracting and transforming critical business data from ERP and CRM systems into Snowflake, leveraging modern BI, AI applications, and Agentic AI intelligence. The platform automates the entire process, handling data extraction, loading into Snowflake, and transforming it into analytics-ready insights.</p>
				</div>
				<ol class="gdc-chain gcx-chain-v" data-igs-reveal aria-label="How INFOFISCUS works">
					<li><span><?php infometry_ct_igs_img( $sfdc_icon, '' ); ?></span><b>ERP &amp; CRM sources</b><small>Salesforce, NetSuite, Workday</small></li>
					<li><span><svg><use href="#igs-code"/></svg></span><b>Extract &amp; transform</b><small>Python · historic &amp; incremental</small></li>
					<li><span><?php infometry_ct_igs_img( $sf_icon, '' ); ?></span><b>Snowflake virtual warehouse</b><small>Consumer compute</small></li>
					<li><span><svg><use href="#igs-bolt"/></svg></span><b>AI/ML &amp; Agentic AI</b><small>Dashboards · forecasts · alerts</small></li>
				</ol>
			</div>
		</div>
	</section>

	<!-- Value highlights -->
	<section class="igs-section gdc-inspect gcx-split" aria-labelledby="sal-val-title">
		<div class="igs-shell gdc-inspect-grid">
			<figure class="gcx-val-media" data-igs-reveal>
				<?php infometry_ct_sal_wp_img( 'elementor/thumbs/29765899_7559403-removebg-preview-1-300x300-1-rruxoix2gis35nloqg0yrsaj1hfgzirmyrpcs5ne4k.png', 'Illustration of a business professional analyzing sales dashboards with charts and graphs, alongside INFOFISCUS Sales Analytics Value Highlights listing benefits.' ); ?>
			</figure>
			<div class="gdc-inspect-copy" data-igs-reveal>
				<span class="igs-kicker">Value</span>
				<h2 id="sal-val-title">INFOFISCUS Sales Analytics Value Highlights</h2>
				<ul class="gcx-values">
					<?php foreach ( $sal_values as $value ) : ?>
						<li<?php echo $value[0] ? ' class="is-num"' : ''; ?>>
							<?php if ( $value[0] ) : ?>
								<b><?php echo esc_html( $value[0] ); ?></b> <span><?php echo esc_html( $value[1] ); ?></span>
							<?php else : ?>
								<svg><use href="#igs-check"/></svg><span><?php echo esc_html( $value[1] ); ?></span>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<!-- Architecture -->
	<section class="igs-section gcx-arch" aria-labelledby="sal-arch-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Architecture</span>
				<h2 id="sal-arch-title">INFOFISCUS Sales Analytics Snowflake Native App Architecture</h2>
			</div>
			<figure class="gcx-arch-fig" data-igs-reveal>
				<?php infometry_ct_sal_wp_img( '2024/10/INFOFISCUS-Sales-Analytics-Native-App-for-Snowflake-Architecture-1024x576.png', 'Architecture diagram of INFOFISCUS Sales Analytics Native App for Snowflake showing components like data pipelines, data models, customer DB, sales data mart, dashboards, reports, and what-if analysis INFOFISCUS Sales Analytics Native App Architecture for Snowflake', '', 1024, 576 ); ?>
			</figure>
		</div>
	</section>

	<!-- Video + contact -->
	<section class="igs-section gdc-videos gcx-videos" aria-labelledby="sal-video-title">
		<div class="igs-shell gcx-video-grid">
			<div class="gcx-video-copy" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="sal-video-title">Learn More About INFOFISCUS Sales Analytics Snowflake Native Application</h2>
				<div class="gcx-touch">
					<h2>Get in touch with us to know more about it</h2>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				</div>
			</div>
			<?php infometry_ct_sal_video_card( 'LXdNXzh3-qE', 'INFOFISCUS Sales Analytics Snowflake Native Application', 'Video', infometry_ct_sal_img_html( $sfdc_icon ), infometry_ct_sal_img_html( $sf_icon ) ); ?>
		</div>
		<?php infometry_ct_sal_video_modal(); ?>
	</section>

	<?php
	infometry_ct_sal_faq( array( 'id' => 'sal-faq', 'faqs' => $sal_faqs, 'email' => $support_email, 'bar' => 'Talk to our team about INFOFISCUS Sales Analytics' ) );

	infometry_ct_sal_related(
		'sal-related-title',
		'Other Products',
		array(
			array( 'url' => home_url( '/product/finance-analytics-native-app/' ), 'upload' => '2020/12/global-connectors-icon-1.png', 'alt' => 'Icon used to reperesent Connectors', 'title' => 'Finance Analytics Native App', 'copy' => 'This App leverages Snowflake’s analytical power to deliver deep insights, enhancing executive decision-making in financial planning and analysis.' ),
			array( 'url' => home_url( '/product/marketo-to-snowflake-connector/' ), 'upload' => '2021/01/analytics-solutions-icon-1.png', 'alt' => 'Infofiscus Analytics solutions', 'title' => 'Marketo Connector', 'copy' => 'Infometry’s Marketo Connector for Snowflake simplifies Marketo integration, bypassing the need for complex APIs and drivers.' ),
		)
	);

	infometry_ct_sal_cta(
		array(
			'id'        => 'freetrial',
			'anchor2'   => 'freetrialform',
			'title'     => 'Free Trial',
			'copy'      => 'Install INFOFISCUS Sales Analytics from the Snowflake Marketplace or ask us for a guided trial, and get sales pipeline, forecast, MQL and SQL insights without building a data warehouse.',
			'checks'    => array( 'Runs natively in Snowflake', 'Pre-built pipelines & models', 'Salesforce, NetSuite, Workday', 'Agentic AI-driven analytics' ),
			'resources' => array(
				array( 'url' => $guide_url, 'icon' => 'igs-down', 'title' => 'User guide', 'sub' => 'Implementation reference' ),
				array( 'url' => $sf_market_url, 'img' => $sf_icon, 'title' => 'Marketplace', 'sub' => 'Snowflake listing' ),
				array( 'url' => $contact_url, 'icon' => 'igs-chat', 'title' => 'Contact us', 'sub' => 'Talk to an expert' ),
			),
		)
	);

	infometry_ct_sal_footer();
	?>
</main>
<?php get_footer(); ?>
