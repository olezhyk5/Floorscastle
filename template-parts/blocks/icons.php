<?php
/**
 * Icons Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$icons_icons = get_sub_field('icons_icons');
$count = count($icons_icons);

if ( ! empty( $icons_icons ) ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-service" <?php echo $bg_color; ?>>
        <div class="container">
            <div class="row">
                <?php foreach ( $icons_icons as $key => $item ) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="flc-service__item">
                            <?php if ( ! empty( $item['icons_icon'] ) ) : ?>
                                <div class="flc-service__item-icon <?php echo $key === 0 || $key === $count - 1  ? 'flc-service__item-icon-small' : ''; ?>">
                                    <img src="<?php echo esc_url( $item['icons_icon']['url'] ); ?>" alt="icon">
                                </div>
                            <?php endif; ?>

                            <?php if ( ! empty( $item['icons_title'] ) ) : ?>
                                <h3 class="flc-service__item-title"><?php echo esc_html( $item['icons_title'] ); ?></h3>
                            <?php endif; ?>

                            <?php if ( ! empty( $item['icons_description'] ) ) : ?>
                                <div class="flc-service__item-text"><?php echo wp_kses_post( $item['icons_description'] ); ?></div>
                            <?php endif; ?>

                            <?php if ( ! empty( $item['icons_link'] ) ) : ?>
                                <a href="<?php echo esc_url( $item['icons_link']['url'] ); ?>" class="flc-service__item-link"><?php echo esc_html( $item['icons_link']['title'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
