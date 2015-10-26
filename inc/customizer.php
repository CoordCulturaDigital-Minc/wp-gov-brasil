<?php
/**
 * wp-gov-brasil Theme Customizer
 *
 * @package wp-gov-brasil
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_gov_brasil_customize_register( $wp_customize ) {
    
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting( 'accent_color', array(
	    'default' => 'fff',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );

    //  =============================
    //  = Denominacao       =
    //  =============================
    $wp_customize->add_setting('wp_gov_brasil_denominacao', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('wp_gov_brasil_denominacao', array(
        'label'      => __('Denominação', 'wp-gov-brasil'),
        'section'    => 'title_tagline',
        'settings'   => 'wp_gov_brasil_denominacao',
    ));

    //  =============================
    //  = Subordinacao         =
    //  =============================
    $wp_customize->add_setting('wp_gov_brasil_subordinacao', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));
 
    $wp_customize->add_control('wp_gov_brasil_subordinacao', array(
        'label'      => __('Subordinação', 'wp-gov-brasil'),
        'section'    => 'title_tagline',
        'settings'   => 'wp_gov_brasil_subordinacao',
    ));

    //  =============================
    //  = Logo          =
    //  =============================
    $wp_customize->add_section('wp_gov_brasil_logo_section', array(
        'title'    => __('Logo', 'wp_gov_brasil'),
        'description' => '',
        'priority' => 40,
    ));

    $wp_customize->add_setting('wp_gov_brasil_logo', array(
        'capability'   => 'edit_theme_options',
        'type'         => 'theme_mod',
        'default'	   => '',
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_gov_brasil_logo', array(
        'label'    => __('Imagem da logo', 'wp_gov_brasil'),
        'section'  => 'wp_gov_brasil_logo_section',
        'settings' => 'wp_gov_brasil_logo',
    )));

    //  =============================
    //  = Color Scheme             =
    //  =============================
     $wp_customize->add_setting('wp_gov_brasil_color_scheme', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
    ));

    $wp_customize->add_control( 'wp_gov_brasil_color_scheme', array(
        'settings' => 'wp_gov_brasil_color_scheme',
        'label'   => __('Esquema de cor', 'wp_gov_brasil'),
        'section' => 'colors',
        'type'    => 'select',
        'choices'    => array(
            'verde' => __('Verde', 'wp_gov_brasil'),
            'azul' => __('Azul', 'wp_gov_brasil'),
            'branco' => __('Branco', 'wp_gov_brasil'),
            'amarelo' => __('Amarelo', 'wp_gov_brasil'),
        ),
    ));

    //  =============================
    //  = Rodapé            =
    //  =============================
    $wp_customize->add_section('wp_gov_brasil_footer_section', array(
        'title'    => __('Rodapé', 'wp_gov_brasil'),
        'priority' => 120,
    ));

    $wp_customize->add_setting('wp_gov_brasil_footer_text', array(
        'capability'   => 'edit_theme_options',
        'type'         => 'theme_mod',
        'default'      => '',
    ));
 
    $wp_customize->add_control( 'wp_gov_brasil_footer_text', array(
        'label'    => __('Texto do Rodapé', 'wp_gov_brasil'),
        'settings' => 'wp_gov_brasil_footer_text',
        'section' => 'wp_gov_brasil_footer_section',
        'type'    => 'textarea',
    ));
    
    //  =============================
    //  = Custom CSS          =
    //  =============================
    $wp_customize->add_section('wp_gov_brasil_custom_css_section', array(
        'title'    => __('Customizar CSS', 'wp_gov_brasil'),
        'description' => __('Customize o css', 'wp_gov_brasil'),
        'priority' => 160,
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_setting('wp_gov_brasil_custom_css', array(
        'capability'   => 'edit_theme_options',
        'type'         => 'theme_mod',
        'default'      => '',
    ));
 
    $wp_customize->add_control( 'wp_gov_brasil_custom_css', array(
        'settings' => 'wp_gov_brasil_custom_css',
        'section' => 'wp_gov_brasil_custom_css_section',
        'type'    => 'textarea',
    ));


}
add_action( 'customize_register', 'wp_gov_brasil_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_gov_brasil_customize_preview_js() {
    
    wp_enqueue_script( 'wp_gov_brasil_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wp_gov_brasil_customize_preview_js' );


function wp_gov_brasil_custom_css_output() {
    echo '<style type="text/css" id="custom-theme-css">' .
    get_theme_mod( 'wp_gov_brasil_custom_css', '' ) . '</style>';
}
add_action( 'wp_head', 'wp_gov_brasil_custom_css_output', 20);