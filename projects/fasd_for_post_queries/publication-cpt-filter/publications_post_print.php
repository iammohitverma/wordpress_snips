<?php
/* Template Name: Publications Post Print */

get_header();

// Retrieve the terms from the POST request, ensuring they are arrays
$publicationtypes = isset($_POST['publicationtypes']) ? $_POST['publicationtypes'] : array();
$publicationtopics = isset($_POST['publicationtopics']) ? $_POST['publicationtopics'] : array();

// Initialize tax_query as an empty array
$tax_query = array();

// Add publication types to tax_query if any are selected
if (!empty($publicationtypes)) {
    $publicationtypes_terms = explode(',', $publicationtypes);

    $tax_query[] = array(
        'taxonomy' => 'publication-types',
        'field'    => 'slug', // Assuming 'slug' is used for term_id in your taxonomies
        'terms'    => $publicationtypes_terms,
        'operator' => 'IN', // Use 'IN' operator to include all selected terms
    );
}

// Add publication topics to tax_query if any are selected
if (!empty($publicationtopics)) {
    $publicationtopics_terms = explode(',', $publicationtopics);

    $tax_query[] = array(
        'taxonomy' => 'publication-topics',
        'field'    => 'slug', // Assuming 'slug' is used for term_id in your taxonomies
        'terms'    => $publicationtopics_terms,
        'operator' => 'IN', // Use 'IN' operator to include all selected terms
    );
}

// Set the relation parameter for tax_query based on the number of taxonomies
$tax_relation = 'OR';

// Arguments for the query
$args = array(
    'post_type'      => 'publications',
    'posts_per_page' => -1,  // Retrieve all posts that match the criteria
    'orderby'        => 'date', // Corrected from 'publish_date' to 'date'
    'order'          => 'ASC',
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // Pagination
    'tax_query'      => $tax_query,
    'tax_query_relation' => $tax_relation, // Set tax_query relation
);

// Custom query
$the_query = new WP_Query($args);
?>


<section class="publications_filter_wrap pt_100 pb_100" style="background-color: #fafbf7;">
    <div class="container">
        <div class="print_top mb_40">
            <div class="left">
                <a href="<?php echo get_permalink(wp_get_post_parent_id(get_the_ID())); ?>" aria-label="Left arrow"
                    title="go back" tabindex="-1" contenteditable="false" style="cursor: pointer;">
                    <i><img src="http://52.64.249.237/wp-content/uploads/2024/04/arrow.svg" alt="return arrow"></i>
                    <span>Back to results</span>
                </a>
            </div>
            <div class="right">
                <form>
                    <div class="inner">
                        <button class="print_btn_here" aria-label="print" title="print">Print All</button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="results_wrapper">
            <div class="main">
                <div class="row">
                    <div class="col-12">
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


<?php
get_footer();
?>