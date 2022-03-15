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
$height = get_field('height');
$buttons = get_field('buttons');

if ( $height === 'large' ) : ?>
<div class="flc-main-banner">
    <div class="flc-top-banner__overlay" style="background-color: rgba(0,0,0, <?php echo $page_title_overlay; ?>);"></div>

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
            <div class="flc-main-banner__content">
                <?php if ( ! empty( $page_subtitle ) ) : ?>
                    <h4 class="flc-main-banner__subtitle"><?php echo esc_html( $page_subtitle ); ?></h4>
                <?php endif; ?>

                <h1 class="flc-main-banner__title"><?php echo esc_html( $page_title ); ?></h1>

                <div class="d-flex justify-content-center align-items-center flc-main-banner__btns">
                    <a href="#" title="View Events" class="flc-btn flc-btn-border-light">View Events</a>
                    <a href="#" title="Book Tickets" class="flc-btn flc-btn-secondary">Book Tickets</a>
                </div>

                <?php if ( isset( $breadcrumbs ) && $breadcrumbs ) : ?>
                    <?php rank_math_the_breadcrumbs(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
    <div class="flc-top-banner">
        <div class="flc-top-banner__overlay" style="background-color: rgba(0,0,0, <?php echo $page_title_overlay; ?>);"></div>

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
                    <?php rank_math_the_breadcrumbs(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif;
