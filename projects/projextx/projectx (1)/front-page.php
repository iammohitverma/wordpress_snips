<?php
/**
 * The template for displaying front page
 *
 * (Home Page of Website)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package projectx-theme
 */
get_header();
?>


<?php if (have_rows('home_page_layout')) : ?>
    <?php while (have_rows('home_page_layout')) : the_row(); 
        $layout_name = get_row_layout();
            $template_part_path = get_stylesheet_directory() . '/template-parts/home_page/' . $layout_name . '.php';
            if (file_exists($template_part_path)) {
                include($template_part_path);
        }
    ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>

