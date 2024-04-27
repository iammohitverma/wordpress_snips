<?php
$args = array(
    'post_type' => 'resource',
    'posts_per_page' => -1, // Use -1 to retrieve all posts, or specify a number
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
        // Your loop content here
        the_title(); // Example: Display post title
    endwhile;
    wp_reset_postdata(); // Reset post data query
else :
    echo 'No posts found';
endif;
?>


