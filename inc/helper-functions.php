<?php

/**
 * ACF Options page support
 */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

/**
 * Check if WooCommerce is activated
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
    }
}

/**
 * ACF Goole Map API
 *
 * @param $api
 * @return mixed
 */
function flc_acf_google_map_api( $api ){
    $api['key'] = get_field( 'google_maps_key', 'option' );
    return $api;
}
add_filter('acf/fields/google_map/api', 'flc_acf_google_map_api');

/**
 * Get bg color.
 *
 * @param $bg_color
 * @return string
 */
function flc_get_bg_color($bg_color) {
    $style = '';

    $colors = array(
        'standard' => '#f8f7f4',
        'light' => '#f0ede7',
        'cream' => '#e8e4da',
        'blue' => '#003d47',
        'transparent' => 'transparent'
    );

    if ( ! empty( $bg_color ) ) {
        $style = 'style="background-color:' . $colors[$bg_color] . ';"';
    }

    return $style;
}

function flc_data_to_time($date) {
    $time = 0;
    $parts = explode('/', $date);
    $time = strtotime($parts[2] . '-' . $parts[1] . '-' . $parts[0] . ' 09:00');

    return $time;
}


function flc_human_time_diff($since, $diff, $from, $to) {
    if ( strpos($since, 'hour') !== false ) {
        return '1 day';
    }
    return $since;
}
add_filter( 'human_time_diff', 'flc_human_time_diff', 10, 4 );


function flc_pre_get_posts($query) {
    // Events archive
    if ( ! is_admin() && $query->is_main_query() && in_array( $query->get('post_type'), array('events') ) ) {
        $query->set( 'posts_per_page', 6 );
        $meta_query = array(
            array(
                'key'     => 'end_date_of_event',
                'value'   => date('Ymd'),
                'compare' => '>='
            ),
            array(
                'key'     => 'featured',
                'value'   => 1,
                'compare' => '!='
            ),
        );
        $query->set('meta_query',$meta_query);
        $query->set('order', 'ASC');
        $query->set('meta_key', 'start_date_of_event');
        $query->set('orderby', 'meta_value_num');
    }

    // Property archive
    if ( ! is_admin() && $query->is_main_query() && in_array( $query->get('post_type'), array('property') ) ) {
        $query->set( 'posts_per_page', 6 );
        $query->set( 'orderby', 'ID' );
        $query->set( 'order', 'DESC' );
    }
}
add_action( 'pre_get_posts', 'flc_pre_get_posts' );



function flc_load_more_events() {
    $result = array(
        'html' => '',
        'found_posts' => 0,
        'max_num_pages' => 0,
    );

    $args = array(
        'post_type'      => 'events',
        'posts_per_page' => 6,
        'paged'          => isset( $_POST['page'] ) && is_numeric( $_POST['page'] ) ? $_POST['page'] : 1,
        'order'          => 'ASC',
        'meta_key'       => 'start_date_of_event',
        'orderby'        => 'meta_value_num',
        'meta_query'     => array(
            array(
                'key'     => 'featured',
                'value'   => 1,
                'compare' => '!='
            ),
            array(
                'key'     => 'end_date_of_event',
                'value'   => date('Ymd'),
                'compare' => '>='
            )
        ),
    );

    if ( isset( $_POST['category'] ) && $_POST['category'] != 'all' ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'event_categories',
                'field'    => 'slug',
                'terms'    => $_POST['category']
            )
        );
    }

    $e_query = new WP_Query( $args );

    if ( $e_query->have_posts() ) {
        $result['found_posts'] = $e_query->found_posts;
        $result['max_num_pages'] = $e_query->max_num_pages;

        ob_start();
        while ( $e_query->have_posts() ) {
            $e_query->the_post(); 
        
            get_template_part('template-parts/event-single', null, array('is_ajax' => 'yes'));
        }
        $result['html'] = ob_get_clean();
        wp_reset_postdata();
    }

    echo json_encode($result);
    die();
}
add_action('wp_ajax_flc_load_more_events', 'flc_load_more_events');
add_action('wp_ajax_nopriv_flc_load_more_events', 'flc_load_more_events');


function flc_load_more_properties() {
    $result = array(
        'html' => '',
        'found_posts' => 0,
        'args' => 0,
        'max_num_pages' => 0
    );

    $args = array(
        'post_type'      => 'property',
        'orderby'        => 'ID',
        'order'          => 'DESC',
        'posts_per_page' => 6,
        'paged'          => isset( $_POST['page'] ) && is_numeric( $_POST['page'] ) ? $_POST['page'] : 1,
    );

    $e_query = new WP_Query( $args );

        $result['args'] = $e_query;
    if ( $e_query->have_posts() ) {
        ob_start();

        while ( $e_query->have_posts() ) {
            $e_query->the_post(); 
            get_template_part('template-parts/property-single', null, array('is_ajax' => 'yes'));
        }

        $result['html'] = ob_get_clean();
        wp_reset_postdata();
    }

    echo json_encode($result);
    die();
}
add_action('wp_ajax_flc_load_more_properties', 'flc_load_more_properties');
add_action('wp_ajax_nopriv_flc_load_more_properties', 'flc_load_more_properties');


function flc_get_locations() {
    $list = array();
    if ( is_archive('property') ) {
        $args = array(
            'post_type'      => 'property',
            'posts_per_page' => -1
        );

        $e_query = new WP_Query( $args );

        if ( $e_query->have_posts() ) {
            while ( $e_query->have_posts() ) {
                $e_query->the_post(); 

                $list[] = array(
                    'title' => get_the_title(),
                    'link' => get_the_permalink(),
                    'location' => get_field('location')
                );
            }
            wp_reset_postdata();
        }
    }

    return $list;
}

/**
 * Comparison shortcode.
 *
 * @return string
 */
function flc_comparison_shortcode() {
    $comparison_shortcode_content = get_field('comparison_shortcode_content', 'option');
    $comparison_shortcode_links = get_field('comparison_shortcode_links', 'option');

    $html = '';

    if ( ! empty( $comparison_shortcode_content ) ) :
        $html .= '<div class="table-responsive">
            <table class="table flc-comparison">
                <thead>
                <tr>
                    <th></th>
                    <th>Seasonal Grounds
                        Pass
                    </th>
                    <th>Castle Gardens &
                        Grounds Day Pass
                    </th>
                    <th>Castle Gardens &
                        Grounds Day Pass
                    </th>
                    <th>Historic House
                        Membership
                    </th>
                    <th>Annual Pass</th>
                </tr>
                </thead>

                <tbody>';

                foreach ( $comparison_shortcode_content as $item ) :
                    $html .= '<tr>
                        <td>' . esc_html( $item['title'] ) . '</td>';

                        $html .= '<td>';
                            if ( in_array( 'a', $item['type_selection'] ) ) :
                                $html .= '<span class="table-check"><img src="' . get_template_directory_uri() . '/assets/img/icon-check.png' . '">
                                </span>';
                            endif;
                        $html .= '</td>';

                        $html .= '<td>';
                            if ( in_array( 'b', $item['type_selection'] ) ) :
                                $html .= '<span class="table-check"><img src="' . get_template_directory_uri() . '/assets/img/icon-check.png' . '">
                                        </span>';
                            endif;
                        $html .= '</td>';

                        $html .= '<td>';
                            if ( in_array( 'c', $item['type_selection'] ) ) :
                                $html .= '<span class="table-check"><img src="' . get_template_directory_uri() . '/assets/img/icon-check.png' . '">
                                        </span>';
                            endif;
                        $html .= '</td>';

                        $html .= '<td>';
                            if ( in_array( 'd', $item['type_selection'] ) ) :
                                $html .= '<span class="table-check"><img src="' . get_template_directory_uri() . '/assets/img/icon-check.png' . '">
                                        </span>';
                            endif;
                        $html .= '</td>';

                        $html .= '<td>';
                            if ( in_array( 'e', $item['type_selection'] ) ) :
                                $html .= '<span class="table-check"><img src="' . get_template_directory_uri() . '/assets/img/icon-check.png' . '">
                                        </span>';
                            endif;
                        $html .= '</td>';
                    $html .= '</tr>';
                endforeach;

                $html .= '<tr>
                    <td></td>';

                    foreach ( $comparison_shortcode_links as $elem ) :
                        $html .= '<td>Find Out More<span>or</span><a href="' . esc_url( $elem['link']['url'] ) . '" class="flc-btn flc-btn-main">' . esc_html( $elem['link']['title'] ) . '</a>
                        </td>';
                    endforeach;
                $html .= '</tr>
                </tbody>
            </table>
        </div>';
    endif;

    return $html;
}
add_shortcode( 'flc_comparison', 'flc_comparison_shortcode' );

/**
 * nav menu object.
 *
 * @param $items
 * @param $args
 * @return mixed
 */
function flc_nav_menu_objects( $items, $args ) {
    foreach( $items as &$item ) {
        $mega_menu = get_field('mega_menu', $item);

        if( isset( $mega_menu ) && $mega_menu !== 'on' ) {
            $item->classes[] = 'menu-item--single';
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'flc_nav_menu_objects', 10, 2);

/**
 * Get buttons.
 *
 * @param $buttons
 * @return void
 */
function flc_get_buttons($buttons) {
    if ( ! empty( $buttons ) ) : ?>
        <div class="d-flex align-items-center justify-content-center">
            <?php foreach ( $buttons as $button ) :
                $new_tab = isset( $button['new_tab'] ) && $button['new_tab'] ? '_blank' : '_self';
                ?>
                <a href="<?php echo esc_url( $button['link'] ); ?>" class="flc-btn flc-btn-border-white flc-btn-<?php echo esc_attr( $button['center_text_background_colour'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>"><?php echo esc_html( $button['text'] ); ?></a>
            <?php endforeach; ?>
        </div>
    <?php endif;
}