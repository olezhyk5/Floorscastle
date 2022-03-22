<?php
/**
 * Opening Times Block.
 */

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$times = get_sub_field('opening_times_table');

if ( ! empty( $times ) ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-times">
        <div class="container">
            <div class="flc-title @@modify">
                <div class="row w-100 justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-sm-10">
                        <?php if ( ! empty( $title ) ) : ?>
                            <h2 class="flc-title__main"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $subtitle ) ) : ?>
                            <div class="flc-title__sub"><?php echo esc_html( $subtitle ); ?></div>
                        <?php endif; ?>

                        <div class="flc-title__divide">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/divide.svg'; ?>" alt="icon">
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ( $times as $item ) : ?>
                <div class="flc-times__block">
                    <div class="flc-times__table-header"><?php echo esc_html( $item['title'] ); ?></div>

                    <?php if ( ! empty( $item['list'] ) ) : ?>
                        <div class="flc-times__table-body">
                            <?php foreach ( $item['list'] as $elem ) : ?>
                                <div class="d-flex flc-times__table-line">
                                    <div class="col-6"><?php echo esc_html( $elem['label'] ); ?></div>
                                    <div class="col-6"><?php echo esc_html( $elem['times'] ); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif;
