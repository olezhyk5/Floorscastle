<?php
/**
 * Testimonial Carousel Block.
 */

$bg_color = get_sub_field('center_text_background_colour');
$bg_color = flc_get_bg_color($bg_color);
$testimonial_carousel_title = get_sub_field('testimonial_carousel_title');
$testimonial_carousel_subtitle = get_sub_field('testimonial_carousel_subtitle');
$testimonial_text_alignment = get_sub_field('testimonial_text_alignment');
$testimonial_carousel_category = get_sub_field('testimonial_carousel_category');
$testimonial_tripadvisor = get_sub_field('testimonial_tripadvisor');

$args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => -1,
);

if ( ! empty( $testimonial_carousel_category ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'testimonial_categories',
            'field'    => 'id',
            'terms'    => $testimonial_carousel_category
        )
    );
}

$testimonial_query = new WP_Query( $args );

if ( $testimonial_query->have_posts() ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-reviews" <?php echo $bg_color; ?>>
        <div class="container">
            <div class="text-center">
                <div class="d-flex justify-content-between flc-reviews__header text-<?php echo esc_attr( $testimonial_text_alignment ); ?>">
                    <div>
                        <?php if ( ! empty( $testimonial_carousel_title ) ) : ?>
                            <h2 class="flc-reviews__title"><?php echo wp_kses_post( $testimonial_carousel_title ); ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $testimonial_carousel_subtitle ) ) : ?>
                            <h6 class="flc-reviews__subtitle"><?php echo wp_kses_post( $testimonial_carousel_subtitle ); ?></h6>
                        <?php endif; ?>
                    </div>

                    <?php if ( isset( $testimonial_tripadvisor ) && $testimonial_tripadvisor ) : ?>
                        <div class="flc-reviews__header-icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/trip-advisor.png'; ?>" alt="icon">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="flc-reviews__wrap">
                    <div class="swiper flc-reviews-swiper">
                        <div class="swiper-wrapper">
                            <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
                                $content = get_field('content');
                                ?>
                                <div class="swiper-slide flc-reviews__slider">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 col-md-10">
                                            <div class="d-flex flc-rating">
                                                <span class="flc-rating__star">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/star.png'; ?>" alt="star-icon">
                                                </span>
                                                <span class="flc-rating__star">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/star.png'; ?>" alt="star-icon">
                                                </span>
                                                <span class="flc-rating__star">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/star.png'; ?>" alt="star-icon">
                                                </span>
                                                <span class="flc-rating__star">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/star.png'; ?>" alt="star-icon">
                                                </span>
                                                <span class="flc-rating__star">
                                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/star.png'; ?>" alt="star-icon">
                                                </span>
                                            </div>

                                            <div class="text-center">
                                                <?php if ( ! empty( $content ) ) : ?>
                                                    <div class="flc-reviews__slider-text"><?php echo wp_kses_post( $content ); ?></div>
                                                <?php endif; ?>

                                                <?php the_title( '<div class="flc-reviews__slider-author">', '</div>' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>

                    <div class="swiper-button-prev flc-reviews-swiper-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="svg2" xml:space="preserve" width="286.53201" height="533.06134" viewBox="0 0 286.53201 533.06134" sodipodi:docname="left-swiper.ai">
                                    <metadata id="metadata8">
                                        <rdf:RDF>
                                            <cc:Work rdf:about="">
                                                <dc:format>image/svg+xml</dc:format>
                                                <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                            </cc:Work>
                                        </rdf:RDF>
                                    </metadata>
                            <defs id="defs6">
                                <clipPath clipPathUnits="userSpaceOnUse" id="clipPath18">
                                    <path d="M 0,399.796 H 214.899 V 0 H 0 Z" id="path16" />
                                </clipPath>
                            </defs>
                            <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" />
                            <g id="g10" inkscape:groupmode="layer" inkscape:label="left-swiper" transform="matrix(1.3333333,0,0,-1.3333333,0,533.06133)">
                                <g id="g12">
                                    <g id="g14" clip-path="url(#clipPath18)">
                                        <g id="g20" transform="translate(199.8918)">
                                            <path d="m 0,0 c -3.979,-0.002 -7.796,1.577 -10.61,4.39 l -184.89,184.9 c -5.856,5.858 -5.856,15.353 0,21.21 l 184.89,184.9 c 5.857,5.86 15.355,5.862 21.215,0.005 5.86,-5.857 5.862,-15.355 0.005,-21.215 L -163.68,199.9 10.61,25.61 C 16.47,19.754 16.473,10.257 10.617,4.397 7.802,1.58 3.982,-0.002 0,0" style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path22" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                                </svg>
                    </div>
                    <div class="swiper-button-next flc-reviews-swiper-next">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="svg2" xml:space="preserve" width="286.53201" height="533.06134" viewBox="0 0 286.53201 533.06134" sodipodi:docname="right-swiper.ai">
                                    <metadata id="metadata8">
                                        <rdf:RDF>
                                            <cc:Work rdf:about="">
                                                <dc:format>image/svg+xml</dc:format>
                                                <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                            </cc:Work>
                                        </rdf:RDF>
                                    </metadata>
                            <defs id="defs6">
                                <clipPath clipPathUnits="userSpaceOnUse" id="clipPath18">
                                    <path d="M 0,399.796 H 214.899 V 0 H 0 Z" id="path16" />
                                </clipPath>
                            </defs>
                            <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" />
                            <g id="g10" inkscape:groupmode="layer" inkscape:label="right-swiper" transform="matrix(1.3333333,0,0,-1.3333333,0,533.06133)">
                                <g id="g12">
                                    <g id="g14" clip-path="url(#clipPath18)">
                                        <g id="g20" transform="translate(199.8918)">
                                            <path d="m 0,0 c -3.979,-0.002 -7.796,1.577 -10.61,4.39 l -184.89,184.9 c -5.856,5.858 -5.856,15.353 0,21.21 l 184.89,184.9 c 5.857,5.86 15.355,5.862 21.215,0.005 5.86,-5.857 5.862,-15.355 0.005,-21.215 L -163.68,199.9 10.61,25.61 C 16.47,19.754 16.473,10.257 10.617,4.397 7.802,1.58 3.982,-0.002 0,0" style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none" id="path22" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                                </svg>
                    </div>
                </div>

                <a href="#" class="flc-reviews__more"><?php esc_html_e('View All Reviews', 'floors-castle'); ?></a>
            </div>
        </div>
    </div>
<?php endif;
