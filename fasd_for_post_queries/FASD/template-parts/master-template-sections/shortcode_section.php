<?php
    $bg_clr = get_sub_field('section_background_color');
    $Heading = get_sub_field('heading');
    $shortcode = get_sub_field('shortcode');
    $Heading_clr = get_sub_field('heading_color');
    $description = get_sub_field('description');
    $description_clr = get_sub_field('description_color');
    // echo $shortcode;
    ?>
<section class="form_section pt_100 pb_100" style="background-color:<?php echo $bg_clr ?>">
    <div class="container">
        <div class="inner">
            <div class="head">
                <h2 class="fs_48 form_title" style="color: <?php echo $Heading_clr; ?>"><?php echo $Heading; ?></h2>
                <p style="color: <?php echo $description_clr; ?>"><?php echo $description; ?></p>
            </div>
            <div class="form_wrap cont-form">
                <form action="#" method="post" id="fasd_form">
                    <?php echo do_shortcode("$shortcode") ?>
                </form>
            </div>
        </div>
    </div>
</section>
