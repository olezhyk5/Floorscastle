<?php
/**
 * 50/50 Block.
 */

$blocks = get_sub_field('blocks');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="d-flex flc-card card_map">
    <?php foreach ( $blocks as $block ) :
        $bg_color = $block['center_text_background_colour'];
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
            <div class="col-md-6 flc-card__col flc-card__col--<?php echo $bg_color; ?>">
                <div class="flc-card__content text-center flc-col-quote flc-col-content">
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

                    <?php flc_get_buttons($buttons); ?>
                </div>
            </div>
        <?php elseif( $block['5050_type'] === 'image_cta' ) : ?>
            <div class="col-lg-6 flc-card__col">
                <div class="flc-col-price">
                    <?php if ( ! empty( $image ) ) : ?>
                        <img src="<?php echo esc_url( $image['url'] ); ?>" class="flc-col-price__image" alt="image">
                    <?php endif; ?>

                    <div class="flc-col-price__block">
                        <div class="flc-col-price__block-wrap">
                            <?php if ( ! empty( $title ) ) : ?>
                                <h2 class="flc-col-price__block-value"><?php echo wp_kses_post( $title ); ?></h2>
                            <?php endif; ?>

                            <?php if ( ! empty( $subtitle ) ) : ?>
                                <h5 class="flc-col-price__block-subtext"><?php echo esc_html( $subtitle ); ?></h5>
                            <?php endif; ?>

                            <?php flc_get_buttons($buttons); ?>

                            <?php if ( ! empty( $subtext ) ) : ?>
                                <div class="flc-col-price__bottom-text"><?php echo esc_html( $subtext ); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif( $block['5050_type'] === 'cta' ) : ?>
            <div class="col-md-6 flc-card__col flc-card__col--<?php echo $bg_color; ?>">
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

                    <?php flc_get_buttons($buttons); ?>
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
            <div class="col-lg-6 flc-card__col flc-card__col--<?php echo $bg_color; ?>">
                <div class="flc-card__content flc-col-info flc-col-content">
                    <?php if ( ! empty( $title ) ) : ?>
                        <h2 class="flc-col-info__title"><?php echo esc_html( $title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( ! empty( $subtitle ) ) : ?>
                        <h4 class="flc-col-info__subtitle"><?php echo esc_html( $subtitle ); ?></h4>
                    <?php endif; ?>

                    <?php if ( ! empty( $text ) ) : ?>
                        <div class="flc-col-info__text"><?php echo wp_kses_post( $text ); ?></div>
                    <?php endif; ?>

                    <?php flc_get_buttons($buttons); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>