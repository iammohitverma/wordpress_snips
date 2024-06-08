<?php
add_action('wp_ajax_filter_videos_hub', 'filter_videos_hub');
add_action('wp_ajax_nopriv_filter_videos_hub', 'filter_videos_hub');

function filter_videos_hub() {
    $videoTab = isset($_POST['videoTab']) ? $_POST['videoTab'] : '';
    $sortValue = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';

    $args = array(
        'post_type' => 'hubvideo',
        'posts_per_page' => -1,
        'orderby' => 'publish_date',
        'order' => 'ASC',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    );

    if ($videoTab) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'hubvideos-category',
                'field' => 'slug',
                'terms' => $videoTab,
            ),
        );
    }

    if ($sortValue === 'ATOZ') {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } elseif ($sortValue === 'ZTOA') {
        $args['orderby'] = 'title';
        $args['order'] = 'DESC';
    }

    $the_query = new WP_Query($args);
    $posts = array();

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $post_tags = get_the_tags();
            $tags = array();
            foreach ($post_tags as $tag) {
                $tags[] = array(
                    'name' => $tag->name,
                    'link' => get_tag_link($tag->term_id),
                );
}

            // You can fetch any additional post data you need here
            $thumbnail_url = get_the_post_thumbnail_url();
            $permalink = get_permalink();
            $excerpt = get_the_excerpt();
            $title = get_the_title();
            $published_date = get_the_date('F j, Y'); // Format the date as desired


            // Then add these variables to the $post array
            $post = array(
                'thumbnail_url' => $thumbnail_url,
                'permalink' => $permalink,
                'excerpt' => $excerpt,
                'title' => $title,
                'published_date' => $published_date,
                'tags' => $tags,
            );
            $posts[] = $post;
        }
        wp_reset_postdata();
    }

    wp_send_json($posts); // Send JSON response
}
