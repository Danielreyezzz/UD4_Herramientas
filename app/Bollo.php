<?php

namespace UD4_Herramientas\app;
use UD4_Herramientas\util\LogFactory;
use Monolog\Logger;

include_once "Autoload.php";

class Bollo extends Dulce
{
    private Logger $log;
    public function __construct(
        string $nombre,
        int $numero,
        float $precio,
        private String $relleno,
    ) {
        parent::__construct($nombre, $numero, $precio);
        $this->log = LogFactory::getLogger();
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
