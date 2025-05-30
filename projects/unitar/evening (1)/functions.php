<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.1' );
}

if ( ! function_exists( 'NFDA_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function NFDA_theme_setup() {
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

        function NFDA_scripts() {
            // check if woocommerce is activated in website start
            $ifWooActivate = false;
            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $ifWooActivate = true;
            } else {
                $ifWooActivate = false;
            }
            wp_enqueue_style( 'NFDA-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'NFDA-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'NFDA-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'NFDA-font-style', get_template_directory_uri() . '/assets/fonts/Reo_Sans/stylesheet.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'NFDA-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'NFDA-swiper-style', get_template_directory_uri() . '/assets/css/owl/swiper.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'NFDA-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            if($ifWooActivate){
                wp_enqueue_style( 'jagsness-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce/style.css',false, _JN_VERSION,'all');
            }
            wp_enqueue_style( 'NFDA-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'NFDA-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'NFDA-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'NFDA-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'NFDA-swiper-script', get_template_directory_uri() . '/assets/js/owl/swiper.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'NFDA-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'NFDA-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );


            // wp_dequeue_style('forminator-stripe-css'); // Dequeue default Stripe styles
            // wp_enqueue_style('custom-forminator-stripe', get_stylesheet_directory_uri() . '/css/custom-forminator-stripe.css');

        }
        add_action( 'wp_enqueue_scripts', 'NFDA_scripts' );
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'NFDA' ),
			'footer'  => __( 'Footer Menu', 'NFDA' ),
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

        // Allow SVG
        add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

            global $wp_version;
            if ( $wp_version !== '4.7.1' ) {
            return $data;
            }
        
            $filetype = wp_check_filetype( $filename, $mimes );
        
            return [
                'ext'             => $filetype['ext'],
                'type'            => $filetype['type'],
                'proper_filename' => $data['proper_filename']
            ];
        
        }, 10, 4 );
        
        function cc_mime_types( $mimes ){
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        }
        add_filter( 'upload_mimes', 'cc_mime_types' );
        
        function fix_svg() {
            echo '<style type="text/css">
                .attachment-266x266, .thumbnail img {
                    width: 100% !important;
                    height: auto !important;
                }
                </style>';
        }
        add_action( 'admin_head', 'fix_svg' );

        // shortcode on award sticker page:-
        function create_entry_charge_table( $atts ) {
            $attributes = shortcode_atts( array(
                'title' => false,
                'limit' => 4,
            ), $atts );
            
            ob_start();
        
            // include template with the arguments (The $args parameter was added in v5.5.0)
            get_template_part( '\inc\theme\shortcode\table', null, $attributes );
        
            return ob_get_clean();
        
        }
        add_shortcode( 'table_shortcode', 'create_entry_charge_table' );
  
	}
endif;
add_action( 'after_setup_theme', 'NFDA_theme_setup' );

// Clear cached appearance settings to ensure updates take effect
delete_transient( 'wc_stripe_appearance' );
delete_transient( 'wc_stripe_blocks_appearance' );


add_filter('wc_stripe_get_element_options', function ($options) {
    $options['appearance'] = (object) [
        'fonts' => [
            (object) [
                'family' => 'Reo Sans',
                'cssSrc' => 'https://cdn.jsdelivr.net/gh/chauhan07/snipshot/Reo_Sans/stylesheet-reo.css?ver=1.0.0',
                'style' => 'normal'
            ]
        ],
        'variables' => (object) [
            'fontFamily' => 'Reo Sans',
        ],
        'rules' => (object) [
            '.Label' => (object) [
                'fontFamily' => 'Reo Sans',
                'fontSize' => '20px',
                'fontWeight' => '400',
                'color' => 'black'
            ]
        ]
    ];
    return $options;
});

// Stripe form font family
add_filter('forminator_field_stripe_markup', function ($markup, $attr) {
    if (!empty($attr['data-elements-options'])) {
        $data_options = json_decode($attr['data-elements-options'], true);
        // Ensure 'fonts' array exists
        if (!isset($data_options['appearance']['fonts'])) {
            $data_options['appearance']['fonts'] = [];
        }
        // Add custom font
        $data_options['fonts'] = [
            [
               'family' => 'Reo Sans',
               'cssSrc' => 'https://cdn.jsdelivr.net/gh/chauhan07/snipshot/Reo_Sans/stylesheet-reo.css?ver=1.0.0',
               'style' => 'normal'
            ]
        ];
        $data_options['appearance']['variables'] = array_merge($data_options['appearance']['variables'], [
            "fontSizeBase" => "18px",
            "fontFamily" => "Reo Sans",
            "fontWeightNormal" => "600" 
        ]);
        $updated_options = esc_attr(json_encode($data_options));
        $markup = preg_replace('/data-elements-options=[\'"][^\'"]+[\'"]/', 'data-elements-options=\'' . $updated_options . '\'', $markup);
    }
    return $markup;
}, 10, 2);





// Quantity set on repeater field by mohit
// 798 local testing form 
// 802 live /product-award
// 802 live /enter-the-retail-and-product-awards
add_action( 'wp_footer', 'wpmudev_group_repeater_count', 9999 );
function wpmudev_group_repeater_count() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
        let timeout;  // Variable to store the timeout ID
		setTimeout(function() {
			$('.forminator-custom-form').trigger('after.load.forminator');
		},100);
		
        function updateParticipantCount() {
            var participant_count = $('.forminator-grouped-fields').length;
            $('.productCount input').val(participant_count).trigger('change');
            $('#calculation-2 input').trigger('change');
        }

        
		$(document).on('after.load.forminator', function(e, form_id) {
			if ( e.target.id == 'forminator-module-802' ) { // Please change the form ID.
                $(document).on('forminator:recalculate', function() {
                    clearTimeout(timeout);  // Clear the previous timeout
                    timeout = setTimeout(updateParticipantCount, 300);  // Wait 300ms before updating
                });
                $(document).on('forminator:field:condition:toggled', function() {
                    clearTimeout(timeout);  // Clear the previous timeout
                    timeout = setTimeout(updateParticipantCount, 300);  // Wait 300ms before updating
                });
			}
		});
	});
	</script>
	<?php
}


// hooks to create users
// 881 for local testing
// 802 for live product
add_filter('forminator_custom_form_submit_field_data', 'create_user_and_set_user_id_in_hidden_field', 10, 2);
function create_user_and_set_user_id_in_hidden_field($field_data_array, $form_id) {
    if ($form_id == 802) {
        $username = $email = $password = '';
        foreach ($field_data_array as $field) {
            if ($field['name'] == 'name-1') $username = sanitize_text_field($field['value']);
            if ($field['name'] == 'email-1') $email = sanitize_email($field['value']);
            if ($field['name'] == 'phone-1') $password = sanitize_text_field($field['value']);
        }
        
        if (!email_exists($email)) {
            $user_id = wp_create_user($username, $password, $email);
            if (!is_wp_error($user_id)) {
                (new WP_User($user_id))->set_role('subscriber');
            }
        } else {
            $user = get_user_by( 'email', $email );
            $user_id = $user->ID;
        }
        foreach ($field_data_array as $key => $field) {
            if ($field['name'] == 'hidden-1') {
                $field_data_array[$key]['value'] = $user_id; // Set the actual user ID
            }
        }
    }
    return $field_data_array;
}




// Send only Product Name and Product Type from repeater field
// add_filter( 'forminator_custom_form_mail_message', function( $message, $form_id, $data ) {
//     if ( $form_id !== 2312 ) { // Replace with your actual form ID
//         return $message;
//     }

//     $formatted_repeater_data = '';

//     // Loop through submitted data
//     foreach ($data as $field => $value) {
//         if (is_array($value)) { // Check if it's a repeater field
//             $formatted_repeater_data .= "<strong>$field:</strong><br>";
//             foreach ($value as $index => $sub_value) {
//                 $formatted_repeater_data .= "Instance " . ($index + 1) . ": " . implode(", ", $sub_value) . "<br>";
//             }
//         }
//     }

//     // Replace a placeholder in the email template
//     $message = str_replace('{group-1}', $formatted_repeater_data, $message);
    
//     return $message;
// }, 10, 3);


/* Forminator Hook after form submit starts here */

add_action ( 'forminator_form_after_handle_submit', 'send_email_after_form_submission', 10, 2 );
add_action( 'forminator_form_after_save_entry', 'send_email_after_form_submission', 10, 2 ); 
function send_email_after_form_submission( $form_id, $response ) {
    if ( $response && is_array( $response ) ) {
         if ( $response['success'] ) { 
            if ( $form_id == 802 ) { 
                include('forminator/send_entry_email.php');
            }
        } 
    } 
}
/* Forminator Hook after form submit ends here */