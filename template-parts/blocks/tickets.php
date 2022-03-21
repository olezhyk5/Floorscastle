<?php
/**
 * Tickets Block.
 */

$style = get_sub_field('style');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$tickets = get_sub_field('tickets');

if ( $style === 'style_2' ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-page flc-tickets">
        <div class="container">
            <div class="flc-title">
                <div class="row w-100 justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-sm-10">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h2 class="flc-title__main"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $subtitle ) ) : ?>
                            <div class="flc-title__sub"><?php echo esc_html( $subtitle ); ?></div>
                        <?php endif; ?>

                        <div class="flc-title__divide">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/divide.png'; ?>" alt="icon">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ( $tickets as $key => $ticket ) : ?>
                    <?php if ( $key === 0 ) : ?>
                        <div class="col-12 px-3">
                            <div class="flc-ticket-item flc-ticket-item_big">
                                <div class="d-flex flex-md-row flex-column flc-ticket-item__wrap">
                                    <?php if ( ! empty( $ticket['tickets_image'] ) ) : ?>
                                        <div class="flc-ticket-item__header">
                                            <?php if ( ! empty( $ticket['tickets_price'] ) && ! empty( $ticket['tickets_per'] ) ) : ?>
                                                <div class="d-md-none d-block flc-ticket-item__price">
                                                    £ <span><?php echo esc_html( $ticket['tickets_price'] ); ?></span>
                                                    <div class="flc-ticket-item__price-text"><?php echo esc_html( $ticket['tickets_per'] ); ?></div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="flc-ticket-item__image">
                                                <img src="<?php echo esc_url( $ticket['tickets_image']['url'] ); ?>" alt="image">
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="flc-ticket-item__body">
                                        <?php if ( ! empty( $ticket['tickets_price'] ) && ! empty( $ticket['tickets_per'] ) ) : ?>
                                            <div class="d-md-block d-none flc-ticket-item__price">
                                                £ <span><?php echo esc_html( $ticket['tickets_price'] ); ?></span>
                                                <div class="flc-ticket-item__price-text"><?php echo esc_html( $ticket['tickets_per'] ); ?></div>
                                            </div>
                                        <?php endif; ?>

                                        <h3 class="flc-ticket-item__title"><?php echo esc_html( $ticket['tickets_title'] ); ?></h3>
                                        <h6 class="flc-ticket-item__subtitle"><?php echo esc_html( $ticket['tickets_subtitle'] ); ?></h6>
                                        <div class="flc-ticket-item__text"><?php echo wp_kses_post( $ticket['tickets_description'] ); ?></div>

                                        <?php if ( ! empty( $ticket['buttons'] ) ) : ?>
                                            <div class="d-flex align-items-center flc-ticket-item__footer">
                                                <?php foreach ( $ticket['buttons'] as $key => $button ) : ?>
                                                    <a href="<?php echo esc_url( $button['link'] ); ?>" class="flc-btn <?php echo $key === 1 ? 'flc-btn-main flc-btn-main-light' : 'flc-btn-border-white'; ?> <?php echo esc_attr( $button['center_text_background_colour'] ); ?>"><?php echo esc_html( $button['text'] ); ?></a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-md-6 ps-lg-4 px-3 mb-md-5 mb-4">
                            <div class="flc-ticket-item">
                                <?php if ( ! empty( $ticket['tickets_image'] ) ) : ?>
                                    <div class="flc-ticket-item__header">
                                        <?php if ( ! empty( $ticket['tickets_price'] ) && ! empty( $ticket['tickets_per'] ) ) : ?>
                                            <div class="flc-ticket-item__price">
                                                £ <span><?php echo esc_html( $ticket['tickets_price'] ); ?></span>
                                                <div class="flc-ticket-item__price-text"><?php echo esc_html( $ticket['tickets_per'] ); ?></div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="flc-ticket-item__image">
                                            <img src="<?php echo esc_url( $ticket['tickets_image']['url'] ); ?>" alt="image">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="flc-ticket-item__body <?php echo ! empty( $ticket['tickets_image'] ) ? 'flc-ticket-item__body--no-bt' : ''; ?>">
                                    <h3 class="flc-ticket-item__title"><?php echo esc_html( $ticket['tickets_title'] ); ?></h3>
                                    <h6 class="flc-ticket-item__subtitle"><?php echo esc_html( $ticket['tickets_subtitle'] ); ?></h6>
                                    <div class="flc-ticket-item__text"><?php echo wp_kses_post( $ticket['tickets_description'] ); ?></div>

                                    <?php if ( ! empty( $ticket['buttons'] ) ) : ?>
                                        <div class="d-flex align-items-center flc-ticket-item__footer">
                                            <?php foreach ( $ticket['buttons'] as $key_s => $button ) : ?>
                                                <a href="<?php echo esc_url( $button['link'] ); ?>" class="flc-btn <?php echo $key_s === 1 ? 'flc-btn-main' : 'flc-btn-border'; ?> <?php echo esc_attr( $button['center_text_background_colour'] ); ?>"><?php echo esc_html( $button['text'] ); ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php else : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-main-tickets">
        <div class="container">
            <div class="flc-title event_title">
                <div class="row w-100 justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-sm-10">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h2 class="flc-title__main"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $subtitle ) ) : ?>
                            <div class="flc-title__sub"><?php echo esc_html( $subtitle ); ?></div>
                        <?php endif; ?>

                        <div class="flc-title__divide">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/divide.png'; ?>" alt="icon">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ( $tickets as $key => $ticket ) : ?>
                    <div class="<?php echo ! empty( $ticket['tickets_image'] ) ? 'col-lg-8 mb-4' : 'col-lg-4 col-md-6 mb-4'; ?>">
                        <div class="flc-ticket-item light_item <?php echo ! empty( $ticket['tickets_image'] ) ? 'light_image-item' : ''; ?>">
                            <?php if ( ! empty( $ticket['tickets_image'] ) ) : ?>
                                <div class="flc-ticket-item__image">
                                    <img src="<?php echo esc_url( $ticket['tickets_image']['url'] ); ?>" alt="image">
                                </div>
                            <?php endif; ?>

                            <div class="flc-ticket-item__body">
                                <?php if ( ! empty( $ticket['tickets_price'] ) && ! empty( $ticket['tickets_per'] ) ) : ?>
                                    <div class="flc-ticket-item__price">
                                        £ <span><?php echo esc_html( $ticket['tickets_price'] ); ?></span>
                                        <div class="flc-ticket-item__price-text"><?php echo esc_html( $ticket['tickets_per'] ); ?></div>
                                    </div>
                                <?php endif; ?>

                                <h3 class="flc-ticket-item__title"><?php echo esc_html( $ticket['tickets_title'] ); ?></h3>
                                <h6 class="flc-ticket-item__subtitle"><?php echo esc_html( $ticket['tickets_subtitle'] ); ?></h6>
                                <div class="flc-ticket-item__text"><?php echo wp_kses_post( $ticket['tickets_description'] ); ?></div>

                                <?php if ( ! empty( $ticket['buttons'] ) ) : ?>
                                    <div class="d-flex align-items-center flc-ticket-item__footer">
                                        <?php foreach ( $ticket['buttons'] as $s_key => $button ) : ?>
                                            <a href="<?php echo esc_url( $button['link'] ); ?>" class="flc-btn <?php echo $s_key === 1 ? 'flc-btn-main' : 'flc-btn-border'; ?> <?php echo esc_attr( $button['center_text_background_colour'] ); ?>"><?php echo esc_html( $button['text'] ); ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;
