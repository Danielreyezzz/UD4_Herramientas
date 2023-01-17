<?php

include_once "Dulce.php";

class Bollo extends Dulce
{
    public function __construct(
        string $nombre,
        int $numero,
        float $precio,
        private String $relleno,
    ) {
        parent::__construct($nombre, $numero, $precio);
    }
    public function getRelleno()
    {
        return $this->relleno;
    }
    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "</br>" .
            "Número: " . $this->numero . "</br>" .
            "Precio con IVA: " . $this->getPrecioConIVA() . "</br>" .
            "Relleno: " . $this->relleno;
    }
}
