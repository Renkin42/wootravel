<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Woo_Traveller
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses wootravel_header_style()
 */
function wootravel_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'wootravel_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'wootravel_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'wootravel_custom_header_setup' );

if ( ! function_exists( 'wootravel_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see wootravel_custom_header_setup().
 */
function wootravel_header_style() {
	$header_text_color = get_header_textcolor(); ?>
	<style type="text/css">
	<?php
	// Has the text been hidden?
	if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
	// If the user has set a custom color for the text use that.
	else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif;
 	if ( get_theme_mod( 'content_background' ) ) : ?>
    	.content-box{
        	background-color: transparent;
        	background-image: url("<?php echo get_theme_mod( 'content_background' ); ?>");
    	}
    <?php endif; 
    if ( get_theme_mod( 'navbar_background' ) ) : ?>
    #navbar-main,
    .content-box h1,
    .content-box h2 {
        background-color: transparent;
        background-image: url("<?php echo get_theme_mod( 'navbar_background' ); ?>");
    }
    <?php endif; ?>
	.content-box {
		border-top-left-radius: <?php echo get_theme_mod( 'content_radius_top_left', 10 ); ?>px;
		border-top-right-radius: <?php echo get_theme_mod( 'content_radius_top_right', 10 ); ?>px;
		border-bottom-left-radius: <?php echo get_theme_mod( 'content_radius_bottom_left', 10 ); ?>px;
		border-bottom-right-radius: <?php echo get_theme_mod( 'content_radius_bottom_right', 10 ); ?>px;
	}

	.content-box h1,
	.content-box h2 {
		border-top-left-radius: <?php echo get_theme_mod( 'content_radius_top_left', 10 ); ?>px;
		border-top-right-radius: <?php echo get_theme_mod( 'content_radius_top_right', 10 ); ?>px;
	}
	</style>
	<style type="text/css" id="custom-stylesheet">
		<?php echo get_theme_mod( 'custom_css', '' ); ?>
	</style>
	<?php
}
endif;
