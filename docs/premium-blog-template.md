# Premium blog post template

One centrally managed layout for every standard WordPress post (Posts in WP Admin).

## How it works

| Piece | File |
|---|---|
| Routing, body class, assets, content post-processing | `includes/premium-blog.php` (loaded from `infometry-custom-templates.php`) |
| Template | `templates/single-post-premium.php` |
| Styles (all scoped to `body.infometry-premium-blog` / `.ifb`) | `assets/css/blog-post.css` |
| Table of contents behaviour | `assets/js/blog-post.js` |

- **Which posts:** `is_singular( 'post' )` with the default post template. Posts given another template (e.g. Elementor Canvas) and all pages, case studies and custom templates are untouched.
- **Header / navigation / footer:** the theme's own, via `get_header()` / `get_footer()`. Betheme's single-post "intro" banner (it holds a second H1) is removed from the header output only.
- **Content:** rendered through the normal `the_content` filters (shortcodes, embeds, Elementor), then post-processed in memory. Nothing is written to the database.
  - The hero title is the page's only H1. A content H1 that opens the post and repeats the title is hidden; any other content H1 is shown as an H2.
  - H2/H3 headings get ids and feed the table of contents (shown when there are 2+ headings).
  - Tables are wrapped to scroll sideways on small screens.
  - If a post's content opens with its own image, the hero shows no featured image (no duplicate banner).
- **SEO:** URLs, slugs, dates, Yoast title/description/canonical/Open Graph and Yoast schema are unchanged. The template adds no schema.

## Testing (staging)

Representative posts: long guide with tables, Elementor-built post, post whose H1 repeats the title, post using H1 as a section heading, post with an embed, post with no headings. Check: one H1, no intro banner, TOC, mobile/tablet layout, and that Yoast output matches the pre-change baseline.

Editors can compare against the old layout on any post with `?ifb-legacy=1` (logged-in users only).

## Rollback

Fastest first; each is independent:

1. **Switch off without a deploy:** add `define( 'INFOMETRY_CT_PREMIUM_BLOG', false );` to `wp-config.php`. Posts immediately render with the theme's original template.
2. **Switch off for some posts:** `add_filter( 'infometry_ct_premium_blog_enabled', function ( $on, $post_id ) { return 123 === $post_id ? false : $on; }, 10, 2 );`
3. **Remove the feature:** `git revert` the commit that added these files, push, and pull in Cloudways.

No data migration is involved, so every rollback is instant and lossless. Purge WP Rocket after switching.
