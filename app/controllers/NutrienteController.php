<?php
require_once __DIR__ . '/../dao/NutrienteDAO.php';
require_once __DIR__ . '/../models/Nutriente.php';

class NutrienteController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new NutrienteDAO();
    }

    public function listar()
    {
        $lista = $this->dao->listarTodos();
        require __DIR__ . '/../views/nutrientes/listar.php';
    }

    public function cadastrarForm()
    {
        require __DIR__ . '/../views/nutrientes/cadastrar.php';
    }

    public function cadastrar()
    {
        $n = new Nutriente();
        $n->setNome($_POST['nome']);
        $n->setTipo($_POST['tipo'] ?? null);
        $this->dao->inserir($n);
        header("Location: index.php?controller=nutriente&action=listar");
        exit;
    }

    public function editarForm()
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            die("Nutriente inválido.");
        }
        $nutriente = $this->dao->buscarPorId($id);
        if (!$nutriente) {
            die("Nutriente não encontrado.");
        }
        require __DIR__ . '/../views/nutrientes/editar.php';
    }

    public function atualizar()
    {
        $n = new Nutriente();
        $n->setId((int)$_POST['id']);
        $n->setNome($_POST['nome']);
        $n->setTipo($_POST['tipo'] ?? null);
        $this->dao->atualizar($n);
        header("Location: index.php?controller=nutriente&action=listar");
        exit;
    }

    public function deletar()
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->dao->deletar($id);
        }
        header("Location: index.php?controller=nutriente&action=listar");
        exit;
    }
}
