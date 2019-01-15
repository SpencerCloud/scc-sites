<?php

/**
 * Add header options in customizer
 */

function scc_sites_add_header_options( $wp_customize ) {
	$wp_customize->add_section( 'scc_sites_header', array(
		'title' => __( 'Header', 'scc_sites' ),
	) );

	// Sticky header option - similar to sticky footer - combine and refactor?
	$wp_customize->add_setting( 'scc_sites_sticky_header', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'scc_sites_sticky_header', array(
		'label' => __( 'Sticky Header', 'scc_sites' ),
		'description' => __( 'Make the header stay on top while you scroll', 'scc_sites' ),
		'type' => 'checkbox',
		'section' => 'scc_sites_header',
	) );

	// Header menu position option
	$wp_customize->add_setting( 'scc_sites_header_menu_position', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'default' => 'right',
	) );

	$wp_customize->add_control( 'scc_sites_header_menu_position', array(
		'label' => __( 'Header Menu Position', 'scc_sites' ),
		'type' => 'radio',
		'choices' => array(
			'left' => __( 'Left', 'scc_sites' ),
			'right' => __( 'Right', 'scc_sites' ),
		),
		'section' => 'scc_sites_header',
	) );
}
add_action( 'customize_register', 'scc_sites_add_header_options' );