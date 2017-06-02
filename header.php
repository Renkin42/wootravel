<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php bloginfo( 'name'); ?>
    </title>
    <?php wp_head(); ?>
</head> 
<body>
<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <strong>Navbar</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">          
            <?php
            if ( has_nav_menu( 'navbar' ) ) {
            wp_nav_menu( array(
            'menu'              => 'navbar',
            'theme_location'    => 'navbar',
            'depth'             => 2,
            'menu_class'        => 'navbar-nav mr-auto',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'container'         => false,
            'walker'            => new MDBBootstrapNavMenuWalker())
            );
            } else
            echo "Please assign Navbar Menu in Wordpress Admin -> Appearance -> Menus -> Manage Locations";
            ?>
            <?php get_search_form(); ?>
        </div>
    </div>
</nav>
<!--/.Navbar-->