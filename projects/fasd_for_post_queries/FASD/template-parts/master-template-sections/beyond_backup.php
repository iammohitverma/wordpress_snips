 <section class="content_editor_module" style="background: <?php echo $bg_clr ?>">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex align-items-center">
                    <h3 class="main_hdng">
                        <?php echo $sec_hdg ?>
                    </h3>
                </div>
                <div class="col-12 col-lg-6 d-flex align-items-center mt-3 mt-lg-0">
                    <p class="main_desc">
                      <?php echo $desc ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5">
                    <!-- Provide option for carousel in admin panel | if user select carousel option then this ID will add in following element "beyond_da_hub_slider" -->
                    <div class="owl-carousel owl-theme" id="beyond_da_hub_slider">
                        <div class="item">
                            <div class="box">
                                <div class="image_wrap">
                                    <figure>
                                        <img src="/wp-content/uploads/2024/04/column-card_two_img_left.png" alt="" />


                                        <a href="#" class="link_arrow">

                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                        </a>
                                    </figure>
                                </div>
                                <div class="content_wrap">
                                    <h4 class="hdng">
                                        Information on the diagnostic process for parents and carers
                                    </h4>
                                    <p class="desc">
                                        Advice on getting a referral for a FASD assessment, learn about the process for a FASD assessment.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="image_wrap">
                                    <figure>
                                        <img src="/wp-content/uploads/2024/04/column-card_two_img_right.png" alt="" />

                                        <a href="#" class="link_arrow">

                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                        </a>

                                    </figure>
                                </div>
                                <div class="content_wrap">
                                    <h4 class="hdng">FASD and Medicare</h4>
                                    <p class="desc">
                                        Certain FASD-related assessment, diagnosis and management services may be eligible for Medicare rebates.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="image_wrap">
                                    <figure>
                                        <img src="/wp-content/uploads/2024/04/column-card_two_img_right.png" alt="" />

                                        <a href="#" class="link_arrow">

                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.88379 12.1163L12.1163 1.88379M12.1163 1.88379H3.74425M12.1163 1.88379V10.2559" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                        </a>

                                    </figure>
                                </div>
                                <div class="content_wrap">
                                    <h4 class="hdng">FASD and Medicare</h4>
                                    <p class="desc">
                                        Certain FASD-related assessment, diagnosis and management services may be eligible for Medicare rebates.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- shapes -->
        <?php 
            if (!empty($shapes)) {
                foreach ($shapes as $shape) {
                    if ($shape == 'Top Left') {
                       echo '<img src="' . esc_url($tleft['url']) . '" alt="" class="top-left">';
                    }   elseif ($shape == 'Top Right') {
                        echo '<img src="' . esc_url($tright['url']) . '" alt="" class="top-right">';
                    }   elseif ($shape == 'Bottom left') {
                        echo '<img src="' . esc_url($bleft['url']) . '" alt="" class="bottom-left">';
                    }  elseif ($shape == 'Bottom Right') {
                        echo '<img src="' . esc_url($bright['url']) . '" alt="" class="bottom-right">';
                    }  elseif ($shape == 'Left Center') {
                        echo '<img src="' . esc_url($lcenter['url']) . '" alt="" class="middle-left">';
                    }  elseif ($shape == 'Right Center') {
                        echo '<img src="' . esc_url($rcenter['url']) . '" alt="" class="middle-right ">';
                    }  else {
                        // Handle other cases if needed
                        echo "Found something else: $shape\n";
                    }
                }
            } else {
                // echo "No shapes selected.";
            }
        ?>
    </section>