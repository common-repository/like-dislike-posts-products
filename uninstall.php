<?php

if (!defined('WP_UNINSTALL_PLUGIN')) exit();

global $wpdb;
$ldppp_table_name = $wpdb->prefix . "ldppp_likes_dislikes";

$wpdb->query($wpdb->prepare("DROP TABLE IF EXISTS %s", $ldppp_table_name));

delete_option('ldppp_display_in_template');
delete_option('ldppp_after_before_content');
delete_option('ldppp_only_logged_in_users');

?>