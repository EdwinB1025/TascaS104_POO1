<?php
class Empleado
{
    private string $nombre;
    private int $sueldo;

    public function __construct(string $nombre, int $sueldo)
    {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function presentarse(): string
    {
        $impuestos = ($this->sueldo > 6000 ? "he de pagar impuestos." : "no he de pagar impuestos.");
        return "Hola mi nombre es " . $this->nombre . " y " . $impuestos . "\n";
    }
}
