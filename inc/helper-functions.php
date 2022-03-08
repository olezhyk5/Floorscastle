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