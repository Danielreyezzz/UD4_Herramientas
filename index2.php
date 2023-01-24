<?php
use UD4_Herramientas\app\Bollo;
include_once "Autoload.php";

$bollito = new Bollo("Carmela", 1, 2.5, "Crema");

$bollito->muestraResumen();