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
namespace part2;

global $globalVariable;

$globalVariable = 9999;

define("VARIABLEWEB", "Webakademia");

function dump($text)
{
    echo "<pre>";
    print_r($text);
    echo "<pre>";
}

echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');
// outputs helloWorld

$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

$greet('Test 2');
$greet('PHP');