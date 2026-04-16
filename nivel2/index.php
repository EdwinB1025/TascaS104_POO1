<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$dado = new PokerDice();

echo "\n-------LANZO EL PRIMER DADO---------\n";

$dado->tirarDados(1);
echo $dado->mostrarDados(1);
echo $dado->mostrarDados(1, -1);

echo "\n-------LANZO EL TERCER DADO---------\n";

$dado->tirarDados(3);
echo $dado->mostrarDados(3);
echo $dado->mostrarDados(3, -1);
echo $dado->mostrarDados(null, -1);

echo "\n-------MUESTRO LOS DADOS ACTUALES---------\n";

echo $dado->mostrarDados();

echo "\n-------LANZO EL PRIMER DADO DE NUEVO---------\n";

$dado->tirarDados(-1);
echo $dado->mostrarDados();
echo $dado->mostrarDados(null, -1);

echo $dado->mostrarTiradas(1);
echo $dado->mostrarTiradas();

echo "\n-------TIRO TODOS LOS DADOS---------\n";

$dado->tirarDados();

echo $dado->mostrarDados();

echo "\n-------MUESTRO SEXTO DADO---------\n";

echo $dado->mostrarDados(10);
echo $dado->mostrarDados(null, -1);
echo $dado->mostrarTiradas();



echo "\n-------TIRO TODOS LOS DADOS---------\n";

$dado->tirarDados();
echo $dado->mostrarDados();
echo $dado->mostrarDados(null, -1);
echo $dado->mostrarTiradas();
