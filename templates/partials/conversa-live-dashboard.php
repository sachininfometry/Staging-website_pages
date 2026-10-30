<?php
/**
 * INFOFISCUS Conversa hero: a working miniature of the Conversa app that plays
 * through Home, a chat answer, Storybooks, the admin Dashboard and Connections
 * like a short product video, and can be clicked through by the visitor.
 *
 * Everything is rendered here in its finished state (charts included), so the
 * hero reads as a complete product screen before or without the script.
 * assets/js/infofiscus-conversa.js drives the tour; styles live at the end of
 * assets/css/infofiscus-conversa.css under .icp-live.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$lv_img = INFOMETRY_CT_URL . 'assets/images/';

if ( ! function_exists( 'infometry_ct_lv_line_chart' ) ) {
	/**
	 * Area + line chart in a 320x150 view box.
	 *
	 * @param array  $values Data points, oldest first.
	 * @param float  $max    Top of the y axis.
	 * @param string $unit   Suffix for the axis labels.
	 * @return string SVG markup.
	 */
	function infometry_ct_lv_line_chart( $values, $max, $unit = '' ) {
		$left   = 30;
		$right  = 8;
		$top    = 10;
		$plot   = 128;
		$base   = $top + $plot;
		$step   = ( 320 - $left - $right ) / ( count( $values ) - 1 );
		$points = array();
		foreach ( $values as $i => $value ) {
			$points[] = round( $left + $step * $i, 1 ) . ',' . round( $top + $plot * ( 1 - $value / $max ), 1 );
		}
		$last = explode( ',', end( $points ) );
		$out  = '';
		foreach ( array( 0, 0.5, 1 ) as $k ) {
			$y    = round( $top + $plot * ( 1 - $k ), 1 );
			$out .= '<line class="lv-grid" x1="' . $left . '" x2="' . ( 320 - $right ) . '" y1="' . $y . '" y2="' . $y . '"/>';
			$out .= '<text class="lv-tick" x="' . ( $left - 6 ) . '" y="' . ( $y + 3 ) . '">' . esc_html( ( $max * $k ) . $unit ) . '</text>';
		}
		$out .= '<path class="lv-area" d="M' . $left . ',' . $base . ' L' . implode( ' L', $points ) . ' L' . $last[0] . ',' . $base . ' Z"/>';
		$out .= '<polyline class="lv-line" pathLength="1" points="' . implode( ' ', $points ) . '"/>';
		$out .= '<circle class="lv-dot" cx="' . $last[0] . '" cy="' . $last[1] . '" r="4"/>';
		return $out;
	}
}

$lv_nav = array(
	array( 'view' => 'home', 'icon' => 'home', 'label' => 'Home' ),
	array( 'view' => 'chat', 'icon' => 'edit', 'label' => 'New chat' ),
	array( 'view' => 'storybooks', 'icon' => 'book', 'label' => 'Storybooks' ),
	array( 'view' => 'dashboard', 'icon' => 'grid', 'label' => 'Dashboard' ),
	array( 'view' => 'connections', 'icon' => 'db', 'label' => 'Connections' ),
);

if ( ! function_exists( 'infometry_ct_lv_combo_chart' ) ) {
	/**
	 * Bars on the left axis and a line on the right axis, in a 560x160 view box.
	 * Rows are array( label, bar value, line value, flagged ); flagged bars are amber.
	 *
	 * @param array $chat One entry of $lv_chats.
	 * @return string SVG markup.
	 */
	function infometry_ct_lv_combo_chart( $chat ) {
		$rows = $chat['rows'];
		$band = ( 560 - 44 - 34 ) / count( $rows );
		$out  = '';
		foreach ( array( 0, 0.5, 1 ) as $k ) {
			$y    = round( 10 + 112 * ( 1 - $k ), 1 );
			$bar  = $chat['bar_max'] * $k;
			$out .= '<line class="lv-grid" x1="44" x2="526" y1="' . $y . '" y2="' . $y . '"/>';
			$out .= '<text class="lv-tick" x="38" y="' . ( $y + 3 ) . '">' . esc_html( $k ? sprintf( $chat['bar_fmt'], $bar ) : '0' ) . '</text>';
			$out .= '<text class="lv-tick is-right" x="532" y="' . ( $y + 3 ) . '">' . esc_html( $chat['line_max'] * $k ) . '</text>';
		}
		$out   .= '<g class="lv-bars">';
		$points = array();
		foreach ( $rows as $i => $row ) {
			$cx       = 44 + $band * $i + $band / 2;
			$y        = 10 + 112 * ( 1 - $row[1] / $chat['bar_max'] );
			$out     .= '<rect class="lv-bar' . ( ! empty( $row[3] ) ? ' is-low' : '' ) . '" x="' . round( $cx - $band * 0.26, 1 ) . '" y="' . round( $y, 1 ) . '" width="' . round( $band * 0.52, 1 ) . '" height="' . round( max( 1.5, 122 - $y ), 1 ) . '" rx="3"><title>' . esc_html( $row[0] . ': ' . sprintf( $chat['bar_fmt'], $row[1] ) . ' ' . $chat['legend'][0] ) . '</title></rect>';
			$out     .= '<text class="lv-lab" x="' . round( $cx, 1 ) . '" y="140">' . esc_html( $row[0] ) . '</text>';
			$points[] = round( $cx, 1 ) . ',' . round( 10 + 112 * ( 1 - $row[2] / $chat['line_max'] ), 1 );
		}
		$out .= '</g><g class="lv-vol"><polyline class="lv-line" pathLength="1" points="' . implode( ' ', $points ) . '"/>';
		foreach ( $points as $i => $point ) {
			list( $x, $y ) = explode( ',', $point );
			$out          .= '<circle class="lv-dot" cx="' . $x . '" cy="' . $y . '" r="3.5"><title>' . esc_html( $rows[ $i ][0] . ': ' . $rows[ $i ][2] . ' ' . $chat['legend'][2] ) . '</title></circle>';
		}
		return $out . '</g>';
	}
}

// Sidebar chats: each opens its own answer in the chat view.
$lv_chats = array(
	array(
		'title'    => 'High sales volume',
		'agent'    => 'gemini_GBQ_agent',
		'version'  => 'v2',
		'source'   => 'GBQ',
		'model'    => 'Gemini 2.5 Pro',
		'thinking' => 'Analyzing 2.4M rows in BigQuery',
		'question' => 'Which products have high sales volume but low revenue?',
		'summary'  => '4 of the top 8 products by volume earn under $25K each. <b>Home 97</b> sold 23 units for only $618, so pricing and promotions on these items need review.',
		'kpis'     => array( array( 'Products analyzed', '120' ), array( 'Outliers found', '4' ), array( 'Answered in', '6.8 s' ) ),
		'legend'   => array( 'Total revenue', 'Under $25K', 'Units sold' ),
		'bar_max'  => 180,
		'bar_fmt'  => '$%sK',
		'line_max' => 50,
		'rows'     => array( array( 'Grocery 161', 144.9, 40 ), array( 'Grocery 86', 164.3, 38 ), array( 'Sports 5', 21.5, 35, true ), array( 'Home 112', 115.2, 31 ), array( 'Electr. 35', 10.9, 27, true ), array( 'Electr. 37', 4.4, 27, true ), array( 'Home 97', 0.6, 23, true ), array( 'Electr. 142', 4.1, 20, true ) ),
	),
	array(
		'title'    => 'Q3 financial summary',
		'agent'    => 'finance_sf_agent',
		'version'  => 'v3',
		'source'   => 'SNOW',
		'model'    => 'Claude Sonnet 4',
		'thinking' => 'Querying 1.1M ledger rows in Snowflake',
		'question' => 'Summarize Q3 revenue by region against plan.',
		'summary'  => 'Q3 revenue closed at <b>$121.4M</b>, 4.2% above plan. North America led with $52.4M, while <b>APAC and ANZ</b> finished below plan on delayed renewals.',
		'kpis'     => array( array( 'Q3 revenue', '$121.4M' ), array( 'Vs plan', '+4.2%' ), array( 'Gross margin', '68.3%' ) ),
		'legend'   => array( 'Revenue', 'Below plan', 'YoY growth %' ),
		'bar_max'  => 60,
		'bar_fmt'  => '$%sM',
		'line_max' => 30,
		'rows'     => array( array( 'N. America', 52.4, 18 ), array( 'EMEA', 31.8, 12 ), array( 'APAC', 18.6, 6, true ), array( 'LATAM', 9.7, 24 ), array( 'ANZ', 5.4, 9, true ), array( 'Middle East', 3.5, 27 ) ),
	),
	array(
		'title'    => 'Customer churn analysis',
		'agent'    => 'cx_databricks_agent',
		'version'  => 'v1',
		'source'   => 'DBX',
		'model'    => 'GPT-4.1',
		'thinking' => 'Scoring 8,400 accounts in Databricks',
		'question' => 'Which customer segments have the highest churn risk this quarter?',
		'summary'  => '<b>SMB monthly</b> accounts show 14.2% churn risk, 3x the enterprise average. Low product usage in the first 60 days is the strongest predictor.',
		'kpis'     => array( array( 'At-risk accounts', '312' ), array( 'Revenue at risk', '$2.8M' ), array( 'Model accuracy', '91%' ) ),
		'legend'   => array( 'Churn risk', 'Above 10%', 'Accounts' ),
		'bar_max'  => 16,
		'bar_fmt'  => '%s%%',
		'line_max' => 1200,
		'rows'     => array( array( 'Enterprise', 4.1, 180 ), array( 'Mid-Market', 6.3, 420 ), array( 'SMB Annual', 8.8, 610 ), array( 'SMB Monthly', 14.2, 980, true ), array( 'Public Sector', 3.2, 95 ), array( 'Education', 11.6, 240, true ) ),
	),
	array(
		'title'    => 'Supply chain risks',
		'agent'    => 'supply_sf_agent',
		'version'  => 'v2',
		'source'   => 'SNOW',
		'model'    => 'Gemini 2.5 Pro',
		'thinking' => 'Joining 52K purchase orders in Snowflake',
		'question' => 'Which suppliers are most likely to delay shipments next month?',
		'summary'  => '6 of 40 suppliers deliver on time less than 85% of the time. <b>Pacific Components</b> runs 9.4 days late on average, putting $1.2M of Q4 inventory at risk.',
		'kpis'     => array( array( 'Suppliers analyzed', '40' ), array( 'At-risk suppliers', '6' ), array( 'Inventory at risk', '$1.2M' ) ),
		'legend'   => array( 'On-time delivery', 'Below 85%', 'Avg days late' ),
		'bar_max'  => 100,
		'bar_fmt'  => '%s%%',
		'line_max' => 10,
		'rows'     => array( array( 'Pacific', 79, 9.4, true ), array( 'Nordic', 96, 1.2 ), array( 'Delta', 83, 6.1, true ), array( 'Sunrise', 91, 2.8 ), array( 'Atlas', 81, 7.5, true ), array( 'Metro', 97, 0.9 ), array( 'Orion', 84, 5.2, true ), array( 'Vertex', 93, 2.1 ) ),
	),
	array(
		'title'    => 'APAC revenue decline',
		'agent'    => 'sales_gbq_agent',
		'version'  => 'v2',
		'source'   => 'GBQ',
		'model'    => 'Claude Sonnet 4',
		'thinking' => 'Comparing August and September in BigQuery',
		'question' => 'Why did APAC revenue decline in September?',
		'summary'  => 'APAC revenue fell 8.6% month over month to <b>$5.9M</b>. Japan and Australia drove 82% of the drop, mainly from 14 enterprise renewals that slipped to October.',
		'kpis'     => array( array( 'APAC revenue', '$5.9M' ), array( 'Month over month', '-8.6%' ), array( 'Renewals delayed', '14' ) ),
		'legend'   => array( 'September revenue', 'Declined vs August', 'Deals closed' ),
		'bar_max'  => 2,
		'bar_fmt'  => '$%sM',
		'line_max' => 30,
		'rows'     => array( array( 'Japan', 1.84, 14, true ), array( 'Australia', 1.21, 9, true ), array( 'India', 0.98, 22 ), array( 'Singapore', 0.76, 11 ), array( 'Korea', 0.64, 8 ), array( 'New Zealand', 0.47, 5 ) ),
	),
);

$lv_recent = array(
	array( 'title' => 'Sales performance for the Canada region', 'agent' => 'mistral_gbq_agent', 'db' => 'GBQ_CONN', 'yaml' => 'MIK_SALES_ANALYTICS.yaml', 'time' => 'Oct 27, 8:31 PM' ),
	array( 'title' => 'High sales volume but low revenue?', 'agent' => 'gemini_GBQ_agent', 'db' => 'Conn_BIGQUERY', 'yaml' => 'ORDER_ANALYSIS_VIEWS.yaml', 'time' => 'Oct 27, 8:30 PM' ),
);

$lv_storybooks = array(
	array( 'tone' => 'is-violet', 'title' => 'Finance', 'copy' => 'Finance department', 'chats' => 2, 'people' => 1, 'date' => 'Oct 27' ),
	array( 'tone' => 'is-blue', 'title' => 'Sales Ops', 'copy' => 'Pipeline and bookings', 'chats' => 5, 'people' => 3, 'date' => 'Oct 26' ),
	array( 'tone' => 'is-teal', 'title' => 'Supply Chain', 'copy' => 'Inventory and vendors', 'chats' => 3, 'people' => 2, 'date' => 'Oct 24' ),
);

// Admin dashboard: one panel per tab.
$lv_dash = array(
	'overview'    => array(
		'label' => 'Overview',
		'kpis'  => array(
			array( 'users', 'Daily Active Users', '128', 'Live today' ),
			array( 'bolt', 'Active Sessions', '452', '4.9 prompts / session' ),
			array( 'shield', 'DAU / MAU Stickiness', '50.0%', 'Healthy' ),
			array( 'spark', 'All-time Prompts', '28,150', '22.3M tokens' ),
		),
		'line'  => array( 'Daily Active Users', 'Unique users who sent a prompt', array( 62, 70, 68, 84, 91, 88, 97, 110, 104, 118, 126, 121, 133, 128 ), 150, '' ),
		'bars'  => array( 'Subject Area Usage', array( array( 'Sales', 2026, 100 ), array( 'General', 540, 27 ), array( 'Finance', 312, 16 ), array( 'Inventory', 148, 8 ), array( 'Operations', 95, 5 ) ) ),
	),
	'performance' => array(
		'label' => 'Performance',
		'kpis'  => array(
			array( 'bolt', 'Avg SQL Exec', '1.2 s', 'Fast' ),
			array( 'spark', 'Avg SQL Generation', '2.4 s', 'Gemini 2.5 Pro' ),
			array( 'grid', 'Avg End-to-End', '6.8 s', 'Down 31% this month' ),
			array( 'check', 'Success Rate', '94%', 'Last 30 days' ),
		),
		'line'  => array( 'Avg Response Time', 'Seconds, lower is better', array( 9.8, 9.1, 8.7, 8.9, 8.2, 7.9, 7.6, 7.8, 7.3, 7.1, 7.0, 6.9, 6.8, 6.8 ), 12, 's' ),
		'bars'  => array( 'Failures by Stage', array( array( 'SQL Execution', 33, 100 ), array( 'SQL Generation', 12, 36 ), array( 'Summary', 3, 9 ) ) ),
	),
	'tokens'      => array(
		'label' => 'Tokens',
		'kpis'  => array(
			array( 'spark', 'Total Tokens', '22.3M', 'Input + output' ),
			array( 'db', 'Input Tokens', '21.7M', 'Context and SQL' ),
			array( 'edit', 'Output Tokens', '564K', 'Answers and charts' ),
			array( 'users', 'Avg per Prompt', '8.1K', 'All roles' ),
		),
		'line'  => array( 'Tokens per Day', 'Millions of tokens', array( 0.4, 0.6, 0.5, 0.9, 1.1, 0.8, 1.2, 1.5, 1.3, 1.6, 1.9, 1.7, 2.1, 1.8 ), 2.5, 'M' ),
		'bars'  => array( 'Tokens by Team', array( array( 'Finance', '9.8M', 100 ), array( 'Sales Ops', '6.4M', 65 ), array( 'Supply Chain', '3.9M', 40 ), array( 'Marketing', '2.2M', 22 ) ) ),
	),
);

$lv_databases = array(
	array( 'name' => 'Snowflake', 'logo' => 'tech-logos/snowflake-mark.png', 'size' => array( 182, 182 ), 'count' => 12 ),
	array( 'name' => 'Databricks', 'logo' => 'databricks-mark.png', 'size' => array( 80, 72 ), 'count' => 6 ),
	array( 'name' => 'BigQuery', 'logo' => 'google-cloud-mark.png', 'size' => array( 224, 224 ), 'count' => 9 ),
	array( 'name' => 'PostgreSQL', 'badge' => 'Pg', 'count' => 7 ),
	array( 'name' => 'SQL Server', 'logo' => 'tech-logos/sql-server-mark.png', 'size' => array( 191, 208 ), 'count' => 4 ),
	array( 'name' => 'Oracle', 'logo' => 'tech-logos/oracle-mark.png', 'size' => array( 224, 142 ), 'count' => 2 ),
);

$lv_agents = array(
	array( 'name' => 'OpenAI', 'logo' => 'llm-marks/openai-mark.png', 'size' => array( 96, 96 ), 'count' => 6 ),
	array( 'name' => 'Gemini', 'logo' => 'llm-marks/gemini-mark.png', 'size' => array( 96, 96 ), 'count' => 36 ),
	array( 'name' => 'Claude', 'logo' => 'llm-marks/claude-mark.png', 'size' => array( 96, 96 ), 'count' => 5 ),
	array( 'name' => 'Mistral AI', 'logo' => 'llm-marks/mistral-ai-mark.png', 'size' => array( 96, 96 ), 'count' => 3 ),
	array( 'name' => 'Cortex Analyst', 'logo' => 'tech-logos/snowflake-mark.png', 'size' => array( 182, 182 ), 'count' => 2 ),
	array( 'name' => 'INFOFISCUS SLM', 'logo' => 'infofiscus-conversa-mark.png', 'size' => array( 141, 120 ), 'count' => 1 ),
);

$lv_scenes = array(
	array( 'home', 'Home' ),
	array( 'chat', 'Ask' ),
	array( 'storybooks', 'Storybooks' ),
	array( 'dashboard', 'Dashboard' ),
	array( 'connections', 'Connections' ),
);
?>
<div class="icp-live" data-icp-live role="region" aria-roledescription="product tour" aria-label="INFOFISCUS Conversa product tour">
	<svg class="lv-sprite" aria-hidden="true" focusable="false">
		<symbol id="lv-home" viewBox="0 0 24 24"><path d="M3.5 11 12 4l8.5 7v8.5a1 1 0 0 1-1 1H15v-6H9v6H4.5a1 1 0 0 1-1-1z"/></symbol>
		<symbol id="lv-edit" viewBox="0 0 24 24"><path d="M4 20h4L19 9l-4-4L4 16z"/><path d="m14 6 4 4"/></symbol>
		<symbol id="lv-book" viewBox="0 0 24 24"><path d="M5 5a2 2 0 0 1 2-2h12v15H7a2 2 0 0 0-2 2z"/><path d="M5 20a2 2 0 0 0 2 1h12v-3"/></symbol>
		<symbol id="lv-grid" viewBox="0 0 24 24"><rect x="4" y="4" width="7" height="7" rx="1.6"/><rect x="13" y="4" width="7" height="7" rx="1.6"/><rect x="4" y="13" width="7" height="7" rx="1.6"/><rect x="13" y="13" width="7" height="7" rx="1.6"/></symbol>
		<symbol id="lv-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5.5" rx="7" ry="2.5"/><path d="M5 5.5v13c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5v-13"/><path d="M5 12c0 1.4 3.1 2.5 7 2.5s7-1.1 7-2.5"/></symbol>
		<symbol id="lv-chat" viewBox="0 0 24 24"><path d="M20 12a8 8 0 0 1-11.6 7.1L4 20l1-4.2A8 8 0 1 1 20 12z"/></symbol>
		<symbol id="lv-send" viewBox="0 0 24 24"><path d="m4 12 16-8-6 16-2.5-6.5z"/></symbol>
		<symbol id="lv-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="lv-check" viewBox="0 0 24 24"><path d="m5 12.5 4.5 4.5L19 7.5"/></symbol>
		<symbol id="lv-spark" viewBox="0 0 24 24"><path d="M12 3c.6 4.6 2.4 6.4 7 7-4.6.6-6.4 2.4-7 7-.6-4.6-2.4-6.4-7-7 4.6-.6 6.4-2.4 7-7z"/></symbol>
		<symbol id="lv-shield" viewBox="0 0 24 24"><path d="m12 3 7 3v6c0 4.5-3 7.6-7 9-4-1.4-7-4.5-7-9V6z"/></symbol>
		<symbol id="lv-bolt" viewBox="0 0 24 24"><path d="M13 3 5 14h6l-1 7 8-11h-6z"/></symbol>
		<symbol id="lv-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m20 20-4.2-4.2"/></symbol>
		<symbol id="lv-play" viewBox="0 0 24 24"><path class="lv-solid" d="M8 5v14l11-7z"/></symbol>
		<symbol id="lv-pause" viewBox="0 0 24 24"><path class="lv-solid" d="M7 5h3.5v14H7zM13.5 5H17v14h-3.5z"/></symbol>
		<linearGradient id="lv-g-bar" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#7b8cff"/><stop offset="1" stop-color="#4f46e5"/></linearGradient>
		<linearGradient id="lv-g-low" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffc061"/><stop offset="1" stop-color="#f97316"/></linearGradient>
		<linearGradient id="lv-g-area" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#2f8cff" stop-opacity=".38"/><stop offset="1" stop-color="#2f8cff" stop-opacity="0"/></linearGradient>
	</svg>

	<div class="lv-app" data-lv-app>
		<div class="lv-chrome" aria-hidden="true"><span class="lv-lights"><i></i><i></i><i></i></span><span class="lv-chrome-title"><svg><use href="#lv-shield"/></svg>INFOFISCUS Conversa</span><span class="lv-live"><i></i>Live</span></div>
		<aside class="lv-side">
			<img class="lv-logo" src="<?php echo esc_url( $lv_img . 'press-releases/conversa-slack/infofiscus-conversa-logo-white.png' ); ?>" width="667" height="147" loading="lazy" decoding="async" title="INFOFISCUS Conversa" alt="INFOFISCUS Conversa logo">
			<nav class="lv-nav" aria-label="Conversa app sections">
				<?php foreach ( $lv_nav as $item ) : ?>
					<button type="button" class="lv-nav-item<?php echo 'chat' === $item['view'] ? ' is-active' : ''; ?>" data-lv-go="<?php echo esc_attr( $item['view'] ); ?>"<?php echo 'chat' === $item['view'] ? ' aria-current="page"' : ''; ?>><svg aria-hidden="true"><use href="#lv-<?php echo esc_attr( $item['icon'] ); ?>"/></svg><span><?php echo esc_html( $item['label'] ); ?></span></button>
				<?php endforeach; ?>
			</nav>
			<p class="lv-side-head">Chats</p>
			<ul class="lv-chats">
				<?php foreach ( $lv_chats as $i => $chat ) : ?>
					<li><button type="button" class="lv-chat-item<?php echo 0 === $i ? ' is-active' : ''; ?>" data-lv-chat="<?php echo esc_attr( $i ); ?>"<?php echo 0 === $i ? ' aria-current="true"' : ''; ?>><svg aria-hidden="true"><use href="#lv-chat"/></svg><span><?php echo esc_html( $chat['title'] ); ?></span></button></li>
				<?php endforeach; ?>
			</ul>
		</aside>

		<div class="lv-main">
			<header class="lv-top">
				<p class="lv-crumb">Conversa <span>/</span> <b data-lv-crumb>New chat</b></p>
				<div class="lv-top-icons" aria-hidden="true"><svg><use href="#lv-db"/></svg><svg><use href="#lv-shield"/></svg><svg><use href="#lv-grid"/></svg></div>
				<p class="lv-user"><span class="lv-avatar" aria-hidden="true">LS</span><span class="lv-user-name"><b>Liam Smith</b>Admin</span></p>
			</header>

			<div class="lv-views">
				<section class="lv-view lv-home" data-lv-view="home" aria-label="Home" hidden>
					<p class="lv-pill" data-in><i></i>INFOFISCUS Conversa 2.0 is live</p>
					<p class="lv-home-title" data-in>Bring data intelligence into <span>every decision with INFOFISCUS</span></p>
					<p class="lv-home-copy" data-in>The enterprise conversational AI platform that lets analysts and decision-makers chat with their data warehouses and semantic models.</p>
					<div class="lv-home-actions" data-in><span class="lv-btn is-primary" data-lv-target="start">Start Chatting</span><span class="lv-btn">Connections</span></div>
					<div class="lv-home-cards">
						<article data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-bolt"/></svg></span><b>Instant Insights</b><small>Query millions of rows in natural language.</small></article>
						<article data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-shield"/></svg></span><b>Enterprise Grade</b><small>Role-based access and audit logging built in.</small></article>
						<article data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-search"/></svg></span><b>Semantic Understanding</b><small>Understands business logic, not just schema.</small></article>
					</div>
				</section>

				<section class="lv-view lv-chat is-active" data-lv-view="chat" aria-label="Chat">
					<?php foreach ( $lv_chats as $i => $chat ) : ?>
						<div class="lv-convo" data-lv-thread="<?php echo esc_attr( $i ); ?>" data-agent="<?php echo esc_attr( $chat['agent'] ); ?>"<?php echo 0 === $i ? '' : ' hidden'; ?>>
							<div class="lv-agent-bar"><span class="lv-agent"><i></i><?php echo esc_html( $chat['agent'] ); ?> <em><?php echo esc_html( $chat['version'] ); ?></em> <em class="is-grey"><?php echo esc_html( $chat['source'] ); ?></em></span><span class="lv-agent"><i></i><?php echo esc_html( $chat['model'] ); ?></span></div>
							<div class="lv-thread">
								<p class="lv-ask" data-lv-ask><?php echo esc_html( $chat['question'] ); ?></p>
								<div class="lv-reply">
									<img class="lv-bot" src="<?php echo esc_url( $lv_img . 'infofiscus-conversa-mark.png' ); ?>" width="141" height="120" loading="lazy" decoding="async" title="INFOFISCUS Conversa" alt="INFOFISCUS Conversa mark">
									<div class="lv-answer">
										<p class="lv-thinking" aria-hidden="true"><i></i><i></i><i></i> <?php echo esc_html( $chat['thinking'] ); ?></p>
										<p class="lv-summary" data-in><b>Executive Summary:</b> <?php echo wp_kses( $chat['summary'], array( 'b' => array() ) ); ?></p>
										<div class="lv-kpis" data-in>
											<?php foreach ( $chat['kpis'] as $kpi ) : ?>
												<p><small><?php echo esc_html( $kpi[0] ); ?></small><b data-lv-count><?php echo esc_html( $kpi[1] ); ?></b></p>
											<?php endforeach; ?>
										</div>
										<div class="lv-viz" data-in>
											<div class="lv-viz-head"><b>Data Visualization</b>
												<div class="lv-types" role="group" aria-label="Chart type">
													<button type="button" data-lv-type="bar">Bar</button>
													<button type="button" data-lv-type="line">Line</button>
													<button type="button" class="is-active" data-lv-type="combo" aria-pressed="true">Combo</button>
												</div>
											</div>
											<p class="lv-legend"><span class="is-rev"><?php echo esc_html( $chat['legend'][0] ); ?></span><span class="is-low"><?php echo esc_html( $chat['legend'][1] ); ?></span><span class="is-vol"><?php echo esc_html( $chat['legend'][2] ); ?></span></p>
											<svg class="lv-combo lv-chart is-drawn" data-type="combo" viewBox="0 0 560 160" role="img" aria-label="<?php echo esc_attr( $chat['legend'][0] . ' and ' . $chat['legend'][2] . ': ' . implode( ', ', array_map( function ( $row ) use ( $chat ) { return $row[0] . ' ' . sprintf( $chat['bar_fmt'], $row[1] ) . ', ' . $row[2]; }, $chat['rows'] ) ) ); ?>"><?php echo infometry_ct_lv_combo_chart( $chat ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- numeric SVG, labels escaped in the helper. ?></svg>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="lv-input"><span data-lv-input>Ask <?php echo esc_html( $lv_chats[0]['agent'] ); ?>...</span><span class="lv-send" data-lv-target="send"><svg aria-hidden="true"><use href="#lv-send"/></svg></span></div>
				</section>

				<section class="lv-view lv-books" data-lv-view="storybooks" aria-label="Storybooks" hidden>
					<div class="lv-view-head" data-in><p class="lv-h"><svg aria-hidden="true"><use href="#lv-book"/></svg>Storybooks</p><span class="lv-btn is-primary">+ New Storybook</span></div>
					<div class="lv-stats">
						<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-book"/></svg></span><small>Total Storybooks</small><b data-lv-count>3</b></p>
						<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-chat"/></svg></span><small>Active Chats</small><b data-lv-count>10</b></p>
						<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-users"/></svg></span><small>Collaborators</small><b data-lv-count>4</b></p>
					</div>
					<div class="lv-book-grid">
						<?php foreach ( $lv_storybooks as $i => $book ) : ?>
							<article class="<?php echo esc_attr( $book['tone'] ); ?>" data-in<?php echo 0 === $i ? ' data-lv-target="book"' : ''; ?>>
								<span class="lv-book-icon"><svg aria-hidden="true"><use href="#lv-book"/></svg></span>
								<b><?php echo esc_html( $book['title'] ); ?></b><small><?php echo esc_html( $book['copy'] ); ?></small>
								<p class="lv-book-meta"><span><svg aria-hidden="true"><use href="#lv-chat"/></svg><?php echo esc_html( $book['chats'] ); ?></span><span><svg aria-hidden="true"><use href="#lv-users"/></svg><?php echo esc_html( $book['people'] ); ?></span><em>private &middot; <?php echo esc_html( $book['date'] ); ?></em></p>
							</article>
						<?php endforeach; ?>
					</div>
					<div class="lv-recent" data-in>
						<p class="lv-card-title"><b>Recent in Finance</b></p>
						<ul>
							<?php foreach ( $lv_recent as $item ) : ?>
								<li><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-chat"/></svg></span><p><b><?php echo esc_html( $item['title'] ); ?></b><span class="lv-tags"><em>Agent: <?php echo esc_html( $item['agent'] ); ?></em><em>Database: <?php echo esc_html( $item['db'] ); ?></em><em>YAML: <?php echo esc_html( $item['yaml'] ); ?></em></span></p><small><?php echo esc_html( $item['time'] ); ?></small></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</section>

				<section class="lv-view lv-dash" data-lv-view="dashboard" aria-label="Dashboard" hidden>
					<div class="lv-view-head" data-in><p class="lv-h"><svg aria-hidden="true"><use href="#lv-grid"/></svg>Dashboard<small>Platform adoption &amp; engagement analytics</small></p><span class="lv-chip">Admin view</span></div>
					<div class="lv-tabs" role="tablist" aria-label="Dashboard views" data-in>
						<?php foreach ( $lv_dash as $key => $panel ) : ?>
							<button type="button" role="tab" data-lv-tab="<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo 'overview' === $key ? 'true' : 'false'; ?>"><?php echo esc_html( $panel['label'] ); ?></button>
						<?php endforeach; ?>
					</div>
					<?php foreach ( $lv_dash as $key => $panel ) : ?>
						<div class="lv-panel" role="tabpanel" aria-label="<?php echo esc_attr( $panel['label'] ); ?>" data-lv-panel="<?php echo esc_attr( $key ); ?>"<?php echo 'overview' === $key ? '' : ' hidden'; ?>>
							<div class="lv-dash-kpis">
								<?php foreach ( $panel['kpis'] as $kpi ) : ?>
									<p data-in><span class="lv-icon"><svg aria-hidden="true"><use href="#lv-<?php echo esc_attr( $kpi[0] ); ?>"/></svg></span><small><?php echo esc_html( $kpi[1] ); ?></small><b data-lv-count><?php echo esc_html( $kpi[2] ); ?></b><em><?php echo esc_html( $kpi[3] ); ?></em></p>
								<?php endforeach; ?>
							</div>
							<div class="lv-dash-charts">
								<article data-in>
									<p class="lv-card-title"><b><?php echo esc_html( $panel['line'][0] ); ?></b><small><?php echo esc_html( $panel['line'][1] ); ?></small></p>
									<svg class="lv-trend lv-chart is-drawn" viewBox="0 0 320 148" role="img" aria-label="<?php echo esc_attr( $panel['line'][0] . ' trend' ); ?>"><?php echo infometry_ct_lv_line_chart( $panel['line'][2], $panel['line'][3], $panel['line'][4] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- numeric SVG built above. ?></svg>
								</article>
								<article data-in>
									<p class="lv-card-title"><b><?php echo esc_html( $panel['bars'][0] ); ?></b></p>
									<ul class="lv-hbars lv-chart is-drawn">
										<?php foreach ( $panel['bars'][1] as $bar ) : ?>
											<li><span><?php echo esc_html( $bar[0] ); ?></span><i style="--w:<?php echo esc_attr( $bar[2] ); ?>%"></i><b><?php echo esc_html( is_numeric( $bar[1] ) ? number_format( $bar[1] ) : $bar[1] ); ?></b></li>
										<?php endforeach; ?>
									</ul>
								</article>
							</div>
						</div>
					<?php endforeach; ?>
				</section>

				<section class="lv-view lv-conn" data-lv-view="connections" aria-label="Connections" hidden>
					<div class="lv-tabs is-line" role="tablist" aria-label="Connection types" data-in>
						<button type="button" role="tab" data-lv-tab="db" aria-selected="true"><svg aria-hidden="true"><use href="#lv-db"/></svg>DB Connection</button>
						<button type="button" role="tab" data-lv-tab="agents" aria-selected="false"><svg aria-hidden="true"><use href="#lv-spark"/></svg>Agent Connection</button>
					</div>
					<div class="lv-panel lv-conn-grid" role="tabpanel" aria-label="Databases" data-lv-panel="db">
						<?php foreach ( $lv_databases as $db ) : ?>
							<article data-in>
								<p class="lv-conn-name"><span class="lv-logo-badge"><?php if ( isset( $db['logo'] ) ) : ?><img src="<?php echo esc_url( $lv_img . $db['logo'] ); ?>" width="<?php echo esc_attr( $db['size'][0] ); ?>" height="<?php echo esc_attr( $db['size'][1] ); ?>" loading="lazy" decoding="async" title="<?php echo esc_attr( $db['name'] ); ?>" alt="<?php echo esc_attr( $db['name'] . ' logo' ); ?>"><?php else : ?><i><?php echo esc_html( $db['badge'] ); ?></i><?php endif; ?></span><b><?php echo esc_html( $db['name'] ); ?></b></p>
								<p class="lv-conn-row"><small>Status</small><span class="lv-ok"><svg aria-hidden="true"><use href="#lv-check"/></svg>Connected</span></p>
								<p class="lv-conn-row"><small>Total Connections</small><em data-lv-count><?php echo esc_html( $db['count'] ); ?></em></p>
								<p class="lv-conn-links"><span>Manage</span><span>+ Create</span></p>
							</article>
						<?php endforeach; ?>
					</div>
					<div class="lv-panel lv-conn-grid" role="tabpanel" aria-label="AI agents" data-lv-panel="agents" hidden>
						<?php foreach ( $lv_agents as $agent ) : ?>
							<article data-in>
								<p class="lv-conn-name"><span class="lv-logo-badge"><img src="<?php echo esc_url( $lv_img . $agent['logo'] ); ?>" width="<?php echo esc_attr( $agent['size'][0] ); ?>" height="<?php echo esc_attr( $agent['size'][1] ); ?>" loading="lazy" decoding="async" title="<?php echo esc_attr( $agent['name'] ); ?>" alt="<?php echo esc_attr( $agent['name'] . ' logo' ); ?>"></span><b><?php echo esc_html( $agent['name'] ); ?></b></p>
								<p class="lv-conn-row"><small>Status</small><span class="lv-ok"><svg aria-hidden="true"><use href="#lv-check"/></svg>Connected</span></p>
								<p class="lv-conn-row"><small>Agents</small><em data-lv-count><?php echo esc_html( $agent['count'] ); ?></em></p>
								<p class="lv-conn-links"><span>Manage</span><span>+ Create</span></p>
							</article>
						<?php endforeach; ?>
					</div>
					<p class="lv-footnote">Powered by INFOFISCUS | Conversa v2.1 &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Infometry Inc. All rights reserved.</p>
				</section>
			</div>
		</div>

		<span class="lv-cursor" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 3l14 8.2-6.2 1.5L9.6 19z"/></svg></span>
	</div>

	<div class="lv-player">
		<button type="button" class="lv-play" data-lv-play aria-label="Pause the product tour"><svg class="lv-i-pause" aria-hidden="true"><use href="#lv-pause"/></svg><svg class="lv-i-play" aria-hidden="true"><use href="#lv-play"/></svg></button>
		<ol class="lv-steps">
			<?php foreach ( $lv_scenes as $i => $scene ) : ?>
				<li><button type="button" data-lv-scene="<?php echo esc_attr( $i ); ?>"><span><?php echo esc_html( $scene[1] ); ?></span><i><b></b></i></button></li>
			<?php endforeach; ?>
		</ol>
	</div>
</div>
