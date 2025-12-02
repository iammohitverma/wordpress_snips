<?php
// justco_form_talk_to_us_2026
function justco_form_talk_to_us_2026()
{
    ob_start();
    include get_template_directory() . '/inc/justco-2026/sc/justco_form_talk_to_us.php';
    return ob_get_clean();
}
add_shortcode('justco_form_talk_to_us', 'justco_form_talk_to_us_2026');