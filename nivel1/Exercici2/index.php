<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$triangulo = new Triangle(13, 6);
$rectangulo = new Rectangle(5, 6.5);

echo 'Area del triangulo: ' . $triangulo->calcularArea() . "\n";
echo 'Area del rectangulo: ' . $rectangulo->calcularArea();
