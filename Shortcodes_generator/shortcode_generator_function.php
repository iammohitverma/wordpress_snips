<?php

// 🔹 Admin panel me Shortcodes CPT ke liye Shortcode ka column add karna
function add_shortcode_column($columns) {
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}
add_filter('manage_shortcodes_posts_columns', 'add_shortcode_column');

// 🔹 Column me Shortcode show karna aur Copy button add karna
function show_shortcode_column($column, $post_id) {
    if ($column === 'shortcode') {
        $shortcode = '[aiken_products_tab id="' . $post_id . '"]';
        echo '<input type="text" value="' . esc_attr($shortcode) . '" id="shortcode_' . $post_id . '" readonly>';
        echo '<button class="copy-shortcode" data-id="' . $post_id . '">📋 Copy</button>';
    }
}
add_action('manage_shortcodes_posts_custom_column', 'show_shortcode_column', 10, 2);

// 🔹 Shortcode jo post ka content return karega
function custom_show_post_content($atts) {
    $post_id = isset($atts['id']) ? intval($atts['id']) : 0;
    if (!$post_id) {
        return 'Invalid Post ID.';
    }

    $post = get_post($post_id);
    if (!$post || get_post_type($post_id) !== 'shortcodes') {
        return 'Post not found!';
    }

    return apply_filters('the_content', $post->post_content);
}
add_shortcode('aiken_products_tab', 'custom_show_post_content');

// 🔹 Admin panel me JavaScript add karna jo copy function handle karega
function add_admin_copy_script() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.copy-shortcode').forEach(button => {
                button.addEventListener('click', function () {
                    let postId = this.getAttribute('data-id');
                    let inputField = document.getElementById('shortcode_' + postId);
                    
                    inputField.select();
                    document.execCommand('copy');

                    this.textContent = '✅ Copied!';
                    setTimeout(() => this.textContent = '📋 Copy', 2000);
                });
            });
        });
    </script>
    <style>
        .copy-shortcode {
            background: #007cba;
            color: white;
            border: none;
            padding: 4px 8px;
            margin-left: 5px;
            cursor: pointer;
            border-radius: 3px;
        }
        .copy-shortcode:hover {
            background: #005a9e;
        }
        input[readonly] {
            width: 200px;
            border: 1px solid #ddd;
            padding: 4px;
        }
    </style>
    <?php
}
add_action('admin_footer', 'add_admin_copy_script');

