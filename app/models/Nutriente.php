<?php

class Nutriente
{
    private int $id;
    private string $nome;
    private string $tipo;

    public function getId(){ 
        return $this->id; 
    }
    
    public function setId(int $id){
         $this->id = $id; 
        }

    public function getNome(){
         return $this->nome; 
        }
    
    public function setNome(string $nome){ 
        $this->nome = $nome; 
    }

    public function getTipo(){ 
        return $this->tipo; 
    }
    
    public function setTipo(string $tipo){ 
        $this->tipo = $tipo; 
    }
}