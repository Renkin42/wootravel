<style>
    <?php if ( get_theme_mod( 'content_background' ) ) : ?>
    .content-box{
        background-color: transparent;
        background-image: url("<?php echo get_theme_mod( 'content_background' ); ?>");
    }
    <?php endif; 
    if (get_theme_mod( 'navbar_background' ) ) : ?>
    #navbar-main,
    .content-box h1,
    .content-box h2 {
        background-color: transparent;
        background-image: url("<?php echo get_theme_mod( 'navbar_background' ); ?>");
    }
    <?php endif; 
    if ( get_theme_mod( 'custom_css' ) ) :
    echo get_theme_mod( 'custom_css' );
    endif; ?>
</style>