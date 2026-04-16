<?php
class PokerDice
{
    public const array DADO = ["A", "K", "Q", "J", "7", "8"];
    public array $dados;
    public array $dadosUltima;
    public array $tiradas;

    public function __construct(?int $dado = null)
    {
        $this->dados = array_fill(0, 6, $dado);
        $this->dadosUltima = array_fill(0, 6, $dado);
        $this->tiradas = array_fill(0, 6, 0);
    }

    private function defaultIndex(int $n): int
    {
        $n = match (true) {
            $n < 0 => 0,
            $n > 5 => 5,
            default => $n
        };
        return $n;
    }

    public function tirarDado(?int $n = null): void
    {
        $n = $n ?? 1;
        $n = $this->defaultIndex($n - 1);
        $this->dadosUltima[$n] = $this->dados[$n];
        $this->dados[$n] = mt_rand(0, 5);
        $this->tiradas[$n]++;
    }
    public function tirarDados(): void
    {

        $this->dadosUltima = $this->dados;
        foreach ($this->dados as $i => &$dado) {
            $dado = mt_rand(0, 5);
            $this->tiradas[$i]++;
        }
    }

    public function mostrarUltimosDados(): string
    {
        $salida = "Los ultimos dados lanzados son: \n";
        foreach ($this->dadosUltima as $i => $dado) {
            $valor = match (true) {
                $dado === null => "No se ha tirado de nuevo",
                default => self::DADO[$dado]
            };
            $salida .= "El ultimo dado " . ($i + 1) . " es: $valor\n";
        }
        return $salida;
    }
    public function mostrarDados(): string
    {
        $salida = "Los dados lanzados actualmente son: \n";
        foreach ($this->dados as $i => $dado) {
            $valor = match (true) {
                $dado === null => "No se ha tirado",
                default => self::DADO[$dado]
            };
            $salida .= "El dado " . ($i + 1) . " es: $valor\n";
        }
        return $salida;
    }

    public function mostrarUltimoDado(?int $n = null): string
    {
        $n = $n ?? 1;
        $n = $this->defaultIndex($n - 1);
        $dado = $this->dadosUltima[$n];
        $valor = match (true) {
            $dado === null => "No se ha tirado de nuevo",
            default => self::DADO[$dado]
        };
        return "El ultimo dado " . ($n + 1) . " es: $valor\n";
    }

    public function mostrarDado(?int $n = null): string
    {
        $n = $n ?? 1;
        $n = $this->defaultIndex($n - 1);
        $dado = $this->dados[$n];
        $valor = match (true) {
            $dado === null => "No se ha tirado",
            default => self::DADO[$dado]
        };
        return "El dado " . ($n + 1) . " es: $valor\n";
    }
    public function mostrarTirada(?int $n = null): string
    {
        $n = $n ?? 1;
        $n = $this->defaultIndex($n - 1);
        $salida = "El dado " . ($n + 1) . " se ha lanzado {$this->tiradas[$n]} veces.\n";
        return $salida;
    }
    public function mostrarTiradas(): string
    {
        $salida = "Lanzamientos de dados: \n";
        foreach ($this->tiradas as $i => $tirada) {
            $salida .= "El dado " . ($i + 1) . "se ha lanzado $tirada veces.\n";
        }
        return $salida;
    }
}
