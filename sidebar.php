</div>
<!--/Main Content-->
<!--Sidebar-->
<div class="col-md-4 col-lg-3 col-xl-2">
    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar' ); ?>
    <?php endif; ?>
</div>
<!--/.Sidebar-->