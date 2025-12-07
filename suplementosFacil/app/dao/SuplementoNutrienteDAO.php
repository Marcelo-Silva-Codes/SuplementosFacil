<?php

require_once __DIR__ . '/../models/SuplementoNutriente.php';
require_once __DIR__ . '/../../config/banco.php';

class SuplementoNutrienteDAO
{
    private $conexao;
    public function __construct() {
        $this->conexao = getConnection(); // usa a função do config/database.php
    }

    public function inserir(SuplementoNutriente $sn)
    {
        $sql = "INSERT INTO suplemento_nutriente 
                (suplemento_id, nutriente_id, quantidade, unidadeMedida)
               VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute ([
            $sn -> getSuplementoId(),
            $sn -> getNutrienteId(),
            $sn -> getQuantidade(),
            $sn -> getUnidadeMedida()
        ]);
    }

    public function buscarNutrientesPorSuplementos($suplementosId) {
        $sql = "SELECT * FROM suplemento_nutriente WHERE suplemento_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$suplementosId]);
        return $stmt->fetchObject('SuplementoNutriente');
    }

    public function buscarSuplementosPorNutriente($nutrienteId)
{
    $sql = "SELECT * 
            FROM suplemento_nutriente
            WHERE nutriente_id = ?";
    
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([$nutrienteId]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'SuplementoNutriente');
}


}
