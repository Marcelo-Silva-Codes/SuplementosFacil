<?php

require_once __DIR__ . '/../../config/banco.php';
require_once __DIR__ . '/../models/Nutriente.php';

class NutrienteDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = getConnection();
    }

    // Inserir nutriente
    public function inserir(Nutriente $n)
    {
        $sql = "INSERT INTO nutriente (nome, tipo) VALUES (?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $n->getNome(),
            $n->getTipo()
        ]);
    }

    // Buscar por ID
    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM nutriente WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        $n = new Nutriente();
        $n->setId($row['id']);
        $n->setNome($row['nome']);
        $n->setTipo($row['tipo']);

        return $n;
    }

    // Buscar por nome
    public function buscarPorNome($nome)
    {
        $sql = "SELECT * FROM nutriente WHERE nome LIKE ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(["%$nome%"]);

        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $n = new Nutriente();
            $n->setId($row['id']);
            $n->setNome($row['nome']);
            $n->setTipo($row['tipo']);

            $lista[] = $n;
        }

        return $lista;
    }

    // Listar todos
    public function listarTodos()
    {
        $sql = "SELECT * FROM nutriente ORDER BY nome ASC";
        $stmt = $this->conexao->query($sql);

        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $n = new Nutriente();
            $n->setId($row['id']);
            $n->setNome($row['nome']);
            $n->setTipo($row['tipo']);

            $lista[] = $n;
        }

        return $lista;
    }

    // Atualizar
    public function atualizar(Nutriente $n)
    {
        $sql = "UPDATE nutriente SET nome = ?, tipo = ? WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $n->getNome(),
            $n->getTipo(),
            $n->getId()
        ]);
    }

    // Deletar
    public function deletar($id)
    {
        $sql = "DELETE FROM nutriente WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }
}
