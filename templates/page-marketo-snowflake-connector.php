<?php
/**
 * Template Name: Marketo to Snowflake Connector Product
 * Template Post Type: page, product
 *
 * Own design for this product (hero, sections and animations built around what it does);
 * shares only the connector base (shell, buttons, FAQ, form, footer) with the other product pages.
 * Every heading and line of copy from the original page is kept.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();

$listing_url = 'https://app.snowflake.com/marketplace/listing/GZSTZ3867UG/infometry-infofiscus-marketo-connector?originTab=provider&providerName=Infometry&profileGlobalName=GZSTZ3867OQ';
$guide_url   = 'https://docs.google.com/document/d/1r9-81RLVobNZDEryi-9XP5LMbiDTRgwJ/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$mk          = 'txt:M|#5c4c9f';
$sf          = 'google-sheets/eco-snowflake.png';
$e           = 'google-sheets/eco-';

$pg = array(
	'faq'         => array(
		'intro' => 'Speed, objects, security and results: what teams ask before they sync Marketo data into Snowflake.',
		'help'  => 'Our team helps you through every step of your integration.',
		'facts' => array( array( 'pg-snow', 'Runs in', 'Your Snowflake account · Native App' ), array( 'pg-rocket', 'Speed', 'Up to 5x faster integration' ), array( 'igs-check', 'Accuracy', 'Up to 99.9% data accuracy' ), array( 'pg-users', 'Adoption', '200+ organizations' ) ),
		'items' => array(
			array( 'What is the INFOFISCUS Marketo Connector?', 'The INFOFISCUS Marketo Connector is a pre-built, comprehensive connector available as a Native Application in the Snowflake Marketplace. It is designed to seamlessly integrate Marketo and extract data with a single click, making data synchronization efficient and straightforward.' ),
			array( 'How does the INFOFISCUS Marketo Connector benefit my business?', 'The INFOFISCUS Marketo Connector eliminates the need to invest time and resources in understanding Marketo connectivity, APIs, and drivers. It ensures near real-time synchronization of Marketo data to Snowflake, enabling you to focus on building powerful analytical layers and deriving actionable insights.' ),
			array( 'What makes INFOFISCUS Marketo Connector different from other connectors?', 'INFOFISCUS Marketo Connector offers advanced data pipeline capabilities for efficient data ingestion, unique features like selecting specific Marketo objects and customizing synchronization frequency, and regular updates ensuring up to 99.9% data accuracy. Additionally, it is designed and supported by Infometry, ensuring reliability and security.' ),
			array( 'How fast is the data integration process with INFOFISCUS Marketo Connector?', 'The INFOFISCUS Marketo Connector can achieve data integration speeds up to 5x faster than traditional methods, allowing for efficient and near real-time data ingestion from Marketo to Snowflake.' ),
			array( 'Can I select specific data objects from Marketo to sync with Snowflake?', 'Yes, the INFOFISCUS Marketo Connector allows you to select specific objects of interest from Marketo and customize the frequency of data synchronization with Snowflake, ensuring you get the exact data you need, when you need it.' ),
			array( 'How secure is my data with the INFOFISCUS Marketo Connector?', 'Infometry ensures the integrity and security of your data, providing reliable data handling and peace of mind.' ),
			array( 'How many organizations are currently using the INFOFISCUS Marketo Connector?', 'Over 200 organizations have enhanced their data strategies with the INFOFISCUS Marketo Connector, experiencing significant improvements in data processing efficiency and cost savings.' ),
			array( 'What kind of improvements can I expect with the INFOFISCUS Marketo Connector?', 'Businesses using the INFOFISCUS Marketo Connector have seen up to a 40% increase in data processing efficiency and an average of 30% savings on integration costs.' ),
			array( 'How often are updates and new features added to the INFOFISCUS Marketo Connector?', 'The INFOFISCUS Marketo Connector is regularly updated with new objects and features, ensuring your integration stays up-to-date and accurate.' ),
		),
	),
	'related'     => array(
		array( '/product/netsuite-to-snowflake-connector/', 'google-sheets/eco-netsuite.png', 'NetSuite Connector', 'Infometry’s INFOFISCUS NetSuite to Snowflake Connector is a next-gen NO CODE solution for real-time NetSuite data extraction into Snowflake.' ),
		array( '/product/finance-analytics-native-app/', 'svg:pg-coin', 'Finance Analytics Native App', 'This App leverages Snowflake’s analytical power to deliver deep insights, enhancing executive decision-making in financial planning and analysis.' ),
	),
	'cta'         => array(
		'id'        => 'freetrial',
		'anchor2'   => 'freetrialform',
		'kicker'    => 'Free trial',
		'h2'        => 'Free Trial',
		'p'         => 'Sync Marketo data into Snowflake. Get the INFOFISCUS Marketo Connector from the Snowflake Marketplace or ask us for a guided trial.',
		'checks'    => array( 'No-code Snowflake Native App', 'Choose objects & sync frequency', 'Up to 99.9% data accuracy', 'Enterprise-grade security' ),
		'next'      => array( array( 'Submit your request', 'Takes under a minute.' ), array( 'We set up your trial', 'With guidance from our team.' ), array( 'Start syncing', 'Marketo data lands in Snowflake.' ) ),
		'form_id'   => 351429,
		'form_head' => 'Request Free Trial',
	),
);

require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

$img = INFOMETRY_CT_URL . 'assets/images/';
$pg_allowed = array(
	'a'      => array( 'href' => array(), 'target' => array(), 'rel' => array() ),
	'em'     => array(),
	'strong' => array(),
	'b'      => array(),
	'br'     => array(),
	'small'  => array(),
	'p'      => array(),
	'ul'     => array(),
	'li'     => array(),
	'h4'     => array(),
);
/** Print trusted page copy that may hold links or emphasis. */
$pg_html = function ( $html ) use ( $pg_allowed ) {
	echo wp_kses( $html, $pg_allowed );
};
/**
 * Print a logo or icon from a spec: an image path under assets/images, 'svg:<sprite id>',
 * 'txt:<letter>|<colour>' for a lettered tile, or 'bars' for the Power BI style bars.
 */
$pgi = function ( $spec, $alt = '', $svg_class = '' ) use ( $img ) {
	if ( 0 === strpos( $spec, 'svg:' ) ) {
		printf( '<svg%s><use href="#%s"/></svg>', $svg_class ? ' class="' . esc_attr( $svg_class ) . '"' : '', esc_attr( substr( $spec, 4 ) ) );
	} elseif ( 0 === strpos( $spec, 'txt:' ) ) {
		$parts = explode( '|', substr( $spec, 4 ) . '|' );
		printf( '<b class="pg-txt" style="--bg:%s" aria-hidden="true">%s</b>', esc_attr( $parts[1] ? $parts[1] : '#5c4c9f' ), esc_html( $parts[0] ) );
	} elseif ( 'bars' === $spec ) {
		echo '<i class="igs-eco-bars"><i></i><i></i><i></i></i>';
	} else {
		infometry_ct_igs_img( $img . $spec, $alt );
	}
};
$pg_btn = function ( $btn, $class ) {
	$external = 0 === strpos( $btn[1], 'http' );
	printf(
		'<a class="igs-btn %1$s" href="%2$s"%3$s>%4$s%5$s%6$s</a>',
		esc_attr( $class ),
		esc_url( $btn[1] ),
		$external ? ' target="_blank" rel="noopener"' : '',
		! empty( $btn[2] ) ? '<svg><use href="#' . esc_attr( $btn[2] ) . '"/></svg> ' : '',
		esc_html( $btn[0] ),
		empty( $btn[2] ) ? ' <svg><use href="#igs-arrow"/></svg>' : ''
	);
};
$pg_faq_schema = array(
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
		$pg['faq']['items']
	),
);
/** Free trial / demo section with its WPForms form. */
$pg_cta = function ( $c ) use ( $pg_html ) {
	$tid = $c['id'] . '-title';
	?>
	<section class="igs-cta" id="<?php echo esc_attr( $c['id'] ); ?>" aria-labelledby="<?php echo esc_attr( $tid ); ?>">
		<?php if ( ! empty( $c['anchor2'] ) ) : ?><span id="<?php echo esc_attr( $c['anchor2'] ); ?>" class="pg-anchor"></span><?php endif; ?>
		<div class="igs-shell igs-cta-grid">
			<div class="igs-cta-copy">
				<span class="igs-kicker"><?php echo esc_html( $c['kicker'] ); ?></span>
				<h2 id="<?php echo esc_attr( $tid ); ?>"><?php $pg_html( $c['h2'] ); ?></h2>
				<p><?php $pg_html( $c['p'] ); ?></p>
				<ul class="igs-cta-checks">
					<?php foreach ( $c['checks'] as $check ) : ?><li><svg><use href="#igs-check"/></svg><?php echo esc_html( $check ); ?></li><?php endforeach; ?>
				</ul>
				<div class="igs-cta-next">
					<b>What happens next</b>
					<ol>
						<?php foreach ( $c['next'] as $n => $next ) : ?><li><span><?php echo (int) $n + 1; ?></span><p><strong><?php echo esc_html( $next[0] ); ?></strong><?php echo esc_html( $next[1] ); ?></p></li><?php endforeach; ?>
					</ol>
				</div>
			</div>
			<div class="igs-form">
				<h3><?php echo esc_html( $c['form_head'] ); ?></h3>
				<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
					<?php echo do_shortcode( sprintf( '[wpforms id="%d" title="false" description="false"]', absint( $c['form_id'] ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<p>The request form is temporarily unavailable. Email us at <a href="mailto:info@infometry.net">info@infometry.net</a>.</p>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
};
/** Page icons (pg-*) on top of the shared igs-* sprite. */
$pg_sprite = function () {
	?>
	<svg class="igs-sprite" aria-hidden="true" focusable="false">
		<symbol id="pg-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></symbol>
		<symbol id="pg-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></symbol>
		<symbol id="pg-table" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2.5"/><path d="M3 9.5h18M3 15h18M9 9.5V20"/></symbol>
		<symbol id="pg-row" viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="8" rx="2"/><path d="M8 8v8"/></symbol>
		<symbol id="pg-trash" viewBox="0 0 24 24"><path d="M4 7h16M9 7V4.5h6V7M6.5 7l1 13h9l1-13M10 11v5M14 11v5"/></symbol>
		<symbol id="pg-send" viewBox="0 0 24 24"><path d="M21 3 10 14M21 3l-7 18-4-7-7-4 18-7Z"/></symbol>
		<symbol id="pg-inbox" viewBox="0 0 24 24"><path d="M3 13h5l1.5 3h5L16 13h5"/><path d="M5.5 5h13L21 13v6H3v-6l2.5-8Z"/></symbol>
		<symbol id="pg-camera" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2.5"/><circle cx="12" cy="13.5" r="3.5"/><path d="M8.5 7 10 4.5h4L15.5 7"/></symbol>
		<symbol id="pg-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.6 3.8 5.6 3.8 9s-1.2 6.4-3.8 9c-2.6-2.6-3.8-5.6-3.8-9S9.4 5.6 12 3Z"/></symbol>
		<symbol id="pg-trend" viewBox="0 0 24 24"><path d="M3 17 9 11l4 4 8-8"/><path d="M15 7h6v6"/></symbol>
		<symbol id="pg-coin" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M14.8 9.2c-.5-.9-1.6-1.4-2.8-1.4-1.7 0-2.8.9-2.8 2.1 0 2.9 5.8 1.5 5.8 4.3 0 1.2-1.2 2.1-3 2.1-1.3 0-2.5-.6-3-1.6M12 6v1.8M12 16.3V18"/></symbol>
		<symbol id="pg-rocket" viewBox="0 0 24 24"><path d="M14 4c3-1 6-1 6-1s0 3-1 6l-6 6-5-5 6-6Z"/><path d="m8 10-4 .5L3 13l4 1M14 16l-.5 4-2.5 1-1-4"/><circle cx="15" cy="9" r="1.5"/></symbol>
		<symbol id="pg-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.2"/></symbol>
		<symbol id="pg-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="pg-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
		<symbol id="pg-funnel" viewBox="0 0 24 24"><path d="M3 4h18l-7 8.5V20l-4-2v-5.5L3 4Z"/></symbol>
		<symbol id="pg-api" viewBox="0 0 24 24"><path d="M8 7 3 12l5 5M16 7l5 5-5 5M14 4l-4 16"/></symbol>
		<symbol id="pg-plug" viewBox="0 0 24 24"><path d="M9 3v5M15 3v5M6 8h12v3a6 6 0 0 1-12 0V8ZM12 17v4"/></symbol>
		<symbol id="pg-robot" viewBox="0 0 24 24"><rect x="4" y="8" width="16" height="12" rx="3"/><path d="M12 8V4M9 13h.01M15 13h.01M9 17h6"/><circle cx="12" cy="3.5" r="1"/></symbol>
		<symbol id="pg-pie" viewBox="0 0 24 24"><path d="M12 3v9h9a9 9 0 1 1-9-9Z"/><path d="M15 3.5A9 9 0 0 1 20.5 9H15V3.5Z"/></symbol>
		<symbol id="pg-snow" viewBox="0 0 24 24"><path d="M12 2v20M3.3 7l17.4 10M3.3 17 20.7 7"/><path d="m9 4 3 2 3-2M9 20l3-2 3 2M4 10.5l1-3.5-3.5-1M20 13.5l-1 3.5 3.5 1M4 13.5 5 17l-3.5 1M20 10.5 19 7l3.5-1"/></symbol>
	</svg>
	<?php
};
$mk_funnel = array(
	array( 'Leads', '486,210', 'MKTO_LEADS' ),
	array( 'Activities', '3,918,402', 'MKTO_ACTIVITIES' ),
	array( 'Programs', '1,284', 'MKTO_PROGRAMS' ),
	array( 'Smart Campaigns', '762', 'MKTO_CAMPAIGNS' ),
	array( 'Email Performance', '58,907', 'MKTO_EMAILS' ),
);
?>
<main class="igs-page pg-page mk-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php $pg_sprite(); ?>

	<!-- Hero: Marketo funnel draining into Snowflake landing tables -->
	<section class="igs-hero mk-hero" aria-labelledby="mk-title">
		<div class="igs-shell igs-hero-grid mk-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i>INFOFISCUS Marketo Connector · Snowflake Native App</span>
				<h1 id="mk-title">Unlock the Power of Your <em>Marketo Data</em> with Infometry</h1>
				<p>Welcome to the future of marketing data integration with the INFOFISCUS Marketo Connector, a pre-built and comprehensive solution available as a Native Application in the <a href="<?php echo esc_url( $listing_url ); ?>" target="_blank" rel="noopener">Snowflake Marketplace</a>. Designed by Infometry, this NO-CODE connector revolutionizes the way you integrate Marketo, offering a seamless, single-click data extraction process powered by Agentic AI for smarter, automated workflows.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary x-btn" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download Our User Guide Now!</a>
					<a class="igs-btn igs-btn-ghost" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
				</div>
				<ul class="mk-hero-tags" aria-label="Highlights"><li>No-code</li><li>Single-click extraction</li><li>Near real-time</li><li>Agentic AI</li></ul>
			</div>

			<div class="mk-funnel" data-mk-funnel aria-label="Animated example: Marketo leads, activities, programs, smart campaigns and email performance sync one by one into Snowflake landing tables through the INFOFISCUS Marketo Connector">
				<div class="mk-f-head" aria-hidden="true"><span class="mk-f-logo">M</span><div><b>Marketo</b><small>Marketing automation</small></div><em><i></i>Syncing</em></div>
				<ol class="mk-f-levels" aria-hidden="true">
					<?php foreach ( $mk_funnel as $i => $f ) : ?>
						<li data-mk-level style="--w:<?php echo (int) ( 100 - $i * 11 ); ?>%"><span><b><?php echo esc_html( $f[0] ); ?></b><em class="x-mono"><?php echo esc_html( $f[1] ); ?></em></span></li>
					<?php endforeach; ?>
				</ol>
				<div class="mk-f-drop" aria-hidden="true"><i></i><i></i><i></i></div>
				<div class="mk-f-sink" aria-hidden="true">
					<header><?php $pgi( $sf ); ?><b>Snowflake</b><small>landing tables</small></header>
					<ul>
						<?php foreach ( $mk_funnel as $f ) : ?>
							<li data-mk-table class="x-mono"><?php echo esc_html( $f[2] ); ?><i>✓</i></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Proven success -->
	<section class="x-sec mk-proof" aria-labelledby="mk-proof-title">
		<div class="igs-shell">
			<div class="mk-proof-band" data-igs-reveal>
				<div class="mk-proof-head"><span class="igs-kicker">Results</span><h2 id="mk-proof-title">Proven Success with Infometry</h2></div>
				<div class="mk-proof-grid">
					<article><b aria-hidden="true">200+</b><h3>Growing Adoption</h3><p>Over 200 organizations have enhanced their data strategies with Infometry.</p></article>
					<article><b aria-hidden="true">40%</b><h3>Efficiency Gains</h3><p>Experience up to a 40% increase in data processing efficiency.</p></article>
					<article><b aria-hidden="true">30%</b><h3>Cost Savings</h3><p>Save an average of 30% on integration costs with Infometry’s solution.</p></article>
				</div>
			</div>
		</div>
	</section>

	<!-- Why choose + key highlights as sync settings -->
	<section class="x-sec mk-why" aria-labelledby="mk-why-title">
		<div class="igs-shell x-grid2">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">Why INFOFISCUS</span>
				<h2 id="mk-why-title">Why Choose INFOFISCUS Marketo Connector?</h2>
				<p>Infometry’s Marketo Connector Snowflake Native App is crafted to eliminate the complexities of Marketo connectivity, APIs, and drivers. Instead of investing time and resources in designing an optimal pipeline, you can now efficiently synchronize your Marketo data with Snowflake in near real-time.</p>
				<p>With INFOFISCUS, your data moves smoothly from Marketo to Snowflake, enabling you to build powerful analytical layers from your landing tables. And with Agentic AI embedded into our approach, your business can unlock intelligent decision-making, adaptive automations, and next-gen data insights.</p>
				<p><a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a></p>
			</div>
			<div class="mk-card" data-igs-reveal>
				<header><span class="mk-f-logo">M</span><h2>Key Highlights</h2><em>INFOFISCUS</em></header>
				<ul>
					<li><svg><use href="#pg-clock"/></svg><span>Efficient and near real-time data ingestion from Marketo to Snowflake.</span></li>
					<li><svg><use href="#igs-sync"/></svg><span>Seamlessly integrated for always up-to-date data.</span></li>
					<li><svg><use href="#pg-funnel"/></svg><span>Select specific Marketo objects and customize sync frequency.</span><em class="mk-freq" aria-hidden="true"><i class="is-on">Hourly</i><i>Daily</i></em></li>
					<li><svg><use href="#pg-rocket"/></svg><span>Regular updates with new features for agile data strategy.</span></li>
					<li><svg><use href="#igs-shield"/></svg><span>Infometry ensures data integrity, Agentic AI–driven intelligence, and enterprise-grade security.</span></li>
				</ul>
			</div>
		</div>
	</section>

	<!-- How to use: onboarding wizard -->
	<section class="x-sec x-dark mk-wizard-sec" aria-labelledby="mk-how-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="mk-how-title">How You Can Use Our INFOFISCUS Marketo to Snowflake Connector</h2>
			</div>
			<div class="mk-wizard" data-mk-wizard data-igs-reveal>
				<div class="mk-w-bar" aria-hidden="true"><i data-mk-progress></i></div>
				<ol>
					<li data-mk-step class="is-on"><b>1</b><em>Find</em><p>Navigate to the Snowflake Marketplace and search for the INFOFISCUS Marketo Connector.</p></li>
					<li data-mk-step><b>2</b><em>Install</em><p>Click on Get to install and start using its free trial.</p></li>
					<li data-mk-step><b>3</b><em>Authorize</em><p>Use your Marketo credentials to log in and authorize the connector.</p></li>
					<li data-mk-step><b>4</b><em>Select</em><p>Choose specific data objects from Marketo that you want to sync with Snowflake.</p></li>
				</ol>
			</div>
		</div>
	</section>

	<!-- Real-time integration -->
	<section class="x-sec mk-rt" aria-labelledby="mk-rt-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Real-time</span>
				<h2 id="mk-rt-title">Real-Time Integration at Your Fingertips</h2>
			</div>
			<div class="mk-rt-grid">
				<article data-igs-reveal><span class="mk-pulse" aria-hidden="true"><i></i><i></i><svg><use href="#igs-sync"/></svg></span><div><h3>Streamlined Processes</h3><p>Join the growing number of businesses leveraging the INFOFISCUS Marketo Connector, designed by Infometry, to streamline their data integration processes with the added intelligence of Agentic AI.</p></div></article>
				<article data-igs-reveal><span class="mk-pulse is-b" aria-hidden="true"><i></i><i></i><svg><use href="#igs-check"/></svg></span><div><h3>Seamless Synchronization</h3><p>Infometry’s expertise ensures seamless data synchronization, allowing you to focus on deriving actionable insights and driving business growth.</p></div></article>
			</div>
		</div>
	</section>

	<!-- Architecture -->
	<section class="x-sec x-soft mk-arch" aria-labelledby="mk-arch-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Architecture</span>
				<h2 id="mk-arch-title">INFOFISCUS Marketo to Snowflake Connector Architecture</h2>
			</div>
			<div class="mk-arch-flow" data-igs-reveal aria-label="Marketo data flows into the INFOFISCUS Marketo Connector native app inside the customer's Snowflake account, lands in tables and feeds analytical layers and Agentic AI">
				<div class="mk-a-node is-src"><span class="mk-f-logo">M</span><b>Marketo</b><small>Objects · sync frequency</small></div>
				<i class="mk-a-link" aria-hidden="true"></i>
				<div class="mk-a-acct">
					<small class="mk-a-tag"><?php $pgi( $sf ); ?>Your Snowflake account</small>
					<div class="mk-a-node"><svg><use href="#igs-bolt"/></svg><b>INFOFISCUS Native App</b><small>No-code · single click</small></div>
					<i class="mk-a-link" aria-hidden="true"></i>
					<div class="mk-a-node"><svg><use href="#pg-table"/></svg><b>Landing tables</b><small>Always up to date</small></div>
					<i class="mk-a-link" aria-hidden="true"></i>
					<div class="mk-a-node"><svg><use href="#igs-layers"/></svg><b>Analytical layers</b><small>Models · dashboards</small></div>
					<i class="mk-a-link" aria-hidden="true"></i>
					<div class="mk-a-node is-ai"><svg><use href="#igs-chart"/></svg><b>Agentic AI insights</b><small>Decisions · automations</small></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Expertise -->
	<section class="x-sec mk-exp" aria-labelledby="mk-exp-title">
		<div class="igs-shell mk-exp-grid">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">Why Infometry</span>
				<h2 id="mk-exp-title">Infometry Expertise</h2>
			</div>
			<ol class="mk-exp-list">
				<li data-igs-reveal><b>01</b><div><h3>Specialists in Data Integration</h3><p>Experts in developing advanced data integration solutions tailored for Snowflake.</p></div></li>
				<li data-igs-reveal><b>02</b><div><h3>Proven Track Record</h3><p>Years of experience delivering reliable connectors that streamline data pipelines.</p></div></li>
				<li data-igs-reveal><b>03</b><div><h3>Trusted by Industry Leaders</h3><p>Commitment to innovation ensures cutting-edge solutions for seamless integration, now enhanced with Agentic AI capabilities.</p></div></li>
				<li data-igs-reveal><b>04</b><div><h3>Customer-Centric Approach</h3><p>Focus on customer satisfaction, providing robust support and tailored solution</p></div></li>
			</ol>
		</div>
		<div class="igs-shell">
			<div class="mk-ready" data-igs-reveal>
				<span class="mk-f-logo" aria-hidden="true">M</span>
				<h2>Ready to experience seamless Marketo integration?</h2>
				<div class="pg-btns"><a class="igs-btn igs-btn-primary" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a><a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us</a></div>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="igs-section igs-faq" aria-labelledby="pg-faq-title">
		<div class="igs-shell igs-faq-shell">
			<div class="igs-faq-side" data-igs-reveal>
				<span class="igs-kicker">FAQ</span>
				<h2 id="pg-faq-title">Frequently Asked Questions</h2>
				<p><?php echo esc_html( $pg['faq']['intro'] ); ?></p>
				<div class="igs-faq-help">
					<span><svg><use href="#igs-chat"/></svg></span>
					<b>Still have questions?</b>
					<small><?php echo esc_html( $pg['faq']['help'] ); ?></small>
					<a href="mailto:info@infometry.net">info@infometry.net</a>
					<ul class="igs-faq-facts">
						<?php foreach ( $pg['faq']['facts'] as $fact ) : ?><li><span><svg><use href="#<?php echo esc_attr( $fact[0] ); ?>"/></svg></span><div><small><?php echo esc_html( $fact[1] ); ?></small><b><?php echo esc_html( $fact[2] ); ?></b></div></li><?php endforeach; ?>
					</ul>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				</div>
			</div>
			<div class="igs-faq-list">
				<?php foreach ( $pg['faq']['items'] as $fi => $faq ) : ?>
					<details<?php echo 0 === $fi ? ' open' : ''; ?>>
						<summary><?php echo esc_html( $faq[0] ); ?><span aria-hidden="true"><svg><use href="#igs-plus"/></svg></span></summary>
						<div class="pg-faq-a"><?php $pg_html( false === strpos( $faq[1], '<p>' ) ? '<p>' . $faq[1] . '</p>' : $faq[1] ); ?></div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
		<script type="application/ld+json"><?php echo wp_json_encode( $pg_faq_schema ); ?></script>
	</section>

	<!-- Other products -->
	<section class="igs-section igs-related" aria-labelledby="pg-related-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Explore more</span>
				<h2 id="pg-related-title">Other Products</h2>
			</div>
			<div class="igs-related-grid">
				<?php foreach ( $pg['related'] as $card ) : ?>
					<a class="igs-related-card" href="<?php echo esc_url( home_url( $card[0] ) ); ?>" data-igs-reveal>
						<span><?php $pgi( $card[1], '', 'igs-pipe-generic' ); ?></span>
						<div><h3><?php echo esc_html( $card[2] ); ?></h3><p><?php echo esc_html( $card[3] ); ?></p><em>Read more <svg><use href="#igs-arrow"/></svg></em></div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	if ( ! empty( $pg['cta'] ) ) {
		$pg_cta( $pg['cta'] );
	}
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
					<a class="infometry-footer-contact" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <span aria-hidden="true">→</span></a>
				</div>
				<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( home_url( '/product/infofiscus-conversa-decision-intelligence/' ) ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/informatica-connectors/' ) ); ?>">Informatica Connectors</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( home_url( '/product/accelerators-for-data-warehouse-migration-automation/' ) ); ?>">Accelerators</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( home_url( '/company/customers-partners/' ) ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
			</div>
			<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
		</div>
	</footer>
</main>
<?php get_footer(); ?>
