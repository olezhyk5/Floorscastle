<?php
/**
 * Property template file
 */

global $wp_query;

$title_image  = get_field('property_title_image', 'option');
$image_anchor = get_field('property_page_title_image_anchor', 'option');
$subtitle 	  = get_field('property_subtitle', 'option');
$introduction = get_field('property_introduction', 'option');
$map_title 	  = get_field('property_map_title', 'option');
$map_text 	  = get_field('property_map_text', 'option');
$map_button   = get_field('map_button', 'option');

$banner_style = array();
if ( ! empty( $title_image ) ) {
	$banner_style[] = 'background-image: url(' . $title_image['url'] . ');';
}

if ( ! empty( $image_anchor ) ) {
	$banner_style[] = 'background-position: ' . $image_anchor . ';';
}

$form_title    = get_field('form_title', 'option');
$form_subtitle = get_field('form_subtitle', 'option');
$form_id 	   = get_field('form_id', 'option');


get_header();
?>
	<div class="flc-top-banner" style="<?php echo implode(' ', $banner_style); ?>">
		<div class="flc-top-banner__content">
			<div class="container">
				<h1 class="flc-top-banner__title">Property</h1>
				
				<?php if ( function_exists('rank_math_the_breadcrumbs') ) { ?>
					<div class="flc-breadcrumb">
						<?php rank_math_the_breadcrumbs(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="flc-property-page">
		<div class="container">

			<?php if ( ! empty( $subtitle ) || ! empty( $introduction ) ): ?>
				<div class="flc-title">
					<div class="row w-100 justify-content-center">
						<div class="col-xl-6 col-lg-8 col-sm-10">
							<?php if ( ! empty( $subtitle ) ): ?>
								<h2 class="flc-title__main"><?php echo $subtitle; ?></h2>
							<?php endif ?>
							<?php if ( ! empty( $introduction ) ): ?>
								<p class="flc-title__sub"><?php echo $introduction; ?></p>
							<?php endif ?>
							<div class="flc-title__divide">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/divide.png" alt="icon">
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>

			<?php if ( have_posts() ) : ?>
				<div class="row js-load-more-properties-container">
					<?php while ( have_posts() ) : the_post();

						get_template_part('template-parts/property-single');
						
					endwhile; ?>
				</div>

				<?php if ( $wp_query->max_num_pages > 1 ): ?>
					<div class="js-load-more-properties flc-event__loader" data-pages="<?php echo $wp_query->max_num_pages; ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/loading.jpeg" alt="loader">
					</div>
				<?php endif ?>

			<?php endif; ?>
		</div>
	</div>

	<div class="d-flex flc-card card_map">
		<div class="col-lg-6 flc-card__col bg-gray-secondary">
			<div class="flc-card__content flc-col-info">
				<h2 class="flc-col-info__title"><?php echo $map_title; ?></h2>
				<div class="flc-col-info__text"><?php echo $map_text; ?></div>
				<?php if ( ! empty( $map_button ) ):
					$link_target = $map_button['target'] ? $map_button['target'] : '_self'; ?>
					<a target="<?php echo esc_attr( $link_target ); ?>" href="<?php echo $map_button['url']; ?>" class="flc-btn flc-btn-border"><?php echo $map_button['title']; ?></a>
				<?php endif ?>
			</div>
		</div>

		<div class="col-lg-6 flc-card__col">
			<div class="flc-col-map">
				<div class="acf-map-list"></div>
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
get_footer();
