<?php
/**
 * Upcoming Events Block.
 */

$categories = get_terms('event_categories', [
    'hide_empty' => true,
]);

$args = array(
    'post_type'  => 'events',
    'posts_per_page' => -1,
    'order'      => 'ASC',
    'meta_query' => array(
        array(
            'key' 	  => 'end_date_of_event',
            'value'   => date('Ymd'),
            'compare' => '>='
        )
    ),
);

$events_query = new WP_Query( $args );

$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');

if ( $events_query->have_posts() ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-block-events">
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
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/divide.svg'; ?>" alt="icon">
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav nav-tabs d-flex justify-content-center flc-tabs" id="nav-tab" role="tablist">
                <button class="nav-link flc-tabs__item active" id="first-tab" data-bs-toggle="tab" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true">Show All
                </button>

                <?php foreach ( $categories as $key => $category ) : ?>
                    <button class="nav-link flc-tabs__item" id="tab-<?php echo esc_attr( $key ); ?>" data-bs-toggle="tab" data-bs-target="#second" type="button" role="tab" aria-controls="second" aria-selected="false"><?php echo esc_html( $category->name ); ?></button>
                <?php endforeach; ?>
            </div>

            <div class="tab-content flc-tabs__content" id="myTabContent">
                <div class="row">
                    <?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
                        <?php get_template_part('template-parts/event-single'); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
