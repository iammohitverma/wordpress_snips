<?php
according to universal time
function custom_redirect_about_us() {

$pageUrl1 = "gage-roads-win-a-landy-landing-page";
$pageUrl2 = "gage-roads-on-premise-win-a-vintage-landy";
$pageUrl3 = "gage-roads-off-premise-win-a-vintage-landy";

// Check if current time is after 2024-04-16 00:00:00
$current_time = time(); 
$end_time = strtotime('2024-04-16 00:00:00'); 

if ((is_page($pageUrl1) || is_page($pageUrl2) || is_page($pageUrl3)) && ($current_time > $end_time)) {
    wp_redirect('https://gageroads.gooddrinkshub.com.au/competition-has-ended/');
    exit;
}
}
add_action('template_redirect', 'custom_redirect_about_us');





// according to local time

function custom_redirect_about_us() {

    $pageUrl1 = "gage-roads-win-a-landy-landing-page";
    $pageUrl2 = "gage-roads-on-premise-win-a-vintage-landy";
    $pageUrl3 = "gage-roads-off-premise-win-a-vintage-landy";
    
    // Check if current time is after 2024-04-16 00:00:00
    $current_time = current_time('timestamp');
    $end_time = strtotime('2024-04-16 00:00:00'); 
    
    if ((is_page($pageUrl1) || is_page($pageUrl2) || is_page($pageUrl3)) && ($current_time > $end_time)) {
        wp_redirect('https://gageroads.gooddrinkshub.com.au/competition-has-ended/');
        exit;
    }
}
add_action('template_redirect', 'custom_redirect_about_us');
