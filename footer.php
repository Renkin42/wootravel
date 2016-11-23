<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Woo_Traveller
 */

?>

			</div><!-- column -->
		</div><!-- row -->
	</div><!-- container -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wootravel' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wootravel' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wootravel' ), 'wootravel', '<a href="http://www.renkin42.net/" rel="designer">Austin Leydecker</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
