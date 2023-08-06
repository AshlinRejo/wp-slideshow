<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/ashlinrejo/
 * @since      1.0.0
 *
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/admin/partials
 */
?>

<div class="wrap" id="as-container">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <p>
        <?php esc_html_e('Choose the image to display slideshow in front-end.', 'ashlin-slideshow'); ?>
    </p>
    <p>
        <button type="buttton" id="as-add-images-btn" class="button"><?php esc_html_e('Select or upload images', 'ashlin-slideshow'); ?></button>
    </p>
    <p>
        <ul class="as-images ui-sortable">
        <?php
        if (!empty($slideshow_images)) {
            foreach ($slideshow_images as $image_id) {
                $fullsize_url = wp_get_attachment_url( $image_id );
                ?>
                <li class="as-image" data-attachment_id="<?php echo esc_attr($image_id); ?>">
                    <img src="<?php echo esc_url($fullsize_url); ?>">
                    <ul class="as-actions">
                        <li>
                            <a href="#" class="as-delete" title="<?php esc_attr_e('Delete', 'ashlin-slideshow'); ?>"><?php esc_attr_e('Delete', 'ashlin-slideshow'); ?></a>
                        </li>
                    </ul>
                </li>
        <?php
            }
        }
        ?>
        </ul>
    </p>
    <input type="hidden" id="slideshow-images-ids" name="slideshow-images-ids" value="<?php echo esc_attr(implode(',', $slideshow_images )); ?>" />
    <p class="as-publish-block">
        <button type="buttton" id="as-publish-slideshow-btn" class="button button-primary"><?php esc_html_e('Publish', 'ashlin-slideshow'); ?></button>
    </p>
    <p>
        <?php echo wp_kses_data(__('Use the shortcode <b>[ashlin_slideshow]</b> to display slideshow in any pages.', 'ashlin-slideshow')); ?>
    </p>
</div>
