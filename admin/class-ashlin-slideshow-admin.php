<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/ashlinrejo/
 * @since      1.0.0
 *
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ashlin_Slideshow
 * @subpackage Ashlin_Slideshow/admin
 * @author     Ashlin Rejo <ashlinrejo1@gmail.com>
 */
class Ashlin_Slideshow_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ashlin-slideshow-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

        // For handle wp media
        wp_enqueue_media();
        wp_enqueue_script( $this->plugin_name . '-jquery-ui', plugin_dir_url( __FILE__ ) . 'lib/js/jquery-ui.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ashlin-slideshow-admin.js', array( 'jquery', $this->plugin_name . '-jquery-ui' ), $this->version, false );
        wp_enqueue_script($this->plugin_name);
        wp_localize_script(
            $this->plugin_name, 'ashlinSlideshow', array(
                'nonce' => wp_create_nonce( 'ashlin-slideshow-ajax-nonce' ),
                'delete_text' => esc_html__('Delete', 'ashlin-slideshow'),
            )
        );
    }

    /**
     * For add a menu under settings.
     *
     * @since    1.0.0
     */
    public function add_options_page_under_settings() {

        add_options_page(
            __( 'Customize Slideshow', 'ashlin-slideshow' ),
            __( 'Ashlin Slideshow Settings', 'ashlin-slideshow' ),
            'manage_options',
            $this->plugin_name,
            array( $this, 'display_options_page_section' )
        );

    }

    /**
     * To display the Slideshow options.
     *
     * @since    1.0.0
     */
    public function display_options_page_section() {
        include_once 'partials/ashlin-slideshow-admin-display.php';
    }
}
