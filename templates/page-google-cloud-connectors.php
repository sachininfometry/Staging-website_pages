<?php
/**
 * Template Name: Google Cloud Connectors Product
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_url = home_url( '/contact-us/' );
$marketplace_url = 'https://marketplace.informatica.com/search.html#q=Infometry&t=MP&sort=relevancy';
$connectors = array(
	array( 'type' => 'drive', 'title' => 'Google Drive Connector', 'short' => 'Google Drive', 'copy' => 'Schedule and automate secure file uploads, downloads, and fetch operations directly inside Informatica IDMC.', 'url' => home_url( '/product/google-cloud-connectors/google-drive-connector/' ), 'tag' => 'File automation' ),
	array( 'type' => 'sheets', 'title' => 'Google Sheets Connector', 'short' => 'Google Sheets', 'copy' => 'Automate bi-directional data loads between Google Sheets, cloud applications, warehouses, and data lakes—without code.', 'url' => home_url( '/product/google-cloud-connectors/google-sheets-connector/' ), 'tag' => 'Bi-directional sync' ),
	array( 'type' => 'pubsub', 'title' => 'Google Pub/Sub Connector', 'short' => 'Google Pub/Sub', 'copy' => 'Power event-driven pipelines with real-time message publishing and subscription retrieval across cloud ecosystems.', 'url' => home_url( '/product/google-cloud-connectors/google-pub-sub/' ), 'tag' => 'Real-time events' ),
	array( 'type' => 'bigtable', 'title' => 'Google BigTable Connector', 'short' => 'Google BigTable', 'copy' => 'Read, insert, and delete massive-scale NoSQL data with high-performance mappings and governed row-level operations.', 'url' => home_url( '/product/google-cloud-connectors/google-bigtable-connector/' ), 'tag' => 'NoSQL at scale' ),
	array( 'type' => 'ads', 'title' => 'Google Ads Connector', 'short' => 'Google Ads', 'copy' => 'Bring campaign, ad group, spend, and customer reporting into governed analytics pipelines automatically.', 'url' => home_url( '/product/google-cloud-connectors/google-ads-connector/' ), 'tag' => 'Marketing analytics' ),
);

if ( ! function_exists( 'infometry_gcp_connector_icon' ) ) {
	function infometry_gcp_connector_icon( $type ) {
		$labels = array( 'drive' => 'Google Drive', 'sheets' => 'Google Sheets', 'pubsub' => 'Google Pub/Sub', 'bigtable' => 'Google BigTable', 'ads' => 'Google Ads' );
		$label = isset( $labels[ $type ] ) ? $labels[ $type ] : 'Google connector';
		?>
		<span class="igc-brand igc-brand-<?php echo esc_attr( $type ); ?>" role="img" aria-label="<?php echo esc_attr( $label ); ?>">
			<?php if ( 'drive' === $type ) : ?>
				<svg viewBox="0 0 64 56"><path fill="#0F9D58" d="M22 4h17l22 38H44z"/><path fill="#F4B400" d="M22 4 2 40l9 16 20-36z"/><path fill="#4285F4" d="M11 56h42l8-14H19z"/></svg>
			<?php elseif ( 'sheets' === $type ) : ?>
				<svg viewBox="0 0 52 60"><path fill="#0F9D58" d="M7 1h27l12 12v46H7z"/><path fill="#87CEAC" d="M34 1v13h12z"/><path fill="#fff" d="M15 24h24v24H15zm4 4v4h6v-4zm10 0v4h6v-4zM19 36v4h6v-4zm10 0v4h6v-4z"/></svg>
			<?php elseif ( 'pubsub' === $type ) : ?>
				<svg viewBox="0 0 64 64"><path fill="#4285F4" d="m32 2 27 15v30L32 62 5 47V17z"/><circle fill="#fff" cx="20" cy="32" r="5"/><circle fill="#fff" cx="42" cy="20" r="5"/><circle fill="#fff" cx="42" cy="44" r="5"/><path stroke="#fff" stroke-width="4" d="m24 29 13-7M24 35l13 7"/></svg>
			<?php elseif ( 'bigtable' === $type ) : ?>
				<svg viewBox="0 0 64 64"><path fill="#4E7EF7" d="m32 2 28 16v28L32 62 4 46V18z"/><path fill="none" stroke="#fff" stroke-width="2" d="m32 11 19 11v20L32 53 13 42V22zm0 7 13 7v14l-13 7-13-7V25zm0 7 7 4v7l-7 4-7-4v-7z"/></svg>
			<?php else : ?>
				<svg viewBox="0 0 64 58"><path fill="#4285F4" d="M25 6a10 10 0 0 1 18 1l19 34-17 10L25 16a10 10 0 0 1 0-10z"/><path fill="#34A853" d="M25 6 2 45l18 10 23-40z"/><circle fill="#FBBC04" cx="12" cy="46" r="10"/></svg>
			<?php endif; ?>
		</span>
		<?php
	}
}
?>

<main class="igc-page" id="igc-page">
	<section class="igc-hero" aria-labelledby="igc-title">
		<div class="igc-stars" aria-hidden="true"></div>
		<div class="igc-shell igc-hero-grid">
			<div class="igc-hero-copy">
				<span class="igc-eyebrow"><i></i> Google Connectors for Informatica IDMC</span>
				<h1 id="igc-title">Native Google Integration. <em>No-Code Enterprise Scale.</em></h1>
				<p>Connect Google applications to Informatica IDMC with secure, Agentic AI-ready connectors engineered for reliable enterprise automation.</p>
				<div class="igc-actions"><a class="igc-button igc-button-primary" href="#igc-trial">Start a Free Trial</a><a class="igc-button igc-button-ghost" href="<?php echo esc_url( $marketplace_url ); ?>">Explore Marketplace <span>↗</span></a></div>
				<ul class="igc-proof"><li><strong>5</strong><span>Native Google connectors</span></li><li><strong>0</strong><span>Custom code required</span></li><li><strong>24/7</strong><span>Pipeline automation</span></li></ul>
			</div>

			<div class="igc-orbit" data-igc-orbit aria-label="Google connector planetary ecosystem">
				<div class="igc-orbit-ring is-outer"></div><div class="igc-orbit-ring is-inner"></div>
				<div class="igc-orbit-lines" aria-hidden="true"><?php foreach ( $connectors as $connector ) : ?><i></i><?php endforeach; ?></div>
				<div class="igc-orbit-core"><span><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/informatica-product-mark.png' ); ?>" alt=""></span><strong>Informatica IDMC</strong><small>Unified integration core</small></div>
				<?php foreach ( $connectors as $index => $connector ) : ?>
					<a class="igc-orbit-node igc-orbit-node-<?php echo esc_attr( $index + 1 ); ?>" href="<?php echo esc_url( $connector['url'] ); ?>"><?php infometry_gcp_connector_icon( $connector['type'] ); ?><span><b><?php echo esc_html( $connector['short'] ); ?></b><small><?php echo esc_html( $connector['tag'] ); ?></small></span></a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="igc-intro" aria-labelledby="igc-intro-title"><div class="igc-shell igc-intro-grid"><div class="igc-intro-copy"><span class="igc-section-label">Built for modern data teams</span><h2 id="igc-intro-title">One intelligent bridge between Google Cloud and IDMC.</h2><p>Certified connectivity that turns fragmented Google services into governed, production-ready data workflows.</p></div><div class="igc-intro-panel"><div class="igc-intro-panel-head"><span>Connector control plane</span><b>Certified architecture</b></div><div class="igc-intro-route"><div><strong>Google Cloud</strong><small>Files · Events · Apps · Ads</small></div><i aria-hidden="true"><span></span></i><div><strong>Informatica IDMC</strong><small>Map · Govern · Automate</small></div></div><div class="igc-intro-capabilities"><span><i></i>No-code setup</span><span><i></i>Secure execution</span><span><i></i>AI-ready pipelines</span></div></div></div></section>

	<section class="igc-connectors" id="igc-connectors" aria-labelledby="igc-connectors-title"><div class="igc-shell"><div class="igc-heading"><span class="igc-section-label">Connector portfolio</span><h2 id="igc-connectors-title">Choose your Google connection.</h2><p>Purpose-built capabilities, one consistent Informatica experience.</p></div><div class="igc-card-grid">
		<?php foreach ( $connectors as $index => $connector ) : ?><article class="igc-card igc-card-<?php echo esc_attr( $connector['type'] ); ?>"><div class="igc-card-top"><?php infometry_gcp_connector_icon( $connector['type'] ); ?><span class="igc-card-index">0<?php echo esc_html( $index + 1 ); ?></span></div><span class="igc-card-tag"><?php echo esc_html( $connector['tag'] ); ?></span><h3><?php echo esc_html( $connector['title'] ); ?></h3><p><?php echo esc_html( $connector['copy'] ); ?></p><a href="<?php echo esc_url( $connector['url'] ); ?>">Explore connector <span>→</span></a></article><?php endforeach; ?>
	</div></div></section>

	<section class="igc-benefits" aria-labelledby="igc-benefits-title"><div class="igc-shell"><div class="igc-heading"><span class="igc-section-label">Why Infometry</span><h2 id="igc-benefits-title">Connectivity engineered beyond the endpoint.</h2></div><div class="igc-benefit-grid"><article><span>01</span><h3>No-Code by Design</h3><p>Configure complex integration workflows through guided, reusable mappings instead of custom scripts.</p></article><article><span>02</span><h3>Agentic AI-Ready</h3><p>Build reliable foundations for intelligent orchestration, automated decisions, and responsive data operations.</p></article><article><span>03</span><h3>Enterprise Governance</h3><p>Operate with IDMC security, monitoring, lineage, and control across every connector workflow.</p></article><article><span>04</span><h3>Built to Scale</h3><p>Handle real-time events, massive datasets, scheduled files, and evolving analytics requirements.</p></article></div></div></section>

	<section class="igc-request"><div class="igc-shell igc-request-panel"><div><span class="igc-section-label">Need another endpoint?</span><h2>Can’t find your connector?</h2><p>Tell us what your data ecosystem needs. Our connector specialists will help map the fastest path to production.</p></div><a class="igc-button igc-button-light" href="<?php echo esc_url( $contact_url ); ?>">Request Your Connector <span>→</span></a></div></section>

	<section class="igc-related" aria-labelledby="igc-related-title"><div class="igc-shell"><div class="igc-heading igc-heading-centered"><span class="igc-section-label">Explore the ecosystem</span><h2 id="igc-related-title">Other Products</h2><p>Extend your data platform with Infometry’s AI, Snowflake, and analytics solutions.</p></div><div class="igc-related-grid"><a class="igc-product-conversa" href="<?php echo esc_url( home_url( '/product/conversational-analytics/' ) ); ?>"><span class="igc-product-icon"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infofiscus-conversa-mark.png' ); ?>" alt=""></span><span class="igc-product-type">Conversational AI</span><h3>INFOFISCUS Conversa</h3><p>AI-powered conversational analytics that turns enterprise data into governed insights through natural language.</p><b>Explore Conversa <span>→</span></b></a><a class="igc-product-snowflake" href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>"><span class="igc-product-icon"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-product-mark.png' ); ?>" alt=""></span><span class="igc-product-type">Native applications</span><h3>INFOFISCUS Snowflake Native Apps</h3><p>Native Snowflake applications that accelerate analytics, integration, and operational reporting.</p><b>Snowflake Native Apps <span>→</span></b></a><a class="igc-product-analytics" href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>"><span class="igc-product-icon"><svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 38V12m0 26h28M16 31l7-8 6 5 8-12"/></svg></span><span class="igc-product-type">Ready-to-use solutions</span><h3>Pre-Built Analytics Apps</h3><p>Ready-to-use analytics solutions for IDMC and Matillion that reduce implementation time.</p><b>Pre-Built Analytics Apps <span>→</span></b></a></div></div></section>

	<section class="igc-demo" id="igc-trial" aria-labelledby="igc-demo-title"><div class="igc-shell"><div class="igc-heading igc-heading-centered"><span class="igc-section-label">Schedule a consultation</span><h2 id="igc-demo-title">Experience Google connectivity in action.</h2><p>Choose a convenient date and tell us where your data workflows need to go next.</p></div><div class="igc-demo-grid"><div class="igc-demo-calendar" data-igc-demo-calendar><div class="igc-calendar-head"><button type="button" data-igc-calendar-prev aria-label="Previous month">‹</button><strong data-igc-calendar-label>Choose a Date</strong><button type="button" data-igc-calendar-next aria-label="Next month">›</button></div><div class="igc-calendar-weekdays" aria-hidden="true"><i>Sun</i><i>Mon</i><i>Tue</i><i>Wed</i><i>Thu</i><i>Fri</i><i>Sat</i></div><div class="igc-calendar-days" data-igc-calendar-days></div><p class="igc-selected-date" data-igc-selected-date aria-live="polite"></p></div><div class="igc-demo-form-host"><?php if ( shortcode_exists( 'wpforms' ) ) : ?><?php echo do_shortcode( sprintf( '[wpforms id="%d" title="false" description="false" ajax="true"]', absint( INFOMETRY_CT_GOOGLE_FORM_ID ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php else : ?><form class="igc-demo-form"><div class="icp-demo-form-head"><strong>Request your personalized connector demo</strong><p>Share your requirements and our connector team will connect with you.</p></div><div class="icp-demo-preferences"><label>Demo Date<input type="hidden" data-icp-demo-date><input type="text" data-icp-demo-date-display readonly></label><label>Demo Time *<input type="time" data-icp-demo-time></label><label>Time Zone *<select data-icp-demo-timezone><option>Eastern Time (ET)</option></select></label></div><div class="igc-fallback-fields"><label>First Name *<input></label><label>Last Name *<input></label><label>Company Email *<input type="email"></label><label>Contact Number *<input></label><label>Company<input></label></div><button type="button">Request a Demo</button></form><?php endif; ?></div></div></div></section>
</main>

<?php get_footer(); ?>
