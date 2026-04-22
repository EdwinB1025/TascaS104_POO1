<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Triangle extends Shape
{

    public function calcularArea(): float
    {
        return parent::calcularArea() / 2;
    }
}
