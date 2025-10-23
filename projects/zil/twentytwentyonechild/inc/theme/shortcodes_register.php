<?php
function growth_chart_fun($atts)
{
    $attributes = shortcode_atts(array(
        'limit' => 1
    ), $atts);

    ob_start();

    // include template with the arguments for PARENT THEME 👇
    // get_stylesheet_directory('/inc/shortcodes/growth_chart', null, array('attributes' => $attributes));

    // Pass attributes to the template for CHILD THEME 👇
    $template_path = locate_template('inc/shortcodes/growth_chart.php');

    if ($template_path) {
        // Makes $attributes available inside the included file
        $attributes = $attributes;
        include $template_path;
    } else {
        echo 'Growth chart template not found.';
    }


    return ob_get_clean();
}
add_shortcode('growth_chart', 'growth_chart_fun');

// Percentage Chart
function percentage_chart_fun($atts)
{
    $attributes = shortcode_atts(array(), $atts);

    ob_start();

    // include template with the arguments for PARENT THEME 👇
    // get_stylesheet_directory('/inc/shortcodes/percentage_chart', null, array('attributes' => $attributes));

    // Pass attributes to the template for CHILD THEME 👇
    $template_path = locate_template('inc/shortcodes/percentage_chart.php');

    if ($template_path) {
        // Makes $attributes available inside the included file
        $attributes = $attributes;
        include $template_path;
    } else {
        echo 'Growth chart template not found.';
    }


    return ob_get_clean();
}
add_shortcode('percentage_chart', 'percentage_chart_fun');


// Image Map 

// [map_section people="Amit Sharma|Canada|/wp-content/uploads/2025/08/amit-pin.png;Amit Sharma|Gurugram, India|/wp-content/uploads/2025/08/amit-pin.png;"]
function map_section_fun($atts)
{
    $atts = shortcode_atts([
        'people' => '',
    ], $atts);

    $people_raw = $atts['people'];
    $people = [];

    if (!empty($people_raw)) {
        // Split on semicolon instead of comma
        $entries = explode(';', $people_raw);

        foreach ($entries as $entry) {
            $parts = explode('|', $entry);
            if (count($parts) == 3) {
                $people[] = [
                    'name' => trim($parts[0]),
                    'location' => trim($parts[1]),
                    'image' => trim($parts[2]),
                ];
            }
        }
    }

    ob_start();

    $template_path = locate_template('inc/shortcodes/map_section.php');

    if ($template_path) {
        include $template_path;
    } else {
        echo 'Map section template not found.';
    }

    return ob_get_clean();
}
add_shortcode('map_section', 'map_section_fun');

// Shortcode for Career Path with TAP
function career_path_fun($atts)
{
    $attributes = shortcode_atts(array(
        'limit' => 1
    ), $atts);

    ob_start();
    $template_path = locate_template('inc/shortcodes/career_path_section.php');
    if ($template_path) {
        $attributes = $attributes;
        include $template_path;
    } else {
        echo 'Career path template not found.';
    }
    return ob_get_clean();
}
add_shortcode('career_path', 'career_path_fun');


// Shortcode for Job Categories
function job_categories_fun($atts)
{
    $attributes = shortcode_atts(array(
        'limit' => 1
    ), $atts);

    ob_start();
    $template_path = locate_template('inc/shortcodes/job_categories.php');
    if ($template_path) {
        $attributes = $attributes;
        include $template_path;
    } else {
        echo 'Job Categories template not found.';
    }
    return ob_get_clean();
}
add_shortcode('job_categories', 'job_categories_fun');

// Shortcode for Show job listing
// function job_listing_fun($atts)
// {
//     $attributes = shortcode_atts(array(), $atts);

//     ob_start();

//     $template_path = locate_template('inc/shortcodes/job_listing.php');

//     if ($template_path) {
//         include $template_path;
//     } else {
//         echo 'Job Listing Not Found.';
//     }

//     return ob_get_clean();
// }
// add_shortcode('job_listing', 'job_listing_fun');

