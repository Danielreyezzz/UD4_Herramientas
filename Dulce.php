<?php

class Dulce
{
        private const IVA = 1.21;
        public function __construct(
                public string $nombre,
                protected int $numero,
                private float $precio
        ) {
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
                        "Precio con IVA: " . $this->getPrecioConIVA();
        }
}
