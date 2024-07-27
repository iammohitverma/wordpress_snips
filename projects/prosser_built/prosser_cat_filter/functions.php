<?php
// Shortcode for projects
add_action('wp_ajax_projects_filter', 'projects_filter');
add_action('wp_ajax_nopriv_projects_filter', 'projects_filter');

function projects_filter()
{
    $dataTab = isset($_POST['dataTab']) ? $_POST['dataTab'] : '';
    $postType = isset($_POST['postType']) ? $_POST['postType'] : '';
    $taxonomy = isset($_POST['taxonomy']) ? $_POST['taxonomy'] : '';

    $args = array(
        'post_type' => $postType,
        'posts_per_page' => -1,
        'orderby' => 'publish_date',
        'order' => 'ASC',
    );

    $args['tax_query'] = array(
        array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $dataTab,
        ),
    );

    $the_query = new WP_Query($args);
    $posts = array();

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            // You can fetch any additional post data you need here
            $image_id = get_post_thumbnail_id(get_the_ID());
            $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            $thumbnail_url = get_the_post_thumbnail_url();
            $permalink = get_permalink();
            $title = get_the_title();
            $published_date = get_the_date('F j, Y'); // Format the date as desired


            // Then add these variables to the $post array
            $post = array(
                'thumbnail_url' => $thumbnail_url,
                'alt' => $alt_text,
                'permalink' => $permalink,
                'title' => $title,
                'published_date' => $published_date,
            );
            $posts[] = $post;
        }
        wp_reset_postdata();
    }

    wp_send_json($posts); // Send JSON response
}
