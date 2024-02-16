<?php

namespace SysBancario;

use SysBancario\Cuenta;

class CuentaSueldo extends Cuenta {
    private $limite;

    public function setLimite($limite) {
        $this->limite = $limite;
    }

    public function getLimite() {
        return $this->limite;
    }
}