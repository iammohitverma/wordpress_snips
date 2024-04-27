<?php /* Template Name: Register Service Directory */

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
            <form action="javascript:void(0);" method="POST" id="form_register_service">
              <div class="form_inputs">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <div class="field">
                      <label for="service_name">Service name*:</label>
                      <input type="text" name="service_name" class="service_name required_field"/>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="field">
                      <label for="contact_person">Main contact person*:</label>
                      <input type="text" name="contact_person" class="contact_person required_field" />
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="field">
                      <label for="email">Email address*:</label>
                      <input type="text" name="email" class="required_field email" />
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="field">
                      <label for="phone">Phone number*:</label>
                      <input type="text" name="phone" class="required_field phone"/>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="field">
                      <label for="website_url">Website URL*:</label>
                      <input type="text" name="website_url" class="website_url required_field"/>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="field">
                      <label for="primary_address">Address*:</label>
                      <input type="text" name="primary_address" class="primary_address required_field"/>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="field">
                      <label for="sec_address">Address:</label>
                      <input type="text" name="sec_address" class="sec_address required_field"/>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="field">
                          <label for="state">State/Territory*:</label>
                          <input type="text" name="state" class="state required_field"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="field">
                          <label for="postcode">Postcode*:</label>
                          <input type="text" name="postcode" class="postcode required_field"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form_inputs">
                <h4 class="fs_25 form_heading">
                  What is the nature of your clinic, service or practice?
                </h4>
                <div class="field custom_checkbox check-radio-wrap required_field">
                  <label for="fasd_assessment"
                    >FASD assessment clinic
                    <input
                      type="checkbox"
                      name="fasd_assessment"
                      value="FASD assessment clinic"
                      id="fasd_assessment"
                      class="hospital_service required_field"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="hospital_service"
                    >Hospital outpatient service
                    <input
                      type="checkbox"
                      name="hospital_service"
                      value="Hospital outpatient service"
                      id="hospital_service"
                      class="hospital_service required_field"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="child_development"
                    >Child development unit/service
                    <input
                      type="checkbox"
                      name="child_development"
                      value="Child development unit/service"
                      id="child_development"
                      class="hospital_service required_field"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="private_practice"
                    >Private practice
                    <input
                      type="checkbox"
                      name="private_practice"
                      value="Private practice"
                      id="private_practice"
                      class="hospital_service required_field"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="all_option"
                    >All options
                    <input
                      type="checkbox"
                      name="all_option"
                      value="All options"
                      id="all_option"
                      class="hospital_service required_field"
                    />
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="field">
                  <label for="other">Other (please specify)</label>
                  <textarea name="other" class="clinic_nature_other"></textarea>
                </div>
              </div>
              <div class="form_inputs">
                <h4 class="fs_25 form_heading">
                  Which health professionals are available at your clinic?
                </h4>
                <div class="field custom_checkbox check-radio-wrap required_field">
                  <label for="child_health_nurse"
                    >Child Health 
                    Nurse
                    <input
                      type="checkbox"
                      name="child_health_nurse"
                      value="Child Health Nurse"
                      id="child_health_nurse"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="clinical_psychologist"
                    >Clinical Psychologist
                    <input
                      type="checkbox"
                      name="clinical_psychologist"
                      value="Clinical Psychologist"
                      id="clinical_psychologist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="geneticist"
                    >Geneticist
                    <input
                      type="checkbox"
                      name="geneticist"
                      value="Geneticist"
                      id="geneticist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="indigenous_health_worker"
                    >Indigenous Health Worker
                    <input
                      type="checkbox"
                      name="indigenous_health_worker"
                      value="Indigenous Health Worker"
                      id="indigenous_health_worker"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="midwife"
                    >Midwife
                    <input
                      type="checkbox"
                      name="midwife"
                      value="Midwife"
                      id="midwife"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="neonatologist"
                    >Neonatologist
                    <input
                      type="checkbox"
                      name="neonatologist"
                      value="Neonatologist"
                      id="neonatologist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="neurologist"
                    >Neurologist
                    <input
                      type="checkbox"
                      name="neurologist"
                      value="Neurologist"
                      id="neurologist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="neuropsychologist"
                    >Neuropsychologist
                    <input
                      type="checkbox"
                      name="neuropsychologist"
                      value="Neuropsychologist"
                      id="neuropsychologist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="obstetrician"
                    >Obstetrician
                    <input
                      type="checkbox"
                      name="obstetrician"
                      value="Obstetrician"
                      id="obstetrician"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="occupational_therapist"
                    >Occupational Therapist
                    <input
                      type="checkbox"
                      name="occupational_therapist"
                      value="Occupational Therapist"
                      id="occupational_therapist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="paediatrician"
                    >Paediatrician
                    <input
                      type="checkbox"
                      name="paediatrician"
                      value="Paediatrician"
                      id="paediatrician"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="physiotherapist"
                    >Physiotherapist
                    <input
                      type="checkbox"
                      name="physiotherapist"
                      value="Physiotherapist"
                      id="physiotherapist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="psychiatrist"
                    >Psychiatrist
                    <input
                      type="checkbox"
                      name="psychiatrist"
                      value="Psychiatrist"
                      id="psychiatrist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="psychologist"
                    >Psychologist
                    <input
                      type="checkbox"
                      name="psychologist"
                      value="Psychologist"
                      id="psychologist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="social_worker"
                    >Social Worker
                    <input
                      type="checkbox"
                      name="social_worker"
                      value="Social Worker"
                      id="social_worker"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="speech_pathologist"
                    >Speech Pathologist
                    <input
                      type="checkbox"
                      name="speech_pathologist"
                      value="Speech Pathologist"
                      id="speech_pathologist"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="Other_clinic"
                    >Other
                    <input
                      type="checkbox"
                      name="Other_clinic"
                      value="Other"
                      id="Other_clinic"
                      class="health_profession"
                    />
                    <span class="checkmark"></span>
                  </label>
                  </div>
                <div class="field">
                  <label for="other">Other (please specify)</label>
                  <textarea name="other" class="health_profession_other"></textarea>
                </div>
              </div>
              <div class="form_inputs">
                <h4 class="fs_25 form_heading">
                  Which type of FASD-informed services do you provide?
                </h4>
                <div class="field custom_checkbox check-radio-wrap required_field">
                  <label for="assessment"
                    >Assessment
                    <input
                      type="checkbox"
                      name="assessment"
                      value="Assessment"
                      id="assessment"
                      class="informed_services"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="initial_management"
                    >Initial management
                    <input
                      type="checkbox"
                      name="initial_management"
                      value="Initial management"
                      id="initial_management"
                      class="informed_services"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="ongoing_management"
                    >Ongoing management
                    <input
                      type="checkbox"
                      name="ongoing_management"
                      value="Ongoing management"
                      id="ongoing_management"
                      class="informed_services"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="all_informed_services"
                    >All options
                    <input
                      type="checkbox"
                      name="all_informed_services"
                      value="All options"
                      id="all_informed_services"
                      class="informed_services"
                    />
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="field">
                  <label for="other">Other (please specify)</label>
                  <textarea name="other" class="fasd_service"></textarea>
                </div>
                <div class="field">
                  <label for="other">Please provide a short overview of your clinic and the FASD-informed services that you provide.</label>
                  <textarea name="other" class="service_overview required_field"></textarea>
                </div>
              </div>
              <div class="form_inputs">
                <h4 class="fs_25 form_heading">
                  Where do you accept referrals from?
                </h4>
                <div class="field custom_checkbox check-radio-wrap required_field">
                  <label for="allied_health"
                    >Allied health professionals
                    Nurse
                    <input
                      type="checkbox"
                      name="allied_health"
                      value="Allied health professionals Nurse"
                      id="allied_health"
                      class="referrals_from"
                      class=""
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="child_protection_services"
                    >Child protection services
                    <input
                      type="checkbox"
                      name="child_protection_services"
                      value="Child protection services"
                      id="child_protection_services"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="education_departments"
                    >Education Departments
                    <input
                      type="checkbox"
                      name="education_departments"
                      value="Education Departments"
                      id="education_departments"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="families"
                    >Families
                    <input
                      type="checkbox"
                      name="families"
                      value="Families"
                      id="families"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="general_practitioners"
                    >General Practitioners
                    <input
                      type="checkbox"
                      name="general_practitioners"
                      value="General Practitioners"
                      id="general_practitioners"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="justice_departments"
                    >Justice Departments
                    <input
                      type="checkbox"
                      name="justice_departments"
                      value="Justice Departments"
                      id="justice_departments"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="other_medical_specialists"
                    >Other medical specialists
                    <input
                      type="checkbox"
                      name="other_medical_specialists"
                      value="Other medical specialists"
                      id="other_medical_specialists"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="paediatricians"
                    >Paediatricians
                    <input
                      type="checkbox"
                      name="paediatricians"
                      value="Paediatricians"
                      id="paediatricians"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="psychologists"
                    >Psychologists
                    <input
                      type="checkbox"
                      name="psychologists"
                      value="Psychologists"
                      id="psychologists"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="all_options_refferal"
                    >All options
                    <input
                      type="checkbox"
                      name="all_options_refferal"
                      value="All options"
                      id="all_options_refferal"
                      class="referrals_from"
                    />
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form_inputs">
                <h4 class="fs_25 form_heading">
                  What is your billing structure?
                </h4>
                <div class="field custom_radio flex-grow check-radio-wrap required_field">
                  <label for="medicare-bulk-billed"
                    >Medicare bulk-billed
                    <input
                      type="radio"
                      name="billing_structure"
                      value="Medicare bulk-billed"
                      id="medicare-bulk-billed"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="additional_fee"
                    >Medicare plus additional fee
                    <input
                      type="radio"
                      name="billing_structure"
                      value="Medicare plus additional fee"
                      id="additional_fee"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="service_or_practice"
                    >Fee – advised when person contacts the clinic, service or practice
                    <input
                      type="radio"
                      name="billing_structure"
                      value="Fee - advised when person contacts the clinic, service or practice"
                      id="service_or_practice"
                    />
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form_inputs">
                <h4 class="fs_25 form_heading">
                  Which age groups do you work with?
                </h4>
                <div class="field custom_radio check-radio-wrap required_field">
                  <label for="zero"
                    >0 - 4 years
                    <input
                      type="checkbox"
                      name="zero"
                      value="0 - 4 years"
                      id="zero"
                      class="age_group"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="five"
                    >5 - 11 years
                    <input
                      type="checkbox"
                      name="five"
                      value="5 - 11 years"
                      id="five"
                      class="age_group"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="twelve"
                    >12 - 18 years
                    <input
                      type="checkbox"
                      name="twelve"
                      value="12 - 18 years"
                      id="twelve"
                      class="age_group"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="adult"
                    >Adults (> 18 years)
                    <input
                      type="checkbox"
                      name="adult"
                      value="Adults (> 18 years)"
                      id="adult"
                      class="age_group"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="age_all_option"
                    >All options
                    <input
                      type="checkbox"
                      name="age_all_option"
                      value="All options"
                      id="age_all_option"
                      class="age_group"
                    />
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="form_inputs">
                <h4 class="form_heading acceptance_head">
                  Would you like to subscribe to our mailing list to hear more from the FASD Hub, including our monthly newsletters, webinar invitations and new publications and resources?
                </h4>
                <div class="field custom_radio check-radio-wrap required_field">
                  <label for="yes"
                    >Yes
                    <input
                      type="radio"
                      name="acceptance"
                      value="Yes"
                      id="yes"
                    />
                    <span class="checkmark"></span>
                  </label>
                  <label for="no"
                    >No
                    <input
                      type="radio"
                      name="acceptance"
                      value="No"
                      id="no"
                    />
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="submit">
                <!-- <input type="submit" value="Submit" class="submit_form" id="submit_btn"> -->
                <button type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


<?php get_footer(); ?>