<?php

namespace test;
include_once "Autoload.php";
use UD4_Herramientas\app\Pasteleria;
use PHPUnit\Framework\TestCase;
use UD4_Herramientas\app\Tarta;
use UD4_Herramientas\util\PasteleriaException;

class PasteleriaTest extends TestCase{
    public function testConstructor(){
        $pastel = new Pasteleria("Pasteleria Manolo");
        $this->assertSame($pastel->nombre, "Pasteleria Manolo");
    }
    public function testIncluirCliente(){
        $paste = new Pasteleria("Pasteleria Manolo");
        $paste->incluirCliente("Danielito", 1);

        $this->assertSame($paste->getClientes()[0]->nombre, "Danielito");
        $this->assertSame($paste->getClientes()[0]->getNumero(), 1);
        $this->assertSame($paste->getNumClientes(), 1);
    }
    public function testIncluirTarta(){
        $this->expectException(PasteleriaException::class);
        $tarta = new Tarta("Tarta choco", 2, 3.3, 2, ["Blanco", "Negro", "Leche"], 1, 3); 
        $tarta->setRellenos(["Blanco", "Negro", "Leche"]);
    }
}