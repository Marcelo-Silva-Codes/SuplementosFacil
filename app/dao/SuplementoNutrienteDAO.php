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

   public function buscarNutrientesPorSuplemento(int $supId): array
{
    $sql = "
      SELECT n.nome AS nutriente_nome, sn.quantidade, sn.unidade_medida
      FROM suplemento_nutriente sn
      JOIN nutriente n ON (n.id = sn.nutriente_id)
      WHERE sn.suplemento_id = ?
    ";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([$supId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

 public function listarTodasRelacoes(): array
    {
        $sql = "
          SELECT sn.suplemento_id, sn.nutriente_id,
                 n.nome AS nutriente_nome,
                 sn.quantidade,
                 sn.unidade_medida
          FROM suplemento_nutriente sn
          JOIN nutriente n ON (n.id = sn.nutriente_id)
          ORDER BY sn.suplemento_id
        ";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
