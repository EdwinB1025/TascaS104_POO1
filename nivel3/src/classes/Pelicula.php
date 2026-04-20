<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

class Pelicula
{
    private string $nombre;
    private string $director;
    private int $tiempo;

    function __construct(string $nombre, string $director, string $tiempo)
    {
        $this->nombre = $nombre;
        $this->director = $director;
        $this->tiempo = strtotime($tiempo);
    }

    public function obtenerNombre(): string
    {
        return $this->nombre;
    }
    public function obtenerDirector(): string
    {
        return $this->director;
    }
    public function obtenerTiempo(): string
    {
        return date('H:i', $this->tiempo);
    }
    public function obtenerHoras(): string
    {
        return date('H', $this->tiempo);
    }
    public function obtenerMinutos(): string
    {
        return date('i', $this->tiempo);
    }
    public function actualizarNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function actualizarDirector(string $director): void
    {
        $this->director = $director;
    }
    public function actualizarTiempo(string $tiempo): void
    {
        $this->tiempo = strtotime($tiempo);
    }
}
