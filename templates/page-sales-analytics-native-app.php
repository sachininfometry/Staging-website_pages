<?php
/**
 * Template Name: Sales Analytics Native App Product
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

$guide_url     = 'https://docs.google.com/document/d/1Hg7l8XYJ3g-6S7fBx-w1RIJTqyaDlh34/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$sf_market_url = 'https://app.snowflake.com/marketplace/providers/GZSTZ3867OQ/Infometry';
$sf            = 'google-sheets/eco-snowflake.png';
$sfdc          = 'google-sheets/eco-salesforce.png';
$e             = 'google-sheets/eco-';

$pg = array(
	'faq'         => array(
		'intro' => 'Architecture, setup, dashboards and roadmap: what teams ask before they run sales analytics natively in Snowflake.',
		'help'  => 'Talk to our team about INFOFISCUS Sales Analytics.',
		'facts' => array( array( 'pg-snow', 'Runs in', 'Your Snowflake account · Native App' ), array( 'igs-sync', 'Sources', 'Salesforce, NetSuite, Workday' ), array( 'igs-chart', 'Dashboards', 'Opportunities, customers, won/loss' ), array( 'igs-bolt', 'Intelligence', 'AI/ML & Agentic AI analytics' ) ),
		'items' => array(
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
		),
	),
	'related'     => array(
		array( '/product/finance-analytics-native-app/', 'svg:pg-coin', 'Finance Analytics Native App', 'This App leverages Snowflake’s analytical power to deliver deep insights, enhancing executive decision-making in financial planning and analysis.' ),
		array( '/product/marketo-to-snowflake-connector/', 'txt:M|#5c4c9f', 'Marketo Connector', 'Infometry’s Marketo Connector for Snowflake simplifies Marketo integration, bypassing the need for complex APIs and drivers.' ),
	),
	'cta'         => array(
		'id'        => 'freetrial',
		'anchor2'   => 'freetrialform',
		'kicker'    => 'Free trial',
		'h2'        => 'Free Trial',
		'p'         => 'Install INFOFISCUS Sales Analytics from the Snowflake Marketplace or ask us for a guided trial, and get pipeline, forecast, MQL and SQL insights without building a data warehouse.',
		'checks'    => array( 'Runs natively in Snowflake', 'Pre-built pipelines & models', 'Salesforce, NetSuite, Workday', 'Agentic AI-driven analytics' ),
		'next'      => array( array( 'Submit your request', 'Takes under a minute.' ), array( 'We set up your trial', 'With guidance from our team.' ), array( 'See your pipeline', 'Dashboards built on your data.' ) ),
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
$sa_stages = array(
	array( 'Prospecting', '$4.8M', 212, 100 ),
	array( 'Qualification', '$3.6M', 148, 76 ),
	array( 'Proposal', '$2.7M', 91, 57 ),
	array( 'Negotiation', '$1.9M', 46, 40 ),
	array( 'Closed Won', '$1.3M', 38, 27 ),
);
?>
<main class="igs-page pg-page sa-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php $pg_sprite(); ?>

	<!-- Hero: a live sales dashboard -->
	<section class="igs-hero sa-hero" aria-labelledby="sa-title">
		<div class="igs-shell igs-hero-grid sa-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i>INFOFISCUS · Snowflake Native App</span>
				<h1 id="sa-title">INFOFISCUS Sales Analytics <em>Snowflake Native Application</em></h1>
				<p>The INFOFISCUS Sales Analytics Snowflake Native Application revolutionizes the analytics landscape by sparing customers the effort and resources required to design and build an end-to-end data warehouse and visualization platform. This Analytics Snowflake App from INFOFISCUS is meticulously designed to empower customers with robust insights into Sales Growth, Pipelines, Forecast, MQL, and SQL. It seamlessly integrates with industry-standard ERPs, CRMs, and forecasting applications, now enhanced with Agentic AI to deliver adaptive, intelligent analytics.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary x-btn" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download Our User Guide Now!</a>
					<a class="igs-btn igs-btn-ghost" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
				</div>
			</div>

			<div class="sa-dash" data-sa-dash aria-label="Animated example: an INFOFISCUS Sales Analytics dashboard in Snowflake with pipeline stages, a sales forecast and the won/loss ratio">
				<header aria-hidden="true">
					<b>Sales Performance</b><span class="sa-d-chip">FY26 · Q4</span><span class="sa-d-src"><?php $pgi( $sfdc ); ?><?php $pgi( $e . 'netsuite.png' ); ?><?php $pgi( $e . 'workday.png' ); ?></span>
				</header>
				<div class="sa-kpis" aria-hidden="true">
					<div><small>Opportunities</small><b>$14.3M</b><em>▲ 18%</em></div>
					<div><small>MQL → SQL</small><b>38.6%</b><em>▲ 4.2 pts</em></div>
					<div><small>Customers</small><b>1,284</b><em>▲ 6%</em></div>
				</div>
				<div class="sa-d-grid" aria-hidden="true">
					<div class="sa-pipe">
						<small>Pipeline by stage</small>
						<?php foreach ( $sa_stages as $si => $st ) : ?>
							<div class="sa-stage" data-sa-stage data-amt="<?php echo esc_attr( $st[1] ); ?>" data-deals="<?php echo (int) $st[2]; ?>" style="--w:<?php echo (int) $st[3]; ?>%"><i></i><span><?php echo esc_html( $st[0] ); ?></span><b><?php echo esc_html( $st[1] ); ?></b></div>
						<?php endforeach; ?>
					</div>
					<div class="sa-side">
						<div class="sa-donut"><span><b>1.9</b><small>won/loss</small></span></div>
						<div class="sa-tip"><small data-sa-name>Prospecting</small><b data-sa-amt>$4.8M</b><em><i data-sa-deals>212</i> deals</em></div>
					</div>
				</div>
				<div class="sa-forecast" aria-hidden="true">
					<small>Forecast vs actual</small>
					<svg viewBox="0 0 300 70" preserveAspectRatio="none" focusable="false">
						<path class="is-area" d="M0 60 L40 52 L80 55 L120 40 L160 42 L200 28 L240 24 L240 70 L0 70Z"/>
						<path class="is-act" d="M0 60 L40 52 L80 55 L120 40 L160 42 L200 28 L240 24"/>
						<path class="is-fc" d="M240 24 L270 16 L300 10"/>
						<circle cx="240" cy="24" r="4"/>
					</svg>
				</div>
			</div>
		</div>
	</section>

	<!-- Features: dashboard bento -->
	<section class="x-sec sa-feat" aria-labelledby="sa-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Features</span>
				<h2 id="sa-feat-title">INFOFISCUS Sales Analytics Snowflake Native App Features</h2>
				<p>INFOFISCUS efficiently synchronizes data from Salesforce to Snowflake, crunching critical metrics in near real-time. This ensures the availability of in-depth, detailed, and Agentic AI–driven cognitive analytics, essential for optimizing Sales operations and facilitating executive decision-making. Users can easily get started by visiting the <a href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener">Snowflake Marketplace</a>, finding the INFOFISCUS Sales Analytics application, and installing it. It will revolutionize how businesses approach data analytics and set a new standard in the industry.</p>
			</div>
			<div class="sa-bento">
				<article class="sa-tile is-pipe" data-igs-reveal>
					<div class="sa-viz" aria-hidden="true"><span><?php $pgi( $sfdc ); ?></span><span><?php $pgi( $e . 'netsuite.png' ); ?></span><span><?php $pgi( $e . 'workday.png' ); ?></span><i></i><span class="is-sf"><?php $pgi( $sf ); ?></span></div>
					<h3>Efficient data pipeline:</h3><p>Ingest data in near real-time from sources like Salesforce, NetSuite, and Workday directly into Snowflake.</p>
				</article>
				<article class="sa-tile is-dash" data-igs-reveal>
					<div class="sa-viz sa-bars" aria-hidden="true"><i style="--h:40%"></i><i style="--h:62%"></i><i style="--h:48%"></i><i style="--h:80%"></i><i style="--h:66%"></i><i style="--h:92%"></i></div>
					<h3>Scalable dashboards:</h3><p>Tailored for sales teams, providing adaptable, in-depth analytics to match your business’s growth.</p>
				</article>
				<article class="sa-tile" data-igs-reveal><span class="sa-ic"><svg><use href="#igs-star"/></svg></span><h3>Unique sales analytics suite:</h3><p>Stand out in a competitive landscape with distinctive features.</p></article>
				<article class="sa-tile" data-igs-reveal><span class="sa-ic"><svg><use href="#pg-rocket"/></svg></span><h3>Unmatched scalability:</h3><p>Extend across dashboards, scorecards, and comprehensive organizational analytics.</p></article>
				<article class="sa-tile" data-igs-reveal><span class="sa-ic"><svg><use href="#pg-lock"/></svg></span><h3>Secure datasets:</h3><p>Regular updates and robust security protocols ensure data integrity and address any concerns.</p></article>
				<article class="sa-tile" data-igs-reveal><span class="sa-ic"><svg><use href="#igs-shield"/></svg></span><h3>INFOFISCUS assurance:</h3><p>Trust us for the integrity and security of your data.</p></article>
			</div>
		</div>
	</section>

	<!-- Why: layered stack -->
	<section class="x-sec x-dark sa-why" aria-labelledby="sa-why-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Why INFOFISCUS</span>
				<h2 id="sa-why-title">Why Choose INFOFISCUS Sales Analytics Snowflake Native Application?</h2>
			</div>
			<div class="sa-why-grid">
				<div class="x-copy" data-igs-reveal>
					<p>The INFOFISCUS Sales Analytics Snowflake Native Application, deployed with the Snowflake Native App framework architecture, involves data ingestion from diverse sources, data extraction and transformation using Python, computing with a consumer Snowflake virtual warehouse, historic and incremental data load, and support for AI/ML libraries for insightful analytics.</p>
					<p>With Agentic AI, INFOFISCUS takes this a step further by enabling self-directed analytics, automated pipeline adjustments, and proactive recommendations. This empowers businesses to not only analyze sales data but also anticipate trends, detect anomalies, and optimize decisions in real time.</p>
					<p>INFOFISCUS addresses the challenge of extracting and transforming critical business data from ERP and CRM systems into Snowflake, leveraging modern BI, AI applications, and Agentic AI intelligence. The platform automates the entire process, handling data extraction, loading into Snowflake, and transforming it into analytics-ready insights.</p>
				</div>
				<div class="sa-stack" data-igs-reveal aria-hidden="true">
					<div class="is-l4"><svg><use href="#igs-bolt"/></svg><b>AI/ML &amp; Agentic AI</b><small>recommendations · anomalies</small></div>
					<div class="is-l3"><?php $pgi( $sf ); ?><b>Consumer virtual warehouse</b><small>compute in Snowflake</small></div>
					<div class="is-l2"><svg><use href="#igs-code"/></svg><b>Python extract &amp; transform</b><small>historic + incremental</small></div>
					<div class="is-l1"><?php $pgi( $sfdc ); ?><b>ERP &amp; CRM sources</b><small>diverse sources</small></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Value highlights: gauges -->
	<section class="x-sec sa-val" aria-labelledby="sa-val-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Value</span>
				<h2 id="sa-val-title">INFOFISCUS Sales Analytics Value Highlights</h2>
			</div>
			<ul class="sa-gauges">
				<?php foreach ( array( array( 90, 'Simplified Installation.' ), array( 70, 'Cost-Effective Data Management.' ), array( 99, 'Customizable Data Transformations.' ) ) as $g ) : ?>
					<li data-igs-reveal style="--p:<?php echo (int) $g[0]; ?>"><span class="sa-arc" aria-hidden="true"><i></i></span><b><?php echo (int) $g[0]; ?>%</b> <span><?php echo esc_html( $g[1] ); ?></span></li>
				<?php endforeach; ?>
			</ul>
			<ul class="sa-checks" data-igs-reveal>
				<li>Pre-built application environments.</li>
				<li>Optimized dimensional models and metrics.</li>
				<li>Ready-to-use data pipelines.</li>
				<li>Agentic AI–enabled adaptability for evolving business needs.</li>
			</ul>
		</div>
	</section>

	<!-- Architecture: data mart -->
	<section class="x-sec x-soft sa-arch" aria-labelledby="sa-arch-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Architecture</span>
				<h2 id="sa-arch-title">INFOFISCUS Sales Analytics Snowflake Native App Architecture</h2>
			</div>
			<div class="sa-arch-cols" data-igs-reveal aria-label="Data pipelines bring sources into data models, a customer database and a sales data mart, which feed dashboards, reports and what-if analysis">
				<div class="sa-col"><small>Sources</small><span><?php $pgi( $sfdc ); ?>Salesforce</span><span><?php $pgi( $e . 'netsuite.png' ); ?>NetSuite</span><span><?php $pgi( $e . 'workday.png' ); ?>Workday</span></div>
				<i class="sa-arrow" aria-hidden="true"></i>
				<div class="sa-col"><small>Data pipelines</small><span><svg><use href="#igs-sync"/></svg>Ingestion</span><span><svg><use href="#igs-code"/></svg>Python transforms</span><span><svg><use href="#pg-clock"/></svg>Incremental loads</span></div>
				<i class="sa-arrow" aria-hidden="true"></i>
				<div class="sa-col is-core"><small><?php $pgi( $sf ); ?>Snowflake</small><span><svg><use href="#igs-layers"/></svg>Data models</span><span><svg><use href="#igs-db"/></svg>Customer DB</span><span><svg><use href="#pg-table"/></svg>Sales data mart</span></div>
				<i class="sa-arrow" aria-hidden="true"></i>
				<div class="sa-col"><small>Insights</small><span><svg><use href="#igs-chart"/></svg>Dashboards</span><span><svg><use href="#igs-file"/></svg>Reports</span><span><svg><use href="#pg-funnel"/></svg>What-if analysis</span></div>
			</div>
		</div>
	</section>

	<!-- Video -->
	<section class="x-sec sa-video" aria-labelledby="sa-video-title">
		<div class="igs-shell sa-video-grid">
			<a class="sa-player" href="https://www.youtube.com/watch?v=LXdNXzh3-qE" target="_blank" rel="noopener" data-igs-video="LXdNXzh3-qE" data-igs-reveal>
				<span class="sa-p-chart" aria-hidden="true"><i style="--h:30%"></i><i style="--h:45%"></i><i style="--h:38%"></i><i style="--h:62%"></i><i style="--h:55%"></i><i style="--h:78%"></i><i style="--h:70%"></i><i style="--h:92%"></i></span>
				<span class="sa-p-play" aria-hidden="true"><svg><use href="#igs-play"/></svg></span>
				<span class="sa-p-cap"><em>Video</em><b>INFOFISCUS Sales Analytics Snowflake Native Application</b></span>
			</a>
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="sa-video-title">Learn More About INFOFISCUS Sales Analytics Snowflake Native Application</h2>
				<div class="sa-touch">
					<h2>Get in touch with us to know more about it</h2>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
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
