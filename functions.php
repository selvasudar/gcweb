<?php

define('ASSET_PATH', get_template_directory_uri() . '/assets');
// define('VERSION', $GLOBALS['version_number']);

// Define Constants
define('TD_URI', get_template_directory_uri());
define('TD_PATH', get_template_directory());
define('FONTS_URI', get_template_directory_uri() . '/assets/fonts');
define('STYLES_URI', get_template_directory_uri() . '/assets/css');
// define('RESOURCES_URI', get_template_directory_uri() . '/resources');
define('ICON_URI', get_template_directory_uri() . '/assets/icons');
define('IMAGES_URI', get_template_directory_uri() . '/assets/images');
define('SCRIPTS_URI', get_template_directory_uri() . '/assets/js');
$domain = $_SERVER['HTTP_HOST'];
define('DOMAIN', $domain);
define('COOKIE_EXPIRY', time() + (86400 * 365));


/** Add Bootstrap Nav walker to customize menu's **/
if (!file_exists(TD_PATH . '/includes/class-kf-bootstrap-navwalker.php')) {
	// file does not exist... return an error.
	return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
	// file exists... require it.
	require_once TD_PATH . '/includes/class-kf-bootstrap-navwalker.php';
}

add_theme_support('menus');
function register_my_menus() {
  register_nav_menus(
    array(
      'primary' => __('Primary Menu'),
    )
  );
}
add_action('after_setup_theme', 'register_my_menus');

function add_nav_link_class($atts, $item, $args) {
    if ($args->theme_location === 'primary') {
        // Is this a submenu item?
        $is_sub_menu = $item->menu_item_parent != 0;

        // Is this a parent with children (dropdown)?
        $has_children = in_array('menu-item-has-children', $item->classes);

        // Base class
        if ($is_sub_menu) {
            $class = 'dropdown-item';
        } else {
            $class = 'nav-item nav-link';
        }

        // Add dropdown-toggle for top-level items with children
        if (!$is_sub_menu && $has_children) {
            $class .= ' dropdown-toggle';
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-expanded'] = 'false';
            $atts['role'] = 'button';
        }

        // Add active class
        if (in_array('current-menu-item', $item->classes) || in_array('current_page_item', $item->classes)) {
            $class .= ' active';
        }

        $atts['class'] = $class;
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_nav_link_class', 10, 3);


function gcweb_enqueue_assets() {
    // CSS
     // Font Awesome
    wp_enqueue_style(
        'font-awesome-cdn',
        'https://use.fontawesome.com/releases/v5.15.4/css/all.css',
        [],
        null
    );

    // Bootstrap Icons
    wp_enqueue_style(
        'bootstrap-icons-cdn',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css',
        [],
        '1.4.1'
    );
    wp_enqueue_style('bootstrap-style', ASSET_PATH . '/css/bootstrap.min.css', [], '1.0.0');
    
    wp_enqueue_style('animate-style', ASSET_PATH . '/lib/animate/animate.min.css', [], '1.0.0');
    wp_enqueue_style('owl-carousel-style', ASSET_PATH . '/lib/owlcarousel/assets/owl.carousel.min.css', [], '1.0.0');
    wp_enqueue_style('gcweb-style', ASSET_PATH . '/css/style.css', [], '1.0.0');
   

    // JS
    wp_enqueue_script('jquery-script', ASSET_PATH . '/js/jquery.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('bootstrap-script', ASSET_PATH . '/js/bootstrap.bundle.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('bootstrap-script', ASSET_PATH . '/lib/wow/wow.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('bootstrap-script', ASSET_PATH . '/lib/easing/easing.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('bootstrap-script', ASSET_PATH . '/lib/waypoints/waypoints.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('bootstrap-script', ASSET_PATH . '/lib/counterup/counterup.min.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('bootstrap-script', ASSET_PATH . '/lib/owlcarousel/owl.carousel.min.js', ['jquery'], '1.0.0', true);
    
    wp_enqueue_script('gcweb-script', ASSET_PATH . '/js/script.js', ['jquery'], '1.0.0', true);    
}
add_action('wp_enqueue_scripts', 'gcweb_enqueue_assets');