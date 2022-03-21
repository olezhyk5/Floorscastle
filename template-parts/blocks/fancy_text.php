<?php
/**
 * Fancy Text Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$fancy_text_alignment = get_sub_field('fancy_text_alignment');
$fancy_text_pre_heading = get_sub_field('fancy_text_pre-heading');
$fancy_text_title = get_sub_field('fancy_text_title');
$fancy_text_subheading = get_sub_field('fancy_text_subheading');
$fancy_text_text = get_sub_field('fancy_text_text');
$fancy_text_button = get_sub_field('fancy_text_button');
$fancy_text_image_1 = get_sub_field('fancy_text_image_1');
$fancy_text_image_2 = get_sub_field('fancy_text_image_2');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-about" <?php echo $bg_color; ?>>
    <div class="container">
        <div class="row justify-content-between align-items-lg-center align-items-start">
            <?php if ( $fancy_text_alignment === 'right' ) : ?>
                <div class="col-lg-6">
                    <div class="flc-about__image">
                        <?php if ( ! empty( $fancy_text_image_1 ) ) : ?>
                            <div class="flc-about__image-big">
                                <img src="<?php echo wp_get_attachment_image_url( $fancy_text_image_1, 'large' ); ?>" alt="image">
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $fancy_text_image_2 ) ) : ?>
                            <div class="flc-about__image-small">
                                <img src="<?php echo wp_get_attachment_image_url( $fancy_text_image_2, 'medium' ); ?>" alt="image">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-xl-5 col-lg-6">
                <?php if ( ! empty( $fancy_text_pre_heading ) ) : ?>
                    <h4 class="flc-about__top-title"><?php echo esc_html( $fancy_text_pre_heading ); ?></h4>
                <?php endif; ?>

                <?php if ( ! empty( $fancy_text_title ) ) : ?>
                    <h2 class="flc-about__title"><?php echo esc_html( $fancy_text_title ); ?></h2>
                <?php endif; ?>

                <?php if ( ! empty( $fancy_text_subheading ) ) : ?>
                    <h3 class="flc-about__subtitle"><?php echo esc_html( $fancy_text_subheading ); ?></h3>
                <?php endif; ?>

                <?php if ( ! empty( $fancy_text_text ) ) : ?>
                    <div class="flc-about__text"><?php echo wp_kses_post( $fancy_text_text ); ?></div>
                <?php endif; ?>

                <?php if ( ! empty( $fancy_text_button ) ) : ?>
                    <a href="<?php echo esc_url( $fancy_text_button['url'] ); ?>" class="flc-btn flc-btn-border flc-btn-border-large"><?php echo esc_html( $fancy_text_button['title'] ); ?></a>
                <?php endif; ?>
            </div>

            <?php if ( $fancy_text_alignment === 'left' ) : ?>
                <div class="col-lg-6">
                    <div class="flc-about__image">
                        <?php if ( ! empty( $fancy_text_image_1 ) ) : ?>
                            <div class="flc-about__image-big">
                                <img src="<?php echo wp_get_attachment_image_url( $fancy_text_image_1, 'large' ); ?>" alt="image">
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $fancy_text_image_2 ) ) : ?>
                            <div class="flc-about__image-small">
                                <img src="<?php echo wp_get_attachment_image_url( $fancy_text_image_2, 'product-img' ); ?>" alt="image">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
