<?php

namespace UD4_Herramientas\app;

use UD4_Herramientas\util\LogFactory;
use Monolog\Logger;
use UD4_Herramientas\util\ClienteNoEncontradoException;
use UD4_Herramientas\util\DulceNoCompradoException;
use UD4_Herramientas\util\DulceNoEncontradoException;

include_once "Autoload.php";

class Cliente
{
    private Logger $log;
    private $dulcesComprados = [];
    private int $numDulcesComprados;
    public function __construct(
        public String $nombre,
        private int $numero,
        private int $numPedidosEfectuados = 0
    ) {
        $this->log = LogFactory::getLogger();
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumPedidosEfectuados()
    {
        return $this->numPedidosEfectuados;
    }

    public function setNumPedidosEfectuados($numPedidosEfectuados)
    {
        $this->numPedidosEfectuados = $numPedidosEfectuados;

        return $this;
    }

    public function getDulcesComprados()
    {
        return $this->dulcesComprados;
    }

    public function setDulcesComprados($dulcesComprados)
    {
        $this->dulcesComprados = $dulcesComprados;

        return $this;
    }

    public function getNumDulcesComprados()
    {
        return count($this->dulcesComprados);
    }

    public function setNumDulcesComprados($numDulcesComprados)
    {
        $this->numDulcesComprados = $numDulcesComprados;

        return $this;
    }
    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "</br>" .
            "Cantidad de pedidos efectuados: " . $this->numPedidosEfectuados . "</br>";
    }
    public function listaDeDulces(Dulce $dulce): bool
    {
        return in_array($dulce, $this->dulcesComprados);
    }
    public function comprar(Dulce $dulce): bool
    {
        try {
            array_push($this->dulcesComprados, $dulce);
            $this->numPedidosEfectuados++;
            $this->log->info("Dulce comprado ", [$dulce], [$dulce->nombre]);
            return true;
        } catch (DulceNoEncontradoException | ClienteNoEncontradoException $m) {
            echo "Se ha capturado una excepción: " . $m;
            return false;
        }
    }
    public function valorar(Dulce $dulce, String $comentario)
    {
        try {
            if ($this->listaDeDulces($dulce)) {
                echo $this->nombre . " ha valorado " . $dulce->getNombre() . ":</br>" .
                    $comentario;
                $this->log->info("Dulce valorado", [$dulce], [$dulce->nombre]);
            } else {
                $this->log->error("Se ha intentado valorar un dulce no comprado", [$dulce], [$dulce->nombre]);
                throw new DulceNoCompradoException();
            }
        } catch (DulceNoCompradoException $m) {
            echo "Capturada una excepción: " . $m;
        }
    }
    public function listarPedidos()
    {
        echo "Pedidos totales de" . $this->nombre . ": " . $this->numPedidosEfectuados . "</br>";
    }
}
