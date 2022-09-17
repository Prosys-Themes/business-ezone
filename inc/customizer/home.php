<?php
/**
 * Home Page Options
 *
 * @package Business_Ezone
 */
 
function business_ezone_customize_register_home( $wp_customize ) {
    
    global $business_ezone_options_pages;
    global $business_ezone_options_posts;
    global $business_ezone_option_categories;
    global $business_ezone_default_post;
    global $business_ezone_default_page;
    

    /** Home Page Settings */
    $wp_customize->add_panel( 
        'business_ezone_home_page_settings',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'business-ezone' ),
            'description' => __( 'Customize Home Page Settings', 'business-ezone' ),
        ) 
    );
    
     /** Slider Settings */
    $wp_customize->add_section(
        'business_ezone_slider_section_settings',
        array(
            'title'     => __( 'Slider Settings', 'business-ezone' ),
            'priority'  => 10,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );
   
    /** Enable/Disable Slider */
    $wp_customize->add_setting(
        'business_ezone_ed_slider',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_slider',
        array(
            'label' => __( 'Enable Home Page Slider', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'business_ezone_slider_auto',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_auto',
        array(
            'label' => __( 'Enable Slider Auto Transition', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Loop */
    $wp_customize->add_setting(
        'business_ezone_slider_loop',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_loop',
        array(
            'label' => __( 'Enable Slider Loop', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Pager */
    $wp_customize->add_setting(
        'business_ezone_slider_pager',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_pager',
        array(
            'label' => __( 'Enable Slider Pager', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'business_ezone_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_caption',
        array(
            'label' => __( 'Enable Slider Caption', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'checkbox',
        )
    );
        
    /** Slider Animation */
    $wp_customize->add_setting(
        'business_ezone_slider_animation',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'business_ezone_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_animation',
        array(
            'label' => __( 'Select Slider Animation', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'select',
            'choices' => array(
                'fade' => __( 'Fade', 'business-ezone' ),
                'slide' => __( 'Slide', 'business-ezone' ),
            )
        )
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'business_ezone_slider_speeds',
        array(
            'default' => 400,
            'sanitize_callback' => 'business_ezone_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_speeds',
        array(
            'label' => __( 'Slider Speed', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Pause */
    $wp_customize->add_setting(
        'business_ezone_slider_pause',
        array(
            'default' => 6000,
            'sanitize_callback' => 'business_ezone_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_pause',
        array(
            'label' => __( 'Slider Pause', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'text',
        )
    );
    
    for( $i=1; $i<=3; $i++){  
        /** Select Slider Post */
        $wp_customize->add_setting(
            'business_ezone_slider_post_'.$i,
            array(
                'default' => $business_ezone_default_post,
                'sanitize_callback' => 'business_ezone_sanitize_select',
            )
        );
        
        $wp_customize->add_control(
            'business_ezone_slider_post_'.$i,
            array(
                'label' => __( 'Select Post ', 'business-ezone' ).$i,
                'section' => 'business_ezone_slider_section_settings',
                'type' => 'select',
                'choices' => $business_ezone_options_posts,
            )
        );
    }

    /** Slider Readmore */
    $wp_customize->add_setting(
        'business_ezone_slider_readmore',
        array(
            'default' => __( 'Learn More', 'business-ezone' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_readmore',
        array(
            'label' => __( 'Readmore Text', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'text',
        )
    );

    /** Slider Contact Text */
    $wp_customize->add_setting(
        'business_ezone_slider_contact_text',
        array(
            'default' => __( 'Contact Us', 'business-ezone' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_contact_text',
        array(
            'label' => __( 'Contact Us Text', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'text',
        )
    );

     /** Slider Contact Url*/
    $wp_customize->add_setting(
        'business_ezone_slider_contact_url',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_slider_contact_url',
        array(
            'label' => __( 'Contact Us Url', 'business-ezone' ),
            'section' => 'business_ezone_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Settings Ends */

    /** Featured Section */
    $wp_customize->add_section(
        'business_ezone_feature_section_settings',
        array(
            'title' => __( 'Featured Section', 'business-ezone' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );
    
    /** Enable/Disable Featured Section */
    $wp_customize->add_setting(
        'business_ezone_ed_featured_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_featured_section',
        array(
            'label' => __( 'Enable Featured Post Section', 'business-ezone' ),
            'section' => 'business_ezone_feature_section_settings',
            'type' => 'checkbox',
        )
    );
       
    /** Enable/Disable Featured Section Icon*/
    $wp_customize->add_setting(
        'business_ezone_ed_featured_icon',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_featured_icon',
        array(
            'label' => __( 'Enable Featured Post Icon', 'business-ezone' ),
            'section' => 'business_ezone_feature_section_settings',
            'type' => 'checkbox',
        )
    );

    for( $i=1; $i<=3; $i++){  
    
        /** featured Post */
        $wp_customize->add_setting(
            'business_ezone_feature_post_'.$i,
            array(
                'default' => $business_ezone_default_post,
                'sanitize_callback' => 'business_ezone_sanitize_select',
            ));
        
        $wp_customize->add_control(
            'business_ezone_feature_post_'.$i,
            array(
                'label' => __( 'Select Featured Post ', 'business-ezone' ) .$i ,
                'section' => 'business_ezone_feature_section_settings',
                'type' => 'select',
                'choices' => $business_ezone_options_posts
            ));
        

        $wp_customize->add_setting(
            'business_ezone_feature_icon_'.$i,
            array(
                'default'           => 'fa fa-bell',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            new business_ezone_Fontawesome_Icon_Chooser(
            $wp_customize,
            'business_ezone_feature_icon_'.$i,
                array(
                    'settings'      => 'business_ezone_feature_icon_'.$i,
                    'section'       => 'business_ezone_feature_section_settings',
                    'label'         => __( 'FontAwesome Icon ', 'business-ezone' ) .$i,
                )
            )
        );
    }

    /** Welcome Section Settings */
    $wp_customize->add_section(
        'business_ezone_welcome_section_settings',
        array(
            'title' => __( 'Welcome Section', 'business-ezone' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );
    
    /** Enable Welcome Section */   
    $wp_customize->add_setting(
        'business_ezone_ed_welcome_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_welcome_section',
        array(
            'label' => __( 'Enable Welcome Section', 'business-ezone' ),
            'section' => 'business_ezone_welcome_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** welcome Section Ends */

    /** Blog Section Settings */
    $wp_customize->add_section(
        'business_ezone_blog_section_settings',
        array(
            'title' => __( 'Blog Section', 'business-ezone' ),
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );
    
   /** Enable Blog Section */
    $wp_customize->add_setting(
        'business_ezone_ed_blog_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_blog_section',
        array(
            'label' => __( 'Enable Blog Section', 'business-ezone' ),
            'section' => 'business_ezone_blog_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Show/Hide Blog Date */
    $wp_customize->add_setting(
        'business_ezone_ed_blog_date',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_blog_date',
        array(
            'label' => __( 'Show Posts Date, Author, Comment, Category', 'business-ezone' ),
            'section' => 'business_ezone_blog_section_settings',
            'type' => 'checkbox',
        )
    );
     
    /** Blog Section Title */
    $wp_customize->add_setting(
        'business_ezone_blog_section_title',
        array(
            'default'=> $business_ezone_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
        ));
    
    $wp_customize-> add_control(
        'business_ezone_blog_section_title',
        array(
              'label' => __('Select Page','business-ezone'),
              'type' => 'select',
              'choices' => $business_ezone_options_pages,
              'section' => 'business_ezone_blog_section_settings', 
          
        ));

    /** Select Blog Category */
    $wp_customize->add_setting(
        'business_ezone_blog_section_category',
        array(
            'default' => '',
            'sanitize_callback' => 'business_ezone_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'business_ezone_blog_section_category',
        array(
            'label' => __( 'Select Blogs Category', 'business-ezone' ),
            'section' => 'business_ezone_blog_section_settings',
            'type' => 'select',
            'choices' => $business_ezone_option_categories
        ));

    /** Blog Section Read More Text */
    $wp_customize->add_setting(
        'business_ezone_blog_section_readmore',
        array(
            'default' => __( 'Read More', 'business-ezone' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_blog_section_readmore',
        array(
            'label' => __( 'Blog Section Read More Text', 'business-ezone' ),
            'section' => 'business_ezone_blog_section_settings',
            'type' => 'text',
        )
    );

    /** Blog Section Read More Url */
    $wp_customize->add_setting(
        'business_ezone_blog_section_url',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_blog_section_url',
        array(
            'label' => __( 'Blog Page url', 'business-ezone' ),
            'section' => 'business_ezone_blog_section_settings',
            'type' => 'text',
        )
    );
    /** Blog Section Ends */
    
    /** Services Section Settings */
    $wp_customize->add_section(
        'business_ezone_service_section_settings',
        array(
            'title' => __( 'Services Section', 'business-ezone' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );
    
   /** Enable Services Section */
    $wp_customize->add_setting(
        'business_ezone_ed_service_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_service_section',
        array(
            'label' => __( 'Enable Services Section', 'business-ezone' ),
            'section' => 'business_ezone_service_section_settings',
            'type' => 'checkbox',
        )
    );

    /** Show/Hide Services Font Awesome */
    $wp_customize->add_setting(
        'business_ezone_ed_service_fontawesome',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_service_fontawesome',
        array(
            'label' => __( 'Show Font Icon', 'business-ezone' ),
            'section' => 'business_ezone_service_section_settings',
            'description' => __( 'Display font icon and hide thumbnail.', 'business-ezone' ),
            'type' => 'checkbox',
        )
    );

    /** Section Title */
    $wp_customize->add_setting(
        'business_ezone_service_section_page',
        array(
            'default'=> $business_ezone_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'business_ezone_service_section_page',
        array(
              'label' => __('Select Page','business-ezone'),
              'type' => 'select',
              'choices' => $business_ezone_options_pages,
              'section' => 'business_ezone_service_section_settings', 
            
            ));
    
    for( $i=1; $i<=6; $i++){  
    
        /** Services Post */
        $wp_customize->add_setting(
            'business_ezone_service_post_'.$i,
            array(
                'default' => $business_ezone_default_post,
                'sanitize_callback' => 'business_ezone_sanitize_select',
            ));
        
        $wp_customize->add_control(
            'business_ezone_service_post_'.$i,
            array(
                'label' => __( 'Select Service Post ', 'business-ezone' ) .$i ,
                'section' => 'business_ezone_service_section_settings',
                'type' => 'select',
                'choices' => $business_ezone_options_posts
            ));
        

        $wp_customize->add_setting(
            'business_ezone_service_icon_'.$i,
            array(
                'default'           => 'fa fa-bell',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            new business_ezone_Fontawesome_Icon_Chooser(
            $wp_customize,
            'business_ezone_service_icon_'.$i,
                array(
                    'settings'      => 'business_ezone_service_icon_'.$i,
                    'section'       => 'business_ezone_service_section_settings',
                    'label'         => __( 'FontAwesome Icon ', 'business-ezone' ) .$i,
                )
            )
        );
    }
    
    /** Service Section Read More Text */
    $wp_customize->add_setting(
        'business_ezone_service_section_readmore',
        array(
            'default' => __( 'Read More', 'business-ezone' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_service_section_readmore',
        array(
            'label' => __( 'Service Section Read More Text', 'business-ezone' ),
            'section' => 'business_ezone_service_section_settings',
            'type' => 'text',
        )
    );

    /** Service Section Read More Url */
    $wp_customize->add_setting(
        'business_ezone_service_section_url',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_service_section_url',
        array(
            'label' => __( 'Service Page url', 'business-ezone' ),
            'section' => 'business_ezone_service_section_settings',
            'type' => 'text',
        )
    );

    /** cta Section Settings */
    $wp_customize->add_section(
        'business_ezone_cta_section_settings',
        array(
            'title' => __( 'CTA Section', 'business-ezone' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );
    
    /** Enable cta Section */   
    $wp_customize->add_setting(
        'business_ezone_ed_cta_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_cta_section',
        array(
            'label' => __( 'Enable cta Us Section', 'business-ezone' ),
            'section' => 'business_ezone_cta_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** CTA Section Title */
    $wp_customize->add_setting(
        'business_ezone_cta_section_page',
        array(
            'default'=> $business_ezone_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'business_ezone_cta_section_page',
        array(
              'label' => __('Select Page','business-ezone'),
              'type' => 'select',
              'choices' => $business_ezone_options_pages,
              'section' => 'business_ezone_cta_section_settings', 
              
        )
    );
    

    /** CTA First Button */
    $wp_customize->add_setting(
        'business_ezone_cta_section_button_one',
        array(
            'default'=> __( 'About Us', 'business-ezone' ),
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'business_ezone_cta_section_button_one',
        array(
              'label' => __('CTA First Button','business-ezone'),
              'section' => 'business_ezone_cta_section_settings', 
              'type' => 'text',
            ));

    /** CTA First Button Link */
    $wp_customize->add_setting(
        'business_ezone_cta_button_one_url',
        array(
            'default'=> '#',
            'sanitize_callback'=> 'esc_url_raw'
            )
        );
    
    $wp_customize-> add_control(
        'business_ezone_cta_button_one_url',
        array(
              'label' => __('CTA First Button Link','business-ezone'),
              'section' => 'business_ezone_cta_section_settings', 
              'type' => 'text',
            ));
     
    /** CTA Second Button */ 
    $wp_customize->add_setting(
        'business_ezone_cta_section_button_two',
        array(
            'default'=> __( 'Contact Us', 'business-ezone' ),
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'business_ezone_cta_section_button_two',
        array(
              'label' => __( 'CTA Second Button','business-ezone' ),
              'section' => 'business_ezone_cta_section_settings', 
              'type' => 'text',
            ));

    /** CTA Second Button Link */
    $wp_customize->add_setting(
        'business_ezone_cta_button_two_url',
        array(
            'default'=> '#',
            'sanitize_callback'=> 'esc_url_raw'
            ));
    $wp_customize-> add_control(
        'business_ezone_cta_button_two_url',
        array(
              'label' => __('CTA Second Button Link','business-ezone'),
              'section' => 'business_ezone_cta_section_settings', 
              'type' => 'text',
            ));

    /** Portfolio Section Settings */
    $wp_customize->add_section(
        'business_ezone_portfolio_section_settings',
        array(
            'title' => __( 'Portfolio Section', 'business-ezone' ),
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );
    
    /** Enable Portfolio Section */
    $wp_customize->add_setting(
        'business_ezone_ed_portfolio_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_portfolio_section',
        array(
            'label' => __( 'Enable Portfolio Section', 'business-ezone' ),
            'section' => 'business_ezone_portfolio_section_settings',
            'type' => 'checkbox',
        )
    );

    /** Section Title */
    $wp_customize->add_setting(
        'business_ezone_portfolio_section_page',
        array(
            'default'=> $business_ezone_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'business_ezone_portfolio_section_page',
        array(
              'label' => __('Select Page','business-ezone'),
              'type' => 'select',
              'choices' => $business_ezone_options_pages,
              'section' => 'business_ezone_portfolio_section_settings', 
              
        ));


    for( $i=1; $i<=6; $i++){  
        /** Portfolio Post */
        $wp_customize->add_setting(
            'business_ezone_portfolio_post_'.$i,
            array(
                'default' => $business_ezone_default_post,
                'sanitize_callback' => 'business_ezone_sanitize_select',
            ));
        
        $wp_customize->add_control(
            'business_ezone_portfolio_post_'.$i,
            array(
                'label' => __( 'Select Post ', 'business-ezone' ). $i,
                'section' => 'business_ezone_portfolio_section_settings',
                'type' => 'select',
                'choices' => $business_ezone_options_posts
            ));
    }
    
    /** Portfolio Section Read More Text */
    $wp_customize->add_setting(
        'business_ezone_portfolio_section_readmore',
        array(
            'default' => __( 'Read More', 'business-ezone' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_portfolio_section_readmore',
        array(
            'label' => __( 'Portfolio Section Read More Text', 'business-ezone' ),
            'section' => 'business_ezone_portfolio_section_settings',
            'type' => 'text',
        )
    );

    /** Portfolio Section Read More Url */
    $wp_customize->add_setting(
        'business_ezone_portfolio_section_url',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_portfolio_section_url',
        array(
            'label' => __( 'Portfolio Page url', 'business-ezone' ),
            'section' => 'business_ezone_portfolio_section_settings',
            'type' => 'text',
        )
    );
    
    /** Teams Section Settings */
    $wp_customize->add_section(
        'business_ezone_teams_section_settings',
        array(
            'title' => __( 'Teams Section', 'business-ezone' ),
            'priority' => 70,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );

    /** Enable Teams Section */   
    $wp_customize->add_setting(
        'business_ezone_ed_teams_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_teams_section',
        array(
            'label' => __( 'Enable Teams Section', 'business-ezone' ),
            'section' => 'business_ezone_teams_section_settings',
            'type' => 'checkbox',
        ));
    
    /** Section Title */
    $wp_customize->add_setting(
        'business_ezone_teams_section_title',
        array(
            'default'=> $business_ezone_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    $wp_customize-> add_control(
        'business_ezone_teams_section_title',
        array(
              'label' => __('Select Page','business-ezone'),
              'type' => 'select',
              'choices' => $business_ezone_options_pages,
              'section' => 'business_ezone_teams_section_settings', 
         
        ));

    /** Select Teams Category */
    $wp_customize->add_setting(
        'business_ezone_team_category',
        array(
            'default' => '',
            'sanitize_callback' => 'business_ezone_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'business_ezone_team_category',
        array(
            'label' => __( 'Select Teams Category', 'business-ezone' ),
            'section' => 'business_ezone_teams_section_settings',
            'type' => 'select',
            'choices' => $business_ezone_option_categories
        ));


    
    /** Testimonials Section Settings */
    $wp_customize->add_section(
        'business_ezone_testimonials_section_settings',
        array(
            'title' => __( 'Testimonials Section', 'business-ezone' ),
            'priority' => 80,
            'capability' => 'edit_theme_options',
            'panel' => 'business_ezone_home_page_settings'
        )
    );

    /** Enable Testimonials Section */   
    $wp_customize->add_setting(
        'business_ezone_ed_testimonials_section',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_testimonials_section',
        array(
            'label' => __( 'Enable Testimonials Section', 'business-ezone' ),
            'section' => 'business_ezone_testimonials_section_settings',
            'type' => 'checkbox',
        ));
    
    /** Section Title */
    $wp_customize->add_setting(
        'business_ezone_testimonials_section_title',
        array(
            'default'=> $business_ezone_default_page,
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    $wp_customize-> add_control(
        'business_ezone_testimonials_section_title',
        array(
              'label' => __('Select Page','business-ezone'),
              'type' => 'select',
              'choices' => $business_ezone_options_pages,
              'section' => 'business_ezone_testimonials_section_settings', 
         
            ));

    /** Select Testimonials Category */
    $wp_customize->add_setting(
        'business_ezone_testimonial_category',
        array(
            'default' => '',
            'sanitize_callback' => 'business_ezone_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'business_ezone_testimonial_category',
        array(
            'label' => __( 'Select Testimonial Category', 'business-ezone' ),
            'section' => 'business_ezone_testimonials_section_settings',
            'type' => 'select',
            'choices' => $business_ezone_option_categories
        ));
}
add_action( 'customize_register', 'business_ezone_customize_register_home' );
