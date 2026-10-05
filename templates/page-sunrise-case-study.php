<?php
/**
 * Template Name: Sunrise Case Study
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_url = home_url( '/contact-us/' );

$challenges = array(
	array( 'database', 'Fragmented enterprise data', 'CRM, ERP, production, finance, meter-management, contract, and operational data lived across disconnected systems.' ),
	array( 'layers', 'Multiple sources of truth', 'Customer, home, contract, partner, and production records lacked a single, trusted analytical view.' ),
	array( 'structure', 'Complex data structures', 'Historical proposals and operational information required extensive alignment and transformation.' ),
	array( 'shield', 'Data quality & consistency', 'Customer, contact, partner, equipment, and financial data needed repeatable quality controls.' ),
	array( 'users', 'Cross-functional analytics', 'Sales, operations, production, customer engagement, and finance needed connected insights.' ),
	array( 'chart', 'Growing analytical complexity', 'NPV, credit, project economics, and portfolio performance demanded a scalable foundation.' ),
);

$analytics = array(
	array( 'chart', 'Production Analytics', 'Evaluate solar production and operational performance.' ),
	array( 'users', 'Customer Targeting', 'Identify and segment high-potential customers.' ),
	array( 'filter', 'Sales Cycle Analytics', 'Track progression from opportunity through contract.' ),
	array( 'handshake', 'Partner Performance', 'Measure partner activity and business outcomes.' ),
	array( 'message', 'Customer Contact Analytics', 'Understand interactions and engagement.' ),
	array( 'home', 'Home Scoring', 'Evaluate homes and opportunities against defined criteria.' ),
	array( 'trend', 'NPV Driver Analysis', 'Identify the factors influencing project economics.' ),
	array( 'document', 'Rating Agency Analytics', 'Support structured reporting and analysis requirements.' ),
	array( 'shield', 'Credit Model Analytics', 'Connect customer and financial data for credit analysis.' ),
	array( 'pie', 'Fund Portfolio Analytics', 'Assess financial and operational portfolio performance.' ),
);

$impact = array(
	array( 'database', 'Unified Enterprise Data', 'Customer, sales, production, partner, operational, and financial data in one analytical foundation.' ),
	array( 'target', 'Trusted Business Metrics', 'Standardized data models and definitions that improve reporting consistency.' ),
	array( 'gear', 'Automated Data Orchestration', 'Repeatable pipelines that reduce dependence on manually assembled data.' ),
	array( 'users', 'Cross-Functional Insights', 'Connected analysis across customers, sales, production, partners, economics, and portfolios.' ),
	array( 'chart', 'Scalable Analytics Architecture', 'A future-ready platform designed for new sources, metrics, and business requirements.' ),
);
?>

<main class="sunrise-case-study" id="sunrise-main">
	<svg class="sunrise-sprite" aria-hidden="true" focusable="false">
		<symbol id="sunrise-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v6c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 11v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"/></symbol>
		<symbol id="sunrise-layers" viewBox="0 0 24 24"><path d="m12 2 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5M3 17l9 5 9-5"/></symbol>
		<symbol id="sunrise-structure" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="8.5" y="14" width="7" height="7" rx="1"/><path d="M6.5 10v2h11v-2M12 12v2"/></symbol>
		<symbol id="sunrise-shield" viewBox="0 0 24 24"><path d="M12 2 4 5v6c0 5 3 9 8 11 5-2 8-6 8-11V5l-8-3Z"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="sunrise-users" viewBox="0 0 24 24"><circle cx="8" cy="8" r="3"/><circle cx="17" cy="9" r="2.5"/><path d="M2 20c0-4 2-6 6-6s6 2 6 6m1-5c4 0 7 1.8 7 5"/></symbol>
		<symbol id="sunrise-chart" viewBox="0 0 24 24"><path d="M4 20V11h4v9m4 0V4h4v16m4 0V8h4v12M2 20h22"/></symbol>
		<symbol id="sunrise-filter" viewBox="0 0 24 24"><path d="M3 4h18l-7 8v7l-4 2v-9L3 4Z"/></symbol>
		<symbol id="sunrise-handshake" viewBox="0 0 24 24"><path d="m8 12 3-3c1-1 2-1 3 0l2 2c1 1 2 1 3 0l2-2M3 7l4-3 4 4m10-1-4-3-3 3M4 10l7 8c1 1 2 1 3 0l5-6"/></symbol>
		<symbol id="sunrise-message" viewBox="0 0 24 24"><path d="M4 4h16v12H8l-4 4V4Z"/><path d="M8 9h8M8 12h5"/></symbol>
		<symbol id="sunrise-home" viewBox="0 0 24 24"><path d="m3 11 9-8 9 8v10h-6v-6H9v6H3V11Z"/></symbol>
		<symbol id="sunrise-trend" viewBox="0 0 24 24"><path d="m3 17 6-6 4 4 8-9"/><path d="M15 6h6v6"/></symbol>
		<symbol id="sunrise-document" viewBox="0 0 24 24"><path d="M6 2h9l5 5v15H6V2Z"/><path d="M14 2v6h6M9 13h7M9 17h7"/></symbol>
		<symbol id="sunrise-pie" viewBox="0 0 24 24"><path d="M11 3a9 9 0 1 0 9 9h-9V3Z"/><path d="M14 3v6h6a7 7 0 0 0-6-6Z"/></symbol>
		<symbol id="sunrise-target" viewBox="0 0 24 24"><circle cx="10" cy="14" r="8"/><circle cx="10" cy="14" r="4"/><path d="m10 14 11-11m-5 0h5v5"/></symbol>
		<symbol id="sunrise-gear" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19 13.5v-3l-2-.7-.7-1.7.9-1.9-2.1-2.1-1.9.9-1.7-.7L10.8 2h-3l-.7 2.3-1.7.7-1.9-.9-2.1 2.1.9 1.9-.7 1.7-2 .7v3l2 .7.7 1.7-.9 1.9 2.1 2.1 1.9-.9 1.7.7.7 2.3h3l.7-2.3 1.7-.7 1.9.9 2.1-2.1-.9-1.9.7-1.7 2-.7Z" transform="translate(1)"/></symbol>
		<symbol id="sunrise-arrow" viewBox="0 0 24 24"><path d="M4 12h15M13 6l6 6-6 6"/></symbol>
		<symbol id="sunrise-cloud" viewBox="0 0 24 24"><path d="M6 19h12a4 4 0 0 0 .5-8A7 7 0 0 0 5 9a5 5 0 0 0 1 10Z"/></symbol>
	</svg>

	<section class="sunrise-hero" aria-labelledby="sunrise-title">
		<img class="sunrise-hero-image" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrise/sunrise-hero.png' ); ?>" width="2048" height="768" alt="A connected solar neighborhood with cloud-powered analytics">
		<div class="sunrise-hero-shade" aria-hidden="true"></div>
		<div class="sunrise-shell sunrise-hero-inner">
			<div class="sunrise-hero-copy">
				<p class="sunrise-eyebrow"><span></span> Case Study / Sunrun</p>
				<h1 id="sunrise-title"><span>Powering Enterprise-Wide</span><strong>Data &amp; Analytics</strong><span class="sunrise-title-tail">for Sunrun</span></h1>
				<p>How Infometry built an integrated data warehouse, orchestration, and analytics foundation across customer, operational, production, and financial systems.</p>
				<div class="sunrise-hero-meta">
					<span><b>Industry</b>Renewable Energy &amp; Residential Solar</span>
					<span><b>Solution</b>Enterprise Data Warehouse &amp; Analytics</span>
					<span><b>Technology</b>Oracle Cloud, Informatica Cloud, Tableau</span>
				</div>
				<a class="sunrise-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to our data &amp; analytics experts <svg><use href="#sunrise-arrow"/></svg></a>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-client" id="client">
		<div class="sunrise-shell sunrise-client-grid">
			<div class="sunrise-copy-block">
				<p class="sunrise-overline">Client</p>
				<h2>Connecting the solar customer and asset lifecycle</h2>
				<p>Sunrun is a leading residential solar and energy services company with business processes spanning customer acquisition, sales, partner operations, contracts, solar production, customer engagement, project finance, credit, and portfolio management.</p>
				<p>As the business scaled, these processes generated significant data across Salesforce, Oracle applications, meter and production systems, contract databases, and homegrown applications. Sunrun engaged Infometry to unify this information and provide trusted insights across the business.</p>
			</div>
			<div class="sunrise-orbit" aria-label="Sunrun connected business ecosystem">
				<div class="sunrise-orbit-ring ring-one"></div><div class="sunrise-orbit-ring ring-two"></div>
				<div class="sunrise-orbit-core"><span class="sunrise-sun-mark"></span><strong>sunrun</strong><small>Connected enterprise data</small></div>
				<span class="orbit-node n1"><svg><use href="#sunrise-users"/></svg>Customers</span>
				<span class="orbit-node n2"><svg><use href="#sunrise-handshake"/></svg>Partners</span>
				<span class="orbit-node n3"><svg><use href="#sunrise-document"/></svg>Contracts</span>
				<span class="orbit-node n4"><svg><use href="#sunrise-chart"/></svg>Finance</span>
				<span class="orbit-node n5"><svg><use href="#sunrise-gear"/></svg>Operations</span>
				<span class="orbit-node n6"><svg><use href="#sunrise-home"/></svg>Production</span>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-challenge" id="challenge">
		<div class="sunrise-shell">
			<div class="sunrise-heading-row"><div><p class="sunrise-overline">The challenge</p><h2>From fragmented systems to a trusted data foundation</h2></div><p>Analytics spanned the entire customer and asset lifecycle, but the data was distributed across multiple operational platforms.</p></div>
			<div class="sunrise-card-grid">
				<?php foreach ( $challenges as $item ) : ?>
					<article><span class="sunrise-icon"><svg><use href="#sunrise-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
			<div class="sunrise-callout"><svg><use href="#sunrise-target"/></svg><p>Sunrun needed more than isolated reporting. It needed an enterprise data foundation that could connect processes and create consistent business metrics.</p></div>
		</div>
	</section>

	<section class="sunrise-section sunrise-solution" id="solution">
		<div class="sunrise-shell">
			<div class="sunrise-solution-intro"><div><p class="sunrise-overline">The Infometry solution</p><h2>A unified, analytics-ready enterprise architecture</h2></div><p>Infometry implemented an end-to-end data warehouse, orchestration, and analytics platform designed around Sunrun's business processes—not isolated source systems.</p></div>
			<div class="sunrise-architecture">
				<article><small>01 / Source systems</small><h3>Enterprise data</h3><ul><li>Salesforce CRM &amp; Sales</li><li>Oracle Applications</li><li>Meter &amp; Production</li><li>Contract Systems</li><li>Homegrown Applications</li></ul></article>
				<span class="sunrise-flow"><svg><use href="#sunrise-arrow"/></svg></span>
				<article class="featured"><small>02 / Integration</small><span class="sunrise-platform-mark">I</span><h3>Informatica Cloud</h3><p>Data integration, transformation, quality, and orchestration.</p></article>
				<span class="sunrise-flow"><svg><use href="#sunrise-arrow"/></svg></span>
				<article><small>03 / Data foundation</small><span class="sunrise-platform-mark oracle">ORACLE</span><h3>Oracle Cloud EDW</h3><p>Standardized enterprise data across the complete solar lifecycle.</p></article>
				<span class="sunrise-flow"><svg><use href="#sunrise-arrow"/></svg></span>
				<article><small>04 / Business analytics</small><span class="sunrise-platform-mark tableau">＋</span><h3>Tableau</h3><p>Trusted reporting, visualization, and cross-functional insights.</p></article>
			</div>
			<div class="sunrise-solution-note"><svg><use href="#sunrise-cloud"/></svg><p><strong>One common analytical foundation.</strong> Integrated data was standardized, transformed, and modeled across customer, sales, partner, production, operational, and financial domains.</p></div>
		</div>
	</section>

	<section class="sunrise-section sunrise-analytics" id="analytics">
		<div class="sunrise-shell">
			<p class="sunrise-overline">Business analytics enabled</p>
			<div class="sunrise-heading-row"><h2>Insights for every part of the solar business</h2><p>The platform enabled ten strategic analytics initiatives across customer acquisition, asset performance, and portfolio economics.</p></div>
			<div class="sunrise-analytics-grid">
				<?php foreach ( $analytics as $item ) : ?>
					<article><span class="sunrise-icon"><svg><use href="#sunrise-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><div><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></div></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-impact" id="impact">
		<div class="sunrise-shell">
			<div class="sunrise-heading-row"><div><p class="sunrise-overline">Business impact</p><h2>A scalable foundation for connected decisions</h2></div><p>The solution connected data and insights across multiple areas of the business while creating room for new sources, metrics, and analytical requirements.</p></div>
			<div class="sunrise-impact-grid">
				<?php foreach ( $impact as $item ) : ?>
					<article><span class="sunrise-icon"><svg><use href="#sunrise-<?php echo esc_attr( $item[0] ); ?>"/></svg></span><h3><?php echo esc_html( $item[1] ); ?></h3><p><?php echo esc_html( $item[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="sunrise-section sunrise-tech" id="technologies">
		<div class="sunrise-shell sunrise-tech-grid">
			<div><p class="sunrise-overline">Technology ecosystem</p><h2>Built for trusted enterprise analytics</h2></div>
			<div class="sunrise-tech-list">
				<span><b>ORACLE</b><small>Cloud Enterprise Data Warehouse</small></span>
				<span><b class="informatica">◆ Informatica</b><small>Cloud Data Integration &amp; Orchestration</small></span>
				<span><b class="tableau">＋ tableau</b><small>Business Intelligence &amp; Analytics</small></span>
				<span><b class="salesforce">☁ Salesforce</b><small>CRM &amp; Sales Data</small></span>
				<span><b>Operational Systems</b><small>Meter, Production &amp; Homegrown Data</small></span>
			</div>
		</div>
	</section>

	<section class="sunrise-final-cta">
		<img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/sunrise/sunrise-hero.png' ); ?>" alt="" width="2048" height="768" aria-hidden="true">
		<div class="sunrise-final-overlay" aria-hidden="true"></div>
		<div class="sunrise-shell sunrise-final-inner"><div><p class="sunrise-overline">Turn complexity into clarity</p><h2>Turning complex enterprise data into actionable insights</h2></div><div><p>Infometry helps organizations connect fragmented enterprise data, establish trusted metrics, and create scalable analytics platforms.</p><a class="sunrise-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to our data &amp; analytics experts <svg><use href="#sunrise-arrow"/></svg></a></div></div>
	</section>
</main>

<?php get_footer(); ?>
