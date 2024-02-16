<?php

namespace Challenge;
class Producto
{
    private $id;
    private $descripcion;
    private $precio;

    private $peso;

    public function __construct($id, $descripcion, $precio, $peso)
    {
        // if (empty($id) || empty($descripcion) || !is_numeric($precio) || $precio <= 0) {
        //     throw new InvalidArgumentException("Los datos del producto son inválidos");
        // }

        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->peso = $peso;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
}