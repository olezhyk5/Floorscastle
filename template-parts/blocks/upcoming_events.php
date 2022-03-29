<?php
/**
 * Upcoming Events Block.
 */

$categories = get_terms('event_categories', [
    'hide_empty' => true,
]);

$args = array(
    'post_type'  => 'events',
    'posts_per_page' => 6,
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
                <button class="nav-link flc-tabs__item active" id="all" data-bs-toggle="tab" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true">Show All</button>
                <?php if ( ! empty( $categories ) ): ?>
                    <?php foreach ($categories as $cat): ?>
                        <button class="nav-link flc-tabs__item" id="<?php echo $cat->slug; ?>" data-bs-toggle="tab" data-bs-target="#<?php echo $cat->slug; ?>" type="button" role="tab" aria-controls="<?php echo $cat->slug; ?>" aria-selected="false"><?php echo $cat->name ?></button>
                    <?php endforeach ?>
                <?php endif ?>
            </div>

            <div class="tab-content flc-tabs__content" id="myTabContent">
                <div class="row js-load-more-events-container">
                    <?php while ( $events_query->have_posts() ) : $events_query->the_post(); ?>
                        <?php get_template_part('template-parts/event-single'); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>

                <?php if ( $events_query->max_num_pages > 1 ): ?>
                    <div class="js-load-more-events flc-event__loader" data-pages="<?php echo $events_query->max_num_pages; ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/loading.jpeg" alt="loader">
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php endif;
