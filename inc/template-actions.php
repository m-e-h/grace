<?php

//add_action( 'tha_entry_before', 'abraham_do_format_icon' );

function abraham_do_format_icon() { ?>
<span class="entry-format"><?php abe_post_format_link(); ?></span>
<?php
}
/**
 * Outputs an svg link to the post format archive.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function abe_post_format_link() {
	echo abe_get_post_format_link();
}
/**
 * Generates a link to the current post format's archive.  If the post doesn't have a post format, the link
 * will go to the post permalink.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function abe_get_post_format_link() {
	$format = get_post_format();
	get_template_part( 'partials/svg/svg', $format );
	$url    = empty( $format ) ? get_permalink() : get_post_format_link( $format );
	return sprintf( '<a href="%s" class="post-format-link"></a>', esc_url( $url ) );
}


/**
 * Get default footer text
 *
 * @return string $text
 */
function abraham_get_default_footer_text() {
	$text = sprintf(
		__( 'Copyright &#169; %1$s %2$s.', 'abraham' ),
	date_i18n( 'Y' ),
	hybrid_get_site_link()
	);
	return $text;
}



/**
 * Modifications to TinyMCE, the default WordPress editor.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2015, Flagship Software, LLC
 * @license     GPL-2.0+
 * @link        https://flagshipwp.com/
 * @since       1.4.0
 */
add_filter( 'mce_buttons', 'flagship_add_styleselect', 99 );
/**
 * Add styleselect button to the end of the first row of TinyMCE buttons.
 *
 * @since  1.4.0
 * @access public
 * @param  $buttons array existing TinyMCE buttons
 * @return $buttons array modified TinyMCE buttons
 */
function flagship_add_styleselect( $buttons ) {
	// Get rid of styleselect if it's been added somewhere else.
	if ( in_array( 'styleselect', $buttons ) ) {
		unset( $buttons['styleselect'] );
	}
	array_push( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'flagship_disable_styleselect', 99 );
/**
 * Remove styleselect button if it's been added to the second row of TinyMCE
 * buttons.
 *
 * @since  1.4.0
 * @access public
 * @param  $buttons array existing TinyMCE buttons
 * @return $buttons array modified TinyMCE buttons
 */
function flagship_disable_styleselect( $buttons ) {
	if ( in_array( 'styleselect', $buttons ) ) {
		unset( $buttons['styleselect'] );
	}
	return $buttons;
}
add_filter( 'tiny_mce_before_init', 'flagship_tiny_mce_formats', 99 );
/**
 * Add our custom Flagship styles to the styleselect dropdown button.
 *
 * @since  1.4.0
 * @access public
 * @param  $args array existing TinyMCE arguments
 * @return $args array modified TinyMCE arguments
 * @see    http://wordpress.stackexchange.com/a/128950/9844
 */
function flagship_tiny_mce_formats( $args ) {
	$flagship_formats = apply_filters( 'flagship_tiny_mce_formats',
		array(
			array(
				'title'    => __( 'Intro Paragraph', 'flagship-library' ),
				'selector' => 'p',
				'classes'  => 'intro-pagragraph dropcap',
				'wrapper'  => true,
			),
			array(
				'title'    => __( 'Citation', 'flagship-library' ),
				'block'    => 'cite',
				'classes'  => 'cite',
			),
			array(
				'title'    => __( 'Code Block', 'flagship-library' ),
				'format'   => 'pre',
			),
			array(
				'title'    => __( 'Feature Box', 'flagship-library' ),
				'items'    => array(
				array(
					'title'    => __( 'General', 'flagship-library' ),
					'block'    => 'div',
					'classes'  => 'panel',
					'wrapper'  => true,
					'exact'    => true,
				),
				array(
					'title'    => __( 'Information', 'flagship-library' ),
					'block'    => 'div',
					'classes'  => 'panel panel--info',
					'wrapper'  => true,
					'exact'    => true,
				),
				array(
					'title'    => __( 'Warning', 'flagship-library' ),
					'block'    => 'div',
					'classes'  => 'panel panel--warning',
					'wrapper'  => true,
					'exact'    => true,
				),
				array(
					'title'    => __( 'Important', 'flagship-library' ),
					'block'    => 'div',
					'classes'  => 'panel panel--important',
					'wrapper'  => true,
					'exact'    => true,
				),
				),
			),
		)
	);
	// Merge with any existing formats which have been added by plugins.
	if ( ! empty( $args['style_formats'] ) ) {
		$existing_formats = json_decode( $args['style_formats'] );
		$flagship_formats = array_merge( $flagship_formats, $existing_formats );
	}
	$args['style_formats'] = json_encode( $flagship_formats );
	return $args;
}
