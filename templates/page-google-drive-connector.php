<?php
/**
 * Template Name: Google Drive Connector Product
 * Template Post Type: page, product
 *
 * Same design system as the Google Sheets Connector page (.igs-*, styles in
 * assets/css/google-sheets-connector.css, behaviour in
 * assets/js/google-sheets-connector.js), with Google Drive content. The hero
 * plays files moving through IDMC; .is-drive switches the accents to Drive blue.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$contact_url      = home_url( '/contact-us/' );
$marketplace_url  = 'https://marketplace.informatica.com/content/informatica-marketplace/en_us/listings/cloud/connectors/infometry_google_drive_connector.html';
$guide_url        = 'https://drive.google.com/file/d/1I4CiXha4C8v5NXdwIyIIn0pg33JJ8Imi/view?usp=sharing';
$g2_url           = 'https://www.g2.com/products/google-drive-connector-for-informatica-idmc/reviews';
$sheets_url       = home_url( '/product/google-cloud-connectors/google-sheets-connector/' );
$bigtable_url     = home_url( '/product/google-cloud-connectors/google-bigtable-connector/' );
$conversa_url     = home_url( '/product/infofiscus-conversa-decision-intelligence/' );
$accelerators_url = home_url( '/product/accelerators-for-data-warehouse-migration-automation/' );
$customers_url    = home_url( '/company/customers-partners/' );
$img              = INFOMETRY_CT_URL . 'assets/images/';
$drive_icon       = $img . 'google-connectors/google-drive.png';
$sheets_icon      = $img . 'google-connectors/google-sheets.png';
$idmc_icon        = $img . 'informatica-product-mark.png';
$support_email    = 'info@www.infometry.net';
$trial_form_id    = 351429;

$igd_ops = array( 'Upload', 'Download', 'List', 'Create', 'Update', 'Search', 'Permissions' );

$igd_files = array(
	array( 'Q1_Board_Deck.pdf', 'PDF', 'Today' ),
	array( 'Vendor_Contracts.docx', 'Doc', 'Today' ),
	array( 'Orders_Export.csv', 'CSV', 'Yesterday' ),
	array( 'Product_Catalog.xlsx', 'Sheet', 'Mon' ),
	array( 'Field_Report.txt', 'Text', 'Mon' ),
);

$igd_targets = array(
	array( 'Snowflake', 'google-sheets/eco-snowflake.png' ),
	array( 'Salesforce', 'google-sheets/eco-salesforce.png' ),
	array( 'NetSuite', 'google-sheets/eco-netsuite.png' ),
	array( 'Databricks', 'google-sheets/eco-databricks.png' ),
	array( 'AWS', 'google-sheets/eco-aws.png' ),
	array( 'Azure', 'google-sheets/eco-azure.png' ),
	array( 'SQL Server', 'google-sheets/eco-sqlserver.png' ),
	array( 'Oracle', 'google-sheets/eco-oracle.png' ),
	array( 'SAP', 'google-sheets/eco-sap.png' ),
	array( 'Workday', 'google-sheets/eco-workday.png' ),
	array( 'HubSpot', 'google-sheets/eco-hubspot.png' ),
	array( 'Adaptive', 'google-sheets/eco-adaptive.png' ),
);

$igd_benefits = array(
	array( 'calendar', 'Automation & Scheduling', 'Automation and scheduling of file transfers is just a click away.' ),
	array( 'code', 'Fast, No-Code Setup', 'Fast and easy to implement from Informatica Cloud with a no-code interface.' ),
	array( 'infinity', 'Unlimited Usage', 'Unlimited usage on license, with no restrictions on the number of endpoints.' ),
	array( 'file', 'Complete File Operations', 'Supports download, upload, delete, search, permissions management and metadata.' ),
	array( 'key', 'Refresh Token & Multiple Drives', 'Integrated support for refresh tokens and multiple Drive connections.' ),
	array( 'sync', 'Synchronization & Mapping Tasks', 'Compatible with both Data Synchronization and Mapping Tasks.' ),
	array( 'nodes', 'Multiple Environments', 'Operates seamlessly across multiple environments and locations.' ),
	array( 'bolt', 'Agentic AI Intelligence', 'Agentic AI intelligence improves operational efficiency and decision-making.' ),
);

$igd_features = array(
	array( 'file', 'Files list, get, get all, download, create and search, file permissions and file metadata' ),
	array( 'file', 'All file operations on Google Docs files such as .doc, .pdf, .jpeg and more' ),
	array( 'file', 'All file operations on non-Google Docs files such as .csv, .txt and more' ),
	array( 'folder', 'Both Team Drive and Shared Drive file operations' ),
	array( 'plus', 'Create new files and update existing files' ),
	array( 'history', 'Update or fetch the details of file revisions' ),
	array( 'comment', 'Get comments and replies on comments' ),
	array( 'folder', 'Easy access to files shared with you' ),
	array( 'down', 'Download multiple files at a time' ),
	array( 'key', 'Get user permissions on files' ),
);

$igd_groups = array(
	array(
		'tone'  => 'blue',
		'icon'  => 'cloud',
		'title' => 'SaaS, CRM & ERP',
		'note'  => 'Business applications, on-premises or cloud',
		'items' => array( array( 'Salesforce', 'google-sheets/eco-salesforce.png' ), array( 'NetSuite', 'google-sheets/eco-netsuite.png' ), array( 'Workday', 'google-sheets/eco-workday.png' ), array( 'SAP', 'google-sheets/eco-sap.png' ), array( 'Adaptive', 'google-sheets/eco-adaptive.png' ), array( 'HubSpot', 'google-sheets/eco-hubspot.png' ) ),
	),
	array(
		'tone'  => 'violet',
		'icon'  => 'db',
		'title' => 'Databases & Data Platforms',
		'note'  => 'Warehouses, lakes and relational databases',
		'items' => array( array( 'Snowflake', 'google-sheets/eco-snowflake.png' ), array( 'Databricks', 'google-sheets/eco-databricks.png' ), array( 'AWS', 'google-sheets/eco-aws.png' ), array( 'Azure', 'google-sheets/eco-azure.png' ), array( 'SQL Server', 'google-sheets/eco-sqlserver.png' ), array( 'Oracle', 'google-sheets/eco-oracle.png' ) ),
	),
	array(
		'tone'  => 'orange',
		'icon'  => 'nodes',
		'title' => 'Other Applications',
		'note'  => 'Any source or target available in IDMC',
		'items' => array( array( 'Sheets', 'google-connectors/google-sheets.png' ), array( 'BigTable', 'google-connectors/google-bigtable.png' ), array( 'Pub/Sub', 'google-connectors/google-pubsub.png' ) ),
	),
);

require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';
?>
<main class="igs-page is-drive" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>

	<section class="igs-hero" aria-labelledby="igs-title">
		<div class="igs-shell igs-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i>100% Informatica Certified · IDMC (formerly IICS)</span>
				<h1 id="igs-title">Google Drive, connected to your <em>enterprise data</em></h1>
				<p>Automate secure file movement between Google Drive and Informatica IDMC with one native, no-code connector: upload, download, list, create and update files, and manage comments, permissions and revisions.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary" href="#freetrialform">Start 30-Day Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<div class="igs-ops-bar">
					<span>Operations</span>
					<ul class="igs-ops" aria-label="Supported operations">
						<?php foreach ( $igd_ops as $op ) : ?>
							<li><?php echo esc_html( $op ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="igs-proof">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><span><b>Informatica Marketplace</b><small>Certified listing</small></span><svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon is-g2"><svg><use href="#igs-star"/></svg></span><span><b>G2 Product Review</b><small>See customer feedback</small></span><svg><use href="#igs-out"/></svg></a>
				</div>
			</div>

			<div class="igs-flow" data-igs-live data-igs-fx-verb="Upload" aria-label="Animated example: files in Google Drive move through the Infometry connector in Informatica IDMC to enterprise sources and targets such as Snowflake, Salesforce and NetSuite">
				<svg class="igs-flow-wires" aria-hidden="true" focusable="false"></svg>
				<div class="igs-sheet is-drive" data-igs-sheet>
					<header>
						<span class="igs-sheet-icon"><svg><use href="#igs-folder"/></svg></span>
						<span class="igs-sheet-name"><b>Finance Shared Drive</b><small>Google Drive · Shared drive</small></span>
						<span class="igs-sheet-live"><i></i>Live sync</span>
					</header>
					<div class="igs-sheet-fx"><b><svg><use href="#igs-sync"/></svg></b><span data-igs-fx>Watching folder · 5 files</span></div>
					<div class="igs-sheet-grid">
						<span class="igs-sheet-select" data-igs-select aria-hidden="true"></span>
						<table>
							<thead>
								<tr><th></th><th>Name</th><th>Type</th><th>Modified</th></tr>
							</thead>
							<tbody>
								<?php foreach ( $igd_files as $file ) : ?>
									<tr data-igs-row><td><svg class="igs-file-ic"><use href="#igs-file"/></svg></td><td><?php echo esc_html( $file[0] ); ?></td><td><?php echo esc_html( $file[1] ); ?></td><td><?php echo esc_html( $file[2] ); ?><em class="igs-row-state" aria-hidden="true"></em></td></tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<footer aria-hidden="true"><span class="is-on">Shared drives</span><span>My Drive</span><span>Shared with me</span><i>+</i></footer>
				</div>
				<div class="igs-core" data-igs-core>
					<span class="igs-core-icon"><svg><use href="#igs-bolt"/></svg></span>
					<strong>Infometry Connector</strong>
					<small>Informatica IDMC</small>
					<span class="igs-core-modes"><b>OAuth 2.0</b><b>Secure Agent</b></span>
				</div>
				<div class="igs-eco" data-igs-eco>
					<header><b>Sources &amp; targets</b><small>Any IDMC connection</small></header>
					<ul>
						<?php foreach ( $igd_targets as $target ) : ?>
							<li data-igs-target data-name="<?php echo esc_attr( $target[0] ); ?>">
								<span><?php infometry_ct_igs_img( $img . $target[1], '' ); ?></span>
								<small><?php echo esc_html( $target[0] ); ?></small>
							</li>
						<?php endforeach; ?>
					</ul>
					<footer>+ SaaS, databases &amp; every IDMC connection</footer>
				</div>
				<div class="igs-toast" data-igs-toast>
					<span><svg><use href="#igs-check"/></svg></span>
					<div><b>File transfer completed</b><small>Synced · Scheduled daily 6:00 AM</small></div>
				</div>
			</div>
		</div>
	</section>

	<section class="igs-section igs-overview" aria-labelledby="igs-overview-title">
		<div class="igs-shell igs-ov">
			<div class="igs-ov-copy" data-igs-reveal>
				<span class="igs-kicker">Overview</span>
				<h2 id="igs-overview-title">Infometry’s Google Drive Connector <em>for Informatica</em></h2>
				<p>Infometry’s Google Drive Connector for Informatica IDMC is <strong>100% Informatica Certified</strong>, offering seamless native, no-code connectivity between Google Drive and various external sources, without writing a single line of code.</p>
				<ul class="igs-ov-sets" aria-label="Built-in capabilities">
					<?php foreach ( array( 'Upload & download', 'List, create & update', 'Comments & replies', 'User permissions', 'File revisions', 'Agentic AI integration' ) as $set ) : ?>
						<li><?php echo esc_html( $set ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="igs-ov-points">
					<div><span><svg><use href="#igs-code"/></svg></span><b>Native, no-code connectivity</b><p>Upload, download, list, create, update and manage file content effortlessly.</p></div>
					<div><span><svg><use href="#igs-bolt"/></svg></span><b>Agentic AI-powered</b><p>Intelligent and efficient integration and data management.</p></div>
				</div>
			</div>

			<div class="igs-ov-visual" aria-hidden="true" data-igs-reveal>
				<svg class="igs-ov-wires" viewBox="0 0 500 400" preserveAspectRatio="none" focusable="false">
					<path id="igs-ov-p0" class="is-in" d="M196 200 H222"/>
					<path id="igs-ov-p1" d="M278 200 C305 200 300 84 330 84"/>
					<path id="igs-ov-p2" d="M278 200 H330"/>
					<path id="igs-ov-p3" d="M278 200 C305 200 300 316 330 316"/>
					<circle class="igs-ov-dot is-in" r="3.5"><animateMotion dur="1.4s" repeatCount="indefinite"><mpath href="#igs-ov-p0"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin="0s"><mpath href="#igs-ov-p1"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin=".6s"><mpath href="#igs-ov-p2"/></animateMotion></circle>
					<circle class="igs-ov-dot" r="3.5"><animateMotion dur="1.8s" repeatCount="indefinite" begin="1.2s"><mpath href="#igs-ov-p3"/></animateMotion></circle>
				</svg>

				<span class="igs-ov-label is-left">Your Drive files</span>
				<span class="igs-ov-label is-right">Your enterprise</span>

				<div class="igs-ov-deck">
					<div class="igs-ov-sheet is-back2"><header><?php infometry_ct_igs_img( $drive_icon, '' ); ?><b>Field_Report.txt</b></header></div>
					<div class="igs-ov-sheet is-back1"><header><?php infometry_ct_igs_img( $drive_icon, '' ); ?><b>Orders_Export.csv</b></header></div>
					<div class="igs-ov-sheet is-front">
						<header><?php infometry_ct_igs_img( $drive_icon, '' ); ?><b>Q1_Board_Deck.pdf</b></header>
						<div class="igs-ov-rows"><i></i><i></i><i></i><i></i></div>
						<svg class="igs-ov-spark" viewBox="0 0 100 30" preserveAspectRatio="none" focusable="false"><path d="M0 24 18 20 34 22 50 12 66 15 82 6 100 8"/></svg>
					</div>
				</div>

				<div class="igs-ov-core">
					<span class="igs-ov-orbit"></span>
					<span class="igs-ov-orb"><svg><use href="#igs-bolt"/></svg></span>
					<small>Infometry<br>Connector</small>
				</div>

				<ul class="igs-ov-dest">
					<li><span><svg><use href="#igs-cloud"/></svg></span><b>SaaS Applications</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-salesforce.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-hubspot.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-workday.png', '' ); ?></i></li>
					<li><span><svg><use href="#igs-db"/></svg></span><b>Databases</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-snowflake.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-sqlserver.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-oracle.png', '' ); ?></i></li>
					<li><span><svg><use href="#igs-layers"/></svg></span><b>CRM / ERP</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-netsuite.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-sap.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-adaptive.png', '' ); ?></i></li>
				</ul>
			</div>
		</div>
	</section>

	<section class="igs-section igs-capabilities" aria-labelledby="igs-cap-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Key benefits</span>
				<h2 id="igs-cap-title">Key benefits of the Informatica Google Drive Connector</h2>
				<p>Secure, automated file movement between Google Drive and your enterprise systems.</p>
			</div>
			<div class="igs-feature-grid">
				<?php foreach ( $igd_benefits as $i => $benefit ) : ?>
					<article class="igs-feature is-c<?php echo (int) $i % 4; ?>" data-igs-reveal>
						<span><svg><use href="#igs-<?php echo esc_attr( $benefit[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $benefit[1] ); ?></h3>
						<p><?php echo esc_html( $benefit[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="igs-section igs-steps-section" aria-labelledby="igs-steps-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="igs-steps-title">From marketplace to a production-ready IDMC workflow</h2>
				<p>How to use our connector, in three simple steps.</p>
			</div>
			<ol class="igs-steps" data-igs-steps>
				<li class="is-s1">
					<div class="igs-step-head"><b>01</b><span>Enable</span></div>
					<div class="igs-step-ui" aria-hidden="true">
						<div class="igs-ui-bar"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?><span>IDMC · Add-on connectors</span></div>
						<div class="igs-ui-row is-muted"><i></i><span>Salesforce Connector</span><em class="igs-ui-switch is-on"></em></div>
						<div class="igs-ui-row is-main"><?php infometry_ct_igs_img( $drive_icon, '' ); ?><span>Google Drive Connector<small>by Infometry</small></span><em class="igs-ui-switch is-flip"></em></div>
						<div class="igs-ui-row is-muted"><i></i><span>Workday Connector</span><em class="igs-ui-switch"></em></div>
					</div>
					<h3>Enable it directly from IDMC</h3>
					<p>Enable it from IDMC (formerly IICS) and contact us to activate your license. You can also contact Informatica directly to activate a trial license on the IDMC platform.</p>
				</li>
				<li class="is-s2">
					<div class="igs-step-head"><b>02</b><span>Request</span></div>
					<div class="igs-step-ui" aria-hidden="true">
						<div class="igs-ui-search"><svg><use href="#igs-out"/></svg><span class="igs-ui-type">Google Drive</span></div>
						<div class="igs-ui-result"><?php infometry_ct_igs_img( $drive_icon, '' ); ?><span>Google Drive Connector<small>Infometry · Certified</small></span></div>
						<span class="igs-ui-cta">Start Free Trial</span>
					</div>
					<h3>Find &amp; request a trial</h3>
					<p>Visit the <a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener">Informatica Marketplace</a>, search Infometry’s Google Drive Connector and click Start Free Trial to submit your request.</p>
				</li>
				<li class="is-s3">
					<div class="igs-step-head"><b>03</b><span>Activate</span></div>
					<div class="igs-step-ui" aria-hidden="true">
						<div class="igs-ui-license"><span><svg><use href="#igs-key"/></svg></span><div><b>License · Trial</b><small>Trial or full subscription</small></div><em>Active</em></div>
						<div class="igs-ui-meter"><span><i></i></span><small><b>30 days</b> trial license</small></div>
					</div>
					<h3>Activate your license</h3>
					<p>Two licensing models: a 30-day trial license and a full subscription. For paid or subscription licenses, reach out to us for fast provisioning.</p>
				</li>
			</ol>
		</div>
	</section>

	<section class="igs-section igs-connect" aria-labelledby="igs-connect-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Connectivity</span>
				<h2 id="igs-connect-title">Google Drive to and from a variety of external sources</h2>
				<p>Move files between Google Drive and SaaS applications, databases, CRM and ERP systems, and other apps through Informatica IDMC.</p>
			</div>
			<div class="igs-pipe" data-igs-pipe data-igs-reveal>
				<svg class="igs-pipe-svg" aria-hidden="true" focusable="false"></svg>
				<div class="igs-pipe-dots" aria-hidden="true"></div>

				<div class="igs-pipe-source" data-igs-pipe-source>
					<span class="igs-pipe-logo"><?php infometry_ct_igs_img( $drive_icon, '' ); ?></span>
					<b>Google Drive</b>
					<small>Source &amp; target</small>
					<ul aria-label="Supported operations">
						<?php foreach ( $igd_ops as $op ) : ?>
							<li><?php echo esc_html( $op ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="igs-pipe-hub" data-igs-pipe-hub>
					<span class="igs-pipe-ring" aria-hidden="true"></span>
					<span class="igs-pipe-logo is-hub"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
					<b>Informatica IDMC</b>
					<small>Infometry Google Drive Connector</small>
					<span class="igs-pipe-modes"><em>Sync tasks</em><em>Mapping tasks</em></span>
				</div>

				<div class="igs-pipe-targets">
					<?php foreach ( $igd_groups as $group ) : ?>
						<article class="igs-pipe-group is-<?php echo esc_attr( $group['tone'] ); ?>" data-igs-pipe-group>
							<header>
								<span><svg><use href="#igs-<?php echo esc_attr( $group['icon'] ); ?>"/></svg></span>
								<div><h3><?php echo esc_html( $group['title'] ); ?></h3><small><?php echo esc_html( $group['note'] ); ?></small></div>
							</header>
							<ul>
								<?php foreach ( $group['items'] as $item ) : ?>
									<li><?php infometry_ct_igs_img( $img . $item[1], '' ); ?><small><?php echo esc_html( $item[0] ); ?></small></li>
								<?php endforeach; ?>
							</ul>
						</article>
					<?php endforeach; ?>
				</div>

				<div class="igs-pipe-foot">
					<span class="igs-pipe-foot-label"><svg><use href="#igs-check"/></svg>Works across</span>
					<ul>
						<?php
						$igd_pipe_tags = array( array( 'folder', 'Team Drive' ), array( 'folder', 'Shared Drive' ), array( 'file', 'Google Docs files' ), array( 'file', '.csv, .txt & more' ), array( 'shield', 'OAuth 2.0' ), array( 'nodes', 'Multiple environments' ) );
						foreach ( $igd_pipe_tags as $tag ) :
							?>
							<li><svg><use href="#igs-<?php echo esc_attr( $tag[0] ); ?>"/></svg><?php echo esc_html( $tag[1] ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="igs-section igs-uses" aria-labelledby="igs-uses-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Complete file lifecycle</span>
				<h2 id="igs-uses-title">Features of Infometry’s Google Drive Connector</h2>
				<p>Integrate Google Drive with Informatica’s IDMC platform through a no-code, Agentic AI-powered approach.</p>
			</div>
			<ol class="igs-fl-grid">
				<?php foreach ( $igd_features as $i => $feature ) : ?>
					<li data-igs-reveal><b><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></b><span><svg><use href="#igs-<?php echo esc_attr( $feature[0] ); ?>"/></svg></span><p><?php echo esc_html( $feature[1] ); ?></p></li>
				<?php endforeach; ?>
			</ol>
			<div class="igs-fl-tech" data-igs-reveal>
				<div><span><svg><use href="#igs-code"/></svg></span><p>You can use a Google Drive object as a <b>source and a target</b> in synchronization tasks, mapping tasks and mappings. When you run a task or mapping, the Secure Agent uses the <b>Java client libraries of the Google APIs</b> to integrate with Google Drive.</p></div>
				<div><span><svg><use href="#igs-file"/></svg></span><p>Upload, download and fetch the list of files, create new files, update existing files, get comments on files and replies on comments, check user permissions over files, and fetch and update revision details.</p></div>
			</div>
			<div class="igs-uses-note" data-igs-reveal>
				<span aria-hidden="true"><svg><use href="#igs-star"/></svg></span>
				<p>With built-in <b>Agentic AI</b>, the connector intelligently adapts to data workflows with smart metadata extraction, usage tracking and automated configurations. Its <b>no-code design</b> lets business users and non-technical teams use it fully, without engineering dependencies.</p>
			</div>
		</div>
	</section>

	<section class="igs-section igs-license" aria-labelledby="igs-license-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Licensing</span>
				<h2 id="igs-license-title">Try it free, then subscribe</h2>
				<p>Two licensing models: a 30-day trial license and a full subscription.</p>
			</div>
			<div class="igs-license-grid">
				<article class="igs-plan" data-igs-reveal>
					<header><span><svg><use href="#igs-calendar"/></svg></span><h3>30-Day Trial</h3></header>
					<ul>
						<li><svg><use href="#igs-check"/></svg>Request it from the Informatica Marketplace with Start Free Trial</li>
						<li><svg><use href="#igs-check"/></svg>Or enable it from IDMC and contact us to activate</li>
						<li><svg><use href="#igs-check"/></svg>Informatica can also activate the trial on the IDMC platform</li>
					</ul>
					<a class="igs-btn igs-btn-outline" href="#freetrialform">Start Free Trial <svg><use href="#igs-arrow"/></svg></a>
				</article>
				<article class="igs-plan is-dark" data-igs-reveal>
					<header><span><svg><use href="#igs-layers"/></svg></span><h3>Full Subscription</h3></header>
					<ul>
						<li><svg><use href="#igs-check"/></svg>Fast provisioning for paid and subscription licenses</li>
						<li><svg><use href="#igs-check"/></svg>Unlimited usage on license, with no endpoint restrictions</li>
						<li><svg><use href="#igs-check"/></svg>Works with Data Synchronization and Mapping Tasks</li>
						<li><svg><use href="#igs-check"/></svg>Runs across multiple environments and locations</li>
					</ul>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Talk to Sales <svg><use href="#igs-arrow"/></svg></a>
				</article>
			</div>
		</div>
	</section>

	<section class="igs-section igs-related" aria-labelledby="igs-related-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Explore more</span>
				<h2 id="igs-related-title">Explore related products</h2>
			</div>
			<div class="igs-related-grid">
				<a class="igs-related-card" href="<?php echo esc_url( $sheets_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $sheets_icon, '' ); ?></span>
					<div><h3>Google Sheets Connector</h3><p>Read from and write to Google Sheets as a source or target in synchronization tasks, mapping tasks and data integrations.</p><em>Explore <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
				<a class="igs-related-card" href="<?php echo esc_url( $bigtable_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $img . 'google-connectors/google-bigtable.png', '' ); ?></span>
					<div><h3>Google BigTable Connector</h3><p>Connect Google Cloud Bigtable with Informatica IDMC for enterprise data integration.</p><em>Explore <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
			</div>
		</div>
	</section>

	<section class="igs-cta" id="freetrialform" aria-labelledby="igs-cta-title">
		<div class="igs-shell igs-cta-grid">
			<div class="igs-cta-copy">
				<span class="igs-kicker">Free trial</span>
				<h2 id="igs-cta-title">Connect Google Drive to your enterprise data</h2>
				<p>Start your 30-day evaluation and automate secure file movement between Google Drive and Informatica IDMC.</p>
				<ul class="igs-cta-checks">
					<li><svg><use href="#igs-check"/></svg>100% Informatica Certified</li>
					<li><svg><use href="#igs-check"/></svg>No-code setup</li>
					<li><svg><use href="#igs-check"/></svg>OAuth 2.0 &amp; Secure Agent</li>
					<li><svg><use href="#igs-check"/></svg>No data stored</li>
				</ul>
				<div class="igs-cta-next">
					<b>What happens next</b>
					<ol>
						<li><span>1</span><p><strong>Submit your request</strong>Takes under a minute.</p></li>
						<li><span>2</span><p><strong>We activate your trial</strong>A 30-day trial license for IDMC.</p></li>
						<li><span>3</span><p><strong>Start moving files</strong>Use Google Drive in your tasks and mappings.</p></li>
					</ol>
				</div>
			</div>
			<div class="igs-form">
				<h3>Request Free Trial</h3>
				<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
					<?php echo do_shortcode( sprintf( '[wpforms id="%d" title="false" description="false"]', absint( $trial_form_id ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<p>The request form is temporarily unavailable. Email us at <a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>.</p>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				<?php endif; ?>
			</div>
		</div>
	</section>

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
					<a class="infometry-footer-contact" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <span aria-hidden="true">→</span></a>
				</div>
				<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( $conversa_url ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/informatica-connectors/' ) ); ?>">Informatica Connectors</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( $accelerators_url ); ?>">Accelerators</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( $customers_url ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
			</div>
			<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
		</div>
	</footer>
</main>
<?php get_footer(); ?>
