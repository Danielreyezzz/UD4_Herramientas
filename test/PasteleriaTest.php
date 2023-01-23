<?php

namespace test;
include_once "Autoload.php";
use UD4_Herramientas\app\Pasteleria;

use PHPUnit\Framework\TestCase;

class PasteleriaTest extends TestCase{
    public function testConstructor(){
        $pastel = new Pasteleria("Manolo");
        $this->assertSame($pastel->nombre, "Manolo");
    }
}