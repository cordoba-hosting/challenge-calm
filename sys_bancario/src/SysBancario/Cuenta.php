<?php

namespace SysBancario;

use SysBancario\Persona;

class Cuenta {
    private $id;
    private $saldo;
    private $persona;

    private static $contadorId = 0;

    public function __construct($saldo, Persona $persona) {
        $this->id = ++self::$contadorId;
        $this->saldo = $saldo;
        $this->persona = $persona;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setSaldo($newSaldo) {
        $this->validarSaldo($newSaldo);
        $this->saldo = $newSaldo;
    }

    public function getId() {
        return $this->id;
    }

    private function validarSaldo($saldo) {
        if (!is_numeric($saldo) || $saldo < 0) {
            throw new \InvalidArgumentException('El saldo debe ser un número no negativo.');
        }
    }
}
