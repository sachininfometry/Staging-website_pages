<?php
/**
 * Template Name: INFOFISCUS Conversa Ads Landing Page
 * Template Post Type: page
 *
 * Paid-traffic landing page for INFOFISCUS Conversa. It prints its own document,
 * so the theme header, site menu and footer are not on the page: the only ways
 * out are the demo form and the Privacy Policy link. The hero holds the demo
 * form (includes/conversa-landing-form.php); a section further down reuses the
 * live Conversa product tour (templates/partials/conversa-live-dashboard.php),
 * which is why the page sits inside .infometry-conversa-product and loads the
 * Conversa CSS/JS. Everything else: assets/css/conversa-landing.css and
 * assets/js/conversa-landing.js.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$icl_privacy_url = home_url( '/privacy-policies/' );

// The site logo set in the theme (Betheme > Logo), shown on the banner like the other pages.
$icl_logo = function_exists( 'mfn_opts_get' ) ? mfn_opts_get( 'logo-img' ) : '';
if ( ! $icl_logo ) {
	$icl_logo = home_url( '/wp-content/uploads/2025/12/infometry-inc-logo-enabling-ai-for-every-enterprise-e1765295994150.png' );
}

$icl_customers = array(
	array( 'Sanofi', 'customer-sanofi-logo.png', 323, 259 ),
	array( 'Belk', 'customer-belk-logo.png', 423, 179 ),
	array( 'IBM', 'customer-ibm-logo.png', 403, 171 ),
	array( 'Informatica', 'customer-informatica-logo.png', 645, 171 ),
	array( 'Michaels', 'customer-michaels-logo.png', 150, 56 ),
	array( 'SanDisk', 'customer-sandisk-logo.png', 621, 137 ),
	array( 'Fusion.io', 'customer-fusionio-logo.png', 363, 198 ),
);

// Value, suffix, label. The value counts up when the card scrolls into view.
$icl_stats = array(
	array( '3', 'X', 'Faster time to insights' ),
	array( '75', '%', 'Self-service analytics growth' ),
	array( '2', 'X', 'Data team productivity boost' ),
	array( '92', '%+', 'Trusted answers, happier users' ),
);

$icl_problems = array(
	array( 'code', 'is-violet', 'Exploring data requires SQL or technical tools' ),
	array( 'doc', 'is-blue', 'Reports only cover predefined insights' ),
	array( 'db', 'is-cyan', 'Data lives in multiple warehouses and applications' ),
	array( 'clock', 'is-amber', 'Decision-makers must wait for analysts' ),
);

$icl_steps = array(
	array( 'chat', 'Ask', 'Ask a complex business question in natural language.' ),
	array( 'brain', 'Understand', 'Conversa applies business context and governed semantics.' ),
	array( 'search', 'Investigate', 'It analyzes the data, compares dimensions and follows the evidence.' ),
	array( 'target', 'Identify drivers', 'See the key factors, root causes, risks and opportunities.' ),
	array( 'check', 'Decide', 'Get a clear, decision-ready business insight.' ),
);

// Each tile lights up with the step (index into $icl_steps) that produces it.
$icl_example = array(
	array( 1, '1 · Compare with prior week', '50.3K → 41.2K', '' ),
	array( 2, '2 · Break down by channel', 'Email · Social · Web · App', '' ),
	array( 3, '3 · Biggest drop', 'Email −31%', 'is-down' ),
	array( 3, '4 · Key driver: click-through rate', 'CTR 3.8% → 2.1%', '' ),
);

$icl_demo_points = array(
	'How Conversa answers multi-step business questions',
	'Root cause and key drivers, with the SQL behind every answer',
	'Governance: SSO, role-based access, encryption and audit trails',
	'How a Conversa Value Sprint works for your team',
);

$icl_capabilities = array(
	array( 'brain', 'is-violet', 'Analytical reasoning', 'Investigate complex business questions', 'Multi-step analysis from the question to the drivers, risks, opportunities and follow-ups.' ),
	array( 'shield', 'is-blue', 'Trusted intelligence', 'Answers grounded in business meaning', 'Governed semantics keep metrics, terminology and business logic consistent.' ),
	array( 'nodes', 'is-cyan', 'Cross-platform intelligence', 'One question. Many systems. One answer.', 'Investigate across heterogeneous enterprise data platforms, not just one.' ),
	array( 'chat', 'is-green', 'Natural language', 'Ask business questions naturally', 'Ask follow-ups and explore metrics without writing SQL. Conversa generates optimized queries.' ),
	array( 'doc', 'is-amber', 'Document intelligence', 'Connect data with enterprise knowledge', 'Search PDFs, contracts, manuals, SOPs and reports alongside your data.' ),
	array( 'lock', 'is-pink', 'Enterprise governance', 'Built for governed analytics', 'Role-based access, single sign-on, encryption and audit trails.' ),
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
$icl_marks = array(
	'y' => array( 'is-yes', 'Full support' ),
	'p' => array( 'is-partial', 'Partial' ),
	'n' => array( 'is-no', 'Not supported' ),
);

// Team examples: Finance is the one in the design; the others are the same examples used on the Conversa product page.
$icl_teams = array(
	'finance'    => array( 'bank', 'Finance (FP&A)', 'Why did net profit improve this quarter, and which drivers contributed most?', 'Net profit increased 11.8% as stronger enterprise pricing and lower fulfillment costs offset a 3.1% rise in operating expenses.', 'Protect enterprise pricing and extend logistics savings across other regions.', array( array( 'Net profit', '$18.6M', 'Up 11.8% vs prior quarter', 'is-up' ), array( 'Gross margin', '31.6%', 'Up 4.2 pts vs prior quarter', 'is-up' ) ) ),
	'sales'      => array( 'chart', 'Sales', 'Why did pipeline conversion improve, and where should sales focus next?', 'Win rate rose to 42.8% because enterprise opportunities moved faster through solution validation, while mid-market deals remain the largest growth gap.', 'Put executive attention on the $3.6M mid-market pipeline.', array( array( 'Win rate', '42.8%', 'Up 8.4 pts vs prior quarter', 'is-up' ), array( 'Sales cycle', '46 days', '12 days faster than last quarter', 'is-up' ) ) ),
	'operations' => array( 'nodes', 'Operations', 'What is driving fulfillment delays, and which process should we fix first?', 'West-region delays are concentrated in two distribution centers where picking congestion and late carrier handoffs account for 71% of missed SLAs.', 'Fix picking at DC-04 first and add evening carrier capacity.', array( array( 'On-time SLA', '96.4%', 'Up 5.8 pts over six weeks', 'is-up' ), array( 'Backlog', '1,240', 'Down 22% since peak week', 'is-up' ) ) ),
	'marketing'  => array( 'spark', 'Marketing', 'Why did customer engagement drop last week, and what should we change?', 'Engagement declined 18% because email click-through fell after send times shifted later, while paid social and webinar engagement remained stable.', 'Optimize email timing. Shift sends to peak open hours.', array( array( 'Engagement rate', '24.8%', 'Down 18% vs previous week', 'is-down' ), array( 'Email CTR', '2.9%', 'Down 21% after timing change', 'is-down' ) ) ),
	'hr'         => array( 'users', 'HR', 'Why is regrettable attrition increasing, and which teams need attention?', 'Attrition is concentrated in engineering and customer success employees with 18–30 months of tenure, driven by promotion delays and manager changes.', 'Review promotion timelines for mid-tenure engineering and customer success staff.', array( array( 'Retention', '91.8%', 'Down 2.1 pts vs prior quarter', 'is-down' ), array( 'Regrettable attrition', '6.4%', 'Up 1.7 pts vs prior quarter', 'is-down' ) ) ),
);

$icl_faqs = array(
	array( 'What is INFOFISCUS Conversa?', 'An enterprise decision intelligence platform that helps business teams ask complex questions, investigate what changed and why, identify key drivers, and turn governed enterprise data into trusted, decision-ready insights.' ),
	array( 'Does Conversa replace our dashboards?', 'No. It complements your existing BI tools by adding a conversational, investigative layer on top of your current analytics stack.' ),
	array( 'Can Conversa work across multiple data platforms?', 'Yes. It connects to major platforms including Snowflake, Google BigQuery, Amazon Redshift, Azure Synapse, Oracle, SQL Server and PostgreSQL.' ),
	array( 'Is Conversa secure?', 'Yes. Queries run on your own cloud warehouse with its encryption and access controls, plus SSO, role-based access and audit trails.' ),
	array( 'How can we evaluate Conversa?', 'Start with a personalized demo, then a Conversa Value Sprint focused on your own business questions.' ),
);

/**
 * Icon from the page sprite.
 *
 * @param string $name Symbol name.
 * @return string SVG markup.
 */
$icl_icon = static function ( $name ) {
	return '<svg class="icl-i" aria-hidden="true" focusable="false"><use href="#icl-' . esc_attr( $name ) . '"/></svg>';
};
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
	<svg class="icl-sprite" aria-hidden="true" focusable="false">
		<symbol id="icl-check" viewBox="0 0 24 24"><path d="m5 12.5 4.5 4.5L19 7.5"/></symbol>
		<symbol id="icl-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
		<symbol id="icl-play" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path class="icl-solid" d="m10 8.5 5.5 3.5-5.5 3.5z"/></symbol>
		<symbol id="icl-code" viewBox="0 0 24 24"><path d="m8 7-5 5 5 5M16 7l5 5-5 5"/></symbol>
		<symbol id="icl-doc" viewBox="0 0 24 24"><path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5M10 13h6M10 17h6"/></symbol>
		<symbol id="icl-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5.5" rx="7" ry="2.5"/><path d="M5 5.5v13c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5v-13M5 12c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5"/></symbol>
		<symbol id="icl-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
		<symbol id="icl-chat" viewBox="0 0 24 24"><path d="M20 12a8 8 0 0 1-11.6 7.1L4 20l1-4.2A8 8 0 1 1 20 12z"/></symbol>
		<symbol id="icl-brain" viewBox="0 0 24 24"><path d="M9 3a4 4 0 0 0-4 4v1a4 4 0 0 0 0 8v1a4 4 0 0 0 7 2.6A4 4 0 0 0 19 17v-1a4 4 0 0 0 0-8V7a4 4 0 0 0-7-2.6A4 4 0 0 0 9 3Z"/><path d="M12 4v16"/></symbol>
		<symbol id="icl-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m20 20-4.2-4.2"/></symbol>
		<symbol id="icl-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.5"/></symbol>
		<symbol id="icl-shield" viewBox="0 0 24 24"><path d="m12 3 7 3v6c0 4.5-3 7.6-7 9-4-1.4-7-4.5-7-9V6z"/><path d="m9 12 2 2 4-4"/></symbol>
		<symbol id="icl-nodes" viewBox="0 0 24 24"><circle cx="6" cy="6" r="2.5"/><circle cx="18" cy="6" r="2.5"/><circle cx="12" cy="18" r="2.5"/><path d="M8 7.5 11 15.5M16 7.5 13 15.5M8.5 6h7"/></symbol>
		<symbol id="icl-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
		<symbol id="icl-bank" viewBox="0 0 24 24"><path d="m3 10 9-6 9 6H3Z"/><path d="M5 10v8M9 10v8M15 10v8M19 10v8M3 20h18"/></symbol>
		<symbol id="icl-chart" viewBox="0 0 24 24"><path d="M4 19V5M4 19h16"/><path d="m7 15 4-4 3 3 5-7"/></symbol>
		<symbol id="icl-spark" viewBox="0 0 24 24"><path d="M12 3c.6 4.6 2.4 6.4 7 7-4.6.6-6.4 2.4-7 7-.6-4.6-2.4-6.4-7-7 4.6-.6 6.4-2.4 7-7z"/></symbol>
		<symbol id="icl-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="icl-x" viewBox="0 0 24 24"><path d="M7 7l10 10M17 7 7 17"/></symbol>
	</svg>

	<section class="icl-hero" aria-labelledby="icl-hero-title">
		<div class="icl-hero-bg" aria-hidden="true"><i></i><i></i><i></i></div>
		<div class="icl-shell icl-hero-brand">
			<img class="icl-logo" src="<?php echo esc_url( $icl_logo ); ?>" width="428" height="65" alt="Infometry Inc. Enabling AI for Every Enterprise">
			<a class="icl-btn icl-btn-primary icl-btn-sm" href="#icl-demo" data-icl-demo>Request a Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
		</div>
		<div class="icl-shell icl-hero-grid">
			<div class="icl-hero-copy">
				<p class="icl-pill"><span class="icl-pulse" aria-hidden="true"></span>INFOFISCUS Conversa™</p>
				<h1 id="icl-hero-title">The Trusted Decision Intelligence Platform <span>for the Enterprise</span></h1>
				<p class="icl-hero-lead">Ask business questions in plain English. Conversa investigates your governed enterprise data, finds the key drivers and hands your leaders decision-ready answers.</p>
				<div class="icl-actions">
					<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>Book a Live Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
					<a class="icl-btn icl-btn-ghost" href="#icl-tour" data-icl-tour><?php echo $icl_icon( 'play' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Try the interactive demo</a>
				</div>
				<ul class="icl-hero-points">
					<li><?php echo $icl_icon( 'shield' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Trusted<br>Answers</span></li>
					<li><?php echo $icl_icon( 'search' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Deeper<br>Analysis</span></li>
					<li><?php echo $icl_icon( 'target' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Actionable<br>Insights</span></li>
					<li><?php echo $icl_icon( 'lock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><span>Enterprise-Grade<br>Security</span></li>
				</ul>
			</div>
			<div class="icl-form-card" id="icl-demo">
				<?php $icl_status = isset( $_GET['icl_lead'] ) ? sanitize_key( wp_unslash( $_GET['icl_lead'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<form class="icl-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" data-icl-form novalidate>
					<p class="icl-form-badge"><span class="icl-pulse" aria-hidden="true"></span>Personalized demo</p>
					<h3>Request your personalized demo</h3>
					<input type="hidden" name="action" value="infometry_landing_lead">
					<input type="hidden" name="icl_t" value="" data-icl-time>
					<input type="hidden" name="icl_url" value="" data-icl-url>
					<div class="icl-hp" aria-hidden="true"><label>Website <input type="text" name="icl_website" tabindex="-1" autocomplete="off"></label></div>
					<label for="icl-name">Full name</label>
					<input id="icl-name" type="text" name="icl_name" placeholder="Jane Smith" autocomplete="name" maxlength="120" required>
					<label for="icl-email">Company email</label>
					<input id="icl-email" type="email" name="icl_email" placeholder="jane@company.com" autocomplete="email" maxlength="160" required>
					<label for="icl-company">Company</label>
					<input id="icl-company" type="text" name="icl_company" placeholder="Company name" autocomplete="organization" maxlength="160" required>
					<label for="icl-phone">Contact number <span>(optional)</span></label>
					<input id="icl-phone" type="tel" name="icl_phone" placeholder="+1 555 000 0000" autocomplete="tel" maxlength="40">
					<button class="icl-btn icl-btn-primary icl-submit" type="submit">Book My Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></button>
					<p class="icl-form-msg<?php echo 'ok' === $icl_status ? ' is-ok' : ( 'error' === $icl_status ? ' is-error' : '' ); ?>" role="status" aria-live="polite" data-icl-msg><?php
					if ( 'ok' === $icl_status ) {
						echo esc_html( 'Thank you. Our analytics team will connect with you to schedule a time.' );
					} elseif ( 'error' === $icl_status ) {
						echo esc_html( 'Please enter your full name, a valid company email and your company.' );
					}
					?></p>
				</form>
				<p class="icl-form-note"><?php echo $icl_icon( 'lock' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Our analytics team will connect with you to schedule a time.</p>
			</div>
		</div>
	</section>

	<section class="icl-proof" aria-label="Results and customers">
		<div class="icl-shell">
			<div class="icl-proof-card" data-icl-reveal>
				<div class="icl-stats">
					<?php foreach ( $icl_stats as $stat ) : ?>
						<div class="icl-stat"><strong><span data-icl-count="<?php echo esc_attr( $stat[0] ); ?>"><?php echo esc_html( $stat[0] ); ?></span><?php echo esc_html( $stat[1] ); ?></strong><span><?php echo esc_html( $stat[2] ); ?></span></div>
					<?php endforeach; ?>
				</div>
				<div class="icl-trust">
					<h2 class="icl-trust-title">Infometry is trusted by <span>150+ customers</span> worldwide</h2>
					<div class="icl-logos" role="region" aria-label="Customer logos">
						<div class="icl-logos-track">
							<?php for ( $loop = 0; $loop < 2; $loop++ ) : ?>
								<?php foreach ( $icl_customers as $customer ) : ?>
									<span class="icl-logo-item"<?php echo $loop ? ' aria-hidden="true"' : ''; ?>><img src="<?php echo esc_url( INFOMETRY_CT_URL . 'assets/images/' . $customer[1] ); ?>" width="<?php echo esc_attr( $customer[2] ); ?>" height="<?php echo esc_attr( $customer[3] ); ?>" loading="lazy" decoding="async" alt="<?php echo $loop ? '' : esc_attr( $customer[0] ); ?>"></span>
								<?php endforeach; ?>
							<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="icl-section icl-problem" aria-labelledby="icl-problem-title">
		<div class="icl-shell icl-split">
			<div data-icl-reveal>
				<p class="icl-kicker">Stop searching reports. Start investigating.</p>
				<h2 id="icl-problem-title"><span class="icl-grad-text">80%</span> of business questions never get answered in time</h2>
				<p class="icl-lead">Dashboards tell you what happened. Your leaders need to know why, and what to do next.</p>
				<a class="icl-link" href="#icl-demo" data-icl-demo>See how Conversa closes the gap <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
			</div>
			<div class="icl-problem-grid">
				<?php foreach ( $icl_problems as $i => $problem ) : ?>
					<div class="icl-card icl-problem-card <?php echo esc_attr( $problem[1] ); ?>" data-icl-reveal style="--d:<?php echo esc_attr( $i * 80 ); ?>ms"><span class="icl-tile"><?php echo $icl_icon( $problem[0] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><p><?php echo esc_html( $problem[2] ); ?></p></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-alt icl-how" aria-labelledby="icl-how-title">
		<div class="icl-shell">
			<div class="icl-head" data-icl-reveal>
				<p class="icl-kicker">How enterprise decision intelligence works</p>
				<h2 id="icl-how-title">From business question to trusted decision</h2>
			</div>
			<div class="icl-stepper" data-icl-stepper>
				<ol class="icl-steps" role="tablist" aria-label="How Conversa answers a question">
					<?php foreach ( $icl_steps as $i => $step ) : ?>
						<li role="presentation">
							<button type="button" class="icl-step<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-icl-step="<?php echo esc_attr( $i ); ?>">
								<span class="icl-step-num"><?php echo esc_html( $i + 1 ); ?></span>
								<span class="icl-step-icon"><?php echo $icl_icon( $step[0] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
								<b><?php echo esc_html( $step[1] ); ?></b>
								<small><?php echo esc_html( $step[2] ); ?></small>
								<i class="icl-step-bar" aria-hidden="true"></i>
							</button>
						</li>
					<?php endforeach; ?>
				</ol>
				<div class="icl-example" data-icl-reveal>
					<div class="icl-example-head">
						<h3 data-icl-ex="0"><span class="icl-q-dot" aria-hidden="true"><?php echo $icl_icon( 'chat' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>Example: "Why did customer engagement drop last week?"</h3>
						<span class="icl-formula">KPIs + Context + Drivers = Action</span>
					</div>
					<div class="icl-example-grid">
						<?php foreach ( $icl_example as $tile ) : ?>
							<div class="icl-example-tile" data-icl-ex="<?php echo esc_attr( $tile[0] ); ?>"><small><?php echo esc_html( $tile[1] ); ?></small><strong class="<?php echo esc_attr( $tile[3] ); ?>"><?php echo esc_html( $tile[2] ); ?></strong></div>
						<?php endforeach; ?>
					</div>
					<p class="icl-action-note" data-icl-ex="4"><b>Recommended action:</b> Optimize email timing. Shift sends to peak open hours.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="icl-section icl-dark icl-tour" id="icl-tour" aria-labelledby="icl-tour-title">
		<div class="icl-hero-bg" aria-hidden="true"><i></i><i></i></div>
		<div class="icl-shell icl-tour-grid">
			<div class="icl-tour-copy" data-icl-reveal>
				<p class="icl-kicker">Interactive demo</p>
				<h2 id="icl-tour-title">See Conversa investigate questions from your own industry</h2>
				<p class="icl-tour-lead">Pick an industry under the window, then click the chats, charts and views. A working preview of the Conversa app with demo data.</p>
				<ul class="icl-check-list">
					<?php foreach ( $icl_demo_points as $point ) : ?>
						<li><?php echo $icl_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo esc_html( $point ); ?></li>
					<?php endforeach; ?>
				</ul>
				<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>Book a Live Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
			</div>
			<div class="icl-tour-demo">
				<?php include INFOMETRY_CT_PATH . 'templates/partials/conversa-live-dashboard.php'; ?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-capabilities" aria-labelledby="icl-cap-title">
		<div class="icl-shell">
			<div class="icl-head" data-icl-reveal>
				<p class="icl-kicker">AI decision intelligence capabilities</p>
				<h2 id="icl-cap-title">Everything your teams need to move from "what happened" to <span class="icl-grad-text">"why"</span></h2>
			</div>
			<div class="icl-cap-grid">
				<?php foreach ( $icl_capabilities as $i => $cap ) : ?>
					<article class="icl-card icl-cap <?php echo esc_attr( $cap[1] ); ?>" data-icl-reveal style="--d:<?php echo esc_attr( ( $i % 3 ) * 90 ); ?>ms">
						<span class="icl-tile"><?php echo $icl_icon( $cap[0] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<p class="icl-cap-kicker"><?php echo esc_html( $cap[2] ); ?></p>
						<h3><?php echo esc_html( $cap[3] ); ?></h3>
						<p><?php echo esc_html( $cap[4] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-alt icl-shift" aria-labelledby="icl-shift-title">
		<div class="icl-shell">
			<div class="icl-head" data-icl-reveal>
				<p class="icl-kicker">The shift Conversa creates</p>
				<h2 id="icl-shift-title">Before and after decision intelligence software</h2>
			</div>
			<div class="icl-shift-list">
				<?php foreach ( $icl_shift as $i => $row ) : ?>
					<div class="icl-shift-row" data-icl-reveal style="--d:<?php echo esc_attr( $i * 80 ); ?>ms">
						<div class="icl-shift-before"><span class="icl-shift-ico"><?php echo $icl_icon( 'x' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><div><small>Before</small><h3><?php echo esc_html( $row[0] ); ?></h3><p><?php echo esc_html( $row[1] ); ?></p></div></div>
						<span class="icl-shift-arrow" aria-hidden="true"><?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<div class="icl-shift-after"><span class="icl-shift-ico"><?php echo $icl_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><div><small>With Conversa</small><h3><?php echo esc_html( $row[2] ); ?></h3><p><?php echo esc_html( $row[3] ); ?></p></div></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="icl-section icl-compare" aria-labelledby="icl-compare-title">
		<div class="icl-shell">
			<div class="icl-head" data-icl-reveal>
				<p class="icl-kicker">Compare decision intelligence tools</p>
				<h2 id="icl-compare-title">Already have Tableau or Power BI? Here's what Conversa adds.</h2>
				<p class="icl-lead">Conversa doesn't replace your dashboards. It adds automated insights, root cause analysis and a governed semantic layer on top of them.</p>
			</div>
			<div class="icl-table-wrap" data-icl-reveal>
				<table class="icl-table">
					<thead>
						<tr><th scope="col">Capabilities</th><th scope="col" class="is-conversa"><span>Conversa</span></th><th scope="col">Tableau</th><th scope="col">Power BI</th><th scope="col">Modern AI Tools</th></tr>
					</thead>
					<tbody>
						<?php foreach ( $icl_compare as $row ) : ?>
							<tr>
								<th scope="row"><?php echo esc_html( $row[0] ); ?></th>
								<?php for ( $c = 1; $c <= 4; $c++ ) : ?>
									<?php $s = $icl_marks[ $row[ $c ] ]; ?>
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
			<div class="icl-head" data-icl-reveal>
				<p class="icl-kicker">Decision intelligence solutions by team</p>
				<h2 id="icl-teams-title">One platform for Finance, Sales, Operations, Marketing and HR</h2>
			</div>
			<div class="icl-tabs" role="tablist" aria-label="Teams">
				<?php $first = true; foreach ( $icl_teams as $key => $team ) : ?>
					<button type="button" role="tab" id="icl-tab-<?php echo esc_attr( $key ); ?>" aria-controls="icl-panel-<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>" tabindex="<?php echo $first ? '0' : '-1'; ?>" data-icl-tab><?php echo $icl_icon( $team[0] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><?php echo esc_html( $team[1] ); ?></button>
				<?php $first = false; endforeach; ?>
			</div>
			<?php $first = true; foreach ( $icl_teams as $key => $team ) : ?>
				<div class="icl-team" role="tabpanel" id="icl-panel-<?php echo esc_attr( $key ); ?>" aria-labelledby="icl-tab-<?php echo esc_attr( $key ); ?>" data-icl-panel<?php echo $first ? '' : ' hidden'; ?>>
					<div class="icl-team-copy">
						<small>Business question</small>
						<h3><?php echo esc_html( $team[2] ); ?></h3>
						<p class="icl-found"><span><?php echo $icl_icon( 'spark' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>Conversa found</span></p>
						<p><?php echo esc_html( $team[3] ); ?></p>
						<p class="icl-action-note"><b>Recommended action:</b> <?php echo esc_html( $team[4] ); ?></p>
					</div>
					<div class="icl-team-kpis">
						<?php foreach ( $team[5] as $kpi ) : ?>
							<div class="icl-kpi <?php echo esc_attr( $kpi[3] ); ?>"><small><?php echo esc_html( $kpi[0] ); ?></small><strong><?php echo esc_html( $kpi[1] ); ?></strong><span><?php echo esc_html( $kpi[2] ); ?></span></div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php $first = false; endforeach; ?>
			<p class="icl-footnote">Illustrative example from the Conversa demo environment.</p>
		</div>
	</section>

	<section class="icl-section icl-faq" aria-labelledby="icl-faq-title">
		<div class="icl-shell icl-faq-inner">
			<div class="icl-head icl-center" data-icl-reveal>
				<p class="icl-kicker">FAQ</p>
				<h2 id="icl-faq-title">Frequently asked questions</h2>
			</div>
			<?php foreach ( $icl_faqs as $i => $faq ) : ?>
				<details class="icl-faq-item"<?php echo 0 === $i ? ' open' : ''; ?>>
					<summary><?php echo esc_html( $faq[0] ); ?><span class="icl-faq-plus" aria-hidden="true"></span></summary>
					<p><?php echo esc_html( $faq[1] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</section>

	<section class="icl-final icl-dark" aria-labelledby="icl-final-title">
		<div class="icl-hero-bg" aria-hidden="true"><i></i><i></i><i></i></div>
		<div class="icl-shell" data-icl-reveal>
			<h2 id="icl-final-title">Turn every business question into a <span class="icl-grad-text">confident decision</span></h2>
			<p>Experience the power of trusted decision intelligence on questions from your own business.</p>
			<div class="icl-actions">
				<a class="icl-btn icl-btn-primary" href="#icl-demo" data-icl-demo>Request a Live Demo <?php echo $icl_icon( 'arrow' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
				<a class="icl-btn icl-btn-ghost" href="#icl-demo" data-icl-demo>Start a Conversa Value Sprint</a>
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
