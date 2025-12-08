<?php
require_once __DIR__ . '/../dao/CategoriaDAO.php';
require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController {
    private $dao;

    public function __construct(){
        $this->dao = new CategoriaDAO();
    }

    public function listar(){
        $lista = $this->dao->listarTodos();
        require __DIR__ . '/../views/categorias/listar.php';
    }

    public function cadastrarForm(){
        require __DIR__ . '/../views/categorias/cadastrar.php';
    }

    public function cadastrar(){
        $c = new Categoria();
        $c->setNome($_POST['nome']);
        $this->dao->inserir($c);
        header("Location: index.php?controller=categoria&action=listar");
        exit;
    }

    public function editarForm()
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            die("Categoria inválida.");
        }
        $categoria = $this->dao->buscarPorId($id);
        if (!$categoria) {
            die("Categoria não encontrada.");
        }
        require __DIR__ . '/../views/categorias/editar.php';
    }

    public function atualizar()
    {
        $c = new Categoria();
        $c->setId((int) $_POST['id']);
        $c->setNome($_POST['nome']);
        $this->dao->atualizar($c);
        header("Location: index.php?controller=categoria&action=listar");
        exit;
    }

    public function deletar()
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->dao->deletar($id);
        }
        header("Location: index.php?controller=categoria&action=listar");
        exit;
    }
}
