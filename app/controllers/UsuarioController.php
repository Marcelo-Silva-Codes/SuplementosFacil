<?php
require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../models/Usuario.php';


class UsuarioController {

      public function login() {
        require_once __DIR__ . '/../views/usuario/login.php';
    }

    public function autenticar() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $dao = new UsuarioDAO();
        $usuario = $dao->buscarPorEmailSenha($email, $senha);

        if ($usuario) {
            // Salva dados na sessão
            $_SESSION['usuario_id'] = $usuario->getId();
            $_SESSION['usuario_nome'] = $usuario->getNome();

            header("Location: index.php?controller=usuario&action=listar");
        } else {
            echo "Login inválido!";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=usuario&action=login");
    }

    public function listar() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }

        $dao = new UsuarioDAO();
        $usuarios = $dao->listar();
        require_once __DIR__ . '/../views/usuario/listar.php';
    }



    // Recebe os dados do formulário e insere no banco
    public function criar() {
      
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setSobrenome($_POST['sobrenome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setImg($_POST['img']);

        $dao = new UsuarioDAO();
        $dao->inserir($usuario);

        // Depois de cadastrar, redireciona para a lista de usuários
        header("Location: index.php?controller=usuario&action=listar");
    }


    // Editar usuário (carrega formulário com dados)
    public function editar($id) {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?controller=usuario&action=login");
        exit;
    }


        $dao = new UsuarioDAO();
        $usuario = $dao->buscarPorId($id);

        require_once __DIR__ . '/../views/usuario/editar.php';
    }

    // Atualiza usuário no banco
    public function atualizar() {
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setSobrenome($_POST['sobrenome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setImg($_POST['img']);

        $dao = new UsuarioDAO();
        $dao->atualizar($usuario);

        header("Location: index.php?controller=usuario&action=listar");
    }

    // Excluir usuário
    public function excluir($id) {
        if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?controller=usuario&action=login");
        exit;
    }


        $dao = new UsuarioDAO();
        $dao->excluir($id);

        header("Location: index.php?controller=usuario&action=listar");
    }

  public function cadastro() {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php?controller=usuario&action=login");
        exit;
    }

    require_once __DIR__ . '/../views/usuario/cadastro.php';
}


}