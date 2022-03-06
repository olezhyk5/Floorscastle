<?php
/**
 * Single post template
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

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

    <?php
    endwhile;
endif;

get_footer();