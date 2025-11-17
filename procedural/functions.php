<?php

/**
 * @package     Hussainas_OEmbed_Module
 * @version     1.0.0
 *
 * This file contains the procedural implementation for registering custom oEmbed providers.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registers the custom oEmbed providers.
 *
 * This is the core function where you add your custom providers.
 * Replace the example URLs with your actual service URLs.
 *
 * @since 1.0.0
 */
function hussainas_register_custom_oembed_providers() {

    // --- Example 1: Internal Video Portal (Wildcard format) ---
    //
    // @desc Registers 'my-company-videos'.
    //
    // @param string $format    The URL format. '*' is a wildcard.
    // @param string $provider  The URL of the oEmbed endpoint.
    // @param bool   $regex     (Optional) Whether the format is regex. Default false.

    wp_oembed_add_provider(
        'https://videos.my-company.com/view/*', // URL pattern to match
        'https://api.my-company.com/oembed',    // Your oEmbed API endpoint
        false                                   // 'false' because we are using wildcards, not regex
    );

    // --- Example 2: Internal Document Viewer (Regex format) ---
    //
    // @desc Registers 'my-company-docs' using a more complex regex.
    //       This matches URLs like:
    //       https://docs.my-company.com/d/a-z-0-9-hyphens/
    //
    // @param string $format    A regex pattern.
    // @param string $provider  The URL of the oEmbed endpoint.
    // @param bool   $regex     Set to true.

    wp_oembed_add_provider(
        '#https?://docs\.my-company\.com/d/([a-z0-9\-]+)/?#i', // Regex URL pattern to match
        'https://api.my-company.com/oembed-docs',             // Your oEmbed API endpoint for docs
        true                                                  // 'true' because this is a regex
    );

    // --- Add more providers here as needed ---
    // wp_oembed_add_provider( ... );
}

// Hook the function into the 'init' action.
// Priority 9 ensures it runs slightly earlier if needed.
add_action( 'init', 'hussainas_register_custom_oembed_providers', 9 );
