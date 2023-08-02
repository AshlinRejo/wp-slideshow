<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/ashlinrejo/
 * @since             1.0.0
 * @package           Ashlin_Slideshow
 *
 * @wordpress-plugin
 * Plugin Name:       Ashlin Slideshow
 * Plugin URI:        https://github.com/rtlearn/wpcs-AshlinRejo
 * Description:       This plugin allows to create image slideshow through WordPress back-end and displays in front-end through short-code.
 * Version:           1.0.0
 * Author:            Ashlin Rejo
 * Author URI:        https://github.com/ashlinrejo/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ashlin-slideshow
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ASHLIN_SLIDESHOW_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ashlin-slideshow-activator.php
 */
function activate_ashlin_slideshow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ashlin-slideshow-activator.php';
	Ashlin_Slideshow_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ashlin-slideshow-deactivator.php
 */
function deactivate_ashlin_slideshow() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ashlin-slideshow-deactivator.php';
	Ashlin_Slideshow_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ashlin_slideshow' );
register_deactivation_hook( __FILE__, 'deactivate_ashlin_slideshow' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ashlin-slideshow.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ashlin_slideshow() {

	$plugin = new Ashlin_Slideshow();
	$plugin->run();

}
run_ashlin_slideshow();
