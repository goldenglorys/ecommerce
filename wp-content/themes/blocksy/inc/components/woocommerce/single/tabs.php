<?php

add_action(
	'woocommerce_before_template_part',
	function ($template_name, $template_path, $located, $args) {
		if ($template_name !== 'single-product/tabs/tabs.php') {
			return;
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
			return;
		}

		ob_start();
	},
	4,
	4
);

add_action(
	'woocommerce_after_template_part',
	function ($template_name, $template_path, $located, $args) {
		if ($template_name !== 'single-product/tabs/tabs.php') {
			return;
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
			return;
		}

		$result = ob_get_clean();

		$res = get_theme_mod('woo_tabs_type', 'type-1');

		$res .= ':' . get_theme_mod('woo_tabs_alignment', 'center');

		echo str_replace(
			'wc-tabs-wrapper"',
			'wc-tabs-wrapper" data-type="' . $res . '"',
			$result
		);
	},
	4,
	4
);
