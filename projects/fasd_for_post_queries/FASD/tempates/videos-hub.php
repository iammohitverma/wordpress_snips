<?php /* Template Name: Videos Hub */

get_header();
$bg_clr = get_field("section_background_color");
$bws = get_field("banner_without_slider");
$heading = $bws['heading'];
$hdg_color = $bws['heading_text_color'];
$desc = $bws['description'];
$desc_color = $bws['description_text_color'];
$banner_img_id = $bws['banner_image']['ID'];
$banner_img_url = $bws['banner_image']['url'];
$shapes = get_field("shapes");
$right_center_shape = $shape['right_center_shape']['url'];
$left_center_shape = $shape['left_center_shape']['url'];
$bottom_right_shape = $shape['bottom_right_shape']['url'];
$bottom_left_shape = $shape['bottom_left_shape']['url'];
$top_right_shape = $shape['top_right_shape']['url'];
$top_left_shape = $shape['top_left_shape']['url'];

     if (have_rows('modules')) : ?>
        <?php while (have_rows('modules')) : the_row(); 
            $layout_name = get_row_layout();
            //print_r($layout_name);
                $template_part_path = get_stylesheet_directory() . '/template-parts/master-template-sections/' . $layout_name . '.php';
                if (file_exists($template_part_path)) {
                    include($template_part_path);
            }
        ?>
        <?php endwhile; ?>
    <?php endif; ?>

    

        <!-- shapes for all corner | uncomment commented img tag-->
        <?php
        if (!empty($shapes)) {
            foreach ($shapes as $shape) {
                if ($shape == 'Top Left') {
                    echo '<img src="' . esc_url($top_left_shape) . '" alt="" class="top-left">';
                } elseif ($shape == 'Top Right') {
                    echo '<img src="' . esc_url($top_right_shape) . '" alt="" class="top-right">';
                } elseif ($shape == 'Bottom left') {
                    echo '<img src="' . esc_url($bottom_left_shape) . '" alt="" class="bottom-left">';
                } elseif ($shape == 'Bottom Right') {
                    echo '<img src="' . esc_url($bottom_right_shape) . '" alt="" class="bottom-right">';
                } elseif ($shape == 'Left Center') {
                    echo '<img src="' . esc_url($left_center_shape) . '" alt="" class="middle-left">';
                } elseif ($shape == 'Right Center') {
                    echo '<img src="' . esc_url($right_center_shape) . '" alt="" class="middle-right ">';
                } else {
                    // Handle other cases if needed
                    echo "Found something else: $shape\n";
                }
            }
        } else {
            // echo "No shapes selected.";
        }
        ?>
    </section>
    <!-- banner without slider end -->


<!-- colored 2 Column Layout in reverse form  -->
<!-- <section class="colored_2_column_layout" style="background-color: #4F75AD;">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-12 col-sm-10 col-md-6">
                <div class="inner">
                    <img src="http://52.64.249.237/wp-content/uploads/2024/04/about_intro_img.svg" alt="">
                </div>
            </div>
            <div class="col-12 col-sm-10 col-md-6">
                <div class="inner">
                    <h2 class="hdng">
                        About/Introduction
                    </h2>
                    <p class="desc">
                        FASD is only one part of a person’s identity. People with FASD have the same hopes and fears,
                        strengths and difficulties, as we all do. Just like other people with or without a disability,
                        they enjoy a variety of activities and can make a valuable contribution to their community.
                        <br>
                        <br>
                        Learn more about life with FASD, how we diagnose FASD in Australia, and effective management
                        strategies through webinars, training videos, and stories from our community.
                    </p>
                    <a href="#" class="brdr_btn black_btn">View All</a> -->
                <!-- </div>
            </div>
        </div> -->
    <!-- </div> -->

    <!-- shapes -->
    <!-- <img src="http://52.64.249.237/wp-content/uploads/2024/04/about_intro_circle_shape.svg" alt="" class="middle-right">
</section> -->



<!-- results found section start -->
<!-- <section class="results_found">
    <div class="container">
        <div class="tab_slider tabbing_enabled">
            <button class="control prev">
                <img src="http://52.64.249.237/wp-content/uploads/2024/04/tab_slider_prev.svg" alt="">
            </button>
            <button class="control next">
                <img src="http://52.64.249.237/wp-content/uploads/2024/04/tab_slider_next.svg" alt="">
            </button>
            <div class="items">
                <button class="active">Alcohol & pregnancy</button>
                <button>Assessment & diagnosis</button>
                <button>Management, therapy & support</button>
                <button>Professional development</button>
                <button>Research</button>
            </div>
        </div>
        <div class="cat_filter_wrap">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="filter_heading fs_25 underline_style"> <span class="count">48</span> results</h3>
                </div>
                <div class="col-md-6">
                    <div class="filter_options">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input_wrap search">
                                        <input type="search" class="input_style search_style"
                                            style="--selectBg: #F2F2F2;" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_wrap">
                                        <select name="topic" class="input_style" style="--selectBg: #F2F2F2;">
                                            <option value="">Filter</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="post_listing">
            <div class="row"> -->
                <?php
                // $args = array(
                //     'post_type' => 'hubvideo',
                //     'posts_per_page' => 6,
                //     'orderby' => 'publish_date',
                //     'order' => 'ASC',
                //     'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Pagination
                // );

                // $the_query = new WP_Query($args);
                // if ($the_query->have_posts()):
                //     while ($the_query->have_posts()):
                //         $the_query->the_post();
                //         $post_id = get_the_ID();
                //         $thumbnail_url = '';

                //         if (has_post_thumbnail()) {
                //             $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                //         }

                        ?>
                        <!-- <div class="col col-12 col-md-6 col-lg-4 col-lg-4">
                            <div class="post_card box">
                                <div class="img_wrap">
                                    <figure class="videoAayegi" data-target-el="hide-show-toggle"
                                        data-video="https://www.youtube.com/embed/MLpWrANjFbI?autoplay=1&mute=1">
                                        <div class="hideElem">
                                            <img src="<?php //echo $thumbnail_url; ?>" alt="img" class="feat_img" />
                                            <a class="link_arrow" href="<?php //echo the_permalink(); ?>">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </div>
                                    </figure>
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li>
                                            <a href="JavaScript:void(0)"><?php //echo get_the_date(); ?></a>
                                        </li>
                                        <li>
                                            <video src="http://52.64.249.237/wp-content/uploads/2024/04/test.mp4" class="video_duration_src" style="display:none;"></video>
                                            <a class="video_duration" href="JavaScript:void(0)"></a>
                                        </li>
                                        <li> -->
                                            <?php
                                            // $post_tags = get_the_tags();
                                            // if ($post_tags) {
                                            //     foreach ($post_tags as $tag) {
                                            //         echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>'; // Display each tag with a link
                                            //     }
                                            // }
                                            ?>
                                        <!-- </li>
                                    </ul>
                                    <h4 class="post_heading"><a
                                            href="<?php //echo the_permalink(); ?>"><?php //echo the_title(); ?></a></h4>
                                    <p><?php //echo the_excerpt(); ?></p> -->
                                <!-- </div>
                            </div>
                        </div> -->
                        <?php
                    //endwhile;
                    //wp_reset_postdata();

                    // Custom pagination without next and previous buttons
                    // global $wp_query;
                    // $big = 999999999; // Need an unlikely integer
                    // $total_pages = $the_query->max_num_pages;
                    // $current_page = max(1, get_query_var('paged'));
                    // $show_dots_threshold = 5; // Change this threshold as needed
                
                    // if ($total_pages > 1) {
                    //     echo '<div class="post_pagination">';
                    //     echo '<ul>';

                        // // Previous page link
                        // if ($current_page > 1) {
                        //     echo '<li class="page-item control prev"><a class="page-link" href="' . get_pagenum_link($current_page - 1) . '"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_left_arrow.svg" alt="shape"></a></li>';
                        // }

                        // Page numbers
                        // for ($i = 1; $i <= $total_pages; $i++) {
                        //     if ($i == 1 || $i == $total_pages || abs($i - $current_page) < $show_dots_threshold || ($i > $current_page - $show_dots_threshold && $i < $current_page + $show_dots_threshold)) {
                        //         $current_class = ($current_page == $i) ? 'current' : '';
                        //         echo '<li class="page-item count ' . $current_class . '"><a class="page-link" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                        //     } elseif ($i == $current_page + $show_dots_threshold || $i == $current_page - $show_dots_threshold) {
                        //         echo '<li class="page-item count dots"><a class="page-link" href="JavaScript:void(0)">...</a></li>';
                        //     }
                        // }

                        // Next page link
                        // if ($current_page < $total_pages) {
                        //     echo '<li class="page-item control next"><a class="page-link" href="' . get_pagenum_link($current_page + 1) . '"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_right_arrow.svg" alt="shape"></a></li>';
                        // }

                        // echo '</ul>';
                    // }
                    // echo '</div>';

                // else:
                    // No posts found
                // endif;
                ?>
            <!-- </div>
        </div> -->
        <!-- <div class="post_pagination">
            <ul>
                <li class="control prev">
                    <a href="#">
                        <img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_left_arrow.svg" alt="shape">
                    </a>
                </li>
                <li class="count">
                    <a href="#">1</a>
                </li>
                <li class="count current">
                    <a href="#">2</a>
                </li>
                <li class="count">
                    <a href="#">3</a>
                </li>
                <li class="count">
                    <a href="#">...</a>
                </li>
                <li class="count">
                    <a href="#">24</a>
                </li>
                <li class="control next">
                    <a href="#">
                        <img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_right_arrow.svg" alt="shape">
                    </a>
                </li>
            </ul>
        </div> -->
    <!-- </div> -->
    <!-- shapes -->
    <!-- <img src="http://52.64.249.237/wp-content/uploads/2024/04/results_circle_shape.svg" alt="shape" class="sec_shape right_center"> -->
<!-- </section> -->
<!-- results found section end -->


<!-- looking for more videos start -->
<!-- <section class="looking_videos" style="background-color: #fafbf7">
    <div class="container">
        <div class="text_wrap text-center">
            <h3 class="sec_heading underline_style">Looking for more videos?</h3>
            <p>Visit our YouTube channel to stay up-to-date.</p>
            <a href="#" class="fasd_btn fill_btn" style="--btnClr:#BF4846">Click Here</a>
        </div>
    </div> -->
    <!-- shapes -->
    <!-- <img src="http://52.64.249.237/wp-content/uploads/2024/04/light_orange_leaf.svg" alt="shape" class="sec_shape bottom_left"> -->
<!-- </section> -->
<!-- looking for more videos end -->

<!-- colored 2 Column Layout in reverse form  -->
<!-- <section class="colored_2_column_layout" style="background-color: #295576;">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-12 col-sm-10 col-md-6">
                <div class="inner">
                    <img src="http://52.64.249.237/wp-content/uploads/2024/04/acknowledgements_img.svg" alt="">
                </div>
            </div>
            <div class="col-12 col-sm-10 col-md-6">
                <div class="inner">
                    <h2 class="hdng">
                        Acknowledgements
                    </h2>
                    <p class="desc">
                        Our thanks go to the remarkable families who gave their time and invited us into their homes,
                        school and life. Their stories are testament to their hardwork, dedication, love and resilience
                        in bringing up these children and young people.
                        <br>
                        <br>
                        We also acknowledge the expertise and professionalism of the health professionals who gave us
                        their time to film in their clinics and offices.
                    </p> -->
                    <!-- <a href="#" class="brdr_btn black_btn">View All</a> -->
                <!-- </div>
            </div>
        </div>
    </div> -->

    <!-- shapes -->
    <!-- <img src="/wp-content/uploads/2024/04/middle-right-shape-1.png" alt="" class="middle-right"> -->
<!-- </section> -->

<?php get_footer(); ?>