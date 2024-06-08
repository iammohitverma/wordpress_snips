<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'fasd_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fasd_theme_setup() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// Logo support
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => false, 
        );

        add_theme_support( 'custom-logo', $defaults );

        /**
         * Enqueue scripts and styles.
         */

        function fasd_scripts() {
            wp_enqueue_style( 'fasd-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'fasd-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'fasd-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'fasd-rubikt-font-style', get_template_directory_uri() . '/assets/fonts/rubik/stylesheet.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'fasd-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'fasd-swiper-style', get_template_directory_uri() . '/assets/css/owl/swiper.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'fasd-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'fasd-chosen-style', get_template_directory_uri() . '/assets/chosen/chosen.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'fasd-scss-theme-style', get_template_directory_uri() . '/assets/scss/theme-style.css',false, _JN_VERSION,'all');

            
            wp_enqueue_style( 'fasd-custom-theme-style', get_template_directory_uri() . '/assets/css/custom-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'fasd-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'fasd-chosen-script', get_template_directory_uri() . '/assets/chosen/chosen.jquery.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'fasd-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'fasd-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'fasd-swiper-script', get_template_directory_uri() . '/assets/js/owl/swiper.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'fasd-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'fasd-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );

        }
        add_action( 'wp_enqueue_scripts', 'fasd_scripts' );
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'fasd' ),
			'footer'  => __( 'Footer Menu', 'fasd' ),
		) ); */
        
        
        /* ------ Admin Login Page Design ------ */
        require get_template_directory() . '/inc/theme/login_p_design.php';

        /* ------ Revert To Classic Editor & Classic Widgets ------ */
        require get_template_directory() . '/inc/theme/c_editor_c_widgets.php';

        /* ------ Register Custom Menus ------ */
        require get_template_directory() . '/inc/theme/menus.php';

        /* ------ Register Customizer ------ */
        require get_template_directory() . '/inc/theme/customizer.php';

        /* ------ Register Widgets ------ */
        require get_template_directory() . '/inc/theme/widgets.php';
        
        
        // Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
        //add_filter('wpcf7_autop_or_not', '__return_false');
 
	}

    function klf_acf_input_admin_footer() { ?>

        <script type="text/javascript">
        (function($) {
        
        acf.add_filter('color_picker_args', function( args, $field ){
        
        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#005E7E', '#BF4846','#4F75AD', '#4AABDE', '#295576','#292929','#6D6D6D','#EEF0E7']
        
        // return colors
        return args;
        
        });
        
        })(jQuery);
        </script>
        
        <?php }
        
        add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');
endif;
add_action( 'after_setup_theme', 'fasd_theme_setup' );

// Register tags in video hub cpt
function reg_tag() {
    register_taxonomy_for_object_type('post_tag', 'hubvideo');
}
add_action('init', 'reg_tag');




// Shortcode for News & Events
function news_events_posts_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/news_events_posts', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'news_events_posts', 'news_events_posts_func' );


// Shortcode for Resources
function resources_posts_with_filter_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/resources_posts_with_filter', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'resources_posts_with_filter', 'resources_posts_with_filter_func' );


// Shortcode for Service Directory
function Service_Directory_content_showing( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/service_directory_shortcode', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'Service_Directory_content', 'Service_Directory_content_showing' );


// Shortcode for Advisory Group Governance Page:-
function Advisory_group_teams_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/Advisory_group_teams_posts', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'Advisory_group_teams', 'Advisory_group_teams_func' );


// Shortcode for Register For FASD service directory:-
function Register_for_service_directory_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/Register_for_service_directory_form', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'Register_for_service_directory', 'Register_for_service_directory_func' );



// Resources filter query
require get_template_directory() . '/inc/query/resource_filter.php';


function service_directory_post_creation()
{
    include 'inc/query/service_directory_post.php';
    die();
}
add_action('wp_ajax_service_directory_post_creation', 'service_directory_post_creation');
add_action('wp_ajax_nopriv_service_directory_post_creation', 'service_directory_post_creation');

// Shortcode for Video-Hub
function video_hub_post_with_filter_func( $atts ) {
    $attributes = shortcode_atts( array(
        'limit' => 4
    ), $atts );

    ob_start();

    // include template with the arguments
    get_template_part( 'inc/shortcodes/video_hub_post_with_filter', null, array('attributes' => $attributes) );

    return ob_get_clean();
}
add_shortcode( 'video_hub_post_with_filter', 'video_hub_post_with_filter_func' );

// Video-hub filter query
require get_template_directory() . '/inc/query/videos_hub_filter.php';







// admin_enqueue_scripts
function my_admin_enqueue_scripts() {

    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );

    // Enqueue jQuery from Google CDN
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true);
   // Enqueue your JavaScript file
   wp_enqueue_script('custom-admin-script', get_template_directory_uri() . '/assets/js/custom-admin-script.js', array('jquery'), '1.0', true);
   
}
add_action('admin_enqueue_scripts', 'my_admin_enqueue_scripts');


