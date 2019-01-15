(function( $ ) {

	$( document ).ready( function() {

		/**
		 * Determine left and/or right sticky sidebar
		 */

		var sidebarsQueryArray = [];

		if ( stickySidebarOpts.left_sidebar ) {

			sidebarsQueryArray.push( '#left-sidebar' );

		}

		if ( stickySidebarOpts.right_sidebar ) {

			sidebarsQueryArray.push( '#right-sidebar' );

		}

		var sidebarsQueryString = sidebarsQueryArray.join( ', ' );

		/**
		 * Detect elements and CSS properties for header, footer, and wpadminbar for margin options
		 */

		var topMargin = 0;
		var bottomMargin = 0;

		// If navbar is fixed
		if ( 'fixed' === $( '#wrapper-navbar' ).css( 'position' ) ) {
			topMargin += $( '#wrapper-navbar' ).outerHeight();
		}

		// If wpadminbar is present
		if ( $( '#wpadminbar' ).length ) {
			// console.log( 'Admin bar exists' );
			topMargin += $( '#wpadminbar' ).outerHeight();
		}

		// If footer is fixed
		if ( 'fixed' === $( '#wrapper-footer' ).css( 'position' ) ) {
			bottomMargin += $( '#wrapper-footer' ).outerHeight();
		}

		/**
		 * Add sticky sidebar to document
		 */

		$( sidebarsQueryString ).theiaStickySidebar( {

			additionalMarginTop: topMargin,
			additionalMarginBottom: bottomMargin,

		} );

	} );

} )( jQuery );