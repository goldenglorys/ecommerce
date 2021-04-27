<?php

$loggedout_account_label_visibility = blocksy_akg(
	'loggedout_account_label_visibility',
	$atts,
	[
		'desktop' => true,
		'tablet' => true,
		'mobile' => true,
	]
);

$link = '#account-modal';

if (blocksy_akg('login_account_action', $atts, 'modal') === 'custom') {
	$link = blocksy_akg('loggedout_account_custom_page', $atts, '');
}

$loggedout_label_position = blocksy_expand_responsive_value(
	blocksy_akg('loggedout_label_position', $atts, 'right')
);

$attr['data-state'] = 'out';

if (blocksy_akg('logged_out_style', $atts, 'icon') !== 'none') {
	$attr['data-label'] = $loggedout_label_position[$device];
}

$attr['href'] = $link;

echo '<a ' . blocksy_attr_to_html($attr) . '>';

if (
	blocksy_some_device($loggedout_account_label_visibility)
	||
	is_customize_preview()
) {
	echo '<span class="' . trim('ct-label ' . blocksy_visibility_classes(
		$loggedout_account_label_visibility
	)) . '">';

	echo blocksy_akg('login_label', $atts, __('Login', 'blc'));

	echo '</span>';
}

if (blocksy_akg('logged_out_style', $atts, 'icon') === 'icon') {
	echo $icon[
		blocksy_default_akg('accountHeaderIcon', $atts, 'type-1')
	];
}

echo '</a>';
