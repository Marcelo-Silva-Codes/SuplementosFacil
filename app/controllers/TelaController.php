<?php
require_once __DIR__ . '/../dao/SuplementoDAO.php';
require_once __DIR__ . '/../dao/CategoriaDAO.php';
require_once __DIR__ . '/../dao/NutrienteDAO.php';
require_once __DIR__ . '/../dao/SuplementoNutrienteDAO.php'; 
require_once __DIR__ . '/../models/Suplemento.php';

class TelaController
{
    private $suplementoDao;
    private $categoriaDao;
    private $nutrienteDao;
    private $suplementoNutrienteDao;

    public function __construct()
    {
        $this->suplementoDao        = new SuplementoDAO();
        $this->categoriaDao         = new CategoriaDAO();
        $this->nutrienteDao         = new NutrienteDAO();
        $this->suplementoNutrienteDao = new SuplementoNutrienteDAO();
    }

    public function home()
    {
        $lista = $this->suplementoDao->listarTodos();
        $categorias = $this->categoriaDao->listarTodos();
        require_once __DIR__ . '/../views/tela/home.php';
    }

    public function comparar()
    {
        $ids = isset($_GET['ids']) ? explode(",", $_GET['ids']) : [];
        $suplementosComparar = [];

        foreach ($ids as $id) {
            $s = $this->suplementoDao->buscarPorId((int)$id);
            if ($s) {
                // carrega vínculos N:N com JOIN para trazer nome do nutriente
                $rels = $this->suplementoNutrienteDao->buscarNutrientesPorSuplemento($s->getId());
                // injeta no objeto para a view consumir
                $s->setNutrientes($rels);
                $suplementosComparar[] = $s;
            }
        }
        // junta todos os nomes de nutrientes
        $allNutrientes = [];
        foreach ($suplementosComparar as $s) {
            foreach ($s->getNutrientes() as $n) {
                $allNutrientes[$n['nutriente_id']] = $n['nutriente_nome'];
            }
        }

        // Atenção ao caminho da view no seu projeto
        require_once __DIR__ . '/../views/tela/comparar.php';
    }
}