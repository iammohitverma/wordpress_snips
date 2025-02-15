<?php
// Hook into 'widgets_init' to register the widget
add_action('widgets_init', 'register_custom_post_widget');

// Register the widget
function register_custom_post_widget() {
    // Register the widget display
    wp_register_sidebar_widget(
        'custom_post_widget', // Widget ID
        __('Custom Post Widget', 'text_domain'), // Widget name
        'display_custom_post_widget', // Callback to display the widget
        array('description' => __('Displays a selected post from the product_tab post type.', 'text_domain')) // Widget description
    );

    // Register the widget control
    wp_register_widget_control(
        'custom_post_widget', // Widget ID
        __('Custom Post Widget', 'text_domain'), // Widget name
        'custom_post_widget_control' // Callback for the widget control form
    );
}

// Widget display logic
function display_custom_post_widget($args) {
    extract($args);

    // Retrieve the selected post ID from the options
    $selected_post = get_option('custom_post_widget_selected_post');

    echo $before_widget;

    if ($selected_post) {
        $post = get_post($selected_post);
        if ($post) {
            echo apply_filters('the_content', $post->post_content);
        }
    } else {
        echo '<p>No post selected.</p>';
    }

    echo $after_widget;
}

// Widget control form
function custom_post_widget_control() {
    // Retrieve the selected post ID from the options
    $selected_post = get_option('custom_post_widget_selected_post');

    // Get all posts of 'product_tab' post type
    $posts = get_posts(array(
        'post_type'      => 'product_tab',
        'posts_per_page' => -1, // Get all posts
    ));

    // Check if the form is submitted
    if (isset($_POST['custom_post_widget_selected_post'])) {
        $selected_post = intval($_POST['custom_post_widget_selected_post']);
        update_option('custom_post_widget_selected_post', $selected_post);
    }

    ?>
    <p>
        <label for="custom_post_widget_selected_post">Select Post:</label>
        <select class="widefat" id="custom_post_widget_selected_post" name="custom_post_widget_selected_post">
            <option value="">-- Select Post --</option>
            <?php foreach ($posts as $post): ?>
                <option value="<?php echo esc_attr($post->ID); ?>" 
                    <?php selected($selected_post, $post->ID); ?>>
                    <?php echo esc_html($post->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php
}