
<div class="row nav nav-pills mb-3" id="pills-tab" role="tablist">
	<?php
	$count = 0;
	if (have_rows('benefits')) :
		while (have_rows('benefits')) : the_row();
			$title = get_sub_field('title');
			$benefit_image = get_sub_field('image');
			$count++;
			if (!empty($benefit_image)) {	 
	?>
				<div class="col-12 col-sm-10 col-md-6 col-lg-3 nav-item" role="presentation">
					<div class="tab_btn_wrap">
						<figure>
							<img src="<?php echo esc_url($benefit_image['url']); ?>" alt="<?php echo esc_attr($title); ?>" class="">
							<figcaption class="hdng">
								<?php echo esc_html($title); ?>
							</figcaption>
						</figure>
						<button class="nav-link <?php echo $count === 1 ? 'active' : ''; ?>" id="pills-<?php echo $count;?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $count;?>" type="button" role="tab" aria-controls="pills-<?php echo $count;?>" aria-selected="<?php echo $count === 1 ? 'true' : 'false'; ?>"></button>
					</div>					
				</div>					
	<?php
			}
		endwhile;
	endif;
	?>
</div>

<div class="row tab-content" id="pills-tabContent">
	<?php
	$count = 0;
	if (have_rows('video_repeater')) :
		while (have_rows('video_repeater')) : the_row();
			$video_thumbnail = get_sub_field('video_thumbnail');
			$video = get_sub_field('video');
			$foot_note_heading = get_sub_field('foot_note_heading');
			$footnote_description = get_sub_field('footnote_description');
			$count++;
	?>
			<div class="col-12 tab-pane fade <?php echo $count === 1 ? 'show active' : ''; ?>" id="pills-<?php echo $count; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $count; ?>-tab" tabindex="0">
				<div class="video_container_tm">
					<?php if (!empty($video_thumbnail)) { ?>
						<div class="video_placeholder">
							<img src="<?php echo esc_url($video_thumbnail['url']); ?>" alt="" class="">
						</div>
					<?php } ?>
					<?php if (!empty($video)) { ?>
						<div class="video_wrapper">
							<video controls>
								<source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
							</video>
						</div>
					<?php } ?>
					<div class="quote">
						<?php if (!empty($foot_note_heading)) { ?>
							<h6 class="hdng"><?php echo esc_html($foot_note_heading); ?></h6>
						<?php } ?>
						<?php if (!empty($footnote_description)) { ?>
							<p><?php echo esc_html($footnote_description); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
	<?php
		endwhile;
	endif;
	?>
</div>