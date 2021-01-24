<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
//drugi sposob na odistalowanie wtyczki nalezy usunac z nazwy pliku -- wtedy podczas usuwania zostanie uruchomiony ten plik
// drop a custom database table
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}currency_quotes");