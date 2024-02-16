<?php

namespace SysBancario;
use SysBancario\Cuenta;

class CuentaCorriente extends Cuenta {
    private $porcentaje_interes;
    private $descubierto;

    public function setPorcentajeInteres($porcentaje_interes) {
        $this->porcentaje_interes = $porcentaje_interes;
    }

    public function getPorcentajeInteres() {
        return $this->porcentaje_interes;
    }

    public function setDescubierto($descubierto) {
        $this->descubierto = $descubierto;
    }

    public function getDescubierto() {
        return $this->descubierto;
    }

    public function calcularInteres($meses) {
        return $this->getSaldo() * ($this->porcentaje_interes / 100) * $meses;
    }
}

