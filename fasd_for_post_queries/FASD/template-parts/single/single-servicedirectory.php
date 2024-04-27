<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fasd-theme
 */

$clinic_service = implode(',', get_field('what_is_the_nature_of_your_clinic_service_or_practice'));
$clinic_service_extra = get_field('nature_of_clinic_other_please_specify');

$health_professionals = implode(",", get_field('which_health_professionals_are_available_at_your_clinic'));
$health_professionals_extra = get_field('health_professionals_other_please_specify');

$fasd_informed = implode(",", get_field('which_type_of_fasd-informed_services_do_you_provide'));
$fasd_informed_extra = get_field('fasd-informed_services_other_please_specify');

$accept_referrals = implode(",", get_field('where_do_you_accept_referrals_from'));

$billing_structure = get_field('what_is_your_billing_structure');

$age_groups = implode(",", get_field('which_age_groups_do_you_work_with'));
$author = get_the_author();

												$field1 = get_field('address');
												$field2 = get_field('address_2');
												$field3 = get_field('state');
												$field4 = get_field('postcode');
												
												
?>


<section class="inkblot_clinic">
      <div class="container">
        <div class="top_heading_wrap">
          <div class="icon_wrap">
		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <i><img src="<?php echo $image[0]; ?>" alt="Clinic Icon" /></i>
          </div>
          <h1 class="heading_h1"><?php the_title(); ?></h1>
        </div>

        <div class="row">
          <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-12">
            <div class="left">
              <div class="box">
                <h4 class="heading_h4">Nature of clinic</h4>
                <p class="desc"><?php echo $clinic_service; if(!empty($clinic_service_extra)){ echo",".$clinic_service_extra; } ?></p>
              </div>
              <div class="box">
                <h4 class="heading_h4">
                  Specific health professionals at the clinic
                </h4>
                <p class="desc">
                 <?php echo $health_professionals; if(!empty($health_professionals_extra)){ echo",".$health_professionals_extra; } ?>
                </p>
              </div>
              <div class="box">
                <h4 class="heading_h4">
                  Type of services provided at the clinic
                </h4>
                <p class="desc">
                  <?php echo $fasd_informed; if(!empty($fasd_informed_extra)){ echo",".$fasd_informed_extra; } ?>
                </p>
              </div>
              <div class="box">
                <h4 class="heading_h4">Where referrals are accepted from</h4>
                <p class="desc">
                  <?php echo $accept_referrals; ?>
                </p>
              </div>
              <div class="box">
                <h4 class="heading_h4">How the clinic bills</h4>
                <p class="desc">
                 <?php echo $billing_structure; ?>
                </p>
              </div>
              <div class="box">
                <h4 class="heading_h4">
                  Ages that the clinic provides services for
                </h4>
                <p class="desc">
                  <?php echo $age_groups; ?>
                </p>
              </div>
              <div class="box">
                <h4 class="heading_h4">FASD experience and training</h4>
                <p class="desc">
                  Katherine has a strong interest in complex diagnostic
                  questions, and assesses children and adolescents for ADHD,
                  Autism, FASD, Intellectual Disability, learning disorders, and
                  complex trauma. Katherine works from a neuro-affirming
                  approach and believes neurodiversity makes life more
                  interesting. Katherine previously worked in the Western
                  Australian education system as a School Psychologist and
                  believes that every child should be given their best
                  opportunity for success in school. This includes accurate
                  diagnosis and appropriate recommendations. Additionally,
                  Katherine has worked in private practice completing FASD and
                  Autism assessments as part of a multidisciplinary team,
                  working with Department of Justice and Department of
                  Communities. Katherine completed her Graduate Diploma in
                  Psychology at the University of Melbourne, Bachelor of
                  Psychology at Curtin University and Graduate Diploma of
                  Education and Graduate Certificate in Assessment and Diagnosis
                  of FASD at UWA.
                </p>
              </div>
              <div class="return">
                <a href="/services-directory/">
                  <i
                    ><img src="http://52.64.249.237/wp-content/uploads/2024/04/arrow.svg" alt="return arrow"
                  /></i>
                  <span>Return to services directory</span> 
                </a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12">
            <div class="right">
              <div class="heading_wrap">
                <div class="icon_wrap">
                  <i
                    ><img src="http://52.64.249.237/wp-content/uploads/2024/04/doctor_icon.svg" alt="Image"
                  /></i>
                </div>
                <h2 class="heading_h2"><?php echo $author; ?></h2>
              </div>
              <div class="image_wrap">
                <figure>
                  <img src="http://52.64.249.237/wp-content/uploads/2024/04/map.png" alt="Map" />
                </figure>
              </div>
              <div class="contactus_wrap">
                <div class="location_wrap">
                  <div class="icon_wrap">
                    <i>
                      <img src="http://52.64.249.237/wp-content/uploads/2024/04/map_pin.svg" alt="Map Pin"
                    /></i>
                  </div>
                  <div class="addres_wrap">
                    <span>Location</span>
                    <address>
                      <?php echo $field1 . ' ' . $field2 . ' ' . $field3 . ' ' . $field4; ?>
                    </address>
                  </div>
                </div>
                <div class="contact_detail">
                  <a href="tel:<?php echo get_field('phone_number'); ?>">
                    <i>
                      <img
                        class="icon"
                        src="http://52.64.249.237/wp-content/uploads/2024/04/phone.svg"
                        alt="Call Us Icon"
                      />
                      <img
                        class="hover_icon"
                        src="http://52.64.249.237/wp-content/uploads/2024/04/phone_blue.svg"
                        alt="Call Us Icon"
                      />
                    </i>
                    <span><?php echo get_field('phone_number'); ?></span></a
                  >
                </div>
                <div class="mail_website">
                  <div class="mail_wrap">
                    <a href="mailto:<?php the_field('email_address'); ?>"
                      ><i
                        ><img
                          class="icon"
                          src="http://52.64.249.237/wp-content/uploads/2024/04/mail.svg"
                          alt="Mail icon"
                      /></i>
                      <span>Email</span></a
                    >
                  </div>
                  <div class="website_wrap">
                    <a href="<?php echo  get_field('website_url') ; ?>"
                      ><i
                        ><img
                          class="icon"
                          src="http://52.64.249.237/wp-content/uploads/2024/04/pin.svg"
                          alt="Website Pin Icon"
                      /></i>
                      <span>Website</span></a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



