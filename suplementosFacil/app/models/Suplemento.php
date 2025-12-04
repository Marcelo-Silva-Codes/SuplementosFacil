<?php

class Suplemento
{
    private int $id;
    private string $nome;
    private int $quantidadeProduto;
    private int $categoriaId;
    private int $formaId;
    private ?string $descricao;
    private float $preco;
    private ?string $img;
    private ?string $marca;
    /** @var Nutriente[] */
    private array $nutrientes = [];
  

    // Getters e Setters

public function addNutriente(SuplementoNutriente $sn): void
{
    $this->nutrientes[] = $sn;
}

    public function getId(){
         return $this->id; }

    public function setId(int $id){
         $this->id = $id; }

    public function getNome(){ 
        return $this->nome; }
    public function setNome(string $nome){ 
        $this->nome = $nome; }

    public function getQuantidadeProduto(){
        return $this->quantidadeProduto; 
    }
    public function setQuantidadeProduto(int $qtd){ 
        $this->quantidadeProduto = $qtd; 
    }

    public function getCategoriaId(){ 
        return $this->categoriaId; 
    }
    public function setCategoriaId(int $categoriaId){ 
        $this->categoriaId = $categoriaId; }

    public function getFormaId(){ 
        return $this->formaId; }

    public function setFormaId(int $formaId){ 
        $this->formaId = $formaId; }

    public function getDescricao(){ 
        return $this->descricao; 
    }
    public function setDescricao(?string $descricao){ 
        $this->descricao = $descricao; }

    public function getPreco(){ 
        return $this->preco; }

    public function setPreco(float $preco){ 
        $this->preco = $preco; }

    public function getImg(){ 
        return $this->img; }
    public function setImg(?string $img){ 
        $this->img = $img; }

    public function getMarca(){ 
        return $this->marca; }
    public function setMarca(?string $marca){
        $this->marca = $marca; 
    }
    
    // ---------------------------
    // 🌱 RELACIONAMENTO COM NUTRIENTES
    // ---------------------------

    /**
     * @return Nutrientes[]
     */
    public function getNutrientes(): array
    {
        return $this->nutrientes;
    }

    /**
     * @param Nutrientes $nutriente
     */
    public function addNutriente(Nutrientes $nutriente)
    {
        $this->nutrientes[] = $nutriente;
    }

    /**
     * Remove nutriente pelo ID.
     */
    public function removeNutriente(int $nutrienteId): void
    {
        foreach ($this->nutrientes as $key => $nutriente) {
            if ($nutriente->getId() === $nutrienteId) {
                unset($this->nutrientes[$key]);
                break;
            }
        }

        // Reorganiza o array
        $this->nutrientes = array_values($this->nutrientes);
    }

    public function clearNutrientes(): void
    {
        $this->nutrientes = [];
    }
}

