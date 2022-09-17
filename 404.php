<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Business_Ezone
 */

get_header(); ?>

		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<h1><?php _e( '404!', 'business-ezone' ); ?></h1>
				<h2><?php _e( 'The requested page cannot be found', 'business-ezone' ); ?></h2>
				<p><?php _e( 'Sorry but the page you are looking for cannot be found. Take a moment and do a search below or start from our', 'business-ezone' ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'homepage.', 'business-ezone' ); ?></a></p>
				<?php
					get_search_form();
				?>
			</section><!-- .error-404 -->
		</main><!-- #main -->

<?php
get_footer();
