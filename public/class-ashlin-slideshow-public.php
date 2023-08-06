<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/ashlinrejo/
 * @since      1.0.0
 *
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/public
 * @author     Ashlin Rejo <ashlinrejo1@gmail.com>
 */
class Ashlin_Slideshow_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    /**
     * Option key name which contains image ids.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $option_key_name    Slideshow option key name.
     */
    private $option_key_name = 'ashlin_slideshow_image_ids';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ashlin_Slideshow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ashlin_Slideshow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ashlin-slideshow-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ashlin_Slideshow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ashlin_Slideshow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name . '-flickity', plugin_dir_url( __FILE__ ) . 'lib/js/flickity.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ashlin-slideshow-public.js', array( 'jquery', $this->plugin_name . '-flickity' ), $this->version, false );

	}

    /**
     * Display slideshow on front-end.
     *
     * @since    1.0.0
     */
    public function display_image_slideshow() {
        $slideshow_images = get_option( $this->option_key_name, array() );
        include_once 'partials/ashlin-slideshow-public-display.php';
    }

}
