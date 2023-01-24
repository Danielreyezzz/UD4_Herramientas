<?php

namespace test;
include_once "Autoload.php";
use UD4_Herramientas\app\Pasteleria;
use PHPUnit\Framework\TestCase;
use UD4_Herramientas\app\Bollo;
use UD4_Herramientas\app\Cliente;
use UD4_Herramientas\util\DulceNoCompradoException;
use UD4_Herramientas\util\PasteleriaException;

class ClienteTest extends TestCase{
    public function testConstructor(){
        $cliente = new Cliente("Daniel", 1);
        $this->assertSame($cliente->nombre, "Daniel");
        $this->assertSame($cliente->getNumero(), 1);
        $this->assertSame($cliente->getNumPedidosEfectuados(), 0);
    }
    public function testListaDeDulces(){
        $cliente = new Cliente("Dani", 1);
        $bollo = new Bollo("Bollito", 2, 3, "Crema");
        $cliente->comprar($bollo);
        $this->assertTrue($cliente->listaDeDulces($bollo));

    }
}
