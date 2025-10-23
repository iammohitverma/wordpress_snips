<?php
/**
 * The template for displaying job archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package twentytwentyonechild
 */

get_header();
?>

<section class="breadcrumb_section pt_100 pb_100">
    <div class="container">
        <div class="text_wrap">
            <p><a class="inherit_parent_color" href="/">Home</a> &gt; <a class="inherit_parent_color"
                    href="/career/">Career</a> &gt; All Jobs</p>
            <hr />
            <h1 class="fs_56">All Jobs</h1>
            <p>Browse a wide range of job opportunities across different categories, all in one place</p>
        </div>
    </div>
</section>


<!-- Featured Jobs -->
<section class="featured_jobs pt_100 pb_100">
    <div class="container">
        <div class="head mb_40">
            <h2 class="fs_56">Featured Jobs</h2>
        </div>
        <div class="row">
            <?php
            // Query featured jobs
            $args = array(
                'post_type' => 'job',
                'posts_per_page' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'job-type',
                        'field' => 'slug',
                        'terms' => 'featured',
                    ),
                ),
            );

            $featured_jobs = new WP_Query($args);

            if ($featured_jobs->have_posts()):
                while ($featured_jobs->have_posts()):
                    $featured_jobs->the_post();

                    // ACF fields
                    $salary_range = get_field('salary_range');
                    $company_name = get_field('company_name');
                    $company_address = get_field('company_address');
                    $experience = get_field('experience');
                    $no_of_applicant = get_field('no_of_applicant');
                        $job_platform_link = get_field('job_platform_link');
                    $company_logo = get_field('company_logo');

                    ?>
                    <div class="col-md-6 col-lg-4 mb_24">
                        <?php
                        $job_types = get_the_terms(get_the_ID(), 'job-type');
                        $is_popular = false;
                        if (!empty($job_types) && !is_wp_error($job_types)) {
                            foreach ($job_types as $type) {
                                if ($type->slug === 'popular') {
                                    $is_popular = true;
                                    break;
                                }
                            }
                        }
						
						 // Check department taxonomy for "Taxation"
                        $departments = get_the_terms(get_the_ID(), 'department');
                        $is_taxation = false;

                        if (!empty($departments) && !is_wp_error($departments)) {
                            foreach ($departments as $dept) {
                                if ($dept->slug === 'taxation' || strtolower($dept->name) === 'Taxation') {
                                    $is_taxation = true;
                                    break;
                                }
                            }
                        }
                        ?>
                        <div class="job_card<?php echo $is_popular ? ' popular_job' : ''; echo $is_taxation ? ' taxation_post' : ''; ?> ">

                            <?php echo $is_popular ? '  <span class="fast_reponse"><i class="fa-solid fa-star"></i>Most Popular</span>' : ''; ?>


                            <div class="job_card_header">
                                <h3 class="job_title"><?php the_title(); ?></h3>
                                <?php if ($salary_range): ?>
                                    <p>
                                        <?php
                                        // Get job-type terms for this job
                                        $job_types = get_the_terms(get_the_ID(), 'job-type');

                                        if (!empty($job_types) && !is_wp_error($job_types)) {
                                            foreach ($job_types as $type) {
                                                // Skip the "featured" tag
                                                if (($type->slug === 'featured') || ($type->slug === 'popular')) {
                                                    continue;
                                                }

                                                // Get ACF color fields from the taxonomy term
                                                $text_color = get_field('text_color', 'job-type_' . $type->term_id);
                                                $background_color = get_field('background_color', 'job-type_' . $type->term_id);

                                                // Fallbacks (optional)
                                                if (!$text_color)
                                                    $text_color = '#000000';
                                                if (!$background_color)
                                                    $background_color = '#f1f1f1';

                                                echo '<span class="job_type" style="color:' . esc_attr($text_color) . '; background-color:' . esc_attr($background_color) . ';">' . esc_html($type->name) . '</span> ';
                                            }
                                        } else {
                                            echo '<span class="job_type">N/A</span>';
                                        }
                                        ?>
                                        Salary: <?php echo esc_html($salary_range); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="job_card_body">
                                <div class="company_wrap">
                                    <div class="img_wrap">
                                        <?php
                                        if (is_array($company_logo)) {
                                            $logo_url = esc_url($company_logo['url']);
                                            echo '<img src="' . $logo_url . '" alt="' . esc_attr($company_name) . '">';
                                        } ?>
                                    </div>
                                    <div class="about_company">
                                        <h4 class="company_name"><?php echo esc_html($company_name); ?></h4>
                                        <?php if ($company_address): ?>
                                            <p class="company_loc"><i class="fa-solid fa-location-dot"></i>
                                                <?php echo esc_html($company_address); ?></p>
                                        <?php endif; ?>
                                        <?php if ($experience): ?>
                                            <p class="experience"><i class="fa-solid fa-briefcase"></i>
                                                <?php echo esc_html($experience); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if ($no_of_applicant): ?>
                                    <div class="applicants">
                                        <img src="/wp-content/uploads/2025/10/applicants.png" alt="Applicants">
                                        <p><?php echo esc_html($no_of_applicant); ?>+ applicants</p>
                                    </div>
                                <?php endif; ?>
                            </div>

                             <div class="job_card_footer">
                                <?php if (!$is_popular): ?>
                                    <?php if ($job_platform_link):
                                        $link_url = $job_platform_link['url'];
                                        $link_title = $job_platform_link['title'];
                                        $link_target = $job_platform_link['target'] ? $job_platform_link['target'] : '_self';
                                        ?>
                                        <a class="apply_linkedin" href="<?php echo esc_url($link_url); ?>"
                                            target="<?php echo esc_attr($link_target); ?>" rel="noopener" class="apply_linkedin">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    <?php endif; ?>
                                    <a href="javascript:void(0)" class="apply_zillion">Apply via Zillion</a>
                                <?php else: ?>
                                    <a href="/tap/" class="">Learn & Earn - TAP</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No featured jobs available right now.</p>';
            endif;
            ?>
        </div>
    </div>
</section>


<!-- Jobs Filter -->
<section class="jobs_filter pb_100">
    <div class="container">
        <div class="top">
            <div class="filter_form">
                <form action="<?php echo esc_url(home_url('/career/all-jobs/')); ?>" method="get">
                    <div class="form_row">
                        <!-- Job Title Search -->
                        <div class="field_wrap">
                            <input type="text" name="job_title" id="job_title" placeholder="Job Title"
                                class="form-control field"
                                value="<?php echo isset($_GET['job_title']) ? esc_attr($_GET['job_title']) : ''; ?>">
                        </div>

                        <!-- Job Location Dropdown -->
                        <div class="field_wrap">
                            <select name="location" id="location" class="form-select field">
                                <option value="" disabled selected>Select Location</option>
                                <?php
                                $locations = get_terms(array(
                                    'taxonomy' => 'job-location',
                                    'hide_empty' => false,
                                ));
                                if (!empty($locations) && !is_wp_error($locations)) {
                                    foreach ($locations as $location) {
                                        $selected = (isset($_GET['location']) && $_GET['location'] === $location->slug) ? 'selected' : '';
                                        echo '<option value="' . esc_attr($location->slug) . '" ' . $selected . '>' . esc_html($location->name) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Department Dropdown -->
                        <div class="field_wrap">
                            <select name="department" id="department" class="form-select field">
                                <option value="" disabled selected>Select Department</option>
                                <?php
                                $departments = get_terms(array(
                                    'taxonomy' => 'department',
                                    'hide_empty' => false,
                                ));
                                if (!empty($departments) && !is_wp_error($departments)) {
                                    foreach ($departments as $dept) {
                                        $selected = (isset($_GET['department']) && $_GET['department'] === $dept->slug) ? 'selected' : '';
                                        echo '<option value="' . esc_attr($dept->slug) . '" ' . $selected . '>' . esc_html($dept->name) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="submit_wrap">
                            <input type="submit" value="Search Job" class="submit_btn">
                        </div>
                    </div>
                </form>
            </div>

            <div class="filter_icon_boxes">
                <ul>
                    <li>
                        <img src="/wp-content/uploads/2025/10/Jobs.svg" alt="Jobs">
                        <div class="text">
                            <h4>2,000+</h4>
                            <p>Jobs</p>
                        </div>
                    </li>
                    <li>
                        <img src="/wp-content/uploads/2025/10/Candidates.svg" alt="Candidates">
                        <div class="text">
                            <h4>5,300+</h4>
                            <p>Candidates</p>
                        </div>
                    </li>
                    <li>
                        <img src="/wp-content/uploads/2025/10/Companies.svg" alt="Companies">
                        <div class="text">
                            <h4>320+</h4>
                            <p>Companies</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="bottom" id="job-results">
            <?php
            // Pagination setup
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            // Get search parameters
            $job_title = isset($_GET['job_title']) ? sanitize_text_field($_GET['job_title']) : '';
            $location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : '';
            $department = isset($_GET['department']) ? sanitize_text_field($_GET['department']) : '';

            // Base query
            $args = array(
                'post_type' => 'job', // Only jobs
                'posts_per_page' => 6,
                'paged' => $paged,
                'post_status' => 'publish',
            );

            // Taxonomy filters
            $tax_query = array('relation' => 'AND');

            if (!empty($location)) {
                $tax_query[] = array(
                    'taxonomy' => 'job-location',
                    'field' => 'slug',
                    'terms' => $location,
                );
            }
            if (!empty($department)) {
                $tax_query[] = array(
                    'taxonomy' => 'department',
                    'field' => 'slug',
                    'terms' => $department,
                );
            }
            if (count($tax_query) > 1) {
                $args['tax_query'] = $tax_query;
            }
            // Job Title search (post title)
            if (!empty($job_title)) {
                $args['s'] = trim($job_title);
            }

            $jobs_query = new WP_Query($args);
            ?>

            <!-- Job Results Heading -->
            <div class="head mb_40">
                <h3 class="fs_56">
                    Job Results
                    <?php
                    if ($jobs_query->found_posts > 0) {
                        echo ' (' . esc_html($jobs_query->found_posts) . ' found)';
                    } else {
                        echo ' (No results found)';
                    }
                    ?>
                </h3>
            </div>

            <!-- Job Cards -->
            <div class="row job_card_row">
                <?php
                if ($jobs_query->have_posts()):
                    while ($jobs_query->have_posts()):
                        $jobs_query->the_post();

                        $salary_range = get_field('salary_range');
                        $company_name = get_field('company_name');
                        $company_address = get_field('company_address');
                        $experience = get_field('experience');
                        $no_of_applicant = get_field('no_of_applicant');
                        $job_platform_link = get_field('job_platform_link');
                        $company_logo = get_field('company_logo');

                        $job_types = get_the_terms(get_the_ID(), 'job-type');
                        $is_popular = false;
                        if (!empty($job_types) && !is_wp_error($job_types)) {
                            foreach ($job_types as $type) {
                                if ($type->slug === 'popular') {
                                    $is_popular = true;
                                    break;
                                }
                            }
                        }
                        ?>
                        <div class="col-md-6 col-lg-4 mb_24">
                            <div class="job_card<?php echo $is_popular ? ' popular_job' : ''; ?>">
                                <?php if ($is_popular): ?>
                                    <span class="fast_reponse"><i class="fa-solid fa-star"></i>Most Popular</span>
                                <?php endif; ?>

                                <div class="job_card_header">
                                    <h3 class="job_title"><?php the_title(); ?></h3>
                                    <?php if ($salary_range): ?>
                                        <p>
                                            <?php
                                            if (!empty($job_types) && !is_wp_error($job_types)) {
                                                foreach ($job_types as $type) {
                                                    if (in_array($type->slug, array('featured', 'popular')))
                                                        continue;
                                                    $text_color = get_field('text_color', 'job-type_' . $type->term_id) ?: '#000000';
                                                    $background_color = get_field('background_color', 'job-type_' . $type->term_id) ?: '#f1f1f1';
                                                    echo '<span class="job_type" style="color:' . esc_attr($text_color) . '; background-color:' . esc_attr($background_color) . ';">' . esc_html($type->name) . '</span> ';
                                                }
                                            }
                                            ?>
                                            Salary: <?php echo esc_html($salary_range); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div class="job_card_body">
                                    <div class="company_wrap">
                                        <div class="img_wrap">
                                            <?php
                                            if (is_array($company_logo)) {
                                                echo '<img src="' . esc_url($company_logo['url']) . '" alt="' . esc_attr($company_name) . '">';
                                            }
                                            ?>
                                        </div>
                                        <div class="about_company">
                                            <h4 class="company_name"><?php echo esc_html($company_name); ?></h4>
                                            <?php if ($company_address): ?>
                                                <p class="company_loc"><i class="fa-solid fa-location-dot"></i>
                                                    <?php echo esc_html($company_address); ?></p>
                                            <?php endif; ?>
                                            <?php if ($experience): ?>
                                                <p class="experience"><i class="fa-solid fa-briefcase"></i>
                                                    <?php echo esc_html($experience); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if ($no_of_applicant): ?>
                                        <div class="applicants">
                                            <img src="/wp-content/uploads/2025/10/applicants.png" alt="Applicants">
                                            <p><?php echo esc_html($no_of_applicant); ?>+ applicants</p>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="job_card_footer">
                                    <?php if (!$is_popular): ?>
                                        <?php if ($job_platform_link):
                                            $link_url = $job_platform_link['url'];
                                            $link_title = $job_platform_link['title'];
                                            $link_target = $job_platform_link['target'] ? $job_platform_link['target'] : '_self';
                                            ?>
                                            <a class="apply_linkedin" href="<?php echo esc_url($link_url); ?>"
                                                target="<?php echo esc_attr($link_target); ?>" rel="noopener" class="apply_linkedin">
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        <?php endif; ?>
                                        <a href="javascript:void(0)" class="apply_zillion">Apply via Zillion</a>
                                    <?php else: ?>
                                        <a href="/tap/" class="">Learn & Earn - TAP</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div> <!-- .row -->

            <!-- Pagination -->
            <div class="pagination_wrap text-center mt_40">
                <?php
                if ($jobs_query->max_num_pages > 1) {
                    echo paginate_links(array(
                        'total' => $jobs_query->max_num_pages,
                        'current' => max(1, $paged),
                        'mid_size' => 2,
                        'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                        'next_text' => '<i class="fa-solid fa-angle-right"></i>',
                    ));
                }
                ?>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Check if any GET parameters exist
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('job_title') || urlParams.has('location') || urlParams.has('department')) {
            const jobResults = document.getElementById('job-results');
            if (jobResults) {
                jobResults.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    });
</script>


<?php
get_footer(); ?>