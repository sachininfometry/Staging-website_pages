<?php
/**
 * Template Name: NetSuite to Snowflake Connector Product
 * Template Post Type: page, product
 *
 * Redesign of the INFOFISCUS NetSuite to Snowflake connector page on the shared connector
 * system (google-sheets-connector.css + google-drive-connector.css/.js + netsuite-snowflake-connector.css).
 * Every heading, paragraph, list item, image (with its alt text), video and link of the original
 * page is kept visible; the visuals are additions.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

/* Page helpers (this page only): uploads images, FAQ + schema, other products, free trial form, video, footer. */
if ( ! function_exists( 'infometry_ct_nss_upload' ) ) {
	/** URL of a file in wp-content/uploads (path after uploads/), so the original page images keep their URLs. */
	function infometry_ct_nss_upload( $path ) {
		return home_url( '/wp-content/uploads/' . ltrim( $path, '/' ) );
	}

	/** One of the original page's images, with its original alt text. */
	function infometry_ct_nss_wp_img( $path, $alt, $class = '', $width = 0, $height = 0 ) {
		printf(
			'<img%s src="%s" alt="%s"%s loading="lazy" decoding="async">',
			$class ? ' class="' . esc_attr( $class ) . '"' : '',
			esc_url( infometry_ct_nss_upload( $path ) ),
			esc_attr( $alt ),
			( $width && $height ) ? sprintf( ' width="%d" height="%d"', (int) $width, (int) $height ) : ''
		);
	}

	/** Tags allowed in FAQ answers and rich copy. */
	function infometry_ct_nss_allowed() {
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
	function infometry_ct_nss_sprite() {
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
	function infometry_ct_nss_faq( $args ) {
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
									<div class="gcx-faq-a"><?php echo wp_kses( false === strpos( $faq[1], '<p>' ) ? '<p>' . $faq[1] . '</p>' : $faq[1], infometry_ct_nss_allowed() ); ?></div>
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
	function infometry_ct_nss_related( $id, $title, $cards ) {
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
									infometry_ct_nss_wp_img( $card['upload'], $card['alt'] );
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
	function infometry_ct_nss_cta( $args ) {
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
					<?php if ( $args['copy'] ) : ?><p><?php echo wp_kses( $args['copy'], infometry_ct_nss_allowed() ); ?></p><?php endif; ?>
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
	function infometry_ct_nss_video_modal() {
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
	function infometry_ct_nss_video_card( $video_id, $title, $tag, $logo_a, $logo_b, $class = '' ) {
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
	function infometry_ct_nss_img_html( $url, $alt = '' ) {
		ob_start();
		infometry_ct_igs_img( $url, $alt );
		return ob_get_clean();
	}

	/** Site footer shared by the redesigned product pages. */
	function infometry_ct_nss_footer() {
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

$contact_url    = home_url( '/contact-us/' );
$sf_market_url  = 'https://app.snowflake.com/marketplace/providers/GZSTZ3867OQ/Infometry';
$odbc_guide_url = 'https://docs.google.com/document/d/1bPJKFO7UNkOznxYHizjvSSOLHcAi_jGM/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$api_guide_url  = 'https://docs.google.com/document/d/1Vj3cyVa-Vf2Gi0X3J7HS75H4uxPitxkn/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$img            = INFOMETRY_CT_URL . 'assets/images/';
$ns_icon        = $img . 'google-sheets/eco-netsuite.png';
$sf_icon        = $img . 'google-sheets/eco-snowflake.png';
$support_email  = 'info@infometry.net';

// Hero: NetSuite objects replicating into Snowflake (object, records, mode, table).
$nss_objects = array(
	array( 'Customer', '184,220', 'Incremental', 'NS_CUSTOMER' ),
	array( 'Sales Order', '1,204,918', 'Bulk', 'NS_SALES_ORDER' ),
	array( 'Invoice', '962,507', 'Incremental', 'NS_INVOICE' ),
	array( 'Vendor Bill', '311,846', 'Incremental', 'NS_VENDOR_BILL' ),
	array( 'Item', '48,390', 'Bulk', 'NS_ITEM' ),
);
$nss_jobs = array(
	array( 1, 'bulk', 'Bulk load', '1.2M records' ),
	array( 2, 'inc', 'Incremental sync', 'since 09:00' ),
	array( 0, 'meta', 'Create target table', 'from metadata' ),
	array( 3, 'inc', 'Incremental sync', 'since 09:00' ),
);

$nss_highlights = array(
	array( 'gcx-rocket', 'Improved Replication Performance & Reliability', 'Handle millions of records with confidence. The connector delivers up to 3 million records in less than an hour, ensuring error-free transfers without timeouts or delays.' ),
	array( 'gcx-table', 'Metadata-Driven Target Tables', 'Target tables are automatically created based on NetSuite metadata, with full support for STRING, DOUBLE, TIMESTAMP, and FLOAT data types.' ),
	array( 'igs-sync', 'Optimized ETL/ELT Pipelines', 'Accurate data types are applied at ingestion, eliminating unnecessary transformations and delivering faster, more efficient pipelines with reduced processing time.' ),
	array( 'gcx-clock', 'Best Practices for Performance', 'Built-in guidance helps you optimize bulk or incremental loads by scheduling jobs during off-peak hours, ensuring minimal impact on NetSuite performance.' ),
);

$nss_versions = array(
	array(
		'api',
		'1. NetSuite API Connector for Snowflake',
		'A pre-built, native application that seamlessly extracts NetSuite data into Snowflake with a single click.',
		array(
			array( 'igs-sync', 'One-Click Data Sync', 'Sync data in near real-time.' ),
			array( 'gcx-api', 'No API Knowledge Required', 'Skip custom pipelines or API complexity.' ),
			array( 'gcx-table', 'Landing Tables for Analytics', 'Access ready-to-use data in Snowflake.' ),
		),
	),
	array(
		'odbc',
		'2. NetSuite ODBC Connector for Snowflake',
		'A robust, pre-built application leveraging the NetSuite ODBC driver for high-frequency, high-volume data syncs.',
		array(
			array( 'gcx-plug', 'Easy ODBC Connectivity', 'Seamless, fast, and reliable data integration for effortless workflows.' ),
			array( 'gcx-clock', 'Near Real-Time Sync', 'Emphasizes both speed and accuracy in moving data' ),
			array( 'gcx-search', 'Simplified Access', 'Quick Snowflake insights with landing tables.' ),
		),
	),
);

$nss_stats = array(
	array( '99.9%', 'Uptime', 'Consistent, reliable, and uninterrupted data synchronization.' ),
	array( '150%', 'Faster Replication', 'Millions of records processed in record time.', 'Up to ' ),
	array( '50%', 'Cost Savings', 'Scalable architecture cuts overhead and boosts efficiency.' ),
	array( '30%', 'Faster Queries', 'Speed up decision-making with efficient schemas.' ),
	array( '100%', 'Data Accuracy', 'Accelerate your processes, reducing integration time from days to mere hours.' ),
	array( '100%', 'Data Security', 'Your data remains secure within the Snowflake environment.' ),
);

$nss_features = array(
	array( 'igs-layers', 'Incremental and Bulk Data Support', 'Easily manage incremental updates & large data loads' ),
	array( 'igs-db', 'High-Volume Processing', 'Efficiently process millions of rows in a single run.' ),
	array( 'igs-calendar', 'Automated Scheduling', 'Easily schedule data loads with built-in automation.' ),
	array( 'gcx-rocket', 'Quick Setup', 'Bypass ETL complexity—start instantly!' ),
);

$nss_logos = array(
	array( '2023/05/3-1-150x150.png', '3-1' ),
	array( '2023/05/2-1-150x150.png', '2-1' ),
	array( '2023/05/1-1-150x150.png', '1-1' ),
	array( '2023/05/11-2-1-150x150.png', 'Spansion Logo' ),
	array( '2023/05/10-1-1-150x150.png', '10-1-1' ),
	array( '2023/05/9-2-150x150.png', 'AMD Logo' ),
	array( '2023/05/8-2-150x150.png', 'Fusion.io Logo' ),
	array( '2023/05/7-2-150x150.png', 'SanDisk Logo' ),
	array( '2023/05/6-1-1-150x150.png', 'Sunrun Logo' ),
	array( '2023/05/5-2-150x150.png', 'Adaptive Insights Logo' ),
	array( '2023/05/4-1-150x150.png', 'Gymboree Logo Customer Stories' ),
);

$nss_faqs = array(
	array( 'What is the INFOFISCUS NetSuite ODBC Connector?', 'The INFOFISCUS NetSuite ODBC Connector is a comprehensive, pre-built connector available as a native application in the Snowflake Marketplace. It facilitates seamless integration between NetSuite and Snowflake, allowing for easy data extraction with a single click.' ),
	array( 'How can I benefit from using the INFOFISCUS NetSuite ODBC Connector?', 'The connector streamlines the data integration process, saving you time and resources. It’s a Native Application for Snowflake that provides near real-time data synchronization, allowing for accurate and up-to-date analytics. With our connector, you can focus on deriving insights rather than managing complex data pipelines.' ),
	array( 'Can I customize the synchronization settings?', 'Yes, you can customize the synchronization settings to select specific objects from NetSuite and define how frequently the data should be synced with Snowflake. This flexibility allows you to tailor the integration to your specific business needs.' ),
	array( 'What is the advantage of using a Snowflake Native App?', 'As a Snowflake Native App, the INFOFISCUS NetSuite ODBC Connector is optimized for seamless integration with Snowflake. This native compatibility ensures better performance, reliability, and ease of use compared to non-native solutions.' ),
	array(
		'What is the difference between Netsuite ODBC Connector and Netsuite API based connector?',
		'<p>Both the NetSuite ODBC Connector and the NetSuite API-Based Connector offer powerful methods to integrate and extract data from NetSuite, but they cater to different business needs and technical requirements. Let’s explore the unique strengths of each:</p>'
		. '<h4>NetSuite ODBC Connector</h4><ul>'
		. '<li><b>Seamless Data Extraction:</b> The ODBC Connector is a ready-to-use solution for direct access to NetSuite data using standard ODBC drivers. It is designed for businesses looking for an easy, plug-and-play option to extract data into Snowflake without the need for custom development.</li>'
		. '<li><b>No API Knowledge Required:</b> With the ODBC Connector, there’s no need to invest in learning or understanding NetSuite APIs or designing custom data pipelines. Data is synchronized in near real-time, making it ideal for companies seeking a simplified yet powerful integration solution.</li>'
		. '<li><b>Pre-Built Integration:</b> The connector is available as a pre-built Snowflake Native App, offering out-of-the-box connectivity, allowing users to select specific objects and set synchronization frequencies.</li></ul>'
		. '<h4>NetSuite API-Based Connector</h4><ul>'
		. '<li><b>Customizability:</b> The API-Based Connector offers more flexibility for businesses that need highly customized data extraction processes. With access to NetSuite’s APIs, users can create tailored integrations that address specific business requirements or complex data workflows.</li>'
		. '<li><b>Advanced Operations:</b> For companies that want to go beyond basic data extraction, the API-based connector provides advanced operations such as data manipulation, transformation, and real-time integration. This is especially useful for companies with complex data models and workflows that require deeper control over the integration process.</li>'
		. '<li><b>Developer Flexibility:</b> The API-based solution is ideal for businesses with in-house technical teams that prefer to build custom pipelines, offering flexibility to define how data is processed, integrated, and transformed.</li></ul>'
		. '<h4>Complementary Solutions</h4>'
		. '<p>Both connectors provide secure, reliable integration between NetSuite and Snowflake, ensuring data integrity and near real-time synchronization.</p>'
		. '<p>For businesses that prioritize ease of use and rapid setup, the NetSuite ODBC Connector is an excellent choice. On the other hand, organizations looking for deeper customization and control may find the NetSuite API-Based Connector more suitable.</p>'
		. '<p>By leveraging the right connector for your specific business needs, you can efficiently harness the full potential of NetSuite and Snowflake to enhance your data integration and analytics capabilities.</p>',
	),
	array(
		'How to Get Started using Netsuite ODBC and Netsuite to Snowflake Connector?',
		'<h4>1. Getting Started with NetSuite ODBC Connector:</h4><ul>'
		. '<li><b>Step 1: Install the ODBC Connector</b><br>Begin by downloading the INFOFISCUS NetSuite ODBC Connector from the Snowflake Marketplace. Once installed, configure it with your NetSuite Suite analytics credentials.</li>'
		. '<li><b>Step 2: Configure Connection Settings</b><br>Set up your connection by specifying the necessary parameters such as Host Id, Password, etc. The pre-built interface makes this step quick and user-friendly.</li>'
		. '<li><b>Step 3: Sync Data to Snowflake</b><br>With a single click, you can begin synchronizing your NetSuite data into Snowflake. The near real-time syncing ensures you always have up-to-date information for analytics.</li>'
		. '<li><b>Step 4: Analyze Data</b><br>Once the data is synced into Snowflake, access your Landing tables and begin building your analytical layer to derive valuable insights.</li></ul>'
		. '<h4>2. Getting Started with NetSuite API-Based Connector:</h4><ul>'
		. '<li><b>Step 1: Access NetSuite APIs</b><br>Obtain your NetSuite API credentials and access tokens. You’ll need this information to authenticate and connect to NetSuite using the API-based connector.</li>'
		. '<li><b>Step 2: Define API Integration Requirements</b><br>Identify the specific data objects you want to integrate and decide on the customizations required for your business. The flexibility of the API allows you to define the scope of your data extraction and operations.</li>'
		. '<li><b>Step 3: Build Custom Pipelines</b><br>Work with your development team to create tailored data pipelines. You can set up specific rules for data transformation, syncing schedules, and real-time updates based on your business logic.</li>'
		. '<li><b>Step 4: Integrate with Snowflake</b><br>Once the API-based pipeline is set up. This will allow you to directly push NetSuite data into Snowflake for storage, processing, and analysis.</li></ul>'
		. '<h4>Which Connector Should I Choose?</h4>'
		. '<p>For businesses looking for a hassle-free, quick-to-deploy solution, the NetSuite ODBC Connector is an ideal choice. However, if you require extensive customization and deeper control over data workflows, the NetSuite API-Based Connector will offer the flexibility and advanced capabilities you need.</p>'
		. '<p>Whichever you choose, both connectors empower you to integrate NetSuite seamlessly with Snowflake, maximizing your business intelligence and analytics potential.</p>',
	),
	array( 'What is Infometry’s NetSuite to Snowflake Connector?', 'Infometry’s NetSuite to Snowflake Connector, part of the INFOFISCUS Snowflake Native Application, is a NO CODE solution designed to extract data from NetSuite applications in near real-time and sync it into Snowflake.' ),
	array( 'How does the NetSuite to Snowflake Connector simplify data integration?', 'Our connector eliminates the need for expensive ETL tools or complex data pipeline code by providing a no-code solution that installs directly within your Snowflake account, facilitating seamless data synchronization from NetSuite.' ),
	array( 'What are the key benefits of using Infometry’s NetSuite to Snowflake Connector?', '<ul><li><b>Real-Time Data Synchronization:</b> Ensures your data is always up-to-date.</li><li><b>User-Friendly Configuration:</b> Easy setup and management with an intuitive interface.</li><li><b>Scalability:</b> Robust architecture that handles growing data volumes seamlessly.</li><li><b>Enhanced Security:</b> Advanced encryption and secure transfer protocols.</li><li><b>Comprehensive Support:</b> Dedicated support team available to assist you.</li></ul>' ),
	array( 'How does the connector improve business operations?', '<ul><li><b>99.9% Uptime:</b> Reliable and continuous data synchronization.</li><li><b>90% Faster Data Integration:</b> Reduces integration time from days to hours.</li><li><b>Up to 50% Reduction in Operational Costs:</b> Efficient data integration leads to significant cost savings.</li><li><b>30% Improvement in Data Query Performance:</b> Faster data queries enhance decision-making capabilities.</li><li><b>100% Data Accuracy:</b> Ensures accurate and consistent data transfers.</li></ul>' ),
	array( 'What makes Infometry’s connector different from other data integration solutions?', 'Our connector provides lightning-fast data processing, real-time synchronization, unparalleled scalability, and performance optimized for large-scale data operations. The user-friendly interface and automated workflows make data management simple and efficient.' ),
	array( 'Can Infometry’s connector handle large volumes of data?', 'Yes, our connector is designed to handle massive data volumes, scaling seamlessly from thousands to millions of records while maintaining top-notch performance.' ),
	array( 'What kind of support does Infometry provide?', 'Infometry offers comprehensive support through a dedicated team ready to assist you throughout your data integration journey. Our customers report a 95% satisfaction rate, thanks to our reliable support and service offerings.' ),
	array( 'Are there customization options available?', 'Yes, Infometry provides tailored solutions to meet the unique requirements of your business, along with expert consultation and implementation support to guide you through every step of the integration process.' ),
);
?>
<main class="igs-page gdc-page gcx-page gcx-snow gcx-netsuite" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php infometry_ct_nss_sprite(); ?>

	<!-- Hero -->
	<section class="igs-hero gdc-hero gcx-hero" aria-labelledby="nss-title">
		<div class="igs-shell gdc-hero-grid">
			<div class="gdc-hero-copy">
				<span class="gdc-badge"><?php infometry_ct_igs_img( $sf_icon, '' ); ?>INFOFISCUS NetSuite Connector 3.0 · Snowflake Native App</span>
				<h1 id="nss-title">NetSuite to Snowflake Connector | <em>Real-Time ERP Data Integration</em></h1>
				<p>Migrating or syncing data from NetSuite to Snowflake can be complex, often requiring costly ETL tools or custom code to overcome NetSuite’s API limitations. Customers want a simple, no-code solution to replicate data with minimal effort.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary gdc-btn-drive" href="#request-demo">Request a Free Demo <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-out"/></svg> Snowflake Marketplace</a>
				</div>
				<ul class="gdc-hero-drives" aria-label="Connector versions">
					<li><svg><use href="#gcx-api"/></svg>API Connector</li>
					<li><svg><use href="#gcx-plug"/></svg>ODBC Connector</li>
					<li><svg><use href="#igs-code"/></svg>No-code</li>
					<li><svg><use href="#gcx-clock"/></svg>Near real-time</li>
				</ul>
				<p class="gdc-hero-links">
					<a href="<?php echo esc_url( $api_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg>API Connector User Guide<svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $odbc_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg>ODBC Connector User Guide<svg><use href="#igs-out"/></svg></a>
				</p>
			</div>

			<div class="gdc-stage gcx-stage" data-gdc-stage aria-label="Animated example: NetSuite objects replicate into Snowflake tables with bulk and incremental loads through the INFOFISCUS Snowflake Native App">
				<div class="gdc-window gcx-window" aria-hidden="true">
					<div class="gdc-win-top">
						<span class="gdc-win-logo"><?php infometry_ct_igs_img( $ns_icon, '' ); ?><b>NetSuite → Snowflake</b></span>
						<span class="gcx-win-tag">ENV: PROD</span>
					</div>
					<div class="gcx-tbl gcx-tbl-ns">
						<div class="gcx-tr is-head"><span>NetSuite object</span><span>Records</span><span>Load</span><span>Snowflake table</span></div>
						<ul class="gcx-rows">
							<?php foreach ( $nss_objects as $i => $obj ) : ?>
								<li class="gcx-tr" data-gdc-file="<?php echo (int) $i; ?>">
									<span><i></i><?php echo esc_html( $obj[0] ); ?></span>
									<span><?php echo esc_html( $obj[1] ); ?></span>
									<span><em class="gcx-pill<?php echo 'Bulk' === $obj[2] ? ' is-bulk' : ''; ?>"><?php echo esc_html( $obj[2] ); ?></em></span>
									<span><code><?php echo esc_html( $obj[3] ); ?></code></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="gdc-queue gcx-queue">
					<header>
						<span><?php infometry_ct_igs_img( $sf_icon, '' ); ?></span>
						<div><b>Replication jobs</b><small>INFOFISCUS · Snowflake Native App</small></div>
						<em data-gdc-count><?php echo count( $nss_jobs ); ?> of <?php echo count( $nss_jobs ); ?> done</em>
					</header>
					<ol>
						<?php foreach ( $nss_jobs as $job ) : ?>
							<li class="is-<?php echo esc_attr( $job[1] ); ?>" data-gdc-job="<?php echo (int) $job[0]; ?>">
								<span class="gdc-job-ic"><svg><use href="#<?php echo esc_attr( array( 'bulk' => 'igs-db', 'inc' => 'igs-sync', 'meta' => 'gcx-table' )[ $job[1] ] ); ?>"/></svg></span>
								<div class="gdc-job-text">
									<b><?php echo esc_html( $job[2] ); ?> <span><?php echo esc_html( $nss_objects[ $job[0] ][0] ); ?></span></b>
									<small>→ <?php echo esc_html( $job[3] ); ?></small>
									<i class="gdc-job-bar"><i></i></i>
								</div>
								<span class="gdc-job-state"><svg><use href="#igs-check"/></svg></span>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
				<span class="gdc-chip is-auth" aria-hidden="true"><svg><use href="#gcx-rocket"/></svg>3M records &lt; 1 hour</span>
				<span class="gdc-chip is-store" aria-hidden="true"><svg><use href="#igs-shield"/></svg>Data stays in Snowflake</span>
			</div>
		</div>
	</section>

	<!-- Intro + Version 3.0 -->
	<section class="igs-section gdc-inspect gcx-split" aria-labelledby="nss-fast-title">
		<div class="igs-shell gdc-inspect-grid">
			<div class="gdc-inspect-copy" data-igs-reveal>
				<span class="igs-kicker">INFOFISCUS NetSuite Connector 3.0</span>
				<h2 id="nss-fast-title">The #1 Fastest NetSuite Connector for Snowflake</h2>
				<p>Infometry’s INFOFISCUS NetSuite Connector for Snowflake delivers exactly that—a next-gen, no-code native application that extracts and replicates NetSuite data directly into your Snowflake account with blazing speed and reliability. Available on the <a href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener">Snowflake Marketplace</a>, this connector ensures seamless, near real-time data synchronization without the hassle of ETL or manual processes.</p>
				<p>With the newly released INFOFISCUS NetSuite Connector 3.0, customers gain access to massive performance improvements, accurate schema generation, and optimized pipelines—all built natively for Snowflake.</p>
			</div>
			<div class="gcx-speed" data-igs-reveal aria-hidden="true">
				<div class="gcx-speed-head"><span><?php infometry_ct_igs_img( $ns_icon, '' ); ?></span><i></i><span><?php infometry_ct_igs_img( $sf_icon, '' ); ?></span></div>
				<b class="gcx-speed-num">3,000,000</b>
				<small>records replicated in less than an hour</small>
				<div class="gcx-speed-bar"><i></i></div>
				<ul>
					<li><svg><use href="#igs-check"/></svg>No timeouts</li>
					<li><svg><use href="#igs-check"/></svg>Error-free transfers</li>
					<li><svg><use href="#igs-check"/></svg>Accurate data types</li>
				</ul>
			</div>
		</div>
		<div class="igs-shell">
			<h2 class="gcx-subhead" data-igs-reveal>Key Highlights of Version 3.0</h2>
			<div class="gcx-cards4">
				<?php foreach ( $nss_highlights as $i => $item ) : ?>
					<article class="gdc-tile gcx-tile is-c<?php echo (int) $i; ?>" data-igs-reveal>
						<span class="gdc-tile-ic"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $item[1] ); ?></h3>
						<p><?php echo esc_html( $item[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Two versions -->
	<section class="igs-section gcx-versions" aria-labelledby="nss-versions-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">API or ODBC</span>
				<h2 id="nss-versions-title">Two Powerful Connector Versions</h2>
				<p>Infometry offers two types of connectors to meet your integration needs:</p>
			</div>
			<div class="gcx-vs">
				<?php foreach ( $nss_versions as $version ) : ?>
					<article class="gcx-vs-card is-<?php echo esc_attr( $version[0] ); ?>" data-igs-reveal>
						<span class="gcx-vs-tag"><svg><use href="#<?php echo 'api' === $version[0] ? 'gcx-api' : 'gcx-plug'; ?>"/></svg><?php echo 'api' === $version[0] ? 'API' : 'ODBC'; ?></span>
						<h2><?php echo esc_html( $version[1] ); ?></h2>
						<p><?php echo esc_html( $version[2] ); ?></p>
						<ul>
							<?php foreach ( $version[3] as $point ) : ?>
								<li><span><svg><use href="#<?php echo esc_attr( $point[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $point[1] ); ?></h3><p><?php echo esc_html( $point[2] ); ?></p></div></li>
							<?php endforeach; ?>
						</ul>
						<a class="gcx-vs-link" href="<?php echo esc_url( 'api' === $version[0] ? $api_guide_url : $odbc_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg><?php echo 'api' === $version[0] ? 'API Connector User Guide' : 'ODBC Connector User Guide'; ?></a>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="gcx-choose" data-igs-reveal>
				<div>
					<h2>Choose Your Ideal Connector and Start Syncing!</h2>
					<p>Both connectors offer powerful, easy-to-use solutions to move your NetSuite data to Snowflake in near real-time. Explore both solutions on the Snowflake Marketplace and unlock seamless NetSuite data integration today!</p>
				</div>
				<div class="gcx-choose-btns">
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $odbc_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> ODBC Connector User Guide</a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $api_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> API Connector User Guide</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Why choose: numbers -->
	<section class="igs-section gdc-how gcx-stats-sec" aria-labelledby="nss-why-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Proven results</span>
				<h2 id="nss-why-title">Why Choose INFOFISCUS Connectors?</h2>
				<h3 class="gcx-head-sub">Exceptional Results in Numbers:</h3>
			</div>
			<div class="gcx-stats">
				<?php foreach ( $nss_stats as $stat ) : ?>
					<article data-igs-reveal>
						<h3><?php echo isset( $stat[3] ) ? '<small>' . esc_html( trim( $stat[3] ) ) . '</small> ' : ''; ?><b><?php echo esc_html( $stat[0] ); ?></b> <?php echo esc_html( $stat[1] ); ?></h3>
						<p><?php echo esc_html( $stat[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Key features -->
	<section class="igs-section gcx-features" aria-labelledby="nss-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Key features</span>
				<h2 id="nss-feat-title">Key Features of NetSuite API/ODBC Connector</h2>
			</div>
			<div class="gcx-cards4">
				<?php foreach ( $nss_features as $i => $item ) : ?>
					<article class="gdc-tile gcx-tile is-c<?php echo (int) $i; ?>" data-igs-reveal>
						<span class="gdc-tile-ic"><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $item[1] ); ?></h3>
						<p><?php echo esc_html( $item[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Get started -->
	<section class="igs-section gcx-steps-sec" aria-labelledby="nss-steps-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="nss-steps-title">Get Started in 4 Easy Steps</h2>
			</div>
			<ol class="gcx-steps">
				<li data-igs-reveal><b>1</b><h3>Step 1:</h3><p><a href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener">Visit the Snowflake Marketplace</a> – Ensure your Snowflake paid subscription is active.</p></li>
				<li data-igs-reveal><b>2</b><h3>Step 2:</h3><p>Search INFOFISCUS Connectors – Select either API or ODBC, then click ‘Get’ to start integrating your data.</p></li>
				<li data-igs-reveal><b>3</b><h3>Step 3:</h3><p>Set up your connection by entering your NetSuite details and testing it to ensure everything works smoothly.</p></li>
				<li data-igs-reveal><b>4</b><h3>Step 4:</h3><p>Start Syncing Data – Select your environment (QA, DEV, PROD) and replicate with a click.</p></li>
			</ol>
			<p class="gcx-closing" data-igs-reveal>Unlock seamless, blazing-fast, and reliable NetSuite-to-Snowflake integration with INFOFISCUS NetSuite Connector 3.0—your simplest path to real-time analytics and smarter decisions.</p>
		</div>
	</section>

	<!-- Architecture -->
	<section class="igs-section gcx-arch" aria-labelledby="nss-arch-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Architecture</span>
				<h2 id="nss-arch-title">Architecture of INFOFISCUS Connector for NetSuite - Snowflake</h2>
			</div>
			<figure class="gcx-arch-fig" data-igs-reveal>
				<?php infometry_ct_nss_wp_img( '2024/10/INFOFISCUS-NetSuite-Connector-Native-App-for-Snowflake-Architecture-1024x486.png', 'Architecture diagram of the INFOFISCUS NetSuite Connector Native App for Snowflake enabling data synchronization between NetSuite and Snowflake using API or ODBC-based connectivity.', '', 1024, 486 ); ?>
			</figure>
		</div>
	</section>

	<!-- Videos -->
	<section class="igs-section gdc-videos gcx-videos" aria-labelledby="nss-video-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="nss-video-title">Learn More About INFOFISCUS Connector for NetSuite - Snowflake</h2>
			</div>
			<div class="gdc-video-grid">
				<?php
				infometry_ct_nss_video_card( 'qF3ZnsvyUE8', 'INFOFISCUS NetSuite to Snowflake Connector', 'Video', infometry_ct_nss_img_html( $ns_icon ), infometry_ct_nss_img_html( $sf_icon ) );
				infometry_ct_nss_video_card( 'IKSrRt4jtDE', 'NetSuite data into Snowflake with the INFOFISCUS Native App', 'Video', infometry_ct_nss_img_html( $ns_icon ), infometry_ct_nss_img_html( $sf_icon ), 'is-down' );
				?>
			</div>
		</div>
		<?php infometry_ct_nss_video_modal(); ?>
	</section>

	<!-- Demo request -->
	<section class="igs-cta gdc-cta gcx-cta" id="request-demo" aria-labelledby="nss-demo-title">
		<span id="freetrial" class="gcx-anchor"></span>
		<div class="igs-shell igs-cta-grid">
			<div class="igs-cta-copy">
				<span class="igs-kicker">Free demo</span>
				<h2 id="nss-demo-title">Request a Free Demo of the NetSuite to Snowflake Connector</h2>
				<p>See how INFOFISCUS replicates your NetSuite data into Snowflake in near real-time, with no code and no ETL tools.</p>
				<div class="gcx-cta-illus"><?php infometry_ct_nss_wp_img( '2024/07/Checklist-pana-e1721328731448-1024x910.png', 'Illustration of a woman checking off tasks on a large clipboard checklist, representing why choose infometry', '', 1024, 910 ); ?></div>
			</div>
			<div class="igs-form">
				<h3>Request a Free Demo</h3>
				<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
					<?php echo do_shortcode( '[wpforms id="376110" title="false" description="false"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<p>The request form is temporarily unavailable. Email us at <a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>.</p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Customers -->
	<section class="igs-section gcx-logos" aria-labelledby="nss-logos-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Customers</span>
				<h2 id="nss-logos-title">Trusted by 150+ Customers Worldwide</h2>
			</div>
			<ul class="gcx-logo-row" data-igs-reveal>
				<?php foreach ( $nss_logos as $logo ) : ?>
					<li><?php infometry_ct_nss_wp_img( $logo[0], $logo[1], '', 150, 150 ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<?php
	infometry_ct_nss_faq( array( 'id' => 'nss-faq', 'faqs' => $nss_faqs, 'email' => $support_email, 'bar' => 'Our team helps you through every step of your integration' ) );

	infometry_ct_nss_related(
		'nss-related-title',
		'Other Products',
		array(
			array( 'url' => home_url( '/product/marketo-to-snowflake-connector/' ), 'upload' => '2020/12/global-connectors-icon-1.png', 'alt' => 'Icon used to reperesent Connectors', 'title' => 'Marketo Connector', 'copy' => 'Infometry’s Marketo Connector for Snowflake simplifies Marketo integration, bypassing the need for complex APIs and drivers.' ),
			array( 'url' => home_url( '/product/sales-analytics-native-app/' ), 'upload' => '2020/12/analytics-solutions-icon.png', 'alt' => 'Analytics icon reperesenting Google Connectors', 'title' => 'Sales Analytics Native App', 'copy' => 'INFOFISCUS Sales Analytics on Snowflake efficiently handles data ingestion, transformation, and AI/ML-powered analytics.' ),
		)
	);

	infometry_ct_nss_footer();
	?>
</main>
<?php get_footer(); ?>
