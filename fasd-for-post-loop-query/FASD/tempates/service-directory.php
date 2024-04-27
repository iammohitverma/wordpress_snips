<?php /* Template Name: Services Directory */
   get_header();
   ?>
<!-- banner without slider start -->
<section class="cmn_banner_without_slider banner_with_btm_content no_btm_padding" style="background-color: #4EAB98">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-5">
            <div class="text_wrap">
               <h1 class="heading">Services <br/> Directory</h1>
            </div>
         </div>
         <div class="col-lg-7">
         </div>
      </div>
   </div>
   <div class="img_wrap">
      <img src="http://52.64.249.237/wp-content/uploads/2024/04/services_directory_banner.png" alt="banner_image">
   </div>
   <!-- shapes for all corner | uncomment commented img tag-->
   <!-- <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_circle_shape.svg" alt="shape" class="bottom-left"> -->
   <div class="btm_content">
      <div class="container">
         <div class="row">
            <div class="col-md-7">
               <div class="text_wrap">
                  <p>Find health professionals and services with FASD experience and expertise. Appointments can only be booked directly with the provider. The FASD Hub is unable to make appointments on your behalf.</p>
               </div>
            </div>
            <div class="col-md-5">
               <div class="btn_wrap text-center">
                  <a href="#" class="fasd_btn fill_btn" style="--btnClr:#4EAB98">
                  Register for the Service Directory</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- banner without slider end -->
<!-- service_directory_results start -->
<section class="service_directory_results" style="background-color:#f4f5f1;">
   <div class="container">
      <div class="search_directory">
         <form>
            <div class="top">
               <div class="input_wrap">
                  <input type="search" placeholder="type here to search services directory">
                  <input type="submit" value="Search">
               </div>
            </div>
            <div class="bottom">
               <div class="row">
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Filter by state</label>
                        <select name="typeOf" class="input_style" style="--selectBg: #F2F2F2;" >
                           <option value="">Queensland</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Type of service</label>
                        <select name="typeOf" class="input_style" style="--selectBg: #F2F2F2;" >
                           <option value="">All services</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Age</label>
                        <select name="typeOf" class="input_style" style="--selectBg: #F2F2F2;" >
                           <option value="">12 - 18 years</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="input_wrap">
                        <label>Billing Method</label>
                        <select name="typeOf" class="input_style" style="--selectBg: #F2F2F2;" >
                           <option value="">Medicare plus fee</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="results_wrapper">
         <div class="top">
            <div class="left">
               <h4 class="hdng">
                  <img src="http://52.64.249.237/wp-content/uploads/2024/04/result_directories.svg" alt="icon">
                  <span class="text">1-10 of 97 results</span>
               </h4>
            </div>
            <div class="right">
               <form>
                  <div class="inner">
                     <div class="input_wrap">
                        <select class="input_style" style="--selectBg: #f4f5f1;">
                           <option value="most_recent">Most Recent</option>
                           <option value="oldest">Oldest</option>
                           <option value="a_z_by_title">A to Z by Title</option>
                           <option value="z_a_by_title">Z to A by Title</option>
                        </select>
                     </div>
                     <button class="print_btn">Print All</button>
                  </div>
               </form>
            </div>
         </div>
         <div class="main">
            <div class="row">
               <div class="col-lg-4">
                  <div class="directories_filter">
                     <div class="top">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                           <div class="accordion-item">
                              <h2 class="accordion-header">
                                 <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                 Type of Service
                                 </button>
                              </h2>
                              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                 <div class="accordion-body">
                                    <ul class="tags">
                                       <li class="tag">
                                          <span class="text">
                                             <i>Child Development Unit/Service </i> <b class="count"> (23) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                       <li class="tag">
                                          <span class="text">
                                             <i>Private Practice </i> <b class="count"> (45) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item">
                              <h2 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                 Profession/Role
                                 </button>
                              </h2>
                              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                 <div class="accordion-body">
                                    <ul class="tags">
                                       <li class="tag">
                                          <span class="text">
                                             <i> Child Health Nurse </i>
                                             <b class="count"> (1) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                       <li class="tag">
                                          <span class="text">
                                             <i> Dietician </i>  <b class="count"> (1) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                       <li class="tag">
                                          <span class="text">
                                             <i>Indigenous Health Worker </i> <b class="count"> (1) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-item">
                              <h2 class="accordion-header">
                                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                 Location
                                 </button>
                              </h2>
                              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                                 <div class="accordion-body">
                                    <ul class="tags">
                                       <li class="tag">
                                          <span class="text">
                                             <i>Child Health Nurse</i> <b> (1) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                       <li class="tag">
                                          <span class="text">
                                             <i>Dietician </i> <b class="count"> (1) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                       <li class="tag">
                                          <span class="text">
                                             <i>Indigenous Health Worker </i> <b class="count"> (1) </b>
                                          </span>
                                          <button class="icon">
                                          <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon.svg" alt="icon">
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="bottom">
                        <button class="fasd_btn outline_btn" style="--btnClr: #197391;">Refine Search</button>
                        <button class="cross" >
                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/cross_icon_stroke.svg" alt="icon">
                        </button>
                     </div>
                  </div>
               </div>
               
               <div class="col-lg-8">
                    <div class="listings_wrapper">
                        <div class="listing_wrap">
                            <div class="top">
                                <div class="info_wrap">
                                    <div class="left">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/Inkblot-Psychology-Clinic.svg" alt="icon">
                                        </i>
                                    </div>
                                    <div class="right">
                                        <h4 class="hdng">Inkblot Psychology Clinic</h4>
                                        <p class="location">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/location.svg" alt="icon" class="icon">
                                            315 Karrinyup Road Karrinyup WA 6018
                                        </p>
                                    </div>
                                </div>
                                <div class="btns_wrap">
                                    <a href="#" class="fasd_btn fill_btn with_icon_img" style="--btnClr:#005E7E">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_call_icon.svg" alt="icon" class="initial">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_call_icon.svg" alt="icon" class="hovered">
                                        </i>
                                        08 6245 0130
                                    </a>
                                    <a href="#" class="fasd_btn outline_btn with_icon_img" style="--btnClr:#005E7E">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_email_icon.svg" alt="icon" class="initial">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_email_icon.svg" alt="icon" class="hovered">
                                        </i>
                                        Email
                                    </a>
                                    <a href="#" class="fasd_btn outline_btn with_icon_img" style="--btnClr:#005E7E">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_web_link_icon.svg" alt="icon" class="initial">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_web_link_icon.svg" alt="icon" class="hovered">
                                        </i>
                                        Website
                                    </a>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="inner">
                                    <div class="left">
                                        <ul>
                                            <li>
                                                <a href="#">FASD Hub</a>
                                            </li>
                                            <li>
                                                <a href="#">Services</a>
                                            </li>
                                            <li>
                                                <a href="#">Clinics</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="right">
                                        <div class="updated_on">
                                            <i class="icon">
                                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/updated_icon.svg" alt="">
                                            </i>
                                            <p>Page last updated 24 January 2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="listing_wrap">
                            <div class="top">
                                <div class="info_wrap">
                                    <div class="left">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/Inkblot-Psychology-Clinic.svg" alt="icon">
                                        </i>
                                    </div>
                                    <div class="right">
                                        <h4 class="hdng">Inkblot Psychology Clinic</h4>
                                        <p class="location">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/location.svg" alt="icon" class="icon">
                                            315 Karrinyup Road Karrinyup WA 6018
                                        </p>
                                    </div>
                                </div>
                                <div class="btns_wrap">
                                    <a href="#" class="fasd_btn fill_btn with_icon_img" style="--btnClr:#005E7E">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_call_icon.svg" alt="icon" class="initial">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_call_icon.svg" alt="icon" class="hovered">
                                        </i>
                                        08 6245 0130
                                    </a>
                                    <a href="#" class="fasd_btn outline_btn with_icon_img" style="--btnClr:#005E7E">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_email_icon.svg" alt="icon" class="initial">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_email_icon.svg" alt="icon" class="hovered">
                                        </i>
                                        Email
                                    </a>
                                    <a href="#" class="fasd_btn outline_btn with_icon_img" style="--btnClr:#005E7E">
                                        <i class="icon">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/blue_web_link_icon.svg" alt="icon" class="initial">
                                            <img src="http://52.64.249.237/wp-content/uploads/2024/04/white_web_link_icon.svg" alt="icon" class="hovered">
                                        </i>
                                        Website
                                    </a>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="inner">
                                    <div class="left">
                                        <ul>
                                            <li>
                                                <a href="#">FASD Hub</a>
                                            </li>
                                            <li>
                                                <a href="#">Services</a>
                                            </li>
                                            <li>
                                                <a href="#">Clinics</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="right">
                                        <div class="updated_on">
                                            <i class="icon">
                                                <img src="http://52.64.249.237/wp-content/uploads/2024/04/updated_icon.svg" alt="">
                                            </i>
                                            <p>Page last updated 24 January 2024</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
      </div>
      <div class="post_pagination v_2">
            <ul>
                <li class="control prev">
                    <a href="#">
                        <img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_left_arrow.svg" alt="shape">
                    </a>
                </li>
                <li class="count">
                    <a href="#">1</a>
                </li>
                <li class="count current">
                    <a href="#">2</a>
                </li>
                <li class="count">
                    <a href="#">3</a>
                </li>
                <li class="count">
                    <a href="#">...</a>
                </li>
                <li class="count">
                    <a href="#">24</a>
                </li>
                <li class="control next">
                    <a href="#">
                        <img src="http://52.64.249.237/wp-content/uploads/2024/04/pagination_right_arrow.svg" alt="shape">
                    </a>
                </li>
            </ul>
        </div>
   </div>
   <!-- shapes -->
   <!-- <img src="http://52.64.249.237/wp-content/uploads/2024/04/audience_sec_circle.svg" alt="shape" class="sec_shape top_right">
      <img src="http://52.64.249.237/wp-content/uploads/2024/04/light_green_leaf.svg" alt="shape" class="sec_shape bottom_left"> -->
</section>
<!-- service_directory_results end -->
<?php get_footer();?>