<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Pelicula extends Cinema
{
    private string $nombrePelicula;
    private int $time;
}
