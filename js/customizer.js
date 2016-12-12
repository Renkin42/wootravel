/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	wp.customize( 'custom_stylesheet', function( value ) {
		value.bind( function( to ) {
			$( '#custom-stylesheet' ).text( to );
		} );
	} );

	wp.customize( 'content_radius_top_left', function( value ) {
		value.bind( function(  to ) {
			$( '.content-box, .content-box h1, .content-box h2' ).css( {
				'border-top-left-radius': to + 'px'
			} );
		} );
	} );
	wp.customize( 'content_radius_top_right', function( value ) {
		value.bind( function(  to ) {
			$( '.content-box, .content-box h1, .content-box h2' ).css( {
				'border-top-right-radius': to + 'px'
			} );
		} );
	} );
	wp.customize( 'content_radius_bottom_left', function( value ) {
		value.bind( function(  to ) {
			$( '.content-box' ).css( {
				'border-bottom-left-radius': to + 'px'
			} );
		} );
	} );
	wp.customize( 'content_radius_bottom_right', function( value ) {
		value.bind( function(  to ) {
			$( '.content-box' ).css( {
				'border-bottom-right-radius': to + 'px'
			} );
		} );
	} );
} )( jQuery );
