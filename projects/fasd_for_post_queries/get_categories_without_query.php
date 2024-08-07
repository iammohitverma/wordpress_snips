<select name="typeOf" class="input_style" style="--selectBg: #ffffff;">
    <option value="">All Audience Groups</option>
    <?php
        $resourceTypes = get_categories( array(
            'hide_empty' => false, // Only retrieve categories with no posts
            'taxonomy' => 'resource-type', // Specify the taxonomy (usually 'category')
            'post_type' => 'resource', // Specify the custom post type
            ) );
            
            if ( $resourceTypes ) {
                foreach ( $resourceTypes as $category ) {
                echo '<option value="'.$category->slug.'">'. $category->name . '</option>';
            }
        } else {
            echo 'No categories found';
        }
    ?>
</select>