<?php
// cadastro.php — formulário de cadastro de usuários
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Cadastro de Usuário</title>
  <link rel="stylesheet" href="public/css/usuario/cadastro.css">
  <script src="public/js/usuario/cadastro.js" defer></script>
  
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <a href="index.php?controller=tela&action=home">SuplementosFacil</a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php?controller=usuario&action=login">Login</a></li>
      <li><a href="index.php?controller=usuario&action=cadastrarForm">Registrar</a></li>
    </ul>
  </nav>

  <div class="container">
    <h2>Cadastro de Usuário</h2>
    <form id="formUsuario" action="index.php?controller=usuario&action=criar" method="POST">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" required minlength="2">

      <label for="sobrenome">Sobrenome:</label>
      <input type="text" name="sobrenome" id="sobrenome" required minlength="2">

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="telefone">Telefone:</label>
      <input type="text" name="telefone" id="telefone" pattern="[0-9]{8,15}" placeholder="Somente números">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" required minlength="6">

      <button type="submit">Cadastrar</button>
    </form>

    <div class="links">
      <a href="index.php?controller=usuario&action=login">Já tem conta? Login</a>
      <a href="index.php?controller=usuario&action=cadastro">Limpar</a>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>