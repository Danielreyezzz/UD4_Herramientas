<?php

function autoload($nombreClase)
{
  $dir = str_replace("\\", "/", $nombreClase); 
    include_once "../". $dir . ".php";
}

spl_autoload_register('autoload');