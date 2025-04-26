<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package justco-tbo-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?> data-pageId="<?php echo get_the_id() ?>">
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header class="main-header-tm">
            <div class="container">
                <div class="header_content_wrap">
                    <div class="header_logo">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="/theboringoffice/wp-content/uploads/2025/04/Screenshot_7.png" alt="header logo">
                        </a>
                    </div>
                    <!-- <div class="header_select_bar">
                        <div class="bar_wrapper">
                            <?php //echo do_shortcode('[customizable_offices]'); ?>
                        </div>
                    </div> -->
                    <div class="header_login_details">
                        <!-- <div class="login_detils_wrap">
                            <div class="cart">
                                <img src="/theboringoffice/wp-content/uploads/2025/04/Group-223.png" alt="cart_icon">
                                <span>0</span>
                            </div>
                            <div class="wishlist">
                                <img src="/theboringoffice/wp-content/uploads/2025/04/Path-4872.png" alt="wishlist_icon">
                                <span>0</span>
                            </div>
                            <div class="signup">
                                <img src="/theboringoffice/wp-content/uploads/2025/04/Group-220.png" alt="login">
                                <span>login / sign up</span>
                            </div>
                        </div> -->
                        <div class="toggle_button">
                            <img src="/theboringoffice/wp-content/uploads/2025/04/Group-225.png" alt="toggle icon" class="toggle_icon">
                        </div>
                        <div class="header_menus">
                            <div class="close_btn">
                                <img src="/theboringoffice/wp-content/uploads/2025/04/cross.png" alt="close button">
                            </div>
                            <nav>
                                <ul>
                                    <li>the boring
                                        <a href="#concept_sec">concept</a>
                                    </li>
                                    <li>
                                        <a href="#look_sec">look</a>
                                    </li>
                                    <li>
                                        <a href="#process_sec">process</a>
                                    </li>
                                    <li>
                                        <a href="#add_ons_sec">add-ons</a>
                                    </li>
                                    <li>
                                        <a href="#workspace_sec">workspaces</a>
                                    </li>
                                    <li>
                                        <a href="#spot_sec">spots</a>
                                    </li>
                                    <li>
                                        <a href="#blog_sec">blog</a>
                                    </li>
                                    <li>
                                        <a href="#question_sec">questions</a>
                                    </li>
                                    <li>
                                        <a href="#app_sec">app</a>
                                    </li>
                                    <li>
                                        <a href="#contact_sec">contact us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> 
        </header>

        <script>
        // Get the height of the .site_header element
        let headerHeight = document.querySelector(".main-header-tm").offsetHeight;

        // Set the --headerHeight CSS variable
        document.body.style.setProperty("--headerHeight", headerHeight + "px");
      </script>