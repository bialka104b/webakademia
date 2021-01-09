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
 * @link     http://localhost/webakademia/part1/instructions.php
 */
namespace webakademia;

require "lib/function.php";

$a = 10;
$b = 4;
$c = 3;


if ($a > 0) {
    echo "Zmienna a większa od zera<br>";
}

if ($a > 0 && $b > $c) {
    echo "Warunek spełniony;<br>";
}

if ($a > 10) {
    echo "test<br>";
} elseif ($c > $b ) {
    echo "test 2<br>";
} else {
    echo "to zostanie wykonane<br>";
}

dump(VARIABLEWEB);

dump($globalVariable);

dump($a);
dump($b);
dump($c);

$a = $b = $c;

dump($b);
dump("short if");
$res4 = ($_GET['test'] == '2') ? true : false ;
dump($res4);
$res5 = ($_GET['test'] == '2') ? "to jest spelnione" : "nie jest";
dump($res5);
//echo $_GET['test'];
if ($a < 4) : ?>
<div>
    <b>Zmienna a jest mniejsza od 4</b>
</div>
<?php endif; ?>
<?php

dump("tEST");
