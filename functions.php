<?php
/**
 * The file includes necessary functions for theme.
 *
 * @package fc
 * @since 1.0
 */

require_once get_theme_file_path( '/inc/menu-walker.php' );
require_once get_theme_file_path( '/inc/custom-post-type.php' );
require_once get_theme_file_path( '/inc/action-config.php' );
require_once get_theme_file_path( '/inc/helper-functions.php' );

if ( is_woocommerce_activated() ) {
    require_once get_theme_file_path( '/inc/woocommerce-functions.php' );
}

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
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support( 'wc-product-gallery-slider' );

    add_image_size( 'product-img', 380, 250, true );
}
add_action( 'after_setup_theme', 'fc_after_theme_setup' );

/**
 * Register widget area.
 *
 * @return void
 */
function flc_widgets_init() {

    register_sidebar(
        array(
            'name'          => esc_html__( 'Shop Sidebar', 'fc' ),
            'id'            => 'shop-sidebar',
            'description'   => esc_html__( 'Add widgets here to appear in your shop pages.', 'fc' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'flc_widgets_init' );

function fix_product_type_terms(){
    global $wpdb;
    //check if terms were translated
    $translations = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}icl_translations WHERE element_type = 'tax_product_type'" );

    if( $translations ){
        foreach( $translations as $translation ){
            if( !is_null( $translation->source_language_code ) ){
                //check relationships
                $term_relationships = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->term_relationships} WHERE term_taxonomy_id = %d", $translation->element_id  ) );
                if( $term_relationships ){
                    $orig_term = $wpdb->get_var( $wpdb->prepare( "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE element_type = 'tax_product_type' AND trid = %d AND source_language_code IS NULL", $translation->trid ) );
                    if( $orig_term ){
                        foreach( $term_relationships as $term_relationship ){
                            $wpdb->update(
                                $wpdb->term_relationships,
                                array(
                                    'term_taxonomy_id' => $orig_term
                                ),
                                array(
                                    'object_id' => $term_relationship->object_id,
                                    'term_taxonomy_id' => $translation->element_id
                                )
                            );
                        }
                    }
                }
                $term_id = $wpdb->get_var( $wpdb->prepare( "SELECT term_id FROM {$wpdb->term_taxonomy} WHERE term_taxonomy_id = %d", $translation->element_id  ) );

                if( $term_id ){
                    $wpdb->delete(
                        $wpdb->terms,
                        array(
                            'term_id' => $term_id
                        )
                    );

                    $wpdb->delete(
                        $wpdb->term_taxonomy,
                        array(
                            'term_taxonomy_id' => $translation->element_id
                        )
                    );
                }
            }
        }

        foreach( $translations as $translation ){
            $wpdb->delete(
                $wpdb->prefix . 'icl_translations',
                array(
                    'translation_id' => $translation->translation_id
                )
            );
        }
    }
}
add_action( 'init' , 'fix_product_type_terms' );