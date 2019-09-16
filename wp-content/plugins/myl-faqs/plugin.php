<?php
/**
 * Plugin Name: Made You Look FAQ's
 * Plugin URI: 
 * Description: Plugin to handle the display of FAQs
 *
 * Version: 1.7.0
 *
 * Author: John Gardner - Modified by Dylan Pitchford
 * Author URI: 
 *
 * Text Domain: mylk-faq
 *
 * License: GNU General Public License v2.0
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 */

class mylk_FAQ {

    /**
     * Plugin version.
     *
     * @since   1.6.0
     * @access  private
     * @var     string      $version    Plugin version
     */
    private $version;

    /**
     * The directory path to the plugin file's includes folder.
     *
     * @since   1.6.0
     * @access  private
     * @var     string      $dir        The directory path to the includes folder
     */
    private $inc;

    /**
     * Initialize the class and set its properties.
     *
     * @since   1.6.0
     */
    public function __construct() {
        $this->version = '1.7.0';
        $this->inc = trailingslashit( plugin_dir_path( __FILE__ ) . '/includes' );
        $this->load_dependencies();
        $this->load_admin();

        add_action( 'init', array( $this, 'metabox_init' ), 9999 );
    }

    /**
     * Load the required dependencies for the plugin.
     *
     * - Admin loads the backend functionality
     * - Public provides front-end functionality
     * - Dashboard Glancer loads the helper class for the admin dashboard
     *
     * @since   1.0.0
     */
    private function load_dependencies() {
        require_once( $this->inc . 'class-mylk-faq-admin.php' );
        require_once( $this->inc . 'class-mylk-faq-display.php' );

        // if ( ! class_exists( 'Gamajo_Dashboard_Glancer' ) )
        //     require_once( $this->inc . 'class-gamajo-dashboard-glancer.php' );
    }

    /**
     * Loads the admin functionality
     *
     * @since   1.6.0
     */
    private function load_admin() {
        new mylk_FAQ_Admin( $this->get_version() );
    }

    /**
     * Conditionally load the metabox class
     *
     * For one reason or another, this file can't be included in the load_dependencies function
     * and must be referenced separately.
     *
     * @since   1.6.0
     */
    public function metabox_init() {
        if ( ! class_exists( 'cmb_Meta_Box' ) )
            require_once( $this->inc . 'metabox/init.php');
    }

    /**
     * Return the current version of the plugin
     *
     * @since   1.6.0
     * @return  string   Returns plugin version
     */
    public function get_version() {
        return $this->version;
    }

}

/** Vroom vroom */
add_action( 'plugins_loaded', 'mylk_faq_run' );

function mylk_faq_run() {
    load_plugin_textdomain( 'mylk-faq' );
    new mylk_FAQ();
}