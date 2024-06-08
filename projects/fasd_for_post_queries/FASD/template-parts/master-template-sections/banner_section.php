<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techmind-theme
 */

?>
<?php

$layouts = get_sub_field('type_of_layout');
if ($layouts === 'Banner with Slider') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/banner_layouts/banner_with_slider.php';
       if (file_exists($template_part_path)) {
           include($template_part_path);
       }
}elseif ($layouts === 'Banner without Slider') {
    $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/banner_layouts/banner_without_slider.php';
        if (file_exists($template_part_path)) {
            include($template_part_path);
        }
}

?>

