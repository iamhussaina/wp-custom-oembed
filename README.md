# WordPress Custom oEmbed Integration

A professional, theme-includable module to register custom oEmbed providers in WordPress. This allows internal or non-standard video/content URLs to be automatically embedded when pasted into the WordPress editor.

## 🌟 Features

* **Dual Architecture**: Includes both **OOP (Object-Oriented)** and **Procedural** versions.
* **Theme Integrable**: Designed to be included directly in a theme's `functions.php` file.
* **Professionally Prefixed**: All classes and functions use the `hussainas` prefix to avoid conflicts.
* **Localization Ready**: Configured with the `hussainas` text domain and a `/languages` directory.
* **Clean & Maintainable**: Follows WordPress coding standards for a high-quality codebase.

## 📋 Requirements

* WordPress 5.0 or higher
* PHP 7.4 or higher

## 🚀 How to Use (Installation)

1.  **Download:** Download the `wp-custom-oembed` directory.
2.  **Place Directory:** Copy the entire `wp-custom-oembed` folder into your active WordPress theme's directory.
    * *Example Path:* `/wp-content/themes/your-active-theme/wp-custom-oembed/`
3.  **Include Loader:** Open your theme's `functions.php` file and add the following line of code at the end:

    ```php
    // Load the custom oEmbed integration module.
    require_once get_template_directory() . '/wp-custom-oembed/load.php';
    ```

## ⚙️ Configuration

This module will not work out-of-the-box until you configure it with your *actual* provider details. The provider must have a valid oEmbed API endpoint.

**To add your provider:**

1.  **Choose Your Version:** Open `load.php`. By default, it loads the OOP version. You can switch to the Procedural version by commenting/uncommenting the `require_once` lines.
2.  **Edit the Core File:**
    * **For OOP (Recommended):** Open `/oop/class-hussainas-oembed-integration.php`.
    * **For Procedural:** Open `/procedural/functions.php`.
3.  **Modify the `wp_oembed_add_provider()` call:**
    Inside the function (`hussainas_register_providers` or `hussainas_register_custom_oembed_providers`), find the example blocks. Replace the placeholder URLs with your real ones.

    ```php
    // --- Example 1: Internal Video Portal (Wildcard format) ---
    
    wp_oembed_add_provider(
        // REPLACE THIS: with your video URL format.
        '[https://videos.my-company.com/view/](https://videos.my-company.com/view/)*', 
        
        // REPLACE THIS: with your oEmbed API endpoint URL.
        '[https://api.my-company.com/oembed](https://api.my-company.com/oembed)', 
        
        false
    );

    // --- Example 2: Internal Document Viewer (Regex format) ---
    
    wp_oembed_add_provider(
        // REPLACE THIS: with your document URL regex.
        '#https?://docs\.my-company\.com/d/([a-z0-9\-]+)/?#i', 
        
        // REPLACE THIS: with your docs oEmbed API endpoint URL.
        '[https://api.my-company.com/oembed-docs](https://api.my-company.com/oembed-docs)', 
        
        true
    );
    ```
