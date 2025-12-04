<?php

class RestricaoAlimentar
{
    private int $id;
    private int $vegetariano;
    private int $vegano;
    private int $lactose;
    private int $gluten;


    public function getId(){
         return $this->id; 
        }

    public function setId(int $id){
         $this->id = $id; 
        }

    public function getVegetariano() { 
        return $this->vegetariano; }
    
    public function setVegetariano(int $v){ 
        $this->vegetariano = $v; }

    public function getVegano(){ 
        return $this->vegano; }
    
    public function setVegano(int $v){ 
        $this->vegano = $v; }

    public function getLactose(){ 
        return $this->lactose; }
    
    public function setLactose(int $l){ 
        $this->lactose = $l; }

    public function getGluten(){ 
        return $this->gluten; }
    
    public function setGluten(int $g){
         $this->gluten = $g; }
}
