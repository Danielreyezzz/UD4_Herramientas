<?php
namespace UD4_Herramientas\app;
use UD4_Herramientas\util\LogFactory;
use Monolog\Logger;
include_once "Autoload.php";

class Chocolate extends Dulce
{
    private Logger $log;
    public function __construct(
        string $nombre,
        int $numero,
        float $precio,
        private float $porcentajeCacao,
        private float $peso
    ) {
        parent::__construct($nombre, $numero, $precio);
        $this->log = LogFactory::getLogger();
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
            "Peso: " . $this->peso . "g" . "</br>";
    }

      
}
