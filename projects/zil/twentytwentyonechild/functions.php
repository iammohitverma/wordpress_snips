<?php

// ---------------------------------------------
// Include PHP files from the /inc directory
// ---------------------------------------------

// Enqueue styles and scripts (assumed defined in inc/enqueue-files.php)
require_once get_stylesheet_directory() . '/inc/theme/enqueue_files.php';

/* ------ Admin Login Page Design ------ */
require_once get_stylesheet_directory() . '/inc/theme/login_p_design.php';

/* ------ Revert To Classic Editor & Classic Widgets ------ */
require get_stylesheet_directory() . '/inc/theme/c_editor_c_widgets.php';

// Register custom menus (assumed defined in inc/menus.php)
require_once get_stylesheet_directory() . '/inc/theme/menus.php';

/* ------ Register Customizer ------ */
require get_stylesheet_directory() . '/inc/theme/customizer/customizer.php';

// Register widget areas (assumed defined in inc/widgets.php)
require_once get_stylesheet_directory() . '/inc/theme/widgets.php';

/* ------ Allow SVG ------ */
require get_stylesheet_directory() . '/inc/theme/allow_svg.php';

/* ------ Custom Shortcodes Register ------ */
require get_stylesheet_directory() . '/inc/theme/shortcodes_register.php';

/* ------ For Contact Form 7 ------ */
require get_stylesheet_directory() . '/inc/theme/cf7_customize.php';


// add_action( 'after_setup_theme', 'enable_woocommerce_support' );

// function enable_woocommerce_support() {
// 	add_theme_support( 'woocommerce' );
// }