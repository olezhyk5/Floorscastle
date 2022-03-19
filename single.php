<?php
/**
 * Single post template
 */

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
                            <?php the_title('<h1 class="flc-title__main">', '</h1>') ?>

                            <div class="flc-title__divide">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/divide.png" alt="icon">
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
                        <div class="col-xl-10"><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    endwhile;
endif;

get_footer();