<?php

namespace Plugin_Name;

use Plugin_Name\Includes\Plugin_Name;
use Plugin_Name\Includes\Plugin_Name_Activator;
use Plugin_Name\Includes\Plugin_Name_Deactivator;

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
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_plugin_name() {
	Plugin_Name_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_plugin_name() {
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( PLUGIN_NAME_PLUGIN_FILE, 'activate_plugin_name' );
register_deactivation_hook( PLUGIN_NAME_PLUGIN_FILE, 'deactivate_plugin_name' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Plugin_Name();
	$plugin->run();

}
run_plugin_name();
