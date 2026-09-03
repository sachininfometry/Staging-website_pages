<?php
/**
 * Template Name: Google Drive Connector Product
 * Template Post Type: page, product
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
		<div class="igd-aurora" aria-hidden="true"></div>
		<div class="igd-shell igd-hero-grid">
			<div class="igd-hero-copy">
				<a class="igd-back" href="<?php echo esc_url( $connectors_url ); ?>"><span>←</span> Google connector ecosystem</a>
				<div class="igd-badge"><i></i> Informatica certified connector</div>
				<h1>Google Drive integration, <em>built for enterprise flow.</em></h1>
				<p>Connect Google Drive natively with Informatica IDMC to automate file movement, permissions, metadata and collaboration—without custom code.</p>
				<div class="igd-actions">
					<a class="igd-button igd-primary" href="<?php echo esc_url( $contact_url ); ?>">Start a Free Trial <span>→</span></a>
					<a class="igd-button igd-secondary" href="<?php echo esc_url( $marketplace_url ); ?>">View Marketplace <span>↗</span></a>
				</div>
				<div class="igd-proof"><span><b>100%</b> Informatica certified</span><span><b>30 days</b> Trial license</span><span><b>24/7</b> Global support</span></div>
			</div>

			<div class="igd-hero-visual" aria-label="Google Drive to Informatica IDMC integration">
				<div class="igd-visual-label">Secure file automation</div>
				<div class="igd-platform igd-google"><span><img src="<?php echo esc_url( $drive_icon ); ?>" alt="Google Drive"></span><div><small>Source + target</small><strong>Google Drive</strong></div></div>
				<div class="igd-route" aria-hidden="true"><i></i><i></i><i></i><b></b></div>
				<div class="igd-platform igd-idmc"><span><img src="<?php echo esc_url( $idmc_icon ); ?>" alt="Informatica IDMC"></span><div><small>Data integration</small><strong>Informatica IDMC</strong></div></div>
				<div class="igd-signal-card igd-signal-one"><i></i> Files synchronized</div>
				<div class="igd-signal-card igd-signal-two"><i></i> Policy governed</div>
				<div class="igd-visual-footer"><span>OAuth 2.0</span><span>Secure Agent</span><span>No data stored</span></div>
			</div>
		</div>
	</section>

	<section class="igd-trust"><div class="igd-shell"><span>One connector. Every essential Drive workflow.</span><div><b>Upload</b><b>Download</b><b>Search</b><b>Permissions</b><b>Revisions</b><b>Comments</b></div></div></section>

	<section class="igd-overview">
		<div class="igd-shell igd-split">
			<div><span class="igd-kicker">Native by design</span><h2>Move files without moving complexity.</h2><p>Use Google Drive as a source or target in synchronization tasks, mapping tasks and mappings. Infometry’s connector works inside IDMC through the Secure Agent and Google APIs, giving teams a governed way to automate cloud file operations.</p><ul class="igd-checks"><li>No-code configuration inside IDMC</li><li>Multiple Google Drive connections</li><li>Shared Drive and Team Drive support</li><li>Unlimited usage within the licensed OrgID</li></ul></div>
		<div class="igd-control-card">
			<div class="igd-control-head"><span>Connector control plane</span><b>Live</b></div>
			<div class="igd-flow-row"><span><img src="<?php echo esc_url( $drive_icon ); ?>" alt="">Drive</span><i><b></b></i><span><img src="<?php echo esc_url( $idmc_icon ); ?>" alt="">IDMC</span></div>
			<div class="igd-control-grid"><span><i></i>Encrypted authentication</span><span><i></i>Scheduled execution</span><span><i></i>Reusable mappings</span><span><i></i>Operational monitoring</span></div>
		</div>
	</div>
	</section>

	<section class="igd-capabilities" id="capabilities"><div class="igd-shell">
		<div class="igd-heading"><span class="igd-kicker">Complete file lifecycle</span><h2>Everything your Drive workflows need.</h2><p>From basic file movement to collaborative metadata, one connector handles the operational details.</p></div>
		<div class="igd-cap-grid">
			<article class="is-blue"><span>01</span><h3>File operations</h3><p>List, get, create, update, delete, search, upload and download files through reusable IDMC tasks.</p><b>CSV · TXT · PDF · DOC · JPEG</b></article>
			<article class="is-green"><span>02</span><h3>Shared environments</h3><p>Work across My Drive, Shared with me, Team Drives and Shared Drives with multiple connections.</p><b>Multi-account ready</b></article>
			<article class="is-yellow"><span>03</span><h3>Governance & access</h3><p>Retrieve and manage file permissions, metadata and sharing context while keeping execution governed.</p><b>Permission aware</b></article>
			<article class="is-red"><span>04</span><h3>Collaboration data</h3><p>Fetch comments, replies and revision details to include collaboration signals in downstream workflows.</p><b>Full activity context</b></article>
			<article class="is-cyan"><span>05</span><h3>Bulk automation</h3><p>Download multiple files, schedule transfers and eliminate repetitive exports across environments.</p><b>Production scale</b></article>
			<article class="is-violet"><span>06</span><h3>Agentic AI-ready</h3><p>Provide trusted file metadata and governed operations for intelligent automation and decision workflows.</p><b>Future-ready foundation</b></article>
		</div>
	</div></section>

	<section class="igd-usecases"><div class="igd-shell igd-use-grid">
		<div class="igd-heading"><span class="igd-kicker">Built for real work</span><h2>Automate the handoffs slowing teams down.</h2><p>Connect collaborative files with enterprise data systems while maintaining a clean operational trail.</p><a href="<?php echo esc_url( $guide_url ); ?>">Download the user guide <span>↗</span></a></div>
		<div class="igd-use-list">
			<article><span>Sales operations</span><h3>Route forecasts and reports</h3><p>Move shared reports into governed warehouse and analytics pipelines on schedule.</p></article>
			<article><span>Data engineering</span><h3>Automate cloud file ingestion</h3><p>Use Drive files as inputs or outputs for ETL across cloud and on-premise systems.</p></article>
			<article><span>Enterprise collaboration</span><h3>Preserve context and control</h3><p>Bring permissions, comments and revisions into automated business processes.</p></article>
		</div>
	</div></section>

	<section class="igd-steps"><div class="igd-shell">
		<div class="igd-heading igd-center"><span class="igd-kicker">Fast path to value</span><h2>From marketplace to production in four steps.</h2></div>
		<ol><li><b>01</b><span><strong>Start your trial</strong><small>Request the connector from Informatica Marketplace.</small></span></li><li><b>02</b><span><strong>Activate your license</strong><small>Choose a 30-day trial or annual subscription.</small></span></li><li><b>03</b><span><strong>Connect securely</strong><small>Configure OAuth credentials and your Secure Agent.</small></span></li><li><b>04</b><span><strong>Build your workflow</strong><small>Create a mapping, synchronization or mapping task.</small></span></li></ol>
	</div></section>

	<section class="igd-faq"><div class="igd-shell igd-faq-grid"><div><span class="igd-kicker">Questions, answered</span><h2>Plan with confidence.</h2><p>Everything teams usually need before starting a connector evaluation.</p><a class="igd-button igd-dark" href="<?php echo esc_url( $contact_url ); ?>">Talk to a connector expert</a></div><div class="igd-questions">
		<details open><summary>Is the Google Drive Connector certified by Informatica?<span>+</span></summary><p>Yes. The connector is Informatica certified and available through Informatica Marketplace.</p></details>
		<details><summary>What operations does it support?<span>+</span></summary><p>Upload, download, list, search, create, update and delete files, plus permissions, metadata, comments, replies and revisions.</p></details>
		<details><summary>Which IDMC assets can use it?<span>+</span></summary><p>You can use Google Drive as a source or target in mappings, mapping tasks and synchronization tasks.</p></details>
		<details><summary>How is the connector licensed?<span>+</span></summary><p>Infometry offers a 30-day trial and annual Prod or Non-Prod subscriptions for an OrgID, with unlimited connector usage.</p></details>
		<details><summary>Does the connector store customer data?<span>+</span></summary><p>No. Operations execute through the customer’s IDMC environment and Secure Agent; the connector does not retain business data.</p></details>
	</div></div></section>

	<section class="igd-cta"><div class="igd-shell"><div><span class="igd-kicker">Ready to remove manual file work?</span><h2>Turn Google Drive into a governed IDMC data source.</h2><p>Start with a 30-day trial and build your first automated file workflow.</p></div><div><a class="igd-button igd-light" href="<?php echo esc_url( $contact_url ); ?>">Start Your Free Trial <span>→</span></a><a href="<?php echo esc_url( $marketplace_url ); ?>">View on Informatica Marketplace</a></div></div></section>

	<footer class="igd-footer"><div class="igd-shell"><span>© 2026 Infometry Inc.</span><a href="<?php echo esc_url( $connectors_url ); ?>">Explore all Google connectors</a><a href="<?php echo esc_url( $contact_url ); ?>">Contact us</a></div></footer>
</main>

<?php get_footer(); ?>
