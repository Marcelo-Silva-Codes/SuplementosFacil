<?php

class Suplemento
{
    private int $id;
    private string $nome;
    private int $quantidadeTotal;
    private string $quantidadeTotalUM;
    private int $categoriaId;
    private string $formaApresentacao;
    private string $quantidadePorPorcao;
    private string $quantidadePorPorcaoUM;
    private float $calorias;
    private string $sabor;
    private float $preco;
    private ?string $img;
    private ?string $marca;
    private ?string $link = null;
    private bool $vegano = false;
    private bool $gluten = false;
    private bool $lactose = false;

    private $nutrientes = [];

    public function setNutrientes(array $nutrientes) {
        $this->nutrientes = $nutrientes;
    }

    public function getNutrientes(): array {
        return $this->nutrientes;
    }

public function addNutriente($nutrienteId, $quantidade, $unidade) {
        $this->nutrientes[] = [
            'nutriente_id'   => $nutrienteId,
            'quantidade'     => $quantidade,
            'unidade_medida' => $unidade
        ];
    }


    // Getters e Setters
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getquantidadeTotal()
    {
        return $this->quantidadeTotal;
    }
    public function setquantidadeTotal(int $qtd)
    {
        $this->quantidadeTotal = $qtd;
    }
    public function getquantidadeTotalUM()
    {
        return $this->quantidadeTotalUM;
    }
    public function setquantidadeTotalUM(string $um)
    {
        $this->quantidadeTotalUM = $um;
    }
    public function getquantidadePorPorcao()
    {
        return $this->quantidadePorPorcao;
    }
    public function setquantidadePorPorcao(string $qtd)
    {
        $this->quantidadePorPorcao = $qtd;
    }
    public function getquantidadePorPorcaoUM()
    {
        return $this->quantidadePorPorcaoUM;
    }
    public function setquantidadePorPorcaoUM(string $um)
    {
        $this->quantidadePorPorcaoUM = $um;
    }
    public function getcalorias()
    {
        return $this->calorias;
    }
    public function setcalorias(float $calorias)
    {
        $this->calorias = $calorias;
    }

    public function getSabor()
    {
        return $this->sabor;
    }
    public function setSabor(string $sabor)
    {
        $this->sabor = $sabor;
    }

    public function getCategoriaId()
    {
        return $this->categoriaId;
    }
    public function setCategoriaId(int $categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    public function getFormaApresentacao()
    {
        return $this->formaApresentacao;
    }

    public function setFormaApresentacao(string $formaApresentacao)
    {
        $this->formaApresentacao = $formaApresentacao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco(float $preco)
    {
        $this->preco = $preco;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg(?string $img)
    {
        $this->img = $img;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca(?string $marca)
    {
        $this->marca = $marca;
    }

    public function isVegano(): bool
    {
        return $this->vegano;
    }
    public function setVegano(bool $v): void
    {
        $this->vegano = $v;
    }

    public function isGluten(): bool
    {
        return $this->gluten;
    }
    public function setGluten(bool $g): void
    {
        $this->gluten = $g;
    }

    public function isLactose(): bool
    {
        return $this->lactose;
    }
    public function setLactose(bool $l): void
    {
        $this->lactose = $l;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink(?string $link)
    {
        $this->link = $link;
    }
}
