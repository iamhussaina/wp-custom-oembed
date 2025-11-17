<?php
/**
 * @package     Hussainas_OEmbed_Integration
 * @version     1.0.0
 *
 * This file contains the OOP implementation for registering custom oEmbed providers.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Final class Hussainas_OEmbed_Integration.
 *
 * Handles the registration of custom oEmbed providers using an
 * object-oriented, singleton pattern.
 */
final class Hussainas_OEmbed_Integration {

    /**
     * Holds the singleton instance of the class.
     *
     * @var Hussainas_OEmbed_Integration|null
     * @since 1.0.0
     */
    private static $instance = null;

    /**
     * Retrieves the singleton instance of the class.
     *
     * @return Hussainas_OEmbed_Integration The singleton instance.
     * @since 1.0.0
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Private constructor to prevent direct instantiation.
     * Hooks into WordPress.
     *
     * @since 1.0.0
     */
    private function __construct() {
        // 'init' is the correct hook for registering oEmbed providers.
        // Using priority 9 to run slightly before default (10) if needed.
        add_action( 'init', [ $this, 'hussainas_register_providers' ], 9 );
    }

    /**
     * Registers the custom oEmbed providers.
     *
     * This is the core function where you add your custom providers.
     * Replace the example URLs with your actual service URLs.
     *
     * @since 1.0.0
     */
    public function hussainas_register_providers() {
        
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

    /**
     * Cloning is forbidden to maintain the singleton pattern.
     *
     * @since 1.0.0
     */
    public function __clone() {
        _doing_it_wrong( 
            __FUNCTION__, 
            esc_html__( 'Cloning is forbidden.', 'hussainas' ), 
            '1.0.0' 
        );
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup() {
        _doing_it_wrong( 
            __FUNCTION__, 
            esc_html__( 'Unserializing instances of this class is forbidden.', 'hussainas' ), 
            '1.0.0' 
        );
    }
}

/**
 * Fires the integration.
 *
 * The main function responsible for returning the one true instance of the class.
 *
 * @return Hussainas_OEmbed_Integration
 * @since 1.0.0
 */
function hussainas_oembed_integration_init() {
    return Hussainas_OEmbed_Integration::get_instance();
}

// Initialize the module.
hussainas_oembed_integration_init();

