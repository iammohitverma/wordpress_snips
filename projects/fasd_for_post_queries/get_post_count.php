<?php
$post_type = 'resource';

$post_count = wp_count_posts($post_type);

echo 'Total ' . $post_type . ' count: ' . $post_count->publish;
?>
