<?php
/**
 * Template Name: NetSuite to Snowflake Connector Product
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

$sf_market_url  = 'https://app.snowflake.com/marketplace/providers/GZSTZ3867OQ/Infometry';
$odbc_guide_url = 'https://docs.google.com/document/d/1bPJKFO7UNkOznxYHizjvSSOLHcAi_jGM/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$api_guide_url  = 'https://docs.google.com/document/d/1Vj3cyVa-Vf2Gi0X3J7HS75H4uxPitxkn/edit?usp=sharing&ouid=105669807723544294607&rtpof=true&sd=true';
$ns             = 'google-sheets/eco-netsuite.png';
$sf             = 'google-sheets/eco-snowflake.png';
$e              = 'google-sheets/eco-';

$pg = array(
	'faq'         => array(
		'intro' => 'ODBC vs API, setup, synchronization and support: what teams ask before they move NetSuite data into Snowflake.',
		'help'  => 'Our team helps you through every step of your integration.',
		'facts' => array( array( 'pg-snow', 'Runs in', 'Your Snowflake account · Native App' ), array( 'igs-sync', 'Sync', 'Near real-time · bulk & incremental' ), array( 'igs-check', 'Uptime', '99.9% reliable synchronization' ), array( 'pg-lock', 'Security', 'Data stays within Snowflake' ) ),
		'items' => array(
			array( 'What is the INFOFISCUS NetSuite ODBC Connector?', 'The INFOFISCUS NetSuite ODBC Connector is a comprehensive, pre-built connector available as a native application in the Snowflake Marketplace. It facilitates seamless integration between NetSuite and Snowflake, allowing for easy data extraction with a single click.' ),
			array( 'How can I benefit from using the INFOFISCUS NetSuite ODBC Connector?', 'The connector streamlines the data integration process, saving you time and resources. It’s a Native Application for Snowflake that provides near real-time data synchronization, allowing for accurate and up-to-date analytics. With our connector, you can focus on deriving insights rather than managing complex data pipelines.' ),
			array( 'Can I customize the synchronization settings?', 'Yes, you can customize the synchronization settings to select specific objects from NetSuite and define how frequently the data should be synced with Snowflake. This flexibility allows you to tailor the integration to your specific business needs.' ),
			array( 'What is the advantage of using a Snowflake Native App?', 'As a Snowflake Native App, the INFOFISCUS NetSuite ODBC Connector is optimized for seamless integration with Snowflake. This native compatibility ensures better performance, reliability, and ease of use compared to non-native solutions.' ),
			array(
				'What is the difference between Netsuite ODBC Connector and Netsuite API based connector?',
				'<p>Both the NetSuite ODBC Connector and the NetSuite API-Based Connector offer powerful methods to integrate and extract data from NetSuite, but they cater to different business needs and technical requirements. Let’s explore the unique strengths of each:</p>'
				. '<h4>NetSuite ODBC Connector</h4><ul>'
				. '<li><b>Seamless Data Extraction:</b> The ODBC Connector is a ready-to-use solution for direct access to NetSuite data using standard ODBC drivers. It is designed for businesses looking for an easy, plug-and-play option to extract data into Snowflake without the need for custom development.</li>'
				. '<li><b>No API Knowledge Required:</b> With the ODBC Connector, there’s no need to invest in learning or understanding NetSuite APIs or designing custom data pipelines. Data is synchronized in near real-time, making it ideal for companies seeking a simplified yet powerful integration solution.</li>'
				. '<li><b>Pre-Built Integration:</b> The connector is available as a pre-built Snowflake Native App, offering out-of-the-box connectivity, allowing users to select specific objects and set synchronization frequencies.</li></ul>'
				. '<h4>NetSuite API-Based Connector</h4><ul>'
				. '<li><b>Customizability:</b> The API-Based Connector offers more flexibility for businesses that need highly customized data extraction processes. With access to NetSuite’s APIs, users can create tailored integrations that address specific business requirements or complex data workflows.</li>'
				. '<li><b>Advanced Operations:</b> For companies that want to go beyond basic data extraction, the API-based connector provides advanced operations such as data manipulation, transformation, and real-time integration. This is especially useful for companies with complex data models and workflows that require deeper control over the integration process.</li>'
				. '<li><b>Developer Flexibility:</b> The API-based solution is ideal for businesses with in-house technical teams that prefer to build custom pipelines, offering flexibility to define how data is processed, integrated, and transformed.</li></ul>'
				. '<h4>Complementary Solutions</h4>'
				. '<p>Both connectors provide secure, reliable integration between NetSuite and Snowflake, ensuring data integrity and near real-time synchronization.</p>'
				. '<p>For businesses that prioritize ease of use and rapid setup, the NetSuite ODBC Connector is an excellent choice. On the other hand, organizations looking for deeper customization and control may find the NetSuite API-Based Connector more suitable.</p>'
				. '<p>By leveraging the right connector for your specific business needs, you can efficiently harness the full potential of NetSuite and Snowflake to enhance your data integration and analytics capabilities.</p>',
			),
			array(
				'How to Get Started using Netsuite ODBC and Netsuite to Snowflake Connector?',
				'<h4>1. Getting Started with NetSuite ODBC Connector:</h4><ul>'
				. '<li><b>Step 1: Install the ODBC Connector</b><br>Begin by downloading the INFOFISCUS NetSuite ODBC Connector from the Snowflake Marketplace. Once installed, configure it with your NetSuite Suite analytics credentials.</li>'
				. '<li><b>Step 2: Configure Connection Settings</b><br>Set up your connection by specifying the necessary parameters such as Host Id, Password, etc. The pre-built interface makes this step quick and user-friendly.</li>'
				. '<li><b>Step 3: Sync Data to Snowflake</b><br>With a single click, you can begin synchronizing your NetSuite data into Snowflake. The near real-time syncing ensures you always have up-to-date information for analytics.</li>'
				. '<li><b>Step 4: Analyze Data</b><br>Once the data is synced into Snowflake, access your Landing tables and begin building your analytical layer to derive valuable insights.</li></ul>'
				. '<h4>2. Getting Started with NetSuite API-Based Connector:</h4><ul>'
				. '<li><b>Step 1: Access NetSuite APIs</b><br>Obtain your NetSuite API credentials and access tokens. You’ll need this information to authenticate and connect to NetSuite using the API-based connector.</li>'
				. '<li><b>Step 2: Define API Integration Requirements</b><br>Identify the specific data objects you want to integrate and decide on the customizations required for your business. The flexibility of the API allows you to define the scope of your data extraction and operations.</li>'
				. '<li><b>Step 3: Build Custom Pipelines</b><br>Work with your development team to create tailored data pipelines. You can set up specific rules for data transformation, syncing schedules, and real-time updates based on your business logic.</li>'
				. '<li><b>Step 4: Integrate with Snowflake</b><br>Once the API-based pipeline is set up. This will allow you to directly push NetSuite data into Snowflake for storage, processing, and analysis.</li></ul>'
				. '<h4>Which Connector Should I Choose?</h4>'
				. '<p>For businesses looking for a hassle-free, quick-to-deploy solution, the NetSuite ODBC Connector is an ideal choice. However, if you require extensive customization and deeper control over data workflows, the NetSuite API-Based Connector will offer the flexibility and advanced capabilities you need.</p>'
				. '<p>Whichever you choose, both connectors empower you to integrate NetSuite seamlessly with Snowflake, maximizing your business intelligence and analytics potential.</p>',
			),
			array( 'What is Infometry’s NetSuite to Snowflake Connector?', 'Infometry’s NetSuite to Snowflake Connector, part of the INFOFISCUS Snowflake Native Application, is a NO CODE solution designed to extract data from NetSuite applications in near real-time and sync it into Snowflake.' ),
			array( 'How does the NetSuite to Snowflake Connector simplify data integration?', 'Our connector eliminates the need for expensive ETL tools or complex data pipeline code by providing a no-code solution that installs directly within your Snowflake account, facilitating seamless data synchronization from NetSuite.' ),
			array( 'What are the key benefits of using Infometry’s NetSuite to Snowflake Connector?', '<ul><li><b>Real-Time Data Synchronization:</b> Ensures your data is always up-to-date.</li><li><b>User-Friendly Configuration:</b> Easy setup and management with an intuitive interface.</li><li><b>Scalability:</b> Robust architecture that handles growing data volumes seamlessly.</li><li><b>Enhanced Security:</b> Advanced encryption and secure transfer protocols.</li><li><b>Comprehensive Support:</b> Dedicated support team available to assist you.</li></ul>' ),
			array( 'How does the connector improve business operations?', '<ul><li><b>99.9% Uptime:</b> Reliable and continuous data synchronization.</li><li><b>90% Faster Data Integration:</b> Reduces integration time from days to hours.</li><li><b>Up to 50% Reduction in Operational Costs:</b> Efficient data integration leads to significant cost savings.</li><li><b>30% Improvement in Data Query Performance:</b> Faster data queries enhance decision-making capabilities.</li><li><b>100% Data Accuracy:</b> Ensures accurate and consistent data transfers.</li></ul>' ),
			array( 'What makes Infometry’s connector different from other data integration solutions?', 'Our connector provides lightning-fast data processing, real-time synchronization, unparalleled scalability, and performance optimized for large-scale data operations. The user-friendly interface and automated workflows make data management simple and efficient.' ),
			array( 'Can Infometry’s connector handle large volumes of data?', 'Yes, our connector is designed to handle massive data volumes, scaling seamlessly from thousands to millions of records while maintaining top-notch performance.' ),
			array( 'What kind of support does Infometry provide?', 'Infometry offers comprehensive support through a dedicated team ready to assist you throughout your data integration journey. Our customers report a 95% satisfaction rate, thanks to our reliable support and service offerings.' ),
			array( 'Are there customization options available?', 'Yes, Infometry provides tailored solutions to meet the unique requirements of your business, along with expert consultation and implementation support to guide you through every step of the integration process.' ),
		),
	),
	'related'     => array(
		array( '/product/marketo-to-snowflake-connector/', 'txt:M|#5c4c9f', 'Marketo Connector', 'Infometry’s Marketo Connector for Snowflake simplifies Marketo integration, bypassing the need for complex APIs and drivers.' ),
		array( '/product/sales-analytics-native-app/', 'svg:igs-chart', 'Sales Analytics Native App', 'INFOFISCUS Sales Analytics on Snowflake efficiently handles data ingestion, transformation, and AI/ML-powered analytics.' ),
	),
	'cta'         => array(),
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
$ns_objects = array(
	array( 'Customer', '184,220', 'INCR' ),
	array( 'Sales Order', '1,204,918', 'BULK' ),
	array( 'Invoice', '962,507', 'INCR' ),
	array( 'Vendor Bill', '311,846', 'INCR' ),
	array( 'Item', '48,390', 'BULK' ),
);
$ns_stats = array(
	array( '99.9%', 'Uptime', 'Consistent, reliable, and uninterrupted data synchronization.', 99.9, '' ),
	array( '150%', 'Faster Replication', 'Millions of records processed in record time.', 100, 'Up to' ),
	array( '50%', 'Cost Savings', 'Scalable architecture cuts overhead and boosts efficiency.', 50, '' ),
	array( '30%', 'Faster Queries', 'Speed up decision-making with efficient schemas.', 30, '' ),
	array( '100%', 'Data Accuracy', 'Accelerate your processes, reducing integration time from days to mere hours.', 100, '' ),
	array( '100%', 'Data Security', 'Your data remains secure within the Snowflake environment.', 100, '' ),
);
$ns_logos = array(
	array( 'customer-ibm-logo.png', 'IBM' ), array( 'customer-sandisk-logo.png', 'SanDisk' ), array( 'customer-michaels-logo.png', 'Michaels' ),
	array( 'customer-fusionio-logo.png', 'Fusion-io' ), array( 'customer-adaptive-insights-logo.png', 'Adaptive Insights' ), array( 'customer-asana-logo.png', 'Asana' ),
	array( 'customer-belk-logo.png', 'Belk' ), array( 'customer-sanofi-logo.png', 'Sanofi' ), array( 'customer-informatica-logo.png', 'Informatica' ),
);
?>
<main class="igs-page pg-page ns-page" id="igs-main">
	<?php include INFOMETRY_CT_PATH . 'templates/partials/connector-sprite.php'; ?>
	<?php $pg_sprite(); ?>

	<!-- Hero: replication console -->
	<section class="igs-hero ns-hero" aria-labelledby="ns-title">
		<div class="igs-shell igs-hero-grid ns-hero-grid">
			<div class="igs-hero-copy">
				<span class="igs-badge"><i></i>INFOFISCUS NetSuite Connector 3.0 · Snowflake Native App</span>
				<h1 id="ns-title">NetSuite to Snowflake Connector | <em>Real-Time ERP Data Integration</em></h1>
				<p>Migrating or syncing data from NetSuite to Snowflake can be complex, often requiring costly ETL tools or custom code to overcome NetSuite’s API limitations. Customers want a simple, no-code solution to replicate data with minimal effort.</p>
				<div class="igs-actions">
					<a class="igs-btn igs-btn-primary x-btn" href="#request-demo">Request a Free Demo <svg><use href="#igs-arrow"/></svg></a>
					<a class="igs-btn igs-btn-ghost" href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-out"/></svg> Snowflake Marketplace</a>
				</div>
				<div class="ns-hero-guides">
					<a href="<?php echo esc_url( $api_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg>API Connector User Guide</a>
					<a href="<?php echo esc_url( $odbc_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg>ODBC Connector User Guide</a>
				</div>
			</div>

			<div class="ns-console" data-ns-console aria-label="Animated example: the INFOFISCUS NetSuite Connector replicates NetSuite objects into Snowflake tables created from NetSuite metadata, through either the API or the ODBC connector">
				<header aria-hidden="true">
					<span class="ns-c-logos"><i><?php $pgi( $ns ); ?></i><b></b><i><?php $pgi( $sf ); ?></i></span>
					<div><b>INFOFISCUS Replication</b><small>Snowflake Native App · ENV <em>PROD</em></small></div>
					<span class="ns-c-mode"><i data-ns-mode="API" class="is-on">API</i><i data-ns-mode="ODBC">ODBC</i></span>
				</header>
				<div class="ns-c-count" aria-hidden="true">
					<div><small>Records replicated</small><b data-ns-count>2,712,880</b></div>
					<div><small>Elapsed</small><b class="x-mono" data-ns-time>00:52:14</b></div>
					<div class="ns-c-bar"><i data-ns-bar style="width:90%"></i><span>Target: 3M records &lt; 1 hour</span></div>
				</div>
				<div class="ns-c-body" aria-hidden="true">
					<ul class="ns-c-objs">
						<?php foreach ( $ns_objects as $i => $o ) : ?>
							<li data-ns-obj class="<?php echo $i < 3 ? 'is-done' : ( 3 === $i ? 'is-run' : '' ); ?>"><i></i><b><?php echo esc_html( $o[0] ); ?></b><span class="x-mono"><?php echo esc_html( $o[1] ); ?></span><em><?php echo esc_html( $o[2] ); ?></em></li>
						<?php endforeach; ?>
					</ul>
					<pre class="ns-c-ddl x-mono"><span class="c">-- created from NetSuite metadata</span>
<span class="k">CREATE TABLE</span> NS_SALES_ORDER (
  ID          <span class="t">STRING</span>,
  AMOUNT      <span class="t">DOUBLE</span>,
  TAX_RATE    <span class="t">FLOAT</span>,
  CREATED_AT  <span class="t">TIMESTAMP</span>
);</pre>
				</div>
			</div>
		</div>
	</section>

	<!-- #1 fastest + release notes -->
	<section class="x-sec ns-fast" aria-labelledby="ns-fast-title">
		<div class="igs-shell ns-fast-grid">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">INFOFISCUS NetSuite Connector 3.0</span>
				<h2 id="ns-fast-title">The #1 Fastest <em>NetSuite Connector</em> for Snowflake</h2>
				<p>Infometry’s INFOFISCUS NetSuite Connector for Snowflake delivers exactly that—a next-gen, no-code native application that extracts and replicates NetSuite data directly into your Snowflake account with blazing speed and reliability. Available on the <a href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener">Snowflake Marketplace</a>, this connector ensures seamless, near real-time data synchronization without the hassle of ETL or manual processes.</p>
				<p>With the newly released INFOFISCUS NetSuite Connector 3.0, customers gain access to massive performance improvements, accurate schema generation, and optimized pipelines—all built natively for Snowflake.</p>
			</div>
			<div class="ns-notes" data-igs-reveal>
				<header><span class="x-mono">v3.0</span><h2>Key Highlights of Version 3.0</h2></header>
				<article><em class="is-perf">PERF</em><div><h3>Improved Replication Performance &amp; Reliability</h3><p>Handle millions of records with confidence. The connector delivers up to 3 million records in less than an hour, ensuring error-free transfers without timeouts or delays.</p></div></article>
				<article><em class="is-schema">SCHEMA</em><div><h3>Metadata-Driven Target Tables</h3><p>Target tables are automatically created based on NetSuite metadata, with full support for STRING, DOUBLE, TIMESTAMP, and FLOAT data types.</p></div></article>
				<article><em class="is-pipe">PIPELINE</em><div><h3>Optimized ETL/ELT Pipelines</h3><p>Accurate data types are applied at ingestion, eliminating unnecessary transformations and delivering faster, more efficient pipelines with reduced processing time.</p></div></article>
				<article><em class="is-guide">GUIDE</em><div><h3>Best Practices for Performance</h3><p>Built-in guidance helps you optimize bulk or incremental loads by scheduling jobs during off-peak hours, ensuring minimal impact on NetSuite performance.</p></div></article>
			</div>
		</div>
	</section>

	<!-- API vs ODBC -->
	<section class="x-sec x-soft ns-vs" aria-labelledby="ns-vs-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">API or ODBC</span>
				<h2 id="ns-vs-title">Two Powerful Connector Versions</h2>
				<p>Infometry offers two types of connectors to meet your integration needs:</p>
			</div>
			<div class="ns-vs-grid">
				<article class="ns-ver is-api" data-igs-reveal>
					<div class="ns-route" aria-hidden="true"><i><?php $pgi( $ns ); ?></i><span><b class="x-mono">REST API</b></span><i><?php $pgi( $sf ); ?></i></div>
					<h2>1. NetSuite API Connector for Snowflake</h2>
					<p>A pre-built, native application that seamlessly extracts NetSuite data into Snowflake with a single click.</p>
					<ul>
						<li><h3>One-Click Data Sync</h3><p>Sync data in near real-time.</p></li>
						<li><h3>No API Knowledge Required</h3><p>Skip custom pipelines or API complexity.</p></li>
						<li><h3>Landing Tables for Analytics</h3><p>Access ready-to-use data in Snowflake.</p></li>
					</ul>
				</article>
				<span class="ns-vs-badge" aria-hidden="true">VS</span>
				<article class="ns-ver is-odbc" data-igs-reveal>
					<div class="ns-route" aria-hidden="true"><i><?php $pgi( $ns ); ?></i><span><b class="x-mono">ODBC driver</b></span><i><?php $pgi( $sf ); ?></i></div>
					<h2>2. NetSuite ODBC Connector for Snowflake</h2>
					<p>A robust, pre-built application leveraging the NetSuite ODBC driver for high-frequency, high-volume data syncs.</p>
					<ul>
						<li><h3>Easy ODBC Connectivity</h3><p>Seamless, fast, and reliable data integration for effortless workflows.</p></li>
						<li><h3>Near Real-Time Sync</h3><p>Emphasizes both speed and accuracy in moving data</p></li>
						<li><h3>Simplified Access</h3><p>Quick Snowflake insights with landing tables.</p></li>
					</ul>
				</article>
			</div>
			<div class="ns-choose" data-igs-reveal>
				<div><h2>Choose Your Ideal Connector and Start Syncing!</h2><p>Both connectors offer powerful, easy-to-use solutions to move your NetSuite data to Snowflake in near real-time. Explore both solutions on the Snowflake Marketplace and unlock seamless NetSuite data integration today!</p></div>
				<div class="pg-btns">
					<a class="igs-btn igs-btn-primary" href="<?php echo esc_url( $odbc_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> ODBC Connector User Guide</a>
					<a class="igs-btn igs-btn-outline" href="<?php echo esc_url( $api_guide_url ); ?>" target="_blank" rel="noopener"><svg><use href="#igs-down"/></svg> API Connector User Guide</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Results: ring gauges -->
	<section class="x-sec x-dark ns-stats" aria-labelledby="ns-why-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">Proven results</span>
				<h2 id="ns-why-title">Why Choose INFOFISCUS Connectors?</h2>
				<h3 class="ns-sub">Exceptional Results in Numbers:</h3>
			</div>
			<div class="ns-gauges">
				<?php foreach ( $ns_stats as $si => $s ) : ?>
					<article data-igs-reveal style="--p:<?php echo esc_attr( $s[3] ); ?>">
						<span class="ns-ring" aria-hidden="true"><i></i></span>
						<h3><?php if ( $s[4] ) : ?><small><?php echo esc_html( $s[4] ); ?></small> <?php endif; ?><b><?php echo esc_html( $s[0] ); ?></b> <?php echo esc_html( $s[1] ); ?></h3>
						<p><?php echo esc_html( $s[2] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Key features as pipeline settings -->
	<section class="x-sec ns-set" aria-labelledby="ns-set-title">
		<div class="igs-shell ns-set-grid">
			<div class="x-copy" data-igs-reveal>
				<span class="igs-kicker">Key features</span>
				<h2 id="ns-set-title">Key Features of NetSuite API/ODBC Connector</h2>
				<p>Everything you configure for a replication job, in one place.</p>
			</div>
			<div class="ns-panel" data-igs-reveal>
				<header><svg><use href="#igs-sync"/></svg><b>Replication job settings</b><small class="x-mono">job: ns_to_snowflake</small></header>
				<div class="ns-row"><span><svg><use href="#igs-layers"/></svg></span><div><h3>Incremental and Bulk Data Support</h3><p>Easily manage incremental updates &amp; large data loads</p></div><em class="ns-seg" aria-hidden="true"><i class="is-on">Incremental</i><i>Bulk</i></em></div>
				<div class="ns-row"><span><svg><use href="#igs-db"/></svg></span><div><h3>High-Volume Processing</h3><p>Efficiently process millions of rows in a single run.</p></div><em class="ns-val x-mono" aria-hidden="true">1,000,000+ rows</em></div>
				<div class="ns-row"><span><svg><use href="#igs-calendar"/></svg></span><div><h3>Automated Scheduling</h3><p>Easily schedule data loads with built-in automation.</p></div><em class="ns-val x-mono" aria-hidden="true">02:00 · off-peak</em></div>
				<div class="ns-row"><span><svg><use href="#pg-rocket"/></svg></span><div><h3>Quick Setup</h3><p>Bypass ETL complexity—start instantly!</p></div><em class="ns-toggle" aria-hidden="true"><i></i></em></div>
			</div>
		</div>
	</section>

	<!-- Get started: vertical stepper -->
	<section class="x-sec x-soft ns-steps" aria-labelledby="ns-steps-title">
		<div class="igs-shell ns-steps-grid">
			<div class="x-copy ns-steps-head" data-igs-reveal>
				<span class="igs-kicker">Get started</span>
				<h2 id="ns-steps-title">Get Started in 4 Easy Steps</h2>
				<p>Unlock seamless, blazing-fast, and reliable NetSuite-to-Snowflake integration with INFOFISCUS NetSuite Connector 3.0—your simplest path to real-time analytics and smarter decisions.</p>
				<p><a class="igs-btn igs-btn-primary" href="#request-demo">Request a Free Demo <svg><use href="#igs-arrow"/></svg></a></p>
			</div>
			<ol class="ns-stepper">
				<li data-igs-reveal><b>1</b><div><h3>Step 1:</h3><p><a href="<?php echo esc_url( $sf_market_url ); ?>" target="_blank" rel="noopener">Visit the Snowflake Marketplace</a> – Ensure your Snowflake paid subscription is active.</p></div></li>
				<li data-igs-reveal><b>2</b><div><h3>Step 2:</h3><p>Search INFOFISCUS Connectors – Select either API or ODBC, then click ‘Get’ to start integrating your data.</p></div></li>
				<li data-igs-reveal><b>3</b><div><h3>Step 3:</h3><p>Set up your connection by entering your NetSuite details and testing it to ensure everything works smoothly.</p></div></li>
				<li data-igs-reveal><b>4</b><div><h3>Step 4:</h3><p>Start Syncing Data – Select your environment (QA, DEV, PROD) and replicate with a click.</p><span class="ns-envs" aria-hidden="true"><i>QA</i><i>DEV</i><i class="is-on">PROD</i></span></div></li>
			</ol>
		</div>
	</section>

	<!-- Architecture -->
	<section class="x-sec ns-arch" aria-labelledby="ns-arch-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Architecture</span>
				<h2 id="ns-arch-title">Architecture of INFOFISCUS Connector for NetSuite - Snowflake</h2>
			</div>
			<div class="ns-arch-map" data-igs-reveal aria-label="NetSuite data flows through the API or ODBC connector into the INFOFISCUS Native App inside the customer's Snowflake account, lands in tables and feeds analytics">
				<div class="ns-a-src"><span><?php $pgi( $ns ); ?></span><b>NetSuite</b><small>ERP</small></div>
				<div class="ns-a-lanes" aria-hidden="true">
					<span><i></i><b class="x-mono">API</b></span>
					<span><i></i><b class="x-mono">ODBC</b></span>
				</div>
				<div class="ns-a-acct">
					<small class="ns-a-tag"><?php $pgi( $sf ); ?>Your Snowflake account</small>
					<div class="ns-a-app"><b>INFOFISCUS Native App</b><span>QA · DEV · PROD</span></div>
					<i class="ns-a-down" aria-hidden="true"></i>
					<div class="ns-a-tables"><span>NS_CUSTOMER</span><span>NS_SALES_ORDER</span><span>NS_INVOICE</span><span>NS_ITEM</span></div>
					<i class="ns-a-down" aria-hidden="true"></i>
					<div class="ns-a-bi"><span><svg><use href="#igs-chart"/></svg>BI &amp; dashboards</span><span><svg><use href="#igs-bolt"/></svg>AI/ML</span><span><svg><use href="#igs-layers"/></svg>Analytics layer</span></div>
				</div>
			</div>
		</div>
	</section>

	<!-- Videos -->
	<section class="x-sec x-dark ns-videos" aria-labelledby="ns-video-title">
		<div class="igs-shell">
			<div class="igs-head is-light" data-igs-reveal>
				<span class="igs-kicker">See it in action</span>
				<h2 id="ns-video-title">Learn More About INFOFISCUS Connector for NetSuite - Snowflake</h2>
			</div>
			<div class="ns-vid-grid">
				<?php foreach ( array( array( 'qF3ZnsvyUE8', 'INFOFISCUS NetSuite to Snowflake Connector', 'Overview' ), array( 'IKSrRt4jtDE', 'NetSuite data into Snowflake with the INFOFISCUS Native App', 'Demo' ) ) as $v ) : ?>
					<a class="ns-vid" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $v[0] ); ?>" target="_blank" rel="noopener" data-igs-video="<?php echo esc_attr( $v[0] ); ?>" data-igs-reveal>
						<span class="ns-vid-scr" aria-hidden="true"><i><?php $pgi( $ns ); ?></i><em></em><i><?php $pgi( $sf ); ?></i><span class="ns-vid-play"><svg><use href="#igs-play"/></svg></span></span>
						<span class="ns-vid-cap"><em><?php echo esc_html( $v[2] ); ?></em><b><?php echo esc_html( $v[1] ); ?></b></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="igs-modal" data-igs-modal hidden>
			<div class="igs-modal-box" role="dialog" aria-modal="true" aria-label="Video">
				<button type="button" class="igs-modal-close" data-igs-close aria-label="Close video"><svg><use href="#igs-plus"/></svg></button>
				<div class="igs-modal-frame" data-igs-frame></div>
			</div>
		</div>
	</section>

	<?php
	$pg_cta(
		array(
			'id'        => 'request-demo',
			'anchor2'   => 'freetrial',
			'kicker'    => 'Free demo',
			'h2'        => 'Request a Free Demo of the NetSuite to Snowflake Connector',
			'p'         => 'See how INFOFISCUS replicates your NetSuite data into Snowflake in near real-time, with no code and no ETL tools.',
			'checks'    => array( 'No-code Snowflake Native App', 'API & ODBC versions', 'Data stays in Snowflake', '99.9% uptime' ),
			'next'      => array( array( 'Submit your request', 'Takes under a minute.' ), array( 'We schedule your demo', 'With our NetSuite & Snowflake team.' ), array( 'Start syncing', 'Get the connector from the Snowflake Marketplace.' ) ),
			'form_id'   => 376110,
			'form_head' => 'Request a Free Demo',
		)
	);
	?>

	<!-- Customers -->
	<section class="x-sec ns-logos" aria-labelledby="ns-logos-title">
		<div class="igs-shell">
			<div class="igs-head" data-igs-reveal>
				<span class="igs-kicker">Customers</span>
				<h2 id="ns-logos-title">Trusted by 150+ Customers Worldwide</h2>
			</div>
			<div class="ns-marquee" data-igs-reveal>
				<ul>
					<?php foreach ( array_merge( $ns_logos, $ns_logos ) as $li => $logo ) : ?>
						<li<?php echo $li >= count( $ns_logos ) ? ' aria-hidden="true"' : ''; ?>><?php $pgi( $logo[0], $li >= count( $ns_logos ) ? '' : $logo[1] ); ?></li>
					<?php endforeach; ?>
				</ul>
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
