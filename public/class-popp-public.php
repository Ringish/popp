<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Popp
 * @subpackage Popp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Popp
 * @subpackage Popp/public
 * @author     Your Name <email@example.com>
 */
class Popp_Public {

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
		 * defined in Popp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Popp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . '/dist/styles/popp.min.css', array(), $this->version, 'all' );

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
		 * defined in Popp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Popp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/scripts/main.min.js', array( 'jquery' ), $this->version, false );

	}

		/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
		public function show_popup() {
		/**
		 * This function is making the pop up show in specified ways
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Popp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Popp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if (!isset($_SESSION['popp_seen'])) {
			$args = array(
				'post_type' => 'popup',

				);
			$query = new WP_Query( $args );

			if ($query->have_posts()) {
				echo '<div class="popp-overlay">';
				while ($query->have_posts()) {
					$query->the_post();
					echo '<div class="popp-content">';
					the_post_thumbnail('full');
					echo '<h2>'.get_the_title().'</h2>';
					the_content();
					echo '</div>';
				}
				echo '</div>';
				wp_reset_query();
				wp_reset_postdata();
			}
			$_SESSION['popp_seen'] = 1;
		}


	}

	public function start_session() {
    if(!session_id()) {
        session_start();
    }
}

}
