<?php
add_action('wp_ajax_filter_resources', 'filter_resources');
add_action('wp_ajax_nopriv_filter_resources', 'filter_resources');

function filter_resources() {
    // Get the typeOf, topic, and sortValue parameters from the AJAX request
    $typeOf = isset($_POST['typeOf']) ? $_POST['typeOf'] : '';
    $topic = isset($_POST['topic']) ? $_POST['topic'] : '';
    $sortValue = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';

    // Set up the initial query arguments
    $args = array(
        'post_type' => 'resource',
        'posts_per_page' => -1,
        'orderby' => 'publish_date',
        'order' => 'ASC',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    );

    // If both typeOf and topic are 'all', remove tax_query to retrieve all posts
    if ($typeOf == 'all' && $topic == 'all') {
        unset($args['tax_query']); // Remove tax_query
    } else {
        // Set up tax_query to filter by resource-type and resource-topic
        $args['tax_query'] = array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'resource-type',
                'field' => 'slug',
                'terms' => $typeOf,
            ),
            array(
                'taxonomy' => 'resource-topic',
                'field' => 'slug',
                'terms' => $topic,
            ),
        );
    }

    // Adjust the query arguments based on the sort value
    if ($sortValue === 'ATOZ') {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } elseif ($sortValue === 'ZTOA') {
        $args['orderby'] = 'title';
        $args['order'] = 'DESC';
    }

    // Perform the WP_Query to retrieve the posts based on the arguments
    $the_query = new WP_Query($args);

    // Initialize an array to store the retrieved posts
    $posts = array();

    // Check if the query has any posts
    if ($the_query->have_posts()) {
        // Loop through each post in the query result
        while ($the_query->have_posts()) {
            $the_query->the_post();

            // Fetch additional post data
            $thumbnail_url = get_the_post_thumbnail_url();
            $permalink = get_permalink();
            $excerpt = get_the_excerpt();
            $title = get_the_title();

            // Get the resource-type and resource-topic terms for the post
            $resource_type_terms = get_the_terms(get_the_ID(), 'resource-type');
            $resource_topic_terms = get_the_terms(get_the_ID(), 'resource-topic');

            // Initialize arrays to store category names
            $resource_type_names = array();
            $resource_topic_names = array();

            // Populate arrays with category names if terms exist
            if ($resource_type_terms) {
                foreach ($resource_type_terms as $term) {
                    $resource_type_names[] = $term->name;
                }
            }

            if ($resource_topic_terms) {
                foreach ($resource_topic_terms as $term) {
                    $resource_topic_names[] = $term->name;
                }
            }

            // Construct the post array and add it to the posts array
            $post = array(
                'thumbnail_url' => $thumbnail_url,
                'permalink' => $permalink,
                'excerpt' => $excerpt,
                'title' => $title,
                'categories' => array(
                    'resource_type' => $resource_type_names, 
                    'resource_topic' => $resource_topic_names,
                ),
            );
            $posts[] = $post;
        }
        
        // Reset post data
        wp_reset_postdata();
    }

    // Send JSON response containing the retrieved posts
    wp_send_json($posts);
}
?>
