<?php

function autoload($class) 
{
    print_r($class);
    require $class.".php";
}