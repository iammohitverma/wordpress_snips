<?php
// Function to get the user's IP address
function get_user_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Function to get the user's location using IP
function get_user_location() {
    $api_key = '4a8bdb6be064423f9d5cbc5c6012bf0d'; // Replace with your actual API key
    $ip = get_user_ip();
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey={$api_key}&ip={$ip}";

    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return false; // Return false if the API request fails
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    return $data; // Return the location data
}

// Include the config file
$config = include('config.php');

// Function to handle redirection based on user location
function redirect_based_on_location() {
    if (is_admin()) {
        return; // Skip redirection for admin pages
    }

    $location = get_user_location();
    // print_r($location);

    // Check if the location data was fetched successfully
    if (is_array($location) && isset($location['country_code2'])) {
        // Get the current URI
        $current_uri = $_SERVER['REQUEST_URI'];

        if ($location['country_code2'] === 'JP') {
            // If the URL matches, perform the redirection
            if (strpos($current_uri, '/thecollective/tokyo/en/') !== false) {
                header('Location: https://www.justcoglobal.com/thecollective/tokyo/jp/');
                exit();
            }
        } else {
            // If not Japan, don't perform any redirection
            return; // Simply return without doing anything
        }
    } else {
        // If location data is not available or is incorrect, don't redirect
        echo "No location data available.";
        return;
    }
}



// Hook the redirection function to 'template_redirect'
add_action('template_redirect', 'redirect_based_on_location');

