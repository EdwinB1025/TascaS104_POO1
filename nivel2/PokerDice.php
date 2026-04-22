<?php
class PokerDice
{
    public const array DADO = ["A", "K", "Q", "J", "7", "8"];
    public array $dados;
    public array $tiradas;

    public function __construct(?int $dado = null)
    {
        $this->dados = [];
        $this->tiradas = array_fill(0, 5, 0);
    }

    private function defaultIndex(int $n): int
    {
        $n = match (true) {
            $n < 1 => 1,
            $n > 6 => 6,
            default => $n
        };
        return $n;
    }

    public function tirarDado(): int
    {
        return mt_rand(0, 5);
    }

    public function tirarDados(int $n): void
    {
        $n = $this->defaultIndex($n);
        for ($i = 0; $i < $n; $i++) {
            $this->dados[$i] = $this->tirarDado();
            $this->tiradas[$i]++;
        }
    }

    public function mostrarDados(): string
    {
        $salida = "Los ultimos dados lanzados son:\n";
        foreach ($this->dados as $i => $dado) {
            $poker = self::DADO[$dado];
            $numero = $i + 1;
            $salida .= "  Dado numero $numero es: $poker\n";
        }
        return $salida . "\n";
    }

    public function mostrarTiradas(): string
    {
        $salida = "Los ultimos tiradas de  los dados son:\n";
        foreach ($this->tiradas as $i => $tirada) {
            $numero = $i + 1;
            $salida .= "  Dado numero $numero se ha tirado: $tirada veces\n";
        }
        return $salida . "\n";
    }
}
