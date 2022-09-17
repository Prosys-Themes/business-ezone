<?php
/**
 * WP hooks for this theme.
 *
 * @package Business_Ezone
 */

/**
 * @see business_ezone_setup
*/
add_action( 'after_setup_theme', 'business_ezone_setup' );

/**
 * @see business_ezone_content_width
*/
add_action( 'after_setup_theme', 'business_ezone_content_width', 0 );

/**
 * @see business_ezone_template_redirect_content_width
*/
add_action( 'template_redirect', 'business_ezone_template_redirect_content_width' );

/**
 * @see business_ezone_scripts 
*/
add_action( 'wp_enqueue_scripts', 'business_ezone_scripts' );

/**
 * @see business_ezone_body_classes
*/
add_filter( 'body_class', 'business_ezone_body_classes' );

/**
 * @see business_ezone_category_transient_flusher
*/
add_action( 'edit_category', 'business_ezone_category_transient_flusher' );
add_action( 'save_post',     'business_ezone_category_transient_flusher' );

/**
 * Move comment field to the bottm
 * @see business_ezone_move_comment_field_to_bottom
*/
add_filter( 'comment_form_fields', 'business_ezone_move_comment_field_to_bottom' );

/**
 * @see business_ezone_excerpt_more
 * @see business_ezone_excerpt_length
*/
add_filter( 'excerpt_more', 'business_ezone_excerpt_more' );
add_filter( 'excerpt_length', 'business_ezone_excerpt_length', 999 );

/**
 * Dynamic CSS
 * @see business_ezone_dynamic_css
*/
add_action( 'wp_head', 'business_ezone_dynamic_css', 99 );