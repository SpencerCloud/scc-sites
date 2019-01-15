<?php

// DEFINE( 'SCSSPHP_MAN_DIR', get_stylesheet_directory() . '/inc/scssphp/' );
// DEFINE( 'SCSSPHP_MAN_FILE', SCSSPHP_MAN_DIR . 'scssphp-manager.php' );

// Add standard Bootstrap variable colors to "Colors" section in customizer

function scc_sites_add_customizer_colors( $wp_customize ) {

    /*
     * Bootstrap variable colors
     */
    $color_vars = array(
        array(
            'setting_id'    => 'primary',
            'default_color' => '#007bff',
        ),
        array(
            'setting_id'    => 'secondary',
            'default_color' => '#6c757d',
        ),
        array(
            'setting_id'    => 'success',
            'default_color' => '#28a745',
        ),
        array(
            'setting_id'    => 'info',
            'default_color' => '#17a2b8',
        ),
        array(
            'setting_id'    => 'warning',
            'default_color' => '#ffc107',
        ),
        array(
            'setting_id'    => 'danger',
            'default_color' => '#dc3545',
        ),
        array(
            'setting_id'    => 'light',
            'default_color' => '#f8f9fa',
        ),
        array(
            'setting_id'    => 'dark',
            'default_color' => '#343a40',
        ),
    );

    foreach ( $color_vars as $color ) {

        $setting_id = 'scc_sites_' . $color['setting_id'] . '_color';
        $label = ucfirst( $color['setting_id'] ) . ' Color';

        $wp_customize->add_setting( $setting_id, array(
            'default' => $color['default_color'],
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_id, array(
            'label' => __( $label, 'scc-sites' ),
            'section' => 'colors',
        ) ) );

    }

    /*
     * Header & footer text colors - light or dark variable
     */
    $wp_customize->add_setting( 'scc_sites_nav_text_color', array(
        'default' => 'dark',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
    ) );

    $wp_customize->add_control( 'scc_sites_nav_text_color', array(
        'label' => __( 'Header / Footer text color' ),
        'type' => 'radio',
        'choices' => array(
            'dark' => __( 'Dark', 'scc_sites' ),
            'light' => __( 'Light', 'scc_sites' ),
        ),
        'section' => 'colors',
    ) );

}
add_action( 'customize_register', 'scc_sites_add_customizer_colors' );
