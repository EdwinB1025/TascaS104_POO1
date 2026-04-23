<?php
require 'Dado.php';
class PokerDice
{
    public const array DADO = ["A", "K", "Q", "J", "7", "8"];
    static array $dados = [];
    static int $tiradas = 0;


    private static function defaultIndex(int $n): int
    {
        $n = match (true) {
            $n < 1 => 1,
            $n >= 5 => 5,
            default => $n
        };
        return $n;
    }

    public static function iniciarDados(int $n): void
    {
        if (sizeof(self::$dados) < $n) {
            $inicial = ((sizeof(self::$dados) - 1) < 0) ? 0 : sizeof(self::$dados) - 1;
            for ($i = $inicial; $i < $n; $i++) {
                self::$dados[$i] = new Dado();
            }
        }
    }

    public static function tirarDados(int $n): void
    {
        $n = self::defaultIndex($n);
        self::iniciarDados($n);
        for ($i = 0; $i < $n; $i++) {
            self::$dados[$i]->tirarDado();
            self::$tiradas += self::$dados[$i]->getTiradas();
        }
    }

    public static function mostrarDados(): string
    {
        $salida = "Los ultimos dados lanzados son:\n";
        foreach (self::$dados as $i => $dado) {
            $poker = self::DADO[$dado->getDado()];
            $numero = $i + 1;
            $salida .= "  Dado numero $numero es: $poker\n";
        }
        return $salida . "\n";
    }

    public static function mostrarTiradas(): string
    {
        $salida = "Los ultimos tiradas de los dados son:\n";
        foreach (self::$dados as $i => $dado) {
            $numero = $i + 1;
            $tirada = $dado->getTiradas();
            $salida .= "  Dado numero $numero se ha tirado: $tirada veces\n";
        }
        $suma = self::$tiradas;
        return $salida . "\nLa suma total de las tiradas es: $suma\n";
    }
}
