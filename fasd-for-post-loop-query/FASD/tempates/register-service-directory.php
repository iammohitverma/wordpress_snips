<?php /* Template Name: Register Services Directory */
   get_header();
?>

<section
      class="service_directory pt_100 pb_100"
      style="background-color: #f4f5f1"
    >
      <div class="container">
        <div class="intro">
          <div class="row">
            <div class="col-md-4">
              <div class="left_wrap">
                <h3 class="fs_25">
                  The FASD Hub Service Directory brings together the details of
                  FASD-informed health professionals across Australia.
                </h3>
              </div>
            </div>
            <div class="col-md-8">
              <div class="right_wrap">
                <p>
                  If your clinic has medical and/or allied health professionals
                  with experience contributing to a FASD diagnosis and/or have
                  provided therapy/support to a person diagnosed with FASD, you
                  are invited to register your details below.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="service_form">
          <div class="head">
            <h4 class="fs_25 form_heading">Fill up your details below:</h4>
            <p>* indicates mandatory</p>
          </div>
          <div class="form_wrap">
            <form action="#" method="post">
              <?php echo do_shortcode("[contact-form-7 id='621cd26' title='Contact Form']") ?>
            </form>
          </div>
        </div>
      </div>
  </section>


<?php get_footer();?>