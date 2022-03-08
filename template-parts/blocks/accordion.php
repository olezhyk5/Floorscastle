<?php
/**
 * Accordion Block.
 */

$accordion_title = get_sub_field('accordion_title');
$accordion_accordion = get_sub_field('accordion_accordion');

if ( ! empty( $accordion_accordion ) ) : ?>
    <div id="nov-block-<?php echo get_row_index(); ?>" class="flc-accordion">
        <div class="container">
            <?php if ( ! empty( $accordion_title ) ) : ?>
                <h2 class="flc-accordion__title"><?php echo wp_kses_post( $accordion_title ); ?></h2>
            <?php endif; ?>

            <?php foreach ( $accordion_accordion as $item ) : ?>
                <div class="flc-accordion__item">
                    <div class="flc-accordion__item-header">
                        <?php echo esc_html( $item['accordion_label'] ); ?>
                        <span>
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
                        </span>
                    </div>

                    <div class="flc-accordion__item-body">
                        <p><?php echo wp_kses_post( $item['accordion_content'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif;
