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
    <style type="text/css">
        .theme-primary-color, footer.page-footer {
            background-color: <?php echo get_theme_mod('primary_color', '#4285F4'); ?>;
        }
        .theme-text-primary {
            color: <?php echo get_theme_mod('primary_color', '#4285F4'); ?>;
        }
    </style>
</head> 
<body <?php body_class(); ?>>
<!--Navbar-->
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper theme-primary-color">
            <a href="#" class="brand-logo center">Logo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><?php mico('menu'); ?></a>
            <ul class="left hide-on-med-and-down">
              <li><a href="sass.html">Sass</a></li>
              <li><a href="badges.html">Components</a></li>
              <li><a href="collapsible.html">Javascript</a></li>
              <li><a href="mobile.html">Mobile</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a href="sass.html">Sass</a></li>
              <li><a href="badges.html">Components</a></li>
              <li><a href="collapsible.html">Javascript</a></li>
              <li><a href="mobile.html">Mobile</a></li>
            </ul>
        </div>
    </nav>
</div>
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
    <a class="carousel-control-prev theme-primary-color hoverable" href="#carousel-top" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next theme-primary-color hoverable" href="#carousel-top" role="button" data-slide="next">
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
