<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package janusjustco-theme
 */
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
} else {
    $c_menu = "sg";
}

if ($c_lang == "en" && $c_lang != "") {
    $language = "en";
    $full_menu = $c_menu . "_" . $language;
    $logolink = $c_menu . "/" . $language;
    $menu_theme_location = $full_menu . '_footer-menu';
} else {
    $full_menu = $c_menu;
    $menu_theme_location = $full_menu . '_footer-menu';
    // $menu_theme_location = "sg_header-menu_latest";
    $logolink = $c_menu;
}
global $wp_query;
if ( $post = $wp_query->post ) {
    $currentpage_ID = $post->ID;
}else{
    $currentpage_ID = "";
}
// stiker janus form popup start
 if($currentpage_ID != "92685" || $code != "th"){
echo do_shortcode("[justco_janus_form_popup]");
 }

// stiker janus form popup end
?>
<?php if (!is_page_template('lp-promotion.php')) { ?>
    <!-- updated footer start -->
    <footer class="new_footer currently_on_staging">
        <div class="container">
            <div class="top_footer">
                <div class="row">
                    <div class="col-md-7">
                        <div class="footer_mega_menu">
                            <div class="widget_wrap">
                                <?php wp_nav_menu([
                            "menu_class" => "menu", 
                            "container" => "nav", 
                            "theme_location" => $menu_theme_location, 
                        ]); ?>
                            </div>
                        </div>
                    </div>
                    <!--  footer newsletter form popup start -->
                    <?php echo do_shortcode("[FooterNewsletterSubsForm]"); ?>
                    <!--  footer newsletter form popup end -->

                        <!--  media enquiry form popup start -->
                        <?php echo do_shortcode("[MediaEnquiryPopupForm]"); ?>
                    <!--  media enquiry form popup end -->

                        <!--  partnership enquiry form popup start -->
                        <?php echo do_shortcode("[PartnershipEnquiryPopupForm]"); ?>
                    <!--  partnership enquiry form popup end -->

                    <!--  general enquiry form popup start -->
                    <?php echo do_shortcode("[GeneralEnquiryPopupForm]"); ?>
                    <!--  general enquiry form popup end -->

                    <div class="col-md-5 custom-badge">
                        <div class="about_text">
                            <?php
                            if (get_theme_mod('logo_upload')) {
                                $logo_upload =  get_theme_mod('logo_upload');
                            }else{
                                $logo_upload = "";
                            }
                            if (get_theme_mod(''.$full_menu.'_contact_number')) {
                                $contact_number =  get_theme_mod(''.$full_menu.'_contact_number');
                            }else{
                                $contact_number = "";
                            }
                            if (get_theme_mod(''.$full_menu.'_contact_timings')) {
                                $contact_timings =  get_theme_mod(''.$full_menu.'_contact_timings');
                            }else{
                                $contact_timings = "";
                            }
                            ?>
                            <div class="footer_logo">
                                <a href="<?php echo get_site_url(); ?>">
                                    <img src="<?php echo $logo_upload; ?>" alt="footer logo">
                                </a>
                            </div>
                            <a class="ul_style" href="tel:<?php echo $contact_number; ?>"><?php echo $contact_number; ?></a>
                            <p><?php echo $contact_timings; ?></p>
                            <ul class="sci">
                                <?php
                                if (get_theme_mod('contact_sci_fb')) {
                                    $fb =  get_theme_mod('contact_sci_fb');
                                ?>
                                    <li>
                                        <a href="<?php echo $fb; ?>">
                                            <img src="/wp-content/themes/janusjustco/assets/images/facebook.png" alt="facebook">
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php
                                if (get_theme_mod('contact_sci_instagram')) {
                                    $instagram =  get_theme_mod('contact_sci_instagram');
                                ?>
                                    <li>
                                        <a href="<?php echo $instagram; ?>">
                                            <img src="/wp-content/themes/janusjustco/assets/images/instagram.png" alt="instagram">
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php
                                if (get_theme_mod('contact_sci_linkedin')) {
                                    $linkedin =  get_theme_mod('contact_sci_linkedin');
                                ?>
                                    <li>
                                        <a href="<?php echo $linkedin; ?>">
                                            <img src="/wp-content/themes/janusjustco/assets/images/linkedin.png" alt="linkedin">
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php
                                if (get_theme_mod('contact_sci_youtube')) {
                                    $youtube =  get_theme_mod('contact_sci_youtube');
                                ?>
                                    <li>
                                        <a href="<?php echo $youtube; ?>">
                                            <img src="/wp-content/themes/janusjustco/assets/images/youtube.png" alt="youtube">
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php if(get_theme_mod(''.$full_menu.'_bottom_footer_text')){ 
                                    $bootom_footer_text = get_theme_mod(''.$full_menu.'_bottom_footer_text');
                                ?>
                                <div class="bottom_footer_text">
                                    <p><b><?php echo $bootom_footer_text; ?></b></p>
                                </div>
                            <?php } ?>
                        </div>
                            <?php
                        if (get_theme_mod(''.$full_menu.'_certificate_badge')) {
                        $certificate_badge =  get_theme_mod(''.$full_menu.'_certificate_badge');
                    ?>
                        <div class="certifiedbadge">
                        <img src="<?php echo $certificate_badge; ?>" alt="certifiedbadge">
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="inner">
                    <ul>
                        <?php
                        if (get_theme_mod(''.$full_menu.'_copyright_link_one_text')) {
                            $copyright_link_one_text =  get_theme_mod(''.$full_menu.'_copyright_link_one_text');
                            $copyright_link_one_url =  get_theme_mod(''.$full_menu.'_copyright_link_one_url');
                        ?>
                            <li><a href="<?php echo $copyright_link_one_url; ?>"><?php echo $copyright_link_one_text; ?></a>
                            </li>
                        <?php } ?>
                        <?php
                        if (get_theme_mod(''.$full_menu.'_copyright_link_two_text')) {
                            $copyright_link_two_text =  get_theme_mod(''.$full_menu.'_copyright_link_two_text');
                            $copyright_link_two_url =  get_theme_mod(''.$full_menu.'_copyright_link_two_url');
                        ?>
                            <li><a href="<?php echo $copyright_link_two_url; ?>"><?php echo $copyright_link_two_text; ?></a>
                            </li>
                        <?php } ?>
                    </ul>

                    <?php
                    if (get_theme_mod(''.$full_menu.'_copyright_text')) {
                        $copyright_text =  get_theme_mod(''.$full_menu.'_copyright_text');
                    ?>
                        <p><?php echo $copyright_text; ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div id="bookTour">
            <?php echo do_shortcode('[LatestBookTourForm]'); ?>
        </div>
    </footer>
    <!-- updated footer end -->
<?php
}/* else if( kya ye center post type hai if yes then this header will go){
    <?php echo get_template_part( 'inc/footers/tbo_footer' );  ?>
}*/ else { /*echo get_template_part( 'inc/footers/harpreet_footer' ); */ }
?>


<!-- tbo footer -->
<!-- niche wala footer center post type of tbo ke base par display hoga and us case me baki headers nahi aayenge  -->
<?php
    // echo get_template_part( 'inc/footers/tbo_footer' );  
?>

</div><!-- #page -->
<?php wp_footer(); ?>

<!--script>
    let lastPageSurf = sessionStorage.getItem("last_page_surf");

    if(lastPageSurf == undefined || lastPageSurf == null){
      $(".previous_page_type").val(window.location.href);
    }
//    else{
//      if(lastPageSurf != window.location.href){
//            $(".previous_page_type").val(lastPageSurf);
//            sessionStorage.setItem("last_page_surf",  window.location.href);
//        } else{
//            $(".previous_page_type").val(document.referrer);
//        }
//    }
    sessionStorage.setItem("last_page_surf",  $(".previous_page_type").val());
</script-->
<!-- <script>
    let lastPageSurf = sessionStorage.getItem("last_page_surf");

    if(lastPageSurf != undefined || lastPageSurf != null){
        jQuery(".previous_page_type").val(lastPageSurf);
    }else{
		jQuery(".previous_page_type").val(window.location.href);
	}
    sessionStorage.setItem("last_page_surf", window.location.href);
var strArray = lastPageSurf.split("?");
        var utmcode = "?"+ strArray[1];
        console.log(utmcode);
</script> -->
</body>
</html>

<!-- Country Popup Switch -->
<!-- box-section class name -->
<section class="box-section">
    <div class="container_bs">
        <div class="box-wrap">
            <img src="https://janus.justcoglobal.com/wp-content/uploads/2023/12/warning-1.png" class="warning" alt="warning" width="100" height="100">
            <!--h3 class="box-heading">Heading</h3-->
            <p class="box-desc mt-3">You are currently leaving the website from your browsing country. Would you like to
                switch to our <span id="switchCountryName"></span> website for localized content and offers?</p>
            <a href="javascript:void(0);" class="stayHere">Stay Here</a>
            <a href="" class="redirectCountry">Switch Country</a>
        </div>
    </div>
</section>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>