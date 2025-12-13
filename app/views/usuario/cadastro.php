<?php
// cadastro.php — formulário de cadastro de usuários
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Cadastro de Usuário</title>
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

    .links {
      text-align: center;
      margin-top: 20px;
    }
    .links a {
      color: #007bff;
      text-decoration: none;
      margin: 0 10px;
      font-weight: bold;
    }
    .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
 <nav class="navbar">
    <div class="logo">Painel ADM</div>
    <div class="logout">
      <a href="index.php?controller=usuario&action=logout">Sair</a>
    </div>
  </nav>

  <div class="container">
    <h2>Cadastro de Usuário</h2>
    <form action="index.php?controller=usuario&action=criar" method="POST">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" required>

      <label for="sobrenome">Sobrenome:</label>
      <input type="text" name="sobrenome" id="sobrenome" required>

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="telefone">Telefone:</label>
      <input type="text" name="telefone" id="telefone">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" required>

      <button type="submit">Cadastrar</button>
    </form>

    <div class="links">
      <a href="index.php?controller=usuario&action=login">Já tem conta? Login</a>
      <a href="index.php?controller=usuario&action=cadastro">Limpar</a>
    </div>
  </div>
</body>
</html>