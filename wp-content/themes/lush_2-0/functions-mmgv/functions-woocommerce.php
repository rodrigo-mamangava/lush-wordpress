<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action('after_setup_theme', 'woocommerce_support');

function woocommerce_support() {
    add_theme_support('woocommerce');
}

/**
 * Output the product sorting options.
 *
 * @subpackage	Loop
 */
function woocommerce_catalog_ordering_lush_suite() {
    global $wp_query;

    if (1 === $wp_query->found_posts || !woocommerce_products_will_display()) {
        return;
    }

    $orderby = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
    $show_default_orderby = 'menu_order' === apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
    $catalog_orderby_options = apply_filters('woocommerce_catalog_orderby', array(
        'menu_order' => __('Default sorting', 'woocommerce'),
        'popularity' => __('Sort by popularity', 'woocommerce'),
        'rating' => __('Sort by average rating', 'woocommerce'),
        'date' => __('Sort by newness', 'woocommerce'),
        'price' => __('Sort by price: low to high', 'woocommerce'),
        'price-desc' => __('Sort by price: high to low', 'woocommerce')
    ));

    if (!$show_default_orderby) {
        unset($catalog_orderby_options['menu_order']);
    }

    if ('no' === get_option('woocommerce_enable_review_rating')) {
        unset($catalog_orderby_options['rating']);
    }

    wc_get_template('loop/orderby-simples.php', array('catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby, 'show_default_orderby' => $show_default_orderby));
}

//custom get price html
add_filter('woocommerce_get_price_html', 'custom_price_html', 100, 2);

function custom_price_html($price, $product) {
    return str_replace('</del>', '<span class="del-img"></span></del>', $price);
}

if (!function_exists('woocommerce_form_field')) {

    /**
     * Outputs a checkout/address form field.
     *
     * @subpackage	Forms
     * @param string $key
     * @param mixed $args
     * @param string $value (default: null)
     * @todo This function needs to be broken up in smaller pieces
     */
    function woocommerce_form_field($key, $args, $value = null) {
        $defaults = array(
            'type' => 'text',
            'label' => '',
            'description' => '',
            'placeholder' => '',
            'maxlength' => false,
            'required' => false,
            'autocomplete' => false,
            'id' => $key,
            'class' => array(),
            'label_class' => array(),
            'input_class' => array(),
            'return' => false,
            'options' => array(),
            'custom_attributes' => array(),
            'validate' => array(),
            'default' => '',
        );

        $args = wp_parse_args($args, $defaults);
        $args = apply_filters('woocommerce_form_field_args', $args, $key, $value);

        if ($args['required']) {
            $args['class'][] = 'validate-required';
            $required = ' <abbr class="required" title="' . esc_attr__('required', 'woocommerce') . '">*</abbr>';
        } else {
            $required = '';
        }

        $args['maxlength'] = ( $args['maxlength'] ) ? 'maxlength="' . absint($args['maxlength']) . '"' : '';

        $args['autocomplete'] = ( $args['autocomplete'] ) ? 'autocomplete="' . esc_attr($args['autocomplete']) . '"' : '';

        if (is_string($args['label_class'])) {
            $args['label_class'] = array($args['label_class']);
        }

        if (is_null($value)) {
            $value = $args['default'];
        }

        // Custom attribute handling
        $custom_attributes = array();

        if (!empty($args['custom_attributes']) && is_array($args['custom_attributes'])) {
            foreach ($args['custom_attributes'] as $attribute => $attribute_value) {
                $custom_attributes[] = esc_attr($attribute) . '="' . esc_attr($attribute_value) . '"';
            }
        }

        if (!empty($args['validate'])) {
            foreach ($args['validate'] as $validate) {
                $args['class'][] = 'validate-' . $validate;
            }
        }

        $field = '';
        $label_id = $args['id'];
        $field_container = '<div class="form-group %1$s" id="%2$s" > %3$s</div>';

        switch ($args['type']) {
            case 'country' :

                $countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();

                if (1 === sizeof($countries)) {

                    $field .= '<strong>' . current(array_values($countries)) . '</strong>';

                    $field .= '<input type="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="' . current(array_keys($countries)) . '" ' . implode(' ', $custom_attributes) . ' class="country_to_state" />';
                } else {

                    $field = '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" ' . $args['autocomplete'] . ' class="country_to_state country_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . '>'
                            . '<option value="">' . __('Select a country&hellip;', 'woocommerce') . '</option>';

                    foreach ($countries as $ckey => $cvalue) {
                        $field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . __($cvalue, 'woocommerce') . '</option>';
                    }

                    $field .= '</select>';

                    $field .= '<noscript><input type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__('Update country', 'woocommerce') . '" /></noscript>';
                }

                break;
            case 'state' :

                /* Get Country */
                $country_key = 'billing_state' === $key ? 'billing_country' : 'shipping_country';
                $current_cc = WC()->checkout->get_value($country_key);
                $states = WC()->countries->get_states($current_cc);

                if (is_array($states) && empty($states)) {

                    $field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';

                    $field .= '<input type="hidden" class="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="" ' . implode(' ', $custom_attributes) . ' placeholder="' . esc_attr($args['placeholder']) . '" />';
                } elseif (is_array($states)) {

                    $field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="state_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder']) . '" ' . $args['autocomplete'] . '>
						<option value="">' . __('Select a state&hellip;', 'woocommerce') . '</option>';

                    foreach ($states as $ckey => $cvalue) {
                        $field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . __($cvalue, 'woocommerce') . '</option>';
                    }

                    $field .= '</select>';
                } else {

                    $field .= '<input type="text" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($value) . '"  placeholder="' . esc_attr($args['placeholder']) . '" ' . $args['autocomplete'] . ' name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" ' . implode(' ', $custom_attributes) . ' />';
                }

                break;
            case 'textarea' :

                $field .= '<textarea name="' . esc_attr($key) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' ' . ( empty($args['custom_attributes']['rows']) ? ' rows="2"' : '' ) . ( empty($args['custom_attributes']['cols']) ? ' cols="5"' : '' ) . implode(' ', $custom_attributes) . '>' . esc_textarea($value) . '</textarea>';

                break;
            case 'checkbox' :

                $field = '<label class="checkbox ' . implode(' ', $args['label_class']) . '" ' . implode(' ', $custom_attributes) . '>
						<input type="' . esc_attr($args['type']) . '" class="input-checkbox ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="1" ' . checked($value, 1, false) . ' /> '
                        . $args['label'] . $required . '</label>';

                break;
            case 'password' :
            case 'text' :
            case 'email' :
            case 'tel' :
            case 'number' :

                $field .= '<input type="' . esc_attr($args['type']) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($option_text) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' value="' . esc_attr($value) . '" ' . implode(' ', $custom_attributes) . ' />';
                //$field .= '<input type="' . esc_attr($args['type']) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['label']) . '" ' . $args['maxlength'] . ' ' . $args['autocomplete'] . ' value="' . esc_attr($value) . '" ' . implode(' ', $custom_attributes) . ' />';

                break;
            case 'select' :

                $options = $field = '';

                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        if ('' === $option_key) {
                            // If we have a blank option, select2 needs a placeholder
                            if (empty($args['placeholder'])) {
                                $args['placeholder'] = $option_text ? $option_text : __('Choose an option', 'woocommerce');
                            }
                            $custom_attributes[] = 'data-allow_clear="true"';
                        }
                        $options .= '<option value="' . esc_attr($option_key) . '" ' . selected($value, $option_key, false) . '>' . esc_attr($option_text) . '</option>';
                    }

                    $field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder']) . '" ' . $args['autocomplete'] . '>
							' . $options . '
						</select>';
                }

                break;
            case 'radio' :

                $label_id = current(array_keys($args['options']));

                if (!empty($args['options'])) {
                    foreach ($args['options'] as $option_key => $option_text) {
                        $field .= '<input type="radio" class="input-radio ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($option_key) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '"' . checked($value, $option_key, false) . ' />';
                        $field .= '<label for="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '" class="radio ' . implode(' ', $args['label_class']) . '">' . $option_text . '</label>';
                    }
                }

                break;
        }

        if (!empty($field)) {
            $field_html = '';

            if ($args['label'] && 'checkbox' != $args['type']) {
                $field_html .= '<label for="' . esc_attr($label_id) . '" class="' . esc_attr(implode(' ', $args['label_class'])) . '">' . $args['label'] . $required . '</label>';
            }

            $field_html .= $field;

            if ($args['description']) {
                $field_html .= '<span class="description">' . esc_html($args['description']) . '</span>';
            }

            $container_class = 'form-row ' . esc_attr(implode(' ', $args['class']));
            $container_id = esc_attr($args['id']) . '_field';

            $after = !empty($args['clear']) ? '<div class="clear"></div>' : '';

            $field = sprintf($field_container, $container_class, $container_id, $field_html) . $after;
        }

        $field = apply_filters('woocommerce_form_field_' . $args['type'], $field, $key, $args, $value);

        if ($args['return']) {
            return $field;
        } else {
            echo $field;
        }
    }

}


// Hook in
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields($fields) {
    $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
    $fields['order']['order_comments']['label'] = 'My new label';
    return $fields;
}
