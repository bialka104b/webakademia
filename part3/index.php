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
 * @link     http://localhost/webakademia/part3/index.php
 */
namespace part3;
session_start();

require 'vendor/autoload.php';
require 'autoload.php';

spl_autoload_register('autoload');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use lib\SampleObject;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log/test.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');

echo "Tworzenie autoload";

$obj = new SampleObject('a','b','c');

var_dump($obj);

?>
<a href="login.php">zaloguj</a>
<a href="logout.php">wyloguj</a>
<?php
var_dump($_SESSION);
echo "<br> Zalogowany ".$_SESSION['user'];