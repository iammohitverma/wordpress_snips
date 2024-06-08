<?php
    $referbutton = get_sub_field('button');	
    $refer_mail_subject = get_sub_field('mail_subject');	
    $refer_mail_content = get_sub_field('mail_content');	
    if ($referbutton):
        $referbutton_url = esc_url_raw($referbutton['url']); 
        $referbutton_title = esc_html($referbutton['title']);
        $referbutton_target = $referbutton['target'] ? esc_attr($referbutton['target']) : '_self';
        ?>

        <?php if ($refer_mail_subject && $refer_mail_content): ?>
            <a href="<?php echo esc_url($referbutton_url . '?subject=' . $refer_mail_subject . '&body=' . $refer_mail_content); ?>" target="<?php echo esc_attr($referbutton_target); ?>" class="cmn_btn"><?php echo $referbutton_title; ?></a>
        <?php else: ?>
            <a href="<?php echo esc_url($referbutton_url); ?>" target="<?php echo esc_attr($referbutton_target); ?>" class="cmn_btn"><?php echo $referbutton_title; ?></a>
        <?php endif; ?>

    <?php endif; ?>