<?php
/**
 * Testimonial Carousel Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$quote_quote = get_sub_field('quote_quote');
$quote_author = get_sub_field('quote_author');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-quote" <?php echo $bg_color; ?>>
    <div class="container">
        <div class="flc-quote__wrap">
            <?php if ( ! empty( $quote_quote ) ) : ?>
                <h2 class="flc-quote__title"><?php echo wp_kses_post( $quote_quote ); ?></h2>
            <?php endif; ?>

            <?php if ( ! empty( $quote_author ) ) : ?>
                <div class="flc-quote__author"><?php echo wp_kses_post( $quote_author ); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>
