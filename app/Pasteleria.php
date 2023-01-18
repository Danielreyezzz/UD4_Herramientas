<?php
namespace UD4_Herramientas\app;
use UD4_Herramientas\util\PasteleriaException;
use UD4_Herramientas\util\ClienteNoEncontradoException;
use UD4_Herramientas\util\DulceNoCompradoException;
use UD4_Herramientas\util\DulceNoEncontradoException;
include_once "Autoload.php";

class Pasteleria
{
    private $productos = [];
    private int $numProductos = 0;
    private $clientes = [];
    private int $numClientes = 0;
    public function __construct(
        public String $nombre,
    ) {
    }

    private function incluirProducto(Dulce $producto)
    {
        array_push($this->productos, $producto);
        ++$this->numProductos;
    }
    public function incluirTarta($nombre, $numero, $precio, $numPisos, $rellenos, $minC, $maxC)
    {
        $tarta = new Tarta($nombre, $numero, $precio, $numPisos, $rellenos, $minC, $maxC);
        try {
            if (!$tarta->setRellenos($rellenos)) {
                throw new PasteleriaException("No se ha podido incluir los rellenos. ");
            } else {
                $tarta->setRellenos($rellenos);
                $this->incluirProducto($tarta);
            }
        } catch (DulceNoEncontradoException $m) {
            echo "Capturada una excepción: " . $m;
        }
    }
    public function incluirBollo($nombre, $numero, $precio, $relleno)
    {
        $bollo = new Bollo($nombre, $numero, $precio, $relleno);
        $this->incluirProducto($bollo);
    }
    public function incluirChocolate($nombre, $numero, $precio, $porcentajeCacao, $peso)
    {
        $chocolate = new Chocolate($nombre, $numero, $precio, $porcentajeCacao, $peso);
        $this->incluirProducto($chocolate);
    }
    public function incluirCliente($nombre, $numero)
    {
        $cliente = new Cliente($nombre, $numero);
        array_push($this->clientes, $cliente);
        ++$this->numClientes;
    }
    public function listarProductos()
    {
        foreach ($this->productos as $value) {
            $value->muestraResumen();
        }
    }
    public function listarClientes()
    {
        foreach ($this->clientes as $value) {
            $value->muestraResumen();
        }
    }
    public function comprarClienteProducto($numCliente, $numDulce)
    {
        $boolCliente = false;
        $boolDulce = false;
        try {
            foreach ($this->clientes as $key => $value) {

                if ($value->getNumero() == $numCliente) {
                    $cl = $value;
                    $boolCliente = true;
                }
            }
            foreach ($this->productos as $key => $value) {
                if ($value->getNumero() == $numDulce) {
                    $dul = $value;
                    $boolDulce = true;
                }
            }
            if ($boolCliente && $boolDulce) {
                $cl->comprar($dul);
            }else{
                if (!$boolCliente) {
                    throw new ClienteNoEncontradoException();
                }
                if (!$boolDulce) {
                    throw new DulceNoEncontradoException();
                }
            }
           
        } catch (ClienteNoEncontradoException | DulceNoEncontradoException $m) {
            echo "Se ha capturado una excepción: " . $m;
        }
    }
    public function getClientes()
    {
        return $this->clientes;
    }
    public function getProductos()
    {
        return $this->productos;
    }
}
