<?php

/**
 * ACF Options page support
 */
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

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
    if ( ! is_admin() && $query->is_main_query() && is_archive('events') ) {
        $query->set( 'posts_per_page', 3 );
        $meta_query = array(
            array(
                'key'     => 'end_date_of_event',
                'value'   => date('Ymd'),
                'compare' => '>='
            ),
        );
        $query->set('meta_query',$meta_query);
        // order by - start_date_of_event
    }
}
add_action( 'pre_get_posts', 'flc_pre_get_posts' );


