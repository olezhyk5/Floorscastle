<?php
/**
 * Quote Block.
 */

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$shortcode = get_sub_field('shortcode');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-instagram">
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

        <?php if ( ! empty( $shortcode ) ) : ?>
            <div class="flc-instagram__wrap">
                <?php echo do_shortcode( $shortcode ); ?>
            </div>
        <?php endif; ?>
    </div>
</div>