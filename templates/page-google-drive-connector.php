<?php
/**
 * Template Name: Google Drive Connector Product
 * Template Post Type: page, product
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$contact_url     = home_url( '/contact-us/' );
$connectors_url  = home_url( '/product/google-cloud-connectors/' );
$marketplace_url = 'https://marketplace.informatica.com/listings/cloud/connectors/infometry_google_drive_connector.html';
$guide_url       = 'https://www.informatica.com/content/dam/informatica-marketplace/solutions/public/3357/Google%20Drive%20Connector%20User%20Guide.pdf';
$drive_icon      = INFOMETRY_CT_URL . 'assets/images/google-connectors/google-drive.png';
$idmc_icon       = INFOMETRY_CT_URL . 'assets/images/informatica-product-mark.png';
?>
<main class="igd-page" id="igd-main">
	<section class="igd-hero">
		<div class="igd-shell igd-hero-grid">
			<div class="igd-hero-copy">
				<span class="igd-eyebrow"><i></i> Google Drive Connector for Informatica IDMC</span>
				<h1>Google Drive, connected to your <em>enterprise data.</em></h1>
				<p>Automate secure file movement between Google Drive and Informatica IDMC with one native, no-code connector.</p>
				<div class="igd-actions"><a class="igd-button igd-primary" href="<?php echo esc_url( $contact_url ); ?>">Start a free trial <span>→</span></a><a class="igd-button igd-outline" href="<?php echo esc_url( $marketplace_url ); ?>">View Marketplace <span>↗</span></a></div>
			</div>
			<div class="igd-connector-card" aria-label="Google Drive connected to Informatica IDMC">
				<header><span>Native connector</span><b><i></i> Ready</b></header>
				<div class="igd-connection">
					<div class="igd-endpoint"><span><img src="<?php echo esc_url( $drive_icon ); ?>" alt="Google Drive"></span><small>Cloud files</small><strong>Google Drive</strong></div>
					<div class="igd-link" aria-hidden="true"><span></span><i>→</i></div>
					<div class="igd-endpoint"><span><img src="<?php echo esc_url( $idmc_icon ); ?>" alt="Informatica IDMC"></span><small>Data integration</small><strong>Informatica IDMC</strong></div>
				</div>
				<footer><span><i>✓</i> OAuth 2.0</span><span><i>✓</i> Secure Agent</span><span><i>✓</i> No data stored</span></footer>
			</div>
		</div>
		<div class="igd-shell igd-hero-features">
			<div><span><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M8 3v4M16 3v4M3 10h18M8 14h3M8 17h6"/></svg></span><b>30-Day</b><small>Free Trial</small></div>
			<div><span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7.5 7c-2.5 0-4.5 2.2-4.5 5s2 5 4.5 5c4.5 0 4.5-10 9-10 2.5 0 4.5 2.2 4.5 5s-2 5-4.5 5c-4.5 0-4.5-10-9-10Z"/></svg></span><b>Unlimited</b><small>Operations</small></div>
			<div><span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 13v-2a8 8 0 0 1 16 0v2"/><path d="M4 13a2 2 0 0 1 2-2h1v6H6a2 2 0 0 1-2-2v-2ZM20 13a2 2 0 0 0-2-2h-1v6h1a2 2 0 0 0 2-2v-2ZM17 19c-1 1-2.5 2-5 2"/></svg></span><b>24/7</b><small>Global Support</small></div>
			<div><span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 4.5 3 7.5 8 9 5-1.5 8-4.5 8-9V7l-8-4Z"/><path d="m9 12 2 2 4-5"/></svg></span><b>Certified</b><small>For Informatica IDMC</small></div>
		</div>
	</section>

	<section class="igd-intro"><div class="igd-shell">
		<div class="igd-intro-mark" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
		<div class="igd-intro-layout">
			<div><span class="igd-label">Connector overview</span><b>Native. No-code.<br>Enterprise ready.</b></div>
			<div class="igd-intro-copy"><h2>Infometry’s Google Drive Connector <em>for Informatica</em></h2><p><strong>Infometry’s Google Drive Connector for Informatica IDMC is 100% Informatica Certified</strong>, offering seamless <strong>native, no-code connectivity</strong> between Google Drive and various external sources. It enables users to <strong>upload, download, list, create, update</strong>, and manage file content effortlessly—without writing a single line of code. The connector also supports retrieving <strong>comments, replies, user permissions</strong>, and tracking <strong>file revisions</strong>, ensuring intelligent and efficient <strong>Agentic AI-powered integration</strong> and data management.</p></div>
		</div>
	</div></section>

	<section class="igd-capabilities"><div class="igd-shell igd-cap-layout">
		<div class="igd-cap-copy"><span class="igd-label">Complete file lifecycle</span><h2>One connector for every essential Drive workflow.</h2><p>Use Drive as a governed source or target, from simple file transfers to metadata-rich enterprise pipelines.</p><a class="igd-text-link" href="<?php echo esc_url( $guide_url ); ?>">Download the user guide <span>↗</span></a></div>
		<div class="igd-cap-list">
			<article><div><span>01</span><h3>Move &amp; manage files</h3></div><p>List, upload, download, create, update, delete and search files.</p><ul><li>Multiple-file downloads</li><li>Source and target support</li></ul></article>
			<article><div><span>02</span><h3>Access shared content</h3></div><p>Work across personal Drive, Shared with me, Team Drive and Shared Drives.</p><ul><li>Permissions &amp; metadata</li><li>Multiple connections</li></ul></article>
			<article><div><span>03</span><h3>Capture collaboration</h3></div><p>Bring comments, replies and revision history into downstream workflows.</p><ul><li>Comment retrieval</li><li>Revision tracking</li></ul></article>
		</div>
	</div></section>

	<section class="igd-usecases"><div class="igd-shell">
		<div class="igd-heading igd-center"><span>Enterprise use cases</span><h2>Built for the files your business depends on.</h2></div>
		<div class="igd-use-grid"><article><i>01</i><h3>Analytics ingestion</h3><p>Move finance, sales and operations files into warehouses and reporting pipelines.</p></article><article><i>02</i><h3>Automated exports</h3><p>Publish governed reports and data extracts back to shared business folders.</p></article><article><i>03</i><h3>Shared Drive governance</h3><p>Manage file metadata, permissions and revisions across teams.</p></article><article><i>04</i><h3>AI-ready content</h3><p>Bring Drive files and collaboration context into governed AI workflows.</p></article></div>
	</div></section>

	<section class="igd-assurance"><div class="igd-shell igd-assurance-card">
		<div><span class="igd-label">Enterprise ready</span><h2>Secure by design.<br>Simple to operate.</h2><p>The connector runs through Informatica Secure Agent and Google APIs. Your business data stays within your managed environment.</p></div>
		<div class="igd-assurance-points"><span><i>✓</i><b>Informatica certified</b><small>Validated for the IDMC ecosystem</small></span><span><i>✓</i><b>No data retained</b><small>Files stay in your governed flow</small></span><span><i>✓</i><b>Predictable licensing</b><small>Annual OrgID-based subscription</small></span><span><i>✓</i><b>Global support</b><small>24/7 help across time zones</small></span></div>
	</div></section>

	<section class="igd-setup"><div class="igd-shell">
		<div class="igd-heading igd-center"><span>Simple setup</span><h2>From trial to first workflow in three steps.</h2></div>
		<div class="igd-steps"><article><b>01</b><h3>Activate</h3><p>Start a 30-day Marketplace trial and activate it for your OrgID.</p></article><article><b>02</b><h3>Connect</h3><p>Configure Google OAuth, Drive scope and Informatica Secure Agent.</p></article><article><b>03</b><h3>Automate</h3><p>Add the connector to your IDMC task and schedule the workflow.</p></article></div>
	</div></section>

	<section class="igd-faq"><div class="igd-shell igd-faq-layout">
		<div><span class="igd-label">Frequently asked</span><h2>Plan your Google Drive integration with confidence.</h2><p>Need help with implementation or licensing? Our connector team can guide you.</p><a class="igd-text-link" href="<?php echo esc_url( $contact_url ); ?>">Talk to an expert <span>→</span></a></div>
		<div class="igd-questions"><details open><summary>Is the connector certified by Informatica?<span>+</span></summary><p>Yes. It is Informatica certified and listed on Informatica Marketplace.</p></details><details><summary>Which IDMC tasks are supported?<span>+</span></summary><p>Use Drive as a source or target in mappings, mapping tasks and synchronization tasks.</p></details><details><summary>Does it support Shared Drives?<span>+</span></summary><p>Yes. It supports personal Drive, Shared with me, Team Drive and Shared Drive operations.</p></details><details><summary>How does licensing work?<span>+</span></summary><p>A 30-day trial is available. Annual Production and Non-Production licenses are charged per OrgID with unlimited usage.</p></details></div>
	</div></section>

	<section class="igd-cta"><div class="igd-shell"><div><span>Start with a 30-day trial</span><h2>Make Google Drive part of your governed data flow.</h2></div><div><a class="igd-button igd-light" href="<?php echo esc_url( $contact_url ); ?>">Start your free trial <span>→</span></a><a href="<?php echo esc_url( $marketplace_url ); ?>">View Marketplace listing ↗</a></div></div></section>
	<footer class="igd-footer"><div class="igd-shell"><span>© 2026 Infometry Inc.</span><a href="<?php echo esc_url( $connectors_url ); ?>">All Google connectors</a><a href="<?php echo esc_url( $contact_url ); ?>">Contact us</a></div></footer>
</main>
<?php get_footer(); ?>
