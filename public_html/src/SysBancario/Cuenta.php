<?php 
namespace SysBancario;
class Cuenta {
    private $id;
    private $saldo;
    private $persona;

    private static $contadorId = 0;

    public function __construct($saldo, $persona) {
        $this->id = ++self::$contadorId;
        $this->saldo = $saldo;
        $this->persona = $persona;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setSaldo($newSaldo) {
        $this->saldo = $newSaldo;
    }
    public function getId() {
        return $this->id;
    }

}
