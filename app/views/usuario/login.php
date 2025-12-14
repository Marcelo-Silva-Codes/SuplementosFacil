<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="stylesheet" href="public/css/usuario/login.css">
  <script src="public/js/usuario/login.js" defer></script> 

</head>
<body>
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
    <h2>Login</h2>
    <form id="formLogin" action="index.php?controller=usuario&action=autenticar" method="POST">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" required minlength="6">

      <button type="submit">Entrar</button>
    </form>

    <div class="links">
      <a href="index.php?controller=usuario&action=cadastrarForm">Não tem conta? Cadastre-se</a>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil</p>
  </footer>
</body>
</html>