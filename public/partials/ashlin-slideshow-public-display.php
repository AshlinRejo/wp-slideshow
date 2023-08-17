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
        <span class="as-slideshow">
            <span class="slides-box">
                <?php
                foreach ($slideshow_images as $image_id) {
                    $fullsize_url = wp_get_attachment_url( $image_id );
                    ?>
                    <span class="slide">
                        <img src="<?php echo esc_url($fullsize_url); ?>" alt="image" title="image">
                    </span>
                    <?php
                }
                ?>
            </span>
            <span class="slideshow-buttons">
                <span class="prev-btn">&larr;</span>
                <span class="next-btn">&rarr;</span>
            </span>
        </span>
<?php } ?>