<?php
/**
 * Business Ezone Theme Customizer.
 *
 * @package Business_Ezone
 */

    $business_ezone_settings = array( 'info','default', 'home', 'breadcrumb', 'typography', 'social'  );

    /* Option list of all post */	
    $business_ezone_options_posts = array();
    $business_ezone_options_posts_obj = get_posts('posts_per_page=-1');
    $business_ezone_options_posts[''] = __( 'Choose Post', 'business-ezone' );
    foreach ( $business_ezone_options_posts_obj as $business_ezone_posts ) {
    	$business_ezone_options_posts[$business_ezone_posts->ID] = $business_ezone_posts->post_title;
    }
    
 	/* Option list of all page */   
    $business_ezone_options_pages = array();
    $business_ezone_options_pages_obj = get_pages('posts_per_page=-1');
    $business_ezone_options_pages[''] = __( 'Choose Page', 'business-ezone' );
    foreach ( $business_ezone_options_pages_obj as $business_ezone_pages ) {
        $business_ezone_options_pages[$business_ezone_pages->ID] = $business_ezone_pages->post_title;
    }

    /* Option list of all categories */
    $business_ezone_args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $business_ezone_option_categories = array();
    $business_ezone_category_lists = get_categories( $business_ezone_args );
    $business_ezone_option_categories[''] = __( 'Choose Category', 'business-ezone' );
    foreach( $business_ezone_category_lists as $business_ezone_category ){
        $business_ezone_option_categories[$business_ezone_category->term_id] = $business_ezone_category->name;
    }

	foreach( $business_ezone_settings as $setting ){
		require get_template_directory() . '/inc/customizer/' . $setting . '.php';
	}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * FontAwesome list
*/
require get_template_directory() . '/inc/fontawesome-list.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_ezone_customize_preview_js() {
    wp_enqueue_script( 'business_ezone_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_ezone_customize_preview_js' );

/**
 * Enqueue Scripts for customize controls
*/
function business_ezone_customize_scripts() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');   
	wp_enqueue_style( 'business_ezone-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );    
    wp_enqueue_script( 'business_ezone-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'business_ezone_customize_scripts' );