<?php

function wootravel_enqueue_scripts() {
    wp_enqueue_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'Bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css' );
    wp_enqueue_style( 'MDB', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/css/mdb.min.css' );
    wp_enqueue_style( 'Wootravel', get_template_directory_uri() . '/css/wootravel.min.css' );

    wp_enqueue_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', true );
    wp_enqueue_script( 'Tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/css/tether.min.css', array(), '1.4.0', true );
    wp_enqueue_script( 'Bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array(), '4.0.0', true );
    wp_enqueue_script( 'MDB', 'https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.2/js/mdb.min.js', array(), '4.3.2' );
}

add_action( 'wp_enqueue_scripts', 'wootravel_enqueue_scripts' );