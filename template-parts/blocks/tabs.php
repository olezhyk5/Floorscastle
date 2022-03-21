<?php
/**
 * Tabs Block.
 */

$tabs_title = get_sub_field('tabs_title');
$tabs_repeater = get_sub_field('tabs_repeater');
?>

<div id="nov-block-<?php echo get_row_index(); ?>" class="flc-info">
    <div class="container">
        <?php if ( ! empty( $tabs_title ) ) : ?>
            <h2 class="text-center flc-info__title"><?php echo wp_kses_post( $tabs_title ); ?></h2>
        <?php endif; ?>

        <div class="nav nav-tabs d-flex justify-content-center flc-tabs" id="nav-tab" role="tablist">
            <?php foreach ( $tabs_repeater as $key => $item ) : ?>
                <button class="nav-link flc-tabs__item <?php echo $key === 0 ? 'show active' : ''; ?>" id="tab-<?php echo $key; ?>" data-bs-toggle="tab" data-bs-target="#content-<?php echo $key; ?>" type="button" role="tab" aria-controls="content-<?php echo $key; ?>" aria-selected="false"><?php echo esc_html( $item['tabs_label'] ); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="tab-content flc-tabs__content" id="myTabContent">
            <?php foreach ( $tabs_repeater as $key => $item ) : ?>
                <div class="tab-pane fade <?php echo $key === 0 ? 'show active' : ''; ?>" id="content-<?php echo $key; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $key; ?>">
                    <div class="row">
                        <div class="flc-info__content">
                            <?php echo wpautop( $item['tabs_content'] ); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>