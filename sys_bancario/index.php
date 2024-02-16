<?php 

require_once __DIR__ . '/vendor/autoload.php';

use SysBancario\Persona;
use SysBancario\CuentaCorriente;
use SysBancario\CuentaSueldo;

$persona = new Persona('Alejandro', 'González', 'Pedemonte 6920', '24089328');
$persona->getData();


$cuentaCC = new CuentaCorriente(1000, $persona);
$cuentaCC->setPorcentajeInteres(2);
$cuentaCC->setDescubierto(500);

echo "Saldo inicial de la Cuenta Corriente: $" . $cuentaCC->getSaldo() . "\n";
echo "Porcentaje de interés: " . $cuentaCC->getPorcentajeInteres() . "%\n";
echo "Descubierto permitido: $" . $cuentaCC->getDescubierto() . "\n";
echo "Interés acumulado en 3 meses: $" . $cuentaCC->calcularInteres(3) . "\n";

$cuentaSueldo = new CuentaSueldo(500, $persona);
$cuentaSueldo->setLimite(2000);

echo "\nSaldo inicial de la Cuenta Sueldo: $" . $cuentaSueldo->getSaldo() . "\n";
echo "Límite de la Cuenta Sueldo: $" . $cuentaSueldo->getLimite() . "\n";