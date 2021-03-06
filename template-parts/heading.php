<?php
/**
 * Heading Page.
 */

$page_title = get_field('page_title');
$page_title = ! empty( $page_title ) ? $page_title : get_the_title();
$page_subtitle = get_field('page_subtitle');
$breadcrumbs = get_field('breadcrumbs');
$page_title_type = get_field('page_title_type');
$page_title_image = get_field('page_title_image');
$page_title_video = get_field('page_title_video');
$page_title_anchor = get_field('page_title_anchor');
$page_title_overlay = get_field('page_title_overlay');
$page_title_overlay = ! empty( $page_title_overlay ) ? $page_title_overlay : 0.2;
$height = get_field('height');
$buttons = get_field('buttons');

if ( $height === 'large' ) : ?>
<div class="flc-main-banner">
    <div class="flc-top-banner__overlay" style="background-color: rgba(17,17,17, <?php echo $page_title_overlay; ?>);"></div>

    <div class="flc-main-banner__bg">
        <?php if ( $page_title_type === 'video' ) : ?>
            <?php if ( ! empty( $page_title_video ) ) : ?>
                <video autoplay loop muted>
                    <source src="<?php echo esc_url( $page_title_video['url'] ); ?>" type="video/mp4">
                </video>
            <?php endif; ?>
        <?php else : ?>
            <?php if ( ! empty( $page_title_image ) ) : ?>
                <img src="<?php echo esc_url( $page_title_image['url'] ); ?>" alt="image">
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="flc-main-banner__content">
        <div class="container">
            <?php if ( ! empty( $page_subtitle ) ) : ?>
                <h4 class="flc-main-banner__subtitle"><?php echo esc_html( $page_subtitle ); ?></h4>
            <?php endif; ?>

            <h1 class="flc-main-banner__title"><?php echo esc_html( $page_title ); ?></h1>

            <?php if ( ! empty( $buttons ) ) : ?>
                <div class="d-flex justify-content-center align-items-center flc-main-banner__btns">
                    <?php foreach ( $buttons as $key => $button ) :
                        $new_tab = isset( $button['new_tab'] ) && $button['new_tab'] ? '_blank' : '_self';
                        ?>
                        <a href="<?php echo esc_url( $button['link'] ); ?>" class="flc-btn <?php echo $key === 1 ? 'flc-btn-secondary' : 'flc-btn-border-white'; ?> <?php echo esc_attr( $button['center_text_background_colour'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>"><?php echo esc_html( $button['text'] ); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( isset( $breadcrumbs ) && $breadcrumbs ) : ?>
                <div class="flc-breadcrumb">
                    <?php rank_math_the_breadcrumbs(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php else : ?>
    <div class="flc-top-banner">
        <div class="flc-top-banner__overlay" style="background-color: rgba(17,17,17, <?php echo $page_title_overlay; ?>);"></div>

        <div class="flc-top-banner__bg">
            <?php if ( $page_title_type === 'video' ) : ?>
                <?php if ( ! empty( $page_title_video ) ) : ?>
                    <video autoplay loop muted>
                        <source src="<?php echo esc_url( $page_title_video['url'] ); ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
            <?php else : ?>
                <?php if ( ! empty( $page_title_image ) ) : ?>
                    <img src="<?php echo esc_url( $page_title_image['url'] ); ?>" alt="image">
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="flc-top-banner__content">
            <div class="container">
                <h1 class="flc-top-banner__title"><?php echo esc_html( $page_title ); ?></h1>

                <?php if ( isset( $breadcrumbs ) && $breadcrumbs ) : ?>
                    <div class="flc-breadcrumb">
                        <?php rank_math_the_breadcrumbs(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif;
