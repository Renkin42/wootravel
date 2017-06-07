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
<nav class="navbar navbar-toggleable-md navbar-dark primary-color sticky-top z-depth-2">
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
            <ul class="user-icons">
                <li>
                    <a href="#">
                        <i class="fa fa-2x fa-calendar"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-2x fa-shopping-cart"></i>
                        <span class="cart-count text-primary">99</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-2x fa-user"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/.Navbar-->

<!--Carousel Wrapper-->
<div id="carousel-top" class="carousel slide" data-ride="carousel" data-interval="5000">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-top" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-top" data-slide-to="1"></li>
        <li data-target="#carousel-top" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <div class="carousel-item active">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(18).jpg" alt="First slide">
        </div>
        <!--/First slide-->
        <!--Second slide-->
        <div class="carousel-item">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(19).jpg" alt="Second slide">
        </div>
        <!--/Second slide-->
        <!--Third slide-->
        <div class="carousel-item">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(20).jpg" alt="Third slide">
        </div>
        <!--/Third slide-->
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev primary-color hoverable" href="#carousel-top" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next primary-color hoverable" href="#carousel-top" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
<main class="container">
    <div class="row">
        <!--Main Content-->
        <div class="col">
