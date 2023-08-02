<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/ashlinrejo/
 * @since      1.0.0
 *
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/includes
 * @author     Ashlin Rejo <ashlinrejo1@gmail.com>
 */
class Ashlin_Slideshow_I18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ashlin-slideshow',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}

}
