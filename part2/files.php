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

require "function.php";

echo "Part2 - Files";

$filename = "function.php";

$handle = fopen($filename, "r");
if (filesize($filename) > 0) {
    $contents = fread($handle, filesize($filename));
}
else {
echo "Plik pusty";
}
fclose($handle);

//print_r($contents);

// $arrayContent = explode('', $contents);

// var_dump($arrayContent);

// $handle = fopen("https://ideo.pl/", "rb");
// if (FALSE === $handle) {
//     exit("Failed to open stream to URL");
// }

// $contents = '';

// while (!feof($handle)) {
//     $contents .= fread($handle, 8192);
// }
// fclose($handle);

// var_dump($contents);

$fp = fopen('data.txt', 'w');
fwrite($fp, '1');
fwrite($fp, '23');
fclose($fp);

$fp = fopen('data.csv', 'a+');

$separator = ";";

if (filesize('data.csv') == 0) {
    $csv ="Data".$separator;
    $csv .="Pracownik".$separator;
    $csv .="Obecnosc".$separator;
    $csv .="\n";
    fwrite($fp, $csv);
}

//2 
$csv ="2020-05-05".$separator;
$csv .="Grzegorz Kucharski ddkio".$separator;
$csv .="1".$separator;
$csv .="\n";
fwrite($fp, $csv);
fclose($fp);


$filename = "data.csv";

$handle = fopen($filename, "r");
if (filesize($filename) > 0) {
    $contents = fread($handle, filesize($filename));
} else {
    echo "Plik pusty";
}
fclose($handle);

$arrayContent = explode("\n", $contents);

dump($arrayContent);