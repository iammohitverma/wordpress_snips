<div class="job_departments_wrapper">
     <!-- 🔹 Static "All Jobs" Card -->
    <div class="department_wrap all_jobs">
        <div class="department_icon">
            <img src="/wp-content/uploads/2025/10/all_jobs.svg" alt="All Jobs">
        </div>
        <div class="text_wrap">
            <h4>All Jobs</h4>
            <p>
                <?php
                // Count all published job posts
                $all_jobs_count = wp_count_posts('job');
                echo $all_jobs_count->publish . ' Open position' . ($all_jobs_count->publish > 1 ? 's' : '');
                ?>
            </p>
        </div>
        <a href="<?php echo esc_url(get_post_type_archive_link('job')); ?>" class="department_link cover"></a>
    </div>
    <?php
    // Get all departments (taxonomy terms)
    $departments = get_terms(array(
        'taxonomy'   => 'department',
        'hide_empty' => true,
		'number'     => 5,
		'orderby'    => 'name',
		'order'      => 'ASC',
    ));

    if (!empty($departments) && !is_wp_error($departments)) :
        foreach ($departments as $department) :
            // Basic term info
            $department_name = $department->name;
            $department_link = get_term_link($department);
            $job_count = $department->count;

            // ACF image field (taxonomy term)
            $featured_image = get_field('department_featured_image', 'department_' . $department->term_id);

            // Optional fast response field (if you have one)
            $fast_response = get_field('fast_response', 'department_' . $department->term_id);
            ?>
            
            <div class="department_wrap  <?php echo $fast_response == "yes" ? 'fast_reponse_active' : ''; ?>">
                <?php if ($fast_response == "yes") : ?>
                    <span class="fast_reponse"><img src="/wp-content/uploads/2025/10/response-1.png">Fast Response</span>
                <?php endif; ?>

                <div class="department_icon">
                    <?php if (!empty($featured_image)) : ?>
                        <img src="<?php echo esc_url($featured_image['url']); ?>" alt="<?php echo esc_attr($department_name); ?>">
                    <?php else : ?>
                        <img src="/wp-content/uploads/2025/10/all_jobs.svg" alt="<?php echo esc_attr($department_name); ?>">
                    <?php endif; ?>
                </div>

                <div class="text_wrap">
                    <h4><?php echo esc_html($department_name); ?></h4>
                    <p><?php echo esc_html($job_count); ?> Open position<?php echo $job_count > 1 ? 's' : ''; ?></p>
                </div>

                <a href="<?php echo esc_url($department_link); ?>" class="department_link cover"></a>
            </div>

        <?php endforeach;
    else : ?>
        <p>No departments found.</p>
    <?php endif; ?>
</div>
