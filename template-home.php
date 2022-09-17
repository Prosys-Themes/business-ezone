<?php

/**
 * Template Name: Home Page
 *
 * @package Business_Ezone
 */

get_header();

 /**
 * Home Page Contents
 * 
 * @hooked business_ezone_slider      - 10
 * @hooked business_ezone_featured    - 20
 * @hooked business_ezone_welcome     - 30
 * @hooked business_ezone_blog        - 40 
 * @hooked business_ezone_services    - 50
 * @hooked business_ezone_cta  		  - 60
 * @hooked business_ezone_portfolios  - 60
 * @hooked business_ezone_team  	  - 60
 * @hooked business_ezone_testimonial - 60
*/
do_action( 'business_ezone_home_page' );

get_footer();