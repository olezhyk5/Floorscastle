<?php
$price = get_field('price');
$item_class = isset( $args['is_ajax'] ) && $args['is_ajax'] == 'yes' ? 'ajax-loaded' : '' ;
$short_description = get_field('short_description'); ?>
<div class="col-lg-4 col-sm-6 <?php echo $item_class; ?>">
	<div class="flc-property-item">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="flc-property-item__image">
				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
			</div>
		<?php endif ?>
		<a href="<?php the_permalink(); ?>" class="flc-property-item__title"><?php the_title(); ?></a>
		<?php if ( ! empty( $price ) ): ?>
			<div class="flc-property-item__price"><?php echo $price; ?></div>
		<?php endif ?>

		<?php if ( ! empty( $short_description ) ): ?>
			<p class="flc-property-item__text"><?php echo $short_description; ?></p>
		<?php endif ?>
		<a href="<?php the_permalink(); ?>" class="flc-btn flc-btn-border">View Property</a>
	</div>
</div>