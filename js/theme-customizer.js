( function( $ ) {
    wp.customize( 'primary_color', function( value ) {
        value.bind( function( newval ) {
            $( '.theme-primary-color, footer.page-footer' ).css('background-color', newval);
            $( '.theme-text-primary' ).css('color', newval);
        } );
    } );
    wp.customize( 'blogname', function( value ) {
        value.bind( function( newval ) {
            $( '#site-name' ).html( newval );
        } );
    } );
} ) ( jQuery );