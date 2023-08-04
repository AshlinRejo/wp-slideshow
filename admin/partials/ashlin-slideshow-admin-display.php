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
        <button type="buttton" id="as-add-images-btn" class="button"><?php esc_html_e('Add/Choose images', 'ashlin-slideshow'); ?></button>
    </p>
    <p>
        <ul class="as-images ui-sortable">
        </ul>
    </p>
    <input type="hidden" id="slideshow-images-ids" name="slideshow-images-ids" value="" />
    <p class="as-publish-block">
        <button type="buttton" id="as-publish-slideshow-btn" class="button button-primary"><?php esc_html_e('Publish', 'ashlin-slideshow'); ?></button>
    </p>
</div>
