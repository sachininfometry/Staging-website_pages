<?php
/**
 * Template Name: Google Drive Connector Product
 * Template Post Type: page, product
 *
 * Built around a file's journey: a Drive window whose files move through an
 * IDMC transfer queue, a file inspector (details, permissions, revisions,
 * comments), a hub diagram, grouped features and Drive use cases. Shares the
 * connector base (buttons, heads, form, footer) from google-sheets-connector.css;
 * its own layout lives in google-drive-connector.css (.gdc-*) and the
 * animations in google-drive-connector.js.
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
$idmc_icon        = $img . 'informatica-product-mark.png';
$support_email    = 'info@infometry.net';
$trial_form_id    = 351429;

// Hero: files in the shared drive and the transfer jobs that move them (file index, operation, label, target).
$gdc_files = array(
	array( 'Orders_Export.csv', 'csv', 'CSV' ),
	array( 'Q1_Board_Deck.pdf', 'pdf', 'PDF' ),
	array( 'Vendor_Contracts', 'doc', 'Docs' ),
	array( 'Field_Photos.jpeg', 'img', 'JPEG' ),
	array( 'Release_Notes.txt', 'txt', 'TXT' ),
	array( 'Pricing_2027', 'doc', 'Docs' ),
);
$gdc_jobs = array(
	array( 0, 'up', 'Upload', 'Snowflake' ),
	array( 1, 'down', 'Download', 'Data Lake' ),
	array( 2, 'edit', 'Update', 'Salesforce' ),
	array( 5, 'lock', 'Get permissions', 'IDMC' ),
);

$gdc_benefits = array(
	array( 'code', 'Fast, no-code setup', 'Fast and easy to implement from Informatica Cloud with a no-code interface.' ),
	array( 'key', 'Refresh token & multiple drives', 'Integrated support for refresh tokens and multiple Drive connections.' ),
	array( 'sync', 'Sync & mapping tasks', 'Compatible with both Data Synchronization and Mapping Tasks.' ),
	array( 'nodes', 'Multiple environments', 'Operates seamlessly across multiple environments and locations.' ),
	array( 'bolt', 'Agentic AI intelligence', 'Improves operational efficiency and decision-making.' ),
);

$gdc_steps = array(
	array( 'Enable it from IDMC', 'Enable it directly from IDMC (formerly IICS) and contact us to activate your license.' ),
	array( 'Request from the Marketplace', 'Visit the Informatica Marketplace, search Infometry’s Google Drive Connector, and click Start Free Trial to submit your request.' ),
	array( 'Choose your license', 'Two licensing models: a 30-day trial license and a full subscription.' ),
	array( 'Fast provisioning', 'For paid or subscription licenses, reach out to us for fast provisioning.' ),
	array( 'Or activate through Informatica', 'Users can also contact Informatica directly to activate their trial license on the IDMC platform.' ),
);

$gdc_feature_groups = array(
	array( 'file', 'is-blue', 'File operations', array( 'Files list, get, get all, download, create and search', 'Create new files and update existing files', 'Download multiple files at a time' ), array( 'files.list', 'files.get', 'files.create', 'files.update' ) ),
	array( 'layers', 'is-yellow', 'Every file type', array( 'All file operations on Google Docs files', 'All file operations on non-Google Docs files' ), array( '.doc', '.pdf', '.jpeg', '.csv', '.txt' ) ),
	array( 'folder', 'is-green', 'Every drive', array( 'Both Team Drive and Shared Drive file operations', 'Easy access to files shared with you' ), array( 'My Drive', 'Shared drives', 'Team Drive', 'Shared with me' ) ),
	array( 'comment', 'is-violet', 'Collaboration & governance', array( 'Get comments and replies on comments', 'Update or fetch the details of file revisions', 'Get user permissions and file metadata' ), array( 'comments', 'replies', 'revisions', 'permissions' ) ),
);

$gdc_uses = array(
	array( 'Uploading Google Drive files into enterprise databases', array( array( 'drive', 'Drive files' ), array( 'idmc', 'IDMC' ), array( 'db', 'Enterprise database' ) ) ),
	array( 'Commenting on specific files and replying directly through workflows', array( array( 'sync', 'Workflow' ), array( 'comment', 'Comment' ), array( 'chat', 'Reply' ) ) ),
	array( 'Creating and updating documents directly from Informatica', array( array( 'idmc', 'Informatica' ), array( 'plus', 'Create' ), array( 'file', 'Update document' ) ) ),
	array( 'Performing automated, no-code ETL operations across cloud and on-premise environments', array( array( 'cloud', 'Cloud' ), array( 'code', 'No-code ETL' ), array( 'db', 'On-premise' ) ) ),
	array( 'Using Agentic AI insights to optimize file operations, access control and collaboration', array( array( 'bolt', 'Agentic AI' ), array( 'key', 'Access control' ), array( 'nodes', 'Collaboration' ) ) ),
);

$gdc_videos = array(
	array( 'sQVcqMs8u60', 'How to upload a file in Google Drive using Infometry’s Google Drive Connector', 'up', 'Upload' ),
	array( 'hfV30oVpQkM', 'How to get files from Google Drive using Infometry’s connector', 'down', 'Get files' ),
);

$gdc_faqs = array(
	array( 'What are the types of licenses you offer?', 'We have two licensing models: Prod and Non-Prod. The Infometry connector annual subscription license is charged for a given OrgID, and customers get unlimited usage of the connectors within an OrgID.' ),
	array( 'How are updates on new features released to customers?', 'The Infometry Connector team continues to add new features and support newer API releases for each product. Release cycles are synced with the Informatica Cloud platform, and customers get the updates automatically along with IICS release updates. All new releases are auto-updated at the customer end and are free of charge.' ),
	array( 'Whom do I contact for implementation and license?', 'You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>.' ),
	array( 'Is Infometry’s Google Drive Connector certified by Informatica?', 'Yes. All our connectors are 100% certified by Informatica and listed on the <a href="' . $marketplace_url . '" target="_blank" rel="noopener">Informatica Marketplace</a>.' ),
	array( 'How does your customer support work?', 'Our support is available 24/7, and we provide local time-zone support to all our customers globally.' ),
	array( 'How does Infometry charge for the connector?', 'All our connectors are charged based on the number of Prod and Non-Prod licenses subscribed by the customer, completely independent of the number or size of the data and rows processed.' ),
	array( 'How soon can business users onboard and start using the connector?', 'In most cases, it is immediate.' ),
	array( 'What is the validity of the Infometry Connector license?', 'All our licenses are charged annually and are valid for 1 year.' ),
	array( 'How does Infometry offer technical support?', 'It’s available 24/7 with a turnaround time of 24–48 hours. You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>.' ),
	array( 'How secure is my data?', 'All our connectors and their updates are verified by Informatica before reaching the customer. Our connectors are activated by Informatica and work in your IICS environment. Connectors do not hold any data, and the connector ensures highly secured data transfers.' ),
);

$gdc_faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array_map(
		function ( $faq ) {
			return array(
				'@type'          => 'Question',
				'name'           => $faq[0],
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => wp_strip_all_tags( $faq[1] ) ),
			);
		},
		$gdc_faqs
	),
);
$gdc_link_tags = array( 'a' => array( 'href' => array(), 'target' => array(), 'rel' => array() ) );

require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

/** Small icon for a use-case step: the Drive or IDMC logo, otherwise a sprite icon. */
$gdc_step_icon = function ( $key ) use ( $drive_icon, $idmc_icon ) {
	if ( 'drive' === $key ) {
		infometry_ct_igs_img( $drive_icon, '' );
	} elseif ( 'idmc' === $key ) {
		infometry_ct_igs_img( $idmc_icon, '' );
	} else {
		printf( '<svg><use href="#igs-%s"/></svg>', esc_attr( $key ) );
	}
};
?>
<main class="igs-page gdc-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<svg class="igs-sprite" aria-hidden="true" focusable="false">
		<symbol id="gdc-up" viewBox="0 0 24 24"><path d="M12 19V6M6.5 11.5 12 6l5.5 5.5M5 3h14"/></symbol>
		<symbol id="gdc-down" viewBox="0 0 24 24"><path d="M12 5v13M6.5 12.5 12 18l5.5-5.5M5 21h14"/></symbol>
		<symbol id="gdc-edit" viewBox="0 0 24 24"><path d="M4 20h4L19 9l-4-4L4 16v4Z"/><path d="m13.5 6.5 4 4"/></symbol>
		<symbol id="gdc-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
		<symbol id="gdc-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></symbol>
		<symbol id="gdc-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></symbol>
		<symbol id="gdc-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="gdc-star" viewBox="0 0 24 24"><path d="m12 3 2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9L12 3Z"/></symbol>
	</svg>

	<!-- Hero: a Drive window whose files run through an IDMC transfer queue -->
	<section class="igs-hero gdc-hero" aria-labelledby="gdc-title">
		<div class="igs-shell gdc-hero-grid">
			<div class="gdc-hero-copy">
				<span class="gdc-badge"><?php infometry_ct_igs_img( $drive_icon, '' ); ?>Google Drive Connector · 100% Informatica Certified</span>
				<h1 id="gdc-title">Every Google Drive file, moving through <em>Informatica IDMC</em></h1>
				<p>Upload, download, list, create and update files, and bring comments, permissions and revisions along, with one native, no-code connector for IDMC.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary gdc-btn-drive" href="#freetrialform">Start 30-Day Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<ul class="gdc-hero-drives" aria-label="Works with">
					<li><svg><use href="#igs-folder"/></svg>My Drive</li>
					<li><svg><use href="#gdc-users"/></svg>Shared drives</li>
					<li><svg><use href="#igs-folder"/></svg>Team Drive</li>
					<li><svg><use href="#gdc-users"/></svg>Shared with me</li>
				</ul>
				<p class="gdc-hero-links">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?>Informatica Marketplace<svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><svg class="is-star"><use href="#gdc-star"/></svg>G2 Product Review<svg><use href="#igs-out"/></svg></a>
				</p>
			</div>

			<div class="gdc-stage" data-gdc-stage aria-label="Animated example: files in a Google shared drive are uploaded, downloaded, updated and read for permissions through the Infometry connector in Informatica IDMC">
				<div class="gdc-window" aria-hidden="true">
					<div class="gdc-win-top">
						<span class="gdc-win-logo"><?php infometry_ct_igs_img( $drive_icon, '' ); ?><b>Drive</b></span>
						<span class="gdc-win-search"><svg><use href="#gdc-search"/></svg>Search in Drive</span>
						<span class="gdc-win-avatar">EC</span>
					</div>
					<div class="gdc-win-body">
						<ul class="gdc-win-side">
							<li><svg><use href="#igs-folder"/></svg>My Drive</li>
							<li class="is-on"><svg><use href="#gdc-users"/></svg>Shared drives</li>
							<li><svg><use href="#gdc-users"/></svg>Shared with me</li>
							<li><svg><use href="#gdc-clock"/></svg>Recent</li>
							<li><svg><use href="#gdc-star"/></svg>Starred</li>
						</ul>
						<div class="gdc-win-main">
							<p class="gdc-win-path">Shared drives <i>›</i> <b>Finance</b></p>
							<ul class="gdc-files">
								<?php foreach ( $gdc_files as $i => $file ) : ?>
									<li class="is-<?php echo esc_attr( $file[1] ); ?>" data-gdc-file="<?php echo (int) $i; ?>">
										<span class="gdc-file-thumb"><em><?php echo esc_html( $file[2] ); ?></em></span>
										<span class="gdc-file-name"><i></i><?php echo esc_html( $file[0] ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>

				<div class="gdc-queue">
					<header>
						<span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
						<div><b>Transfer queue</b><small>Informatica IDMC · Secure Agent</small></div>
						<em data-gdc-count><?php echo count( $gdc_jobs ); ?> of <?php echo count( $gdc_jobs ); ?> done</em>
					</header>
					<ol>
						<?php foreach ( $gdc_jobs as $job ) : ?>
							<li class="is-<?php echo esc_attr( $job[1] ); ?>" data-gdc-job="<?php echo (int) $job[0]; ?>">
								<span class="gdc-job-ic"><svg><use href="#gdc-<?php echo esc_attr( $job[1] ); ?>"/></svg></span>
								<div class="gdc-job-text">
									<b><?php echo esc_html( $job[2] ); ?> <span><?php echo esc_html( $gdc_files[ $job[0] ][0] ); ?></span></b>
									<small>→ <?php echo esc_html( $job[3] ); ?></small>
									<i class="gdc-job-bar"><i></i></i>
								</div>
								<span class="gdc-job-state"><svg><use href="#igs-check"/></svg></span>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>

				<span class="gdc-chip is-auth" aria-hidden="true"><svg><use href="#gdc-lock"/></svg>OAuth 2.0 · Refresh token</span>
				<span class="gdc-chip is-store" aria-hidden="true"><svg><use href="#igs-shield"/></svg>No data stored</span>
			</div>
		</div>
	</section>

	<!-- The whole file: what the connector reads besides content -->
	<section class="igs-section gdc-inspect" aria-labelledby="gdc-inspect-title">
		<div class="igs-shell gdc-inspect-grid">
			<div class="gdc-inspect-copy" data-igs-reveal>
				<span class="igs-kicker">More than file transfer</span>
				<h2 id="gdc-inspect-title">The whole file, not just its contents</h2>
				<p>Infometry’s Google Drive Connector for Informatica IDMC is <strong>100% Informatica Certified</strong>, offering seamless native, no-code connectivity between Google Drive and various external sources. It enables users to upload, download, list, create, update and manage file content effortlessly, without writing a single line of code.</p>
				<p>It also retrieves <strong>comments, replies and user permissions</strong>, and tracks <strong>file revisions</strong>, for intelligent, Agentic AI-powered integration and data management.</p>
				<ul class="gdc-inspect-keys">
					<li><svg><use href="#igs-file"/></svg>Metadata</li>
					<li><svg><use href="#gdc-users"/></svg>Permissions</li>
					<li><svg><use href="#igs-history"/></svg>Revisions</li>
					<li><svg><use href="#igs-comment"/></svg>Comments &amp; replies</li>
				</ul>
			</div>

			<div class="gdc-inspector" data-gdc-inspector data-igs-reveal>
				<header class="gdc-insp-head">
					<span class="gdc-insp-file"><svg><use href="#igs-file"/></svg></span>
					<div><b>Vendor_Contracts</b><small>Google Docs · Shared drives › Legal</small></div>
					<em><svg><use href="#igs-check"/></svg>Fetched by connector</em>
				</header>
				<div class="gdc-insp-tabs" role="tablist" aria-label="File details the connector can fetch">
					<button type="button" role="tab" id="gdc-tab-0" aria-controls="gdc-pane-0" aria-selected="true" data-gdc-tab="0"><svg><use href="#igs-file"/></svg>Details</button>
					<button type="button" role="tab" id="gdc-tab-1" aria-controls="gdc-pane-1" aria-selected="false" tabindex="-1" data-gdc-tab="1"><svg><use href="#gdc-users"/></svg>Permissions</button>
					<button type="button" role="tab" id="gdc-tab-2" aria-controls="gdc-pane-2" aria-selected="false" tabindex="-1" data-gdc-tab="2"><svg><use href="#igs-history"/></svg>Revisions</button>
					<button type="button" role="tab" id="gdc-tab-3" aria-controls="gdc-pane-3" aria-selected="false" tabindex="-1" data-gdc-tab="3"><svg><use href="#igs-comment"/></svg>Comments</button>
				</div>

				<div class="gdc-insp-pane" role="tabpanel" id="gdc-pane-0" aria-labelledby="gdc-tab-0" data-gdc-pane="0">
					<dl class="gdc-meta">
						<div><dt>Owner</dt><dd>Legal team</dd></div>
						<div><dt>Type</dt><dd>Google Docs</dd></div>
						<div><dt>Size</dt><dd>248 KB</dd></div>
						<div><dt>Modified</dt><dd>Today, 9:41 AM</dd></div>
						<div><dt>Location</dt><dd>Shared drives › Legal</dd></div>
						<div><dt>File ID</dt><dd><code>1aX7…k9Qz</code></dd></div>
					</dl>
					<p class="gdc-api"><span>API</span><code>files.get</code><code>files.list</code></p>
				</div>
				<div class="gdc-insp-pane" role="tabpanel" id="gdc-pane-1" aria-labelledby="gdc-tab-1" data-gdc-pane="1" hidden>
					<ul class="gdc-people">
						<li><i>EC</i><span><b>Emily Carter</b><small>Contract owner</small></span><em class="is-owner">Owner</em></li>
						<li><i class="is-b">LS</i><span><b>Liam Smith</b><small>Procurement</small></span><em>Editor</em></li>
						<li><i class="is-c">JM</i><span><b>Jessica Morgan</b><small>Risk review</small></span><em>Commenter</em></li>
						<li><i class="is-d"><svg><use href="#gdc-users"/></svg></i><span><b>Finance team</b><small>Group</small></span><em>Viewer</em></li>
					</ul>
					<p class="gdc-api"><span>API</span><code>permissions.list</code></p>
				</div>
				<div class="gdc-insp-pane" role="tabpanel" id="gdc-pane-2" aria-labelledby="gdc-tab-2" data-gdc-pane="2" hidden>
					<ol class="gdc-revs">
						<li class="is-current"><b>Version 4</b><span>Today, 9:41 AM · Emily Carter</span><em>Current</em></li>
						<li><b>Version 3</b><span>Yesterday, 4:10 PM · Liam Smith</span></li>
						<li><b>Version 2</b><span>Mon, 11:25 AM · Jessica Morgan</span></li>
						<li><b>Version 1</b><span>Mon, 9:02 AM · Emily Carter</span></li>
					</ol>
					<p class="gdc-api"><span>API</span><code>revisions.list</code><code>revisions.update</code></p>
				</div>
				<div class="gdc-insp-pane" role="tabpanel" id="gdc-pane-3" aria-labelledby="gdc-tab-3" data-gdc-pane="3" hidden>
					<div class="gdc-thread">
						<div class="gdc-msg"><i class="is-c">JM</i><p><b>Jessica Morgan</b>Clause 7.2 needs the updated renewal term before sign-off.</p></div>
						<div class="gdc-msg is-reply"><i>EC</i><p><b>Emily Carter</b>Updated in version 4. Marking this resolved.</p></div>
					</div>
					<p class="gdc-api"><span>API</span><code>comments.list</code><code>replies.list</code></p>
				</div>
			</div>
		</div>
	</section>

	<!-- Key benefits: bento -->
	<section class="igs-section gdc-benefits" aria-labelledby="gdc-benefits-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Key benefits</span>
				<h2 id="gdc-benefits-title">Key benefits of the Informatica Google Drive Connector</h2>
			</div>
			<div class="gdc-bento">
				<article class="gdc-tile is-schedule" data-igs-reveal>
					<span class="gdc-tile-ic"><svg><use href="#igs-calendar"/></svg></span>
					<h3>Automation &amp; scheduling</h3>
					<p>Automation and scheduling of file transfers is just a click away.</p>
					<div class="gdc-sched" aria-hidden="true">
						<div class="gdc-sched-days"><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span class="is-off">Sat</span><span class="is-off">Sun</span></div>
						<div class="gdc-sched-runs"><i></i><i></i><i></i><i></i><i></i><i class="is-off"></i><i class="is-off"></i></div>
						<p><svg><use href="#gdc-clock"/></svg>Runs daily at <b>6:00 AM</b> · weekdays</p>
					</div>
				</article>
				<article class="gdc-tile is-unlimited" data-igs-reveal>
					<b class="gdc-inf" aria-hidden="true">∞</b>
					<h3>Unlimited usage</h3>
					<p>Unlimited usage on license, with no restrictions on the number of endpoints.</p>
				</article>
				<article class="gdc-tile is-ops" data-igs-reveal>
					<span class="gdc-tile-ic"><svg><use href="#igs-file"/></svg></span>
					<h3>Complete file operations</h3>
					<p>Supports operations like download, upload, delete, search, managing permissions, and metadata.</p>
					<ul class="gdc-op-chips"><li><svg><use href="#gdc-down"/></svg>Download</li><li><svg><use href="#gdc-up"/></svg>Upload</li><li><svg><use href="#igs-plus"/></svg>Delete</li><li><svg><use href="#gdc-search"/></svg>Search</li><li><svg><use href="#gdc-lock"/></svg>Permissions</li><li><svg><use href="#igs-file"/></svg>Metadata</li></ul>
				</article>
				<?php foreach ( $gdc_benefits as $i => $benefit ) : ?>
					<article class="gdc-tile is-small is-t<?php echo (int) $i; ?>" data-igs-reveal>
						<span class="gdc-tile-ic"><svg><use href="#igs-<?php echo esc_attr( $benefit[0] ); ?>"/></svg></span>
						<h3><?php echo esc_html( $benefit[1] ); ?></h3>
						<p><?php echo esc_html( $benefit[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- How to use: five steps beside the hub diagram -->
	<section class="igs-section gdc-how" aria-labelledby="gdc-how-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="gdc-how-title">How to use our connector</h2>
				<p>A direct path from Marketplace activation to a production-ready IDMC workflow.</p>
			</div>
			<div class="gdc-how-grid">
				<ol class="gdc-timeline" data-igs-reveal>
					<?php foreach ( $gdc_steps as $i => $step ) : ?>
						<li>
							<b><?php echo (int) $i + 1; ?></b>
							<div>
								<h3><?php echo esc_html( $step[0] ); ?></h3>
								<p><?php echo esc_html( $step[1] ); ?></p>
								<?php if ( 2 === $i ) : ?>
									<span class="gdc-lic"><em>30-day trial</em><em>Full subscription</em></span>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>

				<div class="gdc-hub" aria-hidden="true" data-igs-reveal>
					<svg class="gdc-hub-lines" viewBox="0 0 100 100" preserveAspectRatio="none" focusable="false">
						<path class="is-in" d="M25 50 H40"/>
						<path d="M60 50 C67 50 67 15 74 15"/>
						<path d="M60 50 C67 50 67 38 74 38"/>
						<path d="M60 50 C67 50 67 62 74 62"/>
						<path d="M60 50 C67 50 67 85 74 85"/>
					</svg>
					<div class="gdc-hub-node is-drive"><?php infometry_ct_igs_img( $drive_icon, '' ); ?><b>Google Drive</b><small>Cloud files</small></div>
					<div class="gdc-hub-core"><span class="gdc-hub-ring"></span><span class="gdc-hub-logo"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Informatica IDMC</b><small>Native connector</small></div>
					<div class="gdc-hub-out is-o1"><span><svg><use href="#igs-cloud"/></svg></span><b>SaaS applications</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-salesforce.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-hubspot.png', '' ); ?></i></div>
					<div class="gdc-hub-out is-o2"><span><svg><use href="#igs-db"/></svg></span><b>Databases</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-snowflake.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-oracle.png', '' ); ?></i></div>
					<div class="gdc-hub-out is-o3"><span><svg><use href="#igs-layers"/></svg></span><b>CRM / ERP</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-netsuite.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-sap.png', '' ); ?></i></div>
					<div class="gdc-hub-out is-o4"><span><svg><use href="#igs-nodes"/></svg></span><b>Other apps</b><i><?php infometry_ct_igs_img( $img . 'google-connectors/google-sheets.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-connectors/google-bigtable.png', '' ); ?></i></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Features grouped by what they act on -->
	<section class="igs-section gdc-features" aria-labelledby="gdc-features-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Complete file lifecycle</span>
				<h2 id="gdc-features-title">Features of Infometry’s Google Drive Connector</h2>
				<p>Use the connector to integrate Google Drive with Informatica’s IDMC platform through a no-code, Agentic AI-powered approach.</p>
			</div>
			<div class="gdc-feat-grid">
				<?php foreach ( $gdc_feature_groups as $group ) : ?>
					<article class="gdc-feat <?php echo esc_attr( $group[1] ); ?>" data-igs-reveal>
						<header><span><svg><use href="#igs-<?php echo esc_attr( $group[0] ); ?>"/></svg></span><h3><?php echo esc_html( $group[2] ); ?></h3></header>
						<ul class="gdc-feat-list">
							<?php foreach ( $group[3] as $line ) : ?>
								<li><svg><use href="#igs-check"/></svg><?php echo esc_html( $line ); ?></li>
							<?php endforeach; ?>
						</ul>
						<p class="gdc-feat-tags">
							<?php foreach ( $group[4] as $tag ) : ?>
								<code><?php echo esc_html( $tag ); ?></code>
							<?php endforeach; ?>
						</p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Under the hood and Agentic AI -->
	<section class="igs-section gdc-hood" aria-labelledby="gdc-hood-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Under the hood</span>
				<h2 id="gdc-hood-title">A Google Drive object as a source and a target</h2>
				<p>Use it in synchronization tasks, mapping tasks and mappings. When you run a task or mapping, the Secure Agent uses the Java client libraries of the Google APIs to integrate with Google Drive.</p>
			</div>
			<ol class="gdc-chain" data-igs-reveal>
				<li><span><?php infometry_ct_igs_img( $drive_icon, '' ); ?></span><b>Google Drive</b><small>Files, folders, metadata</small></li>
				<li><span><svg><use href="#igs-code"/></svg></span><b>Google APIs</b><small>Java client libraries</small></li>
				<li><span><svg><use href="#igs-shield"/></svg></span><b>Secure Agent</b><small>Runs in your environment</small></li>
				<li><span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Informatica IDMC</b><small>Sync tasks · Mapping tasks · Mappings</small></li>
			</ol>
			<div class="gdc-ai" data-igs-reveal>
				<div class="gdc-ai-copy">
					<h3>Agentic AI + no-code integration in action</h3>
					<p>With built-in Agentic AI, the connector intelligently adapts to data workflows and simplifies decision-making. Its no-code design ensures business users and non-technical teams can fully use it without engineering dependencies.</p>
				</div>
				<ul>
					<li><svg><use href="#igs-file"/></svg>Smart metadata extraction</li>
					<li><svg><use href="#igs-chart"/></svg>Usage tracking</li>
					<li><svg><use href="#igs-sync"/></svg>Automated configurations</li>
				</ul>
			</div>
		</div>
	</section>

	<!-- Use cases as workflow recipes -->
	<section class="igs-section gdc-uses" aria-labelledby="gdc-uses-title">
		<div class="igs-shell gdc-uses-grid">
			<div class="gdc-uses-copy" data-igs-reveal>
				<span class="igs-kicker">Use cases</span>
				<h2 id="gdc-uses-title">Popular use cases</h2>
				<p>Five ways teams put Google Drive to work inside their Informatica workflows.</p>
			</div>
			<ol class="gdc-recipes">
				<?php foreach ( $gdc_uses as $i => $use ) : ?>
					<li data-igs-reveal>
						<b><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></b>
						<h3><?php echo esc_html( $use[0] ); ?></h3>
						<p class="gdc-recipe-flow" aria-hidden="true">
							<?php foreach ( $use[1] as $s => $step ) : ?>
								<?php if ( $s ) : ?><i></i><?php endif; ?>
								<span><?php $gdc_step_icon( $step[0] ); ?><?php echo esc_html( $step[1] ); ?></span>
							<?php endforeach; ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<!-- Tutorials -->
	<section class="igs-section gdc-videos" aria-labelledby="gdc-videos-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="gdc-videos-title">Learn about Infometry’s Google Drive Connector</h2>
			</div>
			<div class="gdc-video-grid">
				<?php foreach ( $gdc_videos as $video ) : ?>
					<a class="gdc-video is-<?php echo esc_attr( $video[2] ); ?>" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $video[0] ); ?>" target="_blank" rel="noopener" data-igs-video="<?php echo esc_attr( $video[0] ); ?>" data-igs-reveal>
						<span class="gdc-video-cover" aria-hidden="true">
							<span class="gdc-vc-tile"><?php infometry_ct_igs_img( $drive_icon, '' ); ?></span>
							<span class="gdc-vc-arrow"><svg><use href="#igs-arrow"/></svg></span>
							<span class="gdc-vc-tile"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
							<span class="gdc-vc-play"><svg><use href="#igs-play"/></svg></span>
						</span>
						<span class="gdc-video-info"><em><?php echo esc_html( $video[3] ); ?></em><b><?php echo esc_html( $video[1] ); ?></b><small>Watch tutorial <svg><use href="#igs-arrow"/></svg></small></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="igs-modal" data-igs-modal hidden>
			<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Tutorial video">
				<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
				<div class="igs-modal-frame" data-igs-frame></div>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="igs-section gdc-faq" aria-labelledby="gdc-faq-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">FAQ</span>
				<h2 id="gdc-faq-title">Frequently Asked Questions</h2>
			</div>
			<div class="gdc-faq-cols">
				<?php foreach ( array_chunk( $gdc_faqs, 5 ) as $column ) : ?>
					<div class="gdc-faq-col">
						<?php foreach ( $column as $i => $faq ) : ?>
							<details<?php echo 0 === $i ? ' open' : ''; ?>>
								<summary><?php echo esc_html( $faq[0] ); ?><span aria-hidden="true"><svg><use href="#igs-plus"/></svg></span></summary>
								<p><?php echo wp_kses( $faq[1], $gdc_link_tags ); ?></p>
							</details>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="gdc-faq-bar" data-igs-reveal>
				<span><svg><use href="#igs-chat"/></svg></span>
				<p><b>Still have questions?</b>Support is available 24/7 with local time-zone coverage · <a href="mailto:<?php echo esc_attr( $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a></p>
				<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $contact_url ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
			</div>
		</div>
		<script type="application/ld+json"><?php echo wp_json_encode( $gdc_faq_schema ); ?></script>
	</section>

	<!-- Other products -->
	<section class="igs-section igs-related gdc-related" aria-labelledby="gdc-related-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Other products</span>
				<h2 id="gdc-related-title">More Google connectors for Informatica</h2>
			</div>
			<div class="igs-related-grid">
				<a class="igs-related-card" href="<?php echo esc_url( $sheets_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $img . 'google-connectors/google-sheets.png', '' ); ?></span>
					<div><h3>Google Sheets Connector</h3><p>Built with Informatica’s native interface, it supports all API operations, including read, write, update, delete, range and search.</p><em>Read more <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
				<a class="igs-related-card" href="<?php echo esc_url( $bigtable_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $img . 'google-connectors/google-bigtable.png', '' ); ?></span>
					<div><h3>Google BigTable Connector</h3><p>Read, insert and delete data in Google Bigtable, including reading columns and inserting data.</p><em>Read more <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
			</div>
		</div>
	</section>

	<!-- Free trial -->
	<section class="igs-cta gdc-cta" id="freetrialform" aria-labelledby="gdc-cta-title">
		<div class="igs-shell igs-cta-grid">
			<div class="igs-cta-copy">
				<span class="igs-kicker">Free trial</span>
				<h2 id="gdc-cta-title">Start moving Google Drive files through IDMC</h2>
				<p>Request your 30-day trial license and automate secure file movement between Google Drive and Informatica IDMC.</p>
				<ul class="igs-cta-checks">
					<li><svg><use href="#igs-check"/></svg>100% Informatica Certified</li>
					<li><svg><use href="#igs-check"/></svg>No-code setup</li>
					<li><svg><use href="#igs-check"/></svg>Connectors hold no data</li>
					<li><svg><use href="#igs-check"/></svg>24/7 local time-zone support</li>
				</ul>
				<div class="gdc-cta-res">
					<a href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><span><svg><use href="#igs-down"/></svg></span><b>User guide</b><small>Implementation reference</small></a>
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Marketplace</b><small>Certified listing</small></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="is-g2"><svg><use href="#gdc-star"/></svg></span><b>G2 reviews</b><small>Customer feedback</small></a>
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
