<?php 

require_once __DIR__ . '/vendor/autoload.php';

use SysBancario\Persona;
use SysBancario\CuentaCorriente;
use SysBancario\CuentaSueldo;

while (true) {
    echo "Bienvenido al sistema bancario\n";
    echo "1. Crear Persona\n";
    echo "2. Crear Cuenta\n";
    echo "3. Ver Saldo\n";
    echo "4. Realizar Depósito\n";
    echo "5. Realizar Retiro\n";
    echo "6. Salir\n";
    echo "Seleccione una opción: ";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            echo "Ingrese el nombre: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el domicilio: ";
            $domicilio = trim(fgets(STDIN));
            echo "Ingrese el DNI: ";
            $dni = trim(fgets(STDIN));

            $persona = new Persona($nombre, $apellido, $domicilio, $dni);
            echo "Persona creada con éxito\n";
            break;

        case '2':
            echo "Ingrese el saldo inicial: ";
            $saldo = trim(fgets(STDIN));

            if (!isset($persona)) {
                echo "Primero debe crear una persona\n";
                break;
            }

            echo "¿Es cuenta corriente? (s/n): ";
            $esCorriente = strtolower(trim(fgets(STDIN)));

            if ($esCorriente === 's') {
                $cuenta = new CuentaCorriente($saldo, $persona);
            } else {
                $cuenta = new CuentaSueldo($saldo, $persona);
            }

            echo "Cuenta creada con éxito\n";
            break;

        case '3':
            if (!isset($cuenta)) {
                echo "Primero debe crear una cuenta\n";
                break;
            }

            echo "Saldo actual: " . $cuenta->getSaldo() . "\n";
            break;

        case '4':
            if (!isset($cuenta)) {
                echo "Primero debe crear una cuenta\n";
                break;
            }

            echo "Ingrese el monto a depositar: ";
            $monto = trim(fgets(STDIN));
            $cuenta->setSaldo($cuenta->getSaldo() + $monto);
            echo "Depósito realizado con éxito\n";
            break;

        case '5':
            if (!isset($cuenta)) {
                echo "Primero debe crear una cuenta\n";
                break;
            }

            echo "Ingrese el monto a retirar: ";
            $monto = trim(fgets(STDIN));

            if ($monto > $cuenta->getSaldo()) {
                echo "No tiene suficiente saldo para realizar el retiro\n";
                break;
            }

            $cuenta->setSaldo($cuenta->getSaldo() - $monto);
            echo "Retiro realizado con éxito\n";
            break;

        case '6':
            echo "¡Hasta luego!";
            exit();

        default:
            echo "Opción inválida. Por favor, seleccione una opción válida\n";
            break;
    }
}

?>