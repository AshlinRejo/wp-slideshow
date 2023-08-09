<?php
/**
 * Class Ashlin_Slideshow_Public_Test
 *
 * @package Ashlin_Slideshow
 */

/**
 * Sample test case.
 */
class Ashlin_Slideshow_Public_Test extends WP_UnitTestCase {

    /**
     * Test for display_image_slideshow().
     */
    public function test_display_image_slideshow() {
        // Add a slideshow
        update_option( 'ashlin_slideshow_image_ids', array( 10 ) );

        // Run shortcode
        ob_start();
        do_shortcode( '[ashlin_slideshow]' );
        $output = ob_get_clean();

        /**
         * Check if the 'as-slideshow' is present in $output
         * 'as-slideshow' is the class name used while display image slideshow
         */
        $string_found = strpos( $output, 'as-slideshow' );
        $this->assertTrue( false !== $string_found );
    }

}
