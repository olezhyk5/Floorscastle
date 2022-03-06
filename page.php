<?php
/**
 * Single page template
 */

get_header();

if ( have_posts() ) :
    while ( have_posts()): the_post();

        if ( have_rows('page_content') ) :
            // loop through all the rows of flexible content
            while ( have_rows('page_content') ) : the_row();

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
    endwhile;
endif;

get_footer();