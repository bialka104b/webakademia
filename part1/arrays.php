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
 * @link     http://localhost/webakademia/part1/arrays.php
 */
namespace webakademia;

require "lib/function.php";

echo "Tablice";

$array1 = [];
$array1[1] = 'testow';
$array1[2] = 'testow 2';
$array1[12] = 'testow 3';
$array1[13] = 'testow 4';
$array1[14] = 'testow 5';
$array2 = array( 1 => "a", 2 => "b", 3 => "c");
dump($array1);
dump($array2);

$array3 = array(
'login' => 'grzegorz',
'pass' => 'ghgjgjj',
'email' => 'gk@ideo.pl',
'tablica' => array(1 => 1, 2=> 2, 3 => 3)
);

dump($array3);

dump($array1[1]);

dump($array3['pass']);

$res = array_merge($array1, $array2);

$res2 = array_merge($res, $array3);
dump($res2);
dump(count($res2));
var_dump($res2);

$element = array_pop($array1);

dump($element);


//sprawdzenie czy istnieje element
$ele2 = in_array("testow", $array1);

dump($ele2);



