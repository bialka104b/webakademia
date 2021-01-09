<?php

/**
 * Webakademia deklaracja zmiennych
 *
 * PHP Version 7.4
 *
 * @category Webakademia
 * @package  Webakademia
 * @author   Grzegorz Kucharski <g.kucharski@webakademia.it>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost/webakademia/part1/loops.php
 */
namespace webakademia;

require "lib/function.php";

//for
for ($i = 1; $i <= 10; $i++) {
    if ($i != 3) {
        echo $i;
    }
}

//foreach
$array3 = array(
    'login' => 'grzegorz',
    'pass' => 'ghgjgjj',
    'email' => 'gk@ideo.pl',
    //'tablica' => array(1 => 1, 2=> 2, 3 => 3)
    );

foreach ($array3 as $key) {
    dump("Element");
    if (is_array($key)) {
        dump($key);
    } else {
        dump("To jest element:".$key);
    }
}

foreach ($array3 as $key => $val) {
    dump($key." ".$val);
}

$getTest = intval($_GET['test']);
$a = 2;
$b = 5;
$c = $a/$b;

switch($getTest) {
case 1:
    echo "Jest podane 1";
    break;
case 2:
    echo "Jest podane 2";
    break;
default:
    echo "Jest domyslne";
    break;
}
