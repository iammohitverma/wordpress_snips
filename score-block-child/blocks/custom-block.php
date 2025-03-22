<?php
$heading = get_field('heading');
$content = get_field('content');

// Check if the block is in preview mode
if (isset($is_preview) && $is_preview) { ?>
    <div style="background: #f8f9fa; border: 1px solid #ddd;">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/block-preview.png" 
             alt="Block Preview" 
             style="max-width: 100%; height: auto;" />
    </div>
<?php return; } ?>

<div class="custom-block">
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="display-5 fw-bold"><?php echo esc_html($heading); ?></h1>
        <div class="col-lg-10 mx-auto">
            <p class="lead mb-4"><?php echo esc_html($content); ?></p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
        </div>
    </div>
</div>
