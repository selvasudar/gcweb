<?php

define('ASSET_PATH', get_template_directory_uri() . '/assets');

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
