<?php
/**
 * Single property template
 */


$price = get_field('price');
$description = get_field('description');
$location = get_field('location');
$image_gallery = get_field('image_gallery');

$form_title = get_field('form_title', 'option');
$form_subtitle = get_field('form_subtitle', 'option');
$form_id = get_field('form_id', 'option');

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

		<div class="flc-page">
			<div class="container">
				<div class="flc-title page_title">
					<div class="row w-100 justify-content-center">
						<div class="col-xl-6 col-lg-8 col-sm-10">
							<h1 class="flc-title__main"><?php the_title() ?></h1>
							<?php if ( ! empty( $price ) ): ?>
								<p class="flc-title__sub"><?php echo $price; ?></p>
							<?php endif ?>
							<div class="flc-title__divide">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/divide.png" alt="icon">
							</div>
						</div>
					</div>
				</div>
				<?php if ( has_post_thumbnail() ): ?>
					<div class="flc-page__image">
						<img src="<?php echo the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" class="w-100">
					</div>
				<?php endif ?>

				<div class="flc-page__content">
					<div class="row justify-content-center">
						<div class="col-xl-10"><?php echo $description; ?></div>
					</div>
				</div>
				<?php if ( ! empty( $image_gallery ) ): ?>
					<div class="flc-gallery">
						<div class="row mx-n2">
							<?php foreach ($image_gallery as $image): ?>
								<div class="col-lg-4 col-6 px-2 mb-3">
									<a href="<?php echo $image['url'] ?>" class="flc-gallery__item" data-lightbox="gallery">
										<img src="<?php echo $image['url'] ?>" alt="image">
									</a>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif ?>

				<?php if ( ! empty( $location ) ): ?>
					<div class="flc-full-map mt-md-5 mt-3 mb-md-3">
						<div class="acf-map" data-zoom="16">
					        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
					    </div>
					</div>
				<?php endif ?>

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