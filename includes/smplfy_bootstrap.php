<?php
/**
 * Loads specified files and all files in specified directories and initialises dependencies
 */

namespace SMPLFY\boilerplate;

if ( ! defined('ABSPATH') ) exit;

function bootstrap_boilerplate_plugin() {

    // Load all required files
    require_boilerplate_dependencies();

    // Initialize the plugin dependency graph
    DependencyFactory::create_plugin_dependencies();
}

/**
 * Require the directories for the Boilerplate Plugin
 *
 * @return void
 */
function require_boilerplate_dependencies() {

    require_file( 'includes/enqueue_scripts.php' );
    require_file( 'admin/DependencyFactory.php' );

    require_directory( 'public/php/types' );
    require_directory( 'public/php/entities' );
    require_directory( 'public/php/repositories' );
    require_directory( 'public/php/usecases' );
    require_directory( 'public/php/adapters' );
}

/**
 * Register GravityPDF templates for this plugin
 */
add_filter( 'gravitypdf_template_paths', __NAMESPACE__ . '\\register_boilerplate_pdf_templates' );

function register_boilerplate_pdf_templates( $paths ) {
    $paths[] = SMPLFY_BOILERPLATE_PLUGIN_DIR . 'public/php/pdf-templates/';
    error_log("Boilerplate PDF Templates Registered");
    return $paths;
}
