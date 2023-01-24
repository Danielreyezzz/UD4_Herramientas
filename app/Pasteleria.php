<?php
namespace UD4_Herramientas\app;
use UD4_Herramientas\util\LogFactory;
use Monolog\Logger;
use UD4_Herramientas\util\PasteleriaException;
use UD4_Herramientas\util\ClienteNoEncontradoException;
use UD4_Herramientas\util\DulceNoEncontradoException;
include_once "Autoload.php";

class Pasteleria
{
    private Logger $log;
    private $productos = [];
    private int $numProductos = 0;
    private $clientes = [];
    private int $numClientes = 0;
    public function __construct(
        public String $nombre
    ) {
        $this->log = LogFactory::getLogger();
    }

    /**
     * Summary of incluirProducto
     * Añade un Dulce al array de productos y suma el número de productos en 1
     * @param Dulce $producto
     * @return void
     */
    private function incluirProducto(Dulce $producto)
    {
        array_push($this->productos, $producto);
        ++$this->numProductos;
    }
    /**
     * Summary of incluirTarta
     * Incluyo una tarta controlando que sus rellenos sean igual a su número de pisos
     * @param mixed $nombre
     * @param mixed $numero
     * @param mixed $precio
     * @param mixed $numPisos
     * @param mixed $rellenos
     * @param mixed $minC
     * @param mixed $maxC
     * @throws PasteleriaException
     * @return void
     */
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
    /**
     * Summary of incluirBollo
     * Incluyo bollos en el array de productos
     * @param mixed $nombre
     * @param mixed $numero
     * @param mixed $precio
     * @param mixed $relleno
     * @return void
     */
    public function incluirBollo($nombre, $numero, $precio, $relleno)
    {
        $bollo = new Bollo($nombre, $numero, $precio, $relleno);
        $this->incluirProducto($bollo);
    }
    /**
     * Summary of incluirChocolate
     * Incluyo chocolates en el array de productos
     * @param mixed $nombre
     * @param mixed $numero
     * @param mixed $precio
     * @param mixed $porcentajeCacao
     * @param mixed $peso
     * @return void
     */
    public function incluirChocolate($nombre, $numero, $precio, $porcentajeCacao, $peso)
    {
        $chocolate = new Chocolate($nombre, $numero, $precio, $porcentajeCacao, $peso);
        $this->incluirProducto($chocolate);
    }
    /**
     * Summary of incluirCliente
     * Incluyo clientes en el array de clientes
     * @param mixed $nombre
     * @param mixed $numero
     * @return void
     */
    public function incluirCliente($nombre, $numero)
    {
        $cliente = new Cliente($nombre, $numero);
        array_push($this->clientes, $cliente);
        ++$this->numClientes;
    }
    /**
     * Summary of listarProductos
     * Para listar los productos
     * @return void
     */
    public function listarProductos()
    {
        foreach ($this->productos as $value) {
            $value->muestraResumen();
        }
    }
    /**
     * Summary of listarClientes
     * Para listar los clientes
     * @return void
     */
    public function listarClientes()
    {
        foreach ($this->clientes as $value) {
            $value->muestraResumen();
        }
    }
    /**
     * Summary of comprarClienteProducto
     * Relaciona un cliente existente con un dulce existente y lo compra
     * @param mixed $numCliente
     * @param mixed $numDulce
     * @throws ClienteNoEncontradoException
     * @throws DulceNoEncontradoException
     * @return void
     */
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
                $this->log->info("Compra efectuada con éxito", [$cl], [$dul]);
                $cl->comprar($dul);
            }else{
                if (!$boolCliente) {
                     $this->log->error("Intento de compra con CLIENTE no existente");
                    throw new ClienteNoEncontradoException();
                }
                if (!$boolDulce) {
                    $this->log->error("Intento de compra con DULCE no existente");
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
    public function getNumClientes()
    {
        return $this->numClientes;
    }
}
