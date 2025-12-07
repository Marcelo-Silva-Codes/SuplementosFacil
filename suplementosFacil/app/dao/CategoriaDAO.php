<?php

require_once __DIR__ . '/../config/banco.php';
require_once __DIR__ . '/../models/Categoria.php';

class CategoriasDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = getConnection();
    }

    public function inserir(Categoria $c)
    {
        $sql = "INSERT INTO categorias (nome) VALUES (?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$c->getNome()]);
    }

    public function listarTodos()
    {
        $sql = "SELECT * FROM categorias ORDER BY nome ASC";
        $stmt = $this->conexao->query($sql);

        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $c = new Categoria();
            $c->setId($row['id']);
            $c->setNome($row['nome']);
            $lista[] = $c;
        }

        return $lista;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        $c = new Categoria();
        $c->setId($row['id']);
        $c->setNome($row['nome']);

        return $c;
    }

    public function atualizar(Categoria $c)
    {
        $sql = "UPDATE categorias SET nome = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$c->getNome(), $c->getId()]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM categorias WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }
}
