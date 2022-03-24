<?php
/**
 * Single event template
 */

$start_date_of_event = get_field('start_date_of_event');

$custom_date_text = get_field('custom_date_text');
$valid_tickets = get_field('valid_tickets');
$time = get_field('time');
$price = get_field('price');

$description = get_field('description');
$subtitle = get_field('subtitle');
$event_type = get_field('event_type');
$event_type_tooltip = get_field('event_type_tooltip');

$cta_title = get_field('cta_title');
$cta_subtitle = get_field('cta_subtitle');
$iframe_url = get_field('iframe_url');

if ( empty( $event_type_tooltip ) ) {
    if ( trim($event_type) == 'External Event' ) {
        $event_type_tooltip = get_field('external_event_tooltip_default', 'option');
    } else {
        $event_type_tooltip = get_field('internal_event_tooltip_default', 'option');    
    }
}

$form_title = get_field('form_title', 'option');
$form_subtitle = get_field('form_subtitle', 'option');
$form_id = get_field('form_id', 'option');

$booking_page = site_url('/ticket-booking/');
$ticket_link = $booking_page . '?event_id=' . get_the_ID();

$start_date = ! empty( $custom_date_text ) ? $custom_date_text : $start_date_of_event;

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <?php if ( function_exists('rank_math_the_breadcrumbs') ) { ?>
            <div class="flc-breadcrumb">
                <div class="container">
                    <?php rank_math_the_breadcrumbs(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="flc-details">
            <div class="container">
                <div class="flc-title event_title">
                    <div class="row w-100 justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-sm-10">
                            <div class="flc-title__date"><?php echo $start_date; ?></div>
                            <h1 class="flc-title__main"><?php the_title(); ?></h1>

                            <?php if ( ! empty( $subtitle ) ): ?>
                                <p class="flc-title__sub"><?php echo $subtitle; ?></p>
                            <?php endif ?>

                            <div class="flc-title__divide">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/divide.svg" alt="icon">
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ( has_post_thumbnail()): ?>
                    <div class="flc-details__image">
                        <img src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">
                    </div>
                <?php endif ?>
                <div class="d-flex justify-content-between flc-details__image-caption">
                    <button type="button" class="btn flc-popover-link" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<?php echo $event_type_tooltip; ?>">
                        <?php echo $event_type; ?>
                    </button>
                    <p>Event in <?php echo human_time_diff(time(), flc_data_to_time($start_date_of_event)); ?></p>
                </div>
                <div class="flc-details__content">
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-11">
                            <div class="row justify-content-between flex-md-row flex-column-reverse">
                                <div class="col-md-7"><?php echo $description; ?></div>
                                <div class="col-lg-4 col-md-5">
                                    <div class="flc-details__aside">
                                        <h4>Event Details</h4>
                                        <?php if ( ! empty( $valid_tickets ) ): ?>
                                            <div class="flc-details__aside-block">
                                                <h6>Valid tickets:</h6>
                                                <p><?php echo implode(' / ', $valid_tickets); ?></p>
                                            </div>
                                        <?php endif ?>

                                        <div class="flc-details__aside-block">
                                            <h6>Date:</h6>
                                            <p><?php echo $start_date; ?></p>
                                        </div>

                                        <?php if ( ! empty( $time ) ): ?>
                                            <div class="flc-details__aside-block">
                                                <h6>Time:</h6>
                                                <p><?php echo $time; ?></p>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flc-ticket">
                    <div class="d-flex flc-ticket__wrap">
                        <div class="flc-ticket__title">
                            <h3 class="flc-ticket__title-main"><?php echo $cta_title; ?></h3>
                            <p><?php echo $cta_subtitle; ?></p>
                        </div>
                        <div class="d-flex align-items-center flc-ticket__price">
                            <span>Tickets from:</span>
                            <?php echo $price; ?>
                        </div>

                        <a href="<?php echo esc_url( $ticket_link ); ?>" class="flc-btn flc-ticket__btn" title="Buy Online">Buy Online</a>
                    </div>
                </div>
            </div>
        </div>

        <?php if ( ! empty( $form_title ) && ! empty( $form_subtitle ) && ! empty( $form_id ) ): ?>
            <?php 
            $args = array(
                'form_title' => $form_title,
                'form_subtitle' => $form_subtitle,
                'form_id' => $form_id,
            );
            get_template_part('template-parts/newsletter-form', null, $args); ?>
        <?php endif ?>

    <?php
    endwhile;
endif;

get_footer();