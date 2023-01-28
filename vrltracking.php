<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/naeem-akhtar-cs/
 * @since             1.0.0
 * @package           Vrltracking
 *
 * @wordpress-plugin
 * Plugin Name:       VRLTracking
 * Plugin URI:        https://www.linkedin.com/in/naeem-akhtar-cs/
 * Description:       Shortcode [VRLTracking]. Please note plugin uses a third-party service to fetch data. In case of service changes your plugin may be affected and will need an upgrade that is subject to changes. And note that owner of this plugin is responsible for any illegal use, if any, and not the developer.
 * Version:           1.0.0
 * Author:            Naeem Akhtar
 * Author URI:        https://www.linkedin.com/in/naeem-akhtar-cs/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vrltracking
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
define( 'VRLTRACKING_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vrltracking-activator.php
 */
function activate_vrltracking() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vrltracking-activator.php';
	Vrltracking_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vrltracking-deactivator.php
 */
function deactivate_vrltracking() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vrltracking-deactivator.php';
	Vrltracking_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vrltracking' );
register_deactivation_hook( __FILE__, 'deactivate_vrltracking' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vrltracking.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_vrltracking() {

	$plugin = new Vrltracking();
	$plugin->run();

}
run_vrltracking();
