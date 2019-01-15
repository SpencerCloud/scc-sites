<?php

/**
 * Include SCSSPHP files
 */

require_once __DIR__ . '/scssphp/scss.inc.php';
use Leafo\ScssPhp\Compiler;

/**
 * Add Bootstrap variable color theme options to compiler
 */

$theme_mods = get_theme_mods();

$bs_color_defaults = array(
	'primary'	=> '007bff',
	'secondary'	=> '6c757d',
	'success'	=> '28a745',
	'info'		=> '17a2b8',
	'warning'	=> 'ffc107',
	'danger'	=> 'dc3545',
	'light'		=> 'f8f9fa',
	'dark'		=> '343a40',
);

$customizer_color_vars = '';

// Add custom colors to $customizer_color_vars string
// If custom color not found, use default color from array above
// TODO: Combine array above with $color_vars array in extend-colors.php for 1 source of truth

foreach ( $bs_color_defaults as $color => $default ) {
	if ( ! array_key_exists( 'scc_sites_' . $color . '_color', $theme_mods ) ) {
		$theme_mods['scc_sites_' . $color . '_color'] = '#' . $default;
	}
	$customizer_color_vars .= '$' . $color . ': ' . $theme_mods['scc_sites_' . $color . '_color'] . ';';
}

/**
 * Add header/footer text color theme options to compiler
 * Uses option in customizer to use light or dark BS variable
 */

$nav_menu_theme = '';

if ( array_key_exists( 'scc_sites_nav_text_color', $theme_mods ) ) {

	// Get hex color
	if ( 'dark' === $theme_mods['scc_sites_nav_text_color'] ) {
		$nav_menu_hex_color = $theme_mods['scc_sites_dark_color'];
	} elseif ( 'light' === $theme_mods['scc_sites_nav_text_color'] ) {
		$nav_menu_hex_color = $theme_mods['scc_sites_light_color'];
	}

	// Convert hex color to RGB values for menu item translucence
	list( $nav_r, $nav_g, $nav_b ) = sscanf( $nav_menu_hex_color, "#%02x%02x%02x" );
	$nav_rgba_string = 'rgba( ' . $nav_r . ', ' . $nav_g . ', ' . $nav_b . ', 0.5 )';

	// Add hex and RGBA colors to text in header and footer
	$nav_menu_theme = '

		.navbar-brand, .active .nav-link, .site-info {
			color: ' . $nav_menu_hex_color . ' !important;
		}

		.nav-link {
			color: ' . $nav_rgba_string . ' !important;
		}
		
	';

}

/**
 * Add header and footer theme options to compiler
 */

// Sticky header

$sticky_header = '';

if ( array_key_exists( 'scc_sites_sticky_header', $theme_mods ) ) {

	if ( true === $theme_mods['scc_sites_sticky_header'] ) {

		$sticky_header = '

			#wrapper-navbar {
				@extend .fixed-top;
			}

			@include main_wrapper {
				margin-top: $header_height;
			}

			.admin-bar #wrapper-navbar {
				margin-top: $wpadminbar_height_mobile;
				
				@include wpadmin_bp {
					margin-top: $wpadminbar_height_desktop;
				}
			}

		';

	}

}

// Sticky footer

$sticky_footer = '';

if ( array_key_exists( 'scc_sites_sticky_footer', $theme_mods ) ) {

	if ( true === $theme_mods['scc_sites_sticky_footer'] ) {

		$sticky_footer = '

			#wrapper-footer {
				@extend .fixed-bottom;
			}

			@include main_wrapper {
				margin-bottom: $footer_height;
			}

		';

	}

}

// Header menu position

$header_menu_position = '';

if ( array_key_exists( 'scc_sites_header_menu_position', $theme_mods) ) {

	if ( 'left' === $theme_mods['scc_sites_header_menu_position'] ) {

		$header_menu_position = '

			#main-menu {
				@extend .ml-0;
			}

		';

	}

}

// Footer menu text position

if ( array_key_exists( 'scc_sites_footer_text_position', $theme_mods ) ) {

	$footer_text_alignment = $theme_mods['scc_sites_footer_text_position'];

} else {

	$footer_text_alignment = 'left';

}

$footer_text_position = '

	.site-info {
		text-align: ' . $footer_text_alignment . ';
	}

';

/**
 * Add sticky sidebar options to compiler
 */

// $stick_sidebar

/**
 * Compile SCSS files with theme options from database
 */

$scss = new Compiler();

$scss->setImportPaths( get_stylesheet_directory() . '/' );
// $scss->setFormatter->crunched;

$scss = $scss->compile(
   '@import "sass/theme/child_theme_variables";' .
	$customizer_color_vars . '
    @import "sass/assets/bootstrap4";
	@import "src/sass/understrap/understrap/understrap";
	@import "src/sass/understrap/theme/contact-form7";
	@import "sass/assets/font-awesome";
	@import "sass/assets/underscores";
	@import "sass/theme/child_theme";' .
	$nav_menu_theme .
	$sticky_header .
	$header_menu_position .
	$sticky_footer .
	$footer_text_position
);

$write_file = get_stylesheet_directory() . '/css/child-theme.min.css';

// Hacking here because the official Server() thing with scssphp was taking too damn long
file_put_contents( $write_file, $scss );

// Clear browser cache
header("Cache-Control: no-cache, must-revalidate");
