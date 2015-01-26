<?php
/**
 * Abraham functions and definitions
 *
 * @package Abraham
 */

/* Get the template directory and make sure it has a trailing slash. */
$abraham_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and theme files. */
require_once( $abraham_dir . 'library/hybrid.php'             );
require_once( $abraham_dir . 'inc/vendor/tha-theme-hooks.php' );


require_once( $abraham_dir . 'inc/init.php'                   );
require_once( $abraham_dir . 'inc/assets.php'                 );
require_once( $abraham_dir . 'inc/general.php'                );
require_once( $abraham_dir . 'inc/template-actions.php'       );
require_once( $abraham_dir . 'inc/hybrid-mods.php'            );
require_once( $abraham_dir . 'inc/google-analytics.php'       );

$abraham_customizer_dir = trailingslashit( $abraham_dir ) . 'inc/customizer';

require_once( $abraham_customizer_dir . 'custom-background.php'      );
require_once( $abraham_customizer_dir . 'custom-header.php'          );
require_once( $abraham_customizer_dir . 'custom-colors.php'          );
require_once( $abraham_customizer_dir . 'customizer.php'             );

/* Launch the Hybrid Core framework. */
new Hybrid();

/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}


add_filter( 'hybrid_comment_template_hierarchy', 'abe_comment_template_hierarchy' );

function abe_comment_template_hierarchy( $templates ) {


		$templates = array_merge( array( 'partials/comment.php' ), $templates );

	return $templates;
}
