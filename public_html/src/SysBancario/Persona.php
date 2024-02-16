<?php 
namespace SysBancario;
class Persona {
    private $nombre;
    private $apellido;
    private $domicilio;
    private $dni;

    public function __construct($nombre, $apellido, $domicilio, $dni) {
        
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->domicilio = $domicilio;
        $this->dni = $dni;
    }

    public function getData(){
        echo 'Apellido: ' . $this->apellido . PHP_EOL . 'Nombre: ' . $this->nombre . PHP_EOL . 'Domicilio: ' . $this->domicilio . PHP_EOL . 'DNI: ' . $this->dni;
    }

}
