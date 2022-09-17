<?php
/**
 * Social Options
 *
 * @package Business_Ezone
 */
 
 function business_ezone_customize_register_social( $wp_customize ) {
    
    /** Social Settings */
    $wp_customize->add_section(
        'business_ezone_social_settings',
        array(
            'title' => __( 'Social Settings', 'business-ezone' ),
            'description' => __( 'Leave blank if you do not want to show the social link.', 'business-ezone' ),
            'priority' => 90,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable Social in Header */
    $wp_customize->add_setting(
        'business_ezone_ed_social',
        array(
            'default' => '',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_social',
        array(
            'label' => __( 'Enable Social Links', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Facebook */
    $wp_customize->add_setting(
        'business_ezone_facebook',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_facebook',
        array(
            'label' => __( 'Facebook', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'text',
        )
    );
    
    
    /** Twitter */
    $wp_customize->add_setting(
        'business_ezone_twitter',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_twitter',
        array(
            'label' => __( 'Twitter', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'text',
        )
    );
      
    /** LinkedIn */
    $wp_customize->add_setting(
        'business_ezone_linkedin',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_linkedin',
        array(
            'label' => __( 'LinkedIn', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'text',
        )
    );

    /** Pinterest */
    $wp_customize->add_setting(
        'business_ezone_pinterest',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_pinterest',
        array(
            'label' => __( 'Pinterest', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'text',
        )
    );
    
    /** Instagram */
    $wp_customize->add_setting(
        'business_ezone_instagram',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_instagram',
        array(
            'label' => __( 'Instagram', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'text',
        )
    );

    /** Google Plus */
    $wp_customize->add_setting(
        'business_ezone_google',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_google',
        array(
            'label' => __( 'Google Plus', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'text',
        )
    );

    /** YouTube */
    $wp_customize->add_setting(
        'business_ezone_youtube',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_youtube',
        array(
            'label' => __( 'Youtube', 'business-ezone' ),
            'section' => 'business_ezone_social_settings',
            'type' => 'text',
        )
    );
    
    /** Social Settings Ends */
    
 }
 add_action( 'customize_register', 'business_ezone_customize_register_social' );
