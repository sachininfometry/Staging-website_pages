<?php
/**
 * Premium single-post template, applied centrally to standard posts.
 *
 * Reuses the theme header/navigation and footer. Renders the stored content
 * through the normal the_content filters (shortcodes, embeds, Elementor), then
 * post-processes it for display only. See includes/premium-blog.php.
 *
 * @package Infometry_Custom_Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

infometry_ct_premium_blog_header();

while ( have_posts() ) :
	the_post();

	$post_id   = get_the_ID();
	$title     = get_the_title();
	$category  = infometry_ct_blog_primary_category( $post_id );
	$prepared  = infometry_ct_blog_prepare_content( apply_filters( 'the_content', get_the_content() ), $title ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core filter.
	$toc       = $prepared['toc'];
	$has_toc   = count( $toc ) >= 2;
	$show_hero_image = has_post_thumbnail() && ! $prepared['opens_with_image'];
	$author_id = (int) get_post_field( 'post_author', $post_id );
	$minutes   = infometry_ct_blog_reading_time( $prepared['html'] );
	$related   = infometry_ct_blog_related_posts( $post_id, $category );
	$blog_url  = home_url( '/resources/blog/' );
	?>

<main class="ifb" id="ifb-main">
	<header class="ifb-hero">
		<div class="ifb-hero-glow" aria-hidden="true"></div>
		<div class="ifb-shell ifb-hero-inner">
			<div class="ifb-hero-copy">
				<nav class="ifb-crumbs" aria-label="Breadcrumb">
					<a href="<?php echo esc_url( $blog_url ); ?>">Blog</a>
					<?php if ( $category ) : ?>
						<span aria-hidden="true">/</span>
						<a href="<?php echo esc_url( get_category_link( $category ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
					<?php endif; ?>
				</nav>
				<h1 class="ifb-title"><?php echo esc_html( $title ); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="ifb-dek"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 32 ) ); ?></p>
				<?php endif; ?>
				<div class="ifb-meta">
					<span class="ifb-author">
						<?php echo get_avatar( $author_id, 44, '', '', array( 'class' => 'ifb-avatar' ) ); ?>
						<span class="ifb-author-text"><small>Written by</small><b><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></b></span>
					</span>
				</div>
			</div>
			<aside class="ifb-hero-card" aria-label="Article details">
				<span class="ifb-hero-card-eyebrow">Infometry Insights</span>
				<ul>
					<li><i aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 5h16M4 12h16M4 19h10"/></svg></i><span><small>Category</small><b><?php echo esc_html( $category ? $category->name : 'Blog' ); ?></b></span></li>
					<li><i aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></i><span><small>Reading time</small><b><?php echo esc_html( sprintf( '%d min read', $minutes ) ); ?></b></span></li>
					<li><i aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></svg></i><span><small>Published</small><b><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></b></span></li>
				</ul>
				<a class="ifb-hero-card-link" href="#ifb-article-start">Start reading <span aria-hidden="true">&darr;</span></a>
			</aside>
		</div>
	</header>

	<div class="ifb-shell ifb-body<?php echo $has_toc ? ' has-toc' : ''; ?>">
		<?php if ( $has_toc ) : ?>
			<aside class="ifb-toc" aria-label="Table of contents">
				<details class="ifb-toc-box" open>
					<summary><span class="ifb-toc-eyebrow">Contents</span><span class="ifb-toc-title">On this page</span><span class="ifb-toc-progress" aria-hidden="true"><i></i></span></summary>
					<ol>
						<?php foreach ( $toc as $item ) : ?>
							<li class="is-h<?php echo esc_attr( (string) $item['level'] ); ?>"><a href="#<?php echo esc_attr( $item['id'] ); ?>"><span><?php echo esc_html( $item['text'] ); ?></span></a></li>
						<?php endforeach; ?>
					</ol>
				</details>
			</aside>
		<?php endif; ?>

		<article id="post-<?php echo esc_attr( (string) $post_id ); ?>" <?php post_class( 'ifb-article' ); ?>>
			<div class="ifb-content" id="ifb-article-start">
				<?php echo $prepared['html']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- filtered post content. ?>
			</div>

			<?php
			wp_link_pages(
				array(
					'before' => '<nav class="ifb-pages">',
					'after'  => '</nav>',
				)
			);

			$tags = get_the_tags();
			if ( $tags ) :
				?>
				<div class="ifb-tags" aria-label="Tags">
					<?php foreach ( $tags as $tag ) : ?>
						<a href="<?php echo esc_url( get_tag_link( $tag ) ); ?>"><?php echo esc_html( $tag->name ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</article>
	</div>

	<section class="ifb-cta" aria-labelledby="ifb-cta-title">
		<div class="ifb-shell ifb-cta-inner">
			<div>
				<h2 id="ifb-cta-title">Turn your data into decisions with Infometry</h2>
				<p>Talk to our data, analytics and AI experts about modernizing your platform and getting more from your enterprise data.</p>
			</div>
			<a class="ifb-button" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>">Talk to an Expert <span aria-hidden="true">&rarr;</span></a>
		</div>
	</section>

	<?php if ( $related ) : ?>
		<section class="ifb-related" aria-labelledby="ifb-related-title">
			<div class="ifb-shell">
				<div class="ifb-related-head">
					<h2 id="ifb-related-title">Related Articles</h2>
					<a href="<?php echo esc_url( $blog_url ); ?>">View all articles <span aria-hidden="true">&rarr;</span></a>
				</div>
				<div class="ifb-related-grid">
					<?php
					foreach ( $related as $related_post ) :
						$related_cat = infometry_ct_blog_primary_category( $related_post->ID );
						?>
						<article class="ifb-card">
							<a class="ifb-card-media" href="<?php echo esc_url( get_permalink( $related_post ) ); ?>" tabindex="-1" aria-hidden="true">
								<?php
								if ( has_post_thumbnail( $related_post ) ) {
									echo get_the_post_thumbnail( $related_post, 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) );
								}
								?>
							</a>
							<div class="ifb-card-body">
								<?php if ( $related_cat ) : ?>
									<span class="ifb-card-cat"><?php echo esc_html( $related_cat->name ); ?></span>
								<?php endif; ?>
								<h3><a href="<?php echo esc_url( get_permalink( $related_post ) ); ?>"><?php echo esc_html( get_the_title( $related_post ) ); ?></a></h3>
								<time datetime="<?php echo esc_attr( get_the_date( 'c', $related_post ) ); ?>"><?php echo esc_html( get_the_date( '', $related_post ) ); ?></time>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>

	<?php
endwhile;

// Home page footer (theme footer is hidden on these posts); get_footer() still runs wp_footer().
require INFOMETRY_CT_PATH . 'templates/partials/site-footer.php';
get_footer();
