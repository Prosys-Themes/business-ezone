<?php
/**
 * Custom template function for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Business_Ezone
 */

if( ! function_exists( 'business_ezone_doctype_cb' ) ) :
/**
 * Doctype Declaration
 * 
 * @since 1.0.1
*/
function business_ezone_doctype_cb(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;


if( ! function_exists( 'business_ezone_head' ) ) :
/**
 * Before wp_head
 * 
 * @since 1.0.1
*/
function business_ezone_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;

if( ! function_exists( 'business_ezone_header_start' ) ) :
/**
 * Header Start
 * 
 * @since 1.0.1
*/
function business_ezone_header_start(){
    ?>
    <header id="masthead" class="site-header" role="banner">
    <?php 
}
endif;

if( ! function_exists( 'business_ezone_header_top' ) ) :
/**
 * Header Top
 * 
 * @since 1.0.1
*/
function business_ezone_header_top(){

    $business_ezone_ed_social = get_theme_mod('business_ezone_ed_social');
    if( has_nav_menu('secondary') || $business_ezone_ed_social ){ 
    ?>
    <!-- header-top -->
        <div class="header-top">
            <div class="container">
                <?php do_action( 'business_ezone_social_link' );?>
                <!-- Header Top Menu -->
                <?php if( has_nav_menu('secondary') ){ ?>
                <div id="mobile-header-top">
                    <a id="responsive-menu-button-top" href="#sidr-main-top"><i class="fa fa-bars"></i></a>
                </div>
                
                <nav id="top-site-navigation" class="top-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'depth' => 1 ) ); ?>
                </nav>

                <?php } ?>
               
            </div>
        </div>
    <?php 
    }
}
endif;

if( ! function_exists( 'business_ezone_header_bottom' ) ) :
/**
 * Header Site Branding
 * 
 * @since 1.0.1
*/
function business_ezone_header_bottom(){
    ?>
    <div class="header-bottom">
        <div class="container">
            <div class="site-branding">
                <?php 
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                              the_custom_logo();
                          } 
                ?>
                <div class="text-logo">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php
                        $description = get_bloginfo( 'description', 'display' );
                        if ( esc_html( $description ) || is_customize_preview() ) { ?>
                          <p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                  <?php } ?>
                </div>  
            </div><!-- .site-branding -->
    <?php 
}
endif;

if( ! function_exists( 'business_ezone_header_menu' ) ) :
/**
 * Header Primary Menu
 * 
 * @since 1.0.1
*/
function business_ezone_header_menu(){
    ?>
    
   	<div id="mobile-header">
        <a id="responsive-menu-button" href="#sidr-main"><i class="fa fa-bars"></i></a>
    </div>
    <nav id="site-navigation" class="main-navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </nav><!-- #site-navigation -->
    <?php 
}
endif;

if( ! function_exists( 'business_ezone_header_end' ) ) :
/**
 * Header End
 * 
 * @since 1.0.1
*/
function business_ezone_header_end(){
    ?>
		  </div>
        </div>
    </header><!-- #masthead -->
    <?php 
}
endif;


/* Home page */

if( ! function_exists( 'business_ezone_template_section_header' ) ) :
/**
 * Template Section Header
 * 
 * @since 1.0.1
*/
function business_ezone_template_header( $section_title ){
    $header_query = new WP_Query( array( 
        'p'         => absint( $section_title ),
        'post_type' => 'page'
    ));

        if( absint( $section_title ) && $header_query->have_posts() ){ 
            while( $header_query->have_posts() ){ $header_query->the_post();
    ?>
                <header class="main-header">
                    <?php 
                        echo '<h1>';
                         the_title();
                         echo '</h2>';
                        echo the_excerpt(); 
                    ?>
                </header>
    <?php   }
        wp_reset_postdata();
        }   

}
endif;

if( ! function_exists( 'business_ezone_slider' ) ) :
/**
 * Home Page Slider Section
 * 
 * @since 1.0.1
*/
function business_ezone_slider(){
    global $business_ezone_default_post;
    
    $slider_enable      = get_theme_mod( 'business_ezone_ed_slider','1' );
    $slider_caption     = get_theme_mod( 'business_ezone_slider_caption', '1' );
    $slider_readmore    = get_theme_mod( 'business_ezone_slider_readmore', __( 'Learn More', 'business-ezone' ) );
    $slider_contact     = get_theme_mod( 'business_ezone_slider_contact_text', __( 'Contact Us', 'business-ezone' ) );
    $slider_contact_url = get_theme_mod( 'business_ezone_slider_contact_url', '#' );
   
    if( $slider_enable ){
        echo '<section id="banner" class="banner">';
            echo '<div class="fadeout owl-carousel owl-theme clearfix">';
            for( $i=1; $i<=3; $i++){  
                $business_ezone_slider_post_id = get_theme_mod( 'business_ezone_slider_post_'.$i, $business_ezone_default_post ); 
                if( $business_ezone_slider_post_id ){
                    $qry = new WP_Query ( array( 'p' => absint( $business_ezone_slider_post_id ) ) );            
                    if( $qry->have_posts() ){ 
                        while( $qry->have_posts() ){
                        $qry->the_post();
                            ?>
                            <div class="item">
                                <?php 
                                if( has_post_thumbnail() ){ 
                                    the_post_thumbnail( 'business-ezone-slider' );
                                }else{
                                    echo '<img src="'. esc_url( get_template_directory_uri() ).'/images/banner.png">';
                                } 
                                        if( $slider_caption ){ ?>
                                            <div class="banner-text">
                                                <strong class="title"><h1><?php the_title(); ?></h1></strong>
                                                <?php the_excerpt(); ?>
                                                <div class="button-holder">
                                                    <?php if( $slider_readmore ){ ?> 
                                                        <a class="btn blank" href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html( $slider_readmore );?></a>
                                                    <?php } 
                                                        if( $slider_contact && $slider_contact_url ){ ?> 
                                                        <a class="btn white" href="<?php echo esc_url( $slider_contact_url);  ?>">
                                                        <?php echo esc_html( $slider_contact ); ?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                    <?php } ?>
                                </div>
                        <?php 
                        }
                    }
                }
            }
            wp_reset_postdata();  
            echo '</div>';
        echo '</section>';
    }    
}
endif;

if( ! function_exists( 'business_ezone_featured' ) ) :
/**
 * Home Page featured Section
 * 
 * @since 1.0.1
*/
function business_ezone_featured(){
global $business_ezone_default_post;
    
    $featured_enable     = get_theme_mod( 'business_ezone_ed_featured_section', '1' );
    $featured_post_icon   = get_theme_mod( 'business_ezone_ed_featured_icon', '1' );

    if( $featured_enable ){
        echo '<section id="featured" class="featured">';
            echo '<div class="container">';
                echo '<div class="row">';
                for( $i = 1; $i <= 3; $i++ ){
                    $business_ezone_featured_post_id = get_theme_mod( 'business_ezone_feature_post_'.$i, $business_ezone_default_post ); 
                    $business_ezone_featured_page_icon = get_theme_mod( 'business_ezone_feature_icon_'.$i, 'fa-bell');

                    if( $business_ezone_featured_post_id ){
                    $qry = new WP_Query ( array( 'p' => absint( $business_ezone_featured_post_id ) ) );
                        if( $qry->have_posts() ){
                            while( $qry->have_posts() ){
                                $qry->the_post();
                            ?>
                                <div class="col-4 featured-item">
                                    <?php
                                        if( has_post_thumbnail() &&  ! $featured_post_icon ){ 
                                            echo '<a href="' . esc_url( get_the_permalink() ) .'">';
                                                the_post_thumbnail( 'business-ezone-recent-post' ); 
                                            echo '</a>';
                                        }else{
                                            echo '<a href="' . esc_url( get_the_permalink() ) .'">';
                                                echo '<i class="fa ' . esc_html( $business_ezone_featured_page_icon ) .'"></i>';
                                            echo '</a>';
                                        } 
                                    ?>
                                    <div class="featured-text">
                                        <a href="<?php the_permalink(); ?>"><?php the_title('<h3>','</h3>'); ?></a>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        wp_reset_postdata();  
                    }
                } 
                echo '</div>'; 
            echo '</div>'; 
        echo '</section>';  
    }   

}

endif;


if( ! function_exists( 'business_ezone_welcome' ) ) :
/**
 * Home Page welcome Section
 * 
 * @since 1.0.1
*/
function business_ezone_welcome(){
    global $business_ezone_default_page;
    
    $welcome_enable     = get_theme_mod( 'business_ezone_ed_welcome_section','1' );
    if( $welcome_enable ){
        echo '<section id="about" class="about">';
            echo '<div class="container">';
                if( have_posts() ){
                    echo '<div class="row">';
                        while( have_posts() ){
                            the_post();
                        ?>
                            <div class="about-item">
                                <?php if( has_post_thumbnail() ){ the_post_thumbnail( 'business-ezone-welcome' ); } ?>
                                <div class="about-text">
                                    <?php
                                        the_title('<h1>', '</h1>');
                                        the_content(); 
                                    ?>
                                </div>
                            </div>
                            
                        <?php
                        }
                    echo '</div>'; 
                }
                wp_reset_postdata();  
                
            echo '</div>'; 
        echo '</section>';     
    }    
    
}

endif;

if( ! function_exists( 'business_ezone_blog' ) ) :
/**
 * Home Page Latest Post Section
 * 
 * @since 1.0.1
*/
function business_ezone_blog(){
    global $business_ezone_default_page;
    
    $blog_enable    = get_theme_mod( 'business_ezone_ed_blog_section','1' );
    $blog_meta      = get_theme_mod( 'business_ezone_ed_blog_date','1' );
    $blog_title     = get_theme_mod( 'business_ezone_blog_section_title', $business_ezone_default_page ); 
    $blog_readmore  = get_theme_mod( 'business_ezone_blog_section_readmore',__('Read More','business-ezone') ); 
    $blog_url       = get_theme_mod( 'business_ezone_blog_section_url','#' ); 
    $blog_category  = get_theme_mod( 'business_ezone_blog_section_category' ); 
   
    if( $blog_enable ){
        $args = array( 
            'post_type'          => 'post', 
            'post_status'        => 'publish',
            'posts_per_page'     => 3,        
            'ignore_sticky_post' => true  
        );

        if( $blog_category ){
            $args[ 'cat' ] = absint( $blog_category );
        }
        
        $qry = new WP_Query( $args );

        echo '<section id="latest-activity">';
            echo '<div class="container">';

            if( $blog_title ) {  business_ezone_template_header( $blog_title ); }
           
                echo '<div class="row latest-activities">';

                    if( $qry->have_posts() ){ ?>
                        <?php
                        while( $qry->have_posts() ){
                            $qry->the_post();
                        ?>
                            <div class="col-4 activity-items">
                                <?php if( has_post_thumbnail() ){ the_post_thumbnail( 'business-ezone-three-col' ); 
                                }else{
                                    echo '<img src="'. esc_url( get_template_directory_uri() ).'/images/default-thumb-3col.png">';
                                } ?>
                                <div class="activity-text">
                                    <header class="entry-header">
                                        <?php if( isset( $blog_meta ) ){ ?>
                                        <div class="entry-meta">
                                            <?php 
                                                business_ezone_posted_on();
                                            ?>
                                        </div>
                                        <?php } ?>
                                        <a href="<?php the_permalink(); ?>"><?php the_title('<h3 class="entry-title">','</h3>'); ?></a>
                                    </header>
                                    <div class="entry-content">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="btn-continue"><?php esc_html_e( 'Continue','business-ezone' );?> <i class="fa fa-long-arrow-right"></i></a>
                                    </footer>
                                </div>
                            </div>
                            
                        <?php
                        }
                    }
                    wp_reset_postdata();  
                echo '</div>'; 
                if( $blog_readmore && $blog_url ){ ?>
                    <div class="about-buttons">
                        <a class="btn blue" href="<?php echo esc_url( $blog_url) ?>"><?php echo esc_html( $blog_readmore );?></a>
                    </div> 
                <?php } 
            echo '</div>'; 
        echo '</section>';     
    }    
 
}
endif;

if( ! function_exists( 'business_ezone_service' ) ) :
/**
 * Home Page Latest Post Section
 * 
 * @since 1.0.1
*/
function business_ezone_service(){
    global $business_ezone_default_page;
    global $business_ezone_default_post;

    $services_enable     = get_theme_mod( 'business_ezone_ed_service_section', '1' );
    $services_font_icon  = get_theme_mod( 'business_ezone_ed_service_fontawesome', '1' );
    $services_page       = get_theme_mod( 'business_ezone_service_section_page', $business_ezone_default_page ); 
    $services_readmore   = get_theme_mod( 'business_ezone_service_section_readmore',__('Read More','business-ezone') ); 
    $services_url        = get_theme_mod( 'business_ezone_service_section_url','#' );

    if( $services_enable ){

        echo '<section id="skills">';
            echo '<div class="container">';

            if( $services_page ) {  business_ezone_template_header( $services_page ); }
           
                echo '<div class="row skill-items">';

                    for( $i = 1; $i <= 6; $i++ ){
                        $business_ezone_services_post_id = get_theme_mod( 'business_ezone_service_post_'.$i, $business_ezone_default_post ); 
                        $business_ezone_services_page_icon = get_theme_mod( 'business_ezone_service_icon_'.$i, 'fa-bell');

                            if( $business_ezone_services_post_id ) {                           
                                $qry = new WP_Query( array( 'p' => absint( $business_ezone_services_post_id ) ) );

                                    if( $qry->have_posts() ){ ?>
                                        <?php
                                        while( $qry->have_posts() ){
                                            $qry->the_post();
                                        ?>
                                            <div class="col-4">
                                                <div class="skill-item">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php 
                                                            if( esc_html( $business_ezone_services_page_icon ) && $services_font_icon ){ 
                                                                echo '<i class="fa ' . esc_html( $business_ezone_services_page_icon ) .'"></i>';
                                                            }else{
                                                                the_post_thumbnail( 'business-ezone-services-thumb' ); 
                                                            }
                                                        ?>
                                                    </a>
                                                    <div class="skill-text">
                                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                                                            <?php the_excerpt(); ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="btn blue"><?php esc_html_e( 'Read More','business-ezone' );?></a>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                
                                wp_reset_postdata();  
                            }
                        }
                        

                echo '</div>';

                if( $services_readmore && $services_url ){ ?>
                    <div class="about-buttons">
                        <a class="btn blue" href="<?php echo esc_url( $services_url ); ?>"><?php echo esc_html( $services_readmore );?></a>
                    </div> 
                <?php }
            echo '</div>'; 
        echo '</section>';     
    }    
}
endif;

if( ! function_exists( 'business_ezone_portfolio' ) ) :
/**
 * Home Page Latest Post Section
 * 
 * @since 1.0.1
*/
function business_ezone_portfolio(){
    global $business_ezone_default_post;
    global $business_ezone_default_page;
    
    $portfolios_enable     = get_theme_mod( 'business_ezone_ed_portfolio_section', '1' );
    $portfolios_page       = get_theme_mod( 'business_ezone_portfolio_section_page', $business_ezone_default_page ); 
    $portfolios_readmore   = get_theme_mod( 'business_ezone_portfolio_section_readmore',__('Read More','business-ezone') ); 
    $portfolios_url        = get_theme_mod( 'business_ezone_portfolio_section_url','#' );
   
    if( $portfolios_enable ){

        echo '<section id="gallery">';
            echo '<div class="container">';
                echo '<div class="row skill-items">';

                    if( $portfolios_page ) {  business_ezone_template_header( $portfolios_page ); } 

                    for( $i = 1; $i <= 6; $i++ ){
                        $business_ezone_portfolio_post_id = get_theme_mod( 'business_ezone_portfolio_post_'.$i, $business_ezone_default_post ); 

                        if( $business_ezone_portfolio_post_id ){
        
                            $qry = new WP_Query( array( 'p' => absint( $business_ezone_portfolio_post_id ) ) );                 

                            if( $qry->have_posts() ){ 
                                while( $qry->have_posts() ){
                                    $qry->the_post();

                                    if( has_post_thumbnail() ){ 
                                ?>
                                        <div class="col-4">
                                            <div class="gallery-item">
                                                <?php the_post_thumbnail( 'business-ezone-portfolio' ); ?>
                                                <div class="gallery-mask">
                                                <?php 
                                                    the_title('<h2>', '</h2>' );
                                                    the_excerpt(); 
                                                ?>
                                                    <a href="<?php the_permalink(); ?>" class="btn blue"><?php esc_html_e( 'Read More','business-ezone' );?></a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <?php
                                    }
                                }
                            }
                        wp_reset_postdata();  
                        }
                    }

                    if( $portfolios_readmore && $portfolios_url ){ ?>
                        <div class="about-buttons">
                            <a class="btn blue" href="<?php echo esc_url( $portfolios_url) ?>"><?php echo esc_html( $portfolios_readmore );?></a>
                        </div> 
                    <?php }
                echo '</div>';
            echo '</div>'; 
        echo '</section>';     
    }    
 
}
endif;


if( ! function_exists( 'business_ezone_cta' ) ) :
/**
 * Home Page cta Section
 * 
 * @since 1.0.1
*/
function business_ezone_cta(){
    global $business_ezone_default_page;
    $cta_enable  = get_theme_mod( 'business_ezone_ed_cta_section', '1' );
    $cta_page    = get_theme_mod( 'business_ezone_cta_section_page', $business_ezone_default_page ); 
    $cta_one     = get_theme_mod( 'business_ezone_cta_section_button_one', __( 'About Us', 'business-ezone' ) ); 
    $cta_one_url = get_theme_mod( 'business_ezone_cta_button_one_url', '#' ); 
    $cta_two     = get_theme_mod( 'business_ezone_cta_section_button_two', __( 'Contact Us', 'business-ezone' )); 
    $cta_two_url = get_theme_mod( 'business_ezone_cta_button_two_url', '#' ); 

    if( $cta_page && $cta_enable ){
        $qry = new WP_Query ( array( 
            'post_type'     => 'page', 
            'p'             => absint( $cta_page ) 
        ) );

            if( $qry->have_posts() ){
                while( $qry->have_posts() ){
                    $qry->the_post();
                ?>
               <section id="cta" class="cta" <?php if( has_post_thumbnail() ) echo 'style="background: url(' . esc_url( get_the_post_thumbnail_url() ) . ')no-repeat; background-size: cover; background-position: center; background-attachment: fixed;"';?> >
                    <div class="container">
                        <div class="row">
                            <?php
                                the_title('<h1>', '</h1>');
                                the_content(); 
                            ?>
                            <div class="cta-btn">
                                <?php 
                                    if( $cta_one && $cta_one_url ) { 
                                        echo '<a class="btn blue" href="' . esc_url( $cta_one_url ) . '">';
                                            echo esc_html( $cta_one ); 
                                        echo '</a>';
                                    } 
                                    if( $cta_two && $cta_two_url ) { 
                                        echo '<a class="btn green" href="' . esc_url( $cta_two_url ) . '">';
                                            echo esc_html( $cta_two ); 
                                        echo '</a>';
                                    } 
                                ?>
                            </div>
                            
                        </div>
                    </div> 
                </section>          
                <?php
                }
            }
        wp_reset_postdata();  
    }    
}

endif;

if( ! function_exists( 'business_ezone_team' ) ) :
/**
 * Home Page Teams Section
 * 
 * @since 1.0.1
*/
function business_ezone_team(){
    global $business_ezone_default_page;

    $team_enable    = get_theme_mod( 'business_ezone_ed_teams_section', '1' );
    $team_title     = get_theme_mod( 'business_ezone_teams_section_title', $business_ezone_default_page); 
    $team_category  = get_theme_mod( 'business_ezone_team_category' ); 
   
    if( $team_enable ){
        $args = array( 
            'post_type'          => 'post', 
            'post_status'        => 'publish',
            'cat'                => absint( $team_category ),
            'posts_per_page'     => 6,       
            'orderby'            => 'post_in', 
            'ignore_sticky_post' => true  
        );

        if( $team_category ){
            $args[ 'cat' ] = absint( $team_category );
        }
        $qry = new WP_Query( $args );

        echo '<section id="teams">';
            echo '<div class="container">';

            if( $team_title ) {  business_ezone_template_header( $team_title ); }
           
                echo '<div class="row latest-activities">';

                    if( $qry->have_posts() ){ ?>
                        <?php
                        while( $qry->have_posts() ){
                            $qry->the_post();
                        ?>
                        <div class="col-4">
                            <div class="team-item">
                                <?php if( has_post_thumbnail() ){ the_post_thumbnail( 'business-ezone-teams' ); }
                                    else{
                                        echo '<img src="' . get_template_directory_uri().'/images/team-one.png">';
                                    } ?>
                                <div class="team-mask">
                                    <a href="<?php the_permalink(); ?>"><?php the_title( '<h3>', '</h3>'); ?></a>
                                    <span class="team-designation"><?php if( has_excerpt() ){ the_excerpt(); } ?></span>
                                    <?php the_content();?>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    }
                    wp_reset_postdata();  
                echo '</div>'; 
            echo '</div>'; 
        echo '</section>';     
    }    
 
}
endif;


if( ! function_exists( 'business_ezone_testimonial' ) ) :
/**
 * Home Page testimonials Section
 * 
 * @since 1.0.1
*/
function business_ezone_testimonial(){
    global $business_ezone_default_page;
    
    $testimonial_enable    = get_theme_mod( 'business_ezone_ed_testimonials_section', '1' );
    $testimonial_title     = get_theme_mod( 'business_ezone_testimonials_section_title', $business_ezone_default_page );  
    $testimonial_category  = get_theme_mod( 'business_ezone_testimonial_category' ); 
   
    if( $testimonial_enable ){
        $args = array( 
            'post_type'          => 'post', 
            'post_status'        => 'publish',
            'posts_per_page'     => 6,        
            'ignore_sticky_post' => true  
        );

        if( $testimonial_category ){
            $args[ 'cat' ] = absint( $testimonial_category );
        }
        $qry = new WP_Query( $args );

        echo '<section id="testimonial">';
            echo '<div class="container">';

            if( $testimonial_title ) {  business_ezone_template_header( $testimonial_title ); }
           
                echo '<div class="row">';
                    echo '<div class="testimonial-slider owl-carousel owl-theme clearfix">';
                    if( $qry->have_posts() ){ 
                        while( $qry->have_posts() ){
                            $qry->the_post(); 
                        ?>
                        
                        <div class="item">
                            <div class="col-4">
                                <div class="testimonial-thumbnail">
                                    <?php if( has_post_thumbnail() ){ the_post_thumbnail( 'business-ezone-teams' ); }
                                    else{
                                        echo '<img src="' . get_template_directory_uri().'/images/team-one.png">';
                                    } ?>
                                    <div class="testimonial-info">
                                        <h3><?php the_title(); ?></h3>
                                        <span class="testimonial-designation"><?php if( has_excerpt() ){ the_excerpt(); } ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="testimonial-text">
                                    <blockquote>
                                       <?php the_content(); ?>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                    }
                    wp_reset_postdata();  
                    echo '</div>'; 
                echo '</div>'; 
            echo '</div>'; 
        echo '</section>';     
    }    
 
}
endif;

if( ! function_exists( 'business_ezone_content_start' ) ) :
/**
 * Content Start
 * 
 * @since 1.0.1
*/
function business_ezone_content_start(){ 
    $ed_slider = get_theme_mod( 'business_ezone_ed_slider','1' );
    $class = is_404() ? 'error-holder' : 'row' ;

    if( !( is_page_template( 'template-home.php' ) || ( ! is_home() && is_front_page() ) ) ){
    ?>
    <div id="content" class="site-content">
        <div class="container">
             <div class="<?php echo esc_attr( $class ); ?>">
    <?php
    }
}
endif;

if( ! function_exists( 'business_ezone_page_content_image' ) ) :
/**
 * Page Featured Image
 * 
 * @since 1.0.1
*/
function business_ezone_page_content_image(){
    $sidebar_layout = business_ezone_sidebar_layout();
    if( has_post_thumbnail() )
    ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'business-ezone-with-sidebar' ) : the_post_thumbnail( 'business-ezone-without-sidebar' );    
}
endif;


if( ! function_exists( 'business_ezone_post_content_image' ) ) :
/**
 * Post Featured Image
 * 
 * @since 1.0.1
*/
function business_ezone_post_content_image(){
    if( has_post_thumbnail() ){
    echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; 
         ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'business-ezone-with-sidebar' ) : the_post_thumbnail( 'business-ezone-without-sidebar' ) ; 
    echo ( !is_single() ) ? '</a>' : '</div>' ;    
    }
}
endif;

if( ! function_exists( 'business_ezone_post_entry_header' ) ) :
/**
 * Post Entry Header
 * 
 * @since 1.0.1
*/
function business_ezone_post_entry_header(){
    ?>
    
    <header class="entry-header">
        <?php
            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php  
                business_ezone_posted_on(); 
                business_ezone_categories();
                business_ezone_comments();
            ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
    </header>

    <?php
}
endif;

if( ! function_exists( 'business_ezone_archive_entry_header_before' ) ) :
/**
 * Archive Entry Header
 * 
 * @since 1.0.1
*/
function business_ezone_archive_entry_header_before(){
    echo '<div class = "text-holder" >';
}    
endif;   
    
if( ! function_exists( 'business_ezone_archive_entry_header' ) ) :
/**
 * Archive Entry Header
 * 
 * @since 1.0.1
*/
function business_ezone_archive_entry_header(){
    ?>
    <header class="entry-header">
        <div class="entry-meta">
            <?php business_ezone_posted_on_date(); ?>
        </div><!-- .entry-meta -->
        <h2 class="entry-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
    </header>   
    <?php
}
endif;

if( ! function_exists( 'business_ezone_post_author' ) ) :
/**
 * Post Author Bio
 * 
 * @since 1.0.1
*/
function business_ezone_post_author(){
    if( get_the_author_meta( 'description' ) ){
        global $post;
    ?>
    <section class="author-section">
        <div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></div>
            <div class="text-holder">
                <strong class="name"><?php the_author_meta( 'display_name', $post->post_author ); ?></strong>
                <?php the_author_meta( 'description' ); ?>
            </div>
    </section>
    <?php  
    }  
}
endif;

if( ! function_exists( 'business_ezone_get_comment_section' ) ) :
/**
 * Comment template
 * 
 * @since 1.0.1
*/
function business_ezone_get_comment_section(){
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
}
endif;

if( ! function_exists( 'business_ezone_content_end' ) ) :
/**
 * Content End
 * 
 * @since 1.0.1
*/
function business_ezone_content_end(){

    $ed_slider = get_theme_mod( 'business_ezone_ed_slider','1' );
    
     if( !( is_page_template( 'template-home.php' ) || ( ! is_home() && is_front_page() ) ) ){
        echo '</div></div></div>';// .row /#content /.container
    }
}
endif;

if( ! function_exists( 'business_ezone_footer_start' ) ) :
/**
 * Footer Start
 * 
 * @since 1.0.1
*/
function business_ezone_footer_start(){
    echo '<footer id="colophon" class="site-footer" role="contentinfo">';

}
endif;


if( ! function_exists( 'business_ezone_footer_widgets' ) ) :
/**
 * Footer Widgets
 * 
 * @since 1.0.1 
*/
function business_ezone_footer_widgets(){
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ){?>
        <div class="widget-area">
            <div class="container">
                <div class="row">
                    
                    <?php if( is_active_sidebar( 'footer-one' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-one' ); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-two' ); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-three' ); ?>
                    </div>
                    <?php } ?>
                    
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .widget-area -->
<?php } 
}
endif;

if( ! function_exists( 'business_ezone_footer_credit' ) ) :
/**
 * Footer Credits 
 */
function business_ezone_footer_credit(){
    echo '<div class="footer-b">';
        echo '<div class="container">'; 
            echo '<div class="site-info">';
                echo esc_html( '&copy;&nbsp;'. date_i18n( 'Y' ), 'business-ezone' );
                echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';

                printf( '&nbsp;%s', '<a href="'. esc_url( __( 'http://prosysthemes.com/wordpress-themes/business-ezone/', 'business-ezone' ) ) .'" target="_blank">'. esc_html__( 'Business Ezone By Prosys Theme. ', 'business-ezone' ) .'</a>' );
                printf( esc_html__( 'Powered by %s', 'business-ezone' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'business-ezone' ) ) .'" target="_blank">'. esc_html__( 'WordPress', 'business-ezone' ) . '</a>' );
            echo '</div>';
        echo '</div>';
    echo '</div>';
}
endif;

if( ! function_exists( 'business_ezone_scroll_up' ) ) :
/**
 * Footer Credits 
 */
function business_ezone_scroll_up(){ ?>
    <a href="#page" class="scrollup"><i class="fa fa-angle-up"></i></a>
<?php
}
endif;


if( ! function_exists( 'business_ezone_footer_end' ) ) :
/**
 * Footer End
 * 
 * @since 1.0.1 
*/
function business_ezone_footer_end(){
    echo '</footer>'; // #colophon 
}
endif;

if( ! function_exists( 'business_ezone_page_end' ) ) :
/**
 * Page End
 * 
 * @since 1.0.1
*/
function business_ezone_page_end(){
    ?>
    </div><!-- #page -->
    <?php
}
endif;