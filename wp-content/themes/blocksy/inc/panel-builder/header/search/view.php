<?php

$class = 'ct-header-search';

$item_visibility = blocksy_default_akg('header_search_visibility', $atts, [
	'tablet' => true,
	'mobile' => true,
]);

$class .= ' ' . blocksy_visibility_classes($item_visibility);


$label_class = 'ct-label';

$label_class .= ' ' . blocksy_visibility_classes(blocksy_akg('search_label_visibility', $atts,
	[
		'desktop' => false,
		'tablet' => false,
		'mobile' => false,
	]
));

$search_label = blocksy_akg('search_label', $atts, __('Search', 'blocksy'));
$search_label_position = blocksy_expand_responsive_value(
	blocksy_akg('search_label_position', $atts, 'left')
);

?>

<a href="#search-modal"
	class="<?php echo esc_attr($class) ?>"
	aria-label="<?php echo __('Search', 'blocksy')?>"
	data-label="<?php echo $search_label_position[$device] ?>"
	<?php echo blocksy_attr_to_html($attr) ?>>

	<span class="<?php echo $label_class ?>"><?php echo $search_label; ?></span>

	<svg class="ct-icon" width="15" height="15" viewBox="0 0 15 15">
		<path d="M14.6 13L12 10.5c.7-.8 1.3-2.5 1.3-3.8 0-3.6-3-6.6-6.6-6.6C3 0 0 3.1 0 6.7c0 3.6 3 6.6 6.6 6.6 1.4 0 2.7-.6 3.8-1.2l2.5 2.3c.7.7 1.2.7 1.7.2.5-.5.5-1 0-1.6zm-8-1.4c-2.7 0-4.9-2.2-4.9-4.9s2.2-4.9 4.9-4.9 4.9 2.2 4.9 4.9c0 2.6-2.2 4.9-4.9 4.9z"/>
	</svg>
</a>