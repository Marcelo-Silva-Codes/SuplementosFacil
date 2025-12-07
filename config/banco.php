<?php
function getConnection() {
    try {
        $conexao = new PDO("mysql:host=localhost;dbname=suplementosfacil", "root", "");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
}

?>