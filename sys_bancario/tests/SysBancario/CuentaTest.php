<?php

use SysBancario\Cuenta;
use SysBancario\Persona;
use PHPUnit\Framework\TestCase;

class CuentaTest extends TestCase {
    public function testGetSaldo() {
        $persona = new Persona("Juan", "Pérez", "Calle 123", "12345678");
        $cuenta = new Cuenta(1000, $persona);

        $this->assertEquals(1000, $cuenta->getSaldo());
    }

    public function testSetSaldo() {
        $persona = new Persona("Juan", "Pérez", "Calle 123", "12345678");
        $cuenta = new Cuenta(1000, $persona);

        $cuenta->setSaldo(1500);

        $this->assertEquals(1500, $cuenta->getSaldo());
    }
}
