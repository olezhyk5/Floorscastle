<?php
/**
 * Product Categories Block.
 */

$categories = get_terms('product_cat', [
    'hide_empty' => true,
]);

?>

<div class="flc-categories" id="nov-block-<?php echo get_row_index(); ?>">
    <div class="container">
        <div class="row">
            <?php foreach ( $categories as $category ) :
                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_image_url( $thumbnail_id, 'product-img' );
                ?>
                <div class="col-md-4">
                    <div class="flc-categories__item">
                        <?php if ( ! empty( $image ) ) : ?>
                            <div class="flc-categories__item-img">
                                <img src="<?php echo esc_url( $image ); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <div class="flc-categories__item-content">
                            <h3 class="flc-categories__item-title"><?php echo $category->name; ?></h3>

                            <?php if ( ! empty( $category->description ) ) : ?>
                                <div class="flc-categories__item-text"><?php echo $category->description; ?></div>
                            <?php endif; ?>

                            <a href="<?php echo get_term_link( $category->term_id, 'product_cat' ); ?>" class="flc-btn flc-btn-border"><?php esc_html_e('View Products', 'floors-castle'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
