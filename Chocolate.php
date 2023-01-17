<?php

include_once "Dulce.php";

class Chocolate extends Dulce
{
    public function __construct(
        string $nombre,
        int $numero,
        float $precio,
        private float $porcentajeCacao,
        private float $peso
    ) {
        parent::__construct($nombre, $numero, $precio);
    }

        public function getPorcentajeCacao()
        {
                return $this->porcentajeCacao;
        }
        public function getPeso()
        {
                return $this->peso;
        }
   
    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "</br>" .
            "Número: " . $this->numero . "</br>" .
            "Precio con IVA: " . $this->getPrecioConIVA() . "</br>" .
            "Porcentaje de cacao: " . $this->porcentajeCacao . "%</br>" .
            "Peso: " . $this->peso . "g";
    }

      
}
