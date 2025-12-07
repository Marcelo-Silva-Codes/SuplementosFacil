<?php

class Suplemento
{
    private int $id;
    private string $nome;
    private int $quantidadeProduto;
    private int $categoriaId;
    private string $formaApresentacao;
    private int $formaId;
    private ?string $descricao;
    private float $preco;
    private ?string $img;
    private ?string $marca;

    // flags de restrição alimentar
    private bool $vegano     = false;
    private bool $gluten = false;
    private bool $lactose = false;
  

    // Getters e Setters


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
    
    public function getFormaApresentacao(){ 
        return $this->formaApresentacao; }
    
    public function setFormaApresentacao(string $formaApresentacao){ 
        $this->formaApresentacao = $formaApresentacao; }

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

    public function getvegano() {
        return $this->vegano;
    }
    public function setvegano(bool $vegano) {
        $this->vegano = $vegano;
    }
    public function getgluten() {
        return $this->gluten;
    }
    public function setgluten(bool $gluten) {
        $this->gluten = $gluten;
    }
    public function getlactose() {
        return $this->lactose;
    }
    public function setlactose(bool $lactose) {
        $this->lactose = $lactose;
    }
    
}

