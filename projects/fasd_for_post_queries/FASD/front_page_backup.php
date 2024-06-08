<?php
/**
 * The template for displaying front page
 *
 * (Home Page of Website)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fasd-theme
 */
get_header();
?>

<div class="" id="home-page">

<?php

// Check value exists.
if( have_rows('modules') ):

    // Loop through rows.
    while ( have_rows('modules') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'banner_section' ):
            
            // Do something...

        // Case: Download layout.
        elseif( get_row_layout() == 'download' ): 
            $file = get_sub_field('file');
            // Do something...

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif; ?>

	<!-- this section is used on multiple pages | so please pass page name as a class also use inline background-color -->
    <section class="global_banner home_page" style="background-color:#005e7e">
        <div class="container">
            <div class="owl-carousel owl-theme" id="global_banner">
                <!-- use this "row" class for your repeater fields | loop  -->
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-sm-10 col-md-6">
                        <div class="inner">
                            <h1 class="hdng">
                                The FASD Hub
                            </h1>
                            <p class="desc">
                                Bringing together the latest evidence-based resources and research about Fetal Alcohol Spectrum Disorder (FASD) in Australia.
                            </p>
                            <a href="#" class="banner_btn" style="background-color:#dd6c69">
                                Learn about FASD
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-10 col-md-6 mt-4 mt-md-0">
                        <figure>
                            <img src="./wp-content/uploads/2024/04/home-banner-hero.png" alt="" class="hero_img">
                        </figure>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-sm-10 col-md-6">
                        <div class="inner">
                            <h1 class="hdng">
                                The FASD Hub
                            </h1>
                            <p class="desc">
                                Bringing together the latest evidence-based resources and research about Fetal Alcohol Spectrum Disorder (FASD) in Australia.
                            </p>
                            <a href="#" class="banner_btn" style="background-color:#dd6c69">
                                Learn about FASD
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-10 col-md-6 mt-4 mt-md-0">
                        <figure>
                            <img src="./wp-content/uploads/2024/04/home-banner-hero.png" alt="" class="hero_img">
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <!-- shapes for all corner | uncomment commented img tag-->
        <!-- <img src="./wp-content/uploads/2024/04/banner-bottom-left-shape.png" alt="" class="top-left"> -->
        <img src="./wp-content/uploads/2024/04/banner-top-right-shape.png" alt="" class="top-right">
        <!-- <img src="./wp-content/uploads/2024/04/banner-top-right-shape.png" alt="" class="bottom-right"> -->
        <img src="./wp-content/uploads/2024/04/banner-bottom-left-shape.png" alt="" class="bottom-left">
    </section>



    <!-- Seeking info only use on home page -->
    <section class="seeking_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="main_hdng">
                        I'm seeking information for...
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            Health Professionals
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-01.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            Justice Professionals
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-02.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            Policymakers
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-03.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            Educators
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-04.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            Pregnancy + Breastfeeding
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-05.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            People with FASD, Parents and Carers
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-06.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            Researchers
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-07.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="inner box">
                        <h4 class="hdng">
                            Aboriginal + Torres Strait Islander Communities
                        </h4>
                        <figure>
                            <img src="./wp-content/uploads/2024/04/seeking-icon-08.png" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>


        <!-- shapes -->
        <img src="./wp-content/uploads/2024/04/top-left-shape-1.png" alt="" class="top-left">
        <img src="./wp-content/uploads/2024/04/bottom-right-01.png" alt="" class="middle-right">
    </section>



    <!-- Resources section -->
    <section class="latest_news">
        <div class="latest_news_wrap">
            <div class="container">
                <div class="latest_news_heading">
                    <h3>Latest News, Research & Events</h3>
                </div>
                <div class="latest_news_content">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="latest_news_card">
                                <div class="card_image">
                                    <img src="./wp-content/uploads/2024/04/latest_news01.png" alt="latest news image">
                                </div>
                                <div class="card_details">
                                    <div class="card_date">
                                        <span>29 Mar, 2023</span>
                                    </div>
                                    <div class="card_heading">
                                        <h3>Critical Neurobehavioral Disorder Associated with Prenatal alcohol Exposure</h3>
                                    </div>
                                    <div class="card_desc">
                                        <p>Overview text about featured research project or publication text about featured research project </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                    <div class="latest_news_card news_right_cards">
                                        <div class="card_image">
                                            <img src="./wp-content/uploads/2024/04/latest_news02.png" alt="latest news image">
                                        </div>
                                        <div class="card_details">
                                            <div class="card_date">
                                                <span>14 Feb, 2023</span>
                                            </div>
                                            <div class="card_heading">
                                                <h3>Aware of Top sources on alcohol risks during pregnancy</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                    <div class="latest_news_card news_right_cards">
                                        <div class="card_image">
                                            <img src="./wp-content/uploads/2024/04/latest_news03.png" alt="latest news image">
                                        </div>
                                        <div class="card_details">
                                            <div class="card_date">
                                                <span>30 Apr, 2023</span>
                                            </div>
                                            <div class="card_heading">
                                                <h3>Poll snapshot: Pregnancy health warning on alcoholic prod ucts</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <!-- About section -->
    <section class="beyond_the_hub_section about_fasd" style="background-color:#eef0e7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <h3 class="main_hdng">
                        About FASD
                    </h3>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center mt-3 mt-lg-0">
                    <a href="#" class="brdr_btn">Learn about FASD</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/about_img_01.png" alt="" />
                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                FASD vs ADHD
                            </h4>
                            <p class="desc">
                                Recognising FASD preview text here and here. What are common similarities and differences of each of these neurodiversities.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/about_img_02.png" alt="" />


                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                What to do if FASD is suspected
                            </h4>
                            <p class="desc">
                                Research and Intervention Strategies, presenters will delve into the complexities of mental health in relation to FASD.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/column-card_two_img_left.png" alt="" />


                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                Supporting children and families
                            </h4>
                            <p class="desc">
                                Fetal Alcohol Spectrum Disorder (FASD) Awareness Month has officially arrived!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- shapes -->
        <img src="./wp-content/uploads/2024/04/shrubs-1.png" alt="" class="middle-right">
    </section>



    <!-- colored 2 Column Layout  -->
    <section class="colored_2_column_layout" style="background-color: #4aabde;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <h2 class="hdng">
                            FASD-informed service providers
                        </h2>
                        <p class="desc">
                            Find health professionals and services with FASD experience and expertise.
                        </p>
                        <a href="#" class="brdr_btn black_btn">Learn about FASD</a>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <img src="./wp-content/uploads/2024/04/2_column_hero.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!-- shapes -->
        <img src="./wp-content/uploads/2024/04/half-circle-middle.png" alt="" class="middle-left">
    </section>




    <!-- About section -->
    <section class="beyond_the_hub_section about_fasd" style="background-color:#fafbf7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/home-grid-01.png" alt="" />
                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                FASD vs ADHD
                            </h4>
                            <p class="desc">
                                Recognising FASD preview text here and here. What are common similarities and differences of each of these neurodiversities.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/home-grid-03.png" alt="" />


                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                What to do if FASD is suspected
                            </h4>
                            <p class="desc">
                                Research and Intervention Strategies, presenters will delve into the complexities of mental health in relation to FASD.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/home-grid-02.png" alt="" />


                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                Supporting children and families
                            </h4>
                            <p class="desc">
                                Fetal Alcohol Spectrum Disorder (FASD) Awareness Month has officially arrived!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- shapes -->
        <img src="./wp-content/uploads/2024/04/shrubs-03.png" alt="" class="middle-left">
    </section>



    <!-- colored 2 Column Layout in reverse form  -->
    <section class="colored_2_column_layout" style="background-color: #295576;">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <img src="./wp-content/uploads/2024/04/2_column_hero_01.png" alt="">
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="inner">
                        <h2 class="hdng">
                            Community Stories
                        </h2>
                        <p class="desc">
                            Living with FASD. Stories about people's experiences with alcohol, pregnancy, breastfeeding, and Fetal Alcohol Spectrum Disorder (FASD). Lived experience, parents and carers of children w FASD, adults living with FASD. <br/><br/>                            Reducing stigma, human face + context, inviting people to connect, find support and community.
                        </p>
                        <a href="#" class="brdr_btn black_btn">View All</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- shapes -->
        <img src="./wp-content/uploads/2024/04/middle-right-shape-1.png" alt="" class="middle-right">
    </section>



    <!-- About section -->
    <section class="beyond_the_hub_section about_fasd" style="background-color:#fafbf7">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 d-flex align-items-center">
                    <h3 class="main_hdng">
                        People with FASD, parents and carers
                    </h3>
                </div>
                <div class="col-12 col-md-3 d-flex align-items-center mt-3 mt-lg-0">
                    <a href="#" class="brdr_btn">Learn about P+ C</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/about-hero-04.png" alt="" />
                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                NO FASD Support Groups
                            </h4>
                            <p class="desc">
                                Find a support group near you
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/about-hero-05.png" alt="" />


                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                FASD assessment + diagnosis
                            </h4>
                            <p class="desc">
                                The effects of low to moderate prenatal alcohol exposure in early pregnancy.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 mt-5">
                    <div class="box">
                        <div class="image_wrap">
                            <figure>
                                <img src="./wp-content/uploads/2024/04/about-hero-06.png" alt="" />


                                <a href="#" class="link_arrow">

                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                </a>
                            </figure>
                        </div>
                        <div class="content_wrap">
                            <h4 class="hdng">
                                Post-diagnosis support
                            </h4>
                            <p class="desc">
                                The effect of alcohol binge drinking in early pregnancy on general intelligence in children
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- shapes -->
        <img src="./wp-content/uploads/2024/04/shrub-02.png" alt="" class="middle-left-top">
    </section>




    <!-- Form Section | this is common form across the complete website -->
    <section class="form_section pt_100 pb_100" style="background-color: #eef0e7;">
        <div class="container">
            <div class="inner">
                <div class="head">
                    <h2 class="fs_48 form_title">Stay connected</h2>
                    <p>Join our mailing list to hear more from the FASD Hub, including our monthly newsletters, webinar invitations, and new publications and resources.</p>
                </div>
                <div class="form_wrap">
                    <?php echo do_shortcode( '[email-subscribers-form id="1"]' ); ?>
                    <!-- <form action="#" method="post" id="fasd_form">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="fname">
                                    <label for="fname">First Name *</label>
                                    <input class="required_field" type="text" name="fname">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="lname">
                                    <label for="fname">Last Name *</label>
                                    <input class="required_field" type="text" name="lname">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="email">
                                    <label for="fname">Email address *</label>
                                    <input class="required_field email" type="text" name="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="submit_btn">
                                    <input type="submit" name="lname" class="brdr_btn red_btn" value="Subscribe">
                                </div>
                            </div>
                        </div>
                    </form> -->
                </div>
                <div class="form_btm_content">
                    <h3>Acknowledgement of Country</h3>
                    <p>FASD Hub Australia acknowledges Aboriginal and Torres Strait Islander peoples as the Traditional Custodians of Country throughout Australia, and we recognise their connections to land, water and community. We pay our respect to their
                        elders past and present, and extend that respect to all Aboriginal and Torres Strait Islander peoples.</p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer();?>

