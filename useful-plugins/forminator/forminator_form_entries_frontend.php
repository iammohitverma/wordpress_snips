<?php /* Template Name: test_form */ 
get_header(); ?>


<style>
    .entries_wrapper{
        padding: 100px 0;
    }
    table{
        width: 100%;
    }
    tr:nth-child(even) td{
        background: lightgrey
    }
    th,
    td{
        padding: 15px;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.15)
    }
    th{
        background-color: #00582b;
        color: #fff
    }
</style>

<div class="container">
    <?php echo do_shortcode('[forminator_form id="881"]');?>
    <?php echo do_shortcode('[forminator_form id="886"]');?>
    <!-- <?php // echo do_shortcode('[wpdatatable id=1]');?> -->

    <div class="entries_wrapper">
        <h2>Custom Form</h2>
        <?php
            $form_id = 881; // Replace with your form ID
            $per_page = 10; // Number of entries per page
            $current_page = 1; // Current page number
            $current_user_id = get_current_user_id(); // Get the current user's ID
            
            if ($current_user_id) {
                // Retrieve entries for the specified form
                $entries = Forminator_API::get_entries($form_id, $per_page, $current_page);
                $user_entries = [];
                
                // Filter entries to include only those submitted by the current user
                foreach ($entries as $entry) {
                    // Replace 'hidden-1' with the actual field ID of your hidden user ID field
                    if (isset($entry->meta_data['hidden-1']['value']) && $entry->meta_data['hidden-1']['value'] == $current_user_id) {
                        $user_entries[] = $entry;
                    }
                }
                
              
                // Check if there are any entries for the current user
                if (!empty($user_entries)) {
                    echo '<table border="1" cellspacing="0" cellpadding="5">';
                    echo '<tr><th>Entry ID</th><th>Date Created</th><th>Name</th><th>Email</th><th>Phone</th></tr>';
            
                    // Loop through each user entry and display in table rows
                    foreach ($user_entries as $entry) {
                        $name = isset($entry->meta_data['name-1']['value']) ? $entry->meta_data['name-1']['value'] : 'N/A';
                        $email = isset($entry->meta_data['email-1']['value']) ? $entry->meta_data['email-1']['value'] : 'N/A';
                        $phone = isset($entry->meta_data['phone-1']['value']) ? $entry->meta_data['phone-1']['value'] : 'N/A';
            
                        echo '<tr>';
                        echo '<td>' . esc_html($entry->entry_id) . '</td>';
                        echo '<td>' . esc_html($entry->date_created) . '</td>';
                        echo '<td>' . esc_html($name) . '</td>';
                        echo '<td>' . esc_html($email) . '</td>';
                        echo '<td>' . esc_html($phone) . '</td>';
                        echo '</tr>';
                    }
            
                    echo '</table>';
                } else {
                    echo 'No entries found for the current user.';
                }
            } else {
                echo 'User not logged in.';
            }
        ?>
    </div>

    <div class="entries_wrapper">
        <h2>Custom Form2</h2>
        <?php
            $form_id = 881; // Replace with your form ID
            $per_page = 10; // Number of entries per page
            $current_page = 1; // Current page number
            $current_user_id = get_current_user_id(); // Get the current user's ID
            
            if ($current_user_id) {
                // Retrieve entries for the specified form
                $entries = Forminator_API::get_entries($form_id, $per_page, $current_page);
                $user_entries = [];
                
                // Filter entries to include only those submitted by the current user
                foreach ($entries as $entry) {
                    // Replace 'hidden-1' with the actual field ID of your hidden user ID field
                    if (isset($entry->meta_data['hidden-1']['value']) && $entry->meta_data['hidden-1']['value'] == $current_user_id) {
                        $user_entries[] = $entry;
                    }
                }
                
              
                // Check if there are any entries for the current user
                if (!empty($user_entries)) {
                    echo '<table border="1" cellspacing="0" cellpadding="5">';
                    echo '<tr><th>Entry ID</th><th>Date Created</th><th>Name</th><th>Email</th><th>Phone</th></tr>';
            
                    // Loop through each user entry and display in table rows
                    foreach ($user_entries as $entry) {
                        $name = isset($entry->meta_data['name-1']['value']) ? $entry->meta_data['name-1']['value'] : 'N/A';
                        $email = isset($entry->meta_data['email-1']['value']) ? $entry->meta_data['email-1']['value'] : 'N/A';
                        $phone = isset($entry->meta_data['phone-1']['value']) ? $entry->meta_data['phone-1']['value'] : 'N/A';
            
                        echo '<tr>';
                        echo '<td>' . esc_html($entry->entry_id) . '</td>';
                        echo '<td>' . esc_html($entry->date_created) . '</td>';
                        echo '<td>' . esc_html($name) . '</td>';
                        echo '<td>' . esc_html($email) . '</td>';
                        echo '<td>' . esc_html($phone) . '</td>';
                        echo '</tr>';
                    }
            
                    echo '</table>';
                } else {
                    echo 'No entries found for the current user.';
                }
            } else {
                echo 'User not logged in.';
            }
        ?>
    </div>

</div>

<?php get_footer(); ?>