<?php
/**
 * Image Gallery Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$image_gallery_title = get_sub_field('image_gallery_title');
$image_gallery_gallery = get_sub_field('image_gallery_gallery');
$image_gallery_buttons = get_sub_field('image_gallery_buttons');

if ( ! empty( $image_gallery_gallery ) ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-gallery gallery-block" <?php echo $bg_color; ?>>
        <div class="container">
            <?php if ( ! empty( $image_gallery_title ) ) : ?>
                <h2 class="flc-gallery__title"><?php echo wp_kses_post( $image_gallery_title ); ?></h2>
            <?php endif; ?>

            <div class="row mx-n2">
                <?php foreach ( $image_gallery_gallery as $item ) : ?>
                    <div class="col-lg-4 col-6 px-2 mb-3">
                        <a href="<?php echo esc_url( $item['url'] ); ?>" class="flc-gallery__item" data-lightbox="gallery">
                            <img src="<?php echo esc_url( $item['url'] ); ?>" alt="image">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
