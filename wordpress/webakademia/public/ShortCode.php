<?php
namespace webakademia\pub;

class ShortCode
{
    public static function showCurrency( $atts ) {
        wp_enqueue_style('stylewebakademia');
        wp_enqueue_script('scriptwebakademia');
        try {
    
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
            
            $currency = array();
            // <div class="currency">
            // <p>".$obj->effectiveDate."</pre>
            //     <p>".$rate->currency." ".$rate->code." ".$rate->mid."</p>
            //     <p>".$rate->currency." ".$rate->code." ".$rate->mid."</p>
            // <p>".$obj->effectiveDate."</p>
            //     <p>".$rate->currency." ".$rate->code." ".$rate->mid."</p>
            //     <p>".$rate->currency." ".$rate->code." ".$rate->mid."</p>
            // <p>".$obj->effectiveDate."</p>
            // <p>".$obj->effectiveDate."</p>
            // </div>
            $str1 = '<div class="currency">';
            foreach($jsonCurrency as $key => $obj)
            {
                $str1 .= "<p>".$obj->effectiveDate."</p>";
                foreach($obj->rates as $rate)
                {
                    $str1 .= "<p>".$rate->currency." ".$rate->code." ".$rate->mid."</p>"; 
                    $currencyArray[$rate->code][$obj->effectiveDate] = $rate->mid;
                    $currencyCodeArray[$rate->code] = $rate->code;
                    $currencyCodeDateArray[$obj->effectiveDate] = $obj->effectiveDate;
                }
            }
            //dump($currencyCodeArray);
            $str1 .='</div>';
            $str2 = getForm($currencyCodeArray,$currencyCodeDateArray);
            
            //oblicz wynik
            $res = self::calculateCurrency($currencyArray);
            $res ='<div class="result">'.$res."</div>";
            
            //skladanie wyniku shortcode
            $str = $str2.$res.$str1;
        } catch (\Throwable $th) {
            var_dump($th);
            $str = "Problem z pobraniem danych";
        }
        return $str;
    }
    public static function calculateCurrency($currencyArray): string
    {
        $currency = sanitize_text_field($_GET['currency']);
        $date = sanitize_text_field($_GET['date']);
        $pln = floatval(sanitize_text_field($_GET['pln']));
        $quote = floatval($currencyArray[$currency][$date]);

        try {
            $res = $quote * $pln;
        } catch (\Throwable $th) {
            $res = "Błąd";
        }
        return $res;
    }

    public function registerStyle()
    {
        wp_register_style( 'stylewebakademia', plugin_dir_url( __FILE__ ).'style.css');
    }
    public function registerScript()
    {
        wp_register_script('scriptwebakademia', plugin_dir_url( __FILE__ ).'script.js');
    }
    public function addShortCodeshowCurreny()
    {
        add_shortcode( 'showcurrency', array('webakademia\\pub\\ShortCode','showCurrency'));
    }

}




