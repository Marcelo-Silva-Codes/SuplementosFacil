<?php

class Suplemento
{
    private int $id;
    private string $nome;
    private int $quantidadeTotal;
    private string $quantidade_total_UM;
    private int $categoriaId;
    private string $formaApresentacao;
    private string $quantidade_por_porcao;
    private string $quantidade_por_porcao_UM;
    private String $calorias;
    private ?string $descricao;
    private string $sabor;
    private float $preco;
    private ?string $img;
    private ?string $marca;

    // flags de restrição alimentar
    private bool $vegano = false;
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

    public function getquantidadeTotal(){
        return $this->quantidadeTotal; 
    }
    public function setquantidadeTotal(int $qtd){ 
        $this->quantidadeTotal = $qtd; 
    }
    public function getquantidade_total_UM(){ 
        return $this->quantidade_total_UM; 
    }
    public function setquantidade_total_UM(string $um){ 
        $this->quantidade_total_UM = $um; 
    }
    public function getquantidade_por_porcao(){
        return $this->quantidade_por_porcao; 
    }
    public function setquantidade_por_porcao(string $qtd){ 
        $this->quantidade_por_porcao = $qtd; 
    }
    public function getquantidade_por_porcao_UM(){ 
        return $this->quantidade_por_porcao_UM; 
    }
    public function setquantidade_por_porcao_UM(string $um){ 
        $this->quantidade_por_porcao_UM = $um; 
    }
    public function getcalorias(){ 
        return $this->calorias; 
    }
    public function setcalorias(string $calorias){ 
        $this->calorias = $calorias; 
    }

    public function getSabor(){ 
        return $this->sabor; 
    }
    public function setSabor(string $sabor){ 
        $this->sabor = $sabor; 
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

