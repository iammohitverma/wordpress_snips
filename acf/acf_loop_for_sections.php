<?php
/*
Template Name: Global Template
*/
get_header();
?>



<main>
    <?php if (have_rows('global_templates')) : ?>
        <?php while (have_rows('global_templates')) : the_row(); ?>
            <?php 
            // Get the layout name
            $layout_name = get_row_layout();


            // Include the template part based on the layout name
            $template_part_path = get_stylesheet_directory() . '/template-parts/' . $layout_name . '.php';
            if (file_exists($template_part_path)) {
                include($template_part_path);
            }
            ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>






<?php get_footer(); ?>


