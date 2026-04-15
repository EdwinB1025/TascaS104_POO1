<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$dado = new PokerDice();
$dado->tirarDado();
$dado->mostrarLado();
