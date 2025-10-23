<?php if (empty($people)): ?>
    <p>No people found.</p>
<?php else: ?>
    <div class="custom_map_section">
        <div class="map">
            <ul class="points">
                <?php foreach ($people as $person): ?>
                    <li>
                        <div class="item_wrap">
                            <div class="img_box">
                                <img src="<?php echo esc_attr($person['image']); ?>"
                                    alt="<?php echo esc_attr($person['name']); ?>">
                            </div>
                            <div class="details_wrap">
                                <h4><?php echo esc_html($person['name']); ?></h4>
                                <h5><?php echo esc_html($person['location']); ?></h5>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/world_map_colorful.svg'; ?>"
                class="map-image" alt="World Map" />
        </div>
    </div>
<?php endif; ?>