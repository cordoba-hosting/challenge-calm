<?php

namespace SysBancario;

use SysBancario\Cuenta;

class CuentaSueldo extends Cuenta {
    private $limite;

    public function setLimite($limite) {
        $this->validarLimite($limite);
        $this->limite = $limite;
    }

    public function getLimite() {
        return $this->limite;
    }

    private function validarLimite($limite) {
        if (!is_numeric($limite) || $limite < 0) {
            throw new \InvalidArgumentException('El límite debe ser un número no negativo.');
        }
    }
}
