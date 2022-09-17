<?php
/**
 * Breadcrumbs Options
 *
 * @package Business_Ezone
 */
 
function business_ezone_customize_register_breadcrumbs( $wp_customize ) {

    /** BreadCrumb Settings */
    
    $wp_customize->add_section(
        'business_ezone_breadcrumb_settings',
        array(
            'title' => __( 'Breadcrumb Settings', 'business-ezone' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'business_ezone_ed_breadcrumb',
        array(
            'default' => '',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_breadcrumb',
        array(
            'label' => __( 'Enable Breadcrumb', 'business-ezone' ),
            'section' => 'business_ezone_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Show/Hide Current */
    $wp_customize->add_setting(
        'business_ezone_ed_current',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_ezone_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_ed_current',
        array(
            'label' => __( 'Show current', 'business-ezone' ),
            'section' => 'business_ezone_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Home Text */
    $wp_customize->add_setting(
        'business_ezone_breadcrumb_home_text',
        array(
            'default' => __( 'Home', 'business-ezone' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_breadcrumb_home_text',
        array(
            'label' => __( 'Breadcrumb Home Text', 'business-ezone' ),
            'section' => 'business_ezone_breadcrumb_settings',
            'type' => 'text',
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'business_ezone_breadcrumb_separator',
        array(
            'default' => __( '>', 'business-ezone' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_ezone_breadcrumb_separator',
        array(
            'label' => __( 'Breadcrumb Separator', 'business-ezone' ),
            'section' => 'business_ezone_breadcrumb_settings',
            'type' => 'text',
        )
    );
    /** BreadCrumb Settings Ends */
    
    }
add_action( 'customize_register', 'business_ezone_customize_register_breadcrumbs' );
