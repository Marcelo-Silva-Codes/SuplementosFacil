<?php

class FormaApresentacao
{
    private int $id;
    private string $nome;
    private ?string $dose;

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

    public function getDose(){ 
        return $this->dose; 
    }
    
    public function setDose(?string $dose){ 
        $this->dose = $dose; 
    }
}