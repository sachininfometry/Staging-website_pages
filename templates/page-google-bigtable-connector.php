<?php
/**
 * Template Name: Google BigTable Connector Product
 * Template Post Type: page, product
 *
 * Redesign of the Google BigTable connector page on the shared connector system
 * (google-sheets-connector.css + google-drive-connector.css/.js + google-bigtable-connector.css).
 * Every heading, paragraph, list item, image (with its alt text), video and link of the
 * original page is kept visible; the visuals are additions.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

/* Page helpers (this page only): uploads images, FAQ + schema, other products, free trial form, video, footer. */
if ( ! function_exists( 'infometry_ct_gbt_upload' ) ) {
	/** URL of a file in wp-content/uploads (path after uploads/), so the original page images keep their URLs. */
	function infometry_ct_gbt_upload( $path ) {
		return home_url( '/wp-content/uploads/' . ltrim( $path, '/' ) );
	}

	/** One of the original page's images, with its original alt text. */
	function infometry_ct_gbt_wp_img( $path, $alt, $class = '', $width = 0, $height = 0 ) {
		printf(
			'<img%s src="%s" alt="%s"%s loading="lazy" decoding="async">',
			$class ? ' class="' . esc_attr( $class ) . '"' : '',
			esc_url( infometry_ct_gbt_upload( $path ) ),
			esc_attr( $alt ),
			( $width && $height ) ? sprintf( ' width="%d" height="%d"', (int) $width, (int) $height ) : ''
		);
	}

	/** Tags allowed in FAQ answers and rich copy. */
	function infometry_ct_gbt_allowed() {
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
	function infometry_ct_gbt_sprite() {
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
	function infometry_ct_gbt_faq( $args ) {
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
									<div class="gcx-faq-a"><?php echo wp_kses( false === strpos( $faq[1], '<p>' ) ? '<p>' . $faq[1] . '</p>' : $faq[1], infometry_ct_gbt_allowed() ); ?></div>
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
	function infometry_ct_gbt_related( $id, $title, $cards ) {
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
									infometry_ct_gbt_wp_img( $card['upload'], $card['alt'] );
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
	function infometry_ct_gbt_cta( $args ) {
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
					<?php if ( $args['copy'] ) : ?><p><?php echo wp_kses( $args['copy'], infometry_ct_gbt_allowed() ); ?></p><?php endif; ?>
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
	function infometry_ct_gbt_video_modal() {
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
	function infometry_ct_gbt_video_card( $video_id, $title, $tag, $logo_a, $logo_b, $class = '' ) {
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
	function infometry_ct_gbt_img_html( $url, $alt = '' ) {
		ob_start();
		infometry_ct_igs_img( $url, $alt );
		return ob_get_clean();
	}

	/** Site footer shared by the redesigned product pages. */
	function infometry_ct_gbt_footer() {
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
$marketplace_url = 'https://marketplace.informatica.com/listings/cloud/connectors/-infometry-googlebigtable-connector.html';
$guide_url       = 'https://drive.google.com/file/d/1acs0pCjilbNhyVgEnkYrNMVdWxU1ivUL/view?usp=sharing';
$g2_url          = 'https://www.g2.com/products/google-bigtable-connector-for-informatica-idmc/reviews';
$img             = INFOMETRY_CT_URL . 'assets/images/';
$bt_icon         = $img . 'google-connectors/google-bigtable.png';
$idmc_icon       = $img . 'informatica-product-mark.png';
$support_email   = 'info@infometry.net';

// Hero table: row key and cells from two column families.
$gbt_rows = array(
	array( 'user#1042#2026-11-20', 'Emily Carter', 'US', '1,284', '$412.90' ),
	array( 'user#1042#2026-11-21', 'Emily Carter', 'US', '1,317', '$428.10' ),
	array( 'user#2219#2026-11-21', 'Liam Smith', 'UK', '846', '$203.55' ),
	array( 'user#3307#2026-11-21', 'Ana Ruiz', 'ES', '2,051', '$690.00' ),
	array( 'user#4410#2026-11-22', 'Kenji Mori', 'JP', '1,102', '$356.75' ),
);
// Connector jobs (row index, style, operation, target).
$gbt_jobs = array(
	array( 0, 'read', 'Read row', 'Snowflake' ),
	array( 2, 'cols', 'Read columns', 'BigQuery' ),
	array( 3, 'ins', 'Insert row', 'from Oracle' ),
	array( 4, 'del', 'Delete row', 'by row key' ),
);

$gbt_works = array(
	array( 'gcx-table', 'Google Cloud Bigtable structures data in massively scalable tables, functioning as a sorted key/value map.' ),
	array( 'gcx-row', 'Each table consists of rows representing individual entities and columns storing corresponding values.' ),
	array( 'gcx-key', 'Rows are indexed using a unique row key, while related columns are grouped into column families.' ),
	array( 'igs-layers', 'Each column is uniquely identified by a combination of the column family and a column qualifier.' ),
);

$gbt_connector = array(
	'Read, Write, or Delete data to Bigtable using Infometry’s Connector for Informatica.',
	'Supports Enterprise-Level Data Flows.',
	'Handles billions of rows and thousands of columns without performance loss.',
	'Faster data consolidation across cloud and on-prem systems.',
	'Supports all data types.',
	'Enables Mapping Tasks and Data Synchronization.',
	'Integrates natively with other databases like MySQL, Oracle, and BigQuery.',
);

$gbt_steps = array(
	array( 'Request from the Marketplace', 'Go to Informatica Marketplace, search for Infometry’s Connector for Informatica, and click on the Start Free Trial button.' ),
	array( 'Paid or subscription licenses', 'For paid or subscription licenses, contact us and we’ll help with provisioning.' ),
	array( 'Enable it from IDMC', 'Enable it directly from IDMC (formerly IICS) and reach out to us for license activation.' ),
	array( 'Choose your license', 'Two licensing options available: Trial license (30 days) & Paid subscription license' ),
);

$gbt_features = array(
	array( 'igs-shield', 'Certified native interface', '100% Informatica Certified native interface.' ),
	array( 'igs-chart', 'Real-time analytics', 'Real-Time Data Analytics powered by direct integration.' ),
	array( 'igs-layers', 'Rows & column families', 'Supports row-level and column-family operations.' ),
	array( 'gcx-rocket', 'Operations at scale', 'Enables read, insert, and delete operations at scale.' ),
	array( 'igs-sync', 'Sync & ETL ready', 'Data Synchronization & ETL-ready for enterprise workloads.' ),
	array( 'igs-db', 'Apps & databases', 'Integrates with enterprise apps and databases including Oracle, MySQL, and BigQuery.' ),
);

$gbt_uses = array(
	array( 'Consolidating massive operational datasets into Data Warehouses and Data Lakes.', array( array( 'bt', 'Bigtable' ), array( 'idmc', 'IDMC' ), array( 'igs-db', 'Warehouse & lake' ) ) ),
	array( 'Running real-time analytics on petabyte-scale Bigtable datasets.', array( array( 'bt', 'Petabyte-scale data' ), array( 'igs-chart', 'Real-time analytics' ) ) ),
	array( 'Integrating Bigtable with cloud and on-prem applications for continuous data sync.', array( array( 'igs-cloud', 'Cloud & on-prem apps' ), array( 'igs-sync', 'Continuous sync' ), array( 'bt', 'Bigtable' ) ) ),
	array( 'Using Agentic AI-powered pipelines to optimize queries, detect anomalies, and drive predictive insights.', array( array( 'igs-bolt', 'Agentic AI' ), array( 'gcx-search', 'Query optimization' ), array( 'gcx-trend', 'Predictive insights' ) ) ),
);

$gbt_faqs = array(
	array( 'What are the types of Licenses you offer?', 'Infometry connector annual subscription license is charged for a given OrgID. Customers will get un-limited usage of the connectors within an OrgID.' ),
	array( 'How Updates on the new features are released to the customer?', 'Infometry Connector team continue to add new features and support newer API releases for each product Infometry release cycles are synched with the Informatica Cloud platform and customers will get the updates automatically along with IICS release updates. All our new releases are auto-updated at the customer end and are free of charge.' ),
	array( 'Whom to contact for Implementation and License?', 'You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>' ),
	array( 'Is it Certified by Informatica?', 'Yes, All our connector are 100% Certified by Informatica and also listed on <a href="' . $marketplace_url . '" target="_blank" rel="noopener">Informatica marketplace</a>.' ),
	array( 'How does your Customer Support work?', 'Our Support is available 24/7 and we provide local time-zone support to all our customers globally.' ),
	array( 'How Infometry charge for the connector?', 'All our connectors are charged based on the number of Prod and Non-Prod licenses subscribed by the customer and it’s completely independent of the number/size of the data/rows processed.' ),
	array( 'How soon business users can onboard and start using the connector?', 'In most cases, it is immediate.' ),
	array( 'Validity of license?', 'All our licenses are charged annually.' ),
	array( 'How Infometry offers Technical Support?', 'It’s available 24/7 with a turnaround time of 24-48 hours' ),
	array( 'How secure is my data?', 'All our connectors and their updates are verified by Informatica before reaching out to the customer. Also, our connectors are activated and work in your environment. Connectors do not hold any data. Our connector ensures highly secured data transfers.' ),
);

$gbt_step_icon = function ( $key ) use ( $bt_icon, $idmc_icon ) {
	if ( 'bt' === $key ) {
		infometry_ct_igs_img( $bt_icon, '' );
	} elseif ( 'idmc' === $key ) {
		infometry_ct_igs_img( $idmc_icon, '' );
	} else {
		printf( '<svg><use href="#%s"/></svg>', esc_attr( $key ) );
	}
};
?>
<main class="igs-page gdc-page gcx-page gcx-bigtable" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php infometry_ct_gbt_sprite(); ?>

	<!-- Hero -->
	<section class="igs-hero gdc-hero gcx-hero" aria-labelledby="gbt-title">
		<div class="igs-shell gdc-hero-grid">
			<div class="gdc-hero-copy">
				<span class="gdc-badge"><?php infometry_ct_igs_img( $bt_icon, '' ); ?>Google BigTable Connector · 100% Informatica Certified</span>
				<h1 id="gbt-title">Infometry’s Google BigTable Connector for <em>Informatica</em></h1>
				<p>Infometry’s Google Bigtable Connector for Informatica IDMC is 100% Informatica Certified, providing seamless integration and real-time Data Analytics. With Infometry’s connector, you can read, insert, and delete data from Google Bigtable effortlessly. It enables seamless data retrieval, column reading, row insertion, and row deletion using a row key.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary gdc-btn-drive" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<ul class="gdc-hero-drives" aria-label="Operations">
					<li><svg><use href="#gcx-search"/></svg>Read</li>
					<li><svg><use href="#igs-plus"/></svg>Insert</li>
					<li><svg><use href="#gcx-trash"/></svg>Delete</li>
					<li><svg><use href="#gcx-key"/></svg>Row key</li>
				</ul>
				<p class="gdc-hero-links">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?>Informatica Marketplace<svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><svg class="is-star"><use href="#gcx-star"/></svg>G2 Product Reviews<svg><use href="#igs-out"/></svg></a>
				</p>
			</div>

			<div class="gdc-stage gcx-stage" data-gdc-stage aria-label="Animated example: rows in a Google Cloud Bigtable table are read, inserted and deleted by row key through the Infometry connector in Informatica IDMC">
				<div class="gdc-window gcx-window" aria-hidden="true">
					<div class="gdc-win-top">
						<span class="gdc-win-logo"><?php infometry_ct_igs_img( $bt_icon, '' ); ?><b>Bigtable</b></span>
						<span class="gdc-win-search"><svg><use href="#gcx-search"/></svg>Row key prefix: user#</span>
						<span class="gcx-win-tag">customer_events</span>
					</div>
					<div class="gcx-tbl gcx-tbl-bt">
						<div class="gcx-tr is-fam"><span></span><span class="is-a" style="grid-column: span 2">cf: profile</span><span class="is-b" style="grid-column: span 2">cf: metrics</span></div>
						<div class="gcx-tr is-head"><span>Row key</span><span>name</span><span>country</span><span>clicks</span><span>spend</span></div>
						<ul class="gcx-rows">
							<?php foreach ( $gbt_rows as $i => $row ) : ?>
								<li class="gcx-tr" data-gdc-file="<?php echo (int) $i; ?>">
									<span><i></i><code><?php echo esc_html( $row[0] ); ?></code></span>
									<span><?php echo esc_html( $row[1] ); ?></span>
									<span><?php echo esc_html( $row[2] ); ?></span>
									<span><?php echo esc_html( $row[3] ); ?></span>
									<span><?php echo esc_html( $row[4] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="gdc-queue gcx-queue">
					<header>
						<span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
						<div><b>Bigtable operations</b><small>Informatica IDMC · Mapping Task</small></div>
						<em data-gdc-count><?php echo count( $gbt_jobs ); ?> of <?php echo count( $gbt_jobs ); ?> done</em>
					</header>
					<ol>
						<?php foreach ( $gbt_jobs as $job ) : ?>
							<li class="is-<?php echo esc_attr( $job[1] ); ?>" data-gdc-job="<?php echo (int) $job[0]; ?>">
								<span class="gdc-job-ic"><svg><use href="#<?php echo esc_attr( array( 'read' => 'gcx-search', 'cols' => 'igs-layers', 'ins' => 'igs-plus', 'del' => 'gcx-trash' )[ $job[1] ] ); ?>"/></svg></span>
								<div class="gdc-job-text">
									<b><?php echo esc_html( $job[2] ); ?> <span><?php echo esc_html( $gbt_rows[ $job[0] ][0] ); ?></span></b>
									<small>→ <?php echo esc_html( $job[3] ); ?></small>
									<i class="gdc-job-bar"><i></i></i>
								</div>
								<span class="gdc-job-state"><svg><use href="#igs-check"/></svg></span>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
				<span class="gdc-chip is-auth" aria-hidden="true"><svg><use href="#igs-db"/></svg>Billions of rows</span>
				<span class="gdc-chip is-store" aria-hidden="true"><svg><use href="#igs-shield"/></svg>No data stored</span>
			</div>
		</div>
	</section>

	<!-- How Bigtable works -->
	<section class="igs-section gdc-inspect gcx-split" aria-labelledby="gbt-works-title">
		<div class="igs-shell gdc-inspect-grid">
			<div class="gdc-inspect-copy" data-igs-reveal>
				<span class="igs-kicker">Wide-column at scale</span>
				<h2 id="gbt-works-title">How Google Cloud Bigtable Works</h2>
				<p>Google Cloud Bigtable is a highly scalable, sparsely populated table designed to handle billions of rows and thousands of columns, making it ideal for storing terabytes to petabytes of data. It operates as a distributed, persistent, multidimensional sorted map, widely used for large-scale analytics and operational workloads.</p>
				<ol class="gcx-numlist">
					<?php foreach ( $gbt_works as $i => $item ) : ?>
						<li><span><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span><p><?php echo esc_html( $item[1] ); ?></p></li>
					<?php endforeach; ?>
				</ol>
			</div>

			<figure class="gcx-anatomy" data-igs-reveal aria-label="Anatomy of a Bigtable row: a row key, two column families and their column qualifiers">
				<figcaption><svg><use href="#gcx-table"/></svg>Anatomy of a Bigtable row</figcaption>
				<div class="gcx-anat-grid" aria-hidden="true">
					<div class="gcx-anat-key"><small>Row key</small><code>user#1042#2026-11-21</code></div>
					<div class="gcx-anat-fam is-a">
						<b>Column family · <code>profile</code></b>
						<div><span><small>qualifier</small>name</span><em>Emily Carter</em></div>
						<div><span><small>qualifier</small>country</span><em>US</em></div>
					</div>
					<div class="gcx-anat-fam is-b">
						<b>Column family · <code>metrics</code></b>
						<div><span><small>qualifier</small>clicks</span><em>1,317</em></div>
						<div><span><small>qualifier</small>spend</span><em>$428.10</em></div>
					</div>
				</div>
				<p class="gdc-api"><span>COLUMN</span><code>family:qualifier</code><code>metrics:clicks</code></p>
			</figure>
		</div>
	</section>

	<!-- The connector -->
	<section class="igs-section gcx-connector" aria-labelledby="gbt-conn-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">The connector</span>
				<h2 id="gbt-conn-title">Informatica Google BigTable Connector</h2>
			</div>
			<div class="gcx-conn-grid">
				<div class="gcx-conn-media" data-igs-reveal>
					<?php infometry_ct_gbt_wp_img( 'elementor/thumbs/Big-taable-rruxo8l2wbvw0g6p2o4l3epz1b9utyddia7bpb0u28.png', 'Informatica Google Bigtable Connector logo' ); ?>
					<p class="gcx-ai-note"><svg><use href="#igs-bolt"/></svg><span>With Agentic AI-enabled intelligence, Bigtable integrations powered by Infometry go beyond data pipelines — enabling adaptive ETL, smart query optimization, and automated data-driven decisioning for enterprises.</span></p>
				</div>
				<ul class="gcx-checks" data-igs-reveal>
					<?php foreach ( $gbt_connector as $line ) : ?>
						<li><svg><use href="#igs-check"/></svg><?php echo esc_html( $line ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="gcx-res" data-igs-reveal>
				<a href="#freetrial"><span class="is-trial"><svg><use href="#igs-arrow"/></svg></span><b>Free Trial</b><small>30-day trial license</small></a>
				<a href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><span><svg><use href="#igs-down"/></svg></span><b>Download User Guide</b><small>Implementation reference</small></a>
				<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Informatica Marketplace</b><small>Certified listing</small></a>
				<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="is-g2"><svg><use href="#gcx-star"/></svg></span><b>G2 Product Reviews</b><small>Customer feedback</small></a>
			</div>
		</div>
	</section>

	<!-- How to use -->
	<section class="igs-section gdc-how" aria-labelledby="gbt-how-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="gbt-how-title">How Can You Use Our Connector</h2>
			</div>
			<div class="gdc-how-grid">
				<ol class="gdc-timeline" data-igs-reveal>
					<?php foreach ( $gbt_steps as $i => $step ) : ?>
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
					<?php infometry_ct_gbt_wp_img( '2022/03/BigTable-Connector-1024x872.png', 'Infometry Informatica Google Bigtable connector Integration icon', '', 1024, 872 ); ?>
				</figure>
			</div>
		</div>
	</section>

	<!-- Features -->
	<section class="igs-section gcx-features" aria-labelledby="gbt-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Features</span>
				<h2 id="gbt-feat-title">Features of Google BigTable Connector</h2>
				<p>Infometry’s Google Connectors are 100% Informatica Certified and provide native interfaces. Our Connectors enable seamless integration and real-time Data Analytics. Infometry’s Google Connector for Informatica enables easy application integration, data extraction for downstream applications, and ETL for Enterprise Data Warehouse.</p>
			</div>
			<div class="gcx-tiles">
				<?php foreach ( $gbt_features as $i => $feature ) : ?>
					<article class="gdc-tile gcx-tile is-c<?php echo (int) ( $i % 4 ); ?>" data-igs-reveal>
						<span class="gdc-tile-ic"><svg><use href="#<?php echo esc_attr( $feature[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $feature[1] ); ?></h3>
						<p><?php echo esc_html( $feature[2] ); ?></p>
					</article>
				<?php endforeach; ?>
				<article class="gcx-tile-ai" data-igs-reveal>
					<span><svg><use href="#igs-bolt"/></svg></span>
					<p><b>Agentic AI Advantage</b> – Adaptive, self-optimizing pipelines that intelligently manage queries, automate workflows, and improve decision-making from Bigtable datasets.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- Video -->
	<section class="igs-section gdc-videos gcx-videos" aria-labelledby="gbt-video-title">
		<div class="igs-shell gcx-video-grid">
			<div class="gcx-video-copy" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="gbt-video-title">Learn About Google BigTable Connector</h2>
				<p>See how Infometry’s connector reads, inserts and deletes Google Bigtable data from Informatica IDMC.</p>
				<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact us <svg><use href="#igs-arrow"/></svg></a>
			</div>
			<?php infometry_ct_gbt_video_card( '9nnH7rYPX80', 'Infometry’s Google BigTable Connector for Informatica', 'Video', infometry_ct_gbt_img_html( $bt_icon ), infometry_ct_gbt_img_html( $idmc_icon ) ); ?>
		</div>
		<?php infometry_ct_gbt_video_modal(); ?>
	</section>

	<!-- Use cases -->
	<section class="igs-section gdc-uses" aria-labelledby="gbt-uses-title">
		<div class="igs-shell gdc-uses-grid">
			<div class="gdc-uses-copy" data-igs-reveal>
				<span class="igs-kicker">Use cases</span>
				<h2 id="gbt-uses-title">Popular Use Cases</h2>
				<p>Infometry’s Google Bigtable Connector for Informatica ensures fast, reliable, and intelligent data integration, making it the perfect choice for enterprises building scalable, AI-driven data platforms.</p>
			</div>
			<ol class="gdc-recipes">
				<?php foreach ( $gbt_uses as $i => $use ) : ?>
					<li data-igs-reveal>
						<b><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></b>
						<h3><?php echo esc_html( $use[0] ); ?></h3>
						<p class="gdc-recipe-flow" aria-hidden="true">
							<?php foreach ( $use[1] as $s => $step ) : ?>
								<?php if ( $s ) : ?><i></i><?php endif; ?>
								<span><?php $gbt_step_icon( $step[0] ); ?><?php echo esc_html( $step[1] ); ?></span>
							<?php endforeach; ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<?php
	infometry_ct_gbt_faq( array( 'id' => 'gbt-faq', 'faqs' => $gbt_faqs, 'email' => $support_email ) );

	infometry_ct_gbt_related(
		'gbt-related-title',
		'Other Products',
		array(
			array( 'url' => home_url( '/product/google-pub-sub/' ), 'upload' => '2020/12/global-connectors-icon-1.png', 'alt' => 'Icon used to reperesent Connectors', 'title' => 'Google Pub/Sub Connector', 'copy' => 'The Google PubSub Connector enables Data Integration with Google Pub/Sub, allowing you to pull and push messages seamlessly.' ),
			array( 'url' => home_url( '/product/google-ads-connector/' ), 'upload' => '2020/12/analytics-solutions-icon.png', 'alt' => 'Analytics icon reperesenting Google Connectors', 'title' => 'Google Ads Connector', 'copy' => 'Google Ads Connector seamlessly integrates Google Ads with Enterprise Data Lakes and Data Warehouses via the Informatica Cloud platform.' ),
		)
	);

	infometry_ct_gbt_cta(
		array(
			'id'        => 'freetrial',
			'anchor2'   => 'freetrialform',
			'title'     => 'Free Trial',
			'copy'      => 'Request your 30-day trial license and start reading, inserting and deleting Google Bigtable data from Informatica IDMC.',
			'checks'    => array( '100% Informatica Certified', 'Billions of rows, thousands of columns', 'Connectors hold no data', '24/7 local time-zone support' ),
			'resources' => array(
				array( 'url' => $guide_url, 'icon' => 'igs-down', 'title' => 'User guide', 'sub' => 'Implementation reference' ),
				array( 'url' => $marketplace_url, 'img' => $idmc_icon, 'title' => 'Marketplace', 'sub' => 'Certified listing' ),
				array( 'url' => $g2_url, 'icon' => 'gcx-star', 'class' => 'is-g2', 'title' => 'G2 reviews', 'sub' => 'Customer feedback' ),
			),
		)
	);

	infometry_ct_gbt_footer();
	?>
</main>
<?php get_footer(); ?>
