<?php
$ticket_link 		 = get_field('ticket_link');
$subtitle 			 = get_field('subtitle');
$custom_date_text 	 = get_field('custom_date_text');
$start_date_of_event = get_field('start_date_of_event');
$timestamp = flc_data_to_time($start_date_of_event);

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
						<div class="flc-event__pop-up">
							<div class="flc-event__pop-up-icon"></div>
							<div class="flc-event__pop-up-block">
								<span>300</span>
							</div>
						</div>
						<div class="flc-event__pop-up">
							<div class="flc-event__pop-up-icon"></div>
							<div class="flc-event__pop-up-block">
								<span>9.00 - 17.00</span>
							</div>
						</div>
						<div class="flc-event__pop-up">
							<div class="flc-event__pop-up-icon"></div>
							<div class="flc-event__pop-up-block">
								<span>200-400</span>
							</div>
						</div>
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
			<a href="<?php the_permalink(); ?>" class="flc-event__title"><?php the_title(); ?></a>
			<?php if ( ! empty( $subtitle ) ): ?>
				<p class="flc-event__text"><?php echo $subtitle; ?></p>
			<?php endif ?>
			<div class="d-flex flc-event__footer">
				<a href="<?php the_permalink(); ?>" title="Read more" class="flc-btn flc-btn-border">Read more</a>
				<?php if ( ! empty( $ticket_link ) ): ?>
					<a href="<?php echo $ticket_link; ?>" title="Book Tickets" class="flc-btn flc-btn-main">Book Tickets</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>