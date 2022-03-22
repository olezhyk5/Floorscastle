<?php
/**
 * Page Links Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$page_links_title = get_sub_field('page_links_title');
$page_links_pages = get_sub_field('page_links_pages');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-links" <?php echo $bg_color; ?>>
    <div class="container">
        <?php if ( ! empty( $page_links_title ) ) : ?>
            <h2 class="flc-links__title"><?php echo wp_kses_post( $page_links_title ); ?></h2>
        <?php endif; ?>

        <div class="row">
            <?php foreach ( $page_links_pages as $links_page ) :
                $banner_style = array();
                if ( ! empty( $links_page['page_links_image'] ) ) {
                    $banner_style[] = 'background-image: url(' . $links_page['page_links_image']['url'] . ');';
                }

                if ( ! empty( $links_page['page_links_anchor'] ) ) {
                    $banner_style[] = 'background-position: ' . $links_page['page_links_anchor'] . ';';
                }
                ?>
                <div class="col-lg-4">
                    <div class="flc-links__item">
                        <div class="flc-links__item-img" style="<?php echo implode(' ', $banner_style); ?>"></div>

                        <div class="flc-links__item-content">
                            <?php if ( ! empty( $links_page['page_links_title'] ) ) : ?>
                                <h4 class="flc-links__item-title"><?php echo esc_html( $links_page['page_links_title'] ); ?></h4>
                            <?php endif; ?>

                            <?php if ( ! empty( $links_page['page_links_title'] ) ) : ?>
                                <div class="flc-links__item-text"><?php echo esc_html( $links_page['page_links_description'] ); ?></div>
                            <?php endif; ?>

                            <a href="<?php echo esc_html( $links_page['page_links_button']['url'] ); ?>" class="flc-btn flc-btn-border"><?php echo esc_html( $links_page['page_links_button']['title'] ); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
