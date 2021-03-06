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
 * Plugin URI:        http://plugin.com/plugin-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        http://author.com/
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

require_once PLUGIN_NAME_PLUGIN_PATH . 'includes/autoloader.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
register_activation_hook( PLUGIN_NAME_PLUGIN_FILE, [Plugin_Name_Activator::class, 'activate'] );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
register_deactivation_hook( PLUGIN_NAME_PLUGIN_FILE, [Plugin_Name_Deactivator::class, 'deactivate'] );

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
