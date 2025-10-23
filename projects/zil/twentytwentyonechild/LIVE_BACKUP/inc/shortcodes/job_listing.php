<section class="career_section">
    <div class="career_section_wrap">
        <div class="container">
            <div class="nab_tabs">
                <div class="nab_tabs_wrap">
                    <div class="nab_tab_head">
                        <ul>
                            <li class="active" data-tab="all_jobs">All Jobs</li>
                            <?php
                            $departments = get_terms(array(
                                'taxonomy' => 'department',
                                'hide_empty' => true,
                            ));
                            if (!empty($departments)) {
                                foreach ($departments as $department) {
                                    echo '<li data-tab="' . esc_attr($department->slug) . '">' . esc_html($department->name) . '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="nav_tab_body">
                        <div class="tab_content active" data-val="all_jobs">
                            <?php
                            $all_jobs = new WP_Query(array(
                                'post_type' => 'job',
                                'posts_per_page' => -1,
                            ));
                            if ($all_jobs->have_posts()) :
                            ?>
                                <div class="career_card_wrap">
                                    <div class="row gy-4">
                                        <?php while ($all_jobs->have_posts()) : $all_jobs->the_post(); ?>
                                            <?php
                                            $job_types = get_the_terms(get_the_ID(), 'job-type');
                                            $salary = get_post_meta(get_the_ID(), 'salary_range', true);
                                            $experience = get_post_meta(get_the_ID(), 'experience', true);
                                            $company_name = get_post_meta(get_the_ID(), 'company_name', true);
                                            $location = get_post_meta(get_the_ID(), 'location', true);
                                            $applicant = get_post_meta(get_the_ID(), 'no_of_applicant', true);
                                            ?>
                                            <div class="col-lg-6 col-xl-4">
                                                <div class="career_cards">
                                                    <h3 class="title"><?php the_title(); ?></h3>
                                                    <div class="job_details">
                                                        <ul>
                                                            <?php if (!empty($job_types) && !is_wp_error($job_types)) : ?>
															<?php foreach ($job_types as $type) : ?>
																<?php if (is_object($type)) : ?>
																	<li class="<?php echo esc_attr($type->slug); ?>"><?php echo esc_html($type->name); ?></li>
																<?php endif; ?>
															<?php endforeach; ?>
														<?php endif; ?>
                                                        </ul>
                                                        <?php if ($salary) : ?>
                                                            <span>Salary: <?php echo esc_html($salary); ?></span>
                                                        <?php endif; ?>
                                                    </div>
													<div class="company_details">
														<div class="logo">
															<img src="/wp-content/uploads/2025/09/zillion-logo.png" alt="image">
														</div>
                                                    <div class="details">
														<?php if ($company_name) : ?>
                                                        <h3 class="com_name"><?php echo esc_html($company_name); ?></h3>
														 <?php endif; ?>
                                                        <ul>
															<?php if ($location) : ?>
                                                            <li>
                                                                <span><?php echo esc_html($location); ?></span>
                                                            </li>
															 <?php endif; ?>
                                                            <?php if ($experience) : ?>
                                                            <li>
                                                                <span><?php echo esc_html($experience); ?></span>
                                                            </li>
															 <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
											  <div class="applicant_details">
                                                    <div class="applicant_images">
                                                        <img src="/wp-content/uploads/2025/09/applicant.png" alt="image">
                                                    </div>
													<?php if ($applicant) : ?>
                                                    <div class="applicant_no">
                                                        <span><?php echo esc_html($applicant); ?>+ applicants</span>
                                                    </div>
													<?php endif; ?>
                                                </div>
                                                    <div class="button_wrap">
                                                        <a href="#">Apply via LinkedIn</a>
                                                        <a href="#">Apply via Zillion</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p>No jobs available.</p>
                            <?php endif; ?>
                        </div>

                        <?php foreach ($departments as $department) : ?>
                            <div class="tab_content" data-val="<?php echo esc_attr($department->slug); ?>">
                                <?php
                                $dept_jobs = new WP_Query(array(
                                    'post_type' => 'job',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'department',
                                            'field'    => 'slug',
                                            'terms'    => $department->slug,
                                        ),
                                    ),
                                    'posts_per_page' => -1,
                                ));
                                if ($dept_jobs->have_posts()) :
                                ?>
                                    <div class="career_card_wrap">
                                        <div class="row gy-4">
                                            <?php while ($dept_jobs->have_posts()) : $dept_jobs->the_post(); ?>
                                                <?php
                                                $job_types = get_the_terms(get_the_ID(), 'job-type');
                                                $salary = get_post_meta(get_the_ID(), '_salary', true);
                                                ?>
                                                <div class="col-lg-6 col-xl-4">
                                                    <div class="career_cards">
                                                        <h3 class="title"><?php the_title(); ?></h3>
                                                        <div class="job_details">
                                                            <ul>
                                                               <?php if (!empty($job_types) && !is_wp_error($job_types)) : ?>
																<?php foreach ($job_types as $type) : ?>
																	<?php if (is_object($type)) : ?>
																		<li class="<?php echo esc_attr($type->slug); ?>"><?php echo esc_html($type->name); ?></li>
																	<?php endif; ?>
																<?php endforeach; ?>
															<?php endif; ?>

                                                            </ul>
                                                            <?php if ($salary) : ?>
                                                                <span>Salary: <?php echo esc_html($salary); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="button_wrap">
                                                            <a href="#">Apply via LinkedIn</a>
                                                            <a href="#">Apply via Zillion</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; wp_reset_postdata(); ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <p>No jobs found in <?php echo esc_html($department->name); ?>.</p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
