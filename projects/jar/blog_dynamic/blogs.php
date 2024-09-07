<?php
/* Template Name: Blogs */

get_header();
?>
<?php

// Check value exists.
if (have_rows('blog_page_layout')):

    // Loop through rows.
    while (have_rows('blog_page_layout')):
        the_row();

        // Case: Paragraph layout.
        if (get_row_layout() == 'banner_section'):
            include get_template_directory() . '/template-parts/global_elements/common_banner.php';
            include get_template_directory() . '/template-parts/global_elements/black_bar.php';
            // Do something...

            // Case: Download layout.
        elseif (get_row_layout() == 'post_shortcode'):
            $shortcode = get_sub_field('shortcode');
            // Do something...
            echo do_shortcode( $shortcode );
        endif;

        // End loop.
    endwhile;

    // No value.
else:
    // Do something...
endif;

?>
<?php
get_footer();
?>