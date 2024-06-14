<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );


//On the WooCommerce site, that you have created. Add categories like "Gift", "Cake", "Accessiories" and then add products under each. Now create a function that checks if the product is of category "Cake". If it is, then it shows "Enter a message:" right above the "Add to Cart" button on Single product page. Any message that they enter, should show on their Order page on both frontend and backend. 

// create a function that checks if the product is of category "Cake" and if it is cake the message box should appear
	add_action('woocommerce_before_add_to_cart_button', 'cake_category');
	function cake_category($product_id) {
		if (has_term('cake', 'product_cat', $product_id)) {
			echo '<div class="custom-message-field">';
			echo '<label for="custom_message">Enter a message:</label>';
			echo '<input type="text" id="custom_message" name="custom_message" value="" />';
			echo '</div>';
	  }
	}


//save the custom message when the product is added to the cart
add_filter('woocommerce_add_cart_item_data', 'save_message_field', 10,2);
function save_message_field($cart_item_data, $product_id) {
    if ( isset($_POST['custom_message']) ) {
        $cart_item_data['custom_message'] = sanitize_text_field($_POST['custom_message']);
        // Ensure each cart item is unique
        $cart_item_data['unique_key'] = md5(microtime().rand());
    }
    return $cart_item_data;
}


//Display the custom message in the cart and checkout pages
add_filter('woocommerce_get_item_data', 'displaycustom_message_field', 10, 2);

function displaycustom_message_field($item_data, $cart_item) {
    if ( isset($cart_item['custom_message']) ) {
        $item_data[] = array(
            'name' => ' Message',
            'value' => sanitize_text_field($cart_item['custom_message'])
        );
    }
    return $item_data;
}

//this is a test
//Save the Custom Field Data to the Order
add_action('woocommerce_checkout_create_order_line_item', 'save_custommessage_to_order', 10, 4);

function save_custommessage_to_order($item, $cart_item_key, $values, $order) {
    if ( isset($values['custom_message']) ) {
        $item->add_meta_data('Custom Message', $values['custom_message'], true);
    }
}


//Display the Custom Field Data in the Admin Order Page
add_filter('woocommerce_admin_order_item_headers', 'add_custommessage_order_header');

function add_custommessage_order_header($columns) {
    $columns['custom_message'] = 'Custom Message';
    return $columns;
}

add_filter('woocommerce_admin_order_item_values', 'add_custommessage_order_value', 10, 3);

function add_custommessage_order_value($column, $item, $item_id) {
    if ('custom_message' === $column) {
        $custom_message = wc_get_order_item_meta($item_id, 'Custom Message', true);
        if (!empty($custom_message)) {
            echo esc_html($custom_message);
        }
    }
}


// Display the Custom Field Data on the Frontend Order Page
// add_action('woocommerce_order_item_meta_end', 'display_custommessage_in_order', 10, 4);

// function display_custommessage_in_order($item_id, $item, $order, $plain_text) {
//     $custom_message = wc_get_order_item_meta($item_id, 'Custom Message', true);
//     if (!empty($custom_message)) {
//         echo '<p><strong>Custom Message:</strong> ' . esc_html($custom_message) . '</p>';
//     }
// }
// Display custom message in the order details (backend)
add_action('woocommerce_admin_order_data_after_order_details', 'display_custom_message_in_admin_order_meta', 10, 1);

function display_custom_message_in_admin_order_meta($order) {
    foreach ($order->get_items() as $item_id => $item) {
        if ($custom_message = wc_get_order_item_meta($item_id, 'Custom Message', true)) {
            echo '<p><strong>' . __('Custom Message', 'your-text-domain') . ':</strong> ' . esc_html($custom_message) . '</p>';
        }
    }
}
// Save custom message to order item meta during checkout
// add_action('woocommerce_checkout_create_order_line_item', 'save_custom_message_order_meta', 10, 4);

// function save_custom_message_order_meta($item, $cart_item_key, $values, $order) {
//     if (isset($values['custom_message'])) {
//         $item->add_meta_data(__('Custom Message', 'your-text-domain'), sanitize_text_field($values['custom_message']), true);
//     }
// }