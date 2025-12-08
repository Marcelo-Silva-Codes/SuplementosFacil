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
    // Vai carregar os suplementos como objetos Suplemento
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
    $s->setQuantidadeTotal($_POST['quantidade_total']);
    $s->setCategoriaId((int)$_POST['categoria_id']);
    $s->setFormaApresentacao($_POST['forma_apresentacao']);
    $s->setQuantidadeTotalUM($_POST['quantidade_total_UM']);
    $s->setQuantidadePorPorcao($_POST['quantidade_por_porcao']);
    $s->setQuantidadePorPorcaoUM($_POST['quantidade_por_porcao_UM']);
    $s->setCalorias($_POST['calorias']);
    $s->setSabor($_POST['sabor']);
    $s->setPreco((float) $_POST['preco']);
    $s->setMarca($_POST['marca'] ?? null);
    $s->setImg($_POST['img'] ?? null);

    // flags booleanas
    $s->setVegano(   isset($_POST['vegano'])   ? true : false);
    $s->setGluten(  isset($_POST['gluten'])  ? true : false);
    $s->setLactose( isset($_POST['lactose']) ? true : false);

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
    $s->setId((int) $_POST['id']);
    $s->setNome($_POST['nome']);
    $s->setQuantidadeTotal($_POST['quantidade_total']);
    $s->setQuantidadeTotalUM($_POST['quantidade_total_UM']);
    $s->setQuantidadePorPorcao($_POST['quantidade_por_porcao']);
    $s->setQuantidadePorPorcaoUM($_POST['quantidade_por_porcao_UM']);
    $s->setCalorias($_POST['calorias']);
    $s->setSabor($_POST['sabor']);
    $s->setCategoriaId((int)$_POST['categoria_id']);
    $s->setFormaApresentacao($_POST['forma_apresentacao']);
    $s->setPreco((float) $_POST['preco']);
    $s->setMarca($_POST['marca'] ?? null);
    $s->setImg($_POST['img'] ?? null);

    // flags booleanas
    $s->setVegano(   isset($_POST['vegano'])   ? true : false);
    $s->setGluten(  isset($_POST['gluten'])  ? true : false);
    $s->setLactose( isset($_POST['lactose']) ? true : false);

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
