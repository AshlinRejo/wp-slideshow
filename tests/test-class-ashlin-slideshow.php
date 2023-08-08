<?php
/**
 * Class Ashlin_Slideshow_Test
 *
 * @package Ashlin_Slideshow
 */

/**
 * Sample test case.
 */
class Ashlin_Slideshow_Test extends WP_UnitTestCase {

    /**
     * Test for set_locale().
     */
    public function test_set_locale() {
        // Plugin i18n
        $plugin_i18n_action = $this->is_hook_registered( 'plugins_loaded', 10, 'Ashlin_Slideshow_I18n', 'load_plugin_textdomain');
        $actions_registered = ( true === $plugin_i18n_action );

        $this->assertTrue( $actions_registered );
    }

    /**
     * Test for define_admin_hooks().
     */
    public function test_define_admin_hooks() {
        // Admin hooks
        $admin_enqueue_style_action     = $this->is_hook_registered( 'admin_enqueue_scripts', 10, 'Ashlin_Slideshow_Admin', 'enqueue_styles');
        $admin_enqueue_script_action    = $this->is_hook_registered( 'admin_enqueue_scripts', 10, 'Ashlin_Slideshow_Admin', 'enqueue_scripts');
        $admin_menu_action              = $this->is_hook_registered( 'admin_menu', 10, 'Ashlin_Slideshow_Admin', 'add_options_page_under_settings');
        $admin_ajax_action              = $this->is_hook_registered( 'wp_ajax_as_update_slideshow', 10, 'Ashlin_Slideshow_Admin', 'ajax_update_slideshow');

        $actions_registered             = ( true === $admin_enqueue_style_action && true === $admin_enqueue_script_action &&
                                            true === $admin_menu_action && true === $admin_ajax_action );
        $this->assertTrue( $actions_registered );
    }

    /**
     * Test for define_public_hooks().
     */
    public function test_define_public_hooks() {
        // Front-end hooks
        $public_enqueue_style_action    = $this->is_hook_registered( 'wp_enqueue_scripts', 10, 'Ashlin_Slideshow_Public', 'enqueue_styles');
        $public_enqueue_script_action   = $this->is_hook_registered( 'wp_enqueue_scripts', 10, 'Ashlin_Slideshow_Public', 'enqueue_scripts');

        // Check shortcode registered
        $shortcode_registered           = shortcode_exists( 'ashlin_slideshow' );

        $actions_registered             = ( true === $public_enqueue_style_action && true === $public_enqueue_script_action && true === $shortcode_registered );
        $this->assertTrue( $actions_registered );
    }

    /**
     * Test for get_plugin_name().
     */
    public function test_get_plugin_name() {
        $ashlin_slideshow   = new Ashlin_Slideshow();
        $plugin_name        = $ashlin_slideshow->get_plugin_name();
        $test_result        = ('ashlin-slideshow' === $plugin_name);
        $this->assertTrue( $test_result );
    }

    /**
     * Test for get_loader().
     */
    public function test_get_loader() {
        $ashlin_slideshow   = new Ashlin_Slideshow();
        $loader             = $ashlin_slideshow->get_loader();
        $test_result        = ($loader instanceof Ashlin_Slideshow_Loader);
        $this->assertTrue( $test_result );
    }

    /**
     * Test for get_version().
     */
    public function test_get_version() {
        $ashlin_slideshow   = new Ashlin_Slideshow();
        $plugin_version     = $ashlin_slideshow->get_version();
        $test_result        = ( ASHLIN_SLIDESHOW_VERSION === $plugin_version);
        $this->assertTrue( $test_result );
    }

    /**
     * For checking hook registered
     *
     * @param string    $event_name Event name.
     * @param integer   $priority Event priority.
     * @param string    $class_name Call back class name.
     * @param string    $class_name Call back method name.
     * @return boolean
    */
    private function is_hook_registered( $event_name, $priority, $class_name, $method_name) {
        global $wp_filter;
        if (isset($wp_filter[$event_name]) && isset($wp_filter[$event_name][$priority])) {
            foreach ($wp_filter[$event_name][$priority] as $callback_details) {
                if (isset($callback_details['function']) && isset($callback_details['function'][0])) {
                    if (is_object($callback_details['function'][0])) {
                        if (  get_class($callback_details['function'][0]) === $class_name && $callback_details['function'][1] === $method_name ) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}
