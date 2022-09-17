<?php
/**
 * Template Hooks
 *
 * @package Business_Ezone
 */

/**
 * Doctype
 * 
 * @see business_ezone_doctype_cb 
 */
add_action( 'business_ezone_doctype','business_ezone_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see business_ezone_head
*/
add_action( 'business_ezone_before_wp_head', 'business_ezone_head' );

/**
 * Before Header
 * 
 * @see business_ezone_page_start - 20
*/
add_action( 'business_ezone_before_header', 'business_ezone_page_start', 20 );

/**
 * business_ezone Header
 * 
 * @see business_ezone_header_start  - 20 
 * @see business_ezone_header_top 	 - 30 
 * @see business_ezone_header_bottom - 40 
 * @see business_ezone_header_menu 	 - 50 
 * @see business_ezone_header_end 	 - 60 
*/

add_action( 'business_ezone_header', 'business_ezone_header_start', 20 );
add_action( 'business_ezone_header', 'business_ezone_header_top', 30 );
add_action( 'business_ezone_header', 'business_ezone_header_bottom', 40 );
add_action( 'business_ezone_header', 'business_ezone_header_menu', 50 );
add_action( 'business_ezone_header', 'business_ezone_header_end', 60 );

/**
 * Home Page Contents
 * 
 * @see business_ezone_slider 	   - 10
 * @see business_ezone_featured    - 20
 * @see business_ezone_welcome     - 30
 * @see business_ezone_blog        - 40 
 * @see business_ezone_service     - 50
 * @see business_ezone_cta  	   - 60
 * @see business_ezone_portfolio   - 70
 * @see business_ezone_team  	   - 80
 * @see business_ezone_testimonial - 90
*/
add_action( 'business_ezone_home_page', 'business_ezone_slider', 10 );
add_action( 'business_ezone_home_page', 'business_ezone_featured', 20 );
add_action( 'business_ezone_home_page', 'business_ezone_welcome', 30 );
add_action( 'business_ezone_home_page', 'business_ezone_blog', 40 );
add_action( 'business_ezone_home_page', 'business_ezone_service', 50 );
add_action( 'business_ezone_home_page', 'business_ezone_cta', 60 );
add_action( 'business_ezone_home_page', 'business_ezone_portfolio', 70 );
add_action( 'business_ezone_home_page', 'business_ezone_team', 80 );
add_action( 'business_ezone_home_page', 'business_ezone_testimonial', 90 );



/**
 * business_ezone Content
 * 
 * @see business_ezone_content_start
*/
add_action( 'business_ezone_before_content', 'business_ezone_content_start' );

/**
 * Before Page entry content
 * 
 * @see business_ezone_page_content_image
*/
add_action( 'business_ezone_before_page_entry_content', 'business_ezone_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see business_ezone_post_content_image - 10
 * @see business_ezone_post_entry_header  - 20
*/
add_action( 'business_ezone_before_post_entry_content', 'business_ezone_post_content_image', 10 );
add_action( 'business_ezone_before_post_entry_content', 'business_ezone_post_entry_header', 20 );

/**
 * After post content
 * 
 * @see business_ezone_post_author  - 20
*/
add_action( 'business_ezone_after_post_content', 'business_ezone_post_author', 20 );

/**
 * Comment
 * 
 * @see business_ezone_get_comment_section 
*/
add_action( 'business_ezone_comment', 'business_ezone_get_comment_section' );

/**
 * After Content
 * 
 * @see business_ezone_content_end - 20
*/
add_action( 'business_ezone_after_content', 'business_ezone_content_end', 20 );

/**
 * Business Ezone Footer
 * 
 * @see business_ezone_footer_start  - 20
 * @see business_ezone_footer_widgets    - 30
 * @see business_ezone_footer_credit - 40
 * @see business_ezone_footer_end    - 50
*/
add_action( 'business_ezone_footer', 'business_ezone_footer_start', 20 );
add_action( 'business_ezone_footer', 'business_ezone_footer_widgets', 30 );
add_action( 'business_ezone_footer', 'business_ezone_footer_credit', 40 );
add_action( 'business_ezone_footer', 'business_ezone_scroll_up', 50 );
add_action( 'business_ezone_footer', 'business_ezone_footer_end', 60 );

/**
 * After Footer
 * 
 * @see business_ezone_page_end - 20
*/
add_action( 'business_ezone_after_footer', 'business_ezone_back_to_top', 15 );
add_action( 'business_ezone_after_footer', 'business_ezone_page_end', 20 );