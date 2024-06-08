
<!-- Audience section start -->
<?php 
$filter_heading = get_sub_field("filter_heading");
$select_heading_tag = get_sub_field('select_heading_tag');
$heading_color = get_sub_field('heading_color');




$types_categories = array(); // Array to store unique categories
$topics_categories = array(); // Array to store unique categories

// Arguments for the query
$args = array(
    'post_type' => 'publications',
    'posts_per_page' => 6,
    'orderby' => 'publish_date',
    'order' => 'ASC',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // Pagination
);

// Custom query
$the_query = new WP_Query($args);
if ($the_query->have_posts()):

    // Collect categories before outputting HTML
    while ($the_query->have_posts()):
        $the_query->the_post();
        $post_id = get_the_ID();

        // Get publication types
        $categories = get_the_terms($post_id, 'publication-types');
        if ($categories && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                $types_categories[$category->term_id] = $category->name;
            }
        }

        // Get publication topics
        $categories = get_the_terms($post_id, 'publication-topics');
        if ($categories && !is_wp_error($categories)) {
            foreach ($categories as $category) {
                $topics_categories[$category->term_id] = $category->name;
            }
        }
    endwhile;

    // Reset post data
    wp_reset_postdata();
endif;
?>

<section class="publications_filter_wrap pt_100 pb_100" style="background-color: #fafbf7;">
    <div class="container">
        <div class="heading_wrap">
            <?php 
                echo '<' . $select_heading_tag . ' class="fs_48 underline_style" style="color:' . $heading_color . ';">' . $filter_heading . '</' . $select_heading_tag . '>';
            ?> 
        </div>
        <div class="top_filters_wrap">
            <div class="inner">
                <form>
                    <div class="input_wrap">
                        <input type="text" name="" id="" placeholder="Search Author, Title and/or Topic">
                    </div>
                </form>
                <button class="printBtn" aria-label="Print All" title="Print All">Print All</button>
            </div>
        </div>

        <div class="results_wrapper">
            <div class="top">
                <div class="left">
                    <h4 class="hdng">
                        <span class="postcount text underline_style">1-10 of 102 results</span>
                    </h4>
                </div>
            </div>
            <div class="main">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="publications_filter">
                            <div class="top">
                                <div class="accordion chosen-container-multi">
                                    <div class="accordion-item" id="publication-type">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#publication-type-collapseOne" aria-expanded="true" aria-controls="publication-type-collapseOne">
                                            Publication Type (All)
                                            </button>
                                        </h2>
                                        <div id="publication-type-collapseOne" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <ul class="checkbox_wrap" id="publication-types">
                                                    <?php foreach ($types_categories as $category_id => $category_name): ?>
                                                        <li>
                                                            <label>
                                                                <input type="checkbox" value="<?php echo esc_attr($category_id); ?>" checked>
                                                                <span class="checkmark"></span>
                                                                <span class="text"><?php echo esc_html($category_name); ?></span>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item" id="publication-topics">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#publication-topics-collapseOne" aria-expanded="true" aria-controls="publication-topics-collapseOne">
                                            Topics (All)
                                            </button>
                                        </h2>
                                        <div id="publication-topics-collapseOne" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <ul class="checkbox_wrap" id="publication-topics">
                                                    <?php foreach ($topics_categories as $category_id => $category_name): ?>
                                                        <li>
                                                            <label>
                                                                <input type="checkbox" value="<?php echo esc_attr($category_id); ?>" checked>
                                                                <span class="checkmark"></span>
                                                                <span class="text"><?php echo esc_html($category_name); ?></span>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <button class="fasd_btn outline_btn" style="--btnClr: #197391;" aria-label="refine-search" title="refiune-search">Refine Search</button>
                                <button class="cross" aria-label="cross" title="cross">
                                    <img src="/wp-content/uploads/2024/04/cross_icon_stroke.svg" alt="icon" width="10" height="10">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="publications_wrapper">
                        <?php
                            if ($the_query->have_posts()):
                                while ($the_query->have_posts()):
                                    $the_query->the_post();
                                    $post_id = get_the_ID();
                                    $thumbnail_url = '';

                                    if (has_post_thumbnail()) {
                                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    }

                                    
                                    $categories = get_the_terms($post_id, 'publication-types'); 

                                    if ($categories && !is_wp_error($categories)) {
                                        foreach ($categories as $category) {
                                            $types_categories[$category->term_id] = $category->name;
                                        }
                                    }

                                    
                                    $categories = get_the_terms($post_id, 'publication-topics'); 

                                    if ($categories && !is_wp_error($categories)) {
                                        foreach ($categories as $category) {
                                            $topics_categories[$category->term_id] = $category->name;
                                        }
                                    }
                            ?>
                            <div class="card">
                                <a href="<?php echo the_permalink(); ?>" class="absolute_link" aria-label="<?php echo the_title(); ?>" title="<?php echo the_title(); ?>"></a>
                                <div class="card-body">
                                    <div class="img_wrap">
                                        <img src="/wp-content/uploads/2024/05/publication_icon.svg" alt="">
                                    </div>
                                    <div class="card_inner">
                                    <h4 class="hdng">
                                        <?php echo the_title(); ?></h4>

                                        <div class="desc"><?php echo the_excerpt(); ?></div>


                                        <ul class="info">
                                            <li>
                                                <h5 class="info_hdng">Publishing Date:</h5>
                                                <p><?php echo get_the_date('F j, Y'); ?></p>
                                            </li>
                                            <?php
                                            // Debug: Check if the repeater field exists and has rows
                                            if (have_rows('publication_information', $post_id)):
                                                while (have_rows('publication_information', $post_id)): the_row();
                                                    $title = get_sub_field('title'); // Subfield for the title
                                                    $description = get_sub_field('description'); // Subfield for the description
                                                    ?>
                                                    <li>
                                                        <h5 class="info_hdng"><?php echo esc_html($title); ?>:</h5>
                                                        <p><?php echo esc_html($description); ?></p>
                                                    </li>
                                                    <?php
                                                endwhile;
                                            endif;
                                            ?>
                                        </ul>

                                        <div class="research_wrap">
                                            <a href="#" class="btn btn-success" tabindex="-1">Research</a>
                                            <div class="research_list">
                                                <ul>
                                                    <?php
                                                        // Get the terms for this post from the custom taxonomy 'publication-topics'
                                                        $terms = get_the_terms($post_id, 'publication-topics');
                                                        if ($terms && !is_wp_error($terms)):
                                                            foreach ($terms as $term):
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url(get_term_link($term)); ?>" tabindex="-1" aria-label="<?php echo esc_html($term->name); ?>">
                                                                        <?php echo esc_html($term->name); ?>
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            endforeach; ?>
                                                        <?php endif;
                                                    ?>
                                                </ul>
                                                <p class="research_list_desc">Page last updated <?php echo date('F j, Y'); ?></p>
                                            </div>
                                        </div>
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
                            echo '<li class="page-item control prev" tabindex="0"><a class="page-link" href="' . get_pagenum_link($current_page - 1) . '" aria-label="Previous" tabindex="0"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_left_arrow.svg" alt="shape" width="10" height="15"></a></li>';
                        }

                        // Page numbers
                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == 1 || $i == $total_pages || abs($i - $current_page) < $show_dots_threshold || ($i > $current_page - $show_dots_threshold && $i < $current_page + $show_dots_threshold)) {
                                $current_class = ($current_page == $i) ? 'current' : '';
                                echo '<li class="page-item count ' . $current_class . '" tabindex="0"><a class="page-link" href="' . get_pagenum_link($i) . '" aria-label="Page Count" tabindex="0">' . $i . '</a></li>';
                            } elseif ($i == $current_page + $show_dots_threshold || $i == $current_page - $show_dots_threshold) {
                                echo '<li class="page-item count dots" tabindex="0"><a class="page-link" href="JavaScript:void(0)"  aria-label="Page Count" tabindex="0">...</a></li>';
                            }
                        }

                        // Next page link
                        if ($current_page < $total_pages) {
                            echo '<li class="page-item control next" tabindex="0"><a class="page-link" href="' . get_pagenum_link($current_page + 1) . '" aria-label="Next" tabindex="0"><img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_right_arrow.svg" alt="shape" width="10" height="15"></a></li>';
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
            </div>
        </div>
    </div>
</section>