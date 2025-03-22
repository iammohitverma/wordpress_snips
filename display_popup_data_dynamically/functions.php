<?php
function enqueue_popup_script() {
    wp_enqueue_script('popup-script', get_template_directory_uri() . '/js/popup.js', array('jquery'), null, true);

    // AJAX URL ko JS me pass karna
    wp_localize_script('popup-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_popup_script');




function fetch_post_details() {
    if (isset($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']);
        $post = get_post($post_id);
        
        if ($post) {
            $response = array(
                'title'   => $post->post_title,
                'content' => apply_filters('the_content', $post->post_content),
            );
            echo json_encode($response);
        }
    }
    wp_die();
}
add_action('wp_ajax_fetch_post_details', 'fetch_post_details');
add_action('wp_ajax_nopriv_fetch_post_details', 'fetch_post_details');
