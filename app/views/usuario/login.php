<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="/public/css/style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 400px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }
    input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background: #333;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background: #555;
    }
    .links {
      text-align: center;
      margin-top: 15px;
    }
    .links a {
      color: #333;
      text-decoration: none;
      margin: 0 10px;
    }
    .links a:hover {
      text-decoration: underline;
    }

  .navbar {
    background: #333;
    color: #fff;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .navbar .logo a {
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
  }
  .nav-links {
    list-style: none;
    display: flex;
    gap: 15px;
    margin: 0;
    padding: 0;
  }
  .nav-links li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s;
  }
  .nav-links li a:hover {
    color: #ddd;
  }
  </style>
</head>
<body>
  <nav class="navbar">
  <div class="logo">
    <a href="index.php?controller=tela&action=home">SuplementosFácil</a>
  </div>
  <ul class="nav-links">
    <li><a href="index.php?controller=tela&action=home">Home</a></li>
    <li><a href="index.php?controller=suplemento&action=listar">Admin</a></li>
    <li><a href="index.php?controller=usuario&action=login">Login</a></li>
    <li><a href="index.php?controller=usuario&action=cadastro">Registrar</a></li>
  </ul>
</nav>

  <div class="container">
    <h2>Login</h2>
    <form action="index.php?controller=usuario&action=autenticar" method="POST">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" required>

      <button type="submit">Entrar</button>
    </form>

    <div class="links">
      <a href="index.php?controller=usuario&action=cadastro">Não tem conta? Cadastre-se</a>
    </div>
  </div>
</body>
</html>