<?php
/**
 * Template Name: Google Ads Connector Product
 * Template Post Type: page, product
 *
 * Built around a report's journey: a Google Ads campaigns view whose rows are
 * pulled by GAQL report jobs in IDMC, a report inspector (budget, performance,
 * spend, GAQL), grouped features, a hub diagram and Ads use cases. Shares the
 * connector base from google-sheets-connector.css and the Drive layout and
 * animations (google-drive-connector.css/.js, .gdc-*); Ads-only parts live in
 * google-ads-connector.css (.gac-*).
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
$contact_url      = home_url( '/contact-us/' );
$marketplace_url  = 'https://marketplace.informatica.com/search.html#q=Infometry&t=MP&sort=relevancy';
$guide_url        = 'https://drive.google.com/file/d/1kIGPY3AY95DA6iRzMHZYxeHm7aBrdup7/view?usp=sharing';
$g2_url           = 'https://www.g2.com/products/google-ads-connector-for-informatica-idmc/reviews';
$drive_url        = home_url( '/product/google-drive-connector/' );
$sheets_url       = home_url( '/product/google-sheets-connector/' );
$conversa_url     = home_url( '/product/infofiscus-conversa-decision-intelligence/' );
$accelerators_url = home_url( '/product/accelerators-for-data-warehouse-migration-automation/' );
$customers_url    = home_url( '/company/customers-partners/' );
$img              = INFOMETRY_CT_URL . 'assets/images/';
$ads_icon         = $img . 'google-connectors/google-ads.png';
$idmc_icon        = $img . 'informatica-product-mark.png';
$support_email    = 'info@infometry.net';
$trial_form_id    = 351429;
$video_id         = 'Xo3WcD8qJtk';

// Hero: campaigns in the Google Ads account (name, status, impressions, clicks, conversions, cost).
$gac_rows = array(
	array( 'Brand_Search_US', 'on', '128.4K', '9,812', '742', '$4,120' ),
	array( 'Retail_Shopping_Q4', 'on', '342.1K', '15,206', '1,184', '$9,870' ),
	array( 'Display_Remarketing', 'on', '511.7K', '6,430', '318', '$3,215' ),
	array( 'YouTube_Awareness', 'paused', '208.9K', '2,904', '96', '$1,760' ),
	array( 'Performance_Max_EU', 'on', '276.3K', '11,548', '903', '$7,340' ),
);
// GAQL report jobs (row index, style, report, target).
$gac_jobs = array(
	array( 0, 'budget', 'Account Budget', 'Snowflake' ),
	array( 1, 'perf', 'Campaign Performance', 'Data Warehouse' ),
	array( 2, 'spend', 'Ad Spend', 'Data Lake' ),
	array( 4, 'group', 'Ad Group metrics', 'Power BI' ),
);

$gac_feature_groups = array(
	array( 'code', '', 'Native Informatica Cloud interface', array( 'Provides Informatica Cloud native interface with Google Ads for read operations with different query or filter functionality and multiple connections.', 'Supports Mapping Task.', 'Fast and easy implementation to analyze Google Ads data.' ), array( 'Read', 'Query & filter', 'Multiple connections', 'Mapping Task' ) ),
	array( 'layers', 'is-yellow', 'Every object, every query', array( 'Supports all objects such as Campaign, Ad Group, Ad Customer, etc.', 'Supports simple and complex GAQL (Google Ads Query Language).', 'Can store & sort the data systematically to meet users’ needs.' ), array( 'Campaign', 'Ad Group', 'Ad', 'Customer', 'GAQL' ) ),
	array( 'nodes', 'is-green', 'Unlimited, wherever your data lives', array( 'Unlimited usage — no restrictions on number of endpoints.', 'Integrates with on-premise and cloud applications.', 'Integrates with Data Warehouses, MDM, and Data Lakes.' ), array( 'Data Warehouse', 'MDM', 'Data Lake', 'Hybrid' ) ),
);

$gac_steps = array(
	array( 'Request from the Marketplace', 'Go to Informatica Marketplace, search for Infometry’s Connector for Informatica, and click on the Start Free Trial button.' ),
	array( 'Paid or subscription licenses', 'For paid or subscription licenses, contact us directly for provisioning.' ),
	array( 'Enable it from IDMC', 'Enable it from IDMC (Formerly known as IICS) and reach out to us for activating the license.' ),
	array( 'Choose your license', 'Two license types are available — a trial license (valid for 30 days) and a paid subscription.' ),
);

$gac_uses = array(
	array( 'Analyze ads and campaign performance across multiple accounts.', array( array( 'ads', 'Google Ads accounts' ), array( 'idmc', 'IDMC' ), array( 'chart', 'Performance analysis' ) ) ),
	array( 'Track ad impressions, clicks, conversions, and spend seamlessly.', array( array( 'ads', 'Campaigns' ), array( 'gac-click', 'Clicks & conversions' ), array( 'gac-coin', 'Spend' ) ) ),
	array( 'Merge Google Ads data into Data Warehouses for 360° marketing analytics.', array( array( 'ads', 'Google Ads' ), array( 'idmc', 'IDMC' ), array( 'db', 'Data warehouse' ) ) ),
	array( 'Feed accurate campaign data into visualization platforms like Tableau, Power BI, and Looker.', array( array( 'ads', 'Campaign data' ), array( 'idmc', 'IDMC' ), array( 'chart', 'Tableau · Power BI · Looker' ) ) ),
	array( 'With Agentic AI-powered marketing intelligence, the connector enables predictive performance analysis and automated optimization recommendations.', array( array( 'bolt', 'Agentic AI' ), array( 'gac-trend', 'Predictive analysis' ), array( 'sync', 'Optimization' ) ) ),
);

$gac_faqs = array(
	array( 'What are the types of Licenses you offer?', 'Infometry connector annual subscription license is charged for a given OrgID. Customers will get un-limited usage of the connectors within an OrgID.' ),
	array( 'How Updates on the new features are released to the customer?', 'Infometry Connector team continue to add new features and support newer API releases for each product. Infometry release cycles are synched with the Informatica Cloud platform and customers will get the updates automatically along with IICS release updates. All our new releases are auto-updated at the customer end and are free of charge.' ),
	array( 'Whom to contact for Implementation and License?', 'You can contact Infometry at <a href="mailto:' . $support_email . '">' . $support_email . '</a>.' ),
	array( 'Is it Certified by Informatica?', 'Yes, all our connectors are 100% Certified by Informatica and also listed on <a href="' . $marketplace_url . '" target="_blank" rel="noopener">Informatica marketplace</a>.' ),
	array( 'How does your Customer Support work?', 'Our Support is available 24/7 and we provide local time-zone support to all our customers globally.' ),
	array( 'How Infometry charge for the connector?', 'All our connectors are charged based on the number of Prod and Non-Prod licenses subscribed by the customer and it’s completely independent of the number/size of the data/rows processed.' ),
	array( 'How soon business users can onboard and start using the connector?', 'In most cases, it is immediate.' ),
	array( 'Validity of license?', 'All our licenses are charged annually.' ),
	array( 'How Infometry offers Technical Support?', 'It’s available 24/7 with a turnaround time of 24-48 hours.' ),
	array( 'How secure is my data?', 'All our connectors and their updates are verified by Informatica before reaching out to the customer. Also, our connectors are activated and work in your environment. Connectors do not hold any data. Our connector ensures highly secured data transfers.' ),
);

$gac_faq_schema = array(
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
		$gac_faqs
	),
);
$gac_link_tags = array( 'a' => array( 'href' => array(), 'target' => array(), 'rel' => array() ) );

require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

/** Small icon for a use-case step: the Ads or IDMC logo, a gac- symbol, otherwise a shared sprite icon. */
$gac_step_icon = function ( $key ) use ( $ads_icon, $idmc_icon ) {
	if ( 'ads' === $key ) {
		infometry_ct_igs_img( $ads_icon, '' );
	} elseif ( 'idmc' === $key ) {
		infometry_ct_igs_img( $idmc_icon, '' );
	} elseif ( 0 === strpos( $key, 'gac-' ) ) {
		printf( '<svg><use href="#%s"/></svg>', esc_attr( $key ) );
	} else {
		printf( '<svg><use href="#igs-%s"/></svg>', esc_attr( $key ) );
	}
};
?>
<main class="igs-page gdc-page gac-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<svg class="igs-sprite" aria-hidden="true" focusable="false">
		<symbol id="gac-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></symbol>
		<symbol id="gac-wallet" viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="14" rx="2.5"/><path d="M3 10h18M16 15h2"/><path d="M6 6V5a2 2 0 0 1 2-2h9"/></symbol>
		<symbol id="gac-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.2"/></symbol>
		<symbol id="gac-coin" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M14.8 9.2c-.5-.9-1.6-1.4-2.8-1.4-1.7 0-2.8.9-2.8 2.1 0 2.9 5.8 1.5 5.8 4.3 0 1.2-1.2 2.1-3 2.1-1.3 0-2.5-.6-3-1.6M12 6v1.8M12 16.3V18"/></symbol>
		<symbol id="gac-group" viewBox="0 0 24 24"><rect x="3" y="3" width="7.5" height="7.5" rx="1.8"/><rect x="13.5" y="3" width="7.5" height="7.5" rx="1.8"/><rect x="3" y="13.5" width="7.5" height="7.5" rx="1.8"/><rect x="13.5" y="13.5" width="7.5" height="7.5" rx="1.8"/></symbol>
		<symbol id="gac-click" viewBox="0 0 24 24"><path d="m9 9 11 4-4.6 1.6L13.8 19 9 9Z"/><path d="M5.5 3.5 6.6 6M2.5 8.5 5 9.4M10 2.5 9.6 5.2"/></symbol>
		<symbol id="gac-trend" viewBox="0 0 24 24"><path d="M3 17 9 11l4 4 8-8"/><path d="M15 7h6v6"/></symbol>
		<symbol id="gac-rocket" viewBox="0 0 24 24"><path d="M14 4c3-1 6-1 6-1s0 3-1 6l-6 6-5-5 6-6Z"/><path d="m8 10-4 .5L3 13l4 1M14 16l-.5 4-2.5 1-1-4"/><circle cx="15" cy="9" r="1.5"/></symbol>
		<symbol id="gac-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></symbol>
		<symbol id="gac-star" viewBox="0 0 24 24"><path d="m12 3 2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9L12 3Z"/></symbol>
	</svg>

	<!-- Hero: a Google Ads campaigns view whose reports run through IDMC GAQL jobs -->
	<section class="igs-hero gdc-hero gac-hero" aria-labelledby="gac-title">
		<div class="igs-shell gdc-hero-grid">
			<div class="gdc-hero-copy">
				<span class="gdc-badge"><?php infometry_ct_igs_img( $ads_icon, '' ); ?>Google Ads Connector · 100% Informatica Certified</span>
				<h1 id="gac-title">Infometry’s Google Ads Connector for <em>Informatica</em></h1>
				<p>A native interface for seamless integration between Google Ads and Enterprise Data Lakes or Data Warehouses via the Informatica Cloud platform, with direct data extraction from complex Google Ads accounts and campaigns.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary gdc-btn-drive" href="#freetrialform">Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<ul class="gdc-hero-drives" aria-label="Supported objects">
					<li><svg><use href="#gac-target"/></svg>Campaign</li>
					<li><svg><use href="#gac-group"/></svg>Ad Group</li>
					<li><svg><use href="#gac-click"/></svg>Ad</li>
					<li><svg><use href="#gac-wallet"/></svg>Customer</li>
				</ul>
				<p class="gdc-hero-links">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?>INFA Marketplace<svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><svg class="is-star"><use href="#gac-star"/></svg>G2 Product Reviews<svg><use href="#igs-out"/></svg></a>
				</p>
			</div>

			<div class="gdc-stage gac-stage" data-gdc-stage aria-label="Animated example: Google Ads account budget, campaign performance, ad spend and ad group reports are extracted through the Infometry connector in Informatica IDMC">
				<div class="gdc-window gac-window" aria-hidden="true">
					<div class="gdc-win-top">
						<span class="gdc-win-logo"><?php infometry_ct_igs_img( $ads_icon, '' ); ?><b>Google Ads</b></span>
						<span class="gdc-win-search"><svg><use href="#gac-search"/></svg>Search campaigns</span>
						<span class="gac-win-range">Last 30 days</span>
					</div>
					<div class="gac-win-kpis">
						<div><small>Impressions</small><b>1.47M</b><em>+12.4%</em></div>
						<div><small>Clicks</small><b>45.9K</b><em>+8.1%</em></div>
						<div><small>Conversions</small><b>3,243</b><em>+15.7%</em></div>
						<div><small>Cost</small><b>$26.3K</b><em class="is-flat">−2.3%</em></div>
					</div>
					<div class="gac-table">
						<div class="gac-tr is-head"><span>Campaign</span><span>Impr.</span><span>Clicks</span><span>Conv.</span><span>Cost</span></div>
						<ul class="gac-rows">
							<?php foreach ( $gac_rows as $i => $row ) : ?>
								<li class="gac-tr is-<?php echo esc_attr( $row[1] ); ?>" data-gdc-file="<?php echo (int) $i; ?>">
									<span><i></i><?php echo esc_html( $row[0] ); ?></span>
									<span><?php echo esc_html( $row[2] ); ?></span>
									<span><?php echo esc_html( $row[3] ); ?></span>
									<span><?php echo esc_html( $row[4] ); ?></span>
									<span><?php echo esc_html( $row[5] ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="gdc-queue gac-queue">
					<header>
						<span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
						<div><b>GAQL report jobs</b><small>Informatica IDMC · Mapping Task</small></div>
						<em data-gdc-count><?php echo count( $gac_jobs ); ?> of <?php echo count( $gac_jobs ); ?> done</em>
					</header>
					<ol>
						<?php foreach ( $gac_jobs as $job ) : ?>
							<li class="is-<?php echo esc_attr( $job[1] ); ?>" data-gdc-job="<?php echo (int) $job[0]; ?>">
								<span class="gdc-job-ic"><svg><use href="#<?php echo esc_attr( array( 'budget' => 'gac-wallet', 'perf' => 'gac-trend', 'spend' => 'gac-coin', 'group' => 'gac-group' )[ $job[1] ] ); ?>"/></svg></span>
								<div class="gdc-job-text">
									<b><?php echo esc_html( $job[2] ); ?> <span><?php echo esc_html( $gac_rows[ $job[0] ][0] ); ?></span></b>
									<small>→ <?php echo esc_html( $job[3] ); ?></small>
									<i class="gdc-job-bar"><i></i></i>
								</div>
								<span class="gdc-job-state"><svg><use href="#igs-check"/></svg></span>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>

				<span class="gdc-chip is-auth" aria-hidden="true"><svg><use href="#igs-code"/></svg>Simple &amp; complex GAQL</span>
				<span class="gdc-chip is-store" aria-hidden="true"><svg><use href="#igs-shield"/></svg>No data stored</span>
			</div>
		</div>
	</section>

	<!-- Overview and the reports the connector retrieves -->
	<section class="igs-section gdc-inspect gac-inspect" aria-labelledby="gac-inspect-title">
		<div class="igs-shell gdc-inspect-grid">
			<div class="gdc-inspect-copy" data-igs-reveal>
				<span class="igs-kicker">Native IDMC interface</span>
				<h2 id="gac-inspect-title">Informatica Google Ads Connector</h2>
				<p>Infometry’s Google Ads Connector for Informatica IDMC is <strong>100% Informatica Certified</strong> and offers a native interface for seamless integration between Google Ads and Enterprise Data Lakes or Data Warehouses via the Informatica Cloud platform. It enables direct data extraction from complex Google Ads accounts and campaigns, ensuring efficient access to critical insights. With this connector, you can retrieve various reports, including <strong>Account Budget, Campaign Performance, and Ad Spend</strong>, streamlining data-driven decision-making.</p>
				<p>With <strong>Agentic AI-enabled data pipelines</strong>, enterprises can go beyond traditional reporting — unlocking predictive insights, adaptive campaign optimization, and automated intelligence for marketing teams.</p>
				<ul class="gdc-inspect-keys">
					<li><svg><use href="#gac-wallet"/></svg>Account Budget</li>
					<li><svg><use href="#gac-trend"/></svg>Campaign Performance</li>
					<li><svg><use href="#gac-coin"/></svg>Ad Spend</li>
					<li><svg><use href="#igs-bolt"/></svg>Agentic AI pipelines</li>
				</ul>
			</div>

			<div class="gdc-inspector gac-inspector" data-gdc-inspector data-igs-reveal>
				<header class="gdc-insp-head">
					<span class="gdc-insp-file gac-insp-logo"><?php infometry_ct_igs_img( $ads_icon, '' ); ?></span>
					<div><b>Retail account · 3 campaigns</b><small>Google Ads · Customer ID 482-***-9013</small></div>
					<em><svg><use href="#igs-check"/></svg>Extracted by connector</em>
				</header>
				<div class="gdc-insp-tabs" role="tablist" aria-label="Google Ads reports the connector can retrieve">
					<button type="button" role="tab" id="gac-tab-0" aria-controls="gac-pane-0" aria-selected="true" data-gdc-tab="0"><svg><use href="#gac-wallet"/></svg>Budget</button>
					<button type="button" role="tab" id="gac-tab-1" aria-controls="gac-pane-1" aria-selected="false" tabindex="-1" data-gdc-tab="1"><svg><use href="#gac-trend"/></svg>Performance</button>
					<button type="button" role="tab" id="gac-tab-2" aria-controls="gac-pane-2" aria-selected="false" tabindex="-1" data-gdc-tab="2"><svg><use href="#gac-coin"/></svg>Ad Spend</button>
					<button type="button" role="tab" id="gac-tab-3" aria-controls="gac-pane-3" aria-selected="false" tabindex="-1" data-gdc-tab="3"><svg><use href="#igs-code"/></svg>GAQL</button>
				</div>

				<div class="gdc-insp-pane" role="tabpanel" id="gac-pane-0" aria-labelledby="gac-tab-0" data-gdc-pane="0">
					<ul class="gac-budgets">
						<li style="--p: 78%"><span><b>Brand_Search_US</b><small>$4,120 of $5,300</small></span><i><i></i></i><em>78%</em></li>
						<li style="--p: 91%" class="is-warn"><span><b>Retail_Shopping_Q4</b><small>$9,870 of $10,800</small></span><i><i></i></i><em>91%</em></li>
						<li style="--p: 54%"><span><b>Performance_Max_EU</b><small>$7,340 of $13,500</small></span><i><i></i></i><em>54%</em></li>
					</ul>
					<p class="gdc-api"><span>REPORT</span><code>account_budget</code><code>campaign_budget</code></p>
				</div>
				<div class="gdc-insp-pane" role="tabpanel" id="gac-pane-1" aria-labelledby="gac-tab-1" data-gdc-pane="1" hidden>
					<dl class="gdc-meta">
						<div><dt>Impressions</dt><dd>746.8K</dd></div>
						<div><dt>Clicks</dt><dd>36,566</dd></div>
						<div><dt>CTR</dt><dd>4.90%</dd></div>
						<div><dt>Conversions</dt><dd>2,829</dd></div>
						<div><dt>Conv. rate</dt><dd>7.74%</dd></div>
						<div><dt>Avg. CPC</dt><dd>$0.58</dd></div>
					</dl>
					<p class="gdc-api"><span>REPORT</span><code>campaign</code><code>metrics.clicks</code><code>metrics.conversions</code></p>
				</div>
				<div class="gdc-insp-pane" role="tabpanel" id="gac-pane-2" aria-labelledby="gac-tab-2" data-gdc-pane="2" hidden>
					<div class="gac-spend" aria-label="Daily ad spend, last 7 days">
						<span style="--h: 46%"><i></i><small>Mon</small></span>
						<span style="--h: 62%"><i></i><small>Tue</small></span>
						<span style="--h: 55%"><i></i><small>Wed</small></span>
						<span style="--h: 78%"><i></i><small>Thu</small></span>
						<span style="--h: 92%"><i></i><small>Fri</small></span>
						<span style="--h: 40%"><i></i><small>Sat</small></span>
						<span style="--h: 34%"><i></i><small>Sun</small></span>
					</div>
					<p class="gac-spend-total"><b>$21,330</b> spent this week across 3 campaigns</p>
					<p class="gdc-api"><span>REPORT</span><code>metrics.cost_micros</code><code>segments.date</code></p>
				</div>
				<div class="gdc-insp-pane" role="tabpanel" id="gac-pane-3" aria-labelledby="gac-tab-3" data-gdc-pane="3" hidden>
					<pre class="gac-gaql"><code><b>SELECT</b> campaign.name,
       metrics.impressions,
       metrics.clicks,
       metrics.conversions,
       metrics.cost_micros
<b>FROM</b> campaign
<b>WHERE</b> segments.date <b>DURING</b> LAST_30_DAYS
  <b>AND</b> campaign.status = 'ENABLED'
<b>ORDER BY</b> metrics.clicks <b>DESC</b></code></pre>
					<p class="gdc-api"><span>QUERY</span><code>GAQL</code><code>filters</code><code>sort</code></p>
				</div>
			</div>
		</div>
	</section>

	<!-- Connector features, grouped -->
	<section class="igs-section gdc-features gac-features" aria-labelledby="gac-features-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Connector features</span>
				<h2 id="gac-features-title">Google Ads Connector Features</h2>
			</div>
			<div class="gdc-feat-grid gac-feat-grid">
				<?php foreach ( $gac_feature_groups as $group ) : ?>
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
			<div class="gac-res" data-igs-reveal>
				<a href="#freetrialform"><span class="is-trial"><svg><use href="#igs-arrow"/></svg></span><b>Free Trial</b><small>30-day trial license</small></a>
				<a href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><span><svg><use href="#igs-down"/></svg></span><b>Download User Guide</b><small>Implementation reference</small></a>
				<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>INFA Marketplace</b><small>Certified listing</small></a>
				<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="is-g2"><svg><use href="#gac-star"/></svg></span><b>G2 Product Reviews</b><small>Customer feedback</small></a>
			</div>
		</div>
	</section>

	<!-- How to use: four steps beside the hub diagram -->
	<section class="igs-section gdc-how" aria-labelledby="gac-how-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="gac-how-title">How Can You Use Our Connector</h2>
			</div>
			<div class="gdc-how-grid">
				<ol class="gdc-timeline" data-igs-reveal>
					<?php foreach ( $gac_steps as $i => $step ) : ?>
						<li>
							<b><?php echo (int) $i + 1; ?></b>
							<div>
								<h3><?php echo esc_html( $step[0] ); ?></h3>
								<p><?php echo esc_html( $step[1] ); ?></p>
								<?php if ( 3 === $i ) : ?>
									<span class="gdc-lic"><em>30-day trial</em><em>Paid subscription</em></span>
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
					<div class="gdc-hub-node is-drive"><?php infometry_ct_igs_img( $ads_icon, '' ); ?><b>Google Ads</b><small>Accounts &amp; campaigns</small></div>
					<div class="gdc-hub-core"><span class="gdc-hub-ring"></span><span class="gdc-hub-logo"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Informatica IDMC</b><small>Native connector</small></div>
					<div class="gdc-hub-out is-o1"><span><svg><use href="#igs-db"/></svg></span><b>Data Warehouses</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-snowflake.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-oracle.png', '' ); ?></i></div>
					<div class="gdc-hub-out is-o2"><span><svg><use href="#igs-layers"/></svg></span><b>Data Lakes</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-databricks.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-aws.png', '' ); ?></i></div>
					<div class="gdc-hub-out is-o3"><span><svg><use href="#igs-chart"/></svg></span><b>BI &amp; visualization</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-tableau.svg', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-azure.png', '' ); ?></i></div>
					<div class="gdc-hub-out is-o4"><span><svg><use href="#igs-nodes"/></svg></span><b>MDM &amp; apps</b><i><?php infometry_ct_igs_img( $img . 'google-sheets/eco-salesforce.png', '' ); ?><?php infometry_ct_igs_img( $img . 'google-sheets/eco-sap.png', '' ); ?></i></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Six key features: bento -->
	<section class="igs-section gdc-benefits gac-benefits" aria-labelledby="gac-benefits-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Why teams choose it</span>
				<h2 id="gac-benefits-title">Features of Google Ads Connector</h2>
			</div>
			<div class="gac-bento">
				<article class="gdc-tile gac-t-query" data-igs-reveal>
					<span class="gdc-tile-ic"><svg><use href="#igs-code"/></svg></span>
					<h3>Complex Query Handling</h3>
					<p>Supports advanced GAQL queries for deep campaign insights.</p>
					<pre class="gac-gaql is-mini" aria-hidden="true"><code><b>SELECT</b> ad_group.name, metrics.ctr
<b>FROM</b> ad_group
<b>WHERE</b> metrics.impressions &gt; 1000
<b>ORDER BY</b> metrics.ctr <b>DESC</b></code></pre>
				</article>
				<article class="gdc-tile gac-t-native" data-igs-reveal>
					<span class="gdc-tile-ic"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
					<h3>Native Interface</h3>
					<p>Built on Informatica’s Cloud native interface.</p>
				</article>
				<article class="gdc-tile gac-t-fast" data-igs-reveal>
					<span class="gdc-tile-ic"><svg><use href="#gac-rocket"/></svg></span>
					<h3>Fast Deployment</h3>
					<p>Simple, fast, and scalable integration.</p>
				</article>
				<article class="gdc-tile gac-t-auto" data-igs-reveal>
					<span class="gdc-tile-ic"><svg><use href="#igs-bolt"/></svg></span>
					<h3>Automation Ready</h3>
					<p>Can be enhanced with Agentic AI-driven orchestration to automate ad insights.</p>
				</article>
				<article class="gdc-tile gac-t-scale" data-igs-reveal>
					<span class="gdc-tile-ic"><svg><use href="#igs-chart"/></svg></span>
					<h3>Scalable Analytics</h3>
					<p>Processes data across large ad accounts seamlessly.</p>
				</article>
				<article class="gdc-tile gac-t-env" data-igs-reveal>
					<span class="gdc-tile-ic"><svg><use href="#igs-cloud"/></svg></span>
					<h3>Multi-Environment Ready</h3>
					<p>Works across on-premises, hybrid, and cloud apps.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- Tutorial -->
	<section class="igs-section gdc-videos gac-videos" aria-labelledby="gac-videos-title">
		<div class="igs-shell gac-video-grid">
			<div class="gac-video-copy" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="gac-videos-title">Learn about Google Ads Connector</h2>
				<p>Watch how Infometry’s Google Ads Connector brings campaign, budget and spend data from Google Ads into Informatica IDMC.</p>
				<a class="igs-btn igs-btn-primary" href="#freetrialform">Free Trial <svg><use href="#igs-arrow"/></svg></a>
			</div>
			<a class="gdc-video gac-video" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $video_id ); ?>" target="_blank" rel="noopener" data-igs-video="<?php echo esc_attr( $video_id ); ?>" data-igs-reveal>
				<span class="gdc-video-cover" aria-hidden="true">
					<span class="gdc-vc-tile"><?php infometry_ct_igs_img( $ads_icon, '' ); ?></span>
					<span class="gdc-vc-arrow"><svg><use href="#igs-arrow"/></svg></span>
					<span class="gdc-vc-tile"><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span>
					<span class="gdc-vc-play"><svg><use href="#igs-play"/></svg></span>
				</span>
				<span class="gdc-video-info"><em>Tutorial</em><b>Infometry’s Google Ads Connector for Informatica IDMC</b><small>Watch video <svg><use href="#igs-arrow"/></svg></small></span>
			</a>
		</div>
		<div class="igs-modal" data-igs-modal hidden>
			<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Tutorial video">
				<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
				<div class="igs-modal-frame" data-igs-frame></div>
			</div>
		</div>
	</section>

	<!-- Use cases as workflow recipes -->
	<section class="igs-section gdc-uses" aria-labelledby="gac-uses-title">
		<div class="igs-shell gdc-uses-grid">
			<div class="gdc-uses-copy" data-igs-reveal>
				<span class="igs-kicker">Use cases</span>
				<h2 id="gac-uses-title">Popular Use Cases</h2>
				<p>How marketing and data teams put Google Ads data to work inside Informatica.</p>
				<a class="igs-btn igs-btn-primary gac-uses-btn" href="<?php echo esc_url( $contact_url ); ?>">Contact us <svg><use href="#igs-arrow"/></svg></a>
			</div>
			<ol class="gdc-recipes">
				<?php foreach ( $gac_uses as $i => $use ) : ?>
					<li data-igs-reveal>
						<b><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></b>
						<h3><?php echo esc_html( $use[0] ); ?></h3>
						<p class="gdc-recipe-flow" aria-hidden="true">
							<?php foreach ( $use[1] as $s => $step ) : ?>
								<?php if ( $s ) : ?><i></i><?php endif; ?>
								<span><?php $gac_step_icon( $step[0] ); ?><?php echo esc_html( $step[1] ); ?></span>
							<?php endforeach; ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<!-- FAQ -->
	<section class="igs-section gdc-faq" aria-labelledby="gac-faq-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">FAQ</span>
				<h2 id="gac-faq-title">Frequently Asked Questions</h2>
			</div>
			<div class="gdc-faq-cols">
				<?php foreach ( array_chunk( $gac_faqs, 5 ) as $column ) : ?>
					<div class="gdc-faq-col">
						<?php foreach ( $column as $i => $faq ) : ?>
							<details<?php echo 0 === $i ? ' open' : ''; ?>>
								<summary><?php echo esc_html( $faq[0] ); ?><span aria-hidden="true"><svg><use href="#igs-plus"/></svg></span></summary>
								<p><?php echo wp_kses( $faq[1], $gac_link_tags ); ?></p>
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
		<script type="application/ld+json"><?php echo wp_json_encode( $gac_faq_schema ); ?></script>
	</section>

	<!-- Other products -->
	<section class="igs-section igs-related gdc-related" aria-labelledby="gac-related-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Other products</span>
				<h2 id="gac-related-title">Other Products</h2>
			</div>
			<div class="igs-related-grid">
				<a class="igs-related-card" href="<?php echo esc_url( $drive_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $img . 'google-connectors/google-drive.png', '' ); ?></span>
					<div><h3>Google Drive Connector</h3><p>Google Drive Connector can be used to provide connectivity to Google Drive to and from a variety of external sources.</p><em>Read more <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
				<a class="igs-related-card" href="<?php echo esc_url( $sheets_url ); ?>" data-igs-reveal>
					<span><?php infometry_ct_igs_img( $img . 'google-connectors/google-sheets.png', '' ); ?></span>
					<div><h3>Google Sheets Connector</h3><p>Google Sheet Connector, built with Informatica’s native interface, supports all API operations, including read, write, update, delete, range, and search.</p><em>Read more <svg><use href="#igs-arrow"/></svg></em></div>
				</a>
			</div>
		</div>
	</section>

	<!-- Free trial -->
	<section class="igs-cta gdc-cta" id="freetrialform" aria-labelledby="gac-cta-title">
		<div class="igs-shell igs-cta-grid">
			<div class="igs-cta-copy">
				<span class="igs-kicker">Free trial</span>
				<h2 id="gac-cta-title">Free Trial</h2>
				<p>Request your 30-day trial license and start bringing Google Ads reports into your Data Warehouse or Data Lake through Informatica IDMC.</p>
				<ul class="igs-cta-checks">
					<li><svg><use href="#igs-check"/></svg>100% Informatica Certified</li>
					<li><svg><use href="#igs-check"/></svg>Simple &amp; complex GAQL</li>
					<li><svg><use href="#igs-check"/></svg>Connectors hold no data</li>
					<li><svg><use href="#igs-check"/></svg>24/7 local time-zone support</li>
				</ul>
				<div class="gdc-cta-res">
					<a href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><span><svg><use href="#igs-down"/></svg></span><b>User guide</b><small>Implementation reference</small></a>
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span><?php infometry_ct_igs_img( $idmc_icon, '' ); ?></span><b>Marketplace</b><small>Certified listing</small></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="is-g2"><svg><use href="#gac-star"/></svg></span><b>G2 reviews</b><small>Customer feedback</small></a>
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
