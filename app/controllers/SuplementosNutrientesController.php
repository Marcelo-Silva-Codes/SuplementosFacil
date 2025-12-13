<?php
require_once __DIR__ . '/../dao/SuplementoNutrienteDAO.php';

class SuplementosNutrientesController {
    private $suplementoNutrienteDao;

    public function __construct() {
        $this->suplementoNutrienteDao = new SuplementoNutrienteDAO();
    }

    public function listarPorSuplemento($suplementoId) {
        return $this->suplementoNutrienteDao->buscarNutrientesPorSuplemento($suplementoId);
    }
}