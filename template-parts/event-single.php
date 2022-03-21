<?php
$iframe_url 		 = get_field('iframe_url');
$subtitle 			 = get_field('subtitle');
$price 			 	 = get_field('price');
$time 			 	 = get_field('time');
$valid_tickets 		 = get_field('valid_tickets');
$custom_date_text 	 = get_field('custom_date_text');
$start_date_of_event = get_field('start_date_of_event');
$timestamp = flc_data_to_time($start_date_of_event);

$event_iframe_url = get_field('event_iframe_url', 'option');

$ticket_link = ! empty( $iframe_url ) ? $iframe_url : $event_iframe_url;

$start_date = ! empty( $custom_date_text ) ? $custom_date_text : $start_date_of_event; ?>
<div class="col-lg-4 col-sm-6">
	<div class="flc-event">
		<div class="flc-event__top">
			<div class="flc-event__image">
				<?php if ( has_post_thumbnail() ): ?>
					<img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
				<?php endif ?>

				<div class="d-flex align-items-center justify-content-between flc-event__info">
					<div class="d-flex align-items-center">
						<?php if ( ! empty( $valid_tickets ) ): ?>
							<div class="flc-event__pop-up">
								<div class="flc-event__pop-up-icon" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<?php echo implode(' / ', $valid_tickets); ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/svgs/ticket-type.svg" alt="ticket type">
								</div>
							</div>
						<?php endif ?>
						<?php if ( ! empty( $time ) ): ?>
							<div class="flc-event__pop-up">
								<div class="flc-event__pop-up-icon" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<?php echo $time; ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/svgs/event-time.svg" alt="time">
								</div>
							</div>
						<?php endif ?>
						<?php if ( ! empty( $price ) ): ?>
							<div class="flc-event__pop-up">
								<div class="flc-event__pop-up-icon" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<?php echo $price; ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/svgs/event-price.svg" alt="price">
								</div>
							</div>
						<?php endif ?>
					</div>
					<p>
						<?php if ( $timestamp > time() ): ?>
							Event in <?php echo human_time_diff(time(), $timestamp); ?>
						<?php endif ?>
					</p>
				</div>
			</div>
		</div>
		<div class="flc-event__content">
			<time class="flc-event__date"><?php echo $start_date; ?></time>
			<?php the_title('<a href="' . get_the_permalink() . '" class="flc-event__title">', '</a>'); ?>
			<?php if ( ! empty( $subtitle ) ): ?>
				<div class="flc-event__text"><?php echo $subtitle; ?></div>
			<?php endif ?>
			<div class="d-flex flc-event__footer">
				<a href="<?php the_permalink(); ?>" title="Read more" class="flc-btn flc-btn-border"><?php esc_html_e('Read more', 'floors-castle'); ?></a>
				
				<a href="<?php echo $ticket_link; ?>" title="Book Tickets" class="flc-btn flc-btn-main"><?php esc_html_e('Book Tickets', 'floors-castle'); ?></a>
			</div>
		</div>
	</div>
</div>