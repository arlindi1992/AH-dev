<?php 
/*
 * Plugin Name:       AH dev
 * Plugin URI:        https://geo-events.com/
 * Description:       Adds a share button and automatically updates the year
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Arlind Halimi
 * Author URI:        https://arlindhalimi.com/
 */

/** Load custom CSS and JS files */
function jksn_load_plugin_scripts(){
    $plugin_url = plugin_dir_url( __FILE__ );

    // CSS
    wp_enqueue_style( 
        'custom-css',
        $plugin_url . 'custom.css',
        array(),
        filemtime(plugin_dir_path( __FILE__ ) .'custom.css')
    );
    // JS
    wp_enqueue_script( 
        'custom-js',
        $plugin_url . 'custom.js',
        array('jquery'),
        filemtime(plugin_dir_path( __FILE__ ) .'custom.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'jksn_load_plugin_scripts');

 // year Shortcode
function year_shortcode() {
    $year = date('Y');
    return $year;
}
add_shortcode('year', 'year_shortcode');

// Shortcode for share button facebook
function facebook_share_button(){
    $url = get_permalink();
    return '<a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" 
                target="_blank" 
                rel="noopener noreferrer"
                class="fb-share-button">
                📤 Share on Facebook
            </a>';
}
add_shortcode('facebook_share', 'facebook_share_button');

// shortcode for share button linkedin
function linkedin_share_button($atts) {
    $url = get_permalink(); // Merr URL-në e postimit ose faqes aktuale
    return '<a href="https://www.linkedin.com/sharing/share-offsite/?url=' . esc_url($url) . '" 
                target="_blank" 
                class="linkedin-share-button">
                🔗 Share on LinkedIn
            </a>';
}
add_shortcode('linkedin_share', 'linkedin_share_button');