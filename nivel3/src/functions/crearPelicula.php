<?php
spl_autoload_register(function ($class_name) {
    $base = dirname(__DIR__) . "/classes/";
    include $base . $class_name . '.php';
});

session_start();

$id = $_GET['id'];

if (isset($_SESSION['cinemas'][$id])) {

    $tiempo = $_POST['hr'] . ':' . $_POST['min'];
    $pelicula = new Pelicula($_POST['nombre'], $_POST['director'], $tiempo);
    $cine = &$_SESSION['cinemas'][$_GET['id']];
    $cine->crearPelicula($pelicula);
}

header('Location: ../../Peliculas.php?id=' . $id);
exit;
