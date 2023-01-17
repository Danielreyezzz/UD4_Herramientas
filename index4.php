<?php
include_once "Tarta.php";

$tarta = new Tarta("Tres chocolates", 5, 10, 3, 2,5);

$tarta->setRellenos(["Chocolate blanco", "Chocolate con leche", "Chocolate negro"]);

$tarta->muestraResumen();