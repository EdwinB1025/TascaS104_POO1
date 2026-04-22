<?php
class Shape
{
    private float $ancho;
    private float $alto;

    public function __construct(float $ancho, float $alto)
    {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function calcularArea(): float
    {
        return $this->ancho * $this->alto;
    }
}
