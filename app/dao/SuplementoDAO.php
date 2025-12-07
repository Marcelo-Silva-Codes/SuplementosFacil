<?php

require_once __DIR__ . '/../../config/banco.php';
require_once __DIR__ . '/../models/Suplemento.php';

class SuplementosDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = getConnection();
    }

    // -------------------------------
    //  INSERIR SUPLEMENTO
    // -------------------------------
    public function inserir(Suplemento $s)
    {
        $sql = "INSERT INTO suplemento 
                (nome, quantidade_produto, categoria_id, forma_apresentacao, descricao, preco, img, marca)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            $s->getNome(),
            $s->getQuantidadeProduto(),
            $s->getCategoriaId(),
            $s->getFormaApresentacao(),
            $s->getDescricao(),
            $s->getPreco(),
            $s->getImg(),
            $s->getMarca()
        ]);
    }

    // -------------------------------
    //  BUSCAR POR ID
    // -------------------------------
    public function buscarPorId(int $id)
    {
        $sql = "SELECT * FROM suplemento WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        $s = new Suplemento();
        $s->setId($row['id']);
        $s->setNome($row['nome']);
        $s->setQuantidadeProduto($row['quantidade_produto']);
        $s->setCategoriaId($row['categoria_id']);
        $s->setFormaApresentacao($row['forma_apresentacao']);
        $s->setDescricao($row['descricao']);
        $s->setPreco($row['preco']);
        $s->setImg($row['img']);
        $s->setMarca($row['marca']);

        return $s;
    }

    // -------------------------------
    //  LISTAR TODOS
    // -------------------------------
    public function listarTodos()
    {
        $sql = "SELECT * FROM suplemento ORDER BY nome ASC";

        $stmt = $this->conexao->query($sql);

        $suplementos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $s = new Suplemento();
            $s->setId($row['id']);
            $s->setNome($row['nome']);
            $s->setQuantidadeProduto($row['quantidade_produto']);
            $s->setCategoriaId($row['categoria_id']);
            $s->setFormaApresentacao($row['forma_apresentacao']);
            $s->setDescricao($row['descricao']);
            $s->setPreco($row['preco']);
            $s->setImg($row['img']);
            $s->setMarca($row['marca']);

            $suplementos[] = $s;
        }

        return $suplementos;
    }

    // -------------------------------
    //  ATUALIZAR
    // -------------------------------
    public function atualizar(Suplemento $s)
    {
        $sql = "UPDATE suplemento
                SET nome = ?, quantidade_produto = ?, categoria_id = ?, forma_apresentacao = ?, 
                    descricao = ?, preco = ?, img = ?, marca = ?
                WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            $s->getNome(),
            $s->getQuantidadeProduto(),
            $s->getCategoriaId(),
            $s->getFormaApresentacao(),
            $s->getDescricao(),
            $s->getPreco(),
            $s->getImg(),
            $s->getMarca(),
            $s->getId()
        ]);
    }

    // -------------------------------
    //  DELETAR
    // -------------------------------
    public function deletar(int $id)
    {
        $sql = "DELETE FROM suplemento WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }
}
