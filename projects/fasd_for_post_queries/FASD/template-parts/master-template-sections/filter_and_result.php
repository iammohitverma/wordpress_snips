<?php
	$section_BG_color = get_sub_field('section_background_color');
	$Filter_heading = get_sub_field('filter_heading');
	$heading_clr = get_sub_field('heading_color');
	$filter_shortcode = get_sub_field('filter_shortcode');
	// echo $section_BG_color;
?>
<?php
    echo do_shortcode("$filter_shortcode");
?>
