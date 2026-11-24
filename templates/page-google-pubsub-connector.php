<?php
/**
 * Template Name: Google Pub/Sub Connector Product
 * Template Post Type: page, product
 *
 * Redesign of the Google Pub/Sub connector page on the shared connector system
 * (google-sheets-connector.css + google-drive-connector.css/.js + google-pubsub-connector.css).
 * Every heading, paragraph, list item, image (with its alt text) and link of the original
 * page is kept visible; the visuals are additions.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

/* Page helpers (this page only): uploads images, FAQ + schema, other products, free trial form, video, footer. */
if ( ! function_exists( 'infometry_ct_gps_upload' ) ) {
	/** URL of a file in wp-content/uploads (path after uploads/), so the original page images keep their URLs. */
	function infometry_ct_gps_upload( $path ) {
		return home_url( '/wp-content/uploads/' . ltrim( $path, '/' ) );
	}

	/** One of the original page's images, with its original alt text. */
	function infometry_ct_gps_wp_img( $path, $alt, $class = '', $width = 0, $height = 0 ) {
		printf(
			'<img%s src="%s" alt="%s"%s loading="lazy" decoding="async">',
			$class ? ' class="' . esc_attr( $class ) . '"' : '',
			esc_url( infometry_ct_gps_upload( $path ) ),
			esc_attr( $alt ),
			( $width && $height ) ? sprintf( ' width="%d" height="%d"', (int) $width, (int) $height ) : ''
		);
	}

	/** Tags allowed in FAQ answers and rich copy. */
	function infometry_ct_gps_allowed() {
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
	function infometry_ct_gps_sprite() {
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
	function infometry_ct_gps_faq( $args ) {
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
									<div class="gcx-faq-a"><?php echo wp_kses( false === strpos( $faq[1], '<p>' ) ? '<p>' . $faq[1] . '</p>' : $faq[1], infometry_ct_gps_allowed() ); ?></div>
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
	function infometry_ct_gps_related( $id, $title, $cards ) {
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
									infometry_ct_gps_wp_img( $card['upload'], $card['alt'] );
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
	function infometry_ct_gps_cta( $args ) {
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
					<?php if ( $args['copy'] ) : ?><p><?php echo wp_kses( $args['copy'], infometry_ct_gps_allowed() ); ?></p><?php endif; ?>
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
	function infometry_ct_gps_video_modal() {
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
	function infometry_ct_gps_video_card( $video_id, $title, $tag, $logo_a, $logo_b, $class = '' ) {
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
	function infometry_ct_gps_img_html( $url, $alt = '' ) {
		ob_start();
		infometry_ct_igs_img( $url, $alt );
		return ob_get_clean();
	}

	/** Site footer shared by the redesigned product pages. */
	function infometry_ct_gps_footer() {
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

$contact_url     = home_url( '/contact-us/' );
$marketplace_url = 'https://marketplace.informatica.com/listings/cloud/connectors/googlepubsub-connector.html';
$guide_url       = 'https://drive.google.com/file/d/1RSZlV9ZAMWFlb6HdLAmn_0eqoMHewO_n/view?usp=sharing';
$g2_url          = 'https://www.g2.com/products/google-pub-sub-connector-for-informatica-idmc/reviews/google-pub-sub-connector-for-informatica-idmc-review-10220928';
$img             = INFOMETRY_CT_URL . 'assets/images/';
$ps_icon         = $img . 'google-connectors/google-pubsub.png';
$idmc_icon       = $img . 'informatica-product-mark.png';
$support_email   = 'info@infometry.net';

// Hero: messages on a topic (id, event, attributes, published).
$gps_msgs = array(
	array( '8301742619', 'order.created', 'source=salesforce', '09:41:02' ),
	array( '8301742620', 'invoice.posted', 'source=netsuite', '09:41:05' ),
	array( '8301742623', 'order.updated', 'source=salesforce', '09:41:09' ),
	array( '8301742627', 'shipment.sent', 'source=erp', '09:41:14' ),
	array( '8301742631', 'payment.received', 'source=netsuite', '09:41:18' ),
);
$gps_jobs = array(
	array( 0, 'pub', 'Publish to topic', 'orders-events' ),
	array( 1, 'pull', 'Pull from subscription', 'idmc-sub' ),
	array( 2, 'sub', 'Create subscription', 'analytics-sub' ),
	array( 4, 'snap', 'Create snapshot', 'orders-snap' ),
);

$gps_connector = array(
	'Publish to Topics and retrieve messages from subscriptions dynamically',
	'Supports multiple operations',
	'Unlimited usage – no restrictions on endpoints',
	'Integrates seamlessly with Salesforce and other applications',
	'Supports both Data Synchronization and Mapping Tasks',
);

$gps_steps = array(
	array( 'Enable it from IDMC', 'Enable it from IDMC (Formerly known as IICS) and contact us for activating the license.' ),
	array( 'Request from the Marketplace', 'Customers can go to Informatica Marketplace, search for Infometry’s Connector, and click on Start Free Trial to send us a request.' ),
	array( 'Paid or subscription licenses', 'For paid or subscription licenses, reach out to us directly for provisioning.' ),
	array( 'Choose your license', 'Two license models are available: Trial license (valid for 30 days) & Paid subscription license' ),
);

$gps_features = array(
	array( 'gcx-send', 'Asynchronous Messaging', 'Decouples services that produce events from services that process events.' ),
	array( 'gcx-inbox', 'Event Ingestion & Delivery', 'Ideal for streaming analytics pipelines.' ),
	array( 'igs-shield', 'Enterprise-Grade Reliability', 'Offers durable message storage and real-time delivery with high availability.' ),
	array( 'gcx-globe', 'Global Scalability', 'Pub/Sub servers available in all Google Cloud regions.' ),
	array( 'igs-layers', 'Comprehensive Operations', 'Publish and pull messages, create/update/delete topics, subscriptions, and snapshots.' ),
	array( 'igs-db', 'Supports CRUD Operations', 'Read, insert, and delete data on Google Pub/Sub targets.' ),
);

$gps_uses = array(
	array( 'Integrate 350+ applications with Google Pub/Sub.', array( array( 'igs-nodes', '350+ applications' ), array( 'idmc', 'IDMC' ), array( 'ps', 'Pub/Sub' ) ) ),
	array( 'Gather events from multiple clients simultaneously.', array( array( 'gcx-users', 'Multiple clients' ), array( 'gcx-send', 'Events' ), array( 'ps', 'Topic' ) ) ),
	array( 'Enable real-time event-driven architectures in analytics and business workflows.', array( array( 'ps', 'Events' ), array( 'igs-sync', 'Workflows' ), array( 'igs-chart', 'Analytics' ) ) ),
	array( 'Create, read, and delete Google Pub/Sub topics, subscriptions, and snapshots.', array( array( 'igs-plus', 'Create' ), array( 'gcx-search', 'Read' ), array( 'gcx-trash', 'Delete' ) ) ),
	array( 'Power streaming analytics platforms with Agentic AI-enabled orchestration for smarter event routing and decisioning.', array( array( 'igs-bolt', 'Agentic AI' ), array( 'gcx-send', 'Event routing' ), array( 'gcx-trend', 'Decisioning' ) ) ),
);

$gps_faqs = array(
	array( 'What are the types of Licenses you offer?', 'We have two licensing Model, Prod and Non-Prod. Infometry connector annual subscription license is charged for a given OrgID. Customers will get un-limited usage of the connectors within an OrgID.' ),
	array( 'How Updates on the new features are released to the customer?', 'Infometry Connector team continue to add new features and support newer API releases for each product Infometry release cycles are synched with the Informatica Cloud platform and customers will get the updates automatically along with IICS release updates. All our new releases are auto-updated at the customer end and are free of charge.' ),
	array( 'Whom to contact for Implementation and License?', 'You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>' ),
	array( 'Is Infometry’s Google Pub/Sub Connector Certified by Informatica?', 'Yes, All our connector are 100% Certified by Informatica and also listed on <a href="' . $marketplace_url . '" target="_blank" rel="noopener">Informatica marketplace</a>.' ),
	array( 'How does your Customer Support work?', 'Our Support is available 24/7 and we provide local time-zone support to all our customers globally.' ),
	array( 'How Infometry charge for the connector?', 'All our connectors are charged based on the number of Prod and Non-Prod licenses subscribed by the customer and it’s completely independent of the number/size of the data/rows processed.' ),
	array( 'How soon business users can onboard and start using the connector?', 'In most cases, it is immediate.' ),
	array( 'What is the validity of the Infometry Connector license?', 'All our licenses are charged annually. And valid for 1 year' ),
	array( 'How Infometry offers Technical Support?', 'It’s available 24/7 with a turnaround time of 24-48 hours. You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>' ),
	array( 'How secure is my data?', 'All our Connectors and their updates are verified by Informatica before reaching out to the customer. Also, our connectors are activated by informatica and work in your IICS environment. Connectors do not hold any data. Our connector ensures highly secured data transfers.' ),
);

$gps_step_icon = function ( $key ) use ( $ps_icon, $idmc_icon ) {
	if ( 'ps' === $key ) {
		infometry_ct_igs_img( $ps_icon, '' );
	} elseif ( 'idmc' === $key ) {
		infometry_ct_igs_img( $idmc_icon, '' );
	} else {
		printf( '<svg><use href="#%s"/></svg>', esc_attr( $key ) );
	}
};
?>
<main class="igs-page gdc-page gcx-page gcx-pubsub" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php infometry_ct_gps_sprite(); ?>

	<!-- Hero -->
	<section class="igs-hero gdc-hero gcx-hero" aria-labelledby="gps-title">
		<div class="igs-shell gdc-hero-grid">
			<div class="gdc-hero-copy">
				<span class="gdc-badge"><?php infometry_ct_igs_img( $ps_icon, '' ); ?>Google Pub/Sub Connector · 100% Informatica Certified</span>
				<h1 id="gps-title">Infometry’s Google Pub/Sub Connector for <em>Informatica</em></h1>
				<p>Infometry’s Google Pub/Sub Connector for Informatica IDMC is 100% Informatica Certified, providing a seamless, native interface for integrating Pub/Sub APIs with on-premise or cloud applications like Salesforce and NetSuite. With this connector, users can effortlessly publish and pull messages from Google Pub/Sub.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary gdc-btn-drive" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<ul class="gdc-hero-drives" aria-label="Pub/Sub resources">
					<li><svg><use href="#gcx-send"/></svg>Topics</li>
					<li><svg><use href="#gcx-inbox"/></svg>Subscriptions</li>
					<li><svg><use href="#gcx-camera"/></svg>Snapshots</li>
					<li><svg><use href="#gcx-mail"/></svg>Messages</li>
				</ul>
				<p class="gdc-hero-links">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?>Informatica Marketplace<svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><svg class="is-star"><use href="#gcx-star"/></svg>G2 Product Review<svg><use href="#igs-out"/></svg></a>
				</p>
			</div>

			<div class="gdc-stage gcx-stage" data-gdc-stage aria-label="Animated example: messages are published to a Google Pub/Sub topic and pulled from subscriptions through the Infometry connector in Informatica IDMC">
				<div class="gdc-window gcx-window" aria-hidden="true">
					<div class="gdc-win-top">
						<span class="gdc-win-logo"><?php infometry_ct_igs_img( $ps_icon, '' ); ?><b>Pub/Sub</b></span>
						<span class="gdc-win-search"><svg><use href="#gcx-send"/></svg>projects/acme/topics/orders-events</span>
						<span class="gcx-win-tag is-live"><i></i>Streaming</span>
					</div>
					<div class="gcx-tbl gcx-tbl-ps">
						<div class="gcx-tr is-head"><span>Message ID</span><span>Event</span><span>Attributes</span><span>Published</span></div>
						<ul class="gcx-rows">
							<?php foreach ( $gps_msgs as $i => $msg ) : ?>
								<li class="gcx-tr" data-gdc-file="<?php echo (int) $i; ?>">
									<span><i></i><code><?php echo esc_html( $msg[0] ); ?></code></span>
									<span><?php echo esc_html( $msg[1] ); ?></span>
									<span><code><?php echo esc_html( $msg[2] ); ?></code></span>
									<span><?php echo esc_html( $msg[3] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="gdc-queue gcx-queue">
					<header>
						<span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
						<div><b>Pub/Sub operations</b><small>Informatica IDMC · Secure Agent</small></div>
						<em data-gdc-count><?php echo count( $gps_jobs ); ?> of <?php echo count( $gps_jobs ); ?> done</em>
					</header>
					<ol>
						<?php foreach ( $gps_jobs as $job ) : ?>
							<li class="is-<?php echo esc_attr( $job[1] ); ?>" data-gdc-job="<?php echo (int) $job[0]; ?>">
								<span class="gdc-job-ic"><svg><use href="#<?php echo esc_attr( array( 'pub' => 'gcx-send', 'pull' => 'gcx-inbox', 'sub' => 'igs-plus', 'snap' => 'gcx-camera' )[ $job[1] ] ); ?>"/></svg></span>
								<div class="gdc-job-text">
									<b><?php echo esc_html( $job[2] ); ?> <span><?php echo esc_html( $gps_msgs[ $job[0] ][1] ); ?></span></b>
									<small>→ <?php echo esc_html( $job[3] ); ?></small>
									<i class="gdc-job-bar"><i></i></i>
								</div>
								<span class="gdc-job-state"><svg><use href="#igs-check"/></svg></span>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
				<span class="gdc-chip is-auth" aria-hidden="true"><svg><use href="#gcx-globe"/></svg>All Google Cloud regions</span>
				<span class="gdc-chip is-store" aria-hidden="true"><svg><use href="#igs-shield"/></svg>No data stored</span>
			</div>
		</div>
	</section>

	<!-- The connector -->
	<section class="igs-section gdc-inspect gcx-split" aria-labelledby="gps-conn-title">
		<div class="igs-shell gdc-inspect-grid">
			<div class="gdc-inspect-copy" data-igs-reveal>
				<span class="igs-kicker">Native IDMC interface</span>
				<h2 id="gps-conn-title">Informatica Google Pub/Sub Connector</h2>
				<p>Designed for smooth data integration, the connector enables direct connectivity between Informatica IDMC and Google Pub/Sub. It supports both source and target functions in mappings and mapping tasks. When executing a task or mapping, the Secure Agent leverages Google Pub/Sub’s JAVA client libraries to ensure secure and efficient data exchange.</p>
				<ul class="gcx-checks is-compact">
					<?php foreach ( $gps_connector as $line ) : ?>
						<li><svg><use href="#igs-check"/></svg><?php echo esc_html( $line ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="gcx-flowcard" data-igs-reveal>
				<div class="gcx-flow-logo"><?php infometry_ct_gps_wp_img( '2022/11/Untitled-design-21-1.png', 'Informatica Google Pub/Sub Connector logo' ); ?></div>
				<ol class="gcx-flow" aria-label="Message flow">
					<li><span><svg><use href="#igs-cloud"/></svg></span><b>Publisher</b><small>Salesforce, NetSuite, apps</small></li>
					<li><span><svg><use href="#gcx-send"/></svg></span><b>Topic</b><small>Asynchronous messages</small></li>
					<li><span><svg><use href="#gcx-inbox"/></svg></span><b>Subscription</b><small>Pull or push</small></li>
					<li><span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Informatica IDMC</b><small>Source &amp; target</small></li>
				</ol>
				<p class="gcx-ai-note"><svg><use href="#igs-bolt"/></svg><span>With Agentic AI-driven automation, the Pub/Sub Connector evolves beyond standard messaging to support intelligent event handling, adaptive routing, and predictive analytics for enterprises running large-scale data pipelines.</span></p>
			</div>
		</div>
		<div class="igs-shell">
			<div class="gcx-res" data-igs-reveal>
				<a href="#freetrial"><span class="is-trial"><svg><use href="#igs-arrow"/></svg></span><b>Free Trial</b><small>30-day trial license</small></a>
				<a href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><span><svg><use href="#igs-down"/></svg></span><b>Download User Guide</b><small>Implementation reference</small></a>
				<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Informatica Marketplace</b><small>Certified listing</small></a>
				<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="is-g2"><svg><use href="#gcx-star"/></svg></span><b>G2 Product Review</b><small>Customer feedback</small></a>
			</div>
		</div>
	</section>

	<!-- How to use -->
	<section class="igs-section gdc-how" aria-labelledby="gps-how-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="gps-how-title">How Can You Use Our Connector</h2>
			</div>
			<div class="gdc-how-grid">
				<ol class="gdc-timeline" data-igs-reveal>
					<?php foreach ( $gps_steps as $i => $step ) : ?>
						<li>
							<b><?php echo (int) $i + 1; ?></b>
							<div>
								<h3><?php echo esc_html( $step[0] ); ?></h3>
								<p><?php echo esc_html( $step[1] ); ?></p>
								<?php if ( 3 === $i ) : ?><span class="gdc-lic"><em>30-day trial</em><em>Paid subscription</em></span><?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
				<figure class="gcx-how-media" data-igs-reveal>
					<?php infometry_ct_gps_wp_img( '2022/11/1_aryNpjtAU4mkKF-LXzCM6Q-1.png', 'Connector network icon representing Google Pub/Sub integration' ); ?>
				</figure>
			</div>
		</div>
	</section>

	<!-- Features -->
	<section class="igs-section gcx-features" aria-labelledby="gps-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Features</span>
				<h2 id="gps-feat-title">Features of Google Pub/Sub Connector</h2>
			</div>
			<div class="gcx-tiles">
				<?php foreach ( $gps_features as $i => $feature ) : ?>
					<article class="gdc-tile gcx-tile is-c<?php echo (int) ( $i % 4 ); ?>" data-igs-reveal>
						<span class="gdc-tile-ic"><svg><use href="#<?php echo esc_attr( $feature[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $feature[1] ); ?></h3>
						<p><?php echo esc_html( $feature[2] ); ?></p>
					</article>
				<?php endforeach; ?>
				<article class="gcx-tile-ai" data-igs-reveal>
					<span><svg><use href="#igs-bolt"/></svg></span>
					<p><b>Agentic AI Advantage</b> – Enable self-optimizing, automated event workflows that learn and adapt as data streams evolve.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- Use cases -->
	<section class="igs-section gdc-uses" aria-labelledby="gps-uses-title">
		<div class="igs-shell gdc-uses-grid">
			<div class="gdc-uses-copy" data-igs-reveal>
				<span class="igs-kicker">Use cases</span>
				<h2 id="gps-uses-title">Popular Use Cases</h2>
				<p>With Infometry’s Google Pub/Sub Connector, enterprises gain not just connectivity, but an AI-ready integration layer to power the next generation of intelligent, event-driven architectures.</p>
				<a class="igs-btn igs-btn-primary gcx-uses-btn" href="<?php echo esc_url( $contact_url ); ?>">Contact us <svg><use href="#igs-arrow"/></svg></a>
			</div>
			<ol class="gdc-recipes">
				<?php foreach ( $gps_uses as $i => $use ) : ?>
					<li data-igs-reveal>
						<b><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></b>
						<h3><?php echo esc_html( $use[0] ); ?></h3>
						<p class="gdc-recipe-flow" aria-hidden="true">
							<?php foreach ( $use[1] as $s => $step ) : ?>
								<?php if ( $s ) : ?><i></i><?php endif; ?>
								<span><?php $gps_step_icon( $step[0] ); ?><?php echo esc_html( $step[1] ); ?></span>
							<?php endforeach; ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<?php
	infometry_ct_gps_faq( array( 'id' => 'gps-faq', 'faqs' => $gps_faqs, 'email' => $support_email ) );

	infometry_ct_gps_related(
		'gps-related-title',
		'Other Products',
		array(
			array( 'url' => home_url( '/product/google-bigtable-connector/' ), 'upload' => '2020/12/global-connectors-icon-1.png', 'alt' => 'Icon used to reperesent Connectors', 'title' => 'Google BigTable Connector', 'copy' => 'Read, Write, or Delete data to Bigtable using Infometry’s Connector for Informatica, handling billions of rows and thousands of columns.' ),
			array( 'url' => home_url( '/product/google-ads-connector/' ), 'upload' => '2020/12/google-connectors-icon.png', 'alt' => 'Plug icon reperesenting Google Connectors', 'title' => 'Google Ads Connector', 'copy' => 'Google Ads Connector seamlessly integrates Google Ads with Enterprise Data Lakes and Data Warehouses via the Informatica Cloud platform.' ),
		)
	);

	infometry_ct_gps_cta(
		array(
			'id'        => 'freetrial',
			'anchor2'   => 'freetrialform',
			'title'     => 'Free Trial',
			'copy'      => 'Request your 30-day trial license and start publishing and pulling Google Pub/Sub messages from Informatica IDMC.',
			'checks'    => array( '100% Informatica Certified', 'Publish, pull & manage topics', 'Connectors hold no data', '24/7 local time-zone support' ),
			'resources' => array(
				array( 'url' => $guide_url, 'icon' => 'igs-down', 'title' => 'User guide', 'sub' => 'Implementation reference' ),
				array( 'url' => $marketplace_url, 'img' => $idmc_icon, 'title' => 'Marketplace', 'sub' => 'Certified listing' ),
				array( 'url' => $g2_url, 'icon' => 'gcx-star', 'class' => 'is-g2', 'title' => 'G2 review', 'sub' => 'Customer feedback' ),
			),
		)
	);

	infometry_ct_gps_footer();
	?>
</main>
<?php get_footer(); ?>
