<?php
/**
 * Description: Main loader file for the Custom oEmbed Integration Module.
 * Include this file in your theme's functions.php.
 *
 * @package     Hussainas_OEmbed_Module
 * @version     1.0.0
 * @author      Hussain Ahmed Shrabon
 * @license     GPL-2.0-or-later
 * @link        https://github.com/iamhussaina
 * @textdomain  hussainas
 *
 */

// Exit if accessed directly to prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// --- Constants ---

/**
 * Define the module version for cache-busting or checks.
 */
if ( ! defined( 'HUSSAINAS_OEMBED_MODULE_VERSION' ) ) {
    define( 'HUSSAINAS_OEMBED_MODULE_VERSION', '1.0.0' );
}

/**
 * Define the module's file path.
 */
if ( ! defined( 'HUSSAINAS_OEMBED_MODULE_PATH' ) ) {
    define( 'HUSSAINAS_OEMBED_MODULE_PATH', trailingslashit( dirname( __FILE__ ) ) );
}

/**
 * Define the module's text domain.
 */
if ( ! defined( 'HUSSAINAS_OEMBED_TEXT_DOMAIN' ) ) {
    define( 'HUSSAINAS_OEMBED_TEXT_DOMAIN', 'hussainas' );
}


// --- Core Module Loader ---
//
// Choose which version to load.
// By default, the OOP version is enabled.
//
// To use the procedural version, comment out the OOP 'require_once'
// and uncomment the Procedural 'require_once'.

/**
 * Load the OOP version (Recommended)
 *
 * Provides better encapsulation and avoids naming conflicts.
 */
require_once HUSSAINAS_OEMBED_MODULE_PATH . 'oop/class-hussainas-oembed-integration.php';


/**
 * Load the Procedural version
 *
 * Uncomment the line below AND comment the line above to use this version.
 */
// require_once HUSSAINAS_OEMBED_MODULE_PATH . 'procedural/functions.php';


/**
 * Load text domain for localization.
 *
 * This allows the module's strings to be translated.
 */
function hussainas_oembed_load_textdomain() {
    // We use load_plugin_textdomain as it's the most robust way,
    // even when included in a theme.
    load_plugin_textdomain(
        HUSSAINAS_OEMBED_TEXT_DOMAIN,
        false,
        HUSSAINAS_OEMBED_MODULE_PATH . 'languages/'
    );
}
// Use 'plugins_loaded' to ensure it runs early enough, even in a theme.
add_action( 'plugins_loaded', 'hussainas_oembed_load_textdomain' );
