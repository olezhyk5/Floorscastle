<?php
/**
 * The file includes necessary functions for theme.
 *
 * @package fc
 * @since 1.0
 */

require_once get_theme_file_path( '/inc/custom-post-type.php' );
require_once get_theme_file_path( '/inc/action-config.php' );
require_once get_theme_file_path( '/inc/helper-functions.php' );

function fc_after_theme_setup() {

    register_nav_menus(
        array(
            'main-menu' => esc_html__( 'Main menu', 'fc' ),
            'footer-menu' => esc_html__( 'Footer menu', 'fc' ),
            'copyright-menu' => esc_html__( 'Copyright menu', 'fc' ),
        )
    );

    add_theme_support( 'custom-header' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'fc_after_theme_setup' );
