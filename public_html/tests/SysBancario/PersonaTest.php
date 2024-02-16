<?php

use SysBancario\Persona;
use PHPUnit\Framework\TestCase;

class PersonaTest extends TestCase {
    public function testGetData() {
        $persona = new Persona("Juan", "Pérez", "Calle 123", "12345678");

        $expectedOutput = "Apellido: Pérez\nNombre: Juan\nDomicilio: Calle 123\nDNI: 12345678";

        // Capturamos la salida de la función
        ob_start();
        $persona->getData();
        $actualOutput = ob_get_clean();

        // Comparamos la salida con la esperada
        $this->assertEquals($expectedOutput, $actualOutput);
    }
}
