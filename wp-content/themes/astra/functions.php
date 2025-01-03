<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.8.2' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.8.2' );

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_PRO_UPGRADE_URL', astra_get_pro_url( 'https://wpastra.com/pricing/', 'dashboard', 'free-theme', 'dashboard' ) );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', astra_get_pro_url( 'https://wpastra.com/pricing/', 'customizer', 'free-theme', 'upgrade' ) );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';
require_once get_template_directory() . '/inc/admin_pages.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';





////
//////
/////
//Table Data
//
//
//
	
function display_journal_data() {
    global $wpdb;
    $output = '';

    if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
        $search_query = sanitize_text_field($_GET['search_query']);
        $tables = ['ced', 'con', 'ccs', 'coe', 'chtm', 'cas'];
        $results = [];

        foreach ($tables as $table) {
            $table_results = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT * FROM $table WHERE Title LIKE %s OR Author LIKE %s OR JournalSubjects LIKE %s",
                    '%' . $wpdb->esc_like($search_query) . '%',
                    '%' . $wpdb->esc_like($search_query) . '%',
                    '%' . $wpdb->esc_like($search_query) . '%'
                ),
                ARRAY_A
            );

            if (!empty($table_results)) {
                $results = array_merge($results, $table_results);
            }
        }

        if (!empty($results)) {
            $output .= '<div class="search-results">';
            foreach ($results as $row) {
                $output .= '<div class="result-box">';
                $output .= '<h3>' . esc_html($row['Title']) . '</h3>';
                $output .= '<p><strong>Author:</strong> ' . esc_html($row['Author']) . '</p>';
                $output .= '<p><strong>Journal Subjects:</strong> ' . esc_html($row['JournalSubjects']) . '</p>';
                $output .= '</div>';
            }
            $output .= '</div>'; 
        } else {
            $output .= '<p>No results found for "' . esc_html($search_query) . '"</p>';
        }
    } else {
        $tables = ['ced', 'con', 'ccs', 'coe', 'chtm', 'cas'];
        $results = [];

        foreach ($tables as $table) {
            $table_results = $wpdb->get_results("SELECT Title, Author, DatePublished, Abstract FROM $table", ARRAY_A);
            if (!empty($table_results)) {
                $results = array_merge($results, $table_results);
            }
        }

        if (!empty($results)) {
            $output .= '<div class="journal-container">';
            foreach ($results as $row) {
                $output .= '<div class="journal-box" onclick="toggleDetails(this)">';
                $output .= '<div class="journal-header">';
                $output .= '<h3 class="journal-title">' . esc_html($row['Title']) . '</h3>';
                $output .= '<span class="journal-updated">Last updated on ' . esc_html($row['DatePublished']) . '</span>';
                $output .= '</div>';
                $output .= '<div class="journal-info">';
                $output .= '<p>Published by ' . esc_html($row['Author']) . '</p>';
                $output .= '<p>Journal subjects: ...</p>';
                $output .= '</div>';
                $output .= '<div class="journal-details" style="display: none;">';
                $output .= '<p><strong>Abstract:</strong> ' . esc_html($row['Abstract']) . '</p>';
                $output .= '</div>';
                $output .= '</div>';
            }
            $output .= '</div>';
        } else {
            $output = 'No data found.';
        }
    }

    return $output;
}
add_shortcode('journal_data', 'display_journal_data');


// Enqueue your custom script if needed
function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Custom Search Form
function custom_search_form() {
    $current_url = home_url( add_query_arg( null, null ) ); // Get the current URL with query parameters
    $output = '<form role="search" method="get" id="searchform" action="' . esc_url($current_url) . '">';
    $output .= '<input type="text" placeholder="Search by title, author, or subject..." name="search_query" id="s" required>';
    $output .= '<input type="submit" id="searchsubmit" value="Search">';
    $output .= '</form>';
    return $output;
}
add_shortcode('custom_search_form', 'custom_search_form');





/////
//
//
//
//
// Function to display data from a table based on the provided table name
function ddisplay_data_from_table($table_name) {
    global $wpdb;
    $output = '';
    
    // Check if the user is logged in and has the required roles (Subscriber, Editor, or Administrator)
    if (is_user_logged_in()) {
        // Check if the user has 'subscriber', 'editor', or 'administrator' role
        if (current_user_can('subscriber') || current_user_can('editor') || current_user_can('administrator')) {
            $can_download = true;
        } else {
            $can_download = false;
        }
    } else {
        $can_download = false;
    }

    if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
        $search_query = sanitize_text_field($_GET['search_query']);
        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name WHERE Title LIKE %s OR Author LIKE %s OR JournalSubjects LIKE %s",
                '%' . $wpdb->esc_like($search_query) . '%',
                '%' . $wpdb->esc_like($search_query) . '%',
                '%' . $wpdb->esc_like($search_query) . '%'
            ),
            ARRAY_A
        );
        if (!empty($results)) {
            $output .= '<div class="journal-container">';
            foreach ($results as $row) {
                $output .= '<div class="journal-box" onclick="toggleDetails(this)">';
                $output .= '<div class="journal-header">';
                $output .= '<h3 class="journal-title">' . esc_html($row['Title']) . '</h3>';
                $output .= '<span class="journal-updated">Last updated on ' . esc_html($row['DatePublished']) . '</span>';
                
                // Check if the user is allowed to download or needs a popup
                if ($can_download) {
                    $output .= '<a href="https://sample.com" class="download-link">Download Link</a>';
                } else {
                    $output .= '<a href="javascript:void(0);" class="download-link" onclick="showDownloadPopup()">Download Link</a>';
                }

                $output .= '</div>';
                $output .= '<div class="journal-info">';
                $output .= '<p>Published by ' . esc_html($row['Author']) . '</p>';
                $output .= '<p>Journal subjects: ' . esc_html($row['JournalSubjects']) . '</p>';
                $output .= '</div>';
                $output .= '<div class="journal-details" style="display: none;">';
                $output .= '<p><strong>Abstract:</strong> ' . esc_html($row['Abstract']) . '</p>';
                $output .= '</div>';
                $output .= '</div>';
            }
            $output .= '</div>';
        } else {
            $output .= '<p>No results found for "' . esc_html($search_query) . '"</p>';
        }
    } else {
        $results = $wpdb->get_results("SELECT Title, Author, DatePublished, JournalSubjects, Abstract FROM $table_name", ARRAY_A);
        if (!empty($results)) {
            $output .= '<div class="journal-container">';
            foreach ($results as $row) {
                $output .= '<div class="journal-box" onclick="toggleDetails(this)">';
                $output .= '<div class="journal-header">';
                $output .= '<h3 class="journal-title">' . esc_html($row['Title']) . '</h3>';
                $output .= '<span class="journal-updated">Last updated on ' . esc_html($row['DatePublished']) . '</span>';

                // Check if the user is allowed to download or needs a popup
                if ($can_download) {
                    $output .= '<a href="https://sample.com" class="download-link">Download Link</a>';
                } else {
                    $output .= '<a href="javascript:void(0);" class="download-link" onclick="showDownloadPopup()">Download Link</a>';
                }

                $output .= '</div>';
                $output .= '<div class="journal-info">';
                $output .= '<p>Published by ' . esc_html($row['Author']) . '</p>';
                $output .= '<p>Journal subjects: ' . esc_html($row['JournalSubjects']) . '</p>';
                $output .= '</div>';
                $output .= '<div class="journal-details" style="display: none;">';
                $output .= '<p><strong>Abstract:</strong> ' . esc_html($row['Abstract']) . '</p>';
                $output .= '</div>';
                $output .= '</div>';
            }
            $output .= '</div>';
        } else {
            $output = 'No data found.';
        }
    }

    // Add the modal container HTML at the end of the output
    $output .= '
        <div id="downloadPopup" class="download-popup">
    <div class="download-popup-content">
        <span class="download-popup-close" onclick="closeDownloadPopup()">&times;</span>
        <p>You must be a member to download.</p>
    </div>
</div>

    ';

    return $output; 
}



function ddisplay_custom_table_data_shortcode() {
    global $post;
    $table_name = sanitize_title($post->post_name);
    $valid_tables = ['ced', 'ccs', 'coc','cas','nurse','cbaa','chtm','coe']; 
    if (in_array($table_name, $valid_tables)) {
        return ddisplay_data_from_table($table_name);
    } else {
        return 'Invalid table name.';
    }
}
add_shortcode('ccustom_table_data', 'ddisplay_custom_table_data_shortcode');
function ccustom_search_form() {
    global $post;
    $table_name = sanitize_title($post->post_name); 
    $current_url = home_url(add_query_arg(null, null)); 
    $output = '<form role="search" method="get" id="searchform" action="' . esc_url($current_url) . '">';
    $output .= '<input type="hidden" name="table_name" value="' . esc_attr($table_name) . '">'; 
    $output .= '<input type="text" placeholder="Search by title, author, or subject..." name="search_query" id="s" required>';
    $output .= '<input type="submit" id="searchsubmit" value="Search">';
    $output .= '</form>';
    return $output;
}
add_shortcode('ccustom_search_form', 'ccustom_search_form');



///// UM Redirect Login

/**
 * Redirect to the previous page after login via the Ultimate Member login form.
 */
add_filter( 'um_browser_url_redirect_to__filter', function( $url ) {
	if ( empty( $url ) && isset( $_SERVER['HTTP_REFERER'] ) ) {
		$url = esc_url( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
	}
	return add_query_arg( 'umuid', uniqid(), $url );
} );







