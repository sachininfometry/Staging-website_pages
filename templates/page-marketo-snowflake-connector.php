<?php
/**
 * Template Name: Marketo to Snowflake Connector Product
 * Template Post Type: page, product
 *
 * Redesign of the INFOFISCUS Marketo to Snowflake connector page on the shared connector
 * system (google-sheets-connector.css + google-drive-connector.css/.js + marketo-snowflake-connector.css).
 * Every heading, paragraph, list item, image (with its alt text) and link of the original
 * page is kept visible; the visuals are additions.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

/* Page helpers (this page only): uploads images, FAQ + schema, other products, free trial form, video, footer. */
if ( ! function_exists( 'infometry_ct_mks_upload' ) ) {
	/** URL of a file in wp-content/uploads (path after uploads/), so the original page images keep their URLs. */
	function infometry_ct_mks_upload( $path ) {
		return home_url( '/wp-content/uploads/' . ltrim( $path, '/' ) );
	}

	/** One of the original page's images, with its original alt text. */
	function infometry_ct_mks_wp_img( $path, $alt, $class = '', $width = 0, $height = 0 ) {
		printf(
			'<img%s src="%s" alt="%s"%s loading="lazy" decoding="async">',
			$class ? ' class="' . esc_attr( $class ) . '"' : '',
			esc_url( infometry_ct_mks_upload( $path ) ),
			esc_attr( $alt ),
			( $width && $height ) ? sprintf( ' width="%d" height="%d"', (int) $width, (int) $height ) : ''
		);
	}

	/** Tags allowed in FAQ answers and rich copy. */
	function infometry_ct_mks_allowed() {
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
	function infometry_ct_mks_sprite() {
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
	function infometry_ct_mks_faq( $args ) {
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
									<div class="gcx-faq-a"><?php echo wp_kses( false === strpos( $faq[1], '<p>' ) ? '<p>' . $faq[1] . '</p>' : $faq[1], infometry_ct_mks_allowed() ); ?></div>
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
	function infometry_ct_mks_related( $id, $title, $cards ) {
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
									infometry_ct_mks_wp_img( $card['upload'], $card['alt'] );
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
	function infometry_ct_mks_cta( $args ) {
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
					<?php if ( $args['copy'] ) : ?><p><?php echo wp_kses( $args['copy'], infometry_ct_mks_allowed() ); ?></p><?php endif; ?>
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
	function infometry_ct_mks_video_modal() {
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
	function infometry_ct_mks_video_card( $video_id, $title, $tag, $logo_a, $logo_b, $class = '' ) {
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
	function infometry_ct_mks_img_html( $url, $alt = '' ) {
		ob_start();
		infometry_ct_igs_img( $url, $alt );
		return ob_get_clean();
	}

	/** Site footer shared by the redesigned product pages. */
	function infometry_ct_mks_footer() {
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
$listing_url   = 'https://app.snowflake.com/marketplace/listing/GZSTZ3867UG/infometry-infofiscus-marketo-connector?originTab=provider&providerName=Infometry&profileGlobalName=GZSTZ3867OQ';
$guide_url     = 'https://docs.google.com/document/d/1r9-81RLVobNZDEryi-9XP5LMbiDTRgwJ/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$img           = INFOMETRY_CT_URL . 'assets/images/';
$sf_icon       = $img . 'google-sheets/eco-snowflake.png';
$support_email = 'info@infometry.net';
$mk_badge      = '<b class="gcx-mk" aria-hidden="true">M</b>';

$mks_objects = array(
	array( 'Leads', '486,210', 'Hourly', 'MKTO_LEADS' ),
	array( 'Activities', '3,918,402', 'Hourly', 'MKTO_ACTIVITIES' ),
	array( 'Programs', '1,284', 'Daily', 'MKTO_PROGRAMS' ),
	array( 'Smart Campaigns', '762', 'Daily', 'MKTO_CAMPAIGNS' ),
	array( 'Email Performance', '58,907', 'Hourly', 'MKTO_EMAILS' ),
);
$mks_jobs = array(
	array( 0, 'inc', 'Sync', 'landing table' ),
	array( 1, 'inc', 'Sync', 'landing table' ),
	array( 2, 'bulk', 'Initial load', 'landing table' ),
	array( 4, 'inc', 'Sync', 'landing table' ),
);

$mks_proof = array(
	array( 'elementor/thumbs/Optimized-for-Performance-rruxosbengty4jst12vli7jfj28v01ay3jsyyylccs.webp', 'Optimized for Performance', '200+', 'Growing Adoption', 'Over 200 organizations have enhanced their data strategies with Infometry.' ),
	array( 'elementor/thumbs/Handle-Increased-Analytics-Workloads-with-Ease-rruxosbengty4jst12vli7jfj28v01ay3jsyyylccs.webp', 'Handle Increased Analytics Workloads with Ease', '40%', 'Efficiency Gains', 'Experience up to a 40% increase in data processing efficiency.' ),
	array( 'elementor/thumbs/reduction-in-operation-costs-rruxosbengty4jst12vli7jfj28v01ay3jsyyylccs.webp', 'reduction in operation costs', '30%', 'Cost Savings', 'Save an average of 30% on integration costs with Infometry’s solution.' ),
);

$mks_highlights = array(
	'Efficient and near real-time data ingestion from Marketo to Snowflake.',
	'Seamlessly integrated for always up-to-date data.',
	'Select specific Marketo objects and customize sync frequency.',
	'Regular updates with new features for agile data strategy.',
	'Infometry ensures data integrity, Agentic AI–driven intelligence, and enterprise-grade security.',
);

$mks_steps = array(
	array( 'Find the connector', 'Navigate to the Snowflake Marketplace and search for the INFOFISCUS Marketo Connector.' ),
	array( 'Install & start your trial', 'Click on Get to install and start using its free trial.' ),
	array( 'Authorize Marketo', 'Use your Marketo credentials to log in and authorize the connector.' ),
	array( 'Pick your objects', 'Choose specific data objects from Marketo that you want to sync with Snowflake.' ),
);

$mks_realtime = array(
	array( 'elementor/thumbs/scalable-solutions-rruxoix0r4h2wg6gjytbt9wtl7j6v29mq9a466za30.png', 'Illustration of an upward arrow expanding from a block representing scalability and growth', 'Streamlined Processes', 'Join the growing number of businesses leveraging the INFOFISCUS Marketo Connector, designed by Infometry, to streamline their data integration processes with the added intelligence of Agentic AI.' ),
	array( 'elementor/thumbs/Simple-User-Experience-Icon-rruxoix0r4h2wg6gjytbt9wtl7j6v29mq9a466za30.png', 'Icon showing a user profile with circular interface elements symbolizing a simplified user experience.', 'Seamless Synchronization', 'Infometry’s expertise ensures seamless data synchronization, allowing you to focus on deriving actionable insights and driving business growth.' ),
);

$mks_expertise = array(
	array( 'elementor/thumbs/data-integration-rruxoix0r4h2wg6gjytbt9wtl7j6v29mq9a466za30.png', 'data integration', 'Specialists in Data Integration', 'Experts in developing advanced data integration solutions tailored for Snowflake.' ),
	array( 'elementor/thumbs/Comprehensive-support-rruxoix0r4h2wg6gjytbt9wtl7j6v29mq9a466za30.png', 'Comprehensive support', 'Proven Track Record', 'Years of experience delivering reliable connectors that streamline data pipelines.' ),
	array( 'elementor/thumbs/Trusted-by-Industry-Leaders-rruxoix0r4h2wg6gjytbt9wtl7j6v29mq9a466za30.png', 'Trusted by Industry Leaders', 'Trusted by Industry Leaders', 'Commitment to innovation ensures cutting-edge solutions for seamless integration, now enhanced with Agentic AI capabilities.' ),
	array( 'elementor/thumbs/Expert-consultation-icon-rruxoix0r4h2wg6gjytbt9wtl7j6v29mq9a466za30.png', 'Expert consultation icon', 'Customer-Centric Approach', 'Focus on customer satisfaction, providing robust support and tailored solution' ),
);

$mks_faqs = array(
	array( 'What is the INFOFISCUS Marketo Connector?', 'The INFOFISCUS Marketo Connector is a pre-built, comprehensive connector available as a Native Application in the Snowflake Marketplace. It is designed to seamlessly integrate Marketo and extract data with a single click, making data synchronization efficient and straightforward.' ),
	array( 'How does the INFOFISCUS Marketo Connector benefit my business?', 'The INFOFISCUS Marketo Connector eliminates the need to invest time and resources in understanding Marketo connectivity, APIs, and drivers. It ensures near real-time synchronization of Marketo data to Snowflake, enabling you to focus on building powerful analytical layers and deriving actionable insights.' ),
	array( 'What makes INFOFISCUS Marketo Connector different from other connectors?', 'INFOFISCUS Marketo Connector offers advanced data pipeline capabilities for efficient data ingestion, unique features like selecting specific Marketo objects and customizing synchronization frequency, and regular updates ensuring up to 99.9% data accuracy. Additionally, it is designed and supported by Infometry, ensuring reliability and security.' ),
	array( 'How fast is the data integration process with INFOFISCUS Marketo Connector?', 'The INFOFISCUS Marketo Connector can achieve data integration speeds up to 5x faster than traditional methods, allowing for efficient and near real-time data ingestion from Marketo to Snowflake.' ),
	array( 'Can I select specific data objects from Marketo to sync with Snowflake?', 'Yes, the INFOFISCUS Marketo Connector allows you to select specific objects of interest from Marketo and customize the frequency of data synchronization with Snowflake, ensuring you get the exact data you need, when you need it.' ),
	array( 'How secure is my data with the INFOFISCUS Marketo Connector?', 'Infometry ensures the integrity and security of your data, providing reliable data handling and peace of mind.' ),
	array( 'How many organizations are currently using the INFOFISCUS Marketo Connector?', 'Over 200 organizations have enhanced their data strategies with the INFOFISCUS Marketo Connector, experiencing significant improvements in data processing efficiency and cost savings.' ),
	array( 'What kind of improvements can I expect with the INFOFISCUS Marketo Connector?', 'Businesses using the INFOFISCUS Marketo Connector have seen up to a 40% increase in data processing efficiency and an average of 30% savings on integration costs.' ),
	array( 'How often are updates and new features added to the INFOFISCUS Marketo Connector?', 'The INFOFISCUS Marketo Connector is regularly updated with new objects and features, ensuring your integration stays up-to-date and accurate.' ),
);
?>
<main class="igs-page gdc-page gcx-page gcx-snow gcx-marketo" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php infometry_ct_mks_sprite(); ?>

	<!-- Hero -->
	<section class="igs-hero gdc-hero gcx-hero" aria-labelledby="mks-title">
		<div class="igs-shell gdc-hero-grid">
			<div class="gdc-hero-copy">
				<span class="gdc-badge"><?php infometry_ct_igs_img( $sf_icon, '' ); ?>INFOFISCUS Marketo Connector · Snowflake Native App</span>
				<h1 id="mks-title">Unlock the Power of Your <em>Marketo Data</em> with Infometry</h1>
				<p>Welcome to the future of marketing data integration with the INFOFISCUS Marketo Connector, a pre-built and comprehensive solution available as a Native Application in the <a href="<?php echo esc_url( $listing_url ); ?>" target="_blank" rel="noopener">Snowflake Marketplace</a>. Designed by Infometry, this NO-CODE connector revolutionizes the way you integrate Marketo, offering a seamless, single-click data extraction process powered by Agentic AI for smarter, automated workflows.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary gdc-btn-drive" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download Our User Guide Now!</a>
					<a class="igs-btn igs-btn-ghost" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
				</div>
				<ul class="gdc-hero-drives" aria-label="Highlights">
					<li><svg><use href="#igs-code"/></svg>No-code</li>
					<li><svg><use href="#gcx-clock"/></svg>Near real-time</li>
					<li><svg><use href="#igs-bolt"/></svg>Agentic AI</li>
					<li><svg><use href="#igs-shield"/></svg>Enterprise security</li>
				</ul>
				<p class="gdc-hero-links">
					<a href="<?php echo esc_url( $listing_url ); ?>" target="_blank" rel="noopener"><?php infometry_ct_igs_img( $sf_icon, '' ); ?>Snowflake Marketplace listing<svg><use href="#igs-out"/></svg></a>
				</p>
			</div>

			<div class="gdc-stage gcx-stage" data-gdc-stage aria-label="Animated example: Marketo objects sync into Snowflake landing tables through the INFOFISCUS Marketo Connector">
				<div class="gdc-window gcx-window" aria-hidden="true">
					<div class="gdc-win-top">
						<span class="gdc-win-logo"><?php echo $mk_badge; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><b>Marketo → Snowflake</b></span>
						<span class="gcx-win-tag is-live"><i></i>Syncing</span>
					</div>
					<div class="gcx-tbl gcx-tbl-ns">
						<div class="gcx-tr is-head"><span>Marketo object</span><span>Records</span><span>Frequency</span><span>Landing table</span></div>
						<ul class="gcx-rows">
							<?php foreach ( $mks_objects as $i => $obj ) : ?>
								<li class="gcx-tr" data-gdc-file="<?php echo (int) $i; ?>">
									<span><i></i><?php echo esc_html( $obj[0] ); ?></span>
									<span><?php echo esc_html( $obj[1] ); ?></span>
									<span><em class="gcx-pill<?php echo 'Daily' === $obj[2] ? ' is-bulk' : ''; ?>"><?php echo esc_html( $obj[2] ); ?></em></span>
									<span><code><?php echo esc_html( $obj[3] ); ?></code></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="gdc-queue gcx-queue">
					<header>
						<span><?php infometry_ct_igs_img( $sf_icon, '' ); ?></span>
						<div><b>Sync jobs</b><small>INFOFISCUS · Snowflake Native App</small></div>
						<em data-gdc-count><?php echo count( $mks_jobs ); ?> of <?php echo count( $mks_jobs ); ?> done</em>
					</header>
					<ol>
						<?php foreach ( $mks_jobs as $job ) : ?>
							<li class="is-<?php echo esc_attr( $job[1] ); ?>" data-gdc-job="<?php echo (int) $job[0]; ?>">
								<span class="gdc-job-ic"><svg><use href="#<?php echo 'bulk' === $job[1] ? 'igs-db' : 'igs-sync'; ?>"/></svg></span>
								<div class="gdc-job-text">
									<b><?php echo esc_html( $job[2] ); ?> <span><?php echo esc_html( $mks_objects[ $job[0] ][0] ); ?></span></b>
									<small>→ <?php echo esc_html( $mks_objects[ $job[0] ][3] ); ?></small>
									<i class="gdc-job-bar"><i></i></i>
								</div>
								<span class="gdc-job-state"><svg><use href="#igs-check"/></svg></span>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
				<span class="gdc-chip is-auth" aria-hidden="true"><svg><use href="#gcx-rocket"/></svg>Up to 5x faster</span>
				<span class="gdc-chip is-store" aria-hidden="true"><svg><use href="#igs-check"/></svg>99.9% data accuracy</span>
			</div>
		</div>
	</section>

	<!-- Proven success -->
	<section class="igs-section gcx-proof" aria-labelledby="mks-proof-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Results</span>
				<h2 id="mks-proof-title">Proven Success with Infometry</h2>
			</div>
			<div class="gcx-proof-grid">
				<?php foreach ( $mks_proof as $i => $item ) : ?>
					<article class="gcx-proof-card is-c<?php echo (int) $i; ?>" data-igs-reveal>
						<span class="gcx-proof-img"><?php infometry_ct_mks_wp_img( $item[0], $item[1] ); ?></span>
						<b aria-hidden="true"><?php echo esc_html( $item[2] ); ?></b>
						<h3><?php echo esc_html( $item[3] ); ?></h3>
						<p><?php echo esc_html( $item[4] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Why choose + key highlights -->
	<section class="igs-section gdc-inspect gcx-split" aria-labelledby="mks-why-title">
		<div class="igs-shell gdc-inspect-grid">
			<div class="gdc-inspect-copy" data-igs-reveal>
				<span class="igs-kicker">Why INFOFISCUS</span>
				<h2 id="mks-why-title">Why Choose INFOFISCUS Marketo Connector?</h2>
				<p>Infometry’s Marketo Connector Snowflake Native App is crafted to eliminate the complexities of Marketo connectivity, APIs, and drivers. Instead of investing time and resources in designing an optimal pipeline, you can now efficiently synchronize your Marketo data with Snowflake in near real-time.</p>
				<p>With INFOFISCUS, your data moves smoothly from Marketo to Snowflake, enabling you to build powerful analytical layers from your landing tables. And with Agentic AI embedded into our approach, your business can unlock intelligent decision-making, adaptive automations, and next-gen data insights.</p>
				<a class="igs-btn igs-btn-primary gcx-uses-btn" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
			</div>
			<div class="gcx-hl-card" data-igs-reveal>
				<div class="gcx-hl-top">
					<div><span class="igs-kicker">At a glance</span><h2>Key Highlights</h2></div>
					<?php infometry_ct_mks_wp_img( '2026/05/Checklist-pana-e1721328731448-480x426-1-300x266.webp', 'Illustration of a woman checking off tasks on a large clipboard checklist, representing why choose infometry', '', 300, 266 ); ?>
				</div>
				<ul class="gcx-checks is-compact">
					<?php foreach ( $mks_highlights as $line ) : ?>
						<li><svg><use href="#igs-check"/></svg><?php echo esc_html( $line ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<!-- How to use -->
	<section class="igs-section gdc-how" aria-labelledby="mks-how-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="mks-how-title">How You Can Use Our INFOFISCUS Marketo to Snowflake Connector</h2>
			</div>
			<div class="gdc-how-grid">
				<ol class="gdc-timeline" data-igs-reveal>
					<?php foreach ( $mks_steps as $i => $step ) : ?>
						<li><b><?php echo (int) $i + 1; ?></b><div><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></div></li>
					<?php endforeach; ?>
				</ol>
				<figure class="gcx-how-media" data-igs-reveal>
					<?php infometry_ct_mks_wp_img( 'elementor/thumbs/Why-Choose-Infometry-–-Intelligent-Data-Integration-Analytics-2-1-rruxosbgcv4o5gjw1ir07604sex1hjtd1bhakfzyvk.webp', 'Illustration of a woman checking off tasks on a large clipboard checklist, representing why choose infometry' ); ?>
				</figure>
			</div>
		</div>
	</section>

	<!-- Real-time integration -->
	<section class="igs-section gcx-features" aria-labelledby="mks-rt-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Real-time</span>
				<h2 id="mks-rt-title">Real-Time Integration at Your Fingertips</h2>
			</div>
			<div class="gcx-imgcards is-two">
				<?php foreach ( $mks_realtime as $i => $item ) : ?>
					<article class="gcx-imgcard is-c<?php echo (int) $i; ?>" data-igs-reveal>
						<span><?php infometry_ct_mks_wp_img( $item[0], $item[1] ); ?></span>
						<div><h3><?php echo esc_html( $item[2] ); ?></h3><p><?php echo esc_html( $item[3] ); ?></p></div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Architecture -->
	<section class="igs-section gcx-arch" aria-labelledby="mks-arch-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Architecture</span>
				<h2 id="mks-arch-title">INFOFISCUS Marketo to Snowflake Connector Architecture</h2>
			</div>
			<figure class="gcx-arch-fig" data-igs-reveal>
				<?php infometry_ct_mks_wp_img( '2026/05/INFOFISCUS-Marketo-Connector-Native-App-for-Snowflake-Architecture-1024x497.webp', 'INFOFISCUS Marketo Connector Native App for Snowflake Architecture', '', 1024, 497 ); ?>
			</figure>
		</div>
	</section>

	<!-- Expertise -->
	<section class="igs-section gcx-expertise" aria-labelledby="mks-exp-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Why Infometry</span>
				<h2 id="mks-exp-title">Infometry Expertise</h2>
			</div>
			<div class="gcx-imgcards">
				<?php foreach ( $mks_expertise as $i => $item ) : ?>
					<article class="gcx-imgcard is-col is-c<?php echo (int) $i; ?>" data-igs-reveal>
						<span><?php infometry_ct_mks_wp_img( $item[0], $item[1] ); ?></span>
						<div><h3><?php echo esc_html( $item[2] ); ?></h3><p><?php echo esc_html( $item[3] ); ?></p></div>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="gcx-band" data-igs-reveal>
				<h2>Ready to experience seamless Marketo integration?</h2>
				<div class="gcx-choose-btns">
					<a class="igs-btn igs-btn-primary" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $contact_url ); ?>">Contact Us</a>
				</div>
			</div>
		</div>
	</section>

	<?php
	infometry_ct_mks_faq( array( 'id' => 'mks-faq', 'faqs' => $mks_faqs, 'email' => $support_email, 'bar' => 'Our team helps you through every step of your integration' ) );

	infometry_ct_mks_related(
		'mks-related-title',
		'Other Products',
		array(
			array( 'url' => home_url( '/product/netsuite-to-snowflake-connector/' ), 'upload' => '2020/12/global-connectors-icon-1.png', 'alt' => 'Icon used to reperesent Connectors', 'title' => 'NetSuite Connector', 'copy' => 'Infometry’s INFOFISCUS NetSuite to Snowflake Connector is a next-gen NO CODE solution for real-time NetSuite data extraction into Snowflake.' ),
			array( 'url' => home_url( '/product/finance-analytics-native-app/' ), 'upload' => '2021/01/analytics-solutions-icon-1.png', 'alt' => 'Infofiscus Analytics solutions', 'title' => 'Finance Analytics Native App', 'copy' => 'This App leverages Snowflake’s analytical power to deliver deep insights, enhancing executive decision-making in financial planning and analysis.' ),
		)
	);

	infometry_ct_mks_cta(
		array(
			'id'        => 'freetrial',
			'anchor2'   => 'freetrialform',
			'title'     => 'Free Trial',
			'copy'      => 'Get the INFOFISCUS Marketo Connector from the Snowflake Marketplace or ask us for a guided trial, and start syncing Marketo data into Snowflake in near real-time.',
			'checks'    => array( 'No-code Snowflake Native App', 'Choose objects & sync frequency', 'Up to 99.9% data accuracy', 'Enterprise-grade security' ),
			'resources' => array(
				array( 'url' => $guide_url, 'icon' => 'igs-down', 'title' => 'User guide', 'sub' => 'Implementation reference' ),
				array( 'url' => $listing_url, 'img' => $sf_icon, 'title' => 'Marketplace', 'sub' => 'Snowflake listing' ),
				array( 'url' => $contact_url, 'icon' => 'igs-chat', 'title' => 'Contact us', 'sub' => 'Talk to an expert' ),
			),
		)
	);

	infometry_ct_mks_footer();
	?>
</main>
<?php get_footer(); ?>
