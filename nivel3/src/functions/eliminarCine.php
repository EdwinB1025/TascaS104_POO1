<?php
spl_autoload_register(function ($class_name) {
    $base = dirname(__DIR__) . "/classes/";
    include $base . $class_name . '.php';
});

session_start();

$id = $_GET['id'];
if (isset($_SESSION['cinemas'][$id])) {
    unset($_SESSION['cinemas'][$id]);
    $_SESSION['cinemas'] = array_values($_SESSION['cinemas']); //to restart all the indexes again
}


header('Location: ../../index.php');
exit;
