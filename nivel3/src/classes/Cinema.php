<?php
class Cinema
{
    private string $nombre;
    private string $poblacion;
    protected array $peliculas;

    public function __construct(string $nombre, string $poblacion)
    {
        $this->nombre = $nombre;
        $this->poblacion = $poblacion;
        $this->peliculas = [];
    }
    public function obtenerNombre(): string
    {
        return $this->nombre;
    }
    public function obtenerPoblacion(): string
    {
        return $this->poblacion;
    }
    public function obtenerPelis(): array
    {
        return $this->peliculas;
    }
    public function actualizarNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function actualizarPoblacion(string $poblacion): void
    {
        $this->poblacion = $poblacion;
    }
}
