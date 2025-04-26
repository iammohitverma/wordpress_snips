<?php 
session_start();
$utm_source = "";
$utm_medium = "";
$utm_campaign = "";
$utm_content = "";
$utm_term = "";
$utm_solution = "";
$utm_objective = "";
$utm_asset = "";
$utm_agency = "";
$gclid = "";
$gad_source = "";
if (isset($_REQUEST['utm_source']) && $_REQUEST['utm_source'] != ''){
	$utm_source = $_REQUEST['utm_source'];
	$_SESSION['justco_utm_source'] = $utm_source;
}else{
    $_SESSION['justco_utm_source'] = "";
}

if (isset($_REQUEST['utm_medium']) && $_REQUEST['utm_medium'] != ''){
	$utm_medium = $_REQUEST['utm_medium'];
	$_SESSION['justco_utm_medium'] = $utm_medium;
}else{
    $_SESSION['justco_utm_medium'] = "";
}

if (isset($_REQUEST['utm_campaign']) && $_REQUEST['utm_campaign'] != ''){
	$utm_campaign = $_REQUEST['utm_campaign'];
	$_SESSION['justco_utm_campaign'] = $utm_campaign;
}else{
    $_SESSION['justco_utm_campaign'] = "";
}

if (isset($_REQUEST['utm_content']) && $_REQUEST['utm_content'] != ''){
	$utm_content = $_REQUEST['utm_content'];
	$_SESSION['justco_utm_content'] = $utm_content;
}else{
    $_SESSION['justco_utm_content'] = "";
}

if (isset($_REQUEST['utm_term']) && $_REQUEST['utm_term'] != ''){
	$utm_term = $_REQUEST['utm_term'];
	$_SESSION['justco_utm_term'] = $utm_term;
}else{
    $_SESSION['justco_utm_term'] = "";
}

if (isset($_REQUEST['utm_solution']) && $_REQUEST['utm_solution'] != ''){
	$utm_solution = $_REQUEST['utm_solution'];
	$_SESSION['justco_utm_solution'] = $utm_solution;
}else{
    $_SESSION['justco_utm_solution'] = "";
}

if (isset($_REQUEST['utm_objective']) && $_REQUEST['utm_objective'] != ''){
	$utm_objective = $_REQUEST['utm_objective'];
	$_SESSION['justco_utm_objective'] = $utm_objective;
}else{
    $_SESSION['justco_utm_objective'] = "";
}

if (isset($_REQUEST['utm_asset']) && $_REQUEST['utm_asset'] != ''){
	$utm_asset = $_REQUEST['utm_asset'];
	$_SESSION['justco_utm_asset'] = $utm_asset;
}else{
    $_SESSION['justco_utm_asset'] = "";
}

if (isset($_REQUEST['utm_agency']) && $_REQUEST['utm_agency'] != ''){
	$utm_agency  = $_REQUEST['utm_agency'];
	$_SESSION['justco_utm_agency'] = $utm_agency;
}else{
    $_SESSION['justco_utm_agency'] = "";
}

if (isset($_REQUEST['gclid']) && $_REQUEST['gclid'] != ''){
	$utm_gclid  = $_REQUEST['gclid'];
	$_SESSION['justco_utm_gclid'] = $utm_gclid;
}else{
    $_SESSION['justco_utm_gclid'] = "";
}

if (isset($_REQUEST['gad_source']) && $_REQUEST['gad_source'] != ''){
	$utm_gad_source  = $_REQUEST['gad_source'];
	$_SESSION['justco_utm_gad_source'] = $utm_gad_source;
}else{
    $_SESSION['justco_utm_gad_source'] = "";
}

/*** for dynamic menu according to countries ***/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$current_url = explode("/", $actual_link);
$d_name = $current_url[2];
$c_code = $current_url[3];
if(isset($current_url[4])){
    $c_lang = $current_url[4];
}else{
    $c_lang = '';
}
$total_coutries = array('sg', 'au', 'th', 'tw', 'jp', 'kr');
if (in_array($c_code, $total_coutries, TRUE)) {
    $c_menu = $c_code;
    // echo "<script>var current_country_load = '".$c_menu."'; localStorage.setItem('current_country', '". $c_menu ."');</script>";
} else {
    $c_menu = "sg";
    // echo "<script>var current_country_load = '".$c_menu."'; localStorage.setItem('current_country', '" .$c_menu. "');</script>";
}

if ($c_lang == "en" && $c_lang != "") {
    $language = "en";
    $full_menu = $c_menu . "_" . $language;
    $logolink = $c_menu . "/" . $language;
    $menu_theme_location = $full_menu . '_header-menu_latest';
} else {
    $full_menu = $c_menu;
    $menu_theme_location = $full_menu . '_header-menu_latest';
    // $menu_theme_location = "sg_header-menu_latest";
    $logolink = $c_menu;
}
global $wp_query;
if ( $post = $wp_query->post ) {
    $current_ID = $post->ID;
}else{
    $current_ID = "";
}

$zoomValue = get_field( "map_zoom", $current_ID);
if($zoomValue != ''){
	$zoomval = $zoomValue;
}else{
	$zoomval = '13';
}
?>
<script>
const zoomVal = <?php echo $zoomval; ?>
</script>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?php
        include get_template_directory() . '/inc/justco-cf/GTM/gtm.php';
        include get_template_directory() . '/inc/justco-cf/GTM/gtm_landing.php';
    ?>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0,user-scalable=0">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    
    <?php wp_head(); 
    echo (isset($maingtm) ? $maingtm : '');
    ?>
    <script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:6377858,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

</head>
<body <?php body_class(); ?> data-country="<?php echo $c_menu;?>">

<?php
// $zoomVal = get_field( "map_zoom", $current_ID);
echo (isset($additionalgtm) ? $additionalgtm : '');

$headerShow;
if (!is_page_template('lp-promotion.php')) {  //if template is not landing page template
    $headerShow = "mohit_header";
?>
    <!-- Global Header start -->
    <header class="new_header currently_on_staging header_mv" id="justcods">
        <?php
        $topBarText = get_theme_mod("topbar_text");
        if ($topBarText) { ?>
            <!-- top_bar start -->
            <div class="top_bar">
                <div class="container">
                    <div class="inner">
                        <div class="text_wrap">
                            <p>
                                <?php
                                    if ($c_lang == "en" && $c_lang != "") {
                                        $setting_key = 'topbar_text_' . $c_code . '_' . $c_lang;
                                    } else {
                                        $setting_key = 'topbar_text_' . $c_code;
                                    }
                                    
                        global $post;
                        

                                    if($post->ID == 106528) {
                                        echo "<strong>PROMOTION</strong>: Private offices starting from $500. Promotion ends 31st Mar 2025. <a href='https://www.justcoglobal.com/sg/promotions/private-office-campaign/' class='yellow_link yellow-topbar'>Sign up now!</a>";
                                    } else {
                                        $topBarText = get_theme_mod($setting_key);
                                        echo $topBarText; 
                                    }

                                ?>
                            </p>
                        </div>
                        <button class="topbarClose close_icon_btn"></button>
                    </div>
                </div>
            </div>
            <!-- top_bar end -->
        <?php } ?>

        <!-- container start -->
        <div class="bottom_header">
            <div class="container">
                <div class="inner">
                    <div class="logoBx">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                        ?>
                        <a href="<?php bloginfo('url'); ?>/<?php echo $logolink; ?>/" title="<?php bloginfo('name'); ?>">
                            <img src="<?php echo esc_url( $logo );?>" alt="Site Logo alt" width="100" height="100">
                        </a>
                    </div>
                    <div class="navigationWrap" data-postid="<?php echo $post->ID; ?>">
                        <?php wp_nav_menu([
                            "menu_class" => "main-menu", 
                            "container" => "nav", 
                            "theme_location" => $menu_theme_location, 
                            "before" => '<div class="a-Wrap">', 
                            "after" => "</div>", 
                        ]); ?>
                        <!-- lang -->
                        <?php 
                            
                        if($post->ID != 106528 && $post->ID != 106987) {
                            if($c_code != "sg" && $c_code != "au" && $c_code != ""){
                                echo do_shortcode(' [justco_latest_header_lang yourCustomAttr=""]'); 
                            }
                        }
                        ?>
                    </div>

                    <!-- menu_toggle wrap start-->
                    <div class="menu_toggle_wrap mobile">
                        <button class="menu_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- lang -->
                        <?php 
                        if($post->ID != 106987) {
                        if($c_code != "sg" && $c_code != "au" && $c_code != ""){
                            echo do_shortcode('[justco_latest_header_lang yourCustomAttr=""]'); }
                        }
                        ?>
                    </div> <!-- menu_toggle wrap end-->
                    <div class="navigation mobile">
                        <div class="navigationWrap">
                            <?php wp_nav_menu([
                                "menu_class" => "main-menu", 
                                "container" => "nav", 
                                "theme_location" => $menu_theme_location,
                                "before" => '<div class="a-Wrap">', 
                                "after" => "</div>", 
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container end -->
    </header>
    <!-- Global Header end -->
<?php
} /* else if( kya ye center post type hai if yes then this header will go){
    <?php echo get_template_part( 'inc/headers/tbo_header' ); ?>
}*/ else {
    /*-- Landing Page start -*/
	$headerShow = "harpreet_header";
	echo get_template_part( 'inc/headers/harpreet_header' ); 
    /*-- Landing Page end -*/
}
?>

<!-- niche wala header taxonomy and post type ke base par display hoga and us case me baki headers nahi aayenge  -->
<?php echo get_template_part( 'inc/headers/tbo_header' ); ?>













<!-- <style>
.temp_loader{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:#fff;
    opacity: 1;
    visibility: visible;
    pointer-events:all;
    z-index:99999999;
}    
.temp_loader.loaded{
    opacity: 0;
    visibility: hidden;
    pointer-events:none;
}    
</style>

<div class="temp_loader"></div>

<script>
    window.onload = () => {
        document.querySelector(".temp_loader").classList.add("loaded");
    }
</script> -->
