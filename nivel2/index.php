<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$dado = new PokerDice();

echo "\n-------LANZO EL PRIMER DADO---------\n";

$dado->tirarDados(1);
echo $dado->mostrarDados();
echo $dado->mostrarTiradas();

echo "\n-------LANZO 5 DADOS---------\n";

$dado->tirarDados(5);
echo $dado->mostrarDados();
echo $dado->mostrarTiradas();
