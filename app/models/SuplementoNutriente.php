<?php

class SuplementoNutriente
{
    private int $suplemento_Id;
    private int $nutriente_Id;
    private float $quantidade;
    private string $unidadeMedida;

    public function __construct(
        int $suplemento_Id = 0,
        int $nutriente_Id = 0,
        float $quantidade = 0,
        string $unidadeMedida = ""
    ) {
        $this->suplemento_Id = $suplemento_Id;
        $this->nutriente_Id = $nutriente_Id;
        $this->quantidade = $quantidade;
        $this->unidadeMedida = $unidadeMedida;
    }

    public function getSuplementoId(): int { return $this->suplemento_Id; }
    public function setSuplementoId(int $id): void { $this->suplemento_Id = $id; }

    public function getNutrienteId(): int { return $this->nutriente_Id; }
    public function setNutrienteId(int $id): void { $this->nutriente_Id = $id; }

    public function getQuantidade(): float { return $this->quantidade; }
    public function setQuantidade(float $qtd): void { $this->quantidade = $qtd; }

    public function getUnidadeMedida(): string { return $this->unidadeMedida; }
    public function setUnidadeMedida(string $um): void { $this->unidadeMedida = $um; }
}
