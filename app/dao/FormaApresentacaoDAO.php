<?php

require_once __DIR__ . '/../config/banco.php';
require_once __DIR__ . '/../models/FormaApresentacao.php';

class FormaApresentacaoDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = getConnection();
    }

    public function inserir(FormaApresentacao $f)
    {
        $sql = "INSERT INTO forma_apresentacao (nome, dose) VALUES (?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $f->getNome(),
            $f->getDose()
        ]);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM forma_apresentacao ORDER BY nome ASC";
        $stmt = $this->conexao->query($sql);

        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $f = new FormaApresentacao();
            $f->setId($row['id']);
            $f->setNome($row['nome']);
            $f->setDose($row['dose']);

            $lista[] = $f;
        }

        return $lista;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM forma_apresentacao WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        $f = new FormaApresentacao();
        $f->setId($row['id']);
        $f->setNome($row['nome']);
        $f->setDose($row['dose']);

        return $f;
    }

    public function atualizar(FormaApresentacao $f)
    {
        $sql = "UPDATE forma_apresentacao SET nome = ?, dose = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $f->getNome(),
            $f->getDose(),
            $f->getId()
        ]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM forma_apresentacao WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }
}
