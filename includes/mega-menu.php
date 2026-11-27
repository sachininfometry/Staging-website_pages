<?php
/**
 * Mega menu: a modern dropdown design for the theme's main menu.
 *
 * Nothing about how the menu is managed changes. Items, order, nesting and links still come from
 * Appearance → Menus (the menu in the theme's main location). This file only reads that menu and
 * prints a richer dropdown for each top-level item; assets/js/mega-menu.js attaches the dropdowns
 * to the theme header on desktop (1240px and up, where the theme shows its desktop menu) and hides
 * the theme's plain sub-menus there. Mobile keeps the theme menu. If the script does not run, the
 * theme menu works exactly as before.
 *
 * Per item, the dropdown uses:
 *  - the menu item's Description field (Appearance → Menus → Screen Options → Description) as its
 *    short line; when it is empty a built-in line for known pages is used, else nothing;
 *  - an icon or logo picked from the link (product logos for known pages, otherwise a line icon).
 *
 * Enabled on the Cloudways staging host; filter `infometry_ct_megamenu_enabled` to turn it on elsewhere.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Whether the mega menu runs on this request. */
function infometry_ct_megamenu_enabled() {
	$on = function_exists( 'infometry_ct_is_cloudways_staging_host' ) && infometry_ct_is_cloudways_staging_host();
	return (bool) apply_filters( 'infometry_ct_megamenu_enabled', $on && ! is_admin() );
}

/** The nav menu the theme shows in its main location, as a tree of items. */
function infometry_ct_megamenu_tree() {
	$locations = get_nav_menu_locations();
	$menu_id   = 0;
	foreach ( array( 'main-menu', 'primary', 'main' ) as $loc ) {
		if ( ! empty( $locations[ $loc ] ) ) {
			$menu_id = (int) $locations[ $loc ];
			break;
		}
	}
	if ( ! $menu_id ) {
		return array();
	}
	$items = wp_get_nav_menu_items( $menu_id );
	if ( ! $items ) {
		return array();
	}
	$by_parent = array();
	foreach ( $items as $item ) {
		$by_parent[ (int) $item->menu_item_parent ][] = $item;
	}
	$build = function ( $parent ) use ( &$build, $by_parent ) {
		$out = array();
		foreach ( isset( $by_parent[ $parent ] ) ? $by_parent[ $parent ] : array() as $item ) {
			$out[] = array(
				'id'       => (int) $item->ID,
				'title'    => $item->title,
				'url'      => $item->url,
				'desc'     => trim( (string) $item->description ),
				'target'   => $item->target,
				'children' => $build( (int) $item->ID ),
			);
		}
		return $out;
	};
	return $build( 0 );
}

/** The path of a menu link, used to pick icons and default lines. */
function infometry_ct_megamenu_path( $url ) {
	$path = (string) wp_parse_url( $url, PHP_URL_PATH );
	return '/' . trim( $path, '/' ) . '/';
}

/**
 * Icon for a menu link: an image under assets/images ("img:…") or a line icon from the
 * menu sprite ("ic:…"). Matched on the link path, then on words in the title.
 */
function infometry_ct_megamenu_icon( $url, $title ) {
	$path = infometry_ct_megamenu_path( $url );
	$map  = array(
		'infofiscus-conversa'          => 'img:infofiscus-conversa-mark.png',
		'informatica-connectors'       => 'img:informatica-product-mark.png',
		'google-cloud-connectors'      => 'ic:cloud',
		'google-drive-connector'       => 'img:google-connectors/google-drive.png',
		'google-sheets-connector'      => 'img:google-connectors/google-sheets.png',
		'google-ads-connector'         => 'img:google-connectors/google-ads.png',
		'google-pub-sub'               => 'img:google-connectors/google-pubsub.png',
		'google-bigtable-connector'    => 'img:google-connectors/google-bigtable.png',
		'global-cloud-connector'       => 'ic:globe',
		'adaptive-insight'             => 'img:google-sheets/eco-adaptive.png',
		'hubspot'                      => 'img:google-sheets/eco-hubspot.png',
		'snowflake-native-apps'        => 'img:snowflake-product-mark.png',
		'netsuite-to-snowflake'        => 'img:google-sheets/eco-netsuite.png',
		'marketo'                      => 'ic:funnel',
		'sales-analytics'              => 'ic:chart',
		'finance-analytics'            => 'ic:coin',
		'prebuilt-finance'             => 'ic:coin',
		'prebuilt-sales'               => 'ic:chart',
		'supply-chain'                 => 'ic:box',
		'pre-built-analytics'          => 'ic:layers',
		'accelerators'                 => 'ic:rocket',
		'metadata-discovery'           => 'ic:search',
		'testing-automation'           => 'ic:check',
		'ddl-automation'               => 'ic:code',
		'databricks'                   => 'img:databricks-mark.png',
		'snowflake'                    => 'img:snowflake-product-mark.png',
		'dbt-migration'                => 'ic:code',
		'pc-to-cloud'                  => 'img:informatica-product-mark.png',
		'goanywhere'                   => 'ic:send',
		'data-warehouse'               => 'ic:db',
		'cloud-data-orchestration'     => 'ic:sync',
		'data-quality'                 => 'ic:check',
		'metadata-management'          => 'ic:tag',
		'master-data'                  => 'ic:layers',
		'advanced-analytics'           => 'ic:chart',
		'oem-strategy'                 => 'ic:box',
		'enterprise-performance'       => 'ic:target',
		'data-strategy'                => 'ic:target',
		'business-intelligence'        => 'img:google-sheets/eco-tableau.svg',
		'mulesoft'                     => 'ic:nodes',
		'matillion'                    => 'ic:sync',
		'/resources/blog/'             => 'ic:pen',
		'/category/'                   => 'ic:tag',
		'case-studies'                 => 'ic:star',
		'whitepapers'                  => 'ic:file',
		'gallery'                      => 'ic:image',
		'webinar'                      => 'ic:calendar',
		'press-releases'               => 'ic:megaphone',
		'hi-tech'                      => 'ic:chip',
		'retail'                       => 'ic:cart',
		'/finance/'                    => 'ic:coin',
		'manufacturing'                => 'ic:box',
		'solar'                        => 'ic:sun',
		'healthcare'                   => 'ic:heart',
		'customers-partners'           => 'ic:users',
		'careers'                      => 'ic:rocket',
		'life-at-infometry'            => 'ic:star',
		'infometry-cares'              => 'ic:heart',
		'testimonials'                 => 'ic:chat',
		'contact-us'                   => 'ic:chat',
	);
	$roots = array( '/product/' => 'ic:layers', '/company/' => 'ic:users', '/resources/' => 'ic:file' );
	if ( isset( $roots[ $path ] ) ) {
		return $roots[ $path ];
	}
	foreach ( $map as $needle => $icon ) {
		if ( false !== strpos( $path, $needle ) ) {
			return $icon;
		}
	}
	$t = strtolower( $title );
	foreach ( array( 'data' => 'ic:db', 'analytic' => 'ic:chart', 'cloud' => 'ic:cloud', 'migration' => 'ic:sync' ) as $word => $icon ) {
		if ( false !== strpos( $t, $word ) ) {
			return $icon;
		}
	}
	return 'ic:arrow';
}

/** Built-in short line for well-known pages, used only when the menu item has no Description. */
function infometry_ct_megamenu_default_desc( $url ) {
	$path  = infometry_ct_megamenu_path( $url );
	$roots = array(
		'/product/'   => 'Connectors, native apps and accelerators for your data stack.',
		'/resources/' => 'Blogs, case studies, whitepapers and events.',
		'/company/'   => 'The people and partners behind Infometry.',
	);
	if ( isset( $roots[ $path ] ) ) {
		return $roots[ $path ];
	}
	$lines = array(
		'infofiscus-conversa'                               => 'Trusted decision intelligence through natural language.',
		'/product/informatica-connectors/'                  => '100% Informatica Certified connectors for IDMC.',
		'google-cloud-connectors'                           => 'Drive, Sheets, Ads, Pub/Sub and BigTable for IDMC.',
		'google-drive-connector'                            => 'Automate file transfers with IDMC.',
		'google-sheets-connector'                           => 'Spreadsheets as a governed data source.',
		'google-ads-connector'                              => 'Campaign and ad spend reports in your warehouse.',
		'google-pub-sub'                                    => 'Publish and pull event messages.',
		'google-bigtable-connector'                         => 'Read, insert and delete wide-column data.',
		'global-cloud-connector'                            => 'Certified connectors for SaaS applications.',
		'snowflake-native-apps'                             => 'No-code native applications inside Snowflake.',
		'netsuite-to-snowflake'                             => 'Replicate NetSuite into Snowflake, API or ODBC.',
		'marketo-to-snowflake'                              => 'Sync Marketo objects into Snowflake.',
		'sales-analytics-native-app'                        => 'Pipeline, forecast, MQL and SQL insights.',
		'finance-analytics-native-app'                      => 'FP&A dashboards with Agentic AI.',
		'pre-built-analytics-apps'                          => 'Ready-made analytics for IDMC and Matillion.',
		'accelerators-for-data-warehouse'                   => 'Tools that speed up warehouse migration.',
		'databricks-solutions'                              => 'Strategy, implementation and migration.',
		'snowflake-solutions'                               => 'Modern data cloud consulting.',
		'/resources/blog/'                                  => 'Ideas and how-tos from our data team.',
		'case-studies'                                      => 'How enterprises use Infometry.',
		'whitepapers'                                       => 'In-depth guides and research.',
		'press-releases'                                    => 'Infometry news and announcements.',
		'webinar'                                           => 'Live sessions and recordings.',
		'customers-partners'                                => 'Who we work with.',
		'careers'                                           => 'Build the future of data with us.',
	);
	foreach ( $lines as $needle => $line ) {
		if ( false !== strpos( $path, $needle ) ) {
			return $line;
		}
	}
	return '';
}

/** One icon tile. */
function infometry_ct_megamenu_icon_html( $item ) {
	$icon = infometry_ct_megamenu_icon( $item['url'], $item['title'] );
	if ( 0 === strpos( $icon, 'img:' ) ) {
		return '<span class="imm-ic"><img src="' . esc_url( INFOMETRY_CT_URL . 'assets/images/' . substr( $icon, 4 ) ) . '" alt="" loading="lazy" decoding="async"></span>';
	}
	return '<span class="imm-ic is-line"><svg aria-hidden="true"><use href="#imm-' . esc_attr( substr( $icon, 3 ) ) . '"/></svg></span>';
}

/** Link attributes for an item. */
function infometry_ct_megamenu_attrs( $item ) {
	$attrs = ' href="' . esc_url( $item['url'] ) . '"';
	if ( '_blank' === $item['target'] ) {
		$attrs .= ' target="_blank" rel="noopener"';
	}
	return $attrs;
}

/** Description for an item: the menu's own, else a built-in one. */
function infometry_ct_megamenu_desc( $item ) {
	return '' !== $item['desc'] ? $item['desc'] : infometry_ct_megamenu_default_desc( $item['url'] );
}

/** A row link: icon, title, short line. */
function infometry_ct_megamenu_row( $item, $class = 'imm-row' ) {
	$desc = infometry_ct_megamenu_desc( $item );
	return '<a class="' . esc_attr( $class ) . '"' . infometry_ct_megamenu_attrs( $item ) . '>'
		. infometry_ct_megamenu_icon_html( $item )
		. '<span class="imm-tx"><b>' . esc_html( $item['title'] ) . '</b>' . ( $desc ? '<small>' . esc_html( $desc ) . '</small>' : '' ) . '</span></a>';
}

/** A plain link with a small icon (used inside group columns). */
function infometry_ct_megamenu_link( $item ) {
	return '<a class="imm-link"' . infometry_ct_megamenu_attrs( $item ) . '>' . infometry_ct_megamenu_icon_html( $item ) . '<span>' . esc_html( $item['title'] ) . '</span></a>';
}

/** Title-case a menu label typed in capitals (PRODUCTS → Products) for headings inside the panel. */
function infometry_ct_megamenu_label( $title ) {
	return ( strtoupper( $title ) === $title && strlen( $title ) > 3 ) ? ucwords( strtolower( $title ) ) : $title;
}

/** The dropdown for one top-level item. */
function infometry_ct_megamenu_panel( $top ) {
	$kids = $top['children'];
	$deep = false;
	foreach ( $kids as $kid ) {
		if ( $kid['children'] ) {
			$deep = true;
			break;
		}
	}
	$label = infometry_ct_megamenu_label( $top['title'] );
	ob_start();
	?>
	<div class="imm-panel<?php echo $deep ? ' is-tabs' : ' is-grid'; ?><?php echo count( $kids ) > 7 ? ' is-long' : ''; ?>" data-imm-panel="<?php echo (int) $top['id']; ?>" role="region" aria-label="<?php echo esc_attr( $label ); ?>" hidden>
		<div class="imm-main">
			<?php if ( $deep ) : ?>
				<div class="imm-nav" role="tablist" aria-label="<?php echo esc_attr( $label ); ?>">
					<?php foreach ( $kids as $k => $kid ) : ?>
						<a class="imm-tab<?php echo 0 === $k ? ' is-on' : ''; ?>"<?php echo infometry_ct_megamenu_attrs( $kid ); // phpcs:ignore ?> data-imm-tab="<?php echo (int) $kid['id']; ?>">
							<?php echo infometry_ct_megamenu_icon_html( $kid ); // phpcs:ignore ?>
							<span class="imm-tab-t"><?php echo esc_html( infometry_ct_megamenu_label( $kid['title'] ) ); ?></span>
							<?php if ( $kid['children'] ) : ?><svg class="imm-chev" aria-hidden="true"><use href="#imm-chev"/></svg><?php endif; ?>
						</a>
					<?php endforeach; ?>
				</div>
				<div class="imm-panes">
					<?php foreach ( $kids as $k => $kid ) : ?>
						<?php
						$groups = array();
						$plain  = array();
						foreach ( $kid['children'] as $g ) {
							if ( $g['children'] ) {
								$groups[] = $g;
							} else {
								$plain[] = $g;
							}
						}
						$d = infometry_ct_megamenu_desc( $kid );
						?>
						<div class="imm-pane<?php echo 0 === $k ? ' is-on' : ''; ?>" data-imm-pane="<?php echo (int) $kid['id']; ?>">
							<header class="imm-pane-head">
								<div><a class="imm-pane-t"<?php echo infometry_ct_megamenu_attrs( $kid ); // phpcs:ignore ?>><?php echo esc_html( infometry_ct_megamenu_label( $kid['title'] ) ); ?></a><?php echo $d ? '<p>' . esc_html( $d ) . '</p>' : ''; ?></div>
								<a class="imm-all"<?php echo infometry_ct_megamenu_attrs( $kid ); // phpcs:ignore ?>>View all <svg aria-hidden="true"><use href="#imm-arrow"/></svg></a>
							</header>
							<?php if ( $groups ) : ?>
								<div class="imm-cols">
									<?php foreach ( $groups as $g ) : ?>
										<div class="imm-col">
											<a class="imm-col-h"<?php echo infometry_ct_megamenu_attrs( $g ); // phpcs:ignore ?>><?php echo esc_html( $g['title'] ); ?><svg aria-hidden="true"><use href="#imm-arrow"/></svg></a>
											<?php foreach ( $g['children'] as $c ) : ?>
												<?php echo infometry_ct_megamenu_link( $c ); // phpcs:ignore ?>
											<?php endforeach; ?>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php if ( $plain ) : ?>
								<div class="imm-list<?php echo count( $plain ) > 6 ? ' is-3' : ''; ?>">
									<?php foreach ( $plain as $g ) : ?>
										<?php echo infometry_ct_megamenu_row( $g ); // phpcs:ignore ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php if ( ! $kid['children'] ) : ?>
								<a class="imm-solo"<?php echo infometry_ct_megamenu_attrs( $kid ); // phpcs:ignore ?>>
									<?php echo infometry_ct_megamenu_icon_html( $kid ); // phpcs:ignore ?>
									<span><b><?php echo esc_html( infometry_ct_megamenu_label( $kid['title'] ) ); ?></b><em>Explore <?php echo esc_html( infometry_ct_megamenu_label( $kid['title'] ) ); ?> <svg aria-hidden="true"><use href="#imm-arrow"/></svg></em></span>
								</a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<div class="imm-flat">
					<div class="imm-list<?php echo count( $kids ) > 6 ? ' is-3' : ''; ?>">
						<?php foreach ( $kids as $kid ) : ?>
							<?php echo infometry_ct_megamenu_row( $kid ); // phpcs:ignore ?>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<footer class="imm-foot">
			<?php if ( $top['url'] && '#' !== $top['url'] ) : ?>
				<a class="imm-foot-all"<?php echo infometry_ct_megamenu_attrs( $top ); // phpcs:ignore ?>>View all <?php echo esc_html( $label ); ?> <svg aria-hidden="true"><use href="#imm-arrow"/></svg></a>
			<?php else : ?>
				<span class="imm-foot-note"><?php echo esc_html( $label ); ?> at Infometry</span>
			<?php endif; ?>
			<a class="imm-foot-cta" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><svg aria-hidden="true"><use href="#imm-chat"/></svg>Talk to an expert</a>
		</footer>
	</div>
	<?php
	return ob_get_clean();
}

/** Print the dropdowns and their icons once, at the end of the page. */
function infometry_ct_megamenu_print() {
	if ( ! infometry_ct_megamenu_enabled() ) {
		return;
	}
	$tree = infometry_ct_megamenu_tree();
	if ( ! $tree ) {
		return;
	}
	echo '<div id="imm-root" class="imm-root" hidden>';
	?>
	<svg class="imm-sprite" aria-hidden="true" focusable="false" style="position:absolute;width:0;height:0;overflow:hidden">
		<symbol id="imm-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
		<symbol id="imm-chev" viewBox="0 0 24 24"><path d="m9 6 6 6-6 6"/></symbol>
		<symbol id="imm-spark" viewBox="0 0 24 24"><path d="M12 2c.6 4.6 2.4 6.4 7 7-4.6.6-6.4 2.4-7 7-.6-4.6-2.4-6.4-7-7 4.6-.6 6.4-2.4 7-7Z"/><path d="M19 15c.3 2 1 2.7 3 3-2 .3-2.7 1-3 3-.3-2-1-2.7-3-3 2-.3 2.7-1 3-3Z"/></symbol>
		<symbol id="imm-cloud" viewBox="0 0 24 24"><path d="M7 18a5 5 0 1 1 1-9.9A6 6 0 0 1 19.5 10 4 4 0 0 1 18 18H7Z"/></symbol>
		<symbol id="imm-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.6 3.8 5.6 3.8 9s-1.2 6.4-3.8 9c-2.6-2.6-3.8-5.6-3.8-9S9.4 5.6 12 3Z"/></symbol>
		<symbol id="imm-funnel" viewBox="0 0 24 24"><path d="M3 4h18l-7 8.5V20l-4-2v-5.5L3 4Z"/></symbol>
		<symbol id="imm-chart" viewBox="0 0 24 24"><path d="M4 20V4M4 20h16M8 16v-4M12 16V8M16 16v-6"/></symbol>
		<symbol id="imm-coin" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M14.8 9.2c-.5-.9-1.6-1.4-2.8-1.4-1.7 0-2.8.9-2.8 2.1 0 2.9 5.8 1.5 5.8 4.3 0 1.2-1.2 2.1-3 2.1-1.3 0-2.5-.6-3-1.6M12 6v1.8M12 16.3V18"/></symbol>
		<symbol id="imm-box" viewBox="0 0 24 24"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"/><path d="m4 7.5 8 4.5 8-4.5M12 12v9"/></symbol>
		<symbol id="imm-layers" viewBox="0 0 24 24"><path d="m12 3 9 5-9 5-9-5 9-5Z"/><path d="m3 13 9 5 9-5"/></symbol>
		<symbol id="imm-rocket" viewBox="0 0 24 24"><path d="M14 4c3-1 6-1 6-1s0 3-1 6l-6 6-5-5 6-6Z"/><path d="m8 10-4 .5L3 13l4 1M14 16l-.5 4-2.5 1-1-4"/><circle cx="15" cy="9" r="1.5"/></symbol>
		<symbol id="imm-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/></symbol>
		<symbol id="imm-check" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="m8 12 3 3 5-6"/></symbol>
		<symbol id="imm-code" viewBox="0 0 24 24"><path d="m8 7-5 5 5 5M16 7l5 5-5 5"/></symbol>
		<symbol id="imm-send" viewBox="0 0 24 24"><path d="M21 3 10 14M21 3l-7 18-4-7-7-4 18-7Z"/></symbol>
		<symbol id="imm-db" viewBox="0 0 24 24"><ellipse cx="12" cy="5.5" rx="7.5" ry="2.8"/><path d="M4.5 5.5v13c0 1.5 3.4 2.8 7.5 2.8s7.5-1.3 7.5-2.8v-13M4.5 12c0 1.5 3.4 2.8 7.5 2.8s7.5-1.3 7.5-2.8"/></symbol>
		<symbol id="imm-sync" viewBox="0 0 24 24"><path d="M4 9h13l-3.5-3.5M20 15H7l3.5 3.5"/></symbol>
		<symbol id="imm-tag" viewBox="0 0 24 24"><path d="M3 12V4h8l10 10-8 8L3 12Z"/><circle cx="7.5" cy="8" r="1.3"/></symbol>
		<symbol id="imm-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.2"/></symbol>
		<symbol id="imm-nodes" viewBox="0 0 24 24"><circle cx="6" cy="6" r="2.5"/><circle cx="18" cy="6" r="2.5"/><circle cx="12" cy="18" r="2.5"/><path d="M8 7.5 10.8 16M16 7.5 13.2 16M8.5 6h7"/></symbol>
		<symbol id="imm-pen" viewBox="0 0 24 24"><path d="M4 20h4L19 9l-4-4L4 16v4Z"/><path d="m13.5 6.5 4 4"/></symbol>
		<symbol id="imm-star" viewBox="0 0 24 24"><path d="m12 3 2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9L12 3Z"/></symbol>
		<symbol id="imm-file" viewBox="0 0 24 24"><path d="M6 3h8l4 4v14H6V3Z"/><path d="M14 3v4h4M9 12h6M9 16h6"/></symbol>
		<symbol id="imm-image" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2.5"/><circle cx="9" cy="10" r="2"/><path d="m21 16-5-5-9 9"/></symbol>
		<symbol id="imm-calendar" viewBox="0 0 24 24"><rect x="3.5" y="5" width="17" height="15" rx="2.5"/><path d="M3.5 10h17M8 3v4M16 3v4"/></symbol>
		<symbol id="imm-megaphone" viewBox="0 0 24 24"><path d="M3 10v4h4l8 5V5L7 10H3Z"/><path d="M18 9a4 4 0 0 1 0 6"/></symbol>
		<symbol id="imm-chip" viewBox="0 0 24 24"><rect x="6" y="6" width="12" height="12" rx="2"/><path d="M9 2v4M15 2v4M9 18v4M15 18v4M2 9h4M2 15h4M18 9h4M18 15h4"/></symbol>
		<symbol id="imm-cart" viewBox="0 0 24 24"><path d="M3 4h2.5l2.2 11h10.8L21 7H6.4"/><circle cx="9" cy="19.5" r="1.5"/><circle cx="17" cy="19.5" r="1.5"/></symbol>
		<symbol id="imm-sun" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M2 12h2M20 12h2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></symbol>
		<symbol id="imm-heart" viewBox="0 0 24 24"><path d="M12 20s-7.5-4.6-9-9.5C2 7 4.5 4 7.6 4c1.9 0 3.4 1 4.4 2.5C13 5 14.5 4 16.4 4 19.5 4 22 7 21 10.5 19.5 15.4 12 20 12 20Z"/></symbol>
		<symbol id="imm-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M16 4.5a3.5 3.5 0 0 1 0 7M18 14a6 6 0 0 1 3.5 6"/></symbol>
		<symbol id="imm-chat" viewBox="0 0 24 24"><path d="M4 5h16v11H9l-5 4V5Z"/><path d="M8 10h.01M12 10h.01M16 10h.01"/></symbol>
	</svg>
	<?php
	foreach ( $tree as $top ) {
		if ( $top['children'] ) {
			echo infometry_ct_megamenu_panel( $top ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped while built.
		}
	}
	echo '</div>';
}
add_action( 'wp_footer', 'infometry_ct_megamenu_print', 5 );

/** Load the mega menu design and script. */
function infometry_ct_megamenu_assets() {
	if ( ! infometry_ct_megamenu_enabled() ) {
		return;
	}
	foreach ( array( 'css' => 'assets/css/mega-menu.css', 'js' => 'assets/js/mega-menu.js' ) as $type => $rel ) {
		$path    = INFOMETRY_CT_PATH . $rel;
		$version = is_readable( $path ) ? (string) filemtime( $path ) : INFOMETRY_CT_VERSION;
		if ( 'css' === $type ) {
			wp_enqueue_style( 'infometry-mega-menu', INFOMETRY_CT_URL . $rel, array(), $version );
		} else {
			wp_enqueue_script( 'infometry-mega-menu', INFOMETRY_CT_URL . $rel, array(), $version, true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'infometry_ct_megamenu_assets', 30 );
