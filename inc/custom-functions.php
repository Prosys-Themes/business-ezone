<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Business_Ezone
 */

if ( ! function_exists( 'business_ezone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function business_ezone_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Business ezone, use a find and replace
		 * to change 'business-ezone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'business-ezone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'business-ezone' ),
			'secondary' => esc_html__( 'Top Menu', 'business-ezone' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'link',
	        'image',
			'quote',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'business_ezone_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Custom Image Size
		
	    add_image_size( 'business-ezone-slider', 1400, 550, true );
	    add_image_size( 'business-ezone-with-sidebar', 833, 474, true );
	    add_image_size( 'business-ezone-without-sidebar', 1110, 474, true );
	    add_image_size( 'business-ezone-welcome', 560, 360, true );

	    add_image_size( 'business-ezone-recent-post', 78, 78, true );
	    add_image_size( 'business-ezone-portfolio', 230, 230, true ); 
	    add_image_size( 'business-ezone-three-col', 360 , 240, true );
	    add_image_size( 'business-ezone-services-thumb', 100 , 100, true );
	    add_image_size( 'business-ezone-teams', 360 , 480, true );
	    
    /** Custom Logo */
    add_theme_support( 'custom-logo', array(    	
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
	}
endif;
add_action( 'after_setup_theme', 'business_ezone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_ezone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_ezone_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_ezone_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function business_ezone_template_redirect_content_width() {
	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = business_ezone_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1140;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}
}


/**
 * Enqueue scripts and styles.
 */
function business_ezone_scripts() {

	$business_ezone_typography = get_theme_mod( 'business_ezone_typography', 'Oswald' );
	
	switch ( $business_ezone_typography ) {
		case 'Dancing+Script':
			$business_ezone_query_args = array(
				'family' => 'Dancing+Script:200,400,700',//font-family: 'Dancing Script', Cursive;
			);
			break;

		case 'Open+Sans':
			$business_ezone_query_args = array(
				'family' => 'Open+Sans:200,400,700',//font-family: 'opens Sans', sans-serif
			);
		break;
		
		default:
			$business_ezone_query_args = array(
				'family' => 'Oswald:200,400',
			);
			break;
	}
	    
    wp_enqueue_style( 'business-ezone-google-fonts', add_query_arg( $business_ezone_query_args, "//fonts.googleapis.com/css" ) );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.css' );
    wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri() . '/css/jquery.sidr.light.css' );
    wp_enqueue_style( 'business-ezone-style', get_stylesheet_uri(), BUSINESS_EZONE_THEME_VERSION );


    
    wp_enqueue_style( 'skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), BUSINESS_EZONE_THEME_VERSION, true );
    wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'jquery-matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.js', array('jquery'), BUSINESS_EZONE_THEME_VERSION, true );
    wp_register_script( 'business-ezone-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), BUSINESS_EZONE_THEME_VERSION, true );
    
    $slider_auto      = get_theme_mod( 'business_ezone_slider_auto', '1' );
    $slider_loop      = get_theme_mod( 'business_ezone_slider_loop', '1' );
    $slider_pager     = get_theme_mod( 'business_ezone_slider_pager', '1' );    
    $slider_animation = get_theme_mod( 'business_ezone_slider_animation', 'slide' );
    $slider_speed     = get_theme_mod( 'business_ezone_slider_speeds', 400 );
    $slider_pause     = get_theme_mod( 'business_ezone_slider_pause', 6000 );
    
    $array = array(
        'auto'      => esc_attr( $slider_auto ),
        'loop'      => esc_attr( $slider_loop ),
        'pager'     => esc_attr( $slider_pager ),
        'animation' => esc_attr( $slider_animation ),
        'speed'     => absint( $slider_speed ),
        'pause'     => absint( $slider_pause ),
    );
    
    wp_localize_script( 'business-ezone-custom', 'business_ezone_data', $array );
    wp_enqueue_script( 'business-ezone-custom' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_ezone_scripts' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function business_ezone_body_classes( $classes ) {
	global $post;
    $ed_slider = get_theme_mod( 'business_ezone_ed_slider','1' );

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if( ( $ed_slider && is_page_template( 'template-home.php') ) || ( $ed_slider && is_front_page() && !is_home() ) ) {
        $classes[] = 'has-slider';
    }

	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
	$classes[] = 'custom-background-image';
	}

	// Adds a class of custom-background-color to sites with a custom background color.
	if ( get_background_color() != 'ffffff' ) {
	$classes[] = 'custom-background-color';
	}

	if(is_page()){
	$business_ezone_post_class = business_ezone_sidebar_layout(); 
	if( $business_ezone_post_class == 'no-sidebar' )
	$classes[] = 'full-width';
	}

	if( !( is_active_sidebar( 'right-sidebar' )) || is_page_template( 'template-home.php' ) || is_404() ) {
	  $classes[] = 'full-width'; 
	}

	return $classes;
}
add_filter( 'body_class', 'business_ezone_body_classes' );

/** 
 * Hook to move comment text field to the bottom in WP 4.4 
 *
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function business_ezone_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

if ( ! function_exists( 'business_ezone_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function business_ezone_excerpt_more( $more ) {
	if( ! is_admin() ){ 
		return ' &hellip; ';
	}
	else{
		return $more;
	}
}
endif;

if ( ! function_exists( 'business_ezone_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function business_ezone_excerpt_length( $length ) {
    return 20;
}
endif;

/* Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function business_ezone_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'business_ezone_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'business_ezone_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so business_ezone_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so business_ezone_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in business_ezone_categorized_blog.
 */
function business_ezone_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'business_ezone_categories' );
}
