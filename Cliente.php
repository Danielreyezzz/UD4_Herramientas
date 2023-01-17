<?php
include_once "Dulce.php";
include_once "Pasteleria.php";

class Cliente
{

    private $dulcesComprados = [];
    private int $numDulcesComprados;
    private $pedidos = [];
    public function __construct(
        public String $nombre,
        private int $numero,
        private int $numPedidosEfectuados = 0
    ) {
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
        return $this->numDulcesComprados;
    }

    public function setNumDulcesComprados($numDulcesComprados)
    {
        $this->numDulcesComprados = $numDulcesComprados;

        return $this;
    }
    public function muestraResumen()
    {
        echo "Nombre: " . $this->nombre . "</br>" .
            "Cantidad de pedidos efectuados: " . $this->numPedidosEfectuados;
    }
    public function listaDeDulces(Dulce $dulce): bool
    {
        return in_array($dulce, $this->dulcesComprados);
    }
    public function comprar(Dulce $dulce)
    {
        array_push($dulcesComprados, $dulce);
    }
    public function valorar(Dulce $dulce, String $comentario)
    {
        if ($this->listaDeDulces($dulce)) {
            echo "Se ha valorado " . $dulce->getNombre() . ":</br>" .
                $comentario;
        }
    }
    public function listarPedidos()
    {
        echo "Pedidos totales de" . $this->nombre . ": " . $this->numPedidosEfectuados;
        foreach ($this->pedidos as $key => $value) {
            echo "Pedido nº" . $key + 1 . ": </br>" . $value;
        }
    }
}
