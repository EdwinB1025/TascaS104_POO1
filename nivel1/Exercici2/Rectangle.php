<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Rectangle extends Shape
{
    public function __construct(float $ancho, float $alto)
    {
        parent::__construct($ancho, $alto);
    }

    public function calcularArea(): float
    {
        return parent::calcularArea();
    }
}
