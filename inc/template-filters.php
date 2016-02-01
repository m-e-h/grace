<?php

add_filter('hybrid_content_template_hierarchy', 'meh_template_hierarchy');
add_filter('excerpt_more', 'meh_excerpt_more');
add_filter('excerpt_length', 'meh_excerpt_length');

/**
 * Add templates to hybrid_get_content_template()
 */
function meh_template_hierarchy($templates) {
		$post_type = get_post_type();
		// $post_slug = get_the_slug();
	if (is_search()) {
		$templates = array_merge(array('content/search.php'), $templates);
	} elseif (is_404()) {
		$templates = array_merge(array('content/404.php'), $templates);
	} elseif (is_singular()) {
		$templates = array_merge(array("content/{$post_type}-single.php"), $templates);
		$templates = array_merge(array("content/single.php"), $templates);
		// $templates = array_merge(array("content/{$post_type}-{$post_slug}.php"), $templates);
	}

	return $templates;
}

/**
 * Clean up the_excerpt().
 */
function meh_excerpt_more() {
	return '<a class="u-absolute btn-readmore u-z1 u-right0 u-bottom0" href="'.get_permalink().'"><i class="material-icons">more_horiz</i></a>';
}

/**
 * Define the_excerpt() character length.
 */
function meh_excerpt_length($length) {
	return 40;
}
