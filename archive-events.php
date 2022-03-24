<?php
/**
 * Events template file
 */

global $wp_query;

$events_image 		 = get_field('events_title_image', 'option');
$events_image_anchor = get_field('events_page_title_image_anchor', 'option');
$events_subtitle 	 = get_field('events_subtitle', 'option');
$events_introduction = get_field('events_introduction', 'option');

$banner_style = array();
if ( ! empty( $events_image ) ) {
	$banner_style[] = 'background-image: url(' . $events_image['url'] . ');';
}

if ( ! empty( $events_image_anchor ) ) {
	$banner_style[] = 'background-position: ' . $events_image_anchor . ';';
}

$form_title = get_field('form_title', 'option');
$form_subtitle = get_field('form_subtitle', 'option');
$form_id = get_field('form_id', 'option');
$event_iframe_url = get_field('event_iframe_url', 'option');

$cats = get_terms( array(
	'taxonomy' => 'event_categories',
	'hide_empty' => false,
));

$f_args = array(
	'' => '',
	'' == 1
);

$f_args = array(
	'post_type'  => 'events',
	'posts_per_page' => -1,
	'order'      => 'ASC',
	'meta_query' => array(
		array(
			'key'     => 'featured',
			'value'   => 1,
		),
		array(
			'key' 	  => 'end_date_of_event',
			'value'   => date('Ymd'),
			'compare' => '>='
		)
	),
);
$f_query = new WP_Query( $f_args );

get_header();
?>
	<div class="flc-top-banner" style="<?php echo implode(' ', $banner_style); ?>">
		<div class="flc-top-banner__content">
			<div class="container">
				<h1 class="flc-top-banner__title">Events</h1>
				
				<?php if ( function_exists('rank_math_the_breadcrumbs') ) { ?>
					<div class="flc-breadcrumb">
						<?php rank_math_the_breadcrumbs(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="flc-page">
		<div class="container">

			<div class="flc-title">
				<div class="row w-100 justify-content-center">
					<div class="col-xl-6 col-lg-8 col-sm-10">
						<h2 class="flc-title__main"><?php echo $events_subtitle; ?></h2>
						<p class="flc-title__sub"><?php echo strip_tags($events_introduction); ?></p>
						<div class="flc-title__divide">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/divide.svg" alt="icon">
						</div>
					</div>
				</div>
			</div>

			<div class="nav nav-tabs d-flex justify-content-center flc-tabs" id="nav-tab" role="tablist">
				<button class="nav-link flc-tabs__item active" id="all" data-bs-toggle="tab" data-bs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true">Show All</button>
				<?php if ( ! empty( $cats ) ): ?>
					<?php foreach ($cats as $cat): ?>
						<button class="nav-link flc-tabs__item" id="<?php echo $cat->slug; ?>" data-bs-toggle="tab" data-bs-target="#<?php echo $cat->slug; ?>" type="button" role="tab" aria-controls="<?php echo $cat->slug; ?>" aria-selected="false"><?php echo $cat->name ?></button>
					<?php endforeach ?>
				<?php endif ?>
			</div>

			<?php if ( $f_query->have_posts() ) {
				$item_class = $f_query->found_posts > 1 ? 'swiper-slide' : ''; ?>
				<div class="row">
					<div class="col-12">
						<?php if ( $f_query->found_posts > 1 ): ?>
							<div class="swiper js-fearured-events"><div class="swiper-wrapper">
						<?php endif ?>

						<?php while ( $f_query->have_posts() ) {
							$f_query->the_post(); 

							$iframe_url 		 = get_field('iframe_url');
							$ticket_link = ! empty( $iframe_url ) ? $iframe_url : $event_iframe_url;
							$subtitle = get_field('subtitle');
							$short_description = get_field('short_description');
							$custom_date_text = get_field('custom_date_text');
							$start_date_of_event = get_field('start_date_of_event');

							$start_date = ! empty( $custom_date_text ) ? $custom_date_text : $start_date_of_event;
							?>
							<div class="<?php echo $item_class; ?>">
								<div class="flc-event event_big">
									<div class="d-flex flex-md-row flex-column flc-event__wrap">
										<?php if ( has_post_thumbnail() ): ?>
											<div class="flc-event__top">
												<div class="flc-event__image">
													<img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
												</div>
											</div>
										<?php endif ?>
										<div class="flc-event__content">
											<time class="flc-event__date"><span class="d-none d-md-block">Featured Event</span> <?php echo $start_date; ?></time>
											<a href="<?php the_permalink() ?>" class="flc-event__title"><?php the_title() ?></a>
											<?php if ( ! empty( $subtitle ) ): ?>
												<h4 class="flc-event__subtitle"><?php echo $subtitle; ?></h4>
											<?php endif ?>
											<p class="flc-event__text"><?php echo $short_description; ?></p>
											<div class="d-flex flc-event__footer">
												<a href="<?php the_permalink() ?>" title="Read more" class="flc-btn flc-btn-border">Read more</a>
												<?php if ( ! empty( $ticket_link ) ): ?>
													<a href="<?php echo $ticket_link; ?>" target="_blank" rel="nofollow" title="Book Tickets" class="flc-btn flc-btn-main">Book Tickets</a>
												<?php endif ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>

						<?php if ( $f_query->found_posts > 1 ): ?>
							</div></div>
						<?php endif ?>
					</div>
				</div>
				<?php 
				wp_reset_postdata();
			} ?>

			<?php if ( have_posts() ) : ?>
				<div class="row js-load-more-events-container">
					<?php while ( have_posts() ) : the_post();
						get_template_part('template-parts/event-single');
					endwhile; ?>
				</div>
				<?php if ( $wp_query->max_num_pages > 1 ): ?>
					<div class="js-load-more-events flc-event__loader" data-pages="<?php echo $wp_query->max_num_pages; ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/loading.jpeg" alt="loader">
					</div>
				<?php endif ?>
			<?php endif; ?>
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
get_footer();
