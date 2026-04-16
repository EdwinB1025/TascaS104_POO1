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

    public function tirarDados(?int $n = null): void
    {
        if ($n === null) {
            $this->dadosUltima = $this->dados;
            foreach ($this->dados as $i => &$dado) {
                $dado = mt_rand(0, 5);
                $this->tiradas[$i]++;
            }
        } else {
            $n = $this->defaultIndex($n - 1);
            $this->dadosUltima[$n] = $this->dados[$n];
            $this->dados[$n] = mt_rand(0, 5);
            $this->tiradas[$n]++;
        }
    }

    public function mostrarDados(?int $n = null, int $lag = 0): string
    {
        $array = $lag === -1 ? $this->dadosUltima : $this->dados;
        $palabras = $lag === -1 ? "ultimos" : "nuevos";
        $palabra1 = $lag === -1 ? "ultimo" : "nuevo";
        $palabra2 = $lag === -1 ? "por segunda vez" : "por primera vez";
        if ($n === null) {
            $salida = "Los $palabras dados lanzados son: \n";
            foreach ($array as $i => $dado) {
                $valor = match (true) {
                    $dado === null => "No se ha tirado de nuevo $palabra2",
                    default => self::DADO[$dado]
                };
                $salida .= "El $palabra1 dado " . ($i + 1) . " es: $valor\n";
            }
        } else {
            $n = $this->defaultIndex($n - 1);
            $dado = $array[$n];
            $valor = match (true) {
                $dado === null => "No se ha tirado $palabra2",
                default => self::DADO[$dado]
            };
            return "El $palabra1 dado " . ($n + 1) . " es: $valor\n";
        }
        return $salida;
    }

    public function mostrarTiradas(?int $n = null): string
    {
        if ($n === null) {
            $salida = "Lanzamientos de dados: \n";
            foreach ($this->tiradas as $i => $tirada) {
                $salida .= "El dado " . ($i + 1) . "se ha lanzado $tirada veces.\n";
            }
        } else {
            $n = $this->defaultIndex($n - 1);
            $salida = "El dado " . ($n + 1) . " se ha lanzado {$this->tiradas[$n]} veces.\n";
            return $salida;
        }
        return $salida;
    }
}
