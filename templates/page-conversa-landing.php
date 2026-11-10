<?php
/**
 * Template Name: INFOFISCUS Conversa Ads Landing Page
 * Template Post Type: page
 *
 * Paid-traffic landing page for INFOFISCUS Conversa. It prints its own document,
 * so the theme header, site menu and footer are not on the page: the only ways
 * out are the demo form and the Privacy Policy link. The hero reuses the live
 * Conversa product tour (templates/partials/conversa-live-dashboard.php), which
 * is why this page sits inside .infometry-conversa-product and loads the
 * Conversa CSS/JS. Everything else is styled by assets/css/conversa-landing.css.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$icl_privacy_url = home_url( '/privacy-policies/' );
$icl_tour_url    = 'https://app.supademo.com/demo/cmrpbnvrk00aozw0jd3ao0z6v?utm_source=link';

$icl_stats = array(
	array( '3X', 'Faster time to insights' ),
	array( '75%', 'Self-service analytics growth' ),
	array( '2X', 'Data team productivity boost' ),
	array( '92%+', 'Trusted answers, happier users' ),
);

$icl_problems = array(
	'Exploring data requires SQL or technical tools',
	'Reports only cover predefined insights',
	'Data lives in multiple warehouses and applications',
	'Decision-makers must wait for analysts',
);

$icl_steps = array(
	array( 'Ask', 'Ask a complex business question in natural language.' ),
	array( 'Understand', 'Conversa applies business context and governed semantics.' ),
	array( 'Investigate', 'It analyzes the data, compares dimensions and follows the evidence.' ),
	array( 'Identify drivers', 'See the key factors, root causes, risks and opportunities.' ),
	array( 'Decide', 'Get a clear, decision-ready business insight.' ),
);

$icl_example = array(
	array( '1 · Compare with prior week', '50.3K → 41.2K', '' ),
	array( '2 · Break down by channel', 'Email · Social · Web · App', '' ),
	array( '3 · Biggest drop', 'Email −31%', 'is-down' ),
	array( '4 · Key driver: click-through rate', 'CTR 3.8% → 2.1%', '' ),
);

$icl_demo_points = array(
	'How Conversa answers multi-step business questions',
	'Root cause and key drivers, with the SQL behind every answer',
	'Governance: SSO, role-based access, encryption and audit trails',
	'How a Conversa Value Sprint works for your team',
);

$icl_capabilities = array(
	array( 'Analytical reasoning', 'Investigate complex business questions', 'Multi-step analysis from the question to the drivers, risks, opportunities and follow-ups.' ),
	array( 'Trusted intelligence', 'Answers grounded in business meaning', 'Governed semantics keep metrics, terminology and business logic consistent.' ),
	array( 'Cross-platform intelligence', 'One question. Many systems. One answer.', 'Investigate across heterogeneous enterprise data platforms, not just one.' ),
	array( 'Natural language', 'Ask business questions naturally', 'Ask follow-ups and explore metrics without writing SQL. Conversa generates optimized queries.' ),
	array( 'Document intelligence', 'Connect data with enterprise knowledge', 'Search PDFs, contracts, manuals, SOPs and reports alongside your data.' ),
	array( 'Enterprise governance', 'Built for governed analytics', 'Role-based access, single sign-on, encryption and audit trails.' ),
);

$icl_shift = array(
	array( 'Fragmented data', 'Questions need information from multiple systems and teams.', 'Cross-enterprise intelligence', 'Investigate across connected enterprise data and business domains.' ),
	array( 'Reactive reporting', 'Teams wait for reports or analyst support when something changes.', 'Faster investigation', 'Investigate changes and drivers close to the moment of decision.' ),
	array( 'Knowledge bottlenecks', 'Analytical expertise sits with a few specialists.', 'Accessible intelligence', 'Business teams explore governed insights; analysts focus on higher-value work.' ),
	array( 'Disconnected decisions', 'Teams work from different reports and definitions.', 'Trusted business context', 'Shared definitions support consistent decision-making.' ),
);

// Columns: Conversa, Tableau, Power BI, Modern AI Tools. y = full, p = partial, n = not supported.
$icl_compare = array(
	array( 'Natural Language Query', 'y', 'p', 'p', 'y' ),
	array( 'Automated Insights', 'y', 'n', 'n', 'p' ),
	array( 'Root Cause Analysis', 'y', 'n', 'n', 'y' ),
	array( 'Predictive Analytics', 'p', 'p', 'n', 'y' ),
	array( 'Semantic Layer', 'y', 'n', 'p', 'n' ),
	array( 'SQL Transparency', 'y', 'n', 'n', 'p' ),
	array( 'Multi Data Sources', 'y', 'y', 'y', 'p' ),
	array( 'Unstructured Data', 'y', 'n', 'n', 'p' ),
	array( 'Governance', 'y', 'y', 'y', 'p' ),
);
$icl_status = array(
	'y' => array( 'is-yes', 'Full support' ),
	'p' => array( 'is-partial', 'Partial' ),
	'n' => array( 'is-no', 'Not supported' ),
);

// Team examples: Finance is the one in the design; the others are the same examples used on the Conversa product page.
$icl_teams = array(
	'finance'    => array( 'Finance (FP&A)', 'Why did net profit improve this quarter, and which drivers contributed most?', 'Net profit increased 11.8% as stronger enterprise pricing and lower fulfillment costs offset a 3.1% rise in operating expenses.', 'Protect enterprise pricing and extend logistics savings across other regions.', array( array( 'Net profit', '$18.6M', 'Up 11.8% vs prior quarter', 'is-up' ), array( 'Gross margin', '31.6%', 'Up 4.2 pts vs prior quarter', 'is-up' ) ) ),
	'sales'      => array( 'Sales', 'Why did pipeline conversion improve, and where should sales focus next?', 'Win rate rose to 42.8% because enterprise opportunities moved faster through solution validation, while mid-market deals remain the largest growth gap.', 'Put executive attention on the $3.6M mid-market pipeline.', array( array( 'Win rate', '42.8%', 'Up 8.4 pts vs prior quarter', 'is-up' ), array( 'Sales cycle', '46 days', '12 days faster than last quarter', 'is-up' ) ) ),
	'operations' => array( 'Operations', 'What is driving fulfillment delays, and which process should we fix first?', 'West-region delays are concentrated in two distribution centers where picking congestion and late carrier handoffs account for 71% of missed SLAs.', 'Fix picking at DC-04 first and add evening carrier capacity.', array( array( 'On-time SLA', '96.4%', 'Up 5.8 pts over six weeks', 'is-up' ), array( 'Backlog', '1,240', 'Down 22% since peak week', 'is-up' ) ) ),
	'marketing'  => array( 'Marketing', 'Why did customer engagement drop last week, and what should we change?', 'Engagement declined 18% because email click-through fell after send times shifted later, while paid social and webinar engagement remained stable.', 'Optimize email timing. Shift sends to peak open hours.', array( array( 'Engagement rate', '24.8%', 'Down 18% vs previous week', 'is-down' ), array( 'Email CTR', '2.9%', 'Down 21% after timing change', 'is-down' ) ) ),
	'hr'         => array( 'HR', 'Why is regrettable attrition increasing, and which teams need attention?', 'Attrition is concentrated in engineering and customer success employees with 18–30 months of tenure, driven by promotion delays and manager changes.', 'Review promotion timelines for mid-tenure engineering and customer success staff.', array( array( 'Retention', '91.8%', 'Down 2.1 pts vs prior quarter', 'is-down' ), array( 'Regrettable attrition', '6.4%', 'Up 1.7 pts vs prior quarter', 'is-down' ) ) ),
);

$icl_faqs = array(
	array( 'What is INFOFISCUS Conversa?', 'An enterprise decision intelligence platform that helps business teams ask complex questions, investigate what changed and why, identify key drivers, and turn governed enterprise data into trusted, decision-ready insights.' ),
	array( 'Does Conversa replace our dashboards?', 'No. It complements your existing BI tools by adding a conversational, investigative layer on top of your current analytics stack.' ),
	array( 'Can Conversa work across multiple data platforms?', 'Yes. It connects to major platforms including Snowflake, Google BigQuery, Amazon Redshift, Azure Synapse, Oracle, SQL Server and PostgreSQL.' ),
	array( 'Is Conversa secure?', 'Yes. Queries run on your own cloud warehouse with its encryption and access controls, plus SSO, role-based access and audit trails.' ),
	array( 'How can we evaluate Conversa?', 'Start with a personalized demo, then a Conversa Value Sprint focused on your own business questions.' ),
);

$icl_check = '<svg class="icl-check" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m5 12.5 4.5 4.5L19 7.5"/></svg>';
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main class="infometry-conversa-product icl-page" id="icl-top">

	<header class="icl-topbar">
		<div class="icl-shell icl-topbar-inner">
			<div class="icl-brand"><strong>INFOMETRY INC.</strong><span>Enabling AI for Every Enterprise</span></div>
			<a class="icl-btn icl-btn-primary icl-btn-sm" href="#icl-demo" data-icp-demo-trigger>Request a Demo <span aria-hidden="true">→</span></a>
		</div>
	</header>

	<section class="icl-hero" aria-labelledby="icl-hero-title">
		<div class="icl-shell icl-hero-grid">
			<div class="icl-hero-copy">
				<p class="icl-pill">INFOFISCUS Conversa™</p>
				<h1 id="icl-hero-title">The Trusted Decision Intelligence Platform <span>for the Enterprise</span></h1>
				<p class="icl-hero-lead">Ask business questions in plain English. Conversa investigates your governed enterprise data, finds the key drivers and hands your leaders decision-ready answers.</p>
				<div class="icl-actions">
					<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icp-demo-trigger>Book a Live Demo <span aria-hidden="true">→</span></a>
					<a class="icl-btn icl-btn-ghost" href="<?php echo esc_url( $icl_tour_url ); ?>" target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><path class="icl-solid" d="m10 8.5 5.5 3.5-5.5 3.5z"/></svg>Try the interactive demo</a>
				</div>
				<ul class="icl-hero-points">
					<li><?php echo $icl_check; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Trusted Answers</li>
					<li><?php echo $icl_check; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Deeper Analysis</li>
					<li><?php echo $icl_check; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Actionable Insights</li>
					<li><?php echo $icl_check; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Enterprise-Grade Security</li>
				</ul>
			</div>
			<div class="icl-hero-demo">
				<?php include INFOMETRY_CT_PATH . 'templates/partials/conversa-live-dashboard.php'; ?>
			</div>
		</div>
	</section>

	<section class="icl-proof" aria-label="Results and supported platforms">
		<div class="icl-shell">
			<div class="icl-stats">
				<?php foreach ( $icl_stats as $stat ) : ?>
					<div class="icl-stat"><strong><?php echo esc_html( $stat[0] ); ?></strong><span><?php echo esc_html( $stat[1] ); ?></span></div>
				<?php endforeach; ?>
			</div>
			<p class="icl-trust"><b>Infometry is trusted by 150+ customers worldwide</b><span>Works with Snowflake · Databricks · Google Cloud · BigQuery · Redshift · Oracle · SQL Server</span></p>
		</div>
	</section>

	<section class="icl-section icl-problem" aria-labelledby="icl-problem-title">
		<div class="icl-shell icl-split">
			<div>
				<p class="icl-kicker">Stop searching reports. Start investigating.</p>
				<h2 id="icl-problem-title">80% of business questions never get answered in time</h2>
				<p class="icl-lead">Dashboards tell you what happened. Your leaders need to know why, and what to do next.</p>
			</div>
			<div class="icl-problem-grid">
				<?php foreach ( $icl_problems as $problem ) : ?>
					<div class="icl-card icl-problem-card"><?php echo esc_html( $problem ); ?></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-alt icl-how" aria-labelledby="icl-how-title">
		<div class="icl-shell">
			<p class="icl-kicker">How enterprise decision intelligence works</p>
			<h2 id="icl-how-title">From business question to trusted decision</h2>
			<ol class="icl-steps">
				<?php foreach ( $icl_steps as $i => $step ) : ?>
					<li class="icl-card icl-step"><span class="icl-step-num"><?php echo esc_html( $i + 1 ); ?></span><h3><?php echo esc_html( $step[0] ); ?></h3><p><?php echo esc_html( $step[1] ); ?></p></li>
				<?php endforeach; ?>
			</ol>
			<div class="icl-card icl-example">
				<div class="icl-example-head">
					<h3>Example: "Why did customer engagement drop last week?"</h3>
					<span>KPIs + Context + Drivers = Action</span>
				</div>
				<div class="icl-example-grid">
					<?php foreach ( $icl_example as $tile ) : ?>
						<div class="icl-example-tile"><small><?php echo esc_html( $tile[0] ); ?></small><strong class="<?php echo esc_attr( $tile[2] ); ?>"><?php echo esc_html( $tile[1] ); ?></strong></div>
					<?php endforeach; ?>
				</div>
				<p class="icl-action-note"><b>Recommended action:</b> Optimize email timing. Shift sends to peak open hours.</p>
			</div>
		</div>
	</section>

	<section class="icl-section icl-dark icl-demo" id="icl-demo" aria-labelledby="icl-demo-title">
		<div class="icl-shell icl-demo-grid">
			<div class="icl-demo-copy">
				<p class="icl-kicker">Personalized demo</p>
				<h2 id="icl-demo-title">See Conversa investigate questions from your own industry</h2>
				<ul class="icl-check-list">
					<?php foreach ( $icl_demo_points as $point ) : ?>
						<li><?php echo $icl_check; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="icl-form-card" data-icp-wpforms-host>
				<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
					<?php
					echo do_shortcode(
						sprintf(
							'[wpforms id="%d" title="false" description="false" ajax="true"]',
							absint( INFOMETRY_CT_CONVERSA_FORM_ID )
						)
					); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
				<?php else : ?>
					<div class="icp-demo-form-head"><strong>Request your personalized demo</strong></div>
					<p>The request form is temporarily unavailable. Email us at <a href="mailto:info@infometry.net">info@infometry.net</a>.</p>
				<?php endif; ?>
				<p class="icl-form-note">Our analytics team will connect with you to schedule a time.</p>
			</div>
		</div>
	</section>

	<section class="icl-section icl-capabilities" aria-labelledby="icl-cap-title">
		<div class="icl-shell">
			<p class="icl-kicker">AI decision intelligence capabilities</p>
			<h2 id="icl-cap-title">Everything your teams need to move from "what happened" to "why"</h2>
			<div class="icl-cap-grid">
				<?php foreach ( $icl_capabilities as $cap ) : ?>
					<article class="icl-card icl-cap"><p class="icl-kicker"><?php echo esc_html( $cap[0] ); ?></p><h3><?php echo esc_html( $cap[1] ); ?></h3><p><?php echo esc_html( $cap[2] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-alt icl-shift" aria-labelledby="icl-shift-title">
		<div class="icl-shell">
			<p class="icl-kicker">The shift Conversa creates</p>
			<h2 id="icl-shift-title">Before and after decision intelligence software</h2>
			<div class="icl-shift-grid">
				<?php foreach ( $icl_shift as $row ) : ?>
					<div class="icl-card icl-shift-before"><small>Before</small><h3><?php echo esc_html( $row[0] ); ?></h3><p><?php echo esc_html( $row[1] ); ?></p></div>
					<div class="icl-card icl-shift-after"><small>With Conversa</small><h3><?php echo esc_html( $row[2] ); ?></h3><p><?php echo esc_html( $row[3] ); ?></p></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-compare" aria-labelledby="icl-compare-title">
		<div class="icl-shell">
			<p class="icl-kicker">Compare decision intelligence tools</p>
			<h2 id="icl-compare-title">Already have Tableau or Power BI? Here's what Conversa adds.</h2>
			<p class="icl-lead">Conversa doesn't replace your dashboards. It adds automated insights, root cause analysis and a governed semantic layer on top of them.</p>
			<div class="icl-table-wrap">
				<table class="icl-table">
					<thead>
						<tr><th scope="col">Capabilities</th><th scope="col" class="is-conversa">Conversa</th><th scope="col">Tableau</th><th scope="col">Power BI</th><th scope="col">Modern AI Tools</th></tr>
					</thead>
					<tbody>
						<?php foreach ( $icl_compare as $row ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $row[0] ); ?></th>
								<?php for ( $c = 1; $c <= 4; $c++ ) : ?>
									<?php $s = $icl_status[ $row[ $c ] ]; ?>
									<td class="<?php echo 1 === $c ? 'is-conversa' : ''; ?>"><span class="icl-mark <?php echo esc_attr( $s[0] ); ?>" role="img" aria-label="<?php echo esc_attr( $s[1] ); ?>"></span></td>
								<?php endfor; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<p class="icl-legend"><span><i class="icl-mark is-yes" aria-hidden="true"></i>Full support</span><span><i class="icl-mark is-partial" aria-hidden="true"></i>Partial</span><span><i class="icl-mark is-no" aria-hidden="true"></i>Not supported</span><em>Based on Infometry's assessment of out-of-the-box capabilities.</em></p>
		</div>
	</section>

	<section class="icl-section icl-alt icl-teams" aria-labelledby="icl-teams-title">
		<div class="icl-shell">
			<p class="icl-kicker">Decision intelligence solutions by team</p>
			<h2 id="icl-teams-title">One platform for Finance, Sales, Operations, Marketing and HR</h2>
			<div class="icl-tabs" role="tablist" aria-label="Teams">
				<?php $first = true; foreach ( $icl_teams as $key => $team ) : ?>
					<button type="button" role="tab" id="icl-tab-<?php echo esc_attr( $key ); ?>" aria-controls="icl-panel-<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>" tabindex="<?php echo $first ? '0' : '-1'; ?>" data-icl-tab><?php echo esc_html( $team[0] ); ?></button>
				<?php $first = false; endforeach; ?>
			</div>
			<?php $first = true; foreach ( $icl_teams as $key => $team ) : ?>
				<div class="icl-card icl-team" role="tabpanel" id="icl-panel-<?php echo esc_attr( $key ); ?>" aria-labelledby="icl-tab-<?php echo esc_attr( $key ); ?>" data-icl-panel<?php echo $first ? '' : ' hidden'; ?>>
					<div class="icl-team-copy">
						<small>Business question</small>
						<h3><?php echo esc_html( $team[1] ); ?></h3>
						<p class="icl-kicker">Conversa found</p>
						<p><?php echo esc_html( $team[2] ); ?></p>
						<p class="icl-action-note"><b>Recommended action:</b> <?php echo esc_html( $team[3] ); ?></p>
					</div>
					<div class="icl-team-kpis">
						<?php foreach ( $team[4] as $kpi ) : ?>
							<div class="icl-kpi"><small><?php echo esc_html( $kpi[0] ); ?></small><strong><?php echo esc_html( $kpi[1] ); ?></strong><span class="<?php echo esc_attr( $kpi[3] ); ?>"><?php echo esc_html( $kpi[2] ); ?></span></div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php $first = false; endforeach; ?>
			<p class="icl-footnote">Illustrative example from the Conversa demo environment.</p>
		</div>
	</section>

	<section class="icl-section icl-faq" aria-labelledby="icl-faq-title">
		<div class="icl-shell icl-faq-inner">
			<h2 id="icl-faq-title">Frequently asked questions</h2>
			<?php foreach ( $icl_faqs as $faq ) : ?>
				<div class="icl-card icl-faq-item"><h3><?php echo esc_html( $faq[0] ); ?></h3><p><?php echo esc_html( $faq[1] ); ?></p></div>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="icl-final icl-dark" aria-labelledby="icl-final-title">
		<div class="icl-shell">
			<h2 id="icl-final-title">Turn every business question into a confident decision</h2>
			<p>Experience the power of trusted decision intelligence on questions from your own business.</p>
			<div class="icl-actions">
				<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icp-demo-trigger>Request a Live Demo <span aria-hidden="true">→</span></a>
				<a class="icl-btn icl-btn-ghost" href="#icl-demo" data-icp-demo-trigger>Start a Conversa Value Sprint</a>
			</div>
		</div>
	</section>

	<footer class="icl-footer">
		<div class="icl-shell icl-footer-inner">
			<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Infometry Inc. All Rights Reserved.</span>
			<a href="<?php echo esc_url( $icl_privacy_url ); ?>">Privacy Policy</a>
		</div>
	</footer>

	<script type="application/ld+json">
	<?php
	$icl_faq_schema = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'mainEntity' => array_map(
			static function ( $faq ) {
				return array(
					'@type'          => 'Question',
					'name'           => $faq[0],
					'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $faq[1] ),
				);
			},
			$icl_faqs
		),
	);
	echo wp_json_encode( $icl_faq_schema ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	?>
	</script>
</main>
<?php wp_footer(); ?>
</body>
</html>
