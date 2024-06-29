<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prosserbuilt-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<?php
    $header_transparent_disabled = get_field('header_transparent_disabled');
    $is_header_transparent_disabled = $header_transparent_disabled['value'];
    $header = "absolute";
    if($is_header_transparent_disabled == "yes") {
        $header = "relative";
    }
?>

<body <?php body_class(); ?> data-pageId="<?php echo get_the_id() ?>" data-header="<?php echo $header;?>">
    <?php wp_body_open(); ?>
    <div id="page" class="site">    

    <?php
        //get acf values
        $commercial_header_logo = get_field('commercial_header_logo', 'option');
        $commercial_header_button = get_field('commercial_header_button', 'option');
        $commercial_header_video_placeholder = get_field('commercial_header_video_placeholder', 'option');
        $commercial_header_video_play_icon = get_field('commercial_header_video_play_icon', 'option');
        $commercial_header_video_text = get_field('commercial_header_video_text', 'option');
        $commercial_header_video = get_field('commercial_header_video', 'option');
        $commercial_select_menu = get_field('commercial_select_menu', 'option');
        $commercial_header_contact_links = get_field('commercial_header_contact_links', 'option');
        $commercial_megamenu_button = get_field('commercial_megamenu_button', 'option');
    ?>

    <header class="main_header">
        <div class="container-fluid">
            <div class="main_header_wrap">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                    aria-controls="offcanvasTop">
                    <div class="toggle_btn">
                        <span></span>
                    </div>
                </button>
                <div class="header_logo_wrap">
                    <a href="<?php echo get_site_url(); ?>">
                        <img src="<?php echo esc_url($commercial_header_logo['url']); ?>" alt="<?php echo esc_attr($commercial_header_logo['alt']); ?>">
                    </a>
                </div>
                <div class="header_btn_wrap">
                    <?php
                    if( $commercial_header_button ): 
                        $commercial_header_button_url = $commercial_header_button['url'];
                        $commercial_header_button_title = $commercial_header_button['title'];
                        $commercial_header_button_target = $commercial_header_button['target'] ? $commercial_header_button['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $commercial_header_button_url ); ?>" class="btn header_btn brdr_btn" target="<?php echo esc_attr( $commercial_header_button_target ); ?>"><?php echo esc_html( $commercial_header_button_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
                <div class="offcanvas-header">
                    <div class="btn-close-wrap">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="header_logo_wrap">
                        <a href="<?php echo get_site_url(); ?>">
                            <img src="<?php echo esc_url($commercial_header_logo['url']); ?>" alt="<?php echo esc_attr($commercial_header_logo['alt']); ?>">
                        </a>
                    </div>
                    <div class="header_btn_wrap">
                        <?php
                        if( $commercial_header_button ): 
                            $commercial_header_button_url = $commercial_header_button['url'];
                            $commercial_header_button_title = $commercial_header_button['title'];
                            $commercial_header_button_target = $commercial_header_button['target'] ? $commercial_header_button['target'] : '_self';
                            ?>
                            <a href="<?php echo esc_url( $commercial_header_button_url ); ?>" class="btn header_btn brdr_btn" target="<?php echo esc_attr( $commercial_header_button_target ); ?>"><?php echo esc_html( $commercial_header_button_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="offcanvas-body">
                    <div class="row row-offcanvas">
                        <div class="col-lg-6 col-md-12 col-12 p-0">
                            <div class="offcanvas_figure">
                                <img src="<?php echo esc_url($commercial_header_video_placeholder['url']); ?>" alt="<?php echo esc_attr($commercial_header_video_placeholder['alt']); ?>" class="img-fluid" >
                                <?php
                                    if( $commercial_header_video ):
                                        $commercial_header_video_url = $commercial_header_video['url'];?>

                                    <video id="video" src="<?php echo $commercial_header_video_url; ?>" controls></video>
                                <?php endif; ?>
                                <div class="header_play_btn">
                                    <img src="<?php echo esc_url($commercial_header_video_play_icon['url']); ?>" alt="<?php echo esc_attr($commercial_header_video_play_icon['alt']); ?>" class="img-fluid" >
                                    <h5 class="header_play_hdng"><?php echo $commercial_header_video_text; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="header_list">
                                <?php
                                    wp_nav_menu( array( 
                                        'theme_location' => $commercial_select_menu
                                        ) );
                                ?>
                                <div class="Contact_us_wrap">
                                    <ul>
                                        <?php 
                                            if( have_rows('commercial_header_contact_links', 'option') ):
                                                while( have_rows('commercial_header_contact_links', 'option') ) : the_row();
                                                    $commercial_header_link = get_sub_field('commercial_header_link', 'option');
                                                        if( $commercial_header_link ): 
                                                        $commercial_header_link_url = rawurldecode($commercial_header_link['url']); 
                                                        $commercial_header_link_title = $commercial_header_link['title'];
                                                        $commercial_header_link_target = $commercial_header_link['target'] ? $commercial_header_link['target'] : '_self';
                                                        ?>
                                                            <li><a href="<?php echo $commercial_header_link_url ; ?>" target="<?php echo esc_attr( $commercial_header_link_target ); ?>"><?php echo esc_html( $commercial_header_link_title ); ?></a></li>
                                                        <?php endif; ?>
                                                    <?php
                                                endwhile;
                                            else :
                                            endif;
                                        ?>
                                    </ul>
                                    <?php
                                    if( $commercial_megamenu_button ): 
                                        $commercial_megamenu_button_url = $commercial_megamenu_button['url'];
                                        $commercial_megamenu_button_title = $commercial_megamenu_button['title'];
                                        $commercial_megamenu_button_target = $commercial_megamenu_button['target'] ? $commercial_megamenu_button['target'] : '_self';
                                        ?>
                                        <a href="<?php echo esc_url( $commercial_megamenu_button_url ); ?>" class="btn btn-success brdr_btn" target="<?php echo esc_attr( $commercial_megamenu_button_target ); ?>"><?php echo esc_html( $commercial_megamenu_button_title ); ?></a>
                                    <?php endif; ?>
                                </div>
                                <img src="/wp-content/uploads/2024/05/header_shape.svg" alt="banner shape" class="bottom_right_shape">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
