<?php
namespace UD4_Herramientas\app;
use UD4_Herramientas\util\PasteleriaException;
use UD4_Herramientas\util\ClienteNoEncontradoException;
use UD4_Herramientas\util\DulceNoCompradoException;
use UD4_Herramientas\util\DulceNoEncontradoException;
include_once "Autoload.php";

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
            "Relleno: " . $this->relleno . "</br>";
    }
}
