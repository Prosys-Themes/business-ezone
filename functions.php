<?php
/**
 * Business Ezone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business_Ezone
 */

//define theme version
if ( !defined( 'BUSINESS_EZONE_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'BUSINESS_EZONE_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/* Declare Global Default Page ID*/
$business_ezone_default_page = '';
$business_ezone_page_array = get_pages();
if(is_array($business_ezone_page_array)){
    $business_ezone_default_page = $business_ezone_page_array[0]->ID;
}

/* Declare Global Default Post ID*/
$business_ezone_default_post = '';
$business_ezone_post_array = get_posts();
if(is_array($business_ezone_post_array)){
    $business_ezone_default_post = $business_ezone_post_array[0]->ID;
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Implement the Custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the WordPress Hooks.
 */
require get_template_directory() . '/inc/wp-hooks.php';

/**
 * Custom template function for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template hooks for this theme.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load plugin for right and no sidebar
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';
