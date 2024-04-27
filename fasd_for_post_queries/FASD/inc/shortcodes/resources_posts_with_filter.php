<style>
    .post_listing .post_card .details .tags {
        overflow-x: auto;
        flex-wrap: nowrap;
    }

    .post_listing .post_card .details .tags li{
        flex-shrink: 0;
    }

    .post_listing .post_card .details .tags::-webkit-scrollbar {
        height: 5px;
        background-color: #F5F5F5;
    }
    .post_listing .post_card .details .tags::-webkit-scrollbar-thumb {
        background-color: #000000;
    }
    .post_listing .post_card .details .tags::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }
</style>

<!-- Audience section start -->
<?php 
$filter_heading = get_sub_field("filter_heading");
?>
<section class="seeking_info audience_sec">
    <div class="container">
        <div class="row d-none">
            <div class="col-12">
                <h2 class="main_hdng text-start">
                    Audience
                </h2>
            </div>
        </div>
        <div class="row d-none">
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        Health Professionals
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-01.png" alt="shape">
                    </figure>
                </div>
            </div>
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        Justice Professionals
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-02.png" alt="shape">
                    </figure>
                </div>
            </div>
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        Policymakers
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-03.png" alt="shape">
                    </figure>
                </div>
            </div>
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        Educators
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-04.png" alt="shape">
                    </figure>
                </div>
            </div>
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        Pregnancy + Breastfeeding
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-05.png" alt="shape">
                    </figure>
                </div>
            </div>
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        People with FASD, Parents and Carers
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-06.png" alt="shape">
                    </figure>
                </div>
            </div>
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        Researchers
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-07.png" alt="shape">
                    </figure>
                </div>
            </div>
            <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                <div class="inner box">
                    <h4 class="hdng">
                        Aboriginal + Torres Strait Islander Communities
                    </h4>
                    <figure>
                        <img src="/wp-content/uploads/2024/04/seeking-icon-08.png" alt="shape">
                    </figure>
                </div>
            </div>
        </div>
        <div class="cat_filter_wrap">
            <div class="row">
                <div class="col-md-5">
                    <h3 class="filter_heading fs_36"><?php echo $filter_heading; ?></h3>
                </div>
                <div class="col-md-7">
                    <div class="filter_options">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input_wrap">
                                        <select name="typeOfResource" id="typeOfResource" class="input_style" style="--selectBg: #ffffff;">
                                            <option value="all">All Audience Groups</option>
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
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_wrap">
                                        <select name="topicResource"  id="topicResource" class="input_style" style="--selectBg: #ffffff;">
                                            <option value="all">All Topics</option>
                                            <?php
                                                $resourceTopics = get_categories( array(
                                                    'hide_empty' => false, // Only retrieve categories with no posts
                                                    'taxonomy' => 'resource-topic', // Specify the taxonomy (usually 'category')
                                                    'post_type' => 'resource', // Specify the custom post type
                                                    ) );
                                                    
                                                    if ( $resourceTopics ) {
                                                        foreach ( $resourceTopics as $category ) {
                                                            echo '<option value="'.$category->slug.'">'. $category->name . '</option>';
                                                    }
                                                } else {
                                                    echo 'No categories found';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Audience section end -->


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
<section class="results_found pt_100 pb_100">
    <div class="container">
        <div class="cat_filter_wrap">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="filter_heading fs_25">
                        <?php
                            $post_type = 'resource';
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
                                    <div class="input_wrap d-none">
                                        <select name="" class="languages input_style"
                                            style="--selectBg: #F2F2F2;">
                                            <option value="">Other Languages</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input_wrap">
                                        <select name="topic" id="sortResource" class="input_style" style="--selectBg: #F2F2F2;">
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
        <div class="post_listing">
            <div class="row resources_posts_row">
                <?php
                $args = array(
                    'post_type' => 'resource',
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
                            <div class="post_card">
                                <div class="img_wrap">
                                    <img src="<?php echo $thumbnail_url; ?>"
                                            alt="post_thumbnail" class="post_thumb">
                                    <a href="<?php echo the_permalink(); ?>" class="link_arrow">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li>
                                            <a href="#">Audience Group</a>
                                        </li>
                                        <li>
                                            <a href="#">Type</a>
                                        </li>
                                        <li>
                                            <a href="#">All</a>
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
    </div>
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