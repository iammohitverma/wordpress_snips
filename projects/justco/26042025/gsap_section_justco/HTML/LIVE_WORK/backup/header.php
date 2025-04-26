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

    <style>
    header .container, footer .container{
        width: 1160px;
        max-width: 100%;
    }
    /* @media only screen and (max-width: 1399.98px){
        header .container, footer .container{
            width: 1320px;
        }
    }
    @media only screen and (max-width: 1199.98px){
        header .container, footer .container{
            width: 1140px;
        }
    } */
    @media only screen and (max-width: 991.98px){
        header .container, footer .container{
            width: 960px;
        }
    }
    @media only screen and (max-width: 767.98px){
        header .container, footer .container{
            width: 720px;
        }
    }
    @media only screen and (max-width: 575.98px){
        header .container, footer .container{
            width: 100%;
        }
    }
    .main-header-tm{
        position: relative;
        background-color: #ffffff;
        padding: 20px 0;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        z-index: 999;
        transition: 0.5s;
    }
    .main-header-tm.fixed{
        position: fixed;
        padding: 15px 0;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        transition: 0.5s
        /* animation: header_animation linear 0.5s normal; */
    }
    @keyframes header_animation {
        0% {
            transform: translateY(-100%);
        }
        100% {
            transform: translateY(0%);
        }
    }
    .main-header-tm .header_content_wrap{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .main-header-tm .header_content_wrap .header_logo img{
        width: 62px;
    }
    .main-header-tm .header_content_wrap .header_select_bar{
        position: relative;
        width: 60%;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar{
        margin: 0;
        padding: 0;
        border: 0;
        justify-content: flex-start;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar select, .main-header-tm .header_content_wrap .header_select_bar .customise_bar input, .main-header-tm .header_content_wrap .header_select_bar .customise_bar input::placeholder,     .main-header-tm .header_content_wrap .header_select_bar .customise_bar .select2-selection__rendered{
        font-size: 14px;
        font-weight: 600;
        color: #182f92;
        font-family: var(--open_sans_font);
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar .select2{
        min-width: 120px;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar .customise_option{
        margin-right: 20px;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar .customise_option .move_in_date{
        width: 120px;
        max-width: 100%;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar .customise button{
        font-size: 14px;
        padding: 7px 20px;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar .customise_option .option_img{
        padding-right: 10px;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar .customise_option .option_img img{
        width: 15px;
    }
    .main-header-tm .header_content_wrap .header_select_bar .customise_bar .customise_option .option_text #move-in-date{
        width: 100px;
    }
    .main-header-tm .header_content_wrap .header_login_details, .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap{
        display: flex;
        align-items: center;
    }
    .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap {
        margin-right: 70px;
    }
    .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div{
        position: relative;
        margin-right: 30px;
    }
    .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div:nth-last-child(1){
        margin-right: 0;
    }
    .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div img{
        width: 20px;
    }
    .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div span{
        font-size: 14px;
        font-weight: 600;
        color: #182f92;
        font-family: var(--open_sans_font);
        margin-left: 5px
    }
    .main-header-tm .header_content_wrap .header_login_details .toggle_button {
        cursor: pointer;
    }
    .main-header-tm .header_content_wrap .header_login_details .toggle_button img {
        width: 40px;
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus {
        position: fixed;
        width: 450px;
        max-width: 100%;
        height: 100vh;
        top: 0;
        right: 0;
        background-color: #00e1ff;
        padding: 40px;
        overflow-y: auto;
        z-index: 999;
        transform: translateX(100%);
        transition: 0.5s;
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus .close_btn img{
        width: 20px;
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus.active {
        transform: translateX(0%);
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus .close_btn {
        margin-bottom: 20px;
        text-align: end;
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus nav li {
        margin-bottom: 18px;
        padding-left: 160px;
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus nav li:nth-last-child(1), .main-header-tm .header_content_wrap .header_login_details .header_menus nav li:nth-child(1){
        padding-left: 0px;
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus nav a, .main-header-tm .header_content_wrap .header_login_details .header_menus nav li{
        font-size: 30px;
        font-weight: 600;
        font-family: var(--open_sans_font);
        line-height: 1.2;
        color: #ffffff;
        transition: 0.5s;
    }
    .main-header-tm .header_content_wrap .header_login_details .header_menus nav a:hover{
        color: #182f92;
    }
    @media only screen and (max-width: 1399.98px){
        .main-header-tm .header_content_wrap .header_select_bar .customise_bar .customise_option {
            margin-right: 10px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus nav a, .main-header-tm .header_content_wrap .header_login_details .header_menus nav li{
            font-size: 26px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus nav li {
            padding-left: 140px;
        }
        .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap {
            margin-right: 50px;
        }
        .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div {
            margin-right: 20px;
        }
        .main-header-tm .header_content_wrap .header_select_bar .customise_bar select, .main-header-tm .header_content_wrap .header_select_bar .customise_bar input, .main-header-tm .header_content_wrap .header_select_bar .customise_bar input::placeholder,     .main-header-tm .header_content_wrap .header_select_bar .customise_bar .select2-selection__rendered{
            font-size: 12px;
        }
        .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div span {
            font-size: 12px;
        }
        .main-header-tm .header_content_wrap .header_select_bar .customise_bar .select2 {
            min-width: 100px;
        }
    }
    @media only screen and (max-width: 1199.98px){
        .main-header-tm .header_content_wrap .header_select_bar {
            display: none;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus nav a, .main-header-tm .header_content_wrap .header_login_details .header_menus nav li{
            font-size: 22px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus nav li {
            padding-left: 120px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus {
            width: 350px;
            padding: 30px;
        }
    }
    @media only screen and (max-width: 991.98px){
        .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap {
            margin-right: 30px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus nav a, .main-header-tm .header_content_wrap .header_login_details .header_menus nav li{
            font-size: 18px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus nav li {
            padding-left: 100px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus {
            width: 350px;
            padding: 20px;
        }
        .main-header-tm .header_content_wrap .header_login_details .toggle_button img {
            width: 30px;
        }
    }
    @media only screen and (max-width: 575.98px){
        .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap {
            margin-right: 15px;
        }
        .main-header-tm .header_content_wrap .header_login_details .toggle_button img {
            width: 25px;
        }
        .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div {
            margin-right: 10px;
        }
        .main-header-tm .header_content_wrap .header_login_details .login_detils_wrap > div img {
            width: 14px;
        }
        .main-header-tm .header_content_wrap .header_logo img {
            width: 52px;
        }
        .main-header-tm .header_content_wrap .header_login_details .header_menus {
            width: calc(100% - 80px);
        }
    }


    /* footer css start from here */
    .main_footer{
        position: relative;
        background-color: var(--comn_dark_blue);
    }
    .main_footer .footer_top{
        position: relative; 
        padding: 27px 0;
        border-bottom: 1px solid #ffffff;
    }
    .main_footer .footer_top_wrap{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .main_footer .footer_links ul, .main_footer .footer_buttons {
        display: flex;
        align-items: center;
    }
    .main_footer .footer_links ul li, .main_footer .footer_buttons p{
        margin-right: 50px;
    }
    .main_footer .footer_links ul li:nth-last-child(1){
        margin-right: 0;
    }
    .main_footer .footer_links ul li a{
        font-size: 12px;
        font-weight: 600;
        font-family: var(--open_sans_font);
        line-height: 1.2;
        color: #ffffff;
        text-decoration: underline;
    }
    .main_footer .footer_buttons p{
        font-size: 18px;
        font-weight: 600;
        font-family: var(--open_sans_font);
        line-height: 1.6;
        color: #ffffff;
    }
    .main_footer .footer_buttons a{
        display: inline-block;
        width: 88px;
        margin-right: 15px;
    }
    .main_footer .footer_buttons a:nth-last-child(1){
        margin-right: 0;
    }
    .main_footer .footer_buttons a img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .main_footer .footer_bottom{
        position: relative; 
        padding: 20px 0;
    }
    .main_footer .footer_bottom p{
        font-size: 12px;
        font-weight: 400;
        font-family: var(--open_sans_font);
        line-height: 1.6;
        color: #ffffff;
    }


    @media only screen and (max-width: 1199.98px){
        .main_footer .footer_links ul li, .main_footer .footer_buttons p{
            margin-right: 30px;
        }
    }
    @media only screen and (max-width: 991.98px) {
        .main_footer .footer_top_wrap{
            flex-direction: column;
        }
        .main_footer .footer_top{
            padding: 22px 0;
        }
        .main_footer .footer_links{
            margin-bottom: 10px;
        }
        .main_footer .footer_bottom p{
            text-align: center;
        }
    }
    @media only screen and (max-width: 767.98px) {
        .main_footer .footer_buttons p{
            font-size: 16px;
            margin-right: 0;
            margin-bottom: 10px;
        }
        .main_footer .footer_buttons{
            display: block;
            text-align: center;
        }
    }

    </style>

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
