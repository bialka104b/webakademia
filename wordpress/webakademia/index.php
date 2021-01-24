<?php

/**
 * Plugin Name:       Webakademia Currency
 * Plugin URI:        https://webakacemia.it
 * Description:       Get current currency quotes
 * Version:           1.0
 * Requires PHP:      7.2
 * Author:            Grzegorz
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       webakademia-currency
 * Domain Path:       /languages
 */
namespace webakademia;

use webakademia\admin\Admin;
use webakademia\pub\ShortCode;

require_once __DIR__. DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

//admin panel
if(is_admin())
{
    //podczas rejestracji hook'ow przy namespace musimy podac dokladnie namespace do klasy i statyczna metode ktora chcemy wykonac
    \register_activation_hook( __FILE__, array('webakademia\\lib\\Activate','webakademia_activate'));
    \register_deactivation_hook(__FILE__, array('webakademia\\lib\\Deactivate','webakademia_deactivate') );
    \register_uninstall_hook(__FILE__, array('webakademia\\lib\\Unistall','webakademia_unistall'));

    //tworzenie menu i obsluga panelu
     $admin = new Admin();
     $admin->createMenu();

} else {
    require_once __DIR__. DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "function.php";
    //require_once __DIR__. DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "shortcode.php";
    $public = new ShortCode();
    $public->registerStyle();
    $public->registerScript();
    $public->addShortCodeshowCurreny();
}








