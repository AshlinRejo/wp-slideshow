<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/ashlinrejo/
 * @since      1.0.0
 *
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/public/partials
 */

if (!empty($slideshow_images)) {
?>
    <div>
        <div class="as-slideshow">

            <div class="slides-box">
                <?php
                foreach ($slideshow_images as $image_id) {
                    $fullsize_url = wp_get_attachment_url( $image_id );
                    ?>
                    <div class="slide">
                        <img src="<?php echo esc_url($fullsize_url); ?>" alt="image" title="image">
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="slideshow-buttons">
                <div class="prev-btn">&larr;</div>
                <div class="next-btn">&rarr;</div>
            </div>
        </div>
    </div>
<?php } ?>