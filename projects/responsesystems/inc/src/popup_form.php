
<?php 
// get value from shortcode
$args = wp_parse_args(
    $args, 
    $attributes
);

$formid = $args['formid'];

?>


<div class="popup_wrap">
    <div class="tm_popup">
        <button class='cross closeModal'>x</button>
        <div class="form_wrap">
            <?php echo do_shortcode('[contact-form-7 id="' . $formid . '" title="Register and download form"]'); ?>
        </div>
        <div class="thankyou_wrap">
            <h4>Thank you for your form submission!</h4>
            <p>The document will open on a new tab.</p>
            <button href="site_btn_v1" class="site_btn_v1 closeModal">Close</button>
        </div>
    </div>
</div>


