<?php

namespace SysBancario;

use SysBancario\Cuenta;

class CuentaCorriente extends Cuenta {
    private $porcentaje_interes;
    private $descubierto;

    public function setPorcentajeInteres($porcentaje_interes) {
        $this->validarPorcentajeInteres($porcentaje_interes);
        $this->porcentaje_interes = $porcentaje_interes;
    }

    public function getPorcentajeInteres() {
        return $this->porcentaje_interes;
    }

    public function setDescubierto($descubierto) {
        $this->validarDescubierto($descubierto);
        $this->descubierto = $descubierto;
    }

    public function getDescubierto() {
        return $this->descubierto;
    }

    public function calcularInteres($meses) {
        return $this->getSaldo() * ($this->porcentaje_interes / 100) * $meses;
    }

    private function validarPorcentajeInteres($porcentaje_interes) {
        if (!is_numeric($porcentaje_interes) || $porcentaje_interes < 0) {
            throw new \InvalidArgumentException('El porcentaje de interés debe ser un número no negativo.');
        }
    }

    private function validarDescubierto($descubierto) {
        if (!is_numeric($descubierto)) {
            throw new \InvalidArgumentException('El descubierto debe ser un número.');
        }
    }
}
