<?php
// editar.php — formulário de edição de usuário
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Editar Usuário</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    /* Navbar */
    .navbar {
      background: #333;
      color: #fff;
      padding: 12px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navbar .logo {
      font-size: 20px;
      font-weight: bold;
    }
    .navbar .logo a {
      color: #fff;
      text-decoration: none;
    }
    .navbar .logout a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }
    .navbar .logout a:hover {
      color: #ddd;
    }

    /* Container */
    .container {
      max-width: 500px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-top: 12px;
      font-weight: bold;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: background 0.3s;
    }
    button:hover {
      background: #0056b3;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <a href="index.php?controller=tela&action=home">Painel ADM</a>
    </div>
    <div class="logout">
      <a href="index.php?controller=usuario&action=logout">Sair</a>
    </div>
  </nav>

  <div class="container">
    <h2>Editar Usuário</h2>
    <form action="index.php?controller=usuario&action=atualizar" method="POST">
      <!-- Campo oculto para enviar o ID -->
      <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()); ?>">

      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario->getNome()); ?>" required>

      <label for="sobrenome">Sobrenome:</label>
      <input type="text" name="sobrenome" id="sobrenome" value="<?= htmlspecialchars($usuario->getSobrenome()); ?>" required>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario->getEmail()); ?>" required>

      <label for="telefone">Telefone:</label>
      <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($usuario->getTelefone()); ?>">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" value="<?= htmlspecialchars($usuario->getSenha()); ?>" required>

      <button type="submit">Salvar alterações</button>
    </form>

    <a href="index.php?controller=usuario&action=listar" class="back-link">Voltar à lista de usuários</a>
  </div>
</body>
</html>