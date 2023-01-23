<?php
namespace UD4_Herramientas\app;

use UD4_Herramientas\util\PasteleriaException;
use UD4_Herramientas\util\LogFactory;
use Monolog\Logger;
include_once "Autoload.php";


class Tarta extends Dulce
{
    private Logger $log;
    public function __construct(
        string $nombre,
        int $numero,
        float $precio,
        private int $numPisos,
        private $rellenos = [],
        private int $minNumComensales = 2,
        private int $maxNumComensales
    ) {
        parent::__construct($nombre, $numero, $precio);
        $this->log = LogFactory::getLogger();
    }

    public function setRellenos($rellenos)
    {
        if (count($rellenos) != $this->numPisos) {
            throw new PasteleriaException("El número de rellenos debe ser igual al número de pisos. ");
            return false;
        } else {
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
            echo $this->nombre . " es para " . $this->maxNumComensales . " comensales" . "</br>";
        }
        if ($this->minNumComensales > 1 && $this->maxNumComensales > 1) {
            echo $this->nombre . " es de " . $this->minNumComensales . " a " . $this->maxNumComensales . " comensales" . "</br>";
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
        $this->muestraComensalesPosibles() . "</br>";
    }
}
