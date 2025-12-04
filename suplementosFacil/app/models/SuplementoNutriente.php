<?php

class SuplementoNutriente
{
    private int $id;
    private int $suplementoId;
    private int $nutrienteId;
    private ?float $quantidade;
    private ?string $unidadeMedida;

 
    public function getId(): int { return $this->id; }
    public function setId(int $id): void { $this->id = $id; }

    public function getSuplementoId(): int { return $this->suplementoId; }
    public function setSuplementoId(int $id): void { $this->suplementoId = $id; }

    public function getNutrienteId(): int { return $this->nutrienteId; }
    public function setNutrienteId(int $id): void { $this->nutrienteId = $id; }

    public function getQuantidade(): ?float { return $this->quantidade; }
    public function setQuantidade(?float $qtd): void { $this->quantidade = $qtd; }

    public function getUnidadeMedida(): ?string { return $this->unidadeMedida; }
    public function setUnidadeMedida(?string $um): void { $this->unidadeMedida = $um; }
}
