<!-- results found section start -->
<?php 
$shapes = get_sub_field("shapes");
$top_left_shape = get_sub_field("top_left_shape");
$right_center_shape = get_sub_field("right_center_shape");
$left_center_shape = get_sub_field("left_center_shape");
$bottom_right_shape = get_sub_field("bottom_right_shape");
$bottom_left_shape = get_sub_field("bottom_left_shape");
$top_right_shape = get_sub_field("top_right_shape");
?>
<section class="results_found pt_100">
    <div class="container">
        <div class="tab_slider tabbing_enabled">
            <button class="control prev">
                <img src="http://52.64.249.237/wp-content/uploads/2024/04/tab_slider_prev.svg" alt="">
            </button>
            <button class="control next">
                <img src="http://52.64.249.237/wp-content/uploads/2024/04/tab_slider_next.svg" alt="">
            </button>
            <div class="items">
                <?php
                $video_types = get_categories(
                    array(
                        'hide_empty' => false, // Only retrieve categories with no posts
                        'taxonomy' => 'hubvideos-category', // Specify the taxonomy (usually 'category')
                        'post_type' => 'hubvideo', // Specify the custom post type
                    ));

                if ($video_types) {
                    foreach ($video_types as $category) {
                        echo '<button class="video_hub_tab" data-tab="' . $category->slug . '">' . $category->name . '</button>';
                    }
                } else {
                    echo 'No categories found';
                }
                ?>
                <!-- <button class="active">Alcohol & pregnancy</button>
                <button>Assessment & diagnosis</button>
                <button>Management, therapy & support</button>
                <button>Professional development</button>
                <button>Research</button> -->
            </div>
        </div>
        <div class="cat_filter_wrap">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="filter_heading fs_25">
                        <?php
                            $post_type = 'hubvideo';
                            $post_count = wp_count_posts($post_type);
                            ?>
                        <span class="count">
                            <?php echo $post_count->publish;?>
                        </span>
                        results
                    </h3>
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
                                    <select name="topic" id="sortVideoHub" class="input_style" style="--selectBg: #F2F2F2;">
                                            <option value="">Sort By</option>
                                            <option value="ATOZ">A to Z by title</option>
                                            <option value="ZTOA">Z to A by title</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="post_listing vidoes_filterd">
            <div class="row vidoes_filterd_row">
                <?php
                $args = array(
                    'post_type' => 'hubvideo',
                    'posts_per_page' => 6,
                    'orderby' => 'publish_date',
                    'order' => 'ASC',
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Pagination
                );

                $the_query = new WP_Query($args);
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $post_id = get_the_ID();
                        $thumbnail_url = '';

                        if (has_post_thumbnail()) {
                            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        }
                        ?>
                        <div class="col col-12 col-md-6 col-lg-4 col-lg-4">
                            <div class="post_card box">
                                <div class="img_wrap">
                                    <figure class="videoAayegi" data-target-el="hide-show-toggle"
                                        data-video="http://52.64.249.237/wp-content/uploads/2024/04/test.mp4">
                                        <div class="hideElem">
                                            <img src="<?php echo $thumbnail_url; ?>" alt="img" class="feat_img" />
                                            <a class="link_arrow" href="<?php echo the_permalink(); ?>">
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
                                            <a href="JavaScript:void(0)"><?php echo get_the_date(); ?></a>
                                        </li>
                                        <li>
                                            <video src="http://52.64.249.237/wp-content/uploads/2024/04/test.mp4"
                                                class="video_duration_src" style="display:none;"></video>
                                            <a class="video_duration" href="JavaScript:void(0)"></a>
                                        </li>
                                        <li>
                                            <?php
                                            $post_tags = get_the_tags();
                                            if ($post_tags) {
                                                foreach ($post_tags as $tag) {
                                                    echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>'; // Display each tag with a link
                                                }
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                    <h4 class="post_heading"><a
                                            href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
                                    <p><?php echo the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();

                    // Custom pagination without next and previous buttons
                    global $wp_query;
                    $big = 999999999; // Need an unlikely integer
                    $total_pages = $the_query->max_num_pages;
                    $current_page = max(1, get_query_var('paged'));
                    $show_dots_threshold = 5; // Change this threshold as needed
                
                    if ($total_pages > 1) {
                        echo '<div class="post_pagination">';
                        echo '<ul>';

                        // Previous page link
                        if ($current_page > 1) {
                            echo '<li class="page-item control prev"><a class="page-link" href="' . get_pagenum_link($current_page - 1) . '"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_left_arrow.svg" alt="shape"></a></li>';
                        }

                        // Page numbers
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == 1 || $i == $total_pages || abs($i - $current_page) < $show_dots_threshold || ($i > $current_page - $show_dots_threshold && $i < $current_page + $show_dots_threshold)) {
                                $current_class = ($current_page == $i) ? 'current' : '';
                                echo '<li class="page-item count ' . $current_class . '"><a class="page-link" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                            } elseif ($i == $current_page + $show_dots_threshold || $i == $current_page - $show_dots_threshold) {
                                echo '<li class="page-item count dots"><a class="page-link" href="JavaScript:void(0)">...</a></li>';
                            }
                        }

                        // Next page link
                        if ($current_page < $total_pages) {
                            echo '<li class="page-item control next"><a class="page-link" href="' . get_pagenum_link($current_page + 1) . '"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_right_arrow.svg" alt="shape"></a></li>';
                        }

                        echo '</ul>';
                    }
                    echo '</div>';

                else:
                    // No posts found
                endif;
                ?>
            </div>
        </div>
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
    </div>
    <!-- shapes -->
    <?php 
        if (!empty($shapes)) {
            foreach ($shapes as $shape) {
                if ($shape == 'Top Left') {
                   echo '<img src="' . esc_url($top_left_shape['url']) . '" alt="" class="top-left">';
                }   elseif ($shape == 'Top Right') {
                    echo '<img src="' . esc_url($top_right_shape['url']) . '" alt="" class="top-right">';
                }   elseif ($shape == 'Bottom left') {
                    echo '<img src="' . esc_url($bottom_left_shape['url']) . '" alt="" class="bottom-left">';
                }  elseif ($shape == 'Bottom Right') {
                    echo '<img src="' . esc_url($bottom_right_shape['url']) . '" alt="" class="bottom-right">';
                }  elseif ($shape == 'Left Center') {
                    echo '<img src="' . esc_url($left_center_shape['url']) . '" alt="" class="middle-left">';
                }  elseif ($shape == 'Right Center') {
                    echo '<img src="' . esc_url($right_center_shape['url']) . '" alt="" class="middle-right ">';
                }  else {
                    // Handle other cases if needed
                    echo "Found something else: $shape\n";
                }
            }
        } else {
            // echo "No shapes selected.";
        }
    ?>
</section>
<!-- results found section end -->