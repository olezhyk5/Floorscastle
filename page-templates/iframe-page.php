<?php
/* 
 * Template Name: Iframe page
 */

$form_title = get_field('form_title', 'option');
$form_subtitle = get_field('form_subtitle', 'option');
$form_id = get_field('form_id', 'option');

$iframe_url = get_field('event_iframe_url', 'option');
if ( isset( $_GET['event_id'] ) && is_numeric( $_GET['event_id'] ) ) {
	$event_iframe_url = get_field('iframe_url', $_GET['event_id']);
	if ( ! empty( $event_iframe_url ) ) {
		$iframe_url = $event_iframe_url;
	}
}

if ( isset( $_GET['source'] ) && ! empty( $_GET['source'] ) ) {
    $iframe_url = $_GET['source'];
}

get_header();

if ( have_posts() ) :
    while ( have_posts()): the_post();

        if ( is_cart() || is_checkout() || is_account_page() ) : ?>
            <div class="flc-breadcrumb flc-breadcrumb--mb">
                <?php rank_math_the_breadcrumbs(); ?>
            </div>

            <div class="flc-title event_title">
                <div class="row w-100 justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-sm-10">
                        <?php the_title('<h2 class="flc-title__main">', '</h2>'); ?>

                        <div class="flc-title__divide">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/divide.svg'; ?>" alt="icon">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container container--large">
                <?php the_content(); ?>
            </div>
        <?php else :
            if ( have_rows('content_blocks') ) :
                get_template_part( 'template-parts/heading' );

                // loop through all the rows of flexible content
                while ( have_rows('content_blocks') ) : the_row();

                    get_template_part( 'template-parts/blocks/' . get_row_layout() );

                endwhile; // close the loop of flexible content
            else : ?>

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
                                    <?php the_title('<h1 class="flc-title__main">', '</h1>') ?>

                                    <div class="flc-title__divide">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/divide.svg" alt="icon">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ( has_post_thumbnail() ): ?>
                            <div class="flc-page__image">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-100">
                            </div>
                        <?php endif ?>

                        <div class="flc-page__content">
                            <div class="row justify-content-center">
                                <div class="col-xl-10">
                                	<iframe width="100%" height="1000" src="<?php echo esc_url( $iframe_url ); ?>" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;
        endif;

        if ( ! is_front_page() && ! empty( $form_title ) && ! empty( $form_subtitle ) && ! empty( $form_id ) ): ?>
            <?php
            $args = array(
                'form_title' => $form_title,
                'form_subtitle' => $form_subtitle,
                'form_id' => $form_id,
            );
            get_template_part('template-parts/newsletter-form', null, $args); ?>
        <?php endif;
    endwhile;
endif;

get_footer();