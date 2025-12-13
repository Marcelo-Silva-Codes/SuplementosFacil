<?php
require_once __DIR__ . '/../dao/SuplementoDAO.php';
require_once __DIR__ . '/../dao/CategoriaDAO.php';
require_once __DIR__ . '/../models/Suplemento.php';
require_once __DIR__ . '/SuplementosNutrientesController.php';
require_once __DIR__ . '/../dao/NutrienteDAO.php';
require_once __DIR__ . '/../dao/SuplementoNutrienteDAO.php';


class SuplementoController
{
    private $dao;
    private $suplementoNutrienteDao;
    private $nutrienteDao;

    public function __construct()
    {
        $this->dao = new SuplementoDAO();
        $this->suplementoNutrienteDao = new SuplementoNutrienteDAO();
        $this->nutrienteDao = new NutrienteDAO();
    }

 
public function listar() {
    $this->protegerPainel();
    $lista = $this->dao->listarTodos();
    $snController = new SuplementosNutrientesController();

    foreach ($lista as $s) {
        $s->setNutrientes($snController->listarPorSuplemento($s->getId()));
    }

    require 'app/views/suplementos/listar.php';
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
    $s->setLink($_POST['link'] ?? null);
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
         $nutrientes = $this->nutrienteDao->listarTodos();
    $nutrientesSupl = $this->suplementoNutrienteDao->buscarNutrientesPorSuplemento($id);
    $supl->setNutrientes($nutrientesSupl);

        $categoriaDao = new CategoriaDAO(); //precisa para listar categorias no select
        $categorias = $categoriaDao->listarTodos();
        if (!$supl) {
            die("Suplemento não encontrado.");

            if (!empty($categorias)) {
                die("Categorias não encontradas.");
            }
        }
        require __DIR__ . '/../views/suplementos/editar.php';
    }

    public function atualizar()
{
    $id = $_POST['id'];
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
    $s->setLink($_POST['link'] ?? null);
    $s->setVegano(   isset($_POST['vegano'])   ? true : false);
    $s->setGluten(  isset($_POST['gluten'])  ? true : false);
    $s->setLactose( isset($_POST['lactose']) ? true : false);



    $this->dao->atualizar($s);
$this->suplementoNutrienteDao->removerTodosPorSuplemento($id);
if (!empty($_POST['nutrientes'])) {
        foreach ($_POST['nutrientes'] as $nutrienteId) {
            $qtd = $_POST['qtd_'.$nutrienteId] ?? null;
            $un  = $_POST['un_'.$nutrienteId] ?? null;
            $this->suplementoNutrienteDao->vincular($id, $nutrienteId, $qtd, $un);
        }
    }



        header("Location: index.php?controller=suplemento&action=listar");
        exit;
    }

    public function deletar()
    {
        $id = $_GET['id'];
        $this->dao->deletar($id);
        header("Location: index.php?controller=suplemento&action=listar");
        exit;
    }
private function protegerPainel() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['usuario_id'])) {
        header("Location: index.php?controller=usuario&action=login");
        exit;
    }
}


}