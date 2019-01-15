<?php

/**
 * Modify footer content using Understrap-provided hook
 */

function scc_sites_add_footer_options( $wp_customize ) {

	$wp_customize->add_section( 'scc_sites_footer', array(
		'title' => __( 'Footer', 'scc_sites' ),
	) );

	// Add footer text option
	$wp_customize->add_setting( 'scc_sites_footer_text', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'scc_sites_footer_text', array(
		'type' => 'text',
		'section' => 'scc_sites_footer',
		'label' => __( 'Footer Text', 'scc_sites' ),
		'description' => __( 'Text for the footer, usually reserved for copyright. Copy/paste this if you need it - &copy;', 'scc_sites' ),
	) );

	// Add sticky footer option - similar to sticky header option - combine & refactor?
	$wp_customize->add_setting( 'scc_sites_sticky_footer', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'scc_sites_sticky_footer', array(
		'label' => __( 'Sticky Footer', 'scc_sites' ),
		'description' => __( 'Make the footer stay visible no matter where the scroll is', 'scc_sites' ),
		'type' => 'checkbox',
		'section' => 'scc_sites_footer',
	) );

	// Add footer text position option
	$wp_customize->add_setting( 'scc_sites_footer_text_position', array(
		'default' => 'left',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'scc_sites_footer_text_position', array(
		'label' => __( 'Footer Text Position', 'scc_sites' ),
		'type' => 'radio',
		'choices' => array(
			'left' => __( 'Left', 'scc_sites' ),
			'center' => __( 'Center', 'scc_sites' ),
			'right' => __( 'Right', 'scc_sites' ),
		),
		'section' => 'scc_sites_footer',
	) );

}
add_action( 'customize_register', 'scc_sites_add_footer_options' );

// Replace the standard Understrap footer text "Powered by WordPress, theme by Understrap..." bla bla bla
function scc_sites_info( $site_info ) {
	return get_theme_mod( 'scc_sites_footer_text' );
}
add_filter( 'understrap_site_info_content', 'scc_sites_info' );
