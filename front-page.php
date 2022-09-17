<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Ezone
 * @since 1.0.0
 * @version 1.0.3
 */

$slider_enable       = get_theme_mod( 'business_ezone_ed_slider','1' );
$featured_enable     = get_theme_mod( 'business_ezone_ed_featured_section', '1' );
$welcome_enable      = get_theme_mod( 'business_ezone_ed_welcome_section','1' );
$blog_enable         = get_theme_mod( 'business_ezone_ed_blog_section','1' );
$services_enable     = get_theme_mod( 'business_ezone_ed_service_section', '1' );
$portfolios_enable   = get_theme_mod( 'business_ezone_ed_portfolio_section', '1' );
$cta_enable          = get_theme_mod( 'business_ezone_ed_cta_section', '1' );
$teams_enable        = get_theme_mod( 'business_ezone_ed_teams_section', '1' );
$testimonials_enable = get_theme_mod( 'business_ezone_ed_testimonials_section', '1' );

get_header(); 
           
    if ( 'posts' == get_option( 'show_on_front' ) ) {
        include( get_home_template() );
    }elseif( $slider_enable || $featured_enable || $welcome_enable || $welcome_enable || $blog_enable || $services_enable || $cta_enable || $teams_enable || $testimonials_enable ){ ?>
        
        <?php
         /**
         * Home Page Contents
         * @hooked business_ezone_slider      - 20
         * @hooked business_ezone_featured    - 20
         * @hooked business_ezone_welcome     - 30
         * @hooked business_ezone_blog        - 40 
         * @hooked business_ezone_services    - 50
         * @hooked business_ezone_cta         - 60
         * @hooked business_ezone_portfolios  - 60
         * @hooked business_ezone_team        - 60
         * @hooked business_ezone_testimonial - 60
        */
        do_action( 'business_ezone_home_page' );
        ?>
   
    <?php        
    }else {
        include( get_page_template() );
    }


get_footer();