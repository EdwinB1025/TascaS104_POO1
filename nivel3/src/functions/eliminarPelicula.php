<?php
spl_autoload_register(function ($class_name) {
    $base = dirname(__DIR__) . "/classes/";
    include $base . $class_name . '.php';
});

session_start();

$id = (int)$_GET['id'];
$idCine = (int)$_GET['idCine'];

if (isset($_SESSION['cinemas'][$idCine])) {
    $cine = &$_SESSION['cinemas'][$idCine];
    $cine->eliminarPelicula($id);
    unset($cine);
}

header('Location: ../../Peliculas.php?id=' . $idCine);
exit;
