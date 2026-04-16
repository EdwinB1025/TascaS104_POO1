<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$dado = new PokerDice();

echo "\n-------LANZO EL PRIMER DADO---------\n";

$dado->tirarDado(1);
echo $dado->mostrarDado(1);
echo $dado->mostrarUltimoDado(1);

echo "\n-------LANZO EL TERCER DADO---------\n";

$dado->tirarDado(3);
echo $dado->mostrarDado(3);
echo $dado->mostrarUltimoDado(3);


echo $dado->mostrarUltimosDados();

echo "\n-------MUESTRO LOS DADOS ACTUALES---------\n";

echo $dado->mostrarDados();

echo "\n-------LANZO EL PRIMER DADO DE NUEVO---------\n";

$dado->tirarDado();

echo $dado->mostrarDados();
echo $dado->mostrarUltimosDados();

echo $dado->mostrarTirada();
echo $dado->mostrarTiradas();

echo "\n-------TIRO TODOS LOS DADOS---------\n";

$dado->tirarDados();

echo $dado->mostrarDados();

echo "\n-------MUESTRO SEXTO DADO---------\n";

echo $dado->mostrarDado(10);
echo $dado->mostrarUltimosDados();
echo $dado->mostrarTiradas();



echo "\n-------TIRO TODOS LOS DADOS---------\n";

$dado->tirarDados();
echo $dado->mostrarDados();
echo $dado->mostrarUltimosDados();
echo $dado->mostrarTiradas();
