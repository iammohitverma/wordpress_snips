<?php
$attributes = $args['attributes'];
$heading = $attributes['heading'];

?>
<!-- Blog start -->
<section class="latest-post-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="latest-hdng"><?php echo $heading; ?></h3>

                <h4 class="custom-text">
                    <span>[</span>SEARCH<span>]</span>
                </h4>

                <div class="search_wrap">
                    <?php echo do_shortcode('[ivory-search id="165" title="Latest Blog Search Form"]'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $loop = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'order' => 'ASC',
                'orderby' => "date",
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            ));
            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post(); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-post">
                        <div class="card">
                            <?php if (has_post_thumbnail()) { ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                            <?php } ?>

                            <div class="card-body">
                                <?php
                                $taxonomy = 'category';
                                $categories = get_the_terms(get_the_ID(), $taxonomy);

                                if ($categories && !is_wp_error($categories)) {
                                    foreach ($categories as $cat) {
                                        $catName = esc_html($cat->name);
                                        $catSlug = esc_html($cat->slug);

                                        // Check if the category is not 'uncategorized'
                                        if ($catSlug !== 'uncategorized') {
                                            echo '<h4 class="post-hdng">' . $catName . '</h4>';
                                        }
                                    }
                                }
                                ?>
                                <!-- <h4 class="post-hdng">Feature</h4> -->
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <p class="date-text">
                                    <span>
                                        <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/09/calendar_month.png"
                                            class="img-fluid" alt="calendar_month">
                                    </span>
                                    <?php echo get_the_date('d M Y'); ?>
                                </p>
                            </div>
                            <a href="<?php echo the_permalink(); ?>" class="absolute_link"></a>
                        </div>
                    </div>
                <?php endwhile; ?>

                <?php
                // Custom pagination without next and previous buttons
                $total_pages = $loop->max_num_pages;
                $current_page = max(1, get_query_var('paged'));
                $show_dots_threshold = 2; // Customize this as needed
            
                if ($total_pages > 1) {
                    echo '<div class="post-pagination"><ul>';

                    // Previous page link
                    if ($current_page > 1) {
                        echo '<li class="page-item control prev"><a class="page-link" href="' . get_pagenum_link($current_page - 1) . '"><img src="' . get_site_url() . '/wp-content/uploads/2024/09/arrow_back_ios.png" alt="shape"></a></li>';
                    }

                    // Page numbers with ellipsis
                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == 1 || $i == $total_pages || abs($i - $current_page) < $show_dots_threshold) {
                            $current_class = ($current_page == $i) ? 'active' : '';
                            echo '<li class="page-item count ' . $current_class . '"><a class="page-link" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                        } elseif ($i == $current_page + $show_dots_threshold || $i == $current_page - $show_dots_threshold) {
                            echo '<li class="page-item count dots"><a class="page-link" href="JavaScript:void(0)">...</a></li>';
                        }
                    }

                    // Next page link
                    if ($current_page < $total_pages) {
                        echo '<li class="page-item control next"><a class="page-link" href="' . get_pagenum_link($current_page + 1) . '"><img src="' . get_site_url() . '/wp-content/uploads/2024/09/arrow_forward_ios.png" alt="shape"></a></li>';
                    }

                    echo '</ul></div>';
                }
                ?>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<!-- <div class="col-md-12">
                <div class="post-pagination">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/09/arrow_back_ios.png"
                                    class="img-fluid" alt="icons">
                            </a>
                        </li>

                        <li>
                            <a href="#" class="active">1</a>
                        </li>

                        <li>
                            <a href="#">2</a>
                        </li>

                        <li>
                            <a href="#">...</a>
                        </li>

                        <li>
                            <a href="#">3</a>
                        </li>

                        <li>
                            <a href="#">4</a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2024/09/arrow_forward_ios.png"
                                    class="img-fluid" alt="icons">
                            </a>
                        </li>

                    </ul>
                </div>
            </div> -->