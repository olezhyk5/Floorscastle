<?php

/**
 * ACF Options page support
 */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

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
    // if ( ! is_admin() && $query->is_main_query() && is_archive('events') ) {
        $query->set( 'posts_per_page', 3 );
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
        'posts_per_page' => 3,
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
        
            get_template_part('template-parts/event-single');
        }
        $result['html'] = ob_get_clean();
        wp_reset_postdata();
    }

    echo json_encode($result);
    die();
}
add_action('wp_ajax_flc_load_more_events', 'flc_load_more_events');
add_action('wp_ajax_nopriv_flc_load_more_events', 'flc_load_more_events');


function flc_get_locations() {
    $list = array();
    if ( is_archive('property')) {
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