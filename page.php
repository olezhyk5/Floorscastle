<?php
/**
 * Single page template
 */

$form_title = get_field('form_title', 'option');
$form_subtitle = get_field('form_subtitle', 'option');
$form_id = get_field('form_id', 'option');

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
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/divide.png'; ?>" alt="icon">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <?php the_content(); ?>
            </div>
        <?php else :
            get_template_part( 'template-parts/heading' );

            if ( have_rows('content_blocks') ) :
                // loop through all the rows of flexible content
                while ( have_rows('content_blocks') ) : the_row();

                    get_template_part( 'template-parts/blocks/' . get_row_layout() );

                endwhile; // close the loop of flexible content
            else : ?>
                <div class="d-banner">
                    <?php the_title('<h1 class="d-banner__title">', '</h1>'); ?>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-text">
                                <?php the_content(); ?>
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