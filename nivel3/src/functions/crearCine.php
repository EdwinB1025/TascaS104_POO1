<?php
spl_autoload_register(function ($class_name) {
    $base = dirname(__DIR__) . "/classes/";
    include $base . $class_name . '.php';
});

session_start();

$cine = new Cinema($_POST['nombre'], $_POST['poblacion']);
$_SESSION['cinemas'][] = $cine;

header('Location: ../../index.php');
exit;
