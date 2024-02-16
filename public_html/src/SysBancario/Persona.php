<?php

namespace SysBancario;

class Persona {
    private $nombre;
    private $apellido;
    private $domicilio;
    private $dni;

    public function __construct($nombre, $apellido, $domicilio, $dni) {
        $this->validarNombre($nombre);
        $this->validarApellido($apellido);
        $this->validarDomicilio($domicilio);
        $this->validarDNI($dni);

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->domicilio = $domicilio;
        $this->dni = $dni;
    }

    public function getData(){
        echo 'Apellido: ' . $this->apellido . PHP_EOL . 'Nombre: ' . $this->nombre . PHP_EOL . 'Domicilio: ' . $this->domicilio . PHP_EOL . 'DNI: ' . $this->dni;
    }

    private function validarNombre($nombre) {
        if (empty($nombre)) {
            throw new \InvalidArgumentException('El nombre no puede estar vacío.');
        }
    }

    private function validarApellido($apellido) {
        if (empty($apellido)) {
            throw new \InvalidArgumentException('El apellido no puede estar vacío.');
        }
    }

    private function validarDomicilio($domicilio) {
        if (empty($domicilio)) {
            throw new \InvalidArgumentException('El domicilio no puede estar vacío.');
        }
    }

    private function validarDNI($dni) {
        if (empty($dni) || !is_numeric($dni) || $dni <= 0) {
            throw new \InvalidArgumentException('El DNI debe ser un número positivo.');
        }
    }
}
