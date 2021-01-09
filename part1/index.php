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
 * @link     http://localhost/webakademia/part1/index.php
 */
namespace webakademia;

echo "Test webakademia";
print_r("<br>");
$a = 1;
print_r("<br>");
var_dump($a);
$a +=2;
print_r("<br>");
var_dump($a);
$a -=1;
print_r("<br>");
var_dump($a);
$a *=4;
print_r("<br>");
var_dump($a);
$a = 9;
$a /=3;
print_r("<br>");
var_dump($a);
// $a %=3;
// print_r("<br>");
// var_dump($a);

$typeOfVariableA = gettype($a);

$b = 2.2;

$c = 'Text';

$d = "Text 2 - variable a = $a, variable b =".$b.".";

$e = true;

$array = array( 1 => "a", 2 => "b", 3 => "c");

$obj = new SampleObject();
$typeOfVariableA = gettype($obj);

$typeOfVariableA = gettype($a);
print_r("<br>");
var_dump($a);
print_r("<br>");
var_dump($b);
print_r("<br>");
var_dump($c);
print_r("<br>");
var_dump($d);
print_r("<br>");
var_dump($e);
print_r("<br>");
var_dump($obj);
print_r("<br>");
var_dump($array);
print_r("<br>");
print_r($typeOfVariableA);

echo "<br>";

$d .= "<br> kontynuacja teksu d.";

echo $d;
print_r("<br>");
print_r("Res $a + $b =");
$res = $a + $b;
var_dump($res);
print_r("<br>");

$var1 = 0;

if ($var1 == 0) {
    echo "Prawda 0 : 1<br>"; 
}
if ($var1 === 0) {
    echo "Prawda 0 : 1<br>"; 
}
if ($var1 === null) {
    echo "Prawda 0 : 1<br>"; 
}

/**
 * This is sample class
 * 
 * PHP Version 7.4
 *
 * @category Webakademia
 * @package  Webakademia
 * @author   Grzegorz Kucharski <g.kucharski@webakademia.it>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost/webakademia/1/declarationofvariables.php
 */

Class SampleObject
{
    public string $varA;
}