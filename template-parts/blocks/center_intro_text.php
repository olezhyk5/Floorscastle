<?php
/**
 * Center Intro Text Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$center_text_title = get_sub_field('center_text_title');
$center_text_text = get_sub_field('center_text_text');
$buttons = get_sub_field('buttons');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-page flc-page--small" <?php echo $bg_color; ?>>
    <div class="container">
        <div class="flc-title mb-0">
            <div class="row w-100 justify-content-center">
                <div class="col-xl-6 col-lg-8 col-sm-10 flc-col-content">
                    <?php if ( ! empty( $center_text_title ) ) : ?>
                        <h2 class="flc-title__main"><?php echo wp_kses_post( $center_text_title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $center_text_text ) ) : ?>
                        <div class="flc-title__sub"><?php echo wp_kses_post( $center_text_text ); ?></div>
                    <?php endif; ?>

                    <?php flc_get_buttons($buttons); ?>

                    <div class="flc-title__divide flc-title__divide--mt">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/divide.svg'; ?>" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
