<?php
namespace UD4_Herramientas\app;
use UD4_Herramientas\util\LogFactory;
use Monolog\Logger;
include_once "Autoload.php";

abstract class Dulce implements Resumible
{
        private Logger $log;
        private const IVA = 1.21;
        public function __construct(
                public string $nombre,
                protected int $numero,
                private float $precio
        ) {
                $this->log = LogFactory::getLogger();
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function getNumero()
        {
                return $this->numero;
        }

        public function getPrecioConIVA()
        {
                return ($this->precio * self::IVA);
        }
        public function muestraResumen()
        {
                echo "Nombre: " . $this->nombre . "</br>" .
                        "Número: " . $this->numero . "</br>" .
                        "Precio con IVA: " . $this->getPrecioConIVA() . "</br>";
        }
}
