<?php
require_once __DIR__ . '/../dao/SuplementoDAO.php';
require_once __DIR__ . '/../models/Suplemento.php';

class SuplementoController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new SuplementosDAO();
    }

    public function listar()
    {
        $lista = $this->dao->listarTodos();
        require __DIR__ . '/../views/suplementos/listar.php';
    }

    public function cadastrarForm()
    {
        require __DIR__ . '/../views/suplementos/cadastrar.php';
    }

    public function cadastrar()
    {
        $s = new Suplemento();
        $s->setNome($_POST['nome']);
        $s->setQuantidadeProduto($_POST['quantidade_produto']);
        $s->setCategoriaId($_POST['categoria_id']);
        $s->setFormaId($_POST['forma_id']);
        $s->setPreco($_POST['preco']);
        $s->setMarca($_POST['marca']);
        $s->setImg($_POST['img']);
        $s->setDescricao($_POST['descricao']);

        $this->dao->inserir($s);
        header("Location: index.php?c=suplemento&a=listar");
        exit;
    }

    public function editarForm()
    {
        $id = $_GET['id'];
        $supl = $this->dao->buscarPorId($id);
        if (!$supl) {
            die("Suplemento não encontrado.");
        }
        require __DIR__ . '/../views/suplementos/editar.php';
    }

    public function atualizar()
    {
        $s = new Suplemento();
        $s->setId($_POST['id']);
        $s->setNome($_POST['nome']);
        $s->setQuantidadeProduto($_POST['quantidade_produto']);
        $s->setCategoriaId($_POST['categoria_id']);
        $s->setFormaId($_POST['forma_id']);
        $s->setPreco($_POST['preco']);
        $s->setMarca($_POST['marca']);
        $s->setImg($_POST['img']);
        $s->setDescricao($_POST['descricao']);

        $this->dao->atualizar($s);
        header("Location: index.php?c=suplemento&a=listar");
        exit;
    }

    public function deletar()
    {
        $id = $_GET['id'];
        $this->dao->deletar($id);
        header("Location: index.php?c=suplemento&a=listar");
        exit;
    }
}
