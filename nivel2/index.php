<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


echo "\n-------LANZO EL PRIMER DADO---------\n";

PokerDice::tirarDados(1);
echo PokerDice::mostrarDados();
echo PokerDice::mostrarTiradas();

echo "\n-------LANZO 5 DADOS---------\n";

PokerDice::tirarDados(5);
echo PokerDice::mostrarDados();
echo PokerDice::mostrarTiradas();
