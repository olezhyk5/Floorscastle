<?php

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'WC_Structured_Data::generate_website_data()', 30 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
add_action( 'woocommerce_shop_notices', 'woocommerce_output_all_notices', 10 );


/**
 * 1. Show custom input field above Add to Cart
 *
 * @return void
 */
function flc_product_add_on() {
    $gift_product = get_field('gift_product', 'option');

    global $product;

    if ( in_array( $product->get_id(), $gift_product ) ) {
        $value = isset( $_POST['gift_card_message'] ) ? sanitize_text_field( $_POST['_gift_card_message'] ) : '';

        echo '<div class="flc-gift-message"><label>Gift card message <abbr class="required" title="required">*</abbr></label><p><textarea name="gift_card_message" value="' . $value . '" placeholder="Enter your gift card message"></textarea></p></div>';
    }
}
add_action( 'woocommerce_before_add_to_cart_button', 'flc_product_add_on', 9 );

/**
 * 2. Throw error if custom input field empty
 *
 * @param $passed
 * @param $product_id
 * @param $qty
 * @return false|mixed
 */
function flc_product_add_on_validation( $passed, $product_id, $qty ){
    if ( isset( $_POST['gift_card_message'] ) && sanitize_text_field( $_POST['gift_card_message'] ) == '' ) {
        wc_add_notice( 'Gift card message a required field', 'error' );
        $passed = false;
    }

    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'flc_product_add_on_validation', 10, 3 );

/**
 * 3. Save custom input field value into cart item data
 *
 * @param $cart_item
 * @param $product_id
 * @return mixed
 */
function flc_product_add_on_cart_item_data( $cart_item, $product_id ){
    if ( isset( $_POST['gift_card_message'] ) ) {
        $cart_item['gift_card_message'] = sanitize_text_field( $_POST['gift_card_message'] );
    }

    return $cart_item;
}
add_filter( 'woocommerce_add_cart_item_data', 'flc_product_add_on_cart_item_data', 10, 2 );

/**
 * 4. Display custom input field value @ Cart
 *
 * @param $data
 * @param $cart_item
 * @return mixed
 */
function flc_product_add_on_display_cart( $data, $cart_item ) {
    if ( isset( $cart_item['gift_card_message'] ) ){
        $data[] = array(
            'name' => 'Gift card message',
            'value' => sanitize_text_field( $cart_item['gift_card_message'] )
        );
    }

    return $data;
}
add_filter( 'woocommerce_get_item_data', 'flc_product_add_on_display_cart', 10, 2 );

/**
 * 5. Save custom input field value into order item meta
 *
 * @param $item_id
 * @param $values
 * @return void
 * @throws Exception
 */
function flc_product_add_on_order_item_meta( $item_id, $values ) {
    if ( ! empty( $values['gift_card_message'] ) ) {
        wc_add_order_item_meta( $item_id, 'Gift card message', $values['gift_card_message'], true );
    }
}
add_action( 'woocommerce_add_order_item_meta', 'flc_product_add_on_order_item_meta', 10, 2 );

/**
 * 6. Display custom input field value into order table
 *
 * @param $cart_item
 * @param $order_item
 * @return mixed
 */
function flc_product_add_on_display_order( $cart_item, $order_item ){
    if ( isset( $order_item['gift_card_message'] ) ){
        $cart_item['gift_card_message'] = $order_item['gift_card_message'];
    }

    return $cart_item;
}
add_filter( 'woocommerce_order_item_product', 'flc_product_add_on_display_order', 10, 2 );

/**
 * 7. Display custom input field value into order emails
 *
 * @param $fields
 * @return mixed
 */
function flc_product_add_on_display_emails( $fields ) {
    $fields['gift_card_message'] = 'Gift card message';

    return $fields;
}
add_filter( 'woocommerce_email_order_meta_fields', 'flc_product_add_on_display_emails' );
