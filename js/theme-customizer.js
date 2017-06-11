( function( $ ) {
    wp.customize( 'primary_color', function( value ) {
        value.bind( function( newval ) {
            $( '.primary-color, .btn-primary' ).css('cssText', 'background-color: ' + newval + '!important;');
            $( '.text-primary' ).css('cssText', 'color: ' + newval + '!important;');
        } );
    } );
} ) ( jQuery );