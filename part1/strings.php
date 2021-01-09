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
 * @link     http://localhost/webakademia/part1/strings.php
 */
namespace webakademia;

require "lib/function.php";

$text = "Wstęp Ę do programowania do <b>test</b><br>po br";

echo $text;

$res = str_replace(" ", "-", $text);

dump($res);

$res2 = \strip_tags($text, "<b>");

dump($res2);

$res3 = strpos($text, "do");

dump($res3);

$res4 = mb_strtolower($text);

dump($res4);

$res4 = mb_strtoupper($text);

dump($res4);

$var1 = 'hello';
$var2 = 'Hello';
dump(strcmp($var1, $var2));
