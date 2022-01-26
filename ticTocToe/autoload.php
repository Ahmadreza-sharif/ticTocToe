<?php

function autoload($class)
{
    $address = __DIR__ . "/$class" . ".php";
    $address = str_replace("\\", "/", $address);
    // echo $address . PHP_EOL;
    include $address;
}
spl_autoload_register("autoload");
