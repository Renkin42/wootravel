<?php

/**
 * Include external files
 */
require_once('inc/mdb_bootstrap_navwalker.php');

/**
 * Setup Theme
 */
function wootravel_setup() {
    // Navigation Menus
    register_nav_menus(array(
        'navbar' => __( 'Navbar Menu')
    ));
    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('main-full', 1078, 516, false); // main post image in full width
    show_admin_bar( false );
}

/**
 * Add css and external scripts
 */
function wootravel_enqueue_scripts() {
    wp_enqueue_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'Bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css' );
    wp_enqueue_style( 'MDB', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/css/mdb.min.css' );
    wp_enqueue_style( 'Wootravel', get_template_directory_uri() . '/css/wootravel.min.css' );

    wp_enqueue_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', true );
    wp_enqueue_script( 'Tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js', array(), '1.4.0', true );
    wp_enqueue_script( 'Bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array(), '4.0.0', true );
    wp_enqueue_script( 'MDB', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/js/mdb.min.js', array(), '4.3.2' );
}

/**
 * Register our sidebars and widgetized areas.
 */
function wootravel_widgets_init() {

  register_sidebar( array(
    'name'          => 'Sidebar',
    'id'            => 'sidebar',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
  ) );

}

function wootravel_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'primary_color', array(
        'type'      => 'theme_mod',
        'default'   => '#4285F4',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label' => __( 'Primary Color', 'wootravel' ),
        'section' => 'colors',
    ) ) );

    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
}

function wootravel_customizer_live_preview() {
    wp_enqueue_script( 'Wootravel_Live_Customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'jquery','customize-preview' ), '', true );
}

add_action('after_setup_theme', 'wootravel_setup');
add_action( 'wp_enqueue_scripts', 'wootravel_enqueue_scripts' );
add_action( 'widgets_init', 'wootravel_widgets_init' );
add_action( 'customize_register', 'wootravel_customize_register' );
add_action( 'customize_preview_init', 'wootravel_customizer_live_preview' );
