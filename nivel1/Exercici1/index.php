<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$empleado1 = new Empleado("Edwin", 5500);
$empleado2 = new Empleado("Victor", 55000);

echo $empleado1->presentarse();
echo $empleado2->presentarse();
