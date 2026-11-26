<?php
/**
 * Template Name: Google BigTable Connector Product
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

$marketplace_url = 'https://marketplace.informatica.com/listings/cloud/connectors/-infometry-googlebigtable-connector.html';
$guide_url       = 'https://drive.google.com/file/d/1acs0pCjilbNhyVgEnkYrNMVdWxU1ivUL/view?usp=sharing';
$g2_url          = 'https://www.g2.com/products/google-bigtable-connector-for-informatica-idmc/reviews';
$bt              = 'google-connectors/google-bigtable.png';
$idmc            = 'informatica-product-mark.png';
$e               = 'google-sheets/eco-';

$pg = array(
	'faq'         => array(
		'intro' => 'Licensing, updates, support and security: what teams ask before they connect Google Bigtable to Informatica IDMC.',
		'help'  => 'Support is available 24/7 with local time-zone coverage.',
		'facts' => array( array( 'igs-key', 'License', 'Annual, per OrgID · unlimited usage' ), array( 'igs-chat', 'Support', '24/7 · 24-48 hour turnaround' ), array( 'igs-sync', 'Updates', 'Automatic and free with IICS releases' ), array( 'igs-shield', 'Security', 'Verified by Informatica · holds no data' ) ),
		'items' => array(
			array( 'What are the types of Licenses you offer?', 'Infometry connector annual subscription license is charged for a given OrgID. Customers will get un-limited usage of the connectors within an OrgID.' ),
			array( 'How Updates on the new features are released to the customer?', 'Infometry Connector team continue to add new features and support newer API releases for each product Infometry release cycles are synched with the Informatica Cloud platform and customers will get the updates automatically along with IICS release updates. All our new releases are auto-updated at the customer end and are free of charge.' ),
			array( 'Whom to contact for Implementation and License?', 'You can contact Infometry at <a href="mailto:info@infometry.net">info@infometry.net</a>' ),
			array( 'Is it Certified by Informatica?', 'Yes, All our connector are 100% Certified by Informatica and also listed on <a href="' . $marketplace_url . '" target="_blank" rel="noopener">Informatica marketplace</a>.' ),
			array( 'How does your Customer Support work?', 'Our Support is available 24/7 and we provide local time-zone support to all our customers globally.' ),
			array( 'How Infometry charge for the connector?', 'All our connectors are charged based on the number of Prod and Non-Prod licenses subscribed by the customer and it’s completely independent of the number/size of the data/rows processed.' ),
			array( 'How soon business users can onboard and start using the connector?', 'In most cases, it is immediate.' ),
			array( 'Validity of license?', 'All our licenses are charged annually.' ),
			array( 'How Infometry offers Technical Support?', 'It’s available 24/7 with a turnaround time of 24-48 hours' ),
			array( 'How secure is my data?', 'All our connectors and their updates are verified by Informatica before reaching out to the customer. Also, our connectors are activated and work in your environment. Connectors do not hold any data. Our connector ensures highly secured data transfers.' ),
		),
	),
	'related'     => array(
		array( '/product/google-pub-sub/', 'google-connectors/google-pubsub.png', 'Google Pub/Sub Connector', 'The Google PubSub Connector enables Data Integration with Google Pub/Sub, allowing you to pull and push messages seamlessly.' ),
		array( '/product/google-ads-connector/', 'google-connectors/google-ads.png', 'Google Ads Connector', 'Google Ads Connector seamlessly integrates Google Ads with Enterprise Data Lakes and Data Warehouses via the Informatica Cloud platform.' ),
	),
	'cta'         => array(
		'id'        => 'freetrial',
		'anchor2'   => 'freetrialform',
		'kicker'    => 'Free trial',
		'h2'        => 'Free Trial',
		'p'         => 'Bring Google Bigtable data into your IDMC pipelines. Start your 30-day trial and read, insert and delete Google Bigtable data from Informatica IDMC.',
		'checks'    => array( '100% Informatica Certified', 'Billions of rows, thousands of columns', 'Connectors hold no data', '24/7 local time-zone support' ),
		'next'      => array( array( 'Submit your request', 'Takes under a minute.' ), array( 'We activate your trial', 'A 30-day trial license for your IDMC org.' ), array( 'Start syncing', 'Use Bigtable in your mappings and sync tasks.' ) ),
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
$bt_rows = array(
	array( 'user#1042#20261121', 'Emily Carter', 'US', '1,317', '$428.10' ),
	array( 'user#1042#20261120', 'Emily Carter', 'US', '1,284', '$412.90' ),
	array( 'user#2219#20261121', 'Liam Smith', 'UK', '846', '$203.55' ),
	array( 'user#3307#20261121', 'Ana Ruiz', 'ES', '2,051', '$690.00' ),
	array( 'user#4410#20261122', 'Kenji Mori', 'JP', '1,102', '$356.75' ),
	array( 'user#5126#20261122', 'Priya Nair', 'IN', '1,733', '$512.40' ),
);
$bt_connector = array(
	'Read, Write, or Delete data to Bigtable using Infometry’s Connector for Informatica.',
	'Supports Enterprise-Level Data Flows.',
	'Handles billions of rows and thousands of columns without performance loss.',
	'Faster data consolidation across cloud and on-prem systems.',
	'Supports all data types.',
	'Enables Mapping Tasks and Data Synchronization.',
	'Integrates natively with other databases like MySQL, Oracle, and BigQuery.',
);
$bt_features = array(
	array( 'igs-shield', '100% Informatica Certified native interface.', 'is-a' ),
	array( 'igs-chart', 'Real-Time Data Analytics powered by direct integration.', 'is-b' ),
	array( 'igs-layers', 'Supports row-level and column-family operations.', 'is-a' ),
	array( 'pg-rocket', 'Enables read, insert, and delete operations at scale.', 'is-b' ),
	array( 'igs-sync', 'Data Synchronization & ETL-ready for enterprise workloads.', 'is-a' ),
	array( 'igs-db', 'Integrates with enterprise apps and databases including Oracle, MySQL, and BigQuery.', 'is-b' ),
);
?>
<main class="igs-page pg-page bt-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php $pg_sprite(); ?>

	<!-- Hero: a wide-column table being scanned by row key -->
	<section class="igs-hero bt-hero" aria-labelledby="bt-title">
		<div class="igs-shell igs-hero-grid bt-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i>100% Informatica Certified · IDMC (formerly IICS)</span>
				<h1 id="bt-title">Infometry’s Google BigTable Connector for <em>Informatica</em></h1>
				<p>Infometry’s Google Bigtable Connector for Informatica IDMC is 100% Informatica Certified, providing seamless integration and real-time Data Analytics. With Infometry’s connector, you can read, insert, and delete data from Google Bigtable effortlessly. It enables seamless data retrieval, column reading, row insertion, and row deletion using a row key.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary x-btn" href="#freetrial">Free Trial <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> Download User Guide</a>
				</div>
				<div class="igs-proof">
					<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon"><?php $pgi( $idmc ); ?></span><span><b>Informatica Marketplace</b><small>Certified listing</small></span><svg><use href="#igs-out"/></svg></a>
					<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><span class="igs-proof-icon is-g2"><svg><use href="#igs-star"/></svg></span><span><b>G2 Product Reviews</b><small>See customer feedback</small></span><svg><use href="#igs-out"/></svg></a>
				</div>
			</div>

			<div class="bt-explorer" data-bt-explorer aria-label="Animated example: the Infometry connector scans a Google Cloud Bigtable table by row key, reads cells from two column families and sends them to Informatica IDMC">
				<div class="bt-x-top" aria-hidden="true">
					<span class="bt-x-logo"><?php $pgi( $bt ); ?></span>
					<div><b>customer_events</b><small>instance prod-analytics · us-central1</small></div>
					<span class="bt-x-nodes"><i></i><i></i><i></i>3 nodes</span>
				</div>
				<div class="bt-x-scan x-mono" aria-hidden="true"><span>SCAN</span> prefix <b>user#</b> · limit 6 <em data-bt-status>reading…</em></div>
				<div class="bt-x-table" aria-hidden="true">
					<div class="bt-x-fam"><span></span><span class="is-a">cf: profile</span><span class="is-b">cf: metrics</span></div>
					<div class="bt-x-row is-head"><span>row key ↓ sorted</span><span>name</span><span>country</span><span>clicks</span><span>spend</span></div>
					<?php foreach ( $bt_rows as $i => $row ) : ?>
						<div class="bt-x-row" data-bt-row>
							<span class="x-mono"><?php echo esc_html( $row[0] ); ?></span>
							<span><?php echo esc_html( $row[1] ); ?></span>
							<span><?php echo esc_html( $row[2] ); ?></span>
							<span><?php echo esc_html( $row[3] ); ?><?php if ( 0 === $i ) : ?><i class="bt-x-ver" title="3 versions">3</i><?php endif; ?></span>
							<span><?php echo esc_html( $row[4] ); ?></span>
						</div>
					<?php endforeach; ?>
					<div class="bt-x-more">… billions more rows</div>
				</div>
				<div class="bt-versions" aria-hidden="true">
					<b>metrics:clicks</b>
					<span class="is-now"><em>t3</em>1,317<small>now</small></span>
					<span><em>t2</em>1,284<small>−1 day</small></span>
					<span><em>t1</em>1,190<small>−2 days</small></span>
				</div>
				<div class="bt-x-out" aria-hidden="true">
					<span class="bt-x-chip"><?php $pgi( $idmc ); ?>Informatica IDMC</span>
					<span class="bt-x-flow"><i></i></span>
					<span class="bt-x-chip"><?php $pgi( $e . 'snowflake.png' ); ?>Snowflake</span>
					<span class="bt-x-chip"><?php $pgi( $e . 'oracle.png' ); ?>Oracle</span>
				</div>
			</div>
		</div>
	</section>

	<!-- How Bigtable works: one row, exploded -->
	<section class="x-sec bt-works" aria-labelledby="bt-works-title">
		<div class="igs-shell x-grid2">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">Wide-column storage</span>
				<h2 id="bt-works-title">How Google Cloud <em>Bigtable</em> Works</h2>
				<p>Google Cloud Bigtable is a highly scalable, sparsely populated table designed to handle billions of rows and thousands of columns, making it ideal for storing terabytes to petabytes of data. It operates as a distributed, persistent, multidimensional sorted map, widely used for large-scale analytics and operational workloads.</p>
				<ol class="bt-notes">
					<li><b>1</b><p>Google Cloud Bigtable structures data in massively scalable tables, functioning as a sorted key/value map.</p></li>
					<li><b>2</b><p>Each table consists of rows representing individual entities and columns storing corresponding values.</p></li>
					<li><b>3</b><p>Rows are indexed using a unique row key, while related columns are grouped into column families.</p></li>
					<li><b>4</b><p>Each column is uniquely identified by a combination of the column family and a column qualifier.</p></li>
				</ol>
			</div>
			<figure class="bt-anatomy" data-igs-reveal aria-label="Anatomy of a Bigtable table: a sorted map of row keys to column families, column qualifiers and cells">
				<figcaption><span class="x-mono">table</span> customer_events <small>sorted key/value map</small><i>1</i></figcaption>
				<div class="bt-an-row">
					<div class="bt-an-key"><small>row key</small><b class="x-mono">user#1042#20261121</b><i>3</i></div>
					<div class="bt-an-fams">
						<div class="bt-an-fam is-a">
							<header><span>column family</span><b>profile</b></header>
							<div><code>profile:<b>name</b></code><span>Emily Carter</span></div>
							<div><code>profile:<b>country</b></code><span>US</span></div>
						</div>
						<div class="bt-an-fam is-b">
							<header><span>column family</span><b>metrics</b><i>4</i></header>
							<div><code>metrics:<b>clicks</b></code><span>1,317</span></div>
							<div><code>metrics:<b>spend</b></code><span>$428.10</span></div>
						</div>
					</div>
				</div>
				<div class="bt-an-rows"><span>row = one entity</span><i>2</i><em class="x-mono">user#1042#20261120</em><em class="x-mono">user#2219#20261121</em><em class="x-mono">user#3307#20261121</em></div>
			</figure>
		</div>
	</section>

	<!-- The connector: scale meter + capabilities -->
	<section class="x-sec x-dark bt-conn" aria-labelledby="bt-conn-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">The connector</span>
				<h2 id="bt-conn-title">Informatica Google BigTable Connector</h2>
			</div>
			<div class="bt-conn-grid">
				<div class="bt-scale" data-igs-reveal aria-hidden="true">
					<div class="bt-scale-dim"><b>10<sup>9</sup></b><span>rows</span></div>
					<i>×</i>
					<div class="bt-scale-dim"><b>10<sup>3</sup></b><span>columns</span></div>
					<div class="bt-scale-bars"><?php for ( $k = 0; $k < 28; $k++ ) : ?><i style="--d:<?php echo (int) ( $k * 70 ); ?>ms;--h:<?php echo (int) ( 30 + ( ( $k * 37 ) % 70 ) ); ?>%"></i><?php endfor; ?></div>
					<small>terabytes → petabytes · without performance loss</small>
				</div>
				<ul class="bt-caps" data-igs-reveal>
					<?php foreach ( $bt_connector as $i => $line ) : ?>
						<li><span class="x-mono"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><?php echo esc_html( $line ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<p class="bt-ai" data-igs-reveal><svg><use href="#igs-bolt"/></svg><span>With Agentic AI-enabled intelligence, Bigtable integrations powered by Infometry go beyond data pipelines — enabling adaptive ETL, smart query optimization, and automated data-driven decisioning for enterprises.</span></p>
			<div class="bt-links" data-igs-reveal>
				<a href="#freetrial"><svg><use href="#igs-arrow"/></svg>Free Trial</a>
				<a href="<?php echo esc_url( $guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg>Download User Guide</a>
				<a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-out"/></svg>Informatica Marketplace</a>
				<a href="<?php echo esc_url( $g2_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-star"/></svg>G2 Product Reviews</a>
			</div>
		</div>
	</section>

	<!-- How to use: a horizontal track -->
	<section class="x-sec bt-how" aria-labelledby="bt-how-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="bt-how-title">How Can You Use Our Connector</h2>
			</div>
			<ol class="bt-track" data-igs-reveal>
				<li><span class="bt-node"><svg><use href="#pg-search"/></svg></span><em>Marketplace</em><p>Go to <a href="<?php echo esc_url( $marketplace_url ); ?>" target="_blank" rel="noopener">Informatica Marketplace</a>, search for Infometry’s Connector for Informatica, and click on the Start Free Trial button.</p></li>
				<li><span class="bt-node"><svg><use href="#igs-chat"/></svg></span><em>Provisioning</em><p>For paid or subscription licenses, contact us and we’ll help with provisioning.</p></li>
				<li><span class="bt-node"><?php $pgi( $idmc ); ?></span><em>IDMC</em><p>Enable it directly from IDMC (formerly IICS) and reach out to us for license activation.</p></li>
				<li><span class="bt-node"><svg><use href="#igs-key"/></svg></span><em>License</em><p>Two licensing options available: Trial license (30 days) &amp; Paid subscription license</p><span class="bt-lic"><b>30-day trial</b><b>Paid subscription</b></span></li>
			</ol>
		</div>
	</section>

	<!-- Features: tiles coloured like column families -->
	<section class="x-sec x-soft bt-feat" aria-labelledby="bt-feat-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Features</span>
				<h2 id="bt-feat-title">Features of Google BigTable Connector</h2>
				<p>Infometry’s Google Connectors are 100% Informatica Certified and provide native interfaces. Our Connectors enable seamless integration and real-time Data Analytics. Infometry’s Google Connector for Informatica enables easy application integration, data extraction for downstream applications, and ETL for Enterprise Data Warehouse.</p>
			</div>
			<div class="bt-cells">
				<?php foreach ( $bt_features as $i => $f ) : ?>
					<article class="bt-cell <?php echo esc_attr( $f[2] ); ?>" data-igs-reveal>
						<header><code class="x-mono"><?php echo esc_html( 'is-a' === $f[2] ? 'connector:' : 'analytics:' ); ?><b><?php echo esc_html( sprintf( 'f%02d', $i + 1 ) ); ?></b></code><span><svg><use href="#<?php echo esc_attr( $f[0] ); ?>"/></svg></span></header>
						<p><?php echo esc_html( $f[1] ); ?></p>
					</article>
				<?php endforeach; ?>
				<article class="bt-cell is-ai" data-igs-reveal>
					<header><code class="x-mono">agentic:<b>ai</b></code><span><svg><use href="#igs-bolt"/></svg></span></header>
					<p><b>Agentic AI Advantage</b> – Adaptive, self-optimizing pipelines that intelligently manage queries, automate workflows, and improve decision-making from Bigtable datasets.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- Video -->
	<section class="x-sec bt-video" aria-labelledby="bt-video-title">
		<div class="igs-shell bt-video-grid">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="bt-video-title">Learn About Google BigTable Connector</h2>
				<p>A walkthrough of reading, inserting and deleting Bigtable data from Informatica IDMC.</p>
				<p><a class="igs-btn igs-btn-primary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Contact us <svg><use href="#igs-arrow"/></svg></a></p>
			</div>
			<a class="bt-player" href="https://www.youtube.com/watch?v=9nnH7rYPX80" target="_blank" rel="noopener" data-igs-video="9nnH7rYPX80" data-igs-reveal>
				<span class="bt-player-grid" aria-hidden="true"><?php for ( $k = 0; $k < 40; $k++ ) : ?><i></i><?php endfor; ?></span>
				<span class="bt-player-logos" aria-hidden="true"><span><?php $pgi( $bt ); ?></span><span><?php $pgi( $idmc ); ?></span></span>
				<span class="bt-player-play" aria-hidden="true"><svg><use href="#igs-play"/></svg></span>
				<span class="bt-player-cap"><em>Video</em><b>Infometry’s Google BigTable Connector for Informatica</b></span>
			</a>
		</div>
		<div class="igs-modal" data-igs-modal hidden>
			<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Video">
				<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
				<div class="igs-modal-frame" data-igs-frame></div>
			</div>
		</div>
	</section>

	<!-- Use cases: data paths -->
	<section class="x-sec x-dark bt-uses" aria-labelledby="bt-uses-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Use cases</span>
				<h2 id="bt-uses-title">Popular Use Cases</h2>
			</div>
			<ol class="bt-paths">
				<li data-igs-reveal><b class="x-mono">01</b><p>Consolidating massive operational datasets into Data Warehouses and Data Lakes.</p><span class="bt-path" aria-hidden="true"><i><?php $pgi( $bt ); ?></i><em></em><i><?php $pgi( $e . 'snowflake.png' ); ?></i><i><?php $pgi( $e . 'databricks.png' ); ?></i></span></li>
				<li data-igs-reveal><b class="x-mono">02</b><p>Running real-time analytics on petabyte-scale Bigtable datasets.</p><span class="bt-path" aria-hidden="true"><i><?php $pgi( $bt ); ?></i><em></em><i><svg><use href="#igs-chart"/></svg></i></span></li>
				<li data-igs-reveal><b class="x-mono">03</b><p>Integrating Bigtable with cloud and on-prem applications for continuous data sync.</p><span class="bt-path" aria-hidden="true"><i><?php $pgi( $e . 'salesforce.png' ); ?></i><em class="is-both"></em><i><?php $pgi( $bt ); ?></i></span></li>
				<li data-igs-reveal><b class="x-mono">04</b><p>Using Agentic AI-powered pipelines to optimize queries, detect anomalies, and drive predictive insights.</p><span class="bt-path" aria-hidden="true"><i><?php $pgi( $bt ); ?></i><em></em><i><svg><use href="#igs-bolt"/></svg></i></span></li>
			</ol>
			<p class="bt-uses-note" data-igs-reveal>Infometry’s Google Bigtable Connector for Informatica ensures fast, reliable, and intelligent data integration, making it the perfect choice for enterprises building scalable, AI-driven data platforms.</p>
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
