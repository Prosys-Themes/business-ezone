<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Ezone
 */

/**
 * After Content
 * 
 * @see business_ezone_content_end - 20
*/
do_action( 'business_ezone_after_content' );

			
/**
 * Business Ezone Footer
 * 
 * @see business_ezone_footer_start   - 20
 * @see business_ezone_footer_widgets - 30
 * @see business_ezone_footer_credit  - 40
 * @see business_ezone_footer_end     - 50
*/
do_action( 'business_ezone_footer' );
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

