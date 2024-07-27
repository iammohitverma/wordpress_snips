<?php
/* Template Name: Commercial Projects */
get_header('commercial');
?>

<?php
if (have_rows('sections')):

    while (have_rows('sections')):
        the_row();

        if (get_row_layout() == 'commercial_projects_sections'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $center_image = get_sub_field('center_image');
            ?>

            <section class="projects_sec">
            <div class="preloader">
                    <img src="/wp-content/uploads/2024/07/preloader2.gif" alt="">
                </div>
                <div class="projects_sec_wrap">
                    <div class="container">
                        <div class="sec_heading">
                            <h1 class="hdng text-center"><?php echo esc_html($heading); ?></h1>
                            <p><?php echo $description; ?></p>
                            <div class="categories">
                                <?php
                               $count = 1;
                               $project_Category = get_categories(
                                   array(
                                       'hide_empty' => false, // Only retrieve categories with no posts
                                       'taxonomy' => 'project-category', // Specify the taxonomy (usually 'category')
                                       'post_type' => 'project', // Specify the custom post type
                                   )
                               );
                               
                               if ($project_Category) {
                                   foreach ($project_Category as $category) {
                                       echo '<button class="brdr_btn filter_projects';
                                       if ($count == 1) {
                                           echo ' active';
                                       }
                                       echo '" data-tab="' . $category->slug . '" data-post-type="projects" data-taxonomy="project-category">' . $category->name . '</button>';
                                       $count++;
                                   }
                               } else {
                                   echo 'No categories found';
                               }
                               ?>
                            </div>

                            <img src="<?php echo esc_url($center_image['url']); ?>"
                                alt="<?php echo esc_attr($center_image['alt']); ?>">
                        </div>
                    </div>
                    <div class="project_list">
                        <?php
                        $posts = get_sub_field('post_type');
                        if ($posts): ?>
                            <?php foreach ($posts as $post):
                                setup_postdata($post);

                                $permalink = get_permalink($post->ID);
                                $title = get_the_title($post->ID);
                                $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');

                                // Fallback for missing featured image
                                if (!$featured_img_url) {
                                    $featured_img_url = 'path/to/fallback/image.jpg'; // Provide a fallback image URL
                                }
                                ?>
                                <div class="project_list_images">
                                    <div class="project_image">
                                        <img src="<?php echo esc_url($featured_img_url); ?>"
                                            alt="Project image for <?php echo esc_attr($title); ?>">
                                    </div>
                                    <div class="project_image_info">
                                        <h3 class="hdng"><?php echo esc_html($title); ?></h3>
                                    </div>
                                    <a href="<?php echo esc_url($permalink); ?>" class="absolute_set"></a>
                                </div>
                            <?php endforeach; ?>
                            <?php
                            // Reset the global post object so that the rest of the page works correctly.
                            wp_reset_postdata(); ?>
                        <?php else: ?>
                            <p>No projects found.</p>
                        <?php endif; ?>
                    </div>

                </div>
            </section>

            <?php
        endif;

        // End loop.
    endwhile;

    // No value.
else:
    // Do something...
endif;
?>

<?php get_footer('commercial'); ?>