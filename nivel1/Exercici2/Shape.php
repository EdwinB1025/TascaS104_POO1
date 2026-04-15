<?php
class Shape
{
    private float $ancho;
    private float $alto;

    protected function __construct(float $ancho, float $alto)
    {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    protected function calcularArea(): float
    {
        return $this->ancho * $this->alto;
    }
}
