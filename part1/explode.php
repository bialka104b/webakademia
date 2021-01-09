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
 * @link     http://localhost/webakademia/part1/explode.php
 */

namespace webakademia;

require "lib/function.php";
$text = "klasyczne (indeksy numeryczne rozpoczynające się od 0) oraz asocjacyjne (klucze o wartościach tekstowych)";

dump($text);

$res = explode(" ", $text);

dump($res);

$res2 = implode("-", $res);

dump($res2);