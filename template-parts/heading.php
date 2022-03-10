<?php
/**
 * Heading Page.
 */

$page_title = get_field('page_title');
$page_title = ! empty( $page_title ) ? $page_title : get_the_title();
$breadcrumbs = get_field('breadcrumbs');
$page_title_type = get_field('page_title_type');
$page_title_image = get_field('page_title_image');
$page_title_video = get_field('page_title_video');
$page_title_anchor = get_field('page_title_anchor');
$page_title_overlay = get_field('page_title_overlay');
$height = get_field('height');
$buttons = get_field('buttons');
?>

<div class="flc-top-banner">
    <div class="flc-top-banner__overlay" style="background-color: rgba(0,0,0, <?php echo $page_title_overlay; ?>);"></div>

    <div class="flc-top-banner__bg">
        <?php if ( $page_title_type === 'video' ) : ?>
            <?php if ( ! empty( $page_title_video ) ) : ?>
                <video width="320" height="240" controls>
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
                    <ul class="flc-breadcrumb__list">
                        <li class="flc-breadcrumb__list-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="flc-breadcrumb__list-item">Generic Page</li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
