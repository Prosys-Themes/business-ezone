<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business_Ezone
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		
		/** @see business_ezone_breadcrumbs_cb */
		do_action( 'business_ezone_breadcrumbs' );
		/**
		 * Before Post entry content
		 * 
		 * @see business_ezone_post_content_image - 10
		 * @see business_ezone_post_entry_header  - 20
		*/
		do_action( 'business_ezone_before_post_entry_content' ); 
	?>


	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'business-ezone' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'business-ezone' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php business_ezone_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post -->
