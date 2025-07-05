add_action( 'woocommerce_cart_calculate_fees', 'yaycommerce_add_checkout_fee_for_gateway' );

function yaycommerce_add_checkout_fee_for_gateway() {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }

    $chosen_gateway = WC()->session->get( 'chosen_payment_method' );
    if ( ! is_string( $chosen_gateway ) ) {
        return;
    }

    $cart_subtotal = WC()->cart->get_cart_contents_total();

    // Define fee percentages
    $gateway_fees = array(
        'darazbnpl' => 0.11, //11%
        'payzy'     => 0.11, //11%
    );

    // Friendly labels
    $gateway_labels = array(
        'darazbnpl' => 'Koko',
        'payzy'     => 'Payzy',
    );

    if ( isset( $gateway_fees[ $chosen_gateway ] ) ) {
        $percentage = $gateway_fees[ $chosen_gateway ];
        $fee = $cart_subtotal * $percentage;

        $label = isset($gateway_labels[$chosen_gateway]) ? $gateway_labels[$chosen_gateway] : 'Payment Gateway';

        WC()->cart->add_fee( $label . ' Processing Fee (' . ($percentage * 100) . '%)', $fee );
    }
}

add_action( 'woocommerce_after_checkout_form', 'yaycommerce_refresh_checkout_on_payment_methods_change' );

function yaycommerce_refresh_checkout_on_payment_methods_change() {
    wc_enqueue_js( "
        $('form.checkout').on('change', 'input[name^=\"payment_method\"]', function() {
            $('body').trigger('update_checkout');
        });
    ");
}
