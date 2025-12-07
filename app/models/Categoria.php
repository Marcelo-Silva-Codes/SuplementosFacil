<?php
class Categoria
{
    private int $id;
    private string $nome;

   //getters e setters
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
}


?>