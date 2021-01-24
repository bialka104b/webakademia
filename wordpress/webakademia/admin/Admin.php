<?php

namespace webakademia\admin;

class Admin
{
    public function createMenu(): void
    {
        add_action('admin_menu', '\webakademia\admin\Admin::my_menu');
    }
    
    public static function my_menu() {
        add_menu_page('Webakademia Currency', 'Webakademia Currency', 'manage_options', 'webakdemia-currency', '\webakademia\admin\Admin::my_function');
    }
    public static function my_function() {
        echo 'Hello world!';
        //wczytywanie danych do bazy
        set_error_handler(function ($severity, $message, $file, $line) {
            throw new \ErrorException($message, $severity, $severity, $file, $line);
        });

        try {
            $res = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/a/2021-01-01/2021-01-21/');
        } catch (EngineException $e) {
            //var_dump($e);
        }
        
        restore_error_handler();
        $jsonCurrency = json_decode($res);
        
        foreach($jsonCurrency as $key => $obj)
        {
            foreach($obj->rates as $rate)
            {
                
                $currencyArray[$rate->code][$obj->effectiveDate] = $rate->mid;
                $currencyCodeArray[$rate->code] = $rate->code;
                $currencyCodeDateArray[$obj->effectiveDate] = $obj->effectiveDate;
                self::insertQuotesToCurrency($rate->code, $obj->effectiveDate, $rate->mid);
            }
        }
    }

    
    public static function insertQuotesToCurrency($currency_code, $date, $quote)
    {
        global $wpdb;
        
        $currency_code = sanitize_text_field($currency_code);
        $date = sanitize_text_field($date);
        $quote = floatval(sanitize_text_field($quote));
        //zabezpieczenie przed wstawieniem tego samego rekordu
        $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}currency_quotes 
                                        WHERE 
                                        currency_code = '$currency_code' AND
                                        date = '$date' AND
                                        $quote = $quote", OBJECT );

        if( count($results) == 0) 
        {
            $wpdb->query(
                $wpdb->prepare(
                "
                INSERT INTO ".$wpdb->get_blog_prefix()."currency_quotes
                ( currency_code, date, quote )
                VALUES ( %s, %s, %s )
                ",
                $currency_code,
                $date,
                $quote
                )
            );
        }
    }
}
