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
                (nome, quantidade_total, categoria_id, forma_apresentacao, quantidade_por_porcao, quantidade_total_UM , quantidade_por_porcao_UM, descricao, calorias, ,sabor ,preco, img, marca, vegano, gluten, lactose)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            $s->getNome(),
            $s->getquantidadeTotal(),
            $s->getCategoriaId(),
            $s->getFormaApresentacao(),
            $s->getDescricao(),
            $s->getquantidade_total_UM(),
            $s->getquantidade_por_porcao(),
            $s->getquantidade_por_porcao_UM(),
            $s->getCalorias(),
            $s->getSabor(),
            $s->getPreco(),
            $s->getImg(),
            $s->getMarca(),
            $s->getvegano(),
            $s->getgluten(),
            $s->getlactose()
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
        $s->setquantidadeTotal($row['quantidade_total']);
        $s->setquantidade_total_UM($row['quantidade_total_UM']);
        $s->setquantidade_por_porcao($row['quantidade_por_porcao']);
        $s->setquantidade_por_porcao_UM($row['quantidade_por_porcao_UM']);
        $s->setcalorias($row['calorias']);
        $s->setSabor($row['sabor']);
        $s->setCategoriaId($row['categoria_id']);
        $s->setFormaApresentacao($row['forma_apresentacao']);
        $s->setDescricao($row['descricao']);
        $s->setPreco($row['preco']);
        $s->setImg($row['img']);
        $s->setMarca($row['marca']);
        $s->setvegano($row['vegano']);
        $s->setgluten($row['gluten']);
        $s->setlactose($row['lactose']);

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
            $s->setquantidadeTotal($row['quantidade_total']);
            $s->setquantidade_total_UM($row['quantidade_total_UM']);
            $s->setquantidade_por_porcao($row['quantidade_por_porcao']);
            $s->setquantidade_por_porcao_UM($row['quantidade_por_porcao_UM']);
            $s->setcalorias($row['calorias']);
            $s->setSabor($row['sabor']);
            $s->setCategoriaId($row['categoria_id']);
            $s->setFormaApresentacao($row['forma_apresentacao']);
            $s->setDescricao($row['descricao']);
            $s->setPreco($row['preco']);
            $s->setImg($row['img']);
            $s->setMarca($row['marca']);
            $s->setvegano($row['vegano']);
            $s->setgluten($row['gluten']);
            $s->setlactose($row['lactose']);

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
                SET nome = ?, quantidade_total = ?, quantidade_total_UM = ? , quantidade_por_porcao = ?, quantidade_por_porcao_UM = ? , calorias = ?, sabor = ?,
                categoria_id = ?, forma_apresentacao = ?, 
                    descricao = ?, preco = ?, img = ?, marca = ?, vegano = ?, gluten = ?, lactose = ? 
                WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->execute([
            $s->getNome(),
            $s->getquantidadeTotal(),
            $s->getquantidade_total_UM(),
            $s->getquantidade_por_porcao(),
            $s->getquantidade_por_porcao_UM(),
            $s->getCalorias(),
            $s->getSabor(),
            $s->getCategoriaId(),
            $s->getFormaApresentacao(),
            $s->getDescricao(),
            $s->getPreco(),
            $s->getImg(),
            $s->getMarca(),
            $s->getId(),
            $s->getvegano(),
            $s->getgluten(),
            $s->getlactose()
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
