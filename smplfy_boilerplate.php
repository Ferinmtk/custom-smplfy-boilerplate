<?php
/**
 * Plugin Name: SMPLFY Boiler Plate
 * Version: 1.0.0
 * Description: Starter plugin with custom plugin framework to get started
 * Author: Thomas Picolo-Donnelly
 * Author URI: https://simplifybiz.com/
 * Requires PHP: 7.4
 * Requires Plugins: smplfy-core
 */

namespace SMPLFY\boilerplate;

prevent_external_script_execution();

// --------------------------------------------------------
// Define Plugin Constants
// --------------------------------------------------------
define( 'SITE_URL', get_site_url() );
define( 'SMPLFY_NAME_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SMPLFY_NAME_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// --------------------------------------------------------
// Load essential files
// --------------------------------------------------------
require_once SMPLFY_NAME_PLUGIN_DIR . 'admin/utilities/smplfy_require_utilities.php';
require_once SMPLFY_NAME_PLUGIN_DIR . 'includes/smplfy_bootstrap.php';
require_once SMPLFY_NAME_PLUGIN_DIR . 'public/php/types/FormIds.php';

// --------------------------------------------------------
// Bootstrap the plugin
// --------------------------------------------------------
bootstrap_boilerplate_plugin();


// --------------------------------------------------------
// Security: Prevent direct access
// --------------------------------------------------------
function prevent_external_script_execution(): void {
    if ( ! function_exists( 'get_option' ) ) {
        header( 'HTTP/1.0 403 Forbidden' );
        die;
    }
}
