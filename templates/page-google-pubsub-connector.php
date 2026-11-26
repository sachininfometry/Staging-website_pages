<?php
/**
 * Template Name: Google Pub/Sub Connector Product
 * Template Post Type: page, product
 *
 * Own design for this product (hero, sections and animations built around what it does);
 * shares only the connector base (shell, buttons, FAQ, form, footer) with the other product pages.
 * Every heading and line of copy from the original page is kept.
 *
 * @package Infometry_Custom_Templates
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();

$marketplace_url = 'https://marketplace.informatica.com/listings/cloud/connectors/googlepubsub-connector.html';
$guide_url       = 'https://drive.google.com/file/d/1RSZlV9ZAMWFlb6HdLAmn_0eqoMHewO_n/view?usp=sharing';
$g2_url          = 'https://www.g2.com/products/google-pub-sub-connector-for-informatica-idmc/reviews/google-pub-sub-connector-for-informatica-idmc-review-10220928';
$ps              = 'google-connectors/google-pubsub.png';
$idmc            = 'informatica-product-mark.png';
$e               = 'google-sheets/eco-';

$pg = array(
	'faq'         => array(
		'intro' => 'Licensing, updates, support and security: what teams ask before they connect Google Pub/Sub to Informatica IDMC.',
		'help'  => 'Support is available 24/7 with local time-zone coverage.',
		'facts' => array( array( 'igs-key', 'License', 'Prod & Non-Prod · per OrgID' ), array( 'igs-chat', 'Support', '24/7 · 24-48 hour turnaround' ), array( 'igs-sync', 'Updates', 'Automatic and free with IICS releases' ), array( 'igs-shield', 'Security', 'Verified by Informatica · holds no data' ) ),
		'items' => array(
			array( 'What are the types of Licenses you offer?', 'We have two licensing Model, Prod and Non-Prod. Infometry connector annual subscription license is charged for a given OrgID. Customers will get un-limited usage of the connectors within an OrgID.' ),
			array( 'How Updates on the new features are released to the customer?', 'Infometry Connector team continue to add new features and support newer API releases for each product Infometry release cycles are synched with the Informatica Cloud platform and customers will get the updates automatically along with IICS release updates. All our new releases are auto-updated at the customer end and are free of charge.' ),
			array( 'Whom to contact for Implementation and License?', 'You can contact Infometry at <a href="mailto:info@infometry.net">info@infometry.net</a>' ),
			array( 'Is Infometry’s Google Pub/Sub Connector Certified by Informatica?', 'Yes, All our connector are 100% Certified by Informatica and also listed on <a href="' . $marketplace_url . '" target="_blank" rel="noopener">Informatica marketplace</a>.' ),
			array( 'How does your Customer Support work?', 'Our Support is available 24/7 and we provide local time-zone support to all our customers globally.' ),
			array( 'How Infometry charge for the connector?', 'All our connectors are charged based on the number of Prod and Non-Prod licenses subscribed by the customer and it’s completely independent of the number/size of the data/rows processed.' ),
			array( 'How soon business users can onboard and start using the connector?', 'In most cases, it is immediate.' ),
			array( 'What is the validity of the Infometry Connector license?', 'All our licenses are charged annually. And valid for 1 year' ),
			array( 'How Infometry offers Technical Support?', 'It’s available 24/7 with a turnaround time of 24-48 hours. You can contact Infometry at <a href="mailto:info@infometry.net">info@infometry.net</a>' ),
			array( 'How secure is my data?', 'All our Connectors and their updates are verified by Informatica before reaching out to the customer. Also, our connectors are activated by informatica and work in your IICS environment. Connectors do not hold any data. Our connector ensures highly secured data transfers.' ),
		),
	),
	'related'     => array(
		array( '/product/google-bigtable-connector/', 'google-connectors/google-bigtable.png', 'Google BigTable Connector', 'Read, Write, or Delete data to Bigtable using Infometry’s Connector for Informatica, handling billions of rows and thousands of columns.' ),
		array( '/product/google-ads-connector/', 'google-connectors/google-ads.png', 'Google Ads Connector', 'Google Ads Connector seamlessly integrates Google Ads with Enterprise Data Lakes and Data Warehouses via the Informatica Cloud platform.' ),
	),
	'cta'         => array(
		'id'        => 'freetrial',
		'anchor2'   => 'freetrialform',
		'kicker'    => 'Free trial',
		'h2'        => 'Free Trial',
		'p'         => 'Publish and pull Google Pub/Sub messages from IDMC. Start your 30-day trial and connect Google Pub/Sub topics and subscriptions to your on-premise and cloud applications.',
		'checks'    => array( '100% Informatica Certified', 'Unlimited endpoints', 'Connectors hold no data', '24/7 local time-zone support' ),
		'next'      => array( array( 'Submit your request', 'Takes under a minute.' ), array( 'We activate your trial', 'A 30-day trial license for your IDMC org.' ), array( 'Start messaging', 'Use Pub/Sub in your mappings and tasks.' ) ),
		'form_id'   => 351429,
		'form_head' => 'Request Free Trial',
	),
);

require_once INFOMETRY_CT_PATH . 'templates/partials/connector-kit.php';

$img = INFOMETRY_CT_URL . 'assets/images/';
$pg_allowed = array(
	'a'      => array( 'href' => array(), 'target' => array(), 'rel' => array() ),
	'em'     => array(),
	'strong' => array(),
	'b'      => array(),
	'br'     => array(),
	'small'  => array(),
	'p'      => array(),
	'ul'     => array(),
	'li'     => array(),
	'h4'     => array(),
);
/** Print trusted page copy that may hold links or emphasis. */
$pg_html = function ( $html ) use ( $pg_allowed ) {
	echo wp_kses( $html, $pg_allowed );
};
/**
 * Print a logo or icon from a spec: an image path under assets/images, 'svg:<sprite id>',
 * 'txt:<letter>|<colour>' for a lettered tile, or 'bars' for the Power BI style bars.
 */
$pgi = function ( $spec, $alt = '', $svg_class = '' ) use ( $img ) {
	if ( 0 === strpos( $spec, 'svg:' ) ) {
		printf( '<svg%s><use href="#%s"/></svg>', $svg_class ? ' class="' . esc_attr( $svg_class ) . '"' : '', esc_attr( substr( $spec, 4 ) ) );
	} elseif ( 0 === strpos( $spec, 'txt:' ) ) {
		$parts = explode( '|', substr( $spec, 4 ) . '|' );
		printf( '<b class="pg-txt" style="--bg:%s" aria-hidden="true">%s</b>', esc_attr( $parts[1] ? $parts[1] : '#5c4c9f' ), esc_html( $parts[0] ) );
	} elseif ( 'bars' === $spec ) {
		echo '<i class="igs-eco-bars"><i></i><i></i><i></i></i>';
	} else {
		infometry_ct_igs_img( $img . $spec, $alt );
	}
};
$pg_btn = function ( $btn, $class ) {
	$external = 0 === strpos( $btn[1], 'http' );
	printf(
		'<a class="igs-btn %1$s" href="%2$s"%3$s>%4$s%5$s%6$s</a>',
		esc_attr( $class ),
		esc_url( $btn[1] ),
		$external ? ' target="_blank" rel="noopener"' : '',
		! empty( $btn[2] ) ? '<svg><use href="#' . esc_attr( $btn[2] ) . '"/></svg> ' : '',
		esc_html( $btn[0] ),
		empty( $btn[2] ) ? ' <svg><use href="#igs-arrow"/></svg>' : ''
	);
};
$pg_faq_schema = array(
	'@context'   => 'https://schema.org',
	'@type'      => 'FAQPage',
	'mainEntity' => array_map(
		function ( $faq ) {
			return array(
				'@type'          => 'Question',
				'name'           => $faq[0],
				'acceptedAnswer' => array( '@type' => 'Answer', 'text' => trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( str_replace( '<', ' <', $faq[1] ) ) ) ) ),
			);
		},
		$pg['faq']['items']
	),
);
/** Free trial / demo section with its WPForms form. */
$pg_cta = function ( $c ) use ( $pg_html ) {
	$tid = $c['id'] . '-title';
	?>
	<section class="igs-cta" id="<?php echo esc_attr( $c['id'] ); ?>" aria-labelledby="<?php echo esc_attr( $tid ); ?>">
		<?php if ( ! empty( $c['anchor2'] ) ) : ?><span id="<?php echo esc_attr( $c['anchor2'] ); ?>" class="pg-anchor"></span><?php endif; ?>
		<div class="igs-shell igs-cta-grid">
			<div class="igs-cta-copy">
				<span class="igs-kicker"><?php echo esc_html( $c['kicker'] ); ?></span>
				<h2 id="<?php echo esc_attr( $tid ); ?>"><?php $pg_html( $c['h2'] ); ?></h2>
				<p><?php $pg_html( $c['p'] ); ?></p>
				<ul class="igs-cta-checks">
					<?php foreach ( $c['checks'] as $check ) : ?><li><svg><use href="#igs-check"/></svg><?php echo esc_html( $check ); ?></li><?php endforeach; ?>
				</ul>
				<div class="igs-cta-next">
					<b>What happens next</b>
					<ol>
						<?php foreach ( $c['next'] as $n => $next ) : ?><li><span><?php echo (int) $n + 1; ?></span><p><strong><?php echo esc_html( $next[0] ); ?></strong><?php echo esc_html( $next[1] ); ?></p></li><?php endforeach; ?>
					</ol>
				</div>
			</div>
			<div class="igs-form">
				<h3><?php echo esc_html( $c['form_head'] ); ?></h3>
				<?php if ( shortcode_exists( 'wpforms' ) ) : ?>
					<?php echo do_shortcode( sprintf( '[wpforms id="%d" title="false" description="false"]', absint( $c['form_id'] ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<?php else : ?>
					<p>The request form is temporarily unavailable. Email us at <a href="mailto:info@infometry.net">info@infometry.net</a>.</p>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
};
/** Page icons (pg-*) on top of the shared igs-* sprite. */
$pg_sprite = function () {
	?>
	<svg class="igs-sprite" aria-hidden="true" focusable="false">
		<symbol id="pg-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></symbol>
		<symbol id="pg-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></symbol>
		<symbol id="pg-table" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2.5"/><path d="M3 9.5h18M3 15h18M9 9.5V20"/></symbol>
		<symbol id="pg-row" viewBox="0 0 24 24"><rect x="3" y="8" width="18" height="8" rx="2"/><path d="M8 8v8"/></symbol>
		<symbol id="pg-trash" viewBox="0 0 24 24"><path d="M4 7h16M9 7V4.5h6V7M6.5 7l1 13h9l1-13M10 11v5M14 11v5"/></symbol>
		<symbol id="pg-send" viewBox="0 0 24 24"><path d="M21 3 10 14M21 3l-7 18-4-7-7-4 18-7Z"/></symbol>
		<symbol id="pg-inbox" viewBox="0 0 24 24"><path d="M3 13h5l1.5 3h5L16 13h5"/><path d="M5.5 5h13L21 13v6H3v-6l2.5-8Z"/></symbol>
		<symbol id="pg-camera" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="13" rx="2.5"/><circle cx="12" cy="13.5" r="3.5"/><path d="M8.5 7 10 4.5h4L15.5 7"/></symbol>
		<symbol id="pg-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.6 3.8 5.6 3.8 9s-1.2 6.4-3.8 9c-2.6-2.6-3.8-5.6-3.8-9S9.4 5.6 12 3Z"/></symbol>
		<symbol id="pg-trend" viewBox="0 0 24 24"><path d="M3 17 9 11l4 4 8-8"/><path d="M15 7h6v6"/></symbol>
		<symbol id="pg-coin" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M14.8 9.2c-.5-.9-1.6-1.4-2.8-1.4-1.7 0-2.8.9-2.8 2.1 0 2.9 5.8 1.5 5.8 4.3 0 1.2-1.2 2.1-3 2.1-1.3 0-2.5-.6-3-1.6M12 6v1.8M12 16.3V18"/></symbol>
		<symbol id="pg-rocket" viewBox="0 0 24 24"><path d="M14 4c3-1 6-1 6-1s0 3-1 6l-6 6-5-5 6-6Z"/><path d="m8 10-4 .5L3 13l4 1M14 16l-.5 4-2.5 1-1-4"/><circle cx="15" cy="9" r="1.5"/></symbol>
		<symbol id="pg-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.2"/></symbol>
		<symbol id="pg-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="pg-lock" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></symbol>
		<symbol id="pg-funnel" viewBox="0 0 24 24"><path d="M3 4h18l-7 8.5V20l-4-2v-5.5L3 4Z"/></symbol>
		<symbol id="pg-api" viewBox="0 0 24 24"><path d="M8 7 3 12l5 5M16 7l5 5-5 5M14 4l-4 16"/></symbol>
		<symbol id="pg-plug" viewBox="0 0 24 24"><path d="M9 3v5M15 3v5M6 8h12v3a6 6 0 0 1-12 0V8ZM12 17v4"/></symbol>
		<symbol id="pg-robot" viewBox="0 0 24 24"><rect x="4" y="8" width="16" height="12" rx="3"/><path d="M12 8V4M9 13h.01M15 13h.01M9 17h6"/><circle cx="12" cy="3.5" r="1"/></symbol>
		<symbol id="pg-pie" viewBox="0 0 24 24"><path d="M12 3v9h9a9 9 0 1 1-9-9Z"/><path d="M15 3.5A9 9 0 0 1 20.5 9H15V3.5Z"/></symbol>
		<symbol id="pg-snow" viewBox="0 0 24 24"><path d="M12 2v20M3.3 7l17.4 10M3.3 17 20.7 7"/><path d="m9 4 3 2 3-2M9 20l3-2 3 2M4 10.5l1-3.5-3.5-1M20 13.5l-1 3.5 3.5 1M4 13.5 5 17l-3.5 1M20 10.5 19 7l3.5-1"/></symbol>
	</svg>
	<?php
};
$ps_features = array(
	array( 'pg-send', 'Asynchronous Messaging', 'Decouples services that produce events from services that process events.' ),
	array( 'pg-inbox', 'Event Ingestion & Delivery', 'Ideal for streaming analytics pipelines.' ),
	array( 'igs-shield', 'Enterprise-Grade Reliability', 'Offers durable message storage and real-time delivery with high availability.' ),
	array( 'pg-globe', 'Global Scalability', 'Pub/Sub servers available in all Google Cloud regions.' ),
	array( 'igs-layers', 'Comprehensive Operations', 'Publish and pull messages, create/update/delete topics, subscriptions, and snapshots.' ),
	array( 'igs-db', 'Supports CRUD Operations', 'Read, insert, and delete data on Google Pub/Sub targets.' ),
);
$ps_uses = array(
	array( 'integrate-350-apps', 'Integrate 350+ applications with Google Pub/Sub.', 'igs-nodes' ),
	array( 'multi-client-events', 'Gather events from multiple clients simultaneously.', 'pg-users' ),
	array( 'event-driven-workflows', 'Enable real-time event-driven architectures in analytics and business workflows.', 'igs-sync' ),
	array( 'manage-resources', 'Create, read, and delete Google Pub/Sub topics, subscriptions, and snapshots.', 'igs-layers' ),
	array( 'agentic-routing', 'Power streaming analytics platforms with Agentic AI-enabled orchestration for smarter event routing and decisioning.', 'igs-bolt' ),
);
?>
<main class="igs-page pg-page ps-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php $pg_sprite(); ?>

	<!-- Hero: publishers → topic → subscriptions (fan-out) -->
	<section class="igs-hero ps-hero" aria-labelledby="ps-title">
		<div class="igs-shell ps-hero-wrap">
			<div class="igs-hero-copy ps-hero-copy">
				<span class="igs-badge"><i></i>100% Informatica Certified · IDMC (formerly IICS)</span>
				<h1 id="ps-title">Infometry’s Google Pub/Sub Connector for <em>Informatica</em></h1>
				<p>Infometry’s Google Pub/Sub Connector for Informatica IDMC is 100% Informatica Certified, providing a seamless, native interface for integrating Pub/Sub APIs with on-premise or cloud applications like Salesforce and NetSuite. With this connector, users can effortlessly publish and pull messages from Google Pub/Sub.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary x-btn" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<div class="igs-proof">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon"><?php $pgi( $idmc ); ?></span><span><b>Informatica Marketplace</b><small>Certified listing</small></span><svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon is-g2"><svg><use href="#igs-star"/></svg></span><span><b>G2 Product Review</b><small>See customer feedback</small></span><svg><use href="#igs-out"/></svg></a>
				</div>
			</div>

			<div class="ps-bus" data-ps-bus aria-label="Animated example: Salesforce, NetSuite and other applications publish messages to a Google Pub/Sub topic, which fans them out to subscriptions read by Informatica IDMC">
				<svg class="ps-bus-svg" viewBox="0 0 1000 420" preserveAspectRatio="none" aria-hidden="true" focusable="false">
					<defs>
						<linearGradient id="ps-g-in" x1="0" x2="1"><stop offset="0" stop-color="#5ee7df"/><stop offset="1" stop-color="#7c8bff"/></linearGradient>
						<linearGradient id="ps-g-out" x1="0" x2="1"><stop offset="0" stop-color="#7c8bff"/><stop offset="1" stop-color="#ff8fd1"/></linearGradient>
					</defs>
					<path id="ps-p1" d="M190 80 C300 80 330 210 420 210"/>
					<path id="ps-p2" d="M190 210 H420"/>
					<path id="ps-p3" d="M190 340 C300 340 330 210 420 210"/>
					<path id="ps-s1" class="is-out" d="M580 210 C670 210 700 80 810 80"/>
					<path id="ps-s2" class="is-out" d="M580 210 H810"/>
					<path id="ps-s3" class="is-out" d="M580 210 C670 210 700 340 810 340"/>
					<?php foreach ( array( 'p1' => '0s', 'p2' => '-.7s', 'p3' => '-1.4s' ) as $p => $d ) : ?>
						<circle class="ps-dot" r="7"><animateMotion dur="2.1s" begin="<?php echo esc_attr( $d ); ?>" repeatCount="indefinite"><mpath href="#ps-<?php echo esc_attr( $p ); ?>"/></animateMotion></circle>
					<?php endforeach; ?>
					<?php foreach ( array( 's1', 's2', 's3' ) as $p ) : ?>
						<?php foreach ( array( '-.35s', '-1.05s', '-1.75s' ) as $d ) : ?>
							<circle class="ps-dot is-out" r="6"><animateMotion dur="2.1s" begin="<?php echo esc_attr( $d ); ?>" repeatCount="indefinite"><mpath href="#ps-<?php echo esc_attr( $p ); ?>"/></animateMotion></circle>
						<?php endforeach; ?>
					<?php endforeach; ?>
				</svg>
				<div class="ps-col is-pub" aria-hidden="true">
					<small>Publishers</small>
					<span><?php $pgi( $e . 'salesforce.png' ); ?><b>Salesforce</b></span>
					<span><?php $pgi( $e . 'netsuite.png' ); ?><b>NetSuite</b></span>
					<span><svg><use href="#igs-cloud"/></svg><b>Your apps</b></span>
				</div>
				<div class="ps-topic" aria-hidden="true">
					<span class="ps-topic-ring"></span>
					<span class="ps-topic-logo"><?php $pgi( $ps ); ?></span>
					<b>orders-events</b>
					<small>topic</small>
					<em><i data-ps-pub>12,480</i> published</em>
				</div>
				<div class="ps-col is-sub" aria-hidden="true">
					<small>Subscriptions</small>
					<span><?php $pgi( $idmc ); ?><b>idmc-sub</b><em data-ps-ack>4,160</em></span>
					<span><svg><use href="#igs-chart"/></svg><b>analytics-sub</b><em data-ps-ack>4,160</em></span>
					<span><svg><use href="#igs-db"/></svg><b>warehouse-sub</b><em data-ps-ack>4,160</em></span>
				</div>
			</div>
		</div>
	</section>

	<!-- The connector: copy + a message on the wire -->
	<section class="x-sec ps-conn" aria-labelledby="ps-conn-title">
		<div class="igs-shell x-grid2">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">Native IDMC interface</span>
				<h2 id="ps-conn-title">Informatica Google <em>Pub/Sub</em> Connector</h2>
				<p>Designed for smooth data integration, the connector enables direct connectivity between Informatica IDMC and Google Pub/Sub. It supports both source and target functions in mappings and mapping tasks. When executing a task or mapping, the Secure Agent leverages Google Pub/Sub’s JAVA client libraries to ensure secure and efficient data exchange.</p>
				<ul class="ps-ticks">
					<li>Publish to Topics and retrieve messages from subscriptions dynamically</li>
					<li>Supports multiple operations</li>
					<li>Unlimited usage – no restrictions on endpoints</li>
					<li>Integrates seamlessly with Salesforce and other applications</li>
					<li>Supports both Data Synchronization and Mapping Tasks</li>
				</ul>
			</div>
			<div class="ps-msg" data-igs-reveal aria-hidden="true">
				<header><span class="ps-msg-dot"></span><b>PubsubMessage</b><em>ACK ✓</em></header>
				<pre class="x-mono"><span class="k">"messageId"</span>: <span class="s">"8301742619"</span>,
<span class="k">"publishTime"</span>: <span class="s">"2026-11-26T09:41:02Z"</span>,
<span class="k">"attributes"</span>: {
  <span class="k">"source"</span>: <span class="s">"salesforce"</span>,
  <span class="k">"event"</span>: <span class="s">"order.created"</span>
},
<span class="k">"data"</span>: <span class="s">"eyJvcmRlciI6IlNPLTQ4MjExIn0="</span></pre>
				<div class="ps-msg-modes"><span class="is-on">Source in mappings</span><span class="is-on">Target in mappings</span></div>
				<footer><span><svg><use href="#igs-shield"/></svg>Secure Agent</span><i></i><span><svg><use href="#igs-code"/></svg>Pub/Sub JAVA client libraries</span></footer>
			</div>
		</div>
		<div class="igs-shell">
			<p class="ps-ai" data-igs-reveal><svg><use href="#igs-bolt"/></svg><span>With Agentic AI-driven automation, the Pub/Sub Connector evolves beyond standard messaging to support intelligent event handling, adaptive routing, and predictive analytics for enterprises running large-scale data pipelines.</span></p>
			<div class="ps-links" data-igs-reveal>
				<a href="#freetrial" class="is-main">Free Trial <svg><use href="#igs-arrow"/></svg></a>
				<a href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg>Download User Guide</a>
				<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-out"/></svg>Informatica Marketplace</a>
				<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-star"/></svg>G2 Product Review</a>
			</div>
		</div>
	</section>

	<!-- How to use: a queue of acknowledged messages -->
	<section class="x-sec x-dark ps-how" aria-labelledby="ps-how-title">
		<div class="igs-shell ps-how-grid">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="ps-how-title">How Can You Use Our Connector</h2>
				<p>Four messages from request to production, each one acknowledged by our team.</p>
			</div>
			<ol class="ps-queue">
				<li data-igs-reveal><span class="x-mono">msg-01</span><p>Enable it from IDMC (Formerly known as IICS) and contact us for activating the license.</p><em>ACK</em></li>
				<li data-igs-reveal><span class="x-mono">msg-02</span><p>Customers can go to <a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener">Informatica Marketplace</a>, search for Infometry’s Connector, and click on Start Free Trial to send us a request.</p><em>ACK</em></li>
				<li data-igs-reveal><span class="x-mono">msg-03</span><p>For paid or subscription licenses, reach out to us directly for provisioning.</p><em>ACK</em></li>
				<li data-igs-reveal><span class="x-mono">msg-04</span><p>Two license models are available: Trial license (valid for 30 days) &amp; Paid subscription license</p><em>ACK</em></li>
			</ol>
		</div>
	</section>

	<!-- Features: global regions + capability list -->
	<section class="x-sec ps-feat" aria-labelledby="ps-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Features</span>
				<h2 id="ps-feat-title">Features of Google Pub/Sub Connector</h2>
			</div>
			<div class="ps-feat-grid">
				<div class="ps-globe" data-igs-reveal aria-hidden="true">
					<span class="ps-globe-sphere"><i></i><i></i><i></i></span>
					<?php foreach ( array( array( 22, 34 ), array( 30, 58 ), array( 48, 28 ), array( 55, 48 ), array( 66, 36 ), array( 72, 62 ), array( 40, 70 ), array( 80, 44 ) ) as $pi => $pin ) : ?>
						<b class="ps-pin" style="left:<?php echo (int) $pin[0]; ?>%;top:<?php echo (int) $pin[1]; ?>%;--d:<?php echo (int) ( $pi * 300 ); ?>ms"></b>
					<?php endforeach; ?>
					<small>All Google Cloud regions</small>
				</div>
				<ul class="ps-feats">
					<?php foreach ( $ps_features as $f ) : ?>
						<li data-igs-reveal><span><svg><use href="#<?php echo esc_attr( $f[0] ); ?>"/></svg></span><p><b><?php echo esc_html( $f[1] ); ?></b> – <?php echo esc_html( $f[2] ); ?></p></li>
					<?php endforeach; ?>
					<li class="is-ai" data-igs-reveal><span><svg><use href="#igs-bolt"/></svg></span><p><b>Agentic AI Advantage</b> – Enable self-optimizing, automated event workflows that learn and adapt as data streams evolve.</p></li>
				</ul>
			</div>
		</div>
	</section>

	<!-- Use cases as subscriptions -->
	<section class="x-sec x-soft ps-uses" aria-labelledby="ps-uses-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Use cases</span>
				<h2 id="ps-uses-title">Popular Use Cases</h2>
			</div>
			<div class="ps-subs">
				<?php foreach ( $ps_uses as $ui => $use ) : ?>
					<article class="ps-sub<?php echo 4 === $ui ? ' is-ai' : ''; ?>" data-igs-reveal>
						<header><span><svg><use href="#<?php echo esc_attr( $use[2] ); ?>"/></svg></span><code class="x-mono">subscriptions/<b><?php echo esc_html( $use[0] ); ?></b></code></header>
						<p><?php echo esc_html( $use[1] ); ?></p>
						<footer aria-hidden="true"><i></i><i></i><i></i><small>delivering</small></footer>
					</article>
				<?php endforeach; ?>
			</div>
			<div class="ps-close" data-igs-reveal>
				<p>With Infometry’s Google Pub/Sub Connector, enterprises gain not just connectivity, but an AI-ready integration layer to power the next generation of intelligent, event-driven architectures.</p>
				<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact us <svg><use href="#igs-arrow"/></svg></a>
			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="igs-section igs-faq" aria-labelledby="pg-faq-title">
		<div class="igs-shell igs-faq-shell">
			<div class="igs-faq-side" data-igs-reveal>
				<span class="igs-kicker">FAQ</span>
				<h2 id="pg-faq-title">Frequently Asked Questions</h2>
				<p><?php echo esc_html( $pg['faq']['intro'] ); ?></p>
				<div class="igs-faq-help">
					<span><svg><use href="#igs-chat"/></svg></span>
					<b>Still have questions?</b>
					<small><?php echo esc_html( $pg['faq']['help'] ); ?></small>
					<a href="mailto:info@infometry.net">info@infometry.net</a>
					<ul class="igs-faq-facts">
						<?php foreach ( $pg['faq']['facts'] as $fact ) : ?><li><span><svg><use href="#<?php echo esc_attr( $fact[0] ); ?>"/></svg></span><div><small><?php echo esc_html( $fact[1] ); ?></small><b><?php echo esc_html( $fact[2] ); ?></b></div></li><?php endforeach; ?>
					</ul>
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <svg><use href="#igs-arrow"/></svg></a>
				</div>
			</div>
			<div class="igs-faq-list">
				<?php foreach ( $pg['faq']['items'] as $fi => $faq ) : ?>
					<details<?php echo 0 === $fi ? ' open' : ''; ?>>
						<summary><?php echo esc_html( $faq[0] ); ?><span aria-hidden="true"><svg><use href="#igs-plus"/></svg></span></summary>
						<div class="pg-faq-a"><?php $pg_html( false === strpos( $faq[1], '<p>' ) ? '<p>' . $faq[1] . '</p>' : $faq[1] ); ?></div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
		<script type="application/ld+json"><?php echo wp_json_encode( $pg_faq_schema ); ?></script>
	</section>

	<!-- Other products -->
	<section class="igs-section igs-related" aria-labelledby="pg-related-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Explore more</span>
				<h2 id="pg-related-title">Other Products</h2>
			</div>
			<div class="igs-related-grid">
				<?php foreach ( $pg['related'] as $card ) : ?>
					<a class="igs-related-card" href="<?php echo esc_url( home_url( $card[0] ) ); ?>" data-igs-reveal>
						<span><?php $pgi( $card[1], '', 'igs-pipe-generic' ); ?></span>
						<div><h3><?php echo esc_html( $card[2] ); ?></h3><p><?php echo esc_html( $card[3] ); ?></p><em>Read more <svg><use href="#igs-arrow"/></svg></em></div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	if ( ! empty( $pg['cta'] ) ) {
		$pg_cta( $pg['cta'] );
	}
	?>

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
					<a class="infometry-footer-contact" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact Us <span aria-hidden="true">→</span></a>
				</div>
				<nav class="infometry-footer-column" aria-label="Footer products"><h3>Products</h3><a href="<?php echo esc_url( home_url( '/product/infofiscus-conversa-decision-intelligence/' ) ); ?>">INFOFISCUS Conversa</a><a href="<?php echo esc_url( home_url( '/product/informatica-connectors/' ) ); ?>">Informatica Connectors</a><a href="<?php echo esc_url( home_url( '/product/#infofiscus-snowflake-native-apps' ) ); ?>">INFOFISCUS Snowflake Native Apps</a><a href="<?php echo esc_url( home_url( '/product/#pre-built-apps' ) ); ?>">Pre-Built Apps For IDMC and Matillion</a><a href="<?php echo esc_url( home_url( '/product/accelerators-for-data-warehouse-migration-automation/' ) ); ?>">Accelerators</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer resources"><h3>Resources</h3><a href="<?php echo esc_url( home_url( '/resources/blog/' ) ); ?>">Blog</a><a href="<?php echo esc_url( home_url( '/resources/infometry-case-studies/' ) ); ?>">Case Studies</a><a href="<?php echo esc_url( home_url( '/resources/whitepapers/' ) ); ?>">Whitepapers</a><a href="<?php echo esc_url( home_url( '/resources/gallery/' ) ); ?>">Gallery</a><a href="<?php echo esc_url( home_url( '/resources/webinar/' ) ); ?>">Webinar</a><a href="<?php echo esc_url( home_url( '/resources/press-releases/' ) ); ?>">Press Releases</a></nav>
				<nav class="infometry-footer-column" aria-label="Footer company"><h3>Company</h3><a href="<?php echo esc_url( home_url( '/company/customers-partners/' ) ); ?>">Customers – Partners</a><a href="<?php echo esc_url( home_url( '/company/careers/' ) ); ?>">Careers</a><a href="<?php echo esc_url( home_url( '/company/life-at-infometry/' ) ); ?>">Life@Infometry</a><a href="<?php echo esc_url( home_url( '/company/testimonials/' ) ); ?>">Testimonials</a></nav>
			</div>
			<div class="infometry-footer-bottom"><span>© 2026 Infometry Inc. All Rights Reserved.</span><span>Enabling AI for Every Enterprise</span></div>
		</div>
	</footer>
</main>
<?php get_footer(); ?>
