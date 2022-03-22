<?php
/**
 * CTA Block.
 */

$cta_pre_heading = get_sub_field('cta_pre_heading');
$cta_title = get_sub_field('cta_title');
$cta_subheading = get_sub_field('cta_subheading');
$cta_text = get_sub_field('cta_text');
$cta_buttons = get_sub_field('buttons');
$cta_background_image = get_sub_field('cta_background_image');
$background_image_anchor = get_sub_field('background_image_anchor');

$banner_style = array();
if ( ! empty( $cta_background_image ) ) {
    $banner_style[] = 'background-image: url(' . $cta_background_image['url'] . ');';
}

if ( ! empty( $background_image_anchor ) ) {
    $banner_style[] = 'background-position: ' . $background_image_anchor . ';';
}
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-cta" style="<?php echo implode(' ', $banner_style); ?>">
    <div class="container">
        <div class="flc-card__content text-center flc-col-content flc-col-content--white">

            <?php if ( ! empty( $cta_pre_heading ) ) : ?>
                <h2 class="flc-col-content__top-title"><?php echo esc_html( $cta_pre_heading ); ?></h2>
            <?php endif; ?>

            <?php if ( ! empty( $cta_title ) ) : ?>
                <h2 class="flc-col-content__title"><?php echo esc_html( $cta_title ); ?></h2>
            <?php endif; ?>

            <?php if ( ! empty( $cta_subheading ) ) : ?>
                <h4 class="flc-col-content__subtitle"><?php echo esc_html( $cta_subheading ); ?></h4>
            <?php endif; ?>

            <?php if ( ! empty( $cta_text ) ) : ?>
                <div class="flc-col-content__text"><?php echo wp_kses_post( $cta_text ); ?></div>
            <?php endif; ?>

            <?php if ( ! empty( $cta_buttons ) ) : ?>
                <div class="d-flex align-items-center justify-content-center">
                    <?php foreach ( $cta_buttons as $key => $button ) : ?>
                        <a href="<?php echo esc_url( $button['link'] ); ?>" class="flc-btn <?php echo $key === 1 ? 'flc-btn-main flc-btn-main-light' : 'flc-btn-border-white'; ?> <?php echo esc_attr( $button['center_text_background_colour'] ); ?>"><?php echo esc_html( $button['text'] ); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
