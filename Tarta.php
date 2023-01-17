<?php

include_once "Dulce.php";

class Tarta extends Dulce
{
    private $rellenos = [];

    public function __construct(
        string $nombre,
        int $numero,
        float $precio,
        private int $numPisos,
        private int $minNumComensales = 2,
        private int $maxNumComensales
    ) {
        parent::__construct($nombre, $numero, $precio);
    }

    public function setRellenos($rellenos)
    {
        if (count($rellenos) != $this->numPisos) {
            echo "El número de rellenos no puede ser mayor al número de pisos";
        }else {
            $this->rellenos = $rellenos;
            return $this;
        }   
    }

    public function getRellenos()
    {
        return $this->rellenos;
    }

    public function muestraComensalesPosibles()
    {
        if ($this->minNumComensales == 1 && $this->maxNumComensales > 1) {
            echo $this->nombre . " es para ". $this->maxNumComensales . " comensales";
        }
        if ($this->minNumComensales > 1 && $this->maxNumComensales > 1) {
            echo $this->nombre . " es de ". $this->minNumComensales . " a " . $this->maxNumComensales . " comensales";
        }
    }

    public function getNumPisos()
    {
        return $this->numPisos;
    }


    public function getMinNumComensales()
    {
        return $this->minNumComensales;
    }


    public function getMaxNumComensales()
    {
        return $this->maxNumComensales;
    }
    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "</br>" .
            "Número: " . $this->numero . "</br>" .
            "Precio con IVA: " . $this->getPrecioConIVA() . "</br>" . 
            "Número de pisos: " . $this->numPisos . "</br>" . 
            "Rellenos: </br>";
            foreach ($this->rellenos as $key => $value) {
                echo "Piso nº " . $key + 1 . ": " . $value . "</br>";
            };
            echo "Nº de comensales: </br>";
            $this->muestraComensalesPosibles();

    }
}
