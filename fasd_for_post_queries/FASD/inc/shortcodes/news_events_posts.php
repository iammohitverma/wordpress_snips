<?php
    // query  
?>
<!-- results found section start -->
<section class="results_found pt_100">
    <div class="container">
        <div class="post_listing">
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 9,
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
                                    <img src="<?php echo $thumbnail_url; ?>" alt="post_thumbnail" class="post_thumb">
                                    <a href="<?php echo get_the_permalink(); ?>" class="link_arrow">

                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="details">
                                    <h4 class="news_head"><a
                                            href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h4>
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
                        echo '<div class="post_pagination v_2">';
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
</section>
<!-- results found section end -->
