<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}


if ( ! function_exists( 'projectx_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function projectx_theme_setup() {
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

        function projectx_scripts() {
            // check if woocommerce is activated in website start
            $ifWooActivate = false;
            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $ifWooActivate = true;
            } else {
                $ifWooActivate = false;
            }
            // check if woocommerce is activated in website end

            wp_enqueue_style( 'projectx-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'projectx-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'projectx-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'projectx-font-aspekta', get_template_directory_uri() . '/assets/fonts/aspekta/stylesheet.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            // wp_enqueue_style( 'projectx-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'projectx-swiper-style', get_template_directory_uri() . '/assets/css/swiper/swiper.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'projectx-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            if($ifWooActivate){
                wp_enqueue_style( 'projectx-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce/style.css',false, _JN_VERSION,'all');
            }
            wp_enqueue_style( 'projectx-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'projectx-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'projectx-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            // wp_enqueue_script( 'projectx-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'projectx-swiper-script', get_template_directory_uri() . '/assets/js/swiper/swiper_bundle.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'projectx-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'projectx-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );

        }
        add_action( 'wp_enqueue_scripts', 'projectx_scripts' );
   
        
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

        /* ------ Allow SVG ------ */
        require get_template_directory() . '/inc/theme/allow_svg.php';
        
        
        // Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
        //add_filter('wpcf7_autop_or_not', '__return_false');
 
	}
endif;
add_action( 'after_setup_theme', 'projectx_theme_setup' );


// add_action( 'after_setup_theme', 'enable_woocommerce_support' );

// function enable_woocommerce_support() {
// 	add_theme_support( 'woocommerce' );
// }


function sticky_logo_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'sticky_logo' ); // Add setting for logo uploader
         
    // Add control for logo uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sticky_logo', array(
        'label'    => __( 'Sticky Logo', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'sticky_logo',
    ) ) );
}
add_action( 'customize_register', 'sticky_logo_customize_register' );
get_theme_mod( 'sticky_logo' );