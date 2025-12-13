
<?php
require_once __DIR__ . '/../dao/SuplementoDAO.php';
require_once __DIR__ . '/../dao/CategoriaDAO.php';
require_once __DIR__ . '/../models/Suplemento.php';
require_once __DIR__ . '/../dao/NutrienteDAO.php';

class TelaController {
    private $suplementoDao;
    private $categoriaDao;
    private $nutrienteDao;

    public function __construct() {
        $this->suplementoDao = new SuplementoDAO();
        $this->categoriaDao = new CategoriaDAO();
        $this->nutrienteDao = new NutrienteDAO();
    }
    public function home() {
        $lista = $this->suplementoDao->listarTodos();
        $categorias = $this->categoriaDao->listarTodos();
        require_once __DIR__ . '/../views/tela/home.php';
        
    }

    public function adicionarComparador() {
    $id = $_POST['id'] ?? null;
    if ($id) {
        if (!isset($_SESSION['comparador'])) {
            $_SESSION['comparador'] = [];
        }
        // Evita duplicados
        if (!in_array($id, $_SESSION['comparador'])) {
            $_SESSION['comparador'][] = $id;
        }
    }
    header("Location: index.php?controller=suplemento&action=home");
}

public function removerComparador() {
        $id = $_POST['id'] ?? null;
        if ($id && isset($_SESSION['comparador'])) {
            $_SESSION['comparador'] = array_values(
                array_filter($_SESSION['comparador'], fn($x) => $x != $id)
            );
        }
        header("Location: index.php?controller=suplemento&action=home");
    }

    public function limparComparador() {
        unset($_SESSION['comparador']);
        header("Location: index.php?controller=suplemento&action=home");
    }


public function comparar() {
    $ids = isset($_GET['ids']) ? explode(",", $_GET['ids']) : [];
    $suplementosComparar = [];

    foreach ($ids as $id) {
        $s = $this->suplementoDao->buscarPorId((int)$id);
        if ($s) {
            $suplementosComparar[] = $s;
        }
    }

    // Passa para a view
    require 'app/views/tela/comparar.php';
}
}