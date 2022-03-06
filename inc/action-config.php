<?php


/**
 * Include google fonts.
 *
 * @return string
 */
function fc_fonts_url() {
    $fonts = array(
        'Crimson+Pro:300,400,500',
        'EB+Garamond:400,500',
        'Lato:300,400,700'
    );

    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'fc' ) ) {
        $font_url = add_query_arg( 'family', ( implode( '|', $fonts ) . "&subset=latin,latin-ext" ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

/**
 * Enqueue scripts.
 */
function fc_enqueue_scripts() {
    if ( is_admin() ) return false;

    wp_enqueue_style( 'main-fonts', fc_fonts_url(), array() );
    wp_enqueue_style( 'fc-style', get_stylesheet_directory_uri() . '/assets/css/style.css' );

    wp_enqueue_script( 'fc-script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true );

    wp_localize_script( 'fc-script', 'fc_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'site_url' => site_url('/')
    ) );

}
add_action( 'wp_enqueue_scripts', 'fc_enqueue_scripts' );
