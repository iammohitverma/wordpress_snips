
<?php
function get_user_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Check if the IP is passed from a shared internet connection
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Check if the IP is passed from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Get the IP address from the remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function get_user_location() {
    
    $api_key = '2f3b8ad1fd76449ab8ab00c1a3fde143';

    $ip = get_user_ip(); // Get the user's IP address
    $url = "https://api.ipgeolocation.io/ipgeo?apiKey={$api_key}&ip={$ip}";

    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return 'Failed to fetch server location: ' . $response->get_error_message();
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return 'JSON decoding error: ' . json_last_error_msg();
    }

    if (isset($data['error'])) {
        return 'Error: ' . $data['error']['message'];
    }

    return $data;
}

// Function to handle redirection based on user location
function redirect_based_on_location() {
    // Skip redirection if on the admin or specific pages
    if (is_admin() || is_page(array('the-test-eu'))) {
        return;
    }

    $location = get_user_location();
    print_r($location);
    
    

    // Check if the location data was fetched successfully
    if (is_array($location) && isset($location['country_code2'])) {
        $eu_countries = array('AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SI', 'SK', 'SE');
       
        // Handle EU countries redirection
        if (in_array($location['country_code2'], $eu_countries)) {
            if (strpos($_SERVER['REQUEST_URI'], '/the-test') !== false) {
                header('Location: http://3.26.161.196/the-test-eu/');
                exit();

            }
        }
    }
}

// Hook the redirection function to 'template_redirect'
add_action('template_redirect', 'redirect_based_on_location');

?>
