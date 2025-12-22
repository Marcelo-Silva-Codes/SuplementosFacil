<?php

require_once __DIR__ . '/../models/SuplementoNutriente.php';
require_once __DIR__ . '/../../config/banco.php';

class SuplementoNutrienteDAO
{
    private $conexao;

    public function __construct() {
        $this->conexao = getConnection(); 
    }


   public function buscarNutrientesPorSuplemento(int $supId): array
{
    $sql = "
      SELECT n.id as nutriente_id,
                   n.nome as nutriente_nome,
                   sn.quantidade,
                   sn.unidade_medida
            FROM suplemento_nutriente sn
            JOIN nutriente n ON n.id = sn.nutriente_id
            WHERE sn.suplemento_id = ?";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute([$supId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function vincular($suplementoId, $nutrienteId, $quantidade, $unidade) {
        $sql = "INSERT INTO suplemento_nutriente (suplemento_id, nutriente_id, quantidade, unidade_medida)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$suplementoId, $nutrienteId, $quantidade, $unidade]);
    }


 public function removerTodosPorSuplemento($Id) {
        $sql = "DELETE FROM suplemento_nutriente WHERE suplemento_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$Id]);
    }

}
