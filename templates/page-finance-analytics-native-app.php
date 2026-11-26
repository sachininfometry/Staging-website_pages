<?php
/**
 * Template Name: Finance Analytics Native App Product
 * Template Post Type: page, product
 *
 * INFOFISCUS Finance Analytics Snowflake Native App page, built like the Google Sheets connector
 * page: the hero plays finance KPIs flowing from NetSuite through Snowflake into dashboards, the
 * architecture map streams data and the FAQ and trial blocks match (google-sheets-connector.css/.js).
 * This page's own styles: finance-analytics-native-app.css. Every heading and line of copy from
 * the original page is kept.
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
	'class'       => 'is-snow pg-finance',
	'sheet_class' => 'is-snow',
	'hero'        => array(
		'badge'     => 'INFOFISCUS Finance Analytics · Snowflake Native App',
		'h1'        => 'Empower Strategic Financial Decision-Making with <em>Agentic AI</em>',
		'lead'      => 'Unlock smarter, faster, and more profitable decision-making with INFOFISCUS Finance Analytics, a Snowflake Native Application developed by Infometry. Designed for modern finance teams, INFOFISCUS combines the power of Agentic AI, real-time data pipelines, and no-code analytics to deliver precision-driven insights that maximize profitability.',
		'lead2'     => 'Unlike traditional BI tools, INFOFISCUS operates natively in Snowflake, eliminating complex data movement. Finance leaders can seamlessly access and analyze financial reports with advanced financial planning and analysis (FP&A) capabilities, intuitive dashboards, and Agentic AI-powered recommendations.',
		'primary'   => array( 'Download Our User Guide Now!', $guide_url, 'igs-down' ),
		'secondary' => array( 'Free Trial', '#freetrial' ),
		'ops_label' => 'KPIs',
		'ops'       => array( 'CapEx', 'OpEx', 'GL', 'AR', 'AP', 'CCC', 'Cash flow' ),
		'proof'     => array(
			array( $listing_url, $sf, 'Snowflake Marketplace', 'INFOFISCUS Finance Analytics' ),
			array( home_url( '/contact-us/' ), 'svg:igs-chat', 'Contact Us', 'Talk to an expert' ),
		),
		'aria'      => 'Animated example: NetSuite financial data is turned into CapEx, OpEx, AR, AP and cash conversion KPIs inside Snowflake by INFOFISCUS Finance Analytics and published to dashboards',
		'sheet'     => array(
			'icon'     => $sf,
			'title'    => 'Finance KPIs · FY26 YTD',
			'sub'      => 'INFOFISCUS Finance Analytics',
			'live'     => 'Real-time',
			'fx_label' => 'kpi',
			'fx'       => 'Computing KPIs · cash flow, CCC',
			'verb'     => 'Publishing',
			'letters'  => array( 'metric', 'value', 'change' ),
			'cols'     => array( 'KPI', 'Value', 'vs. plan' ),
			'rows'     => array(
				array( 'OpEx', '$8.42M', '−3.1%' ),
				array( 'CapEx', '$2.16M', '+4.8%' ),
				array( 'Accounts Receivable', '$5.73M', '−6.2%' ),
				array( 'Accounts Payable', '$3.94M', '+1.4%' ),
				array( 'Cash Conversion Cycle', '41 days', '−5 days' ),
			),
			'tabs'     => array( 'KPIs', 'Cash flow', 'FP&A' ),
		),
		'core'      => array( 'icon' => $sf, 'title' => 'INFOFISCUS Native App', 'sub' => 'Runs inside your Snowflake account', 'modes' => array( 'No-code', 'Agentic AI' ) ),
		'eco'       => array(
			'title' => 'Sources & dashboards',
			'sub'   => 'ERP data to finance insights',
			'items' => array(
				array( 'NetSuite', $ns ), array( 'Oracle', $e . 'oracle.png' ), array( 'SAP', $e . 'sap.png' ),
				array( 'Tableau', $e . 'tableau.svg' ), array( 'Power BI', 'bars' ), array( 'Dashboards', 'svg:igs-chart' ),
				array( 'Scorecards', 'svg:pg-target' ), array( 'Forecasts', 'svg:pg-trend' ), array( 'AI advisor', 'svg:pg-robot' ),
			),
			'foot'  => 'NetSuite today · Oracle, SAP, Dynamics in future releases',
		),
		'toast'     => array( 'KPIs refreshed', 'Agentic AI recommendation ready' ),
	),
	'overview'    => array(
		'kicker'     => 'Key features',
		'h2'         => 'INFOFISCUS Finance Analytics Snowflake Native Application : <em>Key Features</em>',
		'paras'      => array( 'Unlock the full potential of Agentic AI in finance analytics. Search for INFOFISCUS Finance Analytics on the <a href="' . $listing_url . '" target="_blank" rel="noopener">Snowflake Marketplace</a> to download the latest version. Empower your finance teams to take faster, smarter, and more profitable decisions with Agentic AI-powered insights.' ),
		'sets_label' => 'Finance KPIs included',
		'sets'       => array( 'CapEx', 'Opex', 'GL', 'AR', 'AP', 'Cash Conversion Cycle (CCC)', 'Cash flow' ),
		'labels'     => array( 'Your ERP', 'Finance insights' ),
		'deck'       => array( array( $e . 'sap.png', 'SAP' ), array( $e . 'oracle.png', 'Oracle' ), array( $ns, 'NetSuite' ) ),
		'core_icon'  => 'pg-snow',
		'core'       => 'INFOFISCUS<br>Native App',
		'dest'       => array(
			array( 'igs-chart', 'FP&A Dashboards', array( $e . 'tableau.svg', 'bars' ) ),
			array( 'pg-coin', 'Cash & Profitability', array( 'svg:pg-coin', 'svg:pg-trend' ) ),
			array( 'pg-robot', 'Agentic AI Advisor', array( 'svg:pg-robot', 'svg:igs-bolt' ) ),
		),
	),
	'blocks'      => array(
		array(
			'type'  => 'features',
			'cols'  => 3,
			'tint'  => true,
			'items' => array(
				array( 'igs-sync', 'Advanced Data Pipelines', 'Efficient and near real-time data ingestion directly from NetSuite (Current) and Oracle/SAP/Dynamics (in future releases) and delivered into the Snowflake database to ensure real-time financial decision making.' ),
				array( 'igs-chart', 'Intuitive Dashboards & Accelerated Time-to-Insight', 'INFOFISCUS Finance Analytics includes a rich library of best practice Key Performance Indicators (KPIs) including CapEx, Opex, GL, AR, AP, Cash Conversion Cycle (CCC) and cash flow metrics that enable Finance teams to drive performance and profitability.' ),
				array( 'igs-code', 'No-Code Finance Analytics Suite', 'Create a competitive advantage with a unique suite of no-code Finance Analytics features that offer stellar data visualization capabilities, enabling executives to perform accurate financial analysis without the need for complex development or manual coding.' ),
				array( 'pg-rocket', 'Unmatched Scalability', 'Unleash the power of intuitive and scalable dashboards, scorecards, and effective organizational analytics that are specifically designed for Finance teams to uncover actionable insights and trends, and identify gaps to achieve business growth.' ),
				array( 'pg-robot', 'Data Insights with Agentic AI', 'By leveraging Agentic AI-driven financial insights, INFOFISCUS empowers finance leaders to move beyond static dashboards and generate autonomous, context-aware recommendations. This ensures faster, more accurate financial forecasting and planning.', true ),
			),
			'btn'   => array( 'Contact Us', home_url( '/contact-us/' ) ),
		),
		array(
			'type'   => 'split',
			'kicker' => 'Why INFOFISCUS',
			'h2'     => 'Why Choose INFOFISCUS Finance Analytics Snowflake Native Application?',
			'paras'  => array( 'INFOFISCUS Finance Analytics Snowflake Native Application developed using the Snowflake Native App framework architecture involves seamless data ingestion from various sources, data extraction using Python, computing with a consumer Snowflake virtual warehouse, building incremental data pipelines, and extensive choice of tools and libraries that support AI/ML and Agentic AI to unleash insights. INFOFISCUS conquered the challenge of connecting and loading key business data from ERP systems into Snowflake using a dedicated <a href="' . home_url( '/product/netsuite-to-snowflake-connector/' ) . '">Netsuite Snowflake connector</a> for actionable insights.' ),
			'values' => array(
				array( '90%', 'Faster Installation & Setup – rapid start with pre-configured pipelines.' ),
				array( '70%', 'Cost Efficiency – optimized storage and processing, lowering TCO.' ),
				array( '99%', 'Customizable Data Transformation – adaptable to unique business workflows.' ),
				array( '', 'Agentic AI-Powered Autonomy – context-aware, self-learning finance insights' ),
				array( '', 'No-Code Simplicity – empower business users to explore and analyze data independently.' ),
			),
		),
		array(
			'type'       => 'pipe',
			'kicker'     => 'Architecture',
			'h2'         => 'INFOFISCUS Finance Analytics Snowflake Native Application Architecture',
			'p'          => 'Streamlined UI setup, support for multiple environments, pre-built data pipelines, data models, KPIs, dashboards, reports and what-if analysis, inside your Snowflake account.',
			'source'     => array( $ns, 'ERP sources', 'NetSuite · Oracle/SAP/Dynamics next', array( 'Near real-time', 'Incremental', 'Python' ) ),
			'hub'        => array( $sf, 'INFOFISCUS Native App', 'Snowflake Native App framework', array( 'Data pipelines', 'Data models' ) ),
			'groups'     => array(
				array( 'blue', 'igs-layers', 'Pipelines & Models', 'Pre-built, multi-environment', array( array( 'Pipelines', 'svg:igs-sync' ), array( 'Data models', 'svg:igs-layers' ), array( 'Environments', 'svg:igs-nodes' ) ) ),
				array( 'violet', 'igs-chart', 'KPIs & Dashboards', 'CapEx, OpEx, GL, AR, AP, CCC', array( array( 'Tableau', $e . 'tableau.svg' ), array( 'Power BI', 'bars' ), array( 'KPIs', 'svg:pg-target' ), array( 'Reports', 'svg:igs-file' ) ) ),
				array( 'orange', 'pg-robot', 'What-if & Agentic AI', 'Forecasting and planning', array( array( 'What-if analysis', 'svg:pg-funnel' ), array( 'Forecasts', 'svg:pg-trend' ), array( 'AI advisor', 'svg:pg-robot' ) ) ),
			),
			'foot_label' => 'Includes',
			'foot'       => array( array( 'igs-code', 'Streamlined UI setup' ), array( 'igs-nodes', 'Multiple environments' ), array( 'igs-sync', 'Pre-built pipelines' ), array( 'igs-chart', 'Dashboards & reports' ), array( 'pg-funnel', 'What-if analysis' ) ),
		),
		array(
			'type'       => 'videos',
			'kicker'     => 'See it in action',
			'h2'         => 'Learn More About INFOFISCUS Finance Analytics Snowflake Native Application',
			'p'          => 'A walkthrough of finance KPIs, dashboards and Agentic AI insights in INFOFISCUS.',
			'logos'      => array( $ns, $sf ),
			'series'     => 'INFOFISCUS',
			'list_title' => 'Videos',
			'videos'     => array( array( '3IBvAzaAfM4', 'INFOFISCUS Finance Analytics Snowflake Native Application', 'Overview' ) ),
			'aside'      => array( 'h2' => true, 'title' => 'Ready to analyze your financial data to derive factual and accurate insights?', 'btns' => array( array( 'Free Trial', '#freetrial' ), array( 'Contact Us', home_url( '/contact-us/' ) ) ) ),
		),
	),
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
$h = $pg['hero'];
$o = $pg['overview'];
?>
<main class="igs-page pg-page <?php echo esc_attr( $pg['class'] ); ?>" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
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

	<!-- Hero -->
	<section class="igs-hero" aria-labelledby="pg-title">
		<div class="igs-shell igs-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i><?php echo esc_html( $h['badge'] ); ?></span>
				<h1 id="pg-title"><?php $pg_html( $h['h1'] ); ?></h1>
				<p><?php $pg_html( $h['lead'] ); ?></p>
				<?php if ( ! empty( $h['lead2'] ) ) : ?><p class="pg-lead2"><?php $pg_html( $h['lead2'] ); ?></p><?php endif; ?>
				<div class="igs-actions">
					<?php $pg_btn( $h['primary'], 'igs-btn-primary' ); ?>
					<?php $pg_btn( $h['secondary'], 'igs-btn-ghost' ); ?>
				</div>
				<div class="igs-ops-bar">
					<span><?php echo esc_html( $h['ops_label'] ); ?></span>
					<ul class="igs-ops" aria-label="<?php echo esc_attr( $h['ops_label'] ); ?>">
						<?php foreach ( $h['ops'] as $op ) : ?><li><?php echo esc_html( $op ); ?></li><?php endforeach; ?>
					</ul>
				</div>
				<div class="igs-proof">
					<?php foreach ( $h['proof'] as $proof ) : ?>
						<a href="<?php echo esc_url( $proof[0] ); ?>"<?php echo 0 === strpos( $proof[0], 'http' ) ? ' target="_blank" rel="noopener"' : ''; ?>><span class="igs-proof-icon<?php echo ! empty( $proof[4] ) ? ' ' . esc_attr( $proof[4] ) : ''; ?>"><?php $pgi( $proof[1] ); ?></span><span><b><?php echo esc_html( $proof[2] ); ?></b><small><?php echo esc_html( $proof[3] ); ?></small></span><svg><use href="#igs-out"/></svg></a>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="igs-flow" data-igs-live data-igs-fx-verb="<?php echo esc_attr( $h['sheet']['verb'] ); ?>" aria-label="<?php echo esc_attr( $h['aria'] ); ?>">
				<svg class="igs-flow-wires" aria-hidden="true" focusable="false"></svg>
				<div class="igs-sheet <?php echo esc_attr( $pg['sheet_class'] ); ?>" data-igs-sheet>
					<header>
						<span class="igs-sheet-icon"><?php $pgi( $h['sheet']['icon'] ); ?></span>
						<span class="igs-sheet-name"><b><?php echo esc_html( $h['sheet']['title'] ); ?></b><small><?php echo esc_html( $h['sheet']['sub'] ); ?></small></span>
						<span class="igs-sheet-live"><i></i><?php echo esc_html( $h['sheet']['live'] ); ?></span>
					</header>
					<div class="igs-sheet-fx"><b><?php echo esc_html( $h['sheet']['fx_label'] ); ?></b><span data-igs-fx><?php echo esc_html( $h['sheet']['fx'] ); ?></span></div>
					<div class="igs-sheet-grid">
						<span class="igs-sheet-select" data-igs-select aria-hidden="true"></span>
						<table>
							<thead>
								<tr class="igs-sheet-cols"><th></th><?php foreach ( $h['sheet']['letters'] as $letter ) : ?><th><?php echo esc_html( $letter ); ?></th><?php endforeach; ?></tr>
								<tr><th>1</th><?php foreach ( $h['sheet']['cols'] as $col ) : ?><th><?php echo esc_html( $col ); ?></th><?php endforeach; ?></tr>
							</thead>
							<tbody>
								<?php foreach ( $h['sheet']['rows'] as $i => $row ) : ?>
									<tr data-igs-row><td><?php echo (int) $i + 2; ?></td><td><?php echo esc_html( $row[0] ); ?></td><td><?php echo esc_html( $row[1] ); ?></td><td><?php echo esc_html( $row[2] ); ?><em class="igs-row-state" aria-hidden="true"></em></td></tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<footer aria-hidden="true"><?php foreach ( $h['sheet']['tabs'] as $t => $tab ) : ?><span<?php echo 0 === $t ? ' class="is-on"' : ''; ?>><?php echo esc_html( $tab ); ?></span><?php endforeach; ?><i>+</i></footer>
				</div>
				<div class="igs-core" data-igs-core>
					<span class="igs-core-icon"><?php $pgi( $h['core']['icon'] ); ?></span>
					<strong><?php echo esc_html( $h['core']['title'] ); ?></strong>
					<small><?php echo esc_html( $h['core']['sub'] ); ?></small>
					<span class="igs-core-modes"><?php foreach ( $h['core']['modes'] as $mode ) : ?><b><?php echo esc_html( $mode ); ?></b><?php endforeach; ?></span>
				</div>
				<div class="igs-eco" data-igs-eco>
					<header><b><?php echo esc_html( $h['eco']['title'] ); ?></b><small><?php echo esc_html( $h['eco']['sub'] ); ?></small></header>
					<ul>
						<?php foreach ( $h['eco']['items'] as $target ) : ?>
							<li data-igs-target data-name="<?php echo esc_attr( $target[0] ); ?>"><span><?php $pgi( $target[1], '', 'igs-pipe-generic' ); ?></span><small><?php echo esc_html( $target[0] ); ?></small></li>
						<?php endforeach; ?>
					</ul>
					<footer><?php echo esc_html( $h['eco']['foot'] ); ?></footer>
				</div>
				<div class="igs-toast" data-igs-toast>
					<span><svg><use href="#igs-check"/></svg></span>
					<div><b><?php echo esc_html( $h['toast'][0] ); ?></b><small><?php echo esc_html( $h['toast'][1] ); ?></small></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Overview -->
	<section class="igs-section igs-overview" aria-labelledby="pg-overview-title">
		<div class="igs-shell igs-ov">
			<div class="igs-ov-copy" data-igs-reveal>
				<span class="igs-kicker"><?php echo esc_html( $o['kicker'] ); ?></span>
				<h2 id="pg-overview-title"><?php $pg_html( $o['h2'] ); ?></h2>
				<?php foreach ( $o['paras'] as $para ) : ?><p><?php $pg_html( $para ); ?></p><?php endforeach; ?>
				<?php if ( ! empty( $o['sets'] ) ) : ?>
					<ul class="igs-ov-sets" aria-label="<?php echo esc_attr( $o['sets_label'] ); ?>">
						<?php foreach ( $o['sets'] as $set ) : ?><li><?php echo esc_html( $set ); ?></li><?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( ! empty( $o['checks'] ) ) : ?>
					<ul class="pg-checks">
						<?php foreach ( $o['checks'] as $check ) : ?><li><svg><use href="#igs-check"/></svg><span><?php $pg_html( $check ); ?></span></li><?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php if ( ! empty( $o['points'] ) ) : ?>
					<div class="igs-ov-points<?php echo count( $o['points'] ) > 2 ? ' pg-points-many' : ''; ?>">
						<?php foreach ( $o['points'] as $point ) : ?>
							<div><span><svg><use href="#<?php echo esc_attr( $point[0] ); ?>"/></svg></span><?php echo ! empty( $point[3] ) ? '<h3>' . esc_html( $point[1] ) . '</h3>' : '<b>' . esc_html( $point[1] ) . '</b>'; ?><p><?php $pg_html( $point[2] ); ?></p></div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $o['btn'] ) ) : ?><p class="pg-ov-btn"><?php $pg_btn( $o['btn'], 'igs-btn-primary' ); ?></p><?php endif; ?>
			</div>

			<div class="igs-ov-visual" aria-hidden="true" data-igs-reveal>
				<svg class="igs-ov-wires" viewBox="0 0 500 400" preserveAspectRatio="none" focusable="false">
					<path id="pg-ov-p0" class="is-in" d="M196 200 H222"/>
					<path id="pg-ov-p1" d="M278 200 C305 200 300 84 330 84"/>
					<path id="pg-ov-p2" d="M278 200 H330"/>
					<path id="pg-ov-p3" d="M278 200 C305 200 300 316 330 316"/>
					<circle class="igs-ov-dot is-in" r="3.5"><animateMotion dur="1.4s" repeatCount="indefinite"><mpath href="#pg-ov-p0"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin="0s"><mpath href="#pg-ov-p1"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin=".6s"><mpath href="#pg-ov-p2"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin="1.2s"><mpath href="#pg-ov-p3"/></animateMotion></circle>
				</svg>
				<span class="igs-ov-label is-left"><?php echo esc_html( $o['labels'][0] ); ?></span>
				<span class="igs-ov-label is-right"><?php echo esc_html( $o['labels'][1] ); ?></span>
				<div class="igs-ov-deck">
					<div class="igs-ov-sheet is-back2"><header><?php $pgi( $o['deck'][0][0] ); ?><b><?php echo esc_html( $o['deck'][0][1] ); ?></b></header></div>
					<div class="igs-ov-sheet is-back1"><header><?php $pgi( $o['deck'][1][0] ); ?><b><?php echo esc_html( $o['deck'][1][1] ); ?></b></header></div>
					<div class="igs-ov-sheet is-front">
						<header><?php $pgi( $o['deck'][2][0] ); ?><b><?php echo esc_html( $o['deck'][2][1] ); ?></b></header>
						<div class="igs-ov-rows"><i></i><i></i><i></i><i></i></div>
						<svg class="igs-ov-spark" viewBox="0 0 100 30" preserveAspectRatio="none" focusable="false"><path d="M0 24 18 20 34 22 50 12 66 15 82 6 100 8"/></svg>
					</div>
				</div>
				<div class="igs-ov-core">
					<span class="igs-ov-orbit"></span>
					<span class="igs-ov-orb"><svg><use href="#<?php echo esc_attr( $o['core_icon'] ); ?>"/></svg></span>
					<small><?php $pg_html( $o['core'] ); ?></small>
				</div>
				<ul class="igs-ov-dest">
					<?php foreach ( $o['dest'] as $dest ) : ?>
						<li><span><svg><use href="#<?php echo esc_attr( $dest[0] ); ?>"/></svg></span><b><?php echo esc_html( $dest[1] ); ?></b><i><?php foreach ( $dest[2] as $spec ) { $pgi( $spec, '', 'igs-pipe-generic' ); } ?></i></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</section>

	<?php foreach ( $pg['blocks'] as $bi => $b ) : ?>
		<?php
		$bid  = 'pg-b' . $bi;
		$type = $b['type'];
		$head = function ( $light = false ) use ( $b, $bid, $pg_html ) {
			if ( empty( $b['h2'] ) ) {
				return;
			}
			?>
			<div class="igs-head<?php echo $light ? ' is-light' : ''; ?>" data-igs-reveal>
				<?php if ( ! empty( $b['kicker'] ) ) : ?><span class="igs-kicker"><?php echo esc_html( $b['kicker'] ); ?></span><?php endif; ?>
				<h2 id="<?php echo esc_attr( $bid ); ?>"><?php $pg_html( $b['h2'] ); ?></h2>
				<?php if ( ! empty( $b['sub'] ) ) : ?><h3 class="pg-head-sub"><?php echo esc_html( $b['sub'] ); ?></h3><?php endif; ?>
				<?php if ( ! empty( $b['p'] ) ) : ?><p><?php $pg_html( $b['p'] ); ?></p><?php endif; ?>
			</div>
			<?php
		};
		$labelled = ! empty( $b['h2'] ) ? ' aria-labelledby="' . esc_attr( $bid ) . '"' : '';
		?>

		<?php if ( 'features' === $type ) : ?>
			<section class="igs-section igs-capabilities pg-features<?php echo ! empty( $b['tint'] ) ? ' is-tint' : ''; ?>"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head(); ?>
					<div class="igs-feature-grid pg-cols-<?php echo (int) ( isset( $b['cols'] ) ? $b['cols'] : 4 ); ?>">
						<?php foreach ( $b['items'] as $i => $item ) : ?>
							<article class="igs-feature is-c<?php echo (int) ( $i % 4 ); ?><?php echo ! empty( $item[3] ) ? ' is-wide' : ''; ?>" data-igs-reveal>
								<span><svg><use href="#<?php echo esc_attr( $item[0] ); ?>"/></svg></span>
								<h3><?php echo esc_html( $item[1] ); ?></h3>
								<p><?php $pg_html( $item[2] ); ?></p>
							</article>
						<?php endforeach; ?>
					</div>
					<?php if ( ! empty( $b['btn'] ) ) : ?><p class="pg-center" data-igs-reveal><?php $pg_btn( $b['btn'], 'igs-btn-primary' ); ?></p><?php endif; ?>
				</div>
			</section>

		<?php elseif ( 'plans' === $type ) : ?>
			<section class="igs-section igs-license pg-plans"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head(); ?>
					<div class="<?php echo 3 === count( $b['plans'] ) ? 'igs-use-grid' : 'igs-license-grid'; ?>">
						<?php foreach ( $b['plans'] as $plan ) : ?>
							<article class="igs-plan<?php echo ! empty( $plan['dark'] ) ? ' is-dark' : ''; ?>" data-igs-reveal>
								<header><span><svg><use href="#<?php echo esc_attr( $plan['icon'] ); ?>"/></svg></span><?php echo ! empty( $plan['h2'] ) ? '<h2 class="pg-plan-h">' . esc_html( $plan['title'] ) . '</h2>' : '<h3>' . esc_html( $plan['title'] ) . '</h3>'; ?></header>
								<?php if ( ! empty( $plan['intro'] ) ) : ?><p class="pg-plan-intro"><?php $pg_html( $plan['intro'] ); ?></p><?php endif; ?>
								<ul>
									<?php foreach ( $plan['items'] as $item ) : ?>
										<li><svg><use href="#igs-check"/></svg><span><?php if ( is_array( $item ) ) : ?><?php echo ! empty( $plan['item_h3'] ) ? '<h3 class="pg-li-h">' . esc_html( $item[0] ) . '</h3>' : '<b>' . esc_html( $item[0] ) . '</b> '; ?><?php $pg_html( $item[1] ); ?><?php else : ?><?php $pg_html( $item ); ?><?php endif; ?></span></li>
									<?php endforeach; ?>
								</ul>
								<?php if ( ! empty( $plan['btn'] ) ) : ?><?php $pg_btn( $plan['btn'], ! empty( $plan['dark'] ) ? 'igs-btn-primary' : 'igs-btn-outline' ); ?><?php endif; ?>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

		<?php elseif ( 'steps' === $type ) : ?>
			<section class="igs-section igs-steps-section"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head( true ); ?>
					<ol class="igs-steps<?php echo 4 === count( $b['steps'] ) ? ' pg-steps-4' : ''; ?>" data-igs-steps>
						<?php foreach ( $b['steps'] as $si => $step ) : ?>
							<?php $ui = $step['ui']; ?>
							<li class="is-s<?php echo (int) $si + 1; ?>">
								<div class="igs-step-head"><b><?php echo esc_html( sprintf( '%02d', $si + 1 ) ); ?></b><span><?php echo esc_html( $step['label'] ); ?></span></div>
								<div class="igs-step-ui" aria-hidden="true">
									<?php if ( 'toggle' === $ui['type'] ) : ?>
										<div class="igs-ui-bar"><?php $pgi( $ui['bar'][0] ); ?><span><?php echo esc_html( $ui['bar'][1] ); ?></span></div>
										<?php foreach ( $ui['rows'] as $row ) : ?>
											<?php if ( ! empty( $row[2] ) ) : ?>
												<div class="igs-ui-row is-main"><?php $pgi( $row[2] ); ?><span><?php echo esc_html( $row[0] ); ?><small><?php echo esc_html( $row[1] ); ?></small></span><em class="igs-ui-switch is-flip"></em></div>
											<?php else : ?>
												<div class="igs-ui-row is-muted"><i></i><span><?php echo esc_html( $row[0] ); ?></span><em class="igs-ui-switch<?php echo ! empty( $row[1] ) ? ' is-on' : ''; ?>"></em></div>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php elseif ( 'search' === $ui['type'] ) : ?>
										<div class="igs-ui-search"><svg><use href="#igs-out"/></svg><span class="igs-ui-type" style="--n:<?php echo (int) strlen( $ui['query'] ); ?>"><?php echo esc_html( $ui['query'] ); ?></span></div>
										<div class="igs-ui-result"><?php $pgi( $ui['result'][0] ); ?><span><?php echo esc_html( $ui['result'][1] ); ?><small><?php echo esc_html( $ui['result'][2] ); ?></small></span></div>
										<span class="igs-ui-cta"><?php echo esc_html( $ui['cta'] ); ?></span>
									<?php elseif ( 'license' === $ui['type'] ) : ?>
										<div class="igs-ui-license"><span><svg><use href="#igs-key"/></svg></span><div><b><?php echo esc_html( $ui['title'] ); ?></b><small><?php echo esc_html( $ui['sub'] ); ?></small></div><em><?php echo esc_html( $ui['badge'] ); ?></em></div>
										<div class="igs-ui-meter"><span><i></i></span><small><?php $pg_html( $ui['meter'] ); ?></small></div>
									<?php elseif ( 'form' === $ui['type'] ) : ?>
										<div class="igs-ui-bar"><?php $pgi( $ui['bar'][0] ); ?><span><?php echo esc_html( $ui['bar'][1] ); ?></span></div>
										<?php foreach ( $ui['fields'] as $field ) : ?>
											<div class="pg-ui-field"><small><?php echo esc_html( $field[0] ); ?></small><span><?php echo esc_html( $field[1] ); ?></span></div>
										<?php endforeach; ?>
										<span class="pg-ui-ok"><svg><use href="#igs-check"/></svg><?php echo esc_html( $ui['ok'] ); ?></span>
									<?php elseif ( 'env' === $ui['type'] ) : ?>
										<div class="pg-ui-env"><?php foreach ( $ui['envs'] as $e => $env ) : ?><span<?php echo $e === $ui['active'] ? ' class="is-on"' : ''; ?>><?php echo esc_html( $env ); ?></span><?php endforeach; ?></div>
										<div class="pg-ui-run"><b><?php echo esc_html( $ui['title'] ); ?></b><span><i></i></span><small><?php echo esc_html( $ui['sub'] ); ?></small></div>
									<?php elseif ( 'objects' === $ui['type'] ) : ?>
										<div class="igs-ui-bar"><?php $pgi( $ui['bar'][0] ); ?><span><?php echo esc_html( $ui['bar'][1] ); ?></span></div>
										<?php foreach ( $ui['rows'] as $row ) : ?>
											<div class="pg-ui-obj<?php echo $row[1] ? ' is-on' : ''; ?>"><i><svg><use href="#igs-check"/></svg></i><span><?php echo esc_html( $row[0] ); ?></span><small><?php echo esc_html( $row[2] ); ?></small></div>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
								<h3><?php echo esc_html( $step['title'] ); ?></h3>
								<?php foreach ( (array) $step['text'] as $text ) : ?><p><?php $pg_html( $text ); ?></p><?php endforeach; ?>
							</li>
						<?php endforeach; ?>
					</ol>
					<?php if ( ! empty( $b['note'] ) ) : ?><p class="pg-steps-note" data-igs-reveal><?php $pg_html( $b['note'] ); ?></p><?php endif; ?>
				</div>
			</section>

		<?php elseif ( 'pipe' === $type ) : ?>
			<section class="igs-section igs-connect"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head(); ?>
					<div class="igs-pipe" data-igs-pipe data-igs-reveal>
						<svg class="igs-pipe-svg" aria-hidden="true" focusable="false"></svg>
						<div class="igs-pipe-dots" aria-hidden="true"></div>
						<div class="igs-pipe-source" data-igs-pipe-source>
							<span class="igs-pipe-logo"><?php $pgi( $b['source'][0] ); ?></span>
							<b><?php echo esc_html( $b['source'][1] ); ?></b>
							<small><?php echo esc_html( $b['source'][2] ); ?></small>
							<ul aria-label="<?php echo esc_attr( $b['source'][1] ); ?>"><?php foreach ( $b['source'][3] as $op ) : ?><li><?php echo esc_html( $op ); ?></li><?php endforeach; ?></ul>
						</div>
						<div class="igs-pipe-hub" data-igs-pipe-hub>
							<span class="igs-pipe-ring" aria-hidden="true"></span>
							<span class="igs-pipe-logo is-hub"><?php $pgi( $b['hub'][0] ); ?></span>
							<b><?php echo esc_html( $b['hub'][1] ); ?></b>
							<small><?php echo esc_html( $b['hub'][2] ); ?></small>
							<span class="igs-pipe-modes"><?php foreach ( $b['hub'][3] as $mode ) : ?><em><?php echo esc_html( $mode ); ?></em><?php endforeach; ?></span>
						</div>
						<div class="igs-pipe-targets">
							<?php foreach ( $b['groups'] as $group ) : ?>
								<article class="igs-pipe-group is-<?php echo esc_attr( $group[0] ); ?>" data-igs-pipe-group>
									<header><span><svg><use href="#<?php echo esc_attr( $group[1] ); ?>"/></svg></span><div><h3><?php echo esc_html( $group[2] ); ?></h3><small><?php echo esc_html( $group[3] ); ?></small></div></header>
									<ul>
										<?php foreach ( $group[4] as $item ) : ?><li><?php $pgi( $item[1], '', 'igs-pipe-generic' ); ?><small><?php echo esc_html( $item[0] ); ?></small></li><?php endforeach; ?>
									</ul>
								</article>
							<?php endforeach; ?>
						</div>
						<div class="igs-pipe-foot">
							<span class="igs-pipe-foot-label"><svg><use href="#igs-check"/></svg><?php echo esc_html( $b['foot_label'] ); ?></span>
							<ul><?php foreach ( $b['foot'] as $tag ) : ?><li><svg><use href="#<?php echo esc_attr( $tag[0] ); ?>"/></svg><?php echo esc_html( $tag[1] ); ?></li><?php endforeach; ?></ul>
						</div>
					</div>
				</div>
			</section>

		<?php elseif ( 'uses' === $type ) : ?>
			<section class="igs-section igs-uses"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head(); ?>
					<div class="igs-use-grid<?php echo 4 === count( $b['items'] ) ? ' pg-cols-2' : ''; ?>">
						<?php foreach ( $b['items'] as $ui => $use ) : ?>
							<article class="igs-use is-<?php echo esc_attr( $use['tone'] ); ?>" data-igs-reveal>
								<div class="igs-use-scene<?php echo count( $use['from'] ) > 1 ? ' is-merge' : ''; ?>" aria-hidden="true">
									<?php if ( count( $use['from'] ) > 1 ) : ?>
										<span class="igs-use-sheets"><?php foreach ( $use['from'] as $spec ) : ?><span class="igs-use-tile is-xs"><?php $pgi( $spec, '', 'igs-pipe-generic' ); ?></span><?php endforeach; ?></span>
										<span class="igs-use-merge"><svg><use href="#<?php echo esc_attr( isset( $use['via'] ) ? $use['via'] : 'igs-layers' ); ?>"/></svg></span>
										<span class="igs-use-pipe is-short"><i></i></span>
									<?php else : ?>
										<span class="igs-use-tile"><?php $pgi( $use['from'][0], '', 'igs-pipe-generic' ); ?></span>
										<span class="igs-use-pipe"><i></i></span>
									<?php endif; ?>
									<?php if ( count( $use['to'] ) > 1 ) : ?>
										<span class="igs-use-stack"><?php foreach ( $use['to'] as $spec ) : ?><span class="igs-use-tile is-sm"><?php $pgi( $spec, '', 'igs-pipe-generic' ); ?></span><?php endforeach; ?></span>
									<?php else : ?>
										<span class="igs-use-tile is-target"><?php $pgi( $use['to'][0], '', 'igs-pipe-generic' ); ?></span>
									<?php endif; ?>
								</div>
								<span class="igs-use-num"><?php echo esc_html( sprintf( 'Use case %02d', $ui + 1 ) ); ?></span>
								<h3><?php echo esc_html( $use['title'] ); ?></h3>
								<p><?php $pg_html( $use['text'] ); ?></p>
								<ul class="igs-use-tags"><?php foreach ( $use['tags'] as $tag ) : ?><li><?php echo esc_html( $tag ); ?></li><?php endforeach; ?></ul>
							</article>
						<?php endforeach; ?>
					</div>
					<?php if ( ! empty( $b['note'] ) ) : ?>
						<div class="igs-uses-note" data-igs-reveal>
							<span aria-hidden="true"><svg><use href="#igs-star"/></svg></span>
							<p><?php $pg_html( $b['note'] ); ?></p>
							<?php if ( ! empty( $b['btn'] ) ) : ?><?php $pg_btn( $b['btn'], 'igs-btn-primary' ); ?><?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif ( 'videos' === $type ) : ?>
			<?php $vids = $b['videos']; ?>
			<section class="igs-section igs-videos"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head(); ?>
					<div class="igs-tv" data-igs-tv data-igs-reveal>
						<a class="igs-tv-stage" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $vids[0][0] ); ?>" target="_blank" rel="noopener" data-igs-video="<?php echo esc_attr( $vids[0][0] ); ?>" data-igs-stage>
							<span class="igs-tv-scene" aria-hidden="true">
								<span class="igs-tv-tile"><?php $pgi( $b['logos'][0] ); ?></span>
								<span class="igs-tv-pipe"><i></i></span>
								<span class="igs-tv-tile"><?php $pgi( $b['logos'][1] ); ?></span>
							</span>
							<span class="igs-tv-play" aria-hidden="true"><svg><use href="#igs-play"/></svg></span>
							<span class="igs-tv-info">
								<span class="igs-tv-meta"><em data-igs-stage-op><?php echo esc_html( $vids[0][2] ); ?></em><span data-igs-stage-ep>Episode 01</span> · <?php echo esc_html( $b['series'] ); ?></span>
								<b data-igs-stage-title><?php echo esc_html( $vids[0][1] ); ?></b>
								<span class="igs-tv-cta">Watch video <svg><use href="#igs-arrow"/></svg></span>
							</span>
						</a>
						<div class="igs-tv-list">
							<header><b><?php echo esc_html( $b['list_title'] ); ?></b><small><?php echo esc_html( count( $vids ) . ( 1 === count( $vids ) ? ' video' : ' videos' ) ); ?></small></header>
							<ol>
								<?php foreach ( $vids as $vi => $video ) : ?>
									<li><a href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $video[0] ); ?>" target="_blank" rel="noopener" data-igs-pick="<?php echo esc_attr( $video[0] ); ?>" data-op="<?php echo esc_attr( $video[2] ); ?>" data-ep="<?php echo esc_attr( sprintf( 'Episode %02d', $vi + 1 ) ); ?>"<?php echo 0 === $vi ? ' aria-current="true"' : ''; ?>><span class="igs-tv-num"><?php echo esc_html( sprintf( '%02d', $vi + 1 ) ); ?></span><span class="igs-tv-item"><em><?php echo esc_html( $video[2] ); ?></em><b><?php echo esc_html( $video[1] ); ?></b></span><span class="igs-tv-go" aria-hidden="true"><svg><use href="#igs-play"/></svg></span></a></li>
								<?php endforeach; ?>
							</ol>
							<?php if ( ! empty( $b['aside'] ) ) : ?>
								<div class="pg-tv-aside"><?php echo ! empty( $b['aside']['h2'] ) ? '<h2>' . esc_html( $b['aside']['title'] ) . '</h2>' : '<b>' . esc_html( $b['aside']['title'] ) . '</b>'; ?><?php if ( ! empty( $b['aside']['text'] ) ) : ?><p><?php $pg_html( $b['aside']['text'] ); ?></p><?php endif; ?><div class="pg-btns"><?php foreach ( $b['aside']['btns'] as $k => $btn ) { $pg_btn( $btn, 0 === $k ? 'igs-btn-primary' : 'igs-btn-outline' ); } ?></div></div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="igs-modal" data-igs-modal hidden>
					<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Video">
						<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
						<div class="igs-modal-frame" data-igs-frame></div>
					</div>
				</div>
			</section>

		<?php elseif ( 'stats' === $type ) : ?>
			<section class="igs-section<?php echo ! empty( $b['dark'] ) ? ' igs-steps-section pg-stats-dark' : ' pg-stats-light'; ?>"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head( ! empty( $b['dark'] ) ); ?>
					<div class="pg-stats pg-n<?php echo (int) count( $b['items'] ); ?>">
						<?php foreach ( $b['items'] as $si => $stat ) : ?>
							<article class="is-c<?php echo (int) ( $si % 4 ); ?>" data-igs-reveal>
								<?php if ( ! empty( $stat['icon'] ) ) : ?><span class="pg-stat-ic"><svg><use href="#<?php echo esc_attr( $stat['icon'] ); ?>"/></svg></span><?php endif; ?>
								<?php if ( ! empty( $b['num_in'] ) ) : ?>
									<h3><?php if ( ! empty( $stat['pre'] ) ) : ?><small><?php echo esc_html( $stat['pre'] ); ?></small> <?php endif; ?><b><?php echo esc_html( $stat['num'] ); ?></b> <?php echo esc_html( $stat['label'] ); ?></h3>
								<?php else : ?>
									<b class="pg-stat-num" aria-hidden="true"><?php echo esc_html( $stat['num'] ); ?></b>
									<h3><?php echo esc_html( $stat['label'] ); ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $stat['text'] ) ) : ?><p><?php $pg_html( $stat['text'] ); ?></p><?php endif; ?>
							</article>
						<?php endforeach; ?>
					</div>
					<?php if ( ! empty( $b['checks'] ) ) : ?>
						<ul class="pg-check-row" data-igs-reveal><?php foreach ( $b['checks'] as $check ) : ?><li><svg><use href="#igs-check"/></svg><?php echo esc_html( $check ); ?></li><?php endforeach; ?></ul>
					<?php endif; ?>
				</div>
			</section>

		<?php elseif ( 'split' === $type ) : ?>
			<section class="igs-section igs-steps-section pg-split"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head( true ); ?>
					<div class="pg-split-grid">
						<div class="pg-split-copy" data-igs-reveal><?php foreach ( $b['paras'] as $para ) : ?><p><?php $pg_html( $para ); ?></p><?php endforeach; ?></div>
						<?php if ( ! empty( $b['chain'] ) ) : ?>
							<ol class="pg-chain" data-igs-reveal aria-label="<?php echo esc_attr( $b['chain_label'] ); ?>">
								<?php foreach ( $b['chain'] as $link ) : ?><li><span><?php $pgi( $link[0], '', 'pg-chain-svg' ); ?></span><div><b><?php echo esc_html( $link[1] ); ?></b><small><?php echo esc_html( $link[2] ); ?></small></div></li><?php endforeach; ?>
							</ol>
						<?php else : ?>
							<ul class="pg-values" data-igs-reveal>
								<?php foreach ( $b['values'] as $value ) : ?>
									<li<?php echo $value[0] ? ' class="is-num"' : ''; ?>><?php if ( $value[0] ) : ?><b><?php echo esc_html( $value[0] ); ?></b> <?php else : ?><svg><use href="#igs-check"/></svg><?php endif; ?><span><?php echo esc_html( $value[1] ); ?></span></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</section>

		<?php elseif ( 'band' === $type ) : ?>
			<section class="igs-section pg-band-sec"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<div class="pg-band" data-igs-reveal>
						<span class="pg-band-ic" aria-hidden="true"><svg><use href="#<?php echo esc_attr( isset( $b['icon'] ) ? $b['icon'] : 'igs-bolt' ); ?>"/></svg></span>
						<div><h2 id="<?php echo esc_attr( $bid ); ?>"><?php $pg_html( $b['h2'] ); ?></h2><?php if ( ! empty( $b['p'] ) ) : ?><p><?php $pg_html( $b['p'] ); ?></p><?php endif; ?></div>
						<div class="pg-btns"><?php foreach ( $b['btns'] as $k => $btn ) { $pg_btn( $btn, 0 === $k ? 'igs-btn-primary' : 'igs-btn-ghost' ); } ?></div>
					</div>
				</div>
			</section>

		<?php elseif ( 'logos' === $type ) : ?>
			<section class="igs-section pg-logos"<?php echo $labelled; // phpcs:ignore ?>>
				<div class="igs-shell">
					<?php $head(); ?>
					<div class="pg-marquee" data-igs-reveal>
						<ul>
							<?php foreach ( array_merge( $b['logos'], $b['logos'] ) as $li => $logo ) : ?>
								<li<?php echo $li >= count( $b['logos'] ) ? ' aria-hidden="true"' : ''; ?>><?php $pgi( $logo[0], $li >= count( $b['logos'] ) ? '' : $logo[1] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</section>

		<?php elseif ( 'cta' === $type ) : ?>
			<?php $pg_cta( $b ); ?>
		<?php endif; ?>
	<?php endforeach; ?>

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
