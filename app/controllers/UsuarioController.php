<?php
require_once __DIR__ . '/../dao/UsuarioDAO.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $usuarioDao;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->usuarioDao = new UsuarioDAO();


    }

    // 🔒 método privado para proteger rotas
    private function proteger() {
        if (empty($_SESSION['usuario_id'])) {
            header("Location: index.php?controller=usuario&action=login");
            exit;
        }
    }

    public function login() {
        require_once __DIR__ . '/../views/usuario/login.php';
    }

    public function cadastrarForm() {
        require_once __DIR__ . '/../views/usuario/cadastro.php';
    }

   public function autenticar() {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = $this->usuarioDao->buscarPorEmail($email);

    if ($usuario && password_verify($senha, $usuario->getSenha())) {
        $_SESSION['usuario_id']   = $usuario->getId();
        $_SESSION['usuario_nome'] = $usuario->getNome();
        header("Location: index.php?controller=suplemento&action=listar");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos";
        require_once __DIR__ . '/../views/usuario/login.php';
    }
}



    public function logout() {
        session_destroy();
        header("Location: index.php?controller=usuario&action=login");
    }

    public function listar() {
        $this->proteger(); // protege a rota
        $usuarios = $this->usuarioDao->listar();
        require_once __DIR__ . '/../views/usuario/listar.php';
    }


    public function criar() {
    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setSobrenome($_POST['sobrenome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setTelefone($_POST['telefone']);

    // Criptografa a senha antes de salvar
    $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $usuario->setSenha($hash);

    $this->usuarioDao->inserir($usuario);

    header("Location: index.php?controller=usuario&action=login");
    exit;
}


    public function editar($id) {
        $this->proteger();
        $usuario = $this->usuarioDao->buscarPorId($id);
        require_once __DIR__ . '/../views/usuario/editar.php';
    }

    public function atualizar() {
        $this->proteger();
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setSobrenome($_POST['sobrenome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->setSenha($_POST['senha']);

        $this->usuarioDao->atualizar($usuario);
        header("Location: index.php?controller=usuario&action=listar");
    }

    public function excluir($id) {
        $this->proteger();
        $this->usuarioDao->excluir($id);
        header("Location: index.php?controller=usuario&action=listar");
    }
}