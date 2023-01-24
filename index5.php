<?php
use UD4_Herramientas\app\Cliente;
include_once "Autoload.php";

$cliente = new Cliente("Manolo", 1);

$cliente->muestraResumen();
