<?php
/*
 * Plugin Name: User Meta Lite
 * Plugin URI: http://user-meta.com
 * Description: A well designed, features reached and easy to use user management plugin.
 * Version: 1.2.1
 * Author: Khaled Hossain
 * Author URI: http://khaledsaikat.com
 * Text Domain: user-meta
 * Domain Path: /helpers/languages
 */
if (version_compare(PHP_VERSION, '5.4.0', '<')) {
    $code = "echo '<div class=\"error\"><p>User Meta Lite plugin requires <strong>  PHP 5.4.0</strong> or above. Current PHP version: ' . PHP_VERSION . '</p></div>';";
    add_action('admin_notices', create_function(null, $code));
    return;
}

if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    exit('Please don\'t access this file directly.');
}

require __DIR__ . '/vendor/autoload.php';

global $pluginFramework, $userMeta;

if (! is_object($pluginFramework)) {
    $pluginFramework = new UserMeta\Framework();
}
$pluginFramework->loadDirectory($pluginFramework->controllersPath);

$userMeta = new UserMeta\UserMeta(__FILE__);
$userMeta->init();
