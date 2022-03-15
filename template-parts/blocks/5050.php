<?php
/**
 * 50/50 Block.
 */

$blocks = get_sub_field('blocks');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="d-flex flc-card card_map">
    <?php foreach ( $blocks as $block ) :
        $bg_color = $block['5050_background_colour'];
        $bg_color = flc_get_bg_color($bg_color);
        $pre_heading = $block['5050_pre_heading'];
        $title = $block['5050_title'];
        $subtitle = $block['5050_subtitle'];
        $text = $block['5050_text'];
        $author = $block['5050_author'];
        $image = $block['5050_image'];
        $image_anchor = $block['5050_image_anchor'];
        $buttons = $block['buttons'];
        $subtext = $block['subtext'];

        if ( $block['5050_type'] === 'testimonial' ) : ?>
            <div class="col-md-6 flc-card__col bg-main" <?php echo $bg_color; ?>>
                <div class="flc-card__content text-center flc-col-quote">
					<span class="flc-col-quote__icon">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/quote.png'; ?>" alt="icon">
					</span>

                    <?php if ( ! empty( $title ) ) : ?>
                        <h3 class="flc-col-quote__title"><?php echo esc_html( $title ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $text ) ) : ?>
                        <div class="flc-col-quote__text"><?php echo wp_kses_post( $text ); ?></div>
                    <?php endif; ?>

                    <?php if ( ! empty( $author ) ) : ?>
                        <div class="flc-col-quote__author"><?php echo esc_html( $author ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif( $block['5050_type'] === 'image_cta' ) : ?>

        <?php elseif( $block['5050_type'] === 'cta' ) : ?>
            <div class="col-md-6 flc-card__col bg-gray" <?php echo $bg_color; ?>>
                <div class="flc-card__content text-center flc-col-content">

                    <?php if ( ! empty( $pre_heading ) ) : ?>
                        <h2 class="flc-col-content__top-title"><?php echo esc_html( $pre_heading ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $title ) ) : ?>
                        <h2 class="flc-col-content__title"><?php echo esc_html( $title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $subtitle ) ) : ?>
                        <h4 class="flc-col-content__subtitle"><?php echo esc_html( $subtitle ); ?></h4>
                    <?php endif; ?>

                    <?php if ( ! empty( $text ) ) : ?>
                        <div class="flc-col-content__text"><?php echo wp_kses_post( $text ); ?></div>
                    <?php endif; ?>

                    <?php if ( ! empty( $buttons ) ) : ?>
                        <div class="d-flex align-items-center justify-content-center">
                            <?php foreach ( $buttons as $button ) : ?>
                                <a href="<?php echo esc_url( $button['link'] ); ?>" class="flc-btn flc-btn-border <?php echo esc_attr( $button['center_text_background_colour'] ); ?>"><?php echo esc_html( $button['text'] ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php elseif( $block['5050_type'] === 'image' ) : ?>
            <div class="col-lg-6 flc-card__col">
                <?php if ( ! empty( $image ) ) : ?>
                    <div class="flc-col-img">
                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="image">
                    </div>
                <?php endif; ?>
            </div>
        <?php else : ?>
            <div class="col-lg-6 flc-card__col bg-gray-secondary" <?php echo $bg_color; ?>>
                <div class="flc-card__content flc-col-info">
                    <?php if ( ! empty( $title ) ) : ?>
                        <h2 class="flc-col-info__title"><?php echo esc_html( $title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $subtitle ) ) : ?>
                        <h4 class="flc-col-info__subtitle"><?php echo esc_html( $subtitle ); ?></h4>
                    <?php endif; ?>

                    <?php if ( ! empty( $text ) ) : ?>
                        <div class="flc-col-info__text"><?php echo wp_kses_post( $text ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>