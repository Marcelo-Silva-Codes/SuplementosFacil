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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      flex: 1;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
      color: #333;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
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
      font-weight: bold;
      transition: background 0.3s;
    }
    button:hover {
      background: #555;
    }

    .links {
      text-align: center;
      margin-top: 15px;
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

    footer {
      text-align: center;
      padding: 15px;
      background: #333;
      color: #fff;
      font-size: 14px;
    }

    /* 📱 Responsividade */
    @media (max-width: 600px) {
      .container {
        margin: 20px;
        padding: 20px;
      }
      input {
        font-size: 14px;
        padding: 7px;
      }
      button {
        font-size: 14px;
        padding: 9px;
      }
    }
  </style>
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

  <script>
    // Validação extra em JS
    document.getElementById("formLogin").addEventListener("submit", function(e) {
      const email = document.getElementById("email").value.trim();
      const senha = document.getElementById("senha").value.trim();
      let mensagens = [];

      if (!email.includes("@") || !email.includes(".")) {
        mensagens.push("Informe um email válido.");
      }
      if (senha.length < 6) {
        mensagens.push("A senha deve ter pelo menos 6 caracteres.");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });
  </script>
</body>
</html>