<?php
/**
 * Single Testimonial Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$testimonial_carousel_title = get_sub_field('single_testimonial_title');
$testimonial_carousel_subtitle = get_sub_field('single_testimonial_subtitle');
$single_testimonial_testimonial = get_sub_field('single_testimonial_testimonial');

if ( ! empty( $single_testimonial_testimonial ) ) :
    $args = array(
        'post_type' => 'testimonials',
        'posts_per_page' => -1,
        'post__in' => $single_testimonial_testimonial
    );

    $testimonial_query = new WP_Query( $args );

    if ( $testimonial_query->have_posts() ) :
        while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
            $content = get_field('content');
            ?>
            <div id="nov-block-<?php echo get_row_index(); ?>" class="bg-main" <?php echo $bg_color; ?>>
                <div class="container">
                    <div class="flc-card__content text-center flc-col-quote">
                        <span class="flc-col-quote__icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/quote.png'; ?>" alt="icon">
                        </span>

                        <?php the_title( '<h3 class="flc-col-quote__title">', '</h3>' ); ?>

                        <?php if ( ! empty( $content ) ) : ?>
                            <div class="flc-col-quote__text"><?php echo wp_kses_post( $content ); ?></div>
                        <?php endif; ?>

                        <?php if ( ! empty( $author ) ) : ?>
                            <div class="flc-col-quote__author"><?php echo esc_html( $author ); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata();
    endif;
endif;
