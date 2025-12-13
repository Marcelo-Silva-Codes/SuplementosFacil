<?php

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../../config/banco.php';

class UsuarioDAO {
    private $conexao;

    public function __construct() {
        $this->conexao = getConnection(); // usa a função do config/database.php
    }

    // Inserir novo usuário
    public function inserir(Usuario $usuario) {
        $sql = "INSERT INTO usuario (nome, sobrenome, email, telefone, senha) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $usuario->getNome(),
            $usuario->getSobrenome(),
            $usuario->getEmail(),
            $usuario->getTelefone(),
            $usuario->getSenha()
        ]);
    }

    // Listar todos os usuários
    public function listar() {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Usuario');
    }

    // Buscar usuário por ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchObject('Usuario');
    }

    // Atualizar usuário
    public function atualizar(Usuario $usuario) {
        $sql = "UPDATE usuario 
                   SET nome = ?, sobrenome = ?, email = ?, telefone = ?, senha = ?, papel = ?
                 WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([
            $usuario->getNome(),
            $usuario->getSobrenome(),
            $usuario->getEmail(),
            $usuario->getTelefone(),
            $usuario->getSenha(),
            $usuario->getId()
        ]);
    }

    // Excluir usuário
    public function excluir($id) {
        $sql = "DELETE FROM usuario WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
    }

    public function buscarPorEmail($email) {
    $sql = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $usuario = new Usuario();
        $usuario->setId($row['id']);
        $usuario->setNome($row['nome']);
        $usuario->setSobrenome($row['sobrenome']);
        $usuario->setEmail($row['email']);
        $usuario->setTelefone($row['telefone']);
        $usuario->setSenha($row['senha']);
        return $usuario;
    }
    return null;
}

}