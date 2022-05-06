<?php
/**
 * Map Block.
 */

$location = get_sub_field('location');

if ( ! empty( $location ) ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-map acf-map" data-zoom="16">
        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
    </div>
<?php endif;
