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