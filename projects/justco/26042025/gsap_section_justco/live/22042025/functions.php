<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '5.5.15' );
}


if ( ! function_exists( 'jc_tbo_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jc_tbo_theme_setup() {
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

        function jc_tbo_scripts() {
            wp_enqueue_style( 'jc_tbo-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'jc_tbo-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jc_tbo-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jc_tbo-font-style', get_template_directory_uri() . '/assets/fonts/global/stylesheet.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jc_tbo-select2_style', get_template_directory_uri() . '/assets/css/select2/select2.min.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'jc_tbo-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'jc_tbo-swiper-style', get_template_directory_uri() . '/assets/css/owl/swiper.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'jc_tbo-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jc_tbo-gsap-sections-style', get_template_directory_uri() . '/assets/css/gsap/gsap_sections.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'jc_tbo-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'jc_tbo-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jc_tbo-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jc_tbo-select2-script', get_template_directory_uri() . '/assets/js/select2/select2.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'jc_tbo-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'jc_tbo-swiper-script', get_template_directory_uri() . '/assets/js/owl/swiper.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'jc_tbo-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jc_tbo-theme-gsap-script', get_template_directory_uri() . '/assets/js/gsap/gsap.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jc_tbo-theme-gsap-scrolltrigger-script', get_template_directory_uri() . '/assets/js/gsap/ScrollTrigger.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jc_tbo-theme-gsap-init', get_template_directory_uri() . '/assets/js/gsap/gsap-init.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'jc_tbo-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );

        }
        add_action( 'wp_enqueue_scripts', 'jc_tbo_scripts' );
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'jc_tbo' ),
			'footer'  => __( 'Footer Menu', 'jc_tbo' ),
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

        /* ------ Register Shortcode ------ */
        require get_template_directory() . '/inc/theme/shortcode.php';
        
        /* ------ Register Custom Post Type ------ */
        require get_template_directory() . '/inc/theme/custom_posttype.php';
        
        
        // Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
        //add_filter('wpcf7_autop_or_not', '__return_false');
 
	}
endif;
add_action( 'after_setup_theme', 'jc_tbo_theme_setup' );


//Customizer css disable
// add_action( 'customize_register', 'remove_customizer_additional_css', 999 );
// function remove_customizer_additional_css( $wp_customize ) {
//     $wp_customize->remove_section( 'custom_css' );
// }

function connect_another_db(){
    global $seconddb;
    $seconddb = new wpdb(CRM_USERNAME, CRM_PASSWORD, CRM_DATABASE_NAME, CRM_HOSTNAME);
}
add_action('init', 'connect_another_db');

function tbo_workspace_team(){
	
    include 'inc/sc/custom_location_filter.php';

    die();
}
add_action('wp_ajax_tbo_workspace_team', 'tbo_workspace_team');
add_action('wp_ajax_nopriv_tbo_workspace_team', 'tbo_workspace_team');

add_shortcode( 'contact_form_shortcode', 'contact_form_func' );
function contact_form_func() {
	require get_template_directory() . '/inc/sc/custom_contact_form.php';
}

//theboaringoffice enquiry form submission
function tbo_landing_page_submission(){
    parse_str($_POST['records'], $_POST);
    include 'inc/sc/center_web_enquiry_enteries.php';
    die();
}
add_action('wp_ajax_tbo_landing_page_submission', 'tbo_landing_page_submission');
add_action('wp_ajax_nopriv_tbo_landing_page_submission', 'tbo_landing_page_submission');


// Shortcode registration
include 'inc/shortcodes_register.php';