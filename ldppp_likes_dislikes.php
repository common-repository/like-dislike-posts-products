<?php
/*
Plugin Name: Like Dislike Posts/Products
Description: A plugin to AJAX like and dislike feature in your posts/products
Version: 1.0
Author: Kirtikumar Solanki
Text Domain: like-dislike-posts-products
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'LDPPP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( LDPPP_PLUGIN_DIR . 'functions.php' );

function ldppp_scripts_and_styles(){
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'ldppp_scripts', plugin_dir_url( __FILE__ ) . 'assets/js/scripts.js', array('jquery'), null, false );
	wp_localize_script( 'ldppp_scripts', 'ldppp_count_ajax', array( 'ajaxurl' => esc_url(admin_url(  'admin-ajax.php' ) ) ) );
	wp_enqueue_script('ldppp_scripts');
	wp_enqueue_style( 'ldppp_font-awesome', plugin_dir_url( __FILE__ ) . 'assets/css/font-awesome.min.css');
	wp_enqueue_style( 'ldppp-likes', plugin_dir_url( __FILE__ ) . 'assets/css/styles.css');
}
add_action( 'wp_enqueue_scripts', 'ldppp_scripts_and_styles' );

function ldppp_admin_scripts_and_styles(){
    wp_enqueue_script( 'ldppp_scripts', plugin_dir_url( __FILE__ ) . 'assets/js/scripts.js', array('jquery'), null, false );
	wp_enqueue_style( 'ldppp_font-awesome', plugin_dir_url( __FILE__ ) . 'assets/css/font-awesome.min.css');
	wp_enqueue_style('custom-admin-styles',plugin_dir_url( __FILE__ ) . 'assets/css/admin-style.css');
}
add_action( 'admin_enqueue_scripts', 'ldppp_admin_scripts_and_styles' );

function ldppp_pages(){
	add_menu_page( 'Like/Dislike Posts', 'Posts-Products Like/Dislike', 'administrator', 'ldppp-like-dislike-posts', 'ldppp_admin_view', 'dashicons-star-empty');
	add_submenu_page( 'Like/Dislike Posts1', 'Posts Like/Dislike1', 'administrator', 'ldppp-like-dislike-posts1', 'ldppp_admin_view1',59);
}
add_action('admin_menu', 'ldppp_pages');

function ldppp_plugin_activation() {
    global $wpdb;
    $ldppp_table_name = $wpdb->prefix . "ldppp_likes_dislikes";
    $ldppp_charset_collate = $wpdb->get_charset_collate();
    $ldppp_sql = "CREATE TABLE {$ldppp_table_name} (
        id mediumint(9) NOT NULL AUTO_INCREMENT,  
        user_id varchar(255) DEFAULT '0' NOT NULL,  
        user_ip_address varchar(255) DEFAULT '0' NOT NULL,  
        post_id mediumint(9) NOT NULL,  
        like_count mediumint(4) DEFAULT '0' NOT NULL,  
        dislike_count mediumint(4) DEFAULT '0' NOT NULL,  
        PRIMARY KEY  (id)  
    ) {$ldppp_charset_collate};";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($ldppp_sql);
}
register_activation_hook(__FILE__, 'ldppp_plugin_activation');

function ldppp_plugin_activation_stars() {
    global $wpdb;
    $ldppp_table_name = $wpdb->prefix . "ldppp_ratings";
    $ldppp_charset_collate = $wpdb->get_charset_collate();    
    $sql = "CREATE TABLE {$ldppp_table_name} (
        id mediumint(9) NOT NULL AUTO_INCREMENT,  
        user_id varchar(255) DEFAULT '0' NOT NULL,  
        user_ip_address varchar(255) DEFAULT '0' NOT NULL,  
        post_id mediumint(9) NOT NULL,  
        ratings mediumint(4) DEFAULT '0' NOT NULL,  
        PRIMARY KEY  (id)  
    ) {$ldppp_charset_collate};";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'ldppp_plugin_activation_stars');

function ldppp_register_plugin_settings() {
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_display_in_template' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_after_before_content' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_only_logged_in_users' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_enable_likes_plugin' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_hide_likes' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_hide_dislikes' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_enable_product_page' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_enable_achieve_product_page' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_after_before_btn' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_enable_product_achieve_page' );
	register_setting( 'ldppp-like-plugin-settings-group', 'ldppp_after_before_achieve_btn' );
}
add_action( 'admin_init', 'ldppp_register_plugin_settings' );

// Display settings field when plugin acive
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ldppp_plugin_action_links' );
function ldppp_plugin_action_links( $links ) { 
   $ldppp_user_settings = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=ldppp-like-dislike-posts') ) .'">'.esc_html__('Settings','like-dislike-posts-products').'</a>';  
   array_unshift($links , $ldppp_user_settings);
   return $links; 
}

// Load plugin textdomain
add_action( 'init', 'ldppp_user_load_textdomain' );
function ldppp_user_load_textdomain() {
    load_plugin_textdomain( 'like-dislike-posts-products', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}