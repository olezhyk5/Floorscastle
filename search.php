<?php
/**
 * Serach template file
 */

get_header();
?>
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
						<h1 class="flc-title__main"><?php _e( 'Search Results Found For', 'floors-castle' ); ?>: "<?php the_search_query(); ?>"</h1>

						<div class="flc-title__divide">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/divide.svg" alt="icon">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-lg-4 col-sm-6">
							<div class="flc-property-item">
								<?php if ( has_post_thumbnail() ): ?>
									<div class="flc-property-item__image">
										<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
									</div>
								<?php endif ?>

								<a href="<?php the_permalink(); ?>" class="flc-property-item__title"><?php the_title(); ?></a>

								<?php if ( has_excerpt() ): ?>
									<p class="flc-property-item__text"><?php echo get_the_excerpt() ?></p>
								<?php else: ?>
									<br>
								<?php endif ?>

								<a href="<?php the_permalink(); ?>" class="flc-btn flc-btn-border">View</a>
							</div>
						</div>
					<?php endwhile; ?>
					
					<?php the_posts_pagination();?>

				<?php else : ?>
					<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'fc'); ?></p>
				<?php endif; ?>
			</div>

		</div>
	</div>
<?php
get_footer();
