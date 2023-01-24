<?php

use UD4_Herramientas\app\Pasteleria;
include_once "Autoload.php";

$paste = new Pasteleria("Dulces Manolito");

$paste->incluirTarta("Tarta de de queso", 1, 2, 2, ["Frambuesa", "Queso",
], 3, 4);
$paste->incluirBollo("Bollito de crema", 2, 3.3, "Crema");
$paste->incluirChocolate("Nestle", 3, 5.5, 70, 30);

$paste->incluirCliente("Daniel", 1);
$paste->incluirCliente("Laura", 2);


$paste->comprarClienteProducto(1, 1);
$paste->getClientes()[0]->valorar($paste->getProductos()[0],"mU BIEN" );
$paste->comprarClienteProducto(1, 2);
$paste->comprarClienteProducto(8,2);






// $paste->listarProductos();

// $paste->listarClientes();

