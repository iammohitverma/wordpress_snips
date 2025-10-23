<?php
/**
 * The template for displaying job's department's taxation's category
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package twentytwentyonechild
 */

get_header();
?>

<section class="breadcrumb_section pt_100 pb_100 mb_100">
    <div class="container">
        <div class="text_wrap">
            <p><a class="inherit_parent_color" href="/">Home</a> &gt; <a class="inherit_parent_color" href="/career/">Career</a> &gt; <?php single_term_title(); ?></p>
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

<?php echo do_shortcode('[career_path]');?>

<section class="location_cards pt_100 pb_100">
    <div class="container">
        <div class="row">
            <?php
            $taxation_jobs = new WP_Query(array(
                'post_type'      => 'job',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'department',
                        'field'    => 'slug',
                        'terms'    => 'taxation',
                    ),
                ),
                'fields' => 'ids', 
            ));

            if ($taxation_jobs->have_posts()) {
                $location_ids = wp_get_object_terms($taxation_jobs->posts, 'job-location', array('fields' => 'ids'));

                if (!empty($location_ids)) {
                    $locations = get_terms(array(
                        'taxonomy'   => 'job-location',
                        'include'    => $location_ids,
                        'hide_empty' => true,
                    ));

                    foreach ($locations as $location) :
                        $image = get_field('location_featured_image', 'job-location_' . $location->term_id);
                        $image_url = $image ? $image['url'] : '';
                        $term_link = get_term_link($location);
                        $default_image = '/wp-content/uploads/2025/10/placeholder_white.jpg';
                        $bg_image = $image_url ? $image_url : $default_image;
            ?>
                        <div class="col-md-6 col-lg-4 mb_24">
                            <div class="location_card" style="--location_bg: url('<?php echo esc_url($bg_image); ?>');">
                                <h3><?php echo esc_html($location->name); ?></h3>
                                <a href="<?php echo esc_url($term_link); ?>" class="location_card_link cover"></a>
                            </div>
                        </div>
                <?php
                    endforeach;
                }
            }
            ?>
        </div>
    </div>
</section>


<?php
get_footer(); ?>