<?php
$heading = get_sub_field('heading');
?>

<section class="job-section section-space pt-0">
    <div class="container">
        <h2 class="job-title text-center mb-lg-5 mb-3"><?php echo esc_html($heading); ?></h2>

        <div class="accordion" id="jobAccordion">

            <?php
            $args = array(
                'post_type' => 'career',
                'posts_per_page' => -1,
            );

            $career_query = new WP_Query($args);
            $count = 0;

            if ($career_query->have_posts()):
                while ($career_query->have_posts()):
                    $career_query->the_post();
                    $count++;
                    $job_id = get_the_ID();
                    // $job_title = get_the_title();
            
                    // ACF fields
                    $job_title = get_field('job_title', $job_id);
                    $experience = get_field('experience_required', $job_id);
                    $responsibilities = get_field('key_responsibilities', $job_id);
                    $description = get_field('job_description', $job_id);
                    $form_shortcode = get_field('form_shortcode', $job_id);

                    // Taxonomies
                    $department = wp_get_post_terms($job_id, 'department', array('fields' => 'names'));
                    $location = wp_get_post_terms($job_id, 'location', array('fields' => 'names'));
                    $job_type = wp_get_post_terms($job_id, 'job-type', array('fields' => 'names'));

                    // Accordion ID
                    $heading_id = 'heading' . $count;
                    $collapse_id = 'collapse' . $count;
                    $show = $count === 1 ? 'show' : '';
                    $collapsed = $count === 1 ? '' : 'collapsed';
                    ?>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                            <button class="accordion-button <?php echo esc_attr($collapsed); ?> job-position" type="button"
                                data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>">
                                <p class="mb-0">Job Title: <?php echo esc_html($job_title); ?></p>
                            </button>
                        </h2>

                        <div id="<?php echo esc_attr($collapse_id); ?>"
                            class="accordion-collapse collapse <?php echo esc_attr($show); ?>" data-bs-parent="#jobAccordion">
                            <div class="accordion-body py-lg-5 py-3 px-0" data-job_title="<?php echo esc_attr($job_title); ?>"
                                data-department="<?php echo esc_attr(implode(', ', $department)); ?>"
                                data-location="<?php echo esc_attr(implode(', ', $location)); ?>"
                                data-experience="<?php echo esc_attr($experience); ?>"
                                data-job_type="<?php echo esc_attr(implode(', ', $job_type)); ?>">
                                <?php if (!empty($department)): ?>
                                    <p><span class="red fw-bold">Department:</span>
                                        <?php echo esc_html(implode(', ', $department)); ?></p>
                                <?php endif; ?>

                                <?php if (!empty($location)): ?>
                                    <p><span class="red fw-bold">Location:</span> <?php echo esc_html(implode(', ', $location)); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($experience)): ?>
                                    <p><span class="red fw-bold">Experience Required:</span> <?php echo esc_html($experience); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($job_type)): ?>
                                    <p>
                                        <span class="red fw-bold">Job Type:</span> <?php echo esc_html(implode(', ', $job_type)); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($responsibilities)): ?>
                                    <?php echo wp_kses_post($responsibilities); ?>
                                <?php endif; ?>

                                <?php if (!empty($description)): ?>
                                    <?php echo wp_kses_post($description); ?>
                                <?php endif; ?>

                                <!-- Form Shortcode or HTML -->
                                <?php
                                echo do_shortcode($form_shortcode);
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No job openings available at the moment.</p>';
            endif;
            ?>

        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accordionItems = document.querySelectorAll('.job-section .accordion-body');

        accordionItems.forEach(item => {
            const form = item.querySelector('form');
            if (!form) return;

            const jobTitle = item.dataset.job_title || '';
            const department = item.dataset.department || '';
            const location = item.dataset.location || '';
            const experience = item.dataset.experience || '';
            const jobType = item.dataset.job_type || '';

            // Set hidden input values
            form.querySelector('[name="job_title"]')?.setAttribute('value', jobTitle);
            form.querySelector('[name="department"]')?.setAttribute('value', department);
            form.querySelector('[name="location"]')?.setAttribute('value', location);
            form.querySelector('[name="experience"]')?.setAttribute('value', experience);
            form.querySelector('[name="job_type"]')?.setAttribute('value', jobType);
        });
    });
</script>