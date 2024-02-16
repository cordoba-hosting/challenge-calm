<?php

/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 *
 * The following variables are exposed to the file:
 *     $attributes (array): The block attributes.
 *     $content (string): The block default content.
 *     $block (WP_Block): The block instance.
 *
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */



require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../src/Challenge/CarroDeCompras.php';
require_once __DIR__ . '/../../../src/Challenge/Producto.php';

use Challenge\Producto;
use Challenge\CarroDeCompras;

$productoXPrecio =  $attributes['productoXPrecio'] ?? 0;
$productoXPeso =  $attributes['productoXPeso'] ?? 0;
$productoXCantidad =  $attributes['productoXCantidad'] ?? 1;
$productoXId =  1;


$lineaX = '<li>'.$productoXCantidad . ' &nbsp;Producto X (peso: ' . $productoXPeso .') Precio: $' . $productoXPrecio .'</li>';

$productoYPrecio =  $attributes['productoYPrecio'] ?? 0;
$productoYPeso =  $attributes['productoYPrecio'] ?? 0;
$productoYCantidad =  $attributes['productoYCantidad'] ?? 1;
$productoYId =  2;
$lineaY = '<li>'.$productoYCantidad . ' &nbsp;Producto Y (peso: ' . $productoYPeso .') Precio: $' . $productoYPrecio.'</li>' ;

$productoZPrecio =  $attributes['productoZPrecio'] ?? 0;
$productoZPeso =  $attributes['productoZPrecio'] ?? 0;
$productoZCantidad =  $attributes['productoZCantidad'] ?? 1;
$productoZId =  3;
$lineaZ = '<li>'.$productoZCantidad . ' &nbsp;Producto Z (peso: ' . $productoZPeso .') Precio: $' . $productoZPrecio.'</li>' ;


$productoX = new Producto( 1, 'X', $productoXPrecio , $productoXPeso );
$productoY = new Producto( 2, 'Y', $productoYPrecio , $productoYPeso);
$productoZ = new Producto( 3, 'Z', $productoZPrecio , $productoZPeso );

$carrito = new CarroDeCompras();
$carrito->agregarProducto($productoX, $productoXCantidad);
$carrito->agregarProducto($productoY, $productoYCantidad);
$carrito->agregarProducto($productoZ, $productoZCantidad);

$lineaX .= ' -> $' . $carrito->mostrarSubtotalPorProducto(1, $productoXCantidad);
$lineaY .= ' -> $' . $carrito->mostrarSubtotalPorProducto(2, $productoYCantidad);
$lineaZ .= ' -> $' . $carrito->mostrarSubtotalPorProducto(3, $productoZCantidad);

$total = $carrito->mostrarTotal();

$block_content = '<h5 ' . get_block_wrapper_attributes(
	[
		'class' => 'letra', 
		'style' => 'color: #000',
	]
) . '>' . __("Carro de compras") .'</h5>
<ul>
		'.$lineaX.' 
		'.$lineaY.'
		'.$lineaZ.'
</ul>
<p>Total: $'. $total. '</p>

';

echo wp_kses_post($block_content);
