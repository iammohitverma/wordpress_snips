<?php
if ( ! defined( '_JN_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_JN_VERSION', '1.0.0' );
}


if ( ! function_exists( 'promarkerd_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function promarkerd_theme_setup() {
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

        function promarkerd_scripts() {
            // check if woocommerce is activated in website start
            $ifWooActivate = false;
            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $ifWooActivate = true;
            } else {
                $ifWooActivate = false;
            }
            // check if woocommerce is activated in website end

            wp_enqueue_style( 'promarkerd-style', get_stylesheet_uri(), array(), _JN_VERSION );
            wp_enqueue_style( 'promarkerd-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'promarkerd-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome/css/all.min.css',false, _JN_VERSION,'all');
            wp_enqueue_style( 'promarkerd-font-style', get_template_directory_uri() . '/assets/fonts/fonts/stylesheet.css',false, _JN_VERSION,'all');

            // owl and slick both are linked use one of them at once 
            wp_enqueue_style( 'promarkerd-owl-style', get_template_directory_uri() . '/assets/css/owl/owl.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'promarkerd-swiper-style', get_template_directory_uri() . '/assets/css/owl/swiper.min.css',false, _JN_VERSION,'all');
            //wp_enqueue_style( 'promarkerd-slick-style', get_template_directory_uri() . '/assets/css/slick/slick.min.css',false, _JN_VERSION,'all');
            if($ifWooActivate){
                wp_enqueue_style( 'promarkerd-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce/style.css',false, _JN_VERSION,'all');
            }
            wp_enqueue_style( 'promarkerd-theme-style', get_template_directory_uri() . '/assets/css/theme-style.css',false, _JN_VERSION,'all');

            wp_enqueue_script( 'promarkerd-jquery-script', get_template_directory_uri() . '/assets/js/jquery/jquery-3.6.0.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'promarkerd-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js', array(), _JN_VERSION, true );

            // owl and slick both are linked use one of them at once  
            wp_enqueue_script( 'promarkerd-owl-script', get_template_directory_uri() . '/assets/js/owl/owl.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'promarkerd-swiper-script', get_template_directory_uri() . '/assets/js/owl/swiper.min.js', array(), _JN_VERSION, true );
            //wp_enqueue_script( 'promarkerd-slick-script', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), _JN_VERSION, true );
            wp_enqueue_script( 'promarkerd-theme-script', get_template_directory_uri() . '/assets/js/function.js', array(), _JN_VERSION, true );

        }
        add_action( 'wp_enqueue_scripts', 'promarkerd_scripts' );
        
        /* register_nav_menus( array(
			'header' => __( 'Primary Menu', 'promarkerd' ),
			'footer'  => __( 'Footer Menu', 'promarkerd' ),
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

        // add shortcode in widgets:-
        add_filter('widget_text', 'do_shortcode');
        
        
        // Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
        add_filter('wpcf7_autop_or_not', '__return_false');

        function filter_by_date() {
            $get_filter_value = $_POST['sendValue'];
            $html_data = '<div class="tabs-wrapping filtered_content">';
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news-category',
                                'field' => 'slug',
                                'terms' => 'announcements',
                            )
                        ),
                        'date_query' => array(
                            array(
                                'year'  => ($get_filter_value),  
                            )
                        )
                    );
                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                        
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            $html_data .= '<p class="tabs-desc">' . get_the_date('F j, Y') . '</p>';
                            $html_data .= '<h4 class="tabs-hdng">' . get_the_title() . '</h4>';
                        }
                        
                    } else {
                        echo "<p>No posts found!</p>";
                    }
                    wp_reset_postdata();
                $html_data .= '</div>';
                echo $html_data;
            wp_die();
        }
        
        add_action( 'wp_ajax_nopriv_filter_by_date', 'filter_by_date' );
        add_action( 'wp_ajax_filter_by_date', 'filter_by_date' );


        // function load_more() {
        //     $html_data = '<div class="tabs-wrapping announcements_posts">';
        //         $args = array(
        //             'post_type' => 'news',
        //             'posts_per_page' => -1,
        //             'post_status' => 'publish',
        //             'orderby' => 'date',
        //             'order' => 'DESC',
        //             'tax_query' => array(
        //                 array(
        //                     'taxonomy' => 'news-category',
        //                     'field'    => 'slug',
        //                     'terms'    => 'announcements'
        //                 ),
        //             )
        //         );
        //         $the_query = new WP_Query( $args ); 

        //         if ( $the_query->have_posts() ) {
                    
        //             while ( $the_query->have_posts() ) {
        //                 $the_query->the_post();
        //                 $html_data .= '<p class="tabs-desc">' . get_the_date('F j, Y').  '</p>';
        //                 $html_data .= '<h4 class="tabs-hdng">' . get_the_title(). '</h4>';
        //             }
                    
        //         } else {
        //             echo "<p>No posts found!</p>";
        //         }
        //         wp_reset_postdata();
        //     $html_data .= '</div>';
        //     echo $html_data;
        //     wp_die();
        // }
        
        // add_action( 'wp_ajax_nopriv_load_more', 'load_more' );
        // add_action( 'wp_ajax_load_more', 'load_more' );
        function load_more() {
            $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
            $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 5;
        
            $html_data = '';
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => $posts_per_page,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => $offset,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'news-category',
                        'field'    => 'slug',
                        'terms'    => 'announcements'
                    ),
                )
            );
            $the_query = new WP_Query($args);
        
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $html_data .= '<p class="tabs-desc">' . get_the_date('F j, Y') . '</p>';
                    $html_data .= '<h4 class="tabs-hdng">' . get_the_title() . '</h4>';
                }
            } else {
                // Return a signal indicating no more posts
                echo "NO_MORE_POSTS";
                wp_die();
            }
        
            wp_reset_postdata();
        
            echo $html_data;
            wp_die();
        }
        
        add_action('wp_ajax_nopriv_load_more', 'load_more');
        add_action('wp_ajax_load_more', 'load_more');
        
        

        function presentation_load_more() {
            $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
            $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 5;

            $html_data = '';
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => $posts_per_page,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => $offset,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'news-category',
                        'field'    => 'slug',
                        'terms'    => 'presentations'
                    ),
                )
            );
            $the_query = new WP_Query($args);
        
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $html_data .= '<p class="tabs-desc">' . get_the_date('F j, Y') . '</p>';
                    $html_data .= '<h4 class="tabs-hdng">' . get_the_title() . '</h4>';
                }
            } else {
                // Return a signal indicating no more posts
                echo "NO_MORE_POSTS";
                wp_die();
            }
        
            wp_reset_postdata();
        
            echo $html_data;
            wp_die();

        }
        
        add_action( 'wp_ajax_nopriv_presentation_load_more', 'presentation_load_more' );
        add_action( 'wp_ajax_presentation_load_more', 'presentation_load_more' );

        function media_load_more() {
            $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
            $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;
        
            $html_data = '';
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => $posts_per_page,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'offset' => $offset,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'news-category',
                        'field'    => 'slug',
                        'terms'    => 'media',
                    ),
                ),
            );
        
            $the_query = new WP_Query($args);
        
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $html_data .= '<div class="col-lg-4 col-md-6 col-tab">
                        <div class="card">
                            <div class="card-figure">
                                <img src="' . get_the_post_thumbnail_url() . '" class="img-fluid" alt="tab-figure-1">
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>' . get_the_date('F j, Y') . '</li>
                                </ul>
                                <h4 class="hdng">' . get_the_title() . '</h4>
                                <a href="' . get_the_permalink() . '" class="btn btn-success">Read More <img src="/wp-content/uploads/2024/08/publication_arrows.svg" alt="icon"></a>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                // Return a signal indicating no more posts
                echo "NO_MORE_POSTS";
                wp_die();
            }
        
            wp_reset_postdata();
        
            echo $html_data;
            wp_die();
        }
        
        add_action('wp_ajax_nopriv_media_load_more', 'media_load_more');
        add_action('wp_ajax_media_load_more', 'media_load_more');
        

        function post_filter() {
            $getdate = $_POST['SelectedDate'];
            $getTab = $_POST['SelectedTab'];
            // echo $getdate;
            // echo $getTab;
            if ($getTab == "announcements") {
                $html = '<div class="tabs-wrapping announcements_posts">';
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news-category',
                                'field'    => 'slug',
                                'terms'    => 'announcements',
                            ),
                        ),
                        'date_query' => array(
                            array(
                                'year' => $getdate,
                            ),
                        )
                    );
                    $the_query = new WP_Query( $args ); 

                    if ( $the_query->have_posts() ) {
                        
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            $html.= '<p class="tabs-desc">' .get_the_date('F j, Y'). '</p>';
                            $html.= '<h4 class="tabs-hdng">' .get_the_title(). '</h4>';
                        }
                        
                    } else {
                        echo "<p>No posts found!</p>";
                    }
                $html.= '</div>';
                echo $html;
            }elseif ($getTab == "presentations") {
                $html = '<div class="tabs-wrapping presentation_posts">';
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news-category',
                                'field'    => 'slug',
                                'terms'    => 'presentations'
                            ),
                        ),
                        'date_query' => array(
                            array(
                                'year' => $getdate,
                            ),
                        )
                    );
                    $the_query = new WP_Query( $args ); 

                    if ( $the_query->have_posts() ) {
                        
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); 
                            $html.= '<p class="tabs-desc">' .get_the_date('F j, Y'). '</p>';
                            $html.= '<h4 class="tabs-hdng">' .get_the_title(). '</h4>';
                        }
                        
                    } else {
                        echo "<p>No posts found!</p>";
                    }
                    wp_reset_postdata();
                $html.= '</div>';
                echo $html;
            }elseif ($getTab == "media") {
                $html = '<div class="row media_posts">';
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'news-category',
                                'field' => 'slug',
                                'terms' => 'media',
                            )
                        ),
                        'date_query' => array(
                            array(
                                'year' => $getdate,
                            ),
                        )
                    ); 

                    $the_query = new WP_Query( $args );

                    if ( $the_query->have_posts() ) {
                        
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post(); 
                            $html.= '<div class="col-lg-4 col-md-6 col-tab">
                                <div class="card">
                                    <div class="card-figure">';
                                        $html.= '<img src="' .get_the_post_thumbnail_url(). '" class="img-fluid" alt="tab-figure-1">';
                                        // $html.= '<h6 class="tatest-hdng">LATEST NEWS</h6>';
                                    $html .= '</div>
                                    <div class="card-body">
                                        <ul>';
                                            $html.= '<li>' .get_the_date('F j, Y'). '</li>';
                                            // $html.= '<li>4min read</li>';
                                        $html.= '</ul>';
                                        // $html.= '<p class="desc">' .get_the_author(). '</p>';
                                        $html.= '<h4 class="hdng">' .get_the_title(). '</h4>';

                                        $html.= '<a href="' .get_the_permalink(). '" class="btn btn-success">Read More <img src="/wp-content/uploads/2024/08/publication_arrows.svg" alt="icon"></a>
                                    </div>
                                </div>
                            </div>';
                        }
                        
                    } else {
                        echo "<p>No posts found!</p>";
                    }
                    
                    wp_reset_postdata();
                    $html.='</div>';
                    echo $html;
            }
            wp_die();
        }
        add_action( 'wp_ajax_nopriv_post_filter', 'post_filter' );
        add_action( 'wp_ajax_post_filter', 'post_filter' );

        function filter_tag() {
            $get_tag = $_POST['Post_Tag'];
            // echo  $get_tag;
            $html_data = '<div class="row filtered_tags filtered_date">';
            if ($get_tag != "") { 
                $args = array(
                    'post_type' => 'publication',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'publication-tag',
                            'field'    => 'name',
                            'terms'    => $get_tag,
                            ),
                        ),
                    ); 
                
                $the_query = new WP_Query( $args );
                
                if ( $the_query->have_posts() ) {
                    
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); 
                        $upload_pdf = get_field('upload_pdf');
                        $html_data.= '<div class="col-12">
                            <div class="pdf_card_wrap">
                                <div class="content">';
                                    $html_data.= '<h3 class="hdng">' .get_the_title(). '</h3>';
                                    $html_data.= '<p class="desc">'  .get_the_excerpt(). '</p>';
                                $html_data.= '</div>
                                <div class="pdf_icon" target="_blank">';
                                    $html_data.= '<a href="' .esc_url($upload_pdf['url']). '">
                                        <img src="/wp-content/uploads/2024/08/pdf_ion.svg" alt="icon">
                                    </a>
                                </div>
                            </div>
                        </div>';
                    }
                    
                } else {
                    echo "<p>No posts found!</p>";
                }
                
                wp_reset_postdata();
            }
            $html_data.= '</div>';
            echo $html_data;
            wp_die();
        }
        
        add_action( 'wp_ajax_nopriv_filter_tag', 'filter_tag' );
        add_action( 'wp_ajax_filter_tag', 'filter_tag' );


        function filter_date() {
            $get_date = $_POST['Post_date'];
            // echo $get_date;
            $html_data = '<div class="row filtered_tags filtered_date">';
            if ($get_date) { 
                $args = array(
                    'post_type' => 'publication',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'date_query' => array(
                        array(
                            'year' => $get_date,
                        ),
                    ),
                ); 
                
                $the_query = new WP_Query( $args );
                
                if ( $the_query->have_posts() ) {
                    
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post(); 
                        $upload_pdf = get_field('upload_pdf');
                        $html_data.= '<div class="col-12">
                            <div class="pdf_card_wrap">
                                <div class="content">';
                                    $html_data.= '<h3 class="hdng">' .get_the_title(). '</h3>';
                                    $html_data.= '<p class="desc">'  .get_the_excerpt(). '</p>';
                                $html_data.= '</div>
                                <div class="pdf_icon" target="_blank">';
                                    $html_data.= '<a href="' .esc_url($upload_pdf['url']). '">
                                        <img src="/wp-content/uploads/2024/08/pdf_ion.svg" alt="icon">
                                    </a>
                                </div>
                            </div>
                        </div>';
                    }
                    
                } else {
                    echo "<p>No posts found!</p>";
                }
                
                wp_reset_postdata();
            }else {
            
            }
            $html_data.= '</div>';
            echo $html_data;
            wp_die();
        }
        
        add_action( 'wp_ajax_nopriv_filter_date', 'filter_date' );
        add_action( 'wp_ajax_filter_date', 'filter_date' );
 
	}
endif;
add_action( 'after_setup_theme', 'promarkerd_theme_setup' );


add_action( 'after_setup_theme', 'enable_woocommerce_support' );

function enable_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}




// Include the custom file for IP geolocation and redirection
require_once get_template_directory() . '/inc/geo_redirect_eu_users.php';