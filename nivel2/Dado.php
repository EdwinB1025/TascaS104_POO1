<?php
class Dado
{
    private int $indice;
    private int $tiradas = 0;

    public function tirarDado(): void
    {
        $this->indice = mt_rand(0, 5);
        $this->tiradas++;
    }

    public function getDado(): int
    {
        return $this->indice;
    }

    public function getTiradas(): int
    {
        return $this->tiradas;
    }
}
