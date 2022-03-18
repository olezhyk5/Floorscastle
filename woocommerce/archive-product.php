<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

$category_object = get_queried_object();

$thumbnail_id = get_term_meta( $category_object->term_id, 'thumbnail_id', true );
$image = wp_get_attachment_image_url( $thumbnail_id, 'full' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<div class="flc-top-banner">
    <div class="flc-top-banner__overlay" style="background-color: rgba(0,0,0, .15);"></div>

    <div class="flc-top-banner__bg">
        <?php if ( ! empty( $image ) ) : ?>
            <img src="<?php echo esc_url( $image ); ?>" alt="image">
        <?php endif; ?>
    </div>

    <div class="flc-top-banner__content">
        <div class="container">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <h1 class="flc-top-banner__title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>

            <div class="flc-breadcrumb">
                <?php rank_math_the_breadcrumbs(); ?>
            </div>
        </div>
    </div>
</div>

<div class="flc-shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php
                if ( woocommerce_product_loop() ) { ?>
                    <div class="flc-shop__notice">
                        <?php
                        /**
                         * Hook: woocommerce_shop_notices.
                         *
                         * @hooked woocommerce_output_all_notices - 10
                         */
                        do_action( 'woocommerce_shop_notices' );
                        ?>
                    </div>

                    <div class="flc-sorting">
                        <?php
                        /**
                         * Hook: woocommerce_before_shop_loop.
                         *
                         * @hooked woocommerce_output_all_notices - 10
                         * @hooked woocommerce_result_count - 20
                         * @hooked woocommerce_catalog_ordering - 30
                         */
                        do_action( 'woocommerce_before_shop_loop' );
                        ?>
                    </div>

                    <?php
                    woocommerce_product_loop_start();

                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );

                            wc_get_template_part( 'content', 'product' );
                        }
                    }

                    woocommerce_product_loop_end();

                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                    ?>
                    <?php
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action( 'woocommerce_no_products_found' );
                }

                /**
                 * Hook: woocommerce_after_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );
                ?>
            </div>

            <div class="col-lg-3">
                <?php
                /**
                 * Hook: woocommerce_sidebar.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action( 'woocommerce_sidebar' );
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer( 'shop' );
