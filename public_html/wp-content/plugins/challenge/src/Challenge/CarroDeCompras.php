<?php
namespace Challenge;

class CarroDeCompras
{
    private $productos = [];

    public function agregarProducto(Producto $producto, $cantidad = 1)
    {
        for ($i = 0; $i < $cantidad; $i++) {
            $this->productos[] = $producto;
        }
    }

    public function sacarProducto($id)
    {
        foreach ($this->productos as $key => $producto) {
            if ($producto->getId() == $id) {
                unset($this->productos[$key]);
                return;
            }
        }
    }

    public function contarCantidadProductos()
    {
        return count($this->productos);
    }

    public function mostrarSubtotalPorProducto($id, $cantidad = 1)
    {
        $subtotal = 0;

        foreach ($this->productos as $producto) {
            if ($producto->getId() == $id) {
                $subtotal += $producto->getPrecio();
                $cantidad--;

                if ($cantidad == 0) {
                    break;
                }
            }
        }

        return $subtotal;
    }

    public function mostrarTotal()
    {
        $total = 0;

        foreach ($this->productos as $producto) {
            $total += $producto->getPrecio();
        }

        return $total;
    }

    public function verificarEnvio()
    {
        $pesoTotal = count($this->productos);

        return $pesoTotal <= 5;
    }
}
