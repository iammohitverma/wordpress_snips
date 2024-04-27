<?php
/**
 * The template for displaying front page
 *
 * (Home Page of Website)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fasd-theme
 */
get_header();
?>

<div class="" id="home-page">
	<!-- this section is used on multiple pages | so please pass page name as a class also use inline background-color -->
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
</div>

<?php get_footer();?>

