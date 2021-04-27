<?php

function blocksy_woocommerce_has_flexy_view() {
	global $blocksy_is_quick_view;

	if ($blocksy_is_quick_view) {
		return true;
	}

	if (
		(is_product() || wp_doing_ajax())
		&&
		(
			blocksy_get_post_editor() === 'brizy'
			||
			blocksy_get_post_editor() === 'elementor'
		)
	) {
		return false;
	}

	return ! apply_filters('blocky:woocommerce:product-view:use-default', false);
}

remove_action(
	'woocommerce_single_product_summary',
	'woocommerce_template_single_meta',
	40
);


$action_to_hook = 'wp';

if (wp_doing_ajax()) {
	$action_to_hook = 'init';
}

add_action($action_to_hook, function () {
	if (blocksy_woocommerce_has_flexy_view()) {
		remove_action(
			'woocommerce_product_thumbnails',
			'woocommerce_show_product_thumbnails',
			20
		);
	}

	if (get_theme_mod('woo_has_product_tabs', 'yes') === 'no') {
		add_filter('woocommerce_product_tabs', function ($tabs) {
			return [];
		}, 99);
	}

	if (get_theme_mod('has_product_single_rating', 'yes') === 'no') {
		remove_action(
			'woocommerce_single_product_summary',
			'woocommerce_template_single_rating',
			10
		);
	}

	remove_action(
		'woocommerce_single_product_summary',
		'woocommerce_template_single_price',
		10
	);

	add_action(
		'woocommerce_single_product_summary',
		'woocommerce_template_single_price',
		12
	);

	if (get_theme_mod('has_product_single_title', 'yes') === 'no') {
		remove_action(
			'woocommerce_single_product_summary',
			'woocommerce_template_single_title',
			5
		);
	}
});

add_action(
	'woocommerce_single_product_summary',
	function () {
		if (get_theme_mod('has_product_single_meta', 'yes') === 'yes') {
			woocommerce_template_single_meta();
		}

		if (is_customize_preview()) {
			blocksy_add_customizer_preview_cache(function () {
				return blocksy_html_tag(
					'div',
					['data-id' => 'single-meta'],
					blocksy_collect_and_return(function () {
						global $product;

						if ($product) {
							woocommerce_template_single_meta();
						}
					})
				);
			});
		}
	},
	39
);

add_action(
	'woocommerce_before_single_product_summary',
	function () {
		echo '<div class="product-entry-wrapper">';

		global $product;

		if ($product->is_in_stock()) {
			if (get_theme_mod('has_product_single_onsale', 'yes') === 'yes') {
				woocommerce_show_product_sale_flash();
			}
		} else {
			echo '<span class="out-of-stock-badge">' . __('Out of stock', 'blocksy') . '</span>';
		}
	},
	1
);

add_action(
	'woocommerce_after_single_product_summary',
	function () {
		echo '</div>';
	},
	1
);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action(
	'woocommerce_after_main_content',
	function () {
		if (is_product()) {
			woocommerce_upsell_display();
			woocommerce_output_related_products();
		}
	},
	5
);

function blocksy_woo_single_post_class($classes, $product) {
	if (! is_product()) {
		return $classes;
	}

	if (blocksy_woocommerce_has_flexy_view()) {
		if (count($product->get_gallery_image_ids()) > 0) {
			if (get_theme_mod('gallery_style', 'horizontal') === 'vertical') {
				$classes[] = 'thumbs-left';
			} else {
				$classes[] = 'thumbs-bottom';
			}
		}
	}

	if (get_theme_mod('has_product_sticky_summary', 'no') === 'yes') {
		$classes[] = 'sticky-summary';
	}

	return $classes;
}

add_filter(
	'woocommerce_post_class',
	'blocksy_woo_single_post_class',
	999,
	2
);


add_action('woocommerce_post_class', function ($classes) {
	if (! is_product()) {
		return $classes;
	}

	global $blocksy_is_quick_view;

	if (! $blocksy_is_quick_view) {
		$classes[] = 'ct-default-gallery';
	}

	return $classes;
});
