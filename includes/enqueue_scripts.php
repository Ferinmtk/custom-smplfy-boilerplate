<?php
/**
 * Enqueue frontend scripts and styles for Smplfy Boilerplate Plugin
 */

namespace SMPLFY\boilerplate;

function enqueue_boilerplate_frontend_scripts() {

    global $current_user;
    global $post;

    $current_user = wp_get_current_user();

    // -----------------------------
    // Core WordPress Scripts
    // -----------------------------
    wp_enqueue_script('heartbeat');

    // -----------------------------
    // Custom Frontend Script (Your Main JS)
    // -----------------------------
    wp_register_script(
        'smplfy-boilerplate-frontend-script',
        SMPLFY_NAME_PLUGIN_URL . 'public/js/frontend.js',
        ['jquery'],
        time(),
        true
    );

    // -----------------------------
    // Custom Gravity Forms / Intern Forms Script
    // -----------------------------
    wp_register_script(
        'smplfy-boilerplate-intern-forms-js',
        SMPLFY_NAME_PLUGIN_URL . 'public/js/wp-heartbeat-example.js',
        ['jquery', 'heartbeat'],
        time(),
        true
    );

    // -----------------------------
    // Custom Frontend Styles
    // -----------------------------
    wp_register_style(
        'smplfy-boilerplate-frontend-styles',
        SMPLFY_NAME_PLUGIN_URL . 'public/css/frontend.css',
        [],
        time()
    );

    // -----------------------------
    // Enqueue Main Frontend Files
    // -----------------------------
    wp_enqueue_script('smplfy-boilerplate-frontend-script');
    wp_enqueue_style('smplfy-boilerplate-frontend-styles');

    // -----------------------------
    // Conditional Heartbeat Script
    // -----------------------------
    if ( isset($post->ID) && $post->ID == 999 ) {

        wp_enqueue_script('smplfy-boilerplate-intern-forms-js');

        wp_localize_script(
            'smplfy-boilerplate-intern-forms-js',
            'heartbeat_object',
            [
                'user_id' => $current_user->ID,
                'page_id' => $post->ID,
            ]
        );
    }
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_boilerplate_frontend_scripts');
