<?php

namespace Plugin_Name;

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * Define global path constants
 */
define( 'PLUGIN_NAME_PLUGIN_FILE', __FILE__ );
define( 'PLUGIN_NAME_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_NAME_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


/**
 * Register autoloader
 */
spl_autoload_register(function($required_file) {

    # Transform file name from class based to file based
    $fixed_name = strtolower( str_ireplace( '_', '-', $required_file ) );
    $file_path = explode( '\\', $fixed_name );
    $last_index = count( $file_path ) - 1;
    $file_name = "class-{$file_path[$last_index]}.php";

    # Get fully qualified path
    $fully_qualified_path =  trailingslashit( dirname(__FILE__) );
    for ( $key = 1; $key < $last_index; $key++ ) {
        $fully_qualified_path .= trailingslashit( $file_path[ $key ] );
    }
    $fully_qualified_path .= $file_name;

    # Include the file
    if ( stream_resolve_include_path($fully_qualified_path) ) {
        include_once $fully_qualified_path;
    }

});

/**
 * The core plugin class that is used to define internationalization and site hooks.
 */

class Plugin_Name_Init {

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    private $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of the plugin.
     */
    private $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     * @access   public
     */
    public function __construct() {
        if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
            $version = PLUGIN_NAME_VERSION;
        } else {
            $version = '1.0.0';
        }
        $this->plugin_name = 'plugin-name';

        register_activation_hook( PLUGIN_NAME_PLUGIN_FILE, [$this, 'activate_plugin_name']);
        register_deactivation_hook( PLUGIN_NAME_PLUGIN_FILE, [$this, 'deactivate_plugin_name']);

        $this->set_locale();
        $this->define_hooks();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new Plugin_Name_i18n();

        add_action( 'plugins_loaded', [$plugin_i18n, 'load_plugin_textdomain']);

    }

    /**
     * Register the hooks of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_hooks() {

        $plugin = new Plugin_Name( $this->get_plugin_name(), $this->get_version() );

        /**
         * The following lines will load public Front-end CSS/JS.
         * In case of use, files should be created and methods should be implemented,
         * Methods defined for 'admin_enqueue_scripts' hook could be used as templates.
         */
        add_action( 'admin_enqueue_scripts', [$plugin, 'enqueue_styles']);
        add_action( 'admin_enqueue_scripts', [$plugin, 'enqueue_scripts']);

    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @access   public
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @access   public
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

    /**
     * The code that runs during plugin activation.
     *
     * @since    1.0.0
     * @access   public
     * @see register_activation_hook
     */
    public function activate_plugin_name() {
        /**
         * Fired during plugin activation.
         *
         * This class defines all code necessary to run during the plugin's activation.
         *
         *
         */
    }

    /**
     * The code that runs during plugin deactivation.
     *
     * @since    1.0.0
     * @access   public
     * @see register_deactivation_hook
     */
    public function deactivate_plugin_name() {
        /**
         * Fired during plugin deactivation.
         *
         * This class defines all code necessary to run during the plugin's deactivation.
         */
    }

}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
$plugin = new Plugin_Name_Init();
