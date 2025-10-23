<?php

// -----------------------------
// Remove Parent Theme Styles
// -----------------------------

// Dequeue and deregister the parent theme's main stylesheet
function dequeue_twentytwentyone_parent_style()
{
    wp_dequeue_style('twenty-twenty-one-style'); // Remove Twenty Twenty-One main style
    wp_deregister_style('twenty-twenty-one-style'); // Unregister the style completely
}
add_action('wp_enqueue_scripts', 'dequeue_twentytwentyone_parent_style', 20); // Run after parent styles are added

// -----------------------------
// Enqueue Child Theme Styles & Scripts
// -----------------------------
function twentytwentyone_child_scripts() {
    // Set a dynamic version using the current timestamp
    $version = time(); // This changes every page load

      // check if woocommerce is activated in website start
    $ifWooActivate = false;
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        $ifWooActivate = true;
    } else {
        $ifWooActivate = false;
    }
    // check if woocommerce is activated in website end

    if ($ifWooActivate) {
        wp_enqueue_style('jagsness-woocommerce-style', get_stylesheet_directory_uri() . '/assets/woocommerce/style.css', false, _JN_VERSION, 'all');
    }


    // Optional: Dequeue additional parent theme styles
    wp_dequeue_style('twentytwentyone-block-style');
    wp_dequeue_style('twentytwentyone-print-style');

    // Main child theme style
    wp_enqueue_style('child-style', get_stylesheet_uri(), array(), $version);

    // Fonts
    wp_enqueue_style('font-forum-style', get_stylesheet_directory_uri() . '/assets/fonts/forum/stylesheet.css', array(), $version);
    wp_enqueue_style('font-dmsans-style', get_stylesheet_directory_uri() . '/assets/fonts/dm_sans/stylesheet.css', array(), $version);

    // Bootstrap
    wp_enqueue_style('bootstrap-5.3.7-style', get_stylesheet_directory_uri() . '/assets/bootstrap-5.3.7-dist/css/bootstrap.min.css', array(), $version);

    // Font Awesome
    wp_enqueue_style('fontawesome-free-7.0.0-style', get_stylesheet_directory_uri() . '/assets/fontawesome-free-7.0.0-web/css/all.min.css', array(), $version);

    // Owl Carousel
    wp_enqueue_style('OwlCarousel2-2.3.4-style', get_stylesheet_directory_uri() . '/assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css', array(), $version);
    wp_enqueue_style('OwlCarousel2-2.3.4-theme-style', get_stylesheet_directory_uri() . '/assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css', array(), $version);

    // Theme base CSS
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme-style.css', array(), $version);

    // JS Scripts
    wp_enqueue_script('jquery-3_7_1-script', get_stylesheet_directory_uri() . '/assets/js/jquery-3.7.1.min.js', array(), $version, true);
    wp_enqueue_script('bootstrap-5.3.7-script', get_stylesheet_directory_uri() . '/assets/bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js', array(), $version, true);
    wp_enqueue_script('OwlCarousel2-2.3.4-script', get_stylesheet_directory_uri() . '/assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js', array(), $version, true);
//     wp_enqueue_script('chart-js-script', get_stylesheet_directory_uri() . '/assets/js/chart.min.js', array(), $version, true);
//     wp_enqueue_script('chart-js-labels-script', get_stylesheet_directory_uri() . '/assets/js/chartjs-plugin-datalabels@2.js', array(), $version, true);
	if ( is_front_page() ) { // This checks if it's the homepage
        wp_enqueue_script('chart-js-script', get_stylesheet_directory_uri() . '/assets/js/chart.min.js', array(), $version, true);
        wp_enqueue_script('chart-js-labels-script', get_stylesheet_directory_uri() . '/assets/js/chartjs-plugin-datalabels@2.js', array(), $version, true);
    }
    wp_enqueue_script('masonry-grid-script', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.js', array(), $version, true);
    wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() . '/assets/js/theme-script.js', array(), $version, true);
}
add_action('wp_enqueue_scripts', 'twentytwentyone_child_scripts'); // Enqueue all assets
