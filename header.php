<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Woo_Traveller
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php require_once get_template_directory() . '/inc/custom-css.php'; ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wootravel' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar-main" role="navigation">
			<div class="container-fluid">
    			<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-navbar-collapse">
        				<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                	<?php 
					if ( has_custom_logo() ) :
						the_custom_logo();
					else :
						?> <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
					<?php endif; ?>
    			</div>
				<div class="collapse navbar-collapse" id="top-navbar-collapse">
					<?php wp_nav_menu( array(
                		'menu'           => 'primary',
                		'theme_location' => 'primary',
                		'depth'          => 1,
                		'container'      => false,
                		'menu_class'     => 'nav navbar-nav',
						'walker'         => new wp_bootstrap_navwalker()
					) ); ?>
					<ul class="nav navbar-nav navbar-right">
						<?php
						$cart_icon = is_plugin_active( 'woocommerce/woocommerce.php' ) && get_theme_mod( 'show_cart_icon', false );
						$user_icon = is_plugin_active( 'woocommerce/woocommerce.php' ) && get_theme_mod( 'show_user_icon', false );
						$event_icon = is_plugin_active( 'event-organiser/event-organiser.php' ) && get_theme_mod( 'show_event_icon', false );
						?>
						<?php if ( $event_icon ) : ?>
						<li class="plugin-icon">
							<a href="<?php echo get_permalink( get_theme_mod( 'event_page', 0 ) ); ?>" title="Events">
								<span class="glyphicon glyphicon-calendar"></span>
								<span class="plugin-icon-label">Events</span>
							</a>
						</li>
						<?php endif; ?>
						<?php if ( $cart_icon ) : 
						global $woocommerce; ?>
						<li class="plugin-icon">
							<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="View Your Cart">
								<span class="glyphicon glyphicon-shopping-cart"></span>
								<span class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
								<span class="plugin-icon-label">Cart</span>
							</a>
						</li>
						<?php endif; ?>
						<?php if ( $user_icon ) :
						$display_name = is_user_logged_in() ? 'Welcome, ' . wp_get_current_user()->user_login : 'Login/Register'; 
						$account_label = is_user_logged_in() ? 'My Account' : 'Login/Register'; ?> 
						<li class="plugin-icon">
							<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="<?php echo $display_name; ?>">
								<span class="glyphicon glyphicon-user"></span>
								<span class="plugin-icon-label"><?php echo $account_label; ?></span>
							</a>
						</li>
						<?php endif; ?>
						<li id="searchform-top" class="hidden-xs hidden-sm"><?php get_search_form(); ?></li>
					</ul>
				</div>
				<div id="searchform-top-sm" class="visible-xs visible-sm"><?php get_search_form(); ?></div>
    		</div>
		</nav>
	</header><!-- #masthead -->
	<?php
			$carousel_show_products = is_plugin_active( 'woocommerce/woocommerce.php' ) && get_theme_mod( 'carousel_featured_products' );
			$carousel_show_events = is_plugin_active( 'event-organiser/event-organiser.php' ) && get_theme_mod( 'carousel_events' );
			$carousel_post_ids = array();
			if ( $carousel_show_products ) {
				$carousel_post_ids = get_posts( array(
					'post_type'   => 'product',
					'numberposts' => get_theme_mod( 'carousel_num_products', 5 ),
					'orderby'     => 'rand',
					'fields'      => 'ids',
					'meta_key'    => '_featured',
					'meta_value'  => 'yes'
				) );
			}
			if ( $carousel_show_events ) {
				$carousel_post_ids = array_merge( $carousel_post_ids, eo_get_events( array(
					'numberposts'     => get_theme_mod( 'carousel_num_events', 5 ),
					'event_end_after' => 'today',
					'fields'          => 'ids'
				) ) );
			}

			$carousel_query = new WP_Query( array( 
				'post__in'       => $carousel_post_ids, 
				'post_type'      => 'any',
				'posts_per_page' => -1,
				'orderby'        => 'rand'
			) );

			if ( $carousel_query->have_posts() ) : ?>
				<div id="top-carousel" class="carousel slide" data-ride="carousel" data-pause="hover">
					<ol class="carousel-indicators">
						<?php while( $carousel_query->have_posts() ) :
							$carousel_query->the_post(); ?>
							<li data-target="#top-carousel" 
								data-slide-to="<?php echo $carousel_query->current_post; ?>"
								<?php if( $carousel_query->current_post == 0 ) : ?> 
									class="active"
								<?php endif; ?>>
							</li>
						<?php endwhile; $carousel_query->rewind_posts(); ?>
					</ol>

					<div class="carousel-inner" role="listbox">
						<?php while ($carousel_query->have_posts() ) : $carousel_query->the_post(); ?>
							<div class="item <?php if ( $carousel_query->current_post == 0 ) { echo 'active'; } ?>">
								<?php if (has_post_thumbnail() ) :
									the_post_thumbnail();
								endif; ?>
								<div class="carousel-caption">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-6 col-sm-8">
												<h3><?php the_title()?></h3>
												<?php the_excerpt()?>
												<a class="btn btn-default" href="<?php the_permalink(); ?>">More Info</a>
											</div>
											<div class="col-xs-6 col-sm-4">
												<?php if (get_post_type()==='event') : 
													$map_link_query = http_build_query( array(
														'size'    => '200x180',
														'zoom'    => get_theme_mod('carousel_map_zoom', 13),
														'center'  => eo_get_venue_lat() . ',' . eo_get_venue_lng(),
														'markers' => eo_get_venue_lat() . ',' . eo_get_venue_lng(),
														'key'     => eventorganiser_get_option('google_api_key')
													) ); ?>
													<img src="<?php echo 'https://maps.googleapis.com/maps/api/staticmap?' . $map_link_query; ?>">
												<?php elseif (has_post_thumbnail()) :
													the_post_thumbnail('carousel-thumb');
												endif; ?> 
											</div>	
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>

					<a class="left carousel-control" href="#top-carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#top-carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			<?php endif; ?>
	<div class="container-fluid">
		<div class="row">
			<div id="content" class="site-content col-sm-8">
