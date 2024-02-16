<?php


use SysBancario\CuentaSueldo;
use SysBancario\Persona;
use PHPUnit\Framework\TestCase;

class CuentaSueldoTest extends TestCase {
    public function testGetLimite() {
        $persona = new Persona("Juan", "Pérez", "Calle 123", "12345678");
        $cuentaSueldo = new CuentaSueldo(500, $persona);

        $cuentaSueldo->setLimite(2000);

        $this->assertEquals(2000, $cuentaSueldo->getLimite());
    }
}
