<?php
/**
 * Woo Traveller Theme Customizer.
 *
 * @package Woo_Traveller
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wootravel_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wc_active = is_plugin_active( 'woocommerce/woocommerce.php' );
	$eo_active = is_plugin_active( 'event-organiser/event-organiser.php');
	
	if ( $wc_active || $eo_active ) {
		$wp_customize->add_section( 'wootravel_plugin_integration', array(
			'title'   => __( 'Plugin Integration', 'wootravel' ),
			'priority'=> 160
		) );

		if( $wc_active ) {
			$wp_customize->add_setting( 'show_cart_icon', array(
				'default'   => false,
				'transport' => 'refresh'
			) );
			$wp_customize->add_setting( 'show_user_icon', array(
				'default'   => false,
				'transport' => 'refresh'
			) );
			$wp_customize->add_setting( 'carousel_featured_products', array(
				'default'   => false,
				'transport' => 'refresh'
			) );
			$wp_customize->add_setting( 'carousel_num_products', array(
				'default'   => 5,
				'transport' => 'refresh'
			) );

			$wp_customize->add_control( 'cart_icon_control', array(
				'label'    => __( 'Display Cart Icon', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'show_cart_icon',
				'type'     => 'checkbox',
				'priority' => 3
			) );
			$wp_customize->add_control( 'user_icon_control', array(
				'label'    => __( 'Display Account Icon', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'show_user_icon',
				'type'     => 'checkbox',
				'priority' => 4
			) );
			$wp_customize->add_control( 'carousel_featured_products_control', array(
				'label'    => __( 'Include Featured Producs in Top Carousel', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'carousel_featured_products',
				'type'     => 'checkbox',
				'priority' => 5
			) );
			$wp_customize->add_control( 'carousel_num_products_control', array(
				'label'    => __( 'Number of Products to Include', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'carousel_num_products',
				'type'     => 'number',
				'priority' => 6
			) );
		}

		if ( $eo_active ) {
			$wp_customize->add_setting( 'show_event_icon', array(
				'default'   => false,
				'transport' => 'refresh'
			) );
			$wp_customize->add_setting( 'event_page', array(
				'default'   => 0,
				'transport' => 'refresh'
			) );
			$wp_customize->add_setting( 'carousel_events', array(
				'default'   => false,
				'transport' => 'refresh'
			) );
			$wp_customize->add_setting( 'carousel_num_events', array(
				'default'   => 5,
				'transport' => 'refresh'
			) );
			$wp_customize->add_setting( 'carousel_map_zoom', array(
				'default'   => 13,
				'transport' => 'refresh'
			) );
			
			$wp_customize->add_control( 'event_icon_control', array(
				'label'    => __( 'Display Calendar Icon', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'show_event_icon',
				'type'     => 'checkbox',
				'priority' => 1
			) );
			$wp_customize->add_control( 'event_page_control', array(
				'label'    => __( 'Events Page', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'event_page',
				'type'     => 'dropdown-pages',
				'priority' => 2
			) );
			$wp_customize->add_control( 'carousel_event_control', array(
				'label'    => __( 'Include Upcoming Events in Top Carousel', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'carousel_events',
				'type'     => 'checkbox',
				'priority' => 7
			) );
			$wp_customize->add_control( 'carousel_num_events_control', array(
				'label'    => __( 'Number of Events to Include', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'carousel_num_events',
				'type'     => 'number',
				'priority' => 8
			) );
			$wp_customize->add_control( 'carousel_map_zoom_control', array(
				'label'    => __( 'Zoom Level of Event Map in Top Carousel', 'wootravel' ),
				'section'  => 'wootravel_plugin_integration',
				'settings' => 'carousel_map_zoom',
				'type'     => 'number',
				'priority' => 9
			) );
		}
	}

	$wp_customize->add_setting( 'navbar_background' );
	$wp_customize->add_setting( 'content_background' );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'navbar_background_control', array(
			'label'    => __( 'Navigation Bar Background Image', 'wootravel' ),
			'section'  => 'background_image',
			'settings' => 'navbar_background'
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'navbar_background_control', array(
			'label'    => __( 'Content Box Background Image', 'wootravel' ),
			'section'  => 'background_image',
			'settings' => 'content_background'
	) ) );
}
add_action( 'customize_register', 'wootravel_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wootravel_customize_preview_js() {
	wp_enqueue_script( 'wootravel_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wootravel_customize_preview_js' );

require_once ABSPATH . 'wp-admin/includes/plugin.php';
