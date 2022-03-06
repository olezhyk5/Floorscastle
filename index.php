<?php
/**
 * The main template file
 */

get_header();
?>

    <main class="d-blog">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <div class="d-blog__item">
                    <?php the_title( '<h2 class="d-blog__title">', '</h2>' ); ?>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="d-blog__link"><?php esc_html_e('Read More', 'fc'); ?></a>
                </div>
            <?php endwhile; ?>

        <?php else : ?>
            <div class="d-blog__notice">
                <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'fc'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>

    </main>

<?php
get_footer();
