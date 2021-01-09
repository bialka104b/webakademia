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
 * @link     http://localhost/webakademia/part1/function.php
 */
namespace webakademia;

/**
 * This is test function
 * 
 * @param int $param1
 * @param int $param2
 * 
 * @return string  Res of something
 */
function testFunction(int $param1, int $param2) 
{
    $res = $param1 + $param2;
    return "Wynik dodawania $res";
}

echo testFunction(2, 3);