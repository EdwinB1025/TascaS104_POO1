<?php
spl_autoload_register(function ($class_name) {
    $base = dirname(__DIR__) . "/classes/";
    include $base . $class_name . '.php';
});

session_start();


$idCine = (int)$_GET['idCine'];
$id = (int)$_POST['id'];

if (isset($_SESSION['cinemas'][$idCine])) {
    $tiempo = $_POST['hr'] . ':' . $_POST['min'];
    $cine = &$_SESSION['cinemas'][$idCine];
    $pelicula = &$cine->obtenerPelicula($id);
    $pelicula->actualizarNombre($_POST['nombre']);
    $pelicula->actualizarDirector($_POST['director']);
    $pelicula->actualizarTiempo($tiempo);
    unset($pelicula);
    unset($cine);
}

header('Location: ../../Peliculas.php?id=' . $idCine);
exit;
