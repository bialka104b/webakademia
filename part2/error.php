<?php 

/**
 * This is sample class
 * 
 * PHP Version 7.4
 *
 * @category Webakademia
 * @package  Webakademia
 * @author   Grzegorz Kucharski <g.kucharski@webakademia.it>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost/webakademia/part2/error.php
 */
namespace part2;
require "function.php";

//error_reporting(0);
$a = 3;
$b = 0;
@$c = $a / $b;


try {
    
    $c->get();
} catch (\Throwable $th) {
    echo "<br> obslugujemy blad 1";
}
catch (\Exception $e) {
    echo "<br> obslugujemy blad 2";
}
catch (\Error $e) {
    echo "<br> obslugujemy blad 3";
} finally {
    echo "<br> finally block<br />";
}

echo "<br>Test po błędzie";