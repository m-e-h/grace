<?php
/**
 * File for registering custom post types.
 *
 * @package    Directory
 * @subpackage Includes
 * @since      1.0.0
 * @author     Marty Helmick <justin@martyhelmick.com>
 * @copyright  Copyright (c) 2013 - 2014, Marty Helmick
 * @link       https://github.com/m-e-h/directory
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Register custom post types on the 'init' hook. */
add_action( 'init', 'doc_employees_register_post_types' );

/* Filter the "enter title here" text. */
add_filter( 'enter_title_here', 'employee_enter_title_here', 10, 2 );



function doc_employees_register_post_types() {

    /* Register the Employee post type. */

    register_post_type(
        'employee',
        array(
            'description'         => '',
            'public'              => true,
            'publicly_queryable'  => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'exclude_from_search' => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-id',
            'can_export'          => true,
            'delete_with_user'    => false,
            'hierarchical'        => false,
            'has_archive'         => 'employees',
            'query_var'           => 'employee',
            'capability_type'     => 'page',
            'map_meta_cap'        => true,

            /* Capabilities. */
            // 'capabilities' => array(

            //     // meta caps (don't assign these to roles)
            //     'edit_post'              => 'edit_employee',
            //     'read_post'              => 'read_employee',
            //     'delete_post'            => 'delete_employee',

            //     // primitive/meta caps
            //     'create_posts'           => 'create_employees',

            //     // primitive caps used outside of map_meta_cap()
            //     'edit_posts'             => 'edit_employees',
            //     'edit_others_posts'      => 'manage_employees',
            //     'publish_posts'          => 'manage_employees',
            //     'read_private_posts'     => 'read',

            //     // primitive caps used inside of map_meta_cap()
            //     'read'                   => 'read',
            //     'delete_posts'           => 'manage_employees',
            //     'delete_private_posts'   => 'manage_employees',
            //     'delete_published_posts' => 'manage_employees',
            //     'delete_others_posts'    => 'manage_employees',
            //     'edit_private_posts'     => 'edit_employees',
            //     'edit_published_posts'   => 'edit_employees'
            // ),

            /* The rewrite handles the URL structure. */
            'rewrite' => array(
                'slug'       => 'employees',
                'with_front' => false,
                'pages'      => true,
                'feeds'      => true,
                'ep_mask'    => EP_PERMALINK,
            ),

            /* What features the post type supports. */
            'supports' => array(
                'title',
                //'editor',
                'author',
                'thumbnail'
            ),

            /* Taxonomies of the post type. */
            // 'taxonomies'  => array(
            //     'department'
            // ),

            /* Labels used when displaying the posts. */
            'labels' => array(
                'name'               => __( 'Employees',                   'hybrid-base' ),
                'singular_name'      => __( 'Employee',                    'hybrid-base' ),
                'menu_name'          => __( 'Employees',                   'hybrid-base' ),
                'name_admin_bar'     => __( 'Employee',                    'hybrid-base' ),
                'add_new'            => __( 'Add New',                     'hybrid-base' ),
                'add_new_item'       => __( 'Add New Employee',            'hybrid-base' ),
                'edit_item'          => __( 'Edit Employee',               'hybrid-base' ),
                'new_item'           => __( 'New Employee',                'hybrid-base' ),
                'view_item'          => __( 'View Employee',               'hybrid-base' ),
                'search_items'       => __( 'Search Employees',            'hybrid-base' ),
                'not_found'          => __( 'No employees found',          'hybrid-base' ),
                'not_found_in_trash' => __( 'No employees found in trash', 'hybrid-base' ),
                'all_items'          => __( 'Employees',                   'hybrid-base' ),
            )
        )
    );
}

/**
 * Custom "enter title here" text.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $title
 * @param  object  $post
 * @return string
 */
function employee_enter_title_here( $title, $post ) {

    if ( 'employee' === $post->post_type || 'department' === $post->post_type )
        $title = __( 'Name to be displayed on the website', 'directory' );

    return $title;
}








if ( ! function_exists( 'contact_type_taxonomy' ) ) {

// Register Custom Taxonomy
function contact_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Contact Types', 'Taxonomy General Name', 'abraham' ),
		'singular_name'              => _x( 'Contact Type', 'Taxonomy Singular Name', 'abraham' ),
		'menu_name'                  => __( 'Contact Type', 'abraham' ),
		'all_items'                  => __( 'All types', 'abraham' ),
		'parent_item'                => __( 'Parent type', 'abraham' ),
		'parent_item_colon'          => __( 'Parent type:', 'abraham' ),
		'new_item_name'              => __( 'New type Name', 'abraham' ),
		'add_new_item'               => __( 'Add New type', 'abraham' ),
		'edit_item'                  => __( 'Edit type', 'abraham' ),
		'update_item'                => __( 'Update type', 'abraham' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'abraham' ),
		'search_items'               => __( 'Search types', 'abraham' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'abraham' ),
		'choose_from_most_used'      => __( 'Choose from the most used types', 'abraham' ),
		'not_found'                  => __( 'Contact Type Not Found', 'abraham' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'contact_type', array( 'employee' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'contact_type_taxonomy', 0 );

}