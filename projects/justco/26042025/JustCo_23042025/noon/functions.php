<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
    $rand = rand(1,100001);
    define('_JN_VERSION', '1.2.' . $rand);
	// define( '_JN_VERSION', '1.313.77' );
}

if ( ! function_exists( 'janusjustco_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function janusjustco_theme_setup() {
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

        function janusjustco_scripts() {
            /*************************/
            /*************************/
            /*************************/
            // css js for TBO
            /*************************/
            /*************************/
            /*************************/
            wp_enqueue_style('tbo-fonts-style', get_template_directory_uri() . '/assets/the-boring-office/fonts/stylesheet.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('tbo-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('tbo-swiper-style', get_template_directory_uri() . '/assets/the-boring-office/css/swiper/swiper.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('tbo-password-protected-form_style', get_template_directory_uri() . '/assets/the-boring-office/css/password_protected_form_style.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('tbo-style', get_template_directory_uri() . '/assets/the-boring-office/css/tbo_style.css', false, _JN_VERSION, 'all');

            // scripts
            wp_enqueue_script('tbo-swiper-scripts', get_template_directory_uri() . '/assets/the-boring-office/js/swiper/swiper_bundle.min.js', array(), _JN_VERSION, true);
            wp_enqueue_script('tbo-scripts', get_template_directory_uri() . '/assets/the-boring-office/js/tbo_scripts.js', array(), _JN_VERSION, true);

            // Check if the current page is using the 'TBO' template
            $template = get_page_template_slug();  // Get the current page template name

            if ($template === 'templates/tbo_template.php') { // Check if it matches the TBO template
                // If it's the TBO template, stop loading any styles and scripts
                return;
            }

            /*************************/
            /*************************/
            /*************************/
            // css js for main justCo
            /*************************/
            /*************************/
            /*************************/
            wp_enqueue_style('justco-style', get_stylesheet_uri(), array(), _JN_VERSION);
            wp_enqueue_style('justco-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-openSans-style', get_template_directory_uri() . '/assets/fonts/open-sans/stylesheet.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-avenir-style', get_template_directory_uri() . '/assets/fonts/avenir/stylesheet.css', false, _JN_VERSION, 'all');
            // owl and slick both are linked use one of them at once 
            wp_enqueue_style('justco-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css', false, _JN_VERSION, 'all');
            // wp_enqueue_style('justco-slick-style', get_template_directory_uri() . '/assets/css/slick/slick-1.8.1.min.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-select2-style', get_template_directory_uri() . '/assets/css/select2/select2.min.css', false, _JN_VERSION, 'all');

            wp_enqueue_style('justco-theme-style-old', get_template_directory_uri() . '/assets/css/theme-style-old.css', false, _JN_VERSION, 'all');
            wp_enqueue_style('justco-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css', false, _JN_VERSION, 'all');


            wp_enqueue_script('justco-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true);
            wp_enqueue_script('justco-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true);

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script('justco-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true);
            // wp_enqueue_script('justco-slick-script', get_template_directory_uri() . '/assets/js/slick/slick-1.8.1.js', array(), _JN_VERSION, true);
            wp_enqueue_script('justco-select2-script', get_template_directory_uri() . '/assets/js/select2/select2.min.js', array(), _JN_VERSION, true);

            wp_enqueue_script('justco-latest-map-script', get_template_directory_uri() . '/assets/js/latest-map.js', array(), _JN_VERSION, false);
            wp_enqueue_script('justco-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true);


            //	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            //		wp_enqueue_script( 'comment-reply' );
            //	}

        }
        add_action( 'wp_enqueue_scripts', 'janusjustco_scripts' );

        function register_TM_menu()
        {

            // header menus
            register_nav_menu('sg_header-menu_latest', __('sg_latest_top_menu'));
            register_nav_menu('au_header-menu_latest', __('au_latest_top_menu'));
            register_nav_menu('jp_header-menu_latest', __('jp_latest_top_menu'));
            register_nav_menu('jp_en_header-menu_latest', __('jp_en_latest_top_menu'));
            register_nav_menu('kr_header-menu_latest', __('kr_latest_top_menu'));
            register_nav_menu('kr_en_header-menu_latest', __('kr_en_latest_top_menu'));
            register_nav_menu('tw_header-menu_latest', __('tw_latest_top_menu'));
            register_nav_menu('tw_en_header-menu_latest', __('tw_en_latest_top_menu'));
            register_nav_menu('th_header-menu_latest', __('th_latest_top_menu'));
            register_nav_menu('th_en_header-menu_latest', __('th_en_latest_top_menu'));


            // footer menu
            register_nav_menu('sg_footer-menu', __('sg_footer_menu'));
            register_nav_menu('au_footer-menu', __('au_footer_menu'));
            register_nav_menu('jp_footer-menu', __('jp_footer_menu'));
            register_nav_menu('jp_en_footer-menu', __('jp_en_footer_menu'));
            register_nav_menu('kr_footer-menu', __('kr_footer_menu'));
            register_nav_menu('kr_en_footer-menu', __('kr_en_footer_menu'));
            register_nav_menu('tw_footer-menu', __('tw_footer_menu'));
            register_nav_menu('tw_en_footer-menu', __('tw_en_footer_menu'));
            register_nav_menu('th_footer-menu', __('th_footer_menu'));
            register_nav_menu('th_en_footer-menu', __('th_en_footer_menu'));
            
        }

        add_action('init', 'register_TM_menu');

        function talk_to_us_form_sc(){
            ob_start();
            include 'inc/justco-cf/talk-to-us.php';
            return ob_get_clean();
        } 
        add_shortcode('TalkToUsForm', 'talk_to_us_form_sc');

        function center_post_city(){
            include 'inc/justco-cf/center_citylisting.php';
            wp_die();
        }
        add_action('wp_ajax_nopriv_center_post_city', 'center_post_city');
        add_action('wp_ajax_center_post_city', 'center_post_city');
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'janusjustco' ),
			'footer'  => __( 'Footer Menu', 'janusjustco' ),
		) ); */
        

function customize_get_in_touch_shortcode() {
    ob_start();
    include 'inc/justco-cf/get_in_touch_customizeoffice.php';
    return ob_get_clean();
}
add_shortcode('customizegetintouch', 'customize_get_in_touch_shortcode');



/* Business Referral Form shortcode */


function business_referral_form_shortcode() {
    ob_start();
    include 'inc/justco-cf/business_referral_form.php';
    return ob_get_clean();
}
add_shortcode('businessreferral', 'business_referral_form_shortcode');


        /**
         * customizer
         */
        require get_template_directory() . '/inc/customizer.php';
        
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
 
        // latest header country lang
        require get_template_directory() . '/inc/sc/latest_header_lang.php';
        
        require 'inc/custom_posts.php';
	}
endif;
add_action( 'after_setup_theme', 'janusjustco_theme_setup' );




// added by mv for header
// add caret for submenus
function janusjustco_menu_arrow($item_output, $item, $depth, $args)
{
    if (in_array('menu-item-has-children', $item->classes)) {
        $arrow = '<button class="subMenuAngle"></button>'; // Change the class to your font icon
        $item_output = str_replace('</a>', '</a>' . $arrow . '', $item_output);
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'janusjustco_menu_arrow', 10, 4);







// latest-post-tabs-sc
// require get_template_directory() . '/inc/sc/latest_post_tabs_sc.php';

// In functions.php (you can create separate file for creating shortcodes) start
function justco_post_tabs_shortcode_func($atts)
{
    $attributes = shortcode_atts(array(
        'enablelatestmap' => 'yes',
    ), $atts);

    ob_start();

    get_template_part('inc/sc/latest_post_tabs_sc', null, $attributes);

    return ob_get_clean();
}
add_shortcode('justco_post_tabs', 'justco_post_tabs_shortcode_func');
// In functions.php (you can create separate file for creating shortcodes) end


//location_page_map_code

function justco_location_map_shortcode_func($atts)
{
    $attributes = shortcode_atts(array(
        'city' => '',
    ), $atts);

    ob_start();

    get_template_part('inc/sc/solutionpage_map', null, $attributes);

    return ob_get_clean();
}
add_shortcode('location_map', 'justco_location_map_shortcode_func');

//end_location_page_map_code



// footer newsletter form popup start
function footer_newsletter_subs_form()
{
    ob_start();
    include 'inc/sc/footer_newsletter_subs_form.php';
    return ob_get_clean();
}
add_shortcode('FooterNewsletterSubsForm', 'footer_newsletter_subs_form');
// footer newsletter form popup end

// media enquiry form popup start
function media_enquiry_form_popup()
{
    ob_start();
    include 'inc/sc/media_enquiry_form_popup.php';
    return ob_get_clean();
}
add_shortcode('MediaEnquiryPopupForm', 'media_enquiry_form_popup');
// media enquiry form popup end

// partnership enquiry form popup start
function partnership_enq_form_popup()
{
    ob_start();
    include 'inc/sc/partnership_enq_form_popup.php';
    return ob_get_clean();
}
add_shortcode('PartnershipEnquiryPopupForm', 'partnership_enq_form_popup');
// partnership enquiry form popup end

// general enquiry form popup start
function general_enquiry_form_popup()
{
    ob_start();
    include 'inc/sc/general_enquiry_form_popup.php';
    return ob_get_clean();
}
add_shortcode('GeneralEnquiryPopupForm', 'general_enquiry_form_popup');
// general enquiry form popup end


// form popup janus 10-09-2023 start
function justco_form_popup_shortcode_func($atts)
{
    $attributes = shortcode_atts(array(), $atts);

    ob_start();

    get_template_part('inc/sc/justco_janus_form_popup_sc', null, $attributes);

    return ob_get_clean();
}
add_shortcode('justco_janus_form_popup', 'justco_form_popup_shortcode_func');
// form popup janus 10-09-2023 end

// partnership enquiry form popup start
function managed_coworking_form_fn()
{
    ob_start();
    include 'inc/sc/managed_coworking_form_sc.php';
    return ob_get_clean();
}
add_shortcode('managed_coworking_form_sc', 'managed_coworking_form_fn');
// partnership enquiry form popup end

// latest find suite sc
require get_template_directory() . '/inc/sc/find_suite_sc.php';

add_filter('icl_ls_languages', 'wpml_ls_filter');

function wpml_ls_filter($languages)
{

    foreach ($languages as $lang_code => $language) {

        $mTempString = $languages[$lang_code]['url'];

        echo $mTempString; // HERE

        // If "tax" is found in that string, replace it with "" - remove it.
        if (strpos($mTempString, "tax") !== false) {

            $languages[$lang_code]['url'] = str_replace("tax", "", $mTempString);
        }
    }
    return $languages;
}





#get_filtered_posts_fun defined here
function fetchPostUsingAjaxTabs()
{
    $dyn_obj = $_POST['obj'];
    $dyn_cat = $dyn_obj["cat"];
    $dyn_paged = $dyn_obj["paged"];
    $dyn_offset = $dyn_obj["offset"];

    $taxonomy = 'centre-district';

    if ($dyn_cat == "all") {
        $dyn_paged = '-1';
    }
    $ajaxposts = new WP_Query([
        'post_type' => 'centre',
        // 'category_name' => $dyn_cat,
        // 'posts_per_page' => $dyn_paged,
        'offset'        => $dyn_offset,
        'post_status' => 'publish',
        'posts_per_page' => $dyn_paged, //initially 8 
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => array($dyn_cat)
            )
        )
    ]);


    $centers = '';
    $positions = [];
    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $url = get_the_permalink();
            $postThumbUrl = get_the_post_thumbnail_url();
            $the_title = get_the_title();
            $the_excerpt = get_the_excerpt();
            $location = get_field('location', get_the_ID());
            $openingsoonbadge = get_field('openingsoonbadge', get_the_ID());

            $centers .= '<div class="col-md-6 col-lg-4 col-xl-3">
			<div class="tab_card">
				<div class="img_box">';
        if ($openingsoonbadge == 'Yes') {
              $centers .= '<a class="openingSoonBadge" href="' . $url . '">';
          } else {
              $centers .= '<a href="' . $url . '">';
          }
                       $centers .= ' <img
                            src="' . $postThumbUrl . '"
                            class="card-img-top"
                            alt="' . $the_title . '"
                        />
                    </a>
				</div>
				<div class="detail">
                    <h4>
                        <a href="' . $url . '">' . $the_title . '</a>
                    </h4>
					<p class="card-text">
					' . $location . '
					</p>
				</div>
			</div>
		</div>';




            $locationpost_ID = get_the_ID();

            $location_image = wp_get_attachment_image_src(get_post_thumbnail_id($locationpost_ID), 'single-post-thumbnail');
            $latitude_pins = get_field("latitude", $locationpost_ID);
            $longitude_pins = get_field("longitude", $locationpost_ID);


            $latitude_var = floatval($latitude_pins);
            $longitude_var = floatval($longitude_pins);
           // $address = trim($location);
            $address = $post_excerpt = get_post_field('post_excerpt', $locationpost_ID);
            // $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyDx4DPRPTmy8PiQUDzuvfGK3A_VUUmPcnw&address=" . str_replace(" ", "+", $address) . "&sensor=false";

            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // $responseJson = curl_exec($ch);
            // curl_close($ch);

            // $response = json_decode($responseJson);

            // if ($response->status == 'OK') {

                if ($latitude_pins != "" && $longitude_pins != "") {
                    $latitude = $latitude_var;
                    $longitude = $longitude_var;
                } else {
                    // $latitude = $response->results[0]->geometry->location->lat;
                    // $longitude = $response->results[0]->geometry->location->lng;
                    $latitude = '';
                    $longitude =  '';
                }


                $positions[] = [
                    'name' => $the_title,
                    'address' => $address,
                    'image' => $location_image[0],
                    'lat' => $latitude,
                    'lng' => $longitude,
                ];
            // }
        endwhile;
        $response = array(
            'centers' => $centers,
            'positions' => json_encode($positions)
        );
        echo json_encode($response);
    } else {
        echo "0";
    }

    // echo $response;

    exit;
}
add_action('wp_ajax_fetchPostUsingAjaxTabs', 'fetchPostUsingAjaxTabs');
add_action('wp_ajax_nopriv_fetchPostUsingAjaxTabs', 'fetchPostUsingAjaxTabs');



// load admin style
add_action('admin_enqueue_scripts', 'load_admin_styles');
function load_admin_styles()
{
    // wp_enqueue_style('justco-latest-theme-style', get_template_directory_uri() . '/assets/css/custom-admin-style.css', false, _JN_VERSION, 'all');
    // wp_enqueue_script( 'your-admin-script', get_template_directory_uri() . '/assets/js/your-admin-script.js', array(), '1.0.0', true );
}


function landing_page_submission_janus()
{
    parse_str($_POST['records'], $_POST);
    include 'inc/justco-cf/center_web_enquiry_enteries.php';
    die();
}
add_action('wp_ajax_landing_page_submission_janus', 'landing_page_submission_janus');
add_action('wp_ajax_nopriv_landing_page_submission_janus', 'landing_page_submission_janus');

function center_page_submission_janus()
{
    include 'inc/justco-cf/center_web_enquiry_enteries.php';
    die();
}
add_action('wp_ajax_center_page_submission_janus', 'center_page_submission_janus');
add_action('wp_ajax_nopriv_center_page_submission_janus', 'center_page_submission_janus');

/* */
function connect_another_db()
{
    global $seconddb;
    $seconddb = new wpdb(CRM_USERNAME, CRM_PASSWORD, CRM_DATABASE_NAME, CRM_HOSTNAME);
}
add_action('init', 'connect_another_db');


// Allow SVG Upload
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

function thankyou_success_page(){
    ob_start();
    include 'inc/sc/thankyou_success.php';
    return ob_get_clean();
}
add_shortcode('ThankYouSuccess', 'thankyou_success_page');

add_action('template_redirect', 'redirect_front_page');

function redirect_front_page() {
    if (is_front_page()) {
        $page_id = 51042; // Replace 123 with the actual ID of the page you want to redirect to
        $url = get_permalink($page_id);
        wp_redirect($url, 301);
        exit();
    }
}

// Shortcode for Mailchimp Prefrence Integration

function mailchimp_custom_integration(){
    ob_start();
    include 'inc/sc/mailchimp_custom_integration.php';
    return ob_get_clean();
}
add_shortcode('MailchimpCustomInt', 'mailchimp_custom_integration');

function mailchimp_prefrence_update()
{
    include 'inc/justco-cf/mailchimp_prefrence_enteries.php';
    die();
}
add_action('wp_ajax_mailchimp_prefrence_update', 'mailchimp_prefrence_update');
add_action('wp_ajax_nopriv_mailchimp_prefrence_update', 'mailchimp_prefrence_update');

/* Calendly Integration Start Here */

function calendly_sc(){
    ob_start();
    include 'inc/sc/calendly_sc.php';
    return ob_get_clean();
}
add_shortcode('CalendlySc', 'calendly_sc');

function calendly_session_page() {
    $current_url = $_POST['currentPageUrl'];
    $idurl = $_POST['id'];
    $parts = explode('/', rtrim($idurl, '/'));
    $id = $parts[4];
    $fileName = "calendly_pageurl_".$id.".txt";
    $fileName_previous = "calendly_previouspageurl_".$id.".txt";
    $currentlocation = $_SERVER['DOCUMENT_ROOT'].$fileName;
    $previouslocation = $_SERVER['DOCUMENT_ROOT'].$fileName_previous;
    file_put_contents($currentlocation, $current_url . PHP_EOL);
    die;
}
add_action('wp_ajax_calendly_session_page', 'calendly_session_page');
add_action('wp_ajax_nopriv_calendly_session_page', 'calendly_session_page');

// function register_custom_webhook_route() {
    // sleep(10);
    // register_rest_route( 'calendly/v1', '/event-created-justco-calendly/', array(
        // 'methods'  => 'POST',
        // 'callback' => 'handle_calendly_webhook',
    // ));
// }
// add_action('rest_api_init', 'register_custom_webhook_route');
 
// function handle_calendly_webhook($request) {
    // $request_body = $request->get_json_params();
    // $eventStatus = $request_body['event'];
    // $response = json_encode($eventStatus);
    // $file2 = "calendly_response_31.txt";
    // file_put_contents($file2,json_encode($request_body), FILE_APPEND);
    // include 'inc/justco-cf/calendly_web_enquiry_enteries.php';
// }

function handle_calendly_webhook($request) {
    $request_body = $request->get_json_params();
    $background_url = home_url('/wp-json/calendly/v1/background-processing-justco/');
    $response = wp_remote_post($background_url, array(
        'method'    => 'POST',
        'body'      => json_encode($request_body),
        'headers'   => array(
            'Content-Type' => 'application/json',
        ),
    ));
    return new WP_REST_Response('Webhook is being processed', 200);
}

function register_custom_webhook_route() {
	// sleep(10);
    register_rest_route('calendly/v1', '/event-created-justco-calendly/', array(
        'methods'  => 'POST',
        'callback' => 'handle_calendly_webhook',
    ));
    
    register_rest_route('calendly/v1', '/background-processing-justco/', array(
        'methods'  => 'POST',
        'callback' => 'process_justco_calendly_webhook_background',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'register_custom_webhook_route');

function process_justco_calendly_webhook_background($request) {
    $request_body = json_decode($request->get_body(), true);
	sleep(5);
  include 'inc/justco-cf/calendly_web_enquiry_enteries.php';
    return new WP_REST_Response('Background processing completed', 200);
}

function thankyou_success_page_calendly(){
    ob_start();
    include 'inc/sc/thankyou_success_calendly.php';
    return ob_get_clean();
}
add_shortcode('ThankYouSuccessCalendly', 'thankyou_success_page_calendly');

/* Calendly Integration Ends Here */

if (!function_exists('update_image_alt_text_from_csv')) {

    function update_image_alt_text_from_csv($file_path) {
        
        echo $file_path;

        if (!file_exists($file_path) || !is_readable($file_path)) {
            return false;
        }
    
        $data = array();
        if (($handle = fopen($file_path, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $data[] = $row;
            }
            fclose($handle);
        }
    
        foreach ($data as $row) {
            $image_url = $row[0];
            $alt_text = $row[1];
            $attachment_id = attachment_url_to_postid($image_url);
            echo $attachment_id. '<br>';
            if ($attachment_id) {
                update_post_meta($attachment_id, '_wp_attachment_image_alt', $alt_text);
            }
        }
    }
    
    // Call the function with the path to your CSV file
    if (isset($_GET['update_alt_tw'])) {
        //update_image_alt_text_from_csv(get_template_directory() . '/update-image-alt-tw.csv');
        //exit();
        update_image_alt_text_from_csv(get_template_directory() . '/update-image-alt-th.csv');
        exit();
    }
}

include_once "fpd/fpd-location-map-shortcode.php";

/* Managed Co-working Solution Submissions Starts */

function managed_coworking_page_submission()
{
    parse_str($_POST['records'], $_POST);
    include 'inc/justco-cf/center_web_enquiry_enteries.php';
    die();
}
add_action('wp_ajax_managed_coworking_page_submission', 'managed_coworking_page_submission');
add_action('wp_ajax_nopriv_managed_coworking_page_submission', 'managed_coworking_page_submission');

/* Managed Co-working Solution Submissions Ends */


// TBO Shortcode registration
include 'inc/tbo/shortcodes_register.php';

