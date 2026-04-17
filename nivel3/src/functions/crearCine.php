<?php
spl_autoload_register(function ($class_name) {
    $base = dirname(__DIR__) . "/classes/";
    include $base . $class_name . '.php';
});

$cine = new Cinema($_POST['nombre'], $_POST['poblacion']);
$_SESSION['cinemas'][] = $cine;
