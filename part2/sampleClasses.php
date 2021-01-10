<?php 

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
namespace part2;
require "function.php";

Class SampleObject
{
    public string $varA;
    private string $varB;
    public string $varC;
    
    public function __construct(string $varA, string $varB, string $varC)
    {
        $this->varA = $varA;
        $this->varB = $varB;
        $this->varC = $varC;
    }

    public function setVarB(string $avarB)
    {
        $this->varB = $avarB;
    }
}

$obj = new SampleObject('test', 'varb', 'varc');

Class SampleObject2 extends SampleObject
{
    public function setC()
    {
        $this->varC = "klasa object2";
    }
}

$obj2 = new SampleObject2('test2', 'test3', 'test4');
dump($obj2);
$obj2->setC();
dump($obj2);
// $obj->varA = "test";
// //$obj->varB = 2;
// $obj->setVarB(5);
// $obj->varC = 10;

dump($obj);


