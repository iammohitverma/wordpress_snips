<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Glass_Cage
 */

get_header();
?>
<div class="<?php if (!have_rows('modules')) { echo 'pageUnderDevelopment'; } else { echo ''; } ?>" id="home-page">
	<!-- this section is used on multiple pages | so please pass page name as a class also use inline background-color -->
    <?php if (have_rows('modules')) : ?>
        <?php while (have_rows('modules')) : the_row(); 
            $layout_name = get_row_layout();
               // print_r($layout_name);
                $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/' . $layout_name . '.php';
                 //print_r($template_part_path);
                if (file_exists($template_part_path)) {
                    include($template_part_path);
            }
        ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php
get_footer();