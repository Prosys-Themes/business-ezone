<?php
/**
 * Typography Options
 *
 * @package Business_Ezone
 */
 
function business_ezone_customize_register_typography_scheme( $wp_customize ) {
    
    /** Typography Settings */
    $wp_customize->add_section(
        'business_ezone_typography_settings',
        array(
            'title'       => __( 'Typography Settings', 'business-ezone' ),
            'description' => __( 'Choose typography scheme for theme.', 'business-ezone' ),
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
        )
    );
      
    /** Section Title */
    $wp_customize->add_setting(
        'business_ezone_typography',
        array(
            'default'=> 'Oswald',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    $wp_customize-> add_control(
        'business_ezone_typography',
        array(
              'label' => __('Select Font','business-ezone'),
              'type' => 'select',
              'section' => 'business_ezone_typography_settings', 
              'choices' => array(
                'Oswald' => __('Oswald', 'business-ezone'),
                'Open+Sans'=> __( 'Open Sans', 'business-ezone'),
                'Dancing+Script' => __( 'Dancing Script', 'business-ezone')
              ),
         
    ));
    
}
add_action( 'customize_register', 'business_ezone_customize_register_typography_scheme' );