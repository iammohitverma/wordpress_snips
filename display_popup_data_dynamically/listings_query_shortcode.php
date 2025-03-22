<?php
function wp_popup_posts() {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5, // Jitni posts dikhani ho
    );
    $query = new WP_Query($args);
    
    ob_start();
    if ($query->have_posts()) :
        echo '<ul class="popup-post-list">';
        while ($query->have_posts()) : $query->the_post();
            echo '<li>';
            echo '<h2>' . get_the_title() . '</h2>';
            echo '<button class="view-details" data-post-id="' . get_the_ID() . '">View Details</button>';
            echo '</li>';
        endwhile;
        echo '</ul>';
    endif;
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('popup_posts', 'wp_popup_posts');
