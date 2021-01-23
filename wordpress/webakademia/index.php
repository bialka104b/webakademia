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

function showCurrency( $atts ) {
    try {
        $res = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/a/2021-01-01/2021-01-21/');
        $jsonCurrency = json_decode($res);
        
        $currency = array();

        $str = '<div class="currency">';
       foreach($jsonCurrency as $key => $obj)
        {
            $str .= "<p>".$obj->effectiveDate."</p>";
            foreach($obj->rates as $rate)
            {
                $str .= "<p>".$rate->currency." ".$rate->code." ".$rate->mid; 
                $currency[$rate->code][$obj->effectiveDate] = $rate->mid;
            }
        }
        $str .='</div>';
        $str .= getForm($currency);
        // echo '<pre>';
        // print_r($currency);
        // echo '</pre>';

    } catch (\Throwable $th) {
        $str = "Problem z pobraniem danych";
    }
    return $str;
}

function getForm($currency): string
{
    $form = '<form name="currency-form">';
    $form .= '<input name="pln" value="" />';
    $form .= getSelect('currency','currency');
    $form .= getSelect('date','date');
    $form .= '</input>';
    return $form;
}

function getSelect(string $id,string $name,array $options = array()): string
{
    $select = '<select name="'.$name.'" id="'.$id.'">';
    foreach ($options as $key => $val)
    {
        $select .= '<option value="'.$key.'">'.$val.'</option>';
    }
    $select .= '</select>';
    return $select;
}

add_shortcode( 'showcurrency', 'showCurrency' );

if(is_admin())
{
    add_action('admin_menu', 'my_menu');

    function my_menu() {
        add_menu_page('My Page Title', 'My Menu Title', 'manage_options', 'my-page-slug', 'my_function');
    }
    function my_function() {
        echo 'Hello world!';
    }
}
