<?php
/**
 * Template Name: Finance Analytics Native App Product
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

$guide_url   = 'https://docs.google.com/document/d/15dQ80rafN1afgjfnlExqKYgxi14cET8i/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$listing_url = 'https://app.snowflake.com/marketplace/listing/GZSTZ3867UC/infometry-infofiscus-finance-analytics?originTab=provider&providerName=Infometry&profileGlobalName=GZSTZ3867OQ';
$sf          = 'google-sheets/eco-snowflake.png';
$ns          = 'google-sheets/eco-netsuite.png';
$e           = 'google-sheets/eco-';

$pg = array(
	'faq'         => array(
		'intro' => 'Architecture, setup, dashboards and roadmap: what finance teams ask before they run analytics natively in Snowflake.',
		'help'  => 'Talk to our team about INFOFISCUS Finance Analytics.',
		'facts' => array( array( 'pg-snow', 'Runs in', 'Your Snowflake account · Native App' ), array( 'igs-sync', 'Sources', 'NetSuite today · more ERPs next' ), array( 'igs-chart', 'KPIs', 'CapEx, OpEx, GL, AR, AP, CCC' ), array( 'pg-robot', 'Intelligence', 'Agentic AI recommendations' ) ),
		'items' => array(
			array( 'What is Finance Analytics Snowflake Native Application, and how does it redefine Finance Analytics?', 'Business leaders face a complex decision-making process in financial planning, and prioritizing the use of the sophisticated INFOFISCUS Finance Analytics Application is the best step forward to gain deep insights, make predictions, and recommend plans of action to achieve better business outcomes. This powerful native application is available in the Snowflake Marketplace.' ),
			array( 'How does INFOFISCUS streamline the data analytics process?', 'INFOFISCUS eliminates the need for building an end-to-end data warehouse pipeline. It efficiently synchronizes data from Salesforce to Snowflake, providing real-time, detailed, and cognitive analytics for financial analysis and planning for executive decision-making.' ),
			array( 'What are the key benefits of using Finance Analytics Snowflake Native Application?', 'Simplified Installation and deployment, Cost-Efficient Data Management, Ready-to-Use Data Pipelines, Comprehensive Data Warehouse Structure, Optimized Dimensional Models and Metrics, Pre-Installed Application Environments, Customizable Data Transformations, Financial Analysis & Analysis, and Risk Management.' ),
			array( 'Can you explain the high-level architecture of Finance Analytics Snowflake Native Application?', 'The architecture involves seamless data ingestion from various sources, data extraction using Python, computing with a consumer Snowflake virtual warehouse, building incremental data pipelines, and extensive choice of tools and libraries that support AI/ML to unleash insights.' ),
			array( 'What use cases and applications does INFOFISCUS address?', 'INFOFISCUS overcomes organizational challenges with seamless integration of critical business data into ERP and CRM systems. Snowflake data integration provides fully automated dashboards, including intuitive sales, marketing, finance, and supply chain, combined with AI-powered embedded Analytics.' ),
			array( 'How can businesses use and implement INFOFISCUS Finance Analytics Snowflake Native Application?', 'Users tend to have better experience using a Native App. Get started with Snowflake Native App, discover and install the app from the Snowflake Marketplace, and follow the step-by-step instructions in the readme file.' ),
			array( 'What is on the horizon for INFOFISCUS?', 'The roadmap includes seamless integration with CRM & ERP systems, Advanced AI-driven predictive analytics, and many more to improve customer experiences with data analytics.' ),
			array( 'What does the INFOFISCUS Finance Analytics Snowflake Native Application dashboard offer in terms of visual representation?', 'The dashboard provides visualizations like charts, tables, graphs, metrics, and gauges, for tracking Operating Expenses, Analyzed Revenue, Cash flow, Account Receivable, Accounts Payable, Cash Conversion Cycle to measure profitability.' ),
			array( 'How does INFOFISCUS Finance Analytics Snowflake Native Application provide In-App support and guidance?', 'Snowflake Marketplace offers a convenient platform for users to access the INFOFISCUS Sales Analytics application and help a user to use the product through user guides. They can also refer to the readme file for step-by-step instructions.' ),
			array( 'How can businesses stay updated on INFOFISCUS developments and updates?', 'Get regular updates from INFOFISCUS product roadmap guide and Snowflake Marketplace. INFOFISCUS documentation will keep users engaged and informed about new features and product updates.' ),
		),
	),
	'related'     => array(
		array( '/product/sales-analytics-native-app/', 'svg:igs-chart', 'Sales Analytics Native App', 'INFOFISCUS Sales Analytics on Snowflake efficiently handles data ingestion, transformation, and AI/ML-powered analytics.' ),
		array( '/product/netsuite-to-snowflake-connector/', $ns, 'NetSuite Connector', 'Infometry’s INFOFISCUS NetSuite to Snowflake Connector is a next-gen NO CODE solution for real-time NetSuite data extraction into Snowflake.' ),
	),
	'cta'         => array(
		'id'        => 'freetrial',
		'anchor2'   => 'freetrialform',
		'kicker'    => 'Free trial',
		'h2'        => 'Free Trial',
		'p'         => 'Install INFOFISCUS Finance Analytics from the Snowflake Marketplace or ask us for a guided trial, and give your finance team FP&amp;A dashboards and Agentic AI recommendations inside Snowflake.',
		'checks'    => array( 'Runs natively in Snowflake', 'CapEx, OpEx, GL, AR, AP & CCC KPIs', 'No-code finance analytics', 'Agentic AI recommendations' ),
		'next'      => array( array( 'Submit your request', 'Takes under a minute.' ), array( 'We set up your trial', 'With guidance from our team.' ), array( 'See your KPIs', 'Dashboards built on your data.' ) ),
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
?>
<main class="igs-page pg-page fa-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php $pg_sprite(); ?>

	<!-- Hero: CFO cockpit -->
	<section class="igs-hero fa-hero" aria-labelledby="fa-title">
		<div class="igs-shell igs-hero-grid fa-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i>INFOFISCUS Finance Analytics · Snowflake Native App</span>
				<h1 id="fa-title">Empower Strategic Financial Decision-Making with <em>Agentic AI</em></h1>
				<p>Unlock smarter, faster, and more profitable decision-making with INFOFISCUS Finance Analytics, a Snowflake Native Application developed by Infometry. Designed for modern finance teams, INFOFISCUS combines the power of Agentic AI, real-time data pipelines, and no-code analytics to deliver precision-driven insights that maximize profitability.</p>
				<p class="fa-lead2">Unlike traditional BI tools, INFOFISCUS operates natively in Snowflake, eliminating complex data movement. Finance leaders can seamlessly access and analyze financial reports with advanced financial planning and analysis (FP&amp;A) capabilities, intuitive dashboards, and Agentic AI-powered recommendations.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary x-btn" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download Our User Guide Now!</a>
					<a class="igs-btn igs-btn-ghost" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
				</div>
			</div>

			<div class="fa-cockpit" data-fa-cockpit aria-label="Animated example: an INFOFISCUS Finance Analytics cockpit in Snowflake showing cash flow, the cash conversion cycle, receivables and payables aging, and an Agentic AI recommendation">
				<div class="fa-c-row" aria-hidden="true">
					<div class="fa-card fa-cash">
						<small>Free cash flow · FY26</small><b>$6.1M <em>▲ 9%</em></b>
						<svg viewBox="0 0 240 70" preserveAspectRatio="none" focusable="false">
							<path class="is-area" d="M0 55 L30 50 L60 52 L90 38 L120 41 L150 30 L180 33 L210 18 L240 12 L240 70 L0 70Z"/>
							<path class="is-line" d="M0 55 L30 50 L60 52 L90 38 L120 41 L150 30 L180 33 L210 18 L240 12"/>
						</svg>
					</div>
					<div class="fa-card fa-ccc">
						<small>Cash conversion cycle</small>
						<span class="fa-dial"><i data-fa-needle></i></span>
						<b><span data-fa-ccc>41</span> days <em>▼ 5</em></b>
					</div>
				</div>
				<div class="fa-card fa-aging" aria-hidden="true">
					<small>Aging</small>
					<div><span>AR</span><p><i style="--w:46%" class="a"></i><i style="--w:28%" class="b"></i><i style="--w:16%" class="c"></i><i style="--w:10%" class="d"></i></p><b>$5.73M</b></div>
					<div><span>AP</span><p><i style="--w:52%" class="a"></i><i style="--w:30%" class="b"></i><i style="--w:12%" class="c"></i><i style="--w:6%" class="d"></i></p><b>$3.94M</b></div>
					<em><i class="a"></i>0–30 <i class="b"></i>31–60 <i class="c"></i>61–90 <i class="d"></i>90+</em>
				</div>
				<div class="fa-ai" aria-hidden="true">
					<span><svg><use href="#pg-robot"/></svg></span>
					<p><b>Agentic AI · recommendation</b><span data-fa-type>Collect 61–90 day receivables from 3 key accounts to cut CCC by 4 days.</span></p>
				</div>
			</div>
		</div>
	</section>

	<!-- Key features: KPI library -->
	<section class="x-sec fa-feat" aria-labelledby="fa-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Key features</span>
				<h2 id="fa-feat-title">INFOFISCUS Finance Analytics Snowflake Native Application : Key Features</h2>
				<p>Unlock the full potential of Agentic AI in finance analytics. Search for INFOFISCUS Finance Analytics on the <a href="<?php echo esc_url( $listing_url ); ?>" target="_blank" rel="noopener">Snowflake Marketplace</a> to download the latest version. Empower your finance teams to take faster, smarter, and more profitable decisions with Agentic AI-powered insights.</p>
			</div>
			<div class="fa-lib">
				<article class="fa-k is-wide" data-igs-reveal>
					<div class="fa-k-viz fa-src" aria-hidden="true"><span class="is-on"><?php $pgi( $ns ); ?>NetSuite</span><span><?php $pgi( $e . 'oracle.png' ); ?>Oracle</span><span><?php $pgi( $e . 'sap.png' ); ?>SAP</span><span><svg><use href="#igs-cloud"/></svg>Dynamics</span><i></i><span class="is-sf"><?php $pgi( $sf ); ?>Snowflake</span></div>
					<h3>Advanced Data Pipelines</h3>
					<p>Efficient and near real-time data ingestion directly from NetSuite (Current) and Oracle/SAP/Dynamics (in future releases) and delivered into the Snowflake database to ensure real-time financial decision making.</p>
				</article>
				<article class="fa-k" data-igs-reveal>
					<div class="fa-k-viz fa-kpis" aria-hidden="true"><b>CapEx</b><b>Opex</b><b>GL</b><b>AR</b><b>AP</b><b>CCC</b><b>Cash flow</b></div>
					<h3>Intuitive Dashboards &amp; Accelerated Time-to-Insight</h3>
					<p>INFOFISCUS Finance Analytics includes a rich library of best practice Key Performance Indicators (KPIs) including CapEx, Opex, GL, AR, AP, Cash Conversion Cycle (CCC) and cash flow metrics that enable Finance teams to drive performance and profitability.</p>
				</article>
				<article class="fa-k" data-igs-reveal>
					<div class="fa-k-viz fa-blocks" aria-hidden="true"><i>Revenue</i><i>÷</i><i>Opex</i><i>=</i><i class="is-out">Margin</i></div>
					<h3>No-Code Finance Analytics Suite</h3>
					<p>Create a competitive advantage with a unique suite of no-code Finance Analytics features that offer stellar data visualization capabilities, enabling executives to perform accurate financial analysis without the need for complex development or manual coding.</p>
				</article>
				<article class="fa-k is-wide" data-igs-reveal>
					<div class="fa-k-viz fa-scale" aria-hidden="true"><i style="--h:30%"></i><i style="--h:44%"></i><i style="--h:58%"></i><i style="--h:74%"></i><i style="--h:92%"></i></div>
					<h3>Unmatched Scalability</h3>
					<p>Unleash the power of intuitive and scalable dashboards, scorecards, and effective organizational analytics that are specifically designed for Finance teams to uncover actionable insights and trends, and identify gaps to achieve business growth.</p>
				</article>
				<article class="fa-k is-ai" data-igs-reveal>
					<div class="fa-k-viz fa-chat" aria-hidden="true"><p class="is-q">Why did Opex rise in Q3?</p><p class="is-a"><svg><use href="#pg-robot"/></svg>Vendor bills grew 12% in two cost centers — review contract renewals.</p></div>
					<h3>Data Insights with Agentic AI</h3>
					<p>By leveraging Agentic AI-driven financial insights, INFOFISCUS empowers finance leaders to move beyond static dashboards and generate autonomous, context-aware recommendations. This ensures faster, more accurate financial forecasting and planning.</p>
				</article>
			</div>
			<p class="fa-center" data-igs-reveal><a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a></p>
		</div>
	</section>

	<!-- Why: ledger -->
	<section class="x-sec x-dark fa-why" aria-labelledby="fa-why-title">
		<div class="igs-shell fa-why-grid">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">Why INFOFISCUS</span>
				<h2 id="fa-why-title">Why Choose INFOFISCUS Finance Analytics Snowflake Native Application?</h2>
				<p>INFOFISCUS Finance Analytics Snowflake Native Application developed using the Snowflake Native App framework architecture involves seamless data ingestion from various sources, data extraction using Python, computing with a consumer Snowflake virtual warehouse, building incremental data pipelines, and extensive choice of tools and libraries that support AI/ML and Agentic AI to unleash insights. INFOFISCUS conquered the challenge of connecting and loading key business data from ERP systems into Snowflake using a dedicated <a href="<?php echo esc_url( home_url( '/product/netsuite-to-snowflake-connector/' ) ); ?>">Netsuite Snowflake connector</a> for actionable insights.</p>
			</div>
			<div class="fa-ledger" data-igs-reveal>
				<header><b>Value statement</b><small class="x-mono">INFOFISCUS · FY</small></header>
				<ul>
					<li><b class="x-mono">90%</b> <span>Faster Installation &amp; Setup – rapid start with pre-configured pipelines.</span></li>
					<li><b class="x-mono">70%</b> <span>Cost Efficiency – optimized storage and processing, lowering TCO.</span></li>
					<li><b class="x-mono">99%</b> <span>Customizable Data Transformation – adaptable to unique business workflows.</span></li>
					<li><b class="x-mono is-ic">✦</b> <span>Agentic AI-Powered Autonomy – context-aware, self-learning finance insights</span></li>
					<li><b class="x-mono is-ic">✦</b> <span>No-Code Simplicity – empower business users to explore and analyze data independently.</span></li>
				</ul>
			</div>
		</div>
	</section>

	<!-- Architecture: three tiers -->
	<section class="x-sec fa-arch" aria-labelledby="fa-arch-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Architecture</span>
				<h2 id="fa-arch-title">INFOFISCUS Finance Analytics Snowflake Native Application Architecture</h2>
			</div>
			<div class="fa-tiers" data-igs-reveal aria-label="A streamlined UI setup with multiple environments runs pre-built data pipelines, data models and KPIs inside Snowflake, which power dashboards, reports and what-if analysis">
				<div class="fa-tier is-top"><small>Set up</small><span><svg><use href="#igs-code"/></svg>Streamlined UI setup</span><span><svg><use href="#igs-nodes"/></svg>Multiple environments</span><span><?php $pgi( $ns ); ?>ERP sources</span></div>
				<div class="fa-tier is-mid"><small><?php $pgi( $sf ); ?>Inside Snowflake</small><span><svg><use href="#igs-sync"/></svg>Pre-built data pipelines</span><i></i><span><svg><use href="#igs-layers"/></svg>Data models</span><i></i><span><svg><use href="#pg-target"/></svg>KPIs</span></div>
				<div class="fa-tier is-bot"><small>Decide</small><span><svg><use href="#igs-chart"/></svg>Dashboards</span><span><svg><use href="#igs-file"/></svg>Reports</span><span><svg><use href="#pg-funnel"/></svg>What-if analysis</span><span><svg><use href="#pg-robot"/></svg>Agentic AI</span></div>
			</div>
		</div>
	</section>

	<!-- Video + ready -->
	<section class="x-sec x-soft fa-video" aria-labelledby="fa-video-title">
		<div class="igs-shell fa-video-grid">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="fa-video-title">Learn More About INFOFISCUS Finance Analytics Snowflake Native Application</h2>
				<div class="fa-ready">
					<h2>Ready to analyze your financial data to derive factual and accurate insights?</h2>
					<div class="pg-btns"><a class="igs-btn igs-btn-primary" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a><a class="igs-btn igs-btn-outline" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us</a></div>
				</div>
			</div>
			<a class="fa-player" href="https://www.youtube.com/watch?v=3IBvAzaAfM4" target="_blank" rel="noopener" data-igs-video="3IBvAzaAfM4" data-igs-reveal>
				<span class="fa-p-coins" aria-hidden="true"><i></i><i></i><i></i></span>
				<span class="fa-p-play" aria-hidden="true"><svg><use href="#igs-play"/></svg></span>
				<span class="fa-p-cap"><em>Video</em><b>INFOFISCUS Finance Analytics Snowflake Native Application</b></span>
			</a>
		</div>
		<div class="igs-modal" data-igs-modal hidden>
			<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Video">
				<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
				<div class="igs-modal-frame" data-igs-frame></div>
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
