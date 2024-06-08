<?php /* Template Name: Contact Page Form */

get_header();
?>
<!-- contact page form -->
<section class="form_section pt_100 pb_100" style="background-color:#FAFBF7">
    <div class="container">
        <div class="inner">
            <div class="head">
                <h2 class="fs_48 form_title">Contact Form</h2>
                <p>Get monthly updates, events and publications directly to your inbox</p>
            </div>
            <div class="form_wrap cont-form">
                <form action="#" method="post" id="fasd_form">
                    <?php echo do_shortcode("[contact-form-7 id='1013ea3' title='Contact Page Form']") ?>
                </form>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>