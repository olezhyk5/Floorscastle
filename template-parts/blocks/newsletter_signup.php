<?php
/**
 * Newsletter Block.
 */

$form_title = get_sub_field('form_title');
$form_subtitle = get_sub_field('form_subtitle');
$form_id = get_sub_field('form_id');

if ( ! empty( $form_title ) && ! empty( $form_subtitle ) && ! empty( $form_id ) ): 
    $args = array(
        'form_title' => $form_title,
        'form_subtitle' => $form_subtitle,
        'form_id' => $form_id,
    );
    get_template_part('template-parts/newsletter-form', null, $args);
endif ?>