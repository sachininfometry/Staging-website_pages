<?php
/**
 * Template Name: Asana FDP Snowflake Case Study
 * Template Post Type: page
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$contact_url = home_url( '/contact-us/' );
$challenges  = array(
	array( 'icon' => 'code', 'title' => 'Tightly coupled processing', 'copy' => 'Extensive custom Python processing and tightly coupled SQL transformations increased implementation and maintenance effort.' ),
	array( 'icon' => 'refresh', 'title' => 'Full data refreshes', 'copy' => 'Full data refreshes during synchronization resulted in longer processing times and unnecessary compute consumption.' ),
	array( 'icon' => 'shield', 'title' => 'Limited auditability', 'copy' => 'Limited auditability and governance made data lineage, reconciliation, and operational monitoring more challenging.' ),
	array( 'icon' => 'layers', 'title' => 'Architecture complexity', 'copy' => 'The absence of a modular architecture and dimensional data model increased the complexity of introducing new business capabilities.' ),
	array( 'icon' => 'split', 'title' => 'Shared workloads', 'copy' => 'Operational processing and analytical reporting shared common datasets, limiting workload optimization.' ),
	array( 'icon' => 'chart', 'title' => 'Growing business demands', 'copy' => 'Growing business demands required a more flexible architecture capable of supporting future expansion.' ),
	array( 'icon' => 'snow', 'title' => 'Snowflake best practices', 'copy' => 'Asana wanted to leverage Snowflake best practices, native architecture patterns, and secure data sharing capabilities.' ),
);
$solutions   = array(
	array( 'icon' => 'layers', 'title' => 'Layered enterprise architecture', 'copy' => 'Designed and implemented a layered Enterprise Data Lake (EDL), Enterprise Staging Layer (ESL), and Enterprise Data Platform architecture to clearly separate ingestion, transformation, and consumption workloads.' ),
	array( 'icon' => 'settings', 'title' => 'Incremental data processing', 'copy' => 'Replaced full data refreshes with incremental data processing using control and audit frameworks, significantly improving pipeline performance and reducing Snowflake compute consumption.' ),
	array( 'icon' => 'database', 'title' => 'Standardized dimensional model', 'copy' => 'Implemented a standardized dimensional data model with common facts and conformed dimensions to improve reporting consistency, simplify analytics, and support future enhancements.' ),
	array( 'icon' => 'workflow', 'title' => 'Apache Airflow orchestration', 'copy' => 'Introduced Apache Airflow for enterprise workflow orchestration, providing centralized scheduling, dependency management, monitoring, alerting, and operational visibility across data pipelines.' ),
	array( 'icon' => 'shield', 'title' => 'Stronger data governance', 'copy' => 'Strengthened data governance through standardized data models, referential integrity, auditability, and end-to-end data lineage.' ),
	array( 'icon' => 'link', 'title' => 'Optimized business-data integration', 'copy' => 'Optimized data integration across Zuora, Salesforce, NetSuite, and Product Events while eliminating redundant data movement and improving overall pipeline efficiency.' ),
	array( 'icon' => 'snow', 'title' => 'Snowflake AI Data Cloud', 'copy' => "Leveraged Snowflake's AI Data Cloud architecture and secure data sharing capabilities to build a scalable, high-performance enterprise data platform." ),
);
$outcomes    = array(
	array( 'icon' => 'snow', 'title' => 'Reduced Snowflake compute consumption', 'copy' => 'through optimized data movement and incremental loading strategies.' ),
	array( 'icon' => 'settings', 'title' => 'Significantly improved maintainability', 'copy' => 'and operational support through modular architecture and Apache Airflow-based workflow orchestration.' ),
	array( 'icon' => 'shield', 'title' => 'Enhanced governance, auditability, and data quality', 'copy' => 'through standardized enterprise data models and comprehensive audit frameworks.' ),
	array( 'icon' => 'rocket', 'title' => 'Accelerated delivery of new business requirements', 'copy' => 'by implementing reusable dimensional models and modular transformation pipelines.' ),
	array( 'icon' => 'chart', 'title' => 'Established a trusted enterprise reporting foundation', 'copy' => 'with standardized facts and conformed dimensions supporting consistent financial metrics across the organization.' ),
	array( 'icon' => 'users', 'title' => 'Enabled a scalable platform for self-service analytics', 'copy' => "AI initiatives, and future business growth by fully leveraging Snowflake's native capabilities and architectural best practices." ),
);

if ( ! function_exists( 'infometry_fdp_icon' ) ) {
	function infometry_fdp_icon( $name ) {
		printf( '<svg aria-hidden="true"><use href="#fdp-icon-%s"></use></svg>', esc_attr( $name ) );
	}
}
?>

<main class="fdp-page" id="fdp-page">
	<svg class="fdp-sprite" aria-hidden="true">
		<symbol id="fdp-icon-code" viewBox="0 0 24 24"><path d="M8 7 3 12l5 5M16 7l5 5-5 5M14 3l-4 18"/></symbol>
		<symbol id="fdp-icon-refresh" viewBox="0 0 24 24"><path d="M20 7v6h-6M4 17v-6h6"/><path d="M6.5 8A8 8 0 0 1 20 13M17.5 16A8 8 0 0 1 4 11"/></symbol>
		<symbol id="fdp-icon-shield" viewBox="0 0 24 24"><path d="m12 3 8 3v6c0 5-3.2 8.4-8 10-4.8-1.6-8-5-8-10V6l8-3Z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></symbol>
		<symbol id="fdp-icon-layers" viewBox="0 0 24 24"><path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 12 9 5 9-5M3 16l9 5 9-5"/></symbol>
		<symbol id="fdp-icon-split" viewBox="0 0 24 24"><circle cx="6" cy="5" r="2"/><circle cx="18" cy="5" r="2"/><circle cx="12" cy="19" r="2"/><path d="M8 5h2a2 2 0 0 1 2 2v10M16 5h-2a2 2 0 0 0-2 2"/></symbol>
		<symbol id="fdp-icon-chart" viewBox="0 0 24 24"><path d="M4 21V10m6 11V4m6 17v-7m5 7V7"/></symbol>
		<symbol id="fdp-icon-snow" viewBox="0 0 24 24"><path d="M12 2v20M4.2 6.5l15.6 11M19.8 6.5l-15.6 11M8.5 4 12 6l3.5-2M8.5 20l3.5-2 3.5 2"/></symbol>
		<symbol id="fdp-icon-settings" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19 13.5v-3l-2-.7-.7-1.7.9-1.9-2.1-2.1-1.9.9-1.7-.7-.7-2h-3l-.7 2-1.7.7-1.9-.9-2.1 2.1.9 1.9-.7 1.7-2 .7v3l2 .7.7 1.7-.9 1.9 2.1 2.1 1.9-.9 1.7.7.7 2h3l.7-2 1.7-.7 1.9.9 2.1-2.1-.9-1.9.7-1.7 2-.7Z"/></symbol>
		<symbol id="fdp-icon-database" viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v7c0 1.7 3.6 3 8 3s8-1.3 8-3V5M4 12v7c0 1.7 3.6 3 8 3s8-1.3 8-3v-7"/></symbol>
		<symbol id="fdp-icon-workflow" viewBox="0 0 24 24"><circle cx="5" cy="12" r="2"/><circle cx="19" cy="5" r="2"/><circle cx="19" cy="19" r="2"/><path d="M7 12h5a3 3 0 0 0 3-3V7M12 12h3a3 3 0 0 1 3 3v2"/></symbol>
		<symbol id="fdp-icon-link" viewBox="0 0 24 24"><path d="m9 15 6-6M7.5 18H6a4 4 0 0 1 0-8h3M16.5 6H18a4 4 0 0 1 0 8h-3"/></symbol>
		<symbol id="fdp-icon-rocket" viewBox="0 0 24 24"><path d="M14 4c3-2 6-2 6-2s0 3-2 6l-5 5-5-5 6-4Z"/><path d="m8 8-4 1-2 3 6 1M13 13l-1 6-3 2-1-8"/></symbol>
		<symbol id="fdp-icon-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"/><circle cx="17" cy="9" r="2"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M15 14c4 0 6 2 6 5"/></symbol>
	</svg>

	<section class="fdp-hero" aria-labelledby="fdp-title">
		<img class="fdp-hero-scene" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/asana-fdp-hero-v2.png' ); ?>" alt="" aria-hidden="true">
		<div class="fdp-shell fdp-hero-grid"><div class="fdp-hero-copy"><span class="fdp-kicker">Case Study</span><h1 id="fdp-title">Financial Data Platform<br>(FDP 2.0) Modernization<br>on Snowflake</h1><p>Infometry was engaged to assess, redesign, and modernize Asana’s existing Financial Data Platform by implementing a modular Snowflake architecture that simplifies data integration, accelerates financial reporting, strengthens governance, and establishes a scalable foundation for enterprise analytics and future business growth.</p><div class="fdp-tags"><span>Asana</span><span>SaaS</span><span>Snowflake</span><span>Data Modernization</span></div><a class="fdp-button" href="<?php echo esc_url( $contact_url ); ?>">Talk to an Expert <span>→</span></a></div><div class="fdp-hero-visual" aria-label="Asana and Snowflake modernization illustration"><div class="fdp-asana-brand"><span class="fdp-asana-mark"><i></i><i></i><i></i></span><strong>asana</strong><span class="fdp-asana-tagline">Smarter data.<br>Greater impact.</span></div><div class="fdp-snow-emblem"><div class="fdp-snow-mark"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/snowflake-logo.png' ); ?>" alt="Snowflake"></div></div><div class="fdp-visual-values"><span>Modernize</span><span>Unify</span><span>Scale</span></div></div></div>
	</section>

	<section class="fdp-facts"><div class="fdp-shell fdp-facts-grid"><div><?php infometry_fdp_icon( 'database' ); ?><span><small>Client</small><strong>Asana</strong></span></div><div><?php infometry_fdp_icon( 'users' ); ?><span><small>Industry</small><strong>SaaS</strong></span></div><div><?php infometry_fdp_icon( 'snow' ); ?><span><small>Platform</small><strong>Snowflake</strong></span></div><div><?php infometry_fdp_icon( 'chart' ); ?><span><small>Focus Area</small><strong>Financial Data Platform Modernization</strong></span></div></div></section>

	<section class="fdp-section"><div class="fdp-shell fdp-two-col"><article><span class="fdp-section-label">Our Client</span><h2>Enterprise financial analytics at global SaaS scale</h2><p><a href="https://asana.com/">Asana</a> is a leading global SaaS company that relies on financial and operational data to measure critical business metrics, including Monthly Recurring Revenue (MRR), Annual Recurring Revenue (ARR), Customer Lifetime Value (LTV), Customer Churn, and New Logo Acquisition. These insights are essential for executive decision-making, financial planning, and business performance management.</p><p>Asana’s Financial Data Platform (FDP 2.0) integrates data from multiple enterprise applications, including Zuora, Salesforce, NetSuite, and Product Events, to provide a unified foundation for enterprise reporting and analytics.</p></article><article class="fdp-objective"><span class="fdp-section-label">Business Objective</span><h2>A scalable, governed Snowflake foundation</h2><p>As Asana’s Financial Data Platform evolved to meet growing business demands, the company sought to modernize its data architecture to improve scalability, maintainability, and governance while adopting Snowflake best practices and fully leveraging the Snowflake AI Data Cloud’s native capabilities for enterprise data engineering, analytics, and secure data sharing.</p></article></div></section>

	<section class="fdp-section fdp-challenges"><div class="fdp-shell"><div class="fdp-heading"><span class="fdp-section-label">Business Challenges</span><h2>The Challenge</h2><p>Asana’s existing Financial Data Platform had successfully supported the organization’s reporting requirements for several years. As the platform expanded to accommodate new business capabilities and increasing data volumes, its architecture presented opportunities for modernization to improve operational efficiency, scalability, and long-term maintainability.</p><strong>Key challenges included:</strong></div><div class="fdp-card-grid"><?php foreach ( $challenges as $challenge ) : ?><article class="fdp-card"><span class="fdp-icon"><?php infometry_fdp_icon( $challenge['icon'] ); ?></span><h3><?php echo esc_html( $challenge['title'] ); ?></h3><p><?php echo esc_html( $challenge['copy'] ); ?></p></article><?php endforeach; ?></div></div></section>

	<section class="fdp-section fdp-modernization"><div class="fdp-shell"><div class="fdp-heading"><span class="fdp-section-label">Architecture Transformation</span><h2>From Legacy to Modern</h2><p>We transformed Asana’s financial data platform from a tightly coupled, complex environment to a modern, scalable, Snowflake-native architecture.</p></div><figure><img class="fdp-before-after-image" src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/asana-fdp-before-after.png' ); ?>" alt="Before and after architecture: legacy ETL processes modernized into a unified Snowflake-native data platform"></figure></div></section>

	<section class="fdp-section fdp-solution"><div class="fdp-shell"><div class="fdp-heading"><span class="fdp-section-label">Solution</span><h2>The Infometry Solution</h2><p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Infometry</a> successfully modernized Asana’s Financial Data Platform by redesigning the architecture using Snowflake best practices and modern data engineering principles.</p><strong>The implementation included:</strong></div><div class="fdp-solution-grid"><?php foreach ( $solutions as $solution ) : ?><article><span class="fdp-icon"><?php infometry_fdp_icon( $solution['icon'] ); ?></span><div><h3><?php echo esc_html( $solution['title'] ); ?></h3><p><?php echo esc_html( $solution['copy'] ); ?></p></div></article><?php endforeach; ?></div></div></section>

	<section class="fdp-impact"><div class="fdp-shell"><div class="fdp-heading is-light"><span class="fdp-section-label">Business Outcomes</span><h2>Business Impact</h2><p>By partnering with Infometry, Asana successfully transformed its Financial Data Platform into a modern, enterprise-grade Snowflake data platform that is scalable, governed, and significantly easier to operate, maintain, and extend.</p><strong>The modernization delivered measurable business and operational improvements, including:</strong></div><div class="fdp-impact-grid"><article class="fdp-impact-feature"><strong>60<span>%</span></strong><h3>improvement in data pipeline performance</h3><p>by replacing full data refreshes with incremental data processing.</p></article><?php foreach ( $outcomes as $outcome ) : ?><article><span class="fdp-impact-icon"><?php infometry_fdp_icon( $outcome['icon'] ); ?></span><h3><?php echo esc_html( $outcome['title'] ); ?></h3><p><?php echo esc_html( $outcome['copy'] ); ?></p></article><?php endforeach; ?></div></div></section>

	<section class="fdp-section fdp-technologies"><div class="fdp-shell"><div class="fdp-heading"><span class="fdp-section-label">Technologies Used</span><h2>Technology Architecture</h2></div><figure><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/case-studies/asana-fdp-technologies.png' ); ?>" alt="Snowflake, Infometry, Python, Apache Airflow, Zuora, enterprise data warehouse, and enterprise data lake architecture"></figure></div></section>

	<section class="fdp-cta"><div class="fdp-shell fdp-cta-grid"><div><span class="fdp-section-label">Financial Data Platform Modernization</span><h2>Financial Data Platform (FDP 2.0) Modernization on Snowflake</h2><p>Infometry successfully modernized Asana’s Financial Data Platform by redesigning the architecture using Snowflake best practices and modern data engineering principles.</p><a class="fdp-button" href="<?php echo esc_url( $contact_url ); ?>">Learn more <span>→</span></a></div><div class="fdp-cta-points"><span><?php infometry_fdp_icon( 'layers' ); ?>Modernize</span><span><?php infometry_fdp_icon( 'shield' ); ?>Govern</span><span><?php infometry_fdp_icon( 'chart' ); ?>Scale</span><span><?php infometry_fdp_icon( 'users' ); ?>Self-service analytics</span></div></div></section>
	<footer class="fdp-footer"><div class="fdp-shell"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry Inc."><span>© 2026 Infometry Inc. All Rights Reserved.</span></div></footer>
</main>

<?php get_footer(); ?>
