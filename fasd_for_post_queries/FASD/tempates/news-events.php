<?php /* Template Name: News and Events */

get_header();
$bg_clr = get_field("section_background_color");
$bws = get_field("banner_without_slider");
$heading = $bws['heading'];
$hdg_color = $bws['heading_text_color'];
$desc = $bws['description'];
$desc_color = $bws['description_text_color'];
$banner_img_id = $bws['banner_image']['ID'];
$banner_img_url = $bws['banner_image']['url'];
$shapes = get_field("shapes");
$right_center_shape = $shape['right_center_shape']['url'];
$left_center_shape = $shape['left_center_shape']['url'];
$bottom_right_shape = $shape['bottom_right_shape']['url'];
$bottom_left_shape = $shape['bottom_left_shape']['url'];
$top_right_shape = $shape['top_right_shape']['url'];
$top_left_shape = $shape['top_left_shape']['url'];
?>

<!-- banner without slider start -->

<?php if (have_rows('modules')) : ?>
        <?php while (have_rows('modules')) : the_row(); 
            $layout_name = get_row_layout();
            //print_r($layout_name);
                $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/' . $layout_name . '.php';
                if (file_exists($template_part_path)) {
                    include($template_part_path);
            }
        ?>
        <?php endwhile; ?>
    <?php endif; ?>

<!-- banner without slider end -->

<?php get_footer(); ?>