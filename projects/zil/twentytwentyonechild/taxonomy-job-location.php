<?php
/**
 * The template for displaying job's location's categories
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
            <p><a class="inherit_parent_color" href="/">Home</a> &gt; <a class="inherit_parent_color" href="/career/">Career</a>  &gt; <a class="inherit_parent_color" href="/career/taxation/">Taxation</a> &gt; <?php single_term_title(); ?></p>
            <hr/>
            <h1 class="fs_56"><?php single_term_title(); ?></h1>
            <?php 
            $term = get_queried_object(); 
            if ($term && !empty($term->description)) : 
            ?>
                <p><?php echo esc_html($term->description); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>


<section class="job_posts_section pt_100 pb_100">
    <div class="container">

        <?php
        $term  = get_queried_object();
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $jobs_args = array(
            'post_type'      => 'job',
            'posts_per_page' => 6,
            'paged'          => $paged,
            'tax_query'      => array(
			'relation' => 'AND',
                array(
                    'taxonomy' => $term->taxonomy,
                    'field'    => 'slug',
                    'terms'    => $term->slug,
                ),
                array(
                    'taxonomy' => 'department',
                    'field'    => 'slug',
                    'terms'    => 'taxation',
                ),
            ),
        );

        $jobs_query = new WP_Query($jobs_args);
        ?>

        <div class="row job_card_row">
            <?php
            if ($jobs_query->have_posts()) :
                while ($jobs_query->have_posts()) : $jobs_query->the_post();

                    $salary_range    = get_field('salary_range');
                    $company_name    = get_field('company_name');
                    $company_address = get_field('company_address');
                    $experience      = get_field('experience');
                    $no_of_applicant = get_field('no_of_applicant');
                    $job_platform_link = get_field('job_platform_link');
                    $company_logo    = get_field('company_logo');

                    $job_types = get_the_terms(get_the_ID(), 'job-type');
                    $is_popular = false;
                    if (!empty($job_types) && !is_wp_error($job_types)) {
                        foreach ($job_types as $type) {
                            if ($type->slug === 'popular') { $is_popular = true; break; }
                        }
                    }
            ?>
                    <div class="col-md-6 col-lg-4 mb_24">
                        <div class="job_card<?php echo $is_popular ? ' popular_job' : ''; ?>">
                            <?php if ($is_popular) : ?>
                                <span class="fast_reponse"><i class="fa-solid fa-star"></i>Most Popular</span>
                            <?php endif; ?>

                            <div class="job_card_header">
                                <h3 class="job_title"><?php the_title(); ?></h3>
                                <?php if ($salary_range) : ?>
                                    <p>
                                        <?php
                                        if (!empty($job_types) && !is_wp_error($job_types)) {
                                            foreach ($job_types as $type) {
                                                if (in_array($type->slug, array('featured','popular'))) continue;
                                                $text_color       = get_field('text_color', 'job-type_' . $type->term_id) ?: '#000000';
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
                                        <?php if ($company_address) : ?>
                                            <p class="company_loc"><i class="fa-solid fa-location-dot"></i> <?php echo esc_html($company_address); ?></p>
                                        <?php endif; ?>
                                        <?php if ($experience) : ?>
                                            <p class="experience"><i class="fa-solid fa-briefcase"></i> <?php echo esc_html($experience); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php if ($no_of_applicant) : ?>
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
            else :
                echo '<p>No jobs found in this category.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div> <!-- .row -->

        <!-- Pagination -->
        <div class="pagination_wrap text-center mt_40">
            <?php
            if ($jobs_query->max_num_pages > 1) {
                echo paginate_links(array(
                    'total'   => $jobs_query->max_num_pages,
                    'current' => max(1, $paged),
                    'mid_size'=> 2,
                    'prev_text'=> '<i class="fa-solid fa-angle-left"></i>',
                    'next_text'=> '<i class="fa-solid fa-angle-right"></i>',
                ));
            }
            ?>
        </div>

    </div>
</section>

<?php
get_footer(); ?>


