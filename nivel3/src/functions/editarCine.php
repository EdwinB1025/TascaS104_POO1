<?php
spl_autoload_register(function ($class_name) {
    $base = dirname(__DIR__) . "/classes/";
    include $base . $class_name . '.php';
});

session_start();

if (isset($_SESSION['cinemas'][$_POST['id']])) {

    $cine = &$_SESSION['cinemas'][$_POST['id']];
    $cine->actualizarNombre($_POST['nombre']);
    $cine->actualizarPoblacion($_POST['poblacion']);
    unset($cine);
}


header('Location: ../../index.php');
exit;
