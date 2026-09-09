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
$marketplace_url = 'https://marketplace.informatica.com/content/informatica-marketplace/en_us/listings/cloud/connectors/infometry_google_drive_connector.html';
$guide_url       = 'https://drive.google.com/file/d/1I4CiXha4C8v5NXdwIyIIn0pg33JJ8Imi/view?usp=sharing';
$g2_url          = 'https://www.g2.com/products/google-drive-connector-for-informatica-idmc/reviews';
$sheets_url      = home_url( '/product/google-cloud-connectors/google-sheets-connector/' );
$bigtable_url    = home_url( '/product/google-cloud-connectors/google-bigtable-connector/' );
$conversa_url    = home_url( '/product/conversational-analytics/' );
$accelerators_url = home_url( '/product/accelerators-for-data-warehouse-migration-automation/' );
$customers_url   = home_url( '/company/customers-partners/' );
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
		<div class="igd-intro-head"><h2>Infometry’s Google Drive Connector <em>for Informatica</em></h2></div>
		<div class="igd-intro-layout">
			<div class="igd-intro-copy"><p><strong>Infometry’s Google Drive Connector for Informatica IDMC is 100% Informatica Certified</strong>, offering seamless <strong>native, no-code connectivity</strong> between Google Drive and various external sources. It enables users to <strong>upload, download, list, create, update</strong>, and manage file content effortlessly—without writing a single line of code. The connector also supports retrieving <strong>comments, replies, user permissions</strong>, and tracking <strong>file revisions</strong>, ensuring intelligent and efficient <strong>Agentic AI-powered integration</strong> and data management.</p></div>
			<div class="igd-intro-panel">
				<header><span>Built-in capabilities</span><b><i></i> 100% certified</b></header>
				<div><span><i>01</i><b>Upload &amp; download</b></span><span><i>02</i><b>List, create &amp; update</b></span><span><i>03</i><b>Comments &amp; replies</b></span><span><i>04</i><b>User permissions</b></span><span><i>05</i><b>File revisions</b></span><span><i>06</i><b>Agentic AI integration</b></span></div>
			</div>
		</div>
	</div></section>

	<section class="igd-benefits"><div class="igd-shell">
		<div class="igd-heading"><span>Key benefits</span><h2>Key Benefits of the Informatica Google Drive Connector</h2></div>
		<div class="igd-benefits-grid">
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M8 3v4M16 3v4M3 10h18M12 13v4l3 2"/></svg></i><p>Automation and Scheduling of file transfers is just a click away</p></article>
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 18H6a4 4 0 0 1-.5-8 6.5 6.5 0 0 1 12.7-1.2A4.6 4.6 0 0 1 18 18h-1"/><path d="m10 13-2 2 2 2M14 13l2 2-2 2"/></svg></i><p>Fast and Easy to implement from Informatica Cloud with a No-Code interface</p></article>
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7.5 7c-2.5 0-4.5 2.2-4.5 5s2 5 4.5 5c4.5 0 4.5-10 9-10 2.5 0 4.5 2.2 4.5 5s-2 5-4.5 5c-4.5 0-4.5-10-9-10Z"/></svg></i><p>Unlimited usage on license – no restrictions on number of endpoints</p></article>
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M14 3h7v7M21 3l-9 9M8 16h8M8 12h2"/></svg></i><p>Supports operations like Download, Upload, Delete, Search, manage Permissions, and metadata</p></article>
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20 7h-7a4 4 0 0 0-4 4v1M4 17h7a4 4 0 0 0 4-4v-1"/><path d="m17 4 3 3-3 3M7 14l-3 3 3 3"/></svg></i><p>Integrated support for Refresh Token and Multiple Drive Connections</p></article>
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="7" height="6" rx="2"/><rect x="14" y="14" width="7" height="6" rx="2"/><path d="M10 7h4a3 3 0 0 1 3 3v4M14 17h-4a3 3 0 0 1-3-3v-4"/></svg></i><p>Compatible with both Data Synchronization and Mapping Tasks</p></article>
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.5 3.5 5.5 3.5 9s-1 6.5-3.5 9c-2.5-2.5-3.5-5.5-3.5-9s1-6.5 3.5-9Z"/></svg></i><p>Operates seamlessly across multiple environments and locations</p></article>
			<article><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 3 1.2 4.1a5 5 0 0 0 3.7 3.7L21 12l-4.1 1.2a5 5 0 0 0-3.7 3.7L12 21l-1.2-4.1a5 5 0 0 0-3.7-3.7L3 12l4.1-1.2a5 5 0 0 0 3.7-3.7L12 3Z"/><path d="m19 3 .4 1.6L21 5l-1.6.4L19 7l-.4-1.6L17 5l1.6-.4L19 3Z"/></svg></i><p>Agentic AI intelligence improves operational efficiency and decision-making</p></article>
		</div>
		<div class="igd-benefits-bottom">
			<div class="igd-resource-links"><a class="igd-resource-blue" href="#freetrial"><span class="igd-resource-icon">✦</span><b>Free Trial</b><small>Start your 30-day evaluation</small><em>→</em></a><a class="igd-resource-green" href="<?php echo esc_url( $guide_url ); ?>"><span class="igd-resource-icon">↓</span><b>Download User Guide</b><small>Implementation reference</small><em>↗</em></a><a class="igd-resource-yellow" href="<?php echo esc_url( $g2_url ); ?>"><span class="igd-resource-icon">★</span><b>G2 Product Review</b><small>See customer feedback</small><em>↗</em></a><a class="igd-resource-red" href="<?php echo esc_url( $marketplace_url ); ?>"><span class="igd-resource-icon">↗</span><b>Informatica Marketplace</b><small>View certified listing</small><em>↗</em></a></div>
		</div>
	</div></section>

	<section class="igd-how"><div class="igd-shell igd-two-column">
		<div class="igd-section-copy"><span class="igd-label">Get started</span><h2>How to Use Our Connector</h2><p>A direct path from marketplace activation to a production-ready IDMC workflow.</p></div>
		<ol class="igd-how-list">
			<li><b>01</b><span>Enable it directly from IDMC (formerly IICS) and contact us to activate your license</span></li>
			<li><b>02</b><span>For paid or subscription licenses, reach out to us for fast provisioning</span></li>
			<li><b>03</b><span>Visit Informatica Marketplace, search Infometry’s Google Drive Connector, and click Start Free Trial to submit your request</span></li>
			<li><b>04</b><span>We offer two licensing models: a 30-day trial license, and a full subscription model</span></li>
			<li><b>05</b><span>Users can also contact Informatica directly to activate their trial license on the IDMC platform</span></li>
		</ol>
		<div class="igd-flow-diagram" aria-label="Google Drive connector flow to Informatica IDMC and enterprise systems">
			<div class="igd-flow-source"><span><img src="<?php echo esc_url( $drive_icon ); ?>" alt="Google Drive"></span><b>Google Drive</b><small>Cloud files</small></div>
			<div class="igd-flow-line igd-flow-line-main"><i></i></div>
			<div class="igd-flow-core"><span><img src="<?php echo esc_url( $idmc_icon ); ?>" alt="Informatica IDMC"></span><b>Informatica<br>IDMC</b><small>Native connector</small></div>
			<div class="igd-flow-branch igd-branch-top"><i></i><span>☁</span><b>SaaS applications</b></div>
			<div class="igd-flow-branch igd-branch-right"><i></i><span>▤</span><b>Databases</b></div>
			<div class="igd-flow-branch igd-branch-bottom"><i></i><span>▣</span><b>CRM / ERP</b></div>
			<div class="igd-flow-branch igd-branch-other"><i></i><span>◎</span><b>Other apps</b></div>
		</div>
	</div></section>

	<section class="igd-operations"><div class="igd-shell">
		<div class="igd-heading"><span>Complete file lifecycle</span><h2>Features of Infometry's Google Drive Connector</h2><p>Use the connector to integrate Google Drive with Informatica’s IDMC platform through a no-code, Agentic AI-powered approach:</p></div>
		<div class="igd-operation-grid">
			<article><b>01</b><p>Support files List, Files get, Files getAll, Files Download, File Create, Files Search, File Permissions, Metadata of the file, etc.</p></article>
			<article><b>02</b><p>Support all files operations on Google docs such as .doc, .pdf, .jpeg and etc.</p></article>
			<article><b>03</b><p>Support all files operations on non-Google Doc files such as .csv, .txt, etc.</p></article>
			<article><b>04</b><p>Support both Team Drive and Shared Drive file operations.</p></article>
			<article><b>05</b><p>Create new files and update existing files.</p></article>
			<article><b>06</b><p>Update or fetch the details of file revisions.</p></article>
			<article><b>07</b><p>Get comments and replies on comments.</p></article>
			<article><b>08</b><p>Easy to access the shared with me files.</p></article>
			<article><b>09</b><p>Support Download multiple files at a time.</p></article>
			<article><b>10</b><p>Get user permissions on files.</p></article>
		</div>
		<div class="igd-technical-copy"><p>You can use a Google Drive object as a source and a target in synchronization tasks, mapping tasks, and mappings. When you run a task or mapping, the Secure Agent uses the JAVA client libraries of the Google APIs to integrate with Google Drive.</p><p>Google Drive Connector can be used to upload, download and fetching the list of files. It can also be used to create new file, update existing files or get the comments on files, replies on comments, permissions of user over files. It can be used to fetch and update the details of revisions.</p></div>
	</div></section>

	<section class="igd-ai"><div class="igd-shell igd-ai-card">
		<div><span class="igd-label">Intelligent by design</span><h2>Agentic AI + No-Code Integration in Action</h2></div>
		<p>With built-in Agentic AI, the connector intelligently adapts to data workflows and simplifies decision-making with smart metadata extraction, usage tracking, and automated configurations. Its No-Code design ensures business users and non-technical teams can fully utilize the connector without engineering dependencies.</p>
	</div></section>

	<footer class="infometry-custom-footer" id="infometry-footer" aria-label="Infometry website footer">
		<div class="infometry-shell">
			<div class="infometry-footer-grid">
				<div class="infometry-footer-connect">
					<h2>Connect with us</h2>
					<a class="infometry-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/infometry-logo-white.png' ); ?>" alt="Infometry Inc. — Enabling AI for Every Enterprise"></a>
					<p>Turning enterprise data into trusted insights, intelligent decisions and measurable business outcomes.</p>
					<div class="infometry-footer-social" aria-label="Infometry social profiles">
						<a href="https://www.facebook.com/infometryinc/" target="_blank" rel="noopener" aria-label="Infometry on Facebook"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-facebook.png' ); ?>" alt=""></a>
						<a href="https://x.com/Infometryinc" target="_blank" rel="noopener" aria-label="Infometry on X"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-x.png' ); ?>" alt=""></a>
						<a href="https://www.linkedin.com/company/infometry-inc" target="_blank" rel="noopener" aria-label="Infometry on LinkedIn"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-linkedin.png' ); ?>" alt=""></a>
						<a href="https://www.youtube.com/channel/UCYYc9Fa7iPiVLDEiSvG7DmQ" target="_blank" rel="noopener" aria-label="Infometry on YouTube"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-youtube.png' ); ?>" alt=""></a>
						<a href="https://in.pinterest.com/infometryincus/_saved/" target="_blank" rel="noopener" aria-label="Infometry on Pinterest"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-pinterest.png' ); ?>" alt=""></a>
						<a href="https://www.instagram.com/infometry_inc/" target="_blank" rel="noopener" aria-label="Infometry on Instagram"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-instagram.png' ); ?>" alt=""></a>
						<a href="https://www.g2.com/sellers/infometry-inc#profiles" target="_blank" rel="noopener" aria-label="Infometry on G2"><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/social-g2.png' ); ?>" alt=""></a>
					</div>
					<a class="infometry-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span aria-hidden="true">→</span></a>
				</div>
				<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( $conversa_url ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( $connectors_url ); ?>">Google (GCP) Connectors For Informatica IDMC</a><a href="<?php echo esc_url( home_url( '/product/global-cloud-connector/' ) ); ?>">Global Connectors For Informatica IDMC</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( $accelerators_url ); ?>">Accelerators</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( $customers_url ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
			</div>
			<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
		</div>
	</footer>
</main>
<?php get_footer(); ?>
