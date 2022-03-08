<?php
/**
 * Standard Text Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$alignment = get_sub_field('alignment');
$standard_text_title = get_sub_field('standard_text_title');
$standard_text_subtitle = get_sub_field('standard_text_subtitle');
$standard_text_text = get_sub_field('standard_text_text');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-text-block text-<?php echo esc_attr( $alignment ); ?>" <?php echo $bg_color; ?>>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php if ( ! empty( $standard_text_title ) ) : ?>
                    <h2 class="flc-text-block__title"><?php echo esc_html( $standard_text_title ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $standard_text_subtitle ) ) : ?>
                    <h3 class="flc-text-block__subtitle"><?php echo esc_html( $standard_text_subtitle ); ?></h3>
                <?php endif; ?>

                <?php if ( ! empty( $standard_text_text ) ) : ?>
                    <div class="flc-text-block__text"><?php echo wp_kses_post( $standard_text_text ); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>