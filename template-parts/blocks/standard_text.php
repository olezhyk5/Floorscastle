<?php
/**
 * Standard Text Block.
 */

$bg_color = get_sub_field('standard_text_background_colour');
$alignment = get_sub_field('alignment');
$standard_text_title = get_sub_field('standard_text_title');
$standard_text_subtitle = get_sub_field('standard_text_subtitle');
$standard_text_text = get_sub_field('standard_text_text');
$buttons = get_sub_field('buttons');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-text-block flc-text-block--<?php echo $bg_color; ?> text-<?php echo esc_attr( $alignment ); ?>">
    <div class="container">
        <div class="row justify-content-center flc-col-content">
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

            <?php flc_get_buttons($buttons); ?>
        </div>
    </div>
</div>