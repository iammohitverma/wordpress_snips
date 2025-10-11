<?php

function register_product_tabs_post_type()
{
    $labels = array(
        'name' => 'Product Tabs',
        'singular_name' => 'Product Tab',
        'add_new' => 'Add New Tab',
        'add_new_item' => 'Add New Product Tab',
        'edit_item' => 'Edit Product Tab',
        'new_item' => 'New Product Tab',
        'view_item' => 'View Product Tab',
        'search_items' => 'Search Product Tabs',
        'not_found' => 'No Product Tabs found',
        'menu_name' => 'Product Tabs'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-screenoptions',
    );

    register_post_type('product_tabs', $args);
}
add_action('init', 'register_product_tabs_post_type');


function product_tab_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'id' => '',
    ), $atts, 'product_tab');

    $post_id = $atts['id'];
    if (!$post_id)
        return '';

    $post = get_post($post_id);
    if (!$post)
        return '';

    // WPBakery content render
    return apply_filters('the_content', $post->post_content);
}
add_shortcode('product_tab', 'product_tab_shortcode');


// Add new column
function add_product_tab_shortcode_column($columns)
{
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}
add_filter('manage_product_tabs_posts_columns', 'add_product_tab_shortcode_column');


// Show shortcode with click-to-copy feature
function show_product_tab_shortcode_column($column, $post_id)
{
    if ($column == 'shortcode') {
        $shortcode = '[product_tab id="' . $post_id . '"]';
        echo '<code style="background:#f3f3f3;padding:3px 6px;border-radius:4px;">' . esc_html($shortcode) . '</code>';
        echo ' <button class="button button-small copy-shortcode" data-shortcode="' . esc_attr($shortcode) . '">📋 Copy</button>';
        echo '<span class="copied-text" style="display:none;color:green;margin-left:5px;">Copied!</span>';

    }
}
add_action('manage_product_tabs_posts_custom_column', 'show_product_tab_shortcode_column', 10, 2);



// Enqueue admin script for copy functionality
function enqueue_copy_shortcode_script()
{
    $screen = get_current_screen();

    // Only load on Product Tabs list page
    if ($screen && $screen->post_type === 'product_tabs' && $screen->base === 'edit') {
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.copy-shortcode').forEach(function (el) {
                    el.addEventListener('click', function (e) {
                        e.preventDefault();
                        const shortcode = this.dataset.shortcode;

                        // ✅ Try modern Clipboard API first
                        if (navigator.clipboard && navigator.clipboard.writeText) {
                            navigator.clipboard.writeText(shortcode).then(() => showCopied(this));
                        } else {
                            // ✅ Fallback method for older browsers/admin contexts
                            const temp = document.createElement('textarea');
                            temp.value = shortcode;
                            document.body.appendChild(temp);
                            temp.select();
                            try {
                                document.execCommand('copy');
                                showCopied(this);
                            } catch (err) {
                                alert('Copy failed. Please copy manually.');
                            }
                            document.body.removeChild(temp);
                        }
                    });
                });

                function showCopied(el) {
                    const msg = el.nextElementSibling;
                    msg.style.display = 'inline';
                    setTimeout(() => msg.style.display = 'none', 1500);
                }
            });
        </script>
        <?php
    }
}
add_action('admin_footer', 'enqueue_copy_shortcode_script');