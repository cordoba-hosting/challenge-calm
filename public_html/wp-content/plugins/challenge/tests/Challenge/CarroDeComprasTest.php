<?php

use PHPUnit\Framework\TestCase;

class CarroDeComprasTest extends TestCase
{
    public function testAgregarProducto()
    {
        $carro = new CarroDeCompras();
        $producto = new Producto(1, 'Producto X', 10.0);

        $carro->agregarProducto($producto);

        $this->assertCount(1, $carro->contarCantidadProductos());
    }

    public function testSacarProductoExistente()
    {
        $carro = new CarroDeCompras();
        $producto = new Producto(1, 'Producto X', 10.0);

        $carro->agregarProducto($producto);
        $carro->sacarProducto(1);

        $this->assertCount(0, $carro->contarCantidadProductos());
    }

    public function testSacarProductoNoExistente()
    {
        $this->expectException(InvalidArgumentException::class);

        $carro = new CarroDeCompras();
        $carro->sacarProducto(1);
    }

    public function testMostrarSubtotalPorProducto()
    {
        $carro = new CarroDeCompras();
        $producto = new Producto(1, 'Producto X', 10.0);

        $carro->agregarProducto($producto);
        $subtotal = $carro->mostrarSubtotalPorProducto(1);

        $this->assertEquals(10.0, $subtotal);
    }

    public function testMostrarTotal()
    {
        $carro = new CarroDeCompras();
        $producto1 = new Producto(1, 'Producto X', 10.0);
        $producto2 = new Producto(2, 'Producto Y', 20.0);

        $carro->agregarProducto($producto1);
        $carro->agregarProducto($producto2);

        $total = $carro->mostrarTotal();

        $this->assertEquals(30.0, $total);
    }

    public function testVerificarEnvioPesoMenorA5()
    {
        $carro = new CarroDeCompras();
        $producto1 = new Producto(1, 'Producto X', 1.0);
        $producto2 = new Producto(2, 'Producto Y', 1.0);

        $carro->agregarProducto($producto1);
        $carro->agregarProducto($producto2);

        $envioPosible = $carro->verificarEnvio();

        $this->assertTrue($envioPosible);
    }

    public function testVerificarEnvioPesoMayorA5()
    {
        $carro = new CarroDeCompras();
        $producto1 = new Producto(1, 'Producto X', 3.0);
        $producto2 = new Producto(2, 'Producto Y', 3.0);

        $carro->agregarProducto($producto1);
        $carro->agregarProducto($producto2);

        $envioPosible = $carro->verificarEnvio();

        $this->assertFalse($envioPosible);
    }
}
