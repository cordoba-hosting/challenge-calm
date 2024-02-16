<?php

use SysBancario\CuentaCorriente;
use SysBancario\Persona;
use PHPUnit\Framework\TestCase;

class CuentaCorrienteTest extends TestCase {
    public function testCalcularInteres() {
        $persona = new Persona("Juan", "Pérez", "Calle 123", "12345678");
        $cuentaCC = new CuentaCorriente(1000, $persona);

        $cuentaCC->setPorcentajeInteres(2);

        $this->assertEquals(60, $cuentaCC->calcularInteres(3));
    }
}
