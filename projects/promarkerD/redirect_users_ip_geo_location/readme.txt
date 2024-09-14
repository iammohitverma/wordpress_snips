=== IP Geolocation Integration ===
Contributors: Mohit Verma
Tags: geolocation, ip-api, integration


== Description ==
This plugin integrates IP Geolocation functionality into your WordPress site using the IP Geolocation API. It provides the capability to fetch and utilize geolocation data based on the user's IP address.






== Configuration ==

**API Key:**
   - **Obtain an API Key:** To use the IP Geolocation API, sign up at [IP Geolocation API](https://ipgeolocation.io/) and get your API key.
    1. Log in to your account at [IP Geolocation API](https://ipgeolocation.io/) to access your API key and manage your settings.
        IP Geolocation Credentials used in this account
        https://app.ipgeolocation.io/login
        digital@okmg.com
        #QlpC$vMXC4D{5x{
    2. Go to the 'Dashboard'.
    3. Copy the API key provided on this page for use.
    4. You can also view your consumed API requests and other details on this page.
   


   
**Redirection Settings:**
   - **Include the Custom File:**
     1. Ensure the custom file for IP geolocation and redirection is included in your theme's `functions.php` file. Add the following line to include the file:
        ```
        require_once get_template_directory() . '/inc/geo_redirect_eu_users.php';
        ```
     2. The `geo_redirect_eu_users.php` file should contain your custom logic for handling IP geolocation and redirection.



- **Customize Redirection Rules:**
    - In the `geo_redirect_eu_users.php` file, the redirection rules are currently set up to handle users based on their location within European countries. You can review and adjust these rules as needed:
    - **EU Countries Check:** The file includes logic to check if a user's country code is part of the European Union (EU). 
    - **Redirection Target:** Users from EU countries who visit specific URLs (e.g., `/the-test`) will be redirected to the designated EU-specific URL (e.g., `/the-test-eu`).
    - Update or modify these rules in `geo_redirect_eu_users.php` if you need to handle additional conditions or change redirection behavior.

