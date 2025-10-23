<?php
// Remove <p> and <br/> from Contact Form 7  (Uncomment this filter if you use CF7)
add_filter('wpcf7_autop_or_not', '__return_false');
