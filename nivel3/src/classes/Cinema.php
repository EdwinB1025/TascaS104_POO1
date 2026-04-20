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
    public function &obtenerPelicula(int $id): Pelicula //declaracion para retorna referencia
    {
        return $this->peliculas[$id];
    }
    public function actualizarNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function actualizarPoblacion(string $poblacion): void
    {
        $this->poblacion = $poblacion;
    }
    public function crearPelicula(Pelicula $peli): void
    {
        array_push($this->peliculas, $peli);
    }
    public function eliminarPelicula(int $id): void
    {
        unset($this->peliculas[$id]);
        if (sizeof($this->peliculas) > 0) {
            $this->peliculas = array_values($this->peliculas);
        }
    }
    public function compararTiempo(Pelicula $a, Pelicula $b): int
    {
        $tiempoA = $a->obtenerTiempo();
        $tiempoB = $b->obtenerTiempo();

        return strtotime($tiempoB) - strtotime($tiempoA); //negativo: el primer elmento es mas grande, por ende va primero
    }
    public function buscarMayorDuracion(): ?Pelicula
    {
        $MayorAMenor = $this->peliculas;
        if (sizeof($MayorAMenor) > 0) {
            usort($MayorAMenor, [$this, 'compararTiempo']);
            return $MayorAMenor[0];
        } else {
            return null;
        }
    }
}
