<?php

/**
 * Add options to the theme sidebars
 */

function scc_sites_add_sidebar_options( $wp_customize ) {
	$wp_customize->add_section( 'scc_sites_sidebars', array(
		'title' => __( 'Sidebars', 'scc_sites' ),
	) );

	// Sticky sidebars options - similar to sticky header and footer - combine and refactor?
	$wp_customize->add_setting( 'scc_sites_sticky_sidebar_left', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'scc_sites_sticky_sidebar_left', array(
		'label' => __( 'Sticky Left Sidebar', 'scc_sites' ),
		'description' => __( 'Make the left sidebar stay still while you scroll', 'scc_sites' ),
		'type' => 'checkbox',
		'section' => 'scc_sites_sidebars',
	) );

	$wp_customize->add_setting( 'scc_sites_sticky_sidebar_right', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'scc_sites_sticky_sidebar_right', array(
		'label' => __( 'Sticky Right Sidebar', 'scc_sites' ),
		'description' => __( 'Make the right sidebar stay still while you scroll', 'scc_sites' ),
		'type' => 'checkbox',
		'section' => 'scc_sites_sidebars',
	) );
}
add_action( 'customize_register', 'scc_sites_add_sidebar_options' );