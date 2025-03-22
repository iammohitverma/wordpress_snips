<?php if( have_rows('your_repeater_field') ): ?>
    <div class="repeater-list">
        <?php 
        $popup_data = []; // Store data in array
        $index = 0;

        while( have_rows('your_repeater_field') ): the_row(); 
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            
            // Store data in PHP array
            $popup_data[$index] = [
                'title' => $title,
                'description' => $description
            ];
        ?>
            <div class="repeater-item">
                <button class="open-popup" data-index="<?php echo $index; ?>">
                    <?php echo esc_html($title); ?>
                </button>
            </div>
        <?php 
            $index++;
        endwhile; 
        ?>

        <!-- Pass PHP array to JavaScript -->
        <script>
            var popupData = <?php echo json_encode($popup_data); ?>;
        </script>
    </div>

    <!-- Popup Modal -->
    <div id="popup-modal" class="popup">
        <div class="popup-content">
            <span class="close-popup">&times;</span>
            <h2 id="popup-title"></h2>
            <p id="popup-description"></p>
        </div>
    </div>
<?php endif; ?>
