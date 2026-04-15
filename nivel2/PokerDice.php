<?php
class PokerDice
{
    public const array DADO = ["A", "K", "Q", "J", "7", "8"];
    public ?int $dado1;
    public ?int $dado2;
    public ?int $dado3;
    public ?int $dado4;
    public ?int $dado5;
    public ?int $dado6;
    public array $dados;

    public function __construct($dado = null)
    {
        $this->dado1 = $dado;
        $this->dado2 = $dado;
        $this->dado3 = $dado;
        $this->dado4 = $dado;
        $this->dado5 = $dado;
        $this->dado6 = $dado;
        $this->dados = [$this->dado1, $this->dado2, $this->dado3, $this->dado4, $this->dado5, $this->dado6];
    }

    public function tirarDado(): array
    {
        foreach ($this->dados as &$dado) {
            $dado = mt_rand(0, 5);
        }
        return $this->dados;
    }

    public function mostrarLado(): void
    {
        echo "Los dados son: \n";
        foreach ($this->dados as $dado) {
            echo self::DADO[$dado] . "\n";
        }
    }
}
