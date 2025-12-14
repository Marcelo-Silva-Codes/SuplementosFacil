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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
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
      flex: 1;
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
      font-size: 15px;
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
        padding: 8px;
      }
      button {
        font-size: 14px;
        padding: 10px;
      }
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
    <form id="formEditarUsuario" action="index.php?controller=usuario&action=atualizar" method="POST">
      <!-- Campo oculto para enviar o ID -->
      <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()); ?>">

      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario->getNome()); ?>" required minlength="2">

      <label for="sobrenome">Sobrenome:</label>
      <input type="text" name="sobrenome" id="sobrenome" value="<?= htmlspecialchars($usuario->getSobrenome()); ?>" required minlength="2">

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario->getEmail()); ?>" required>

      <label for="telefone">Telefone:</label>
      <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($usuario->getTelefone()); ?>" pattern="[0-9]{8,15}" placeholder="Somente números">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" value="<?= htmlspecialchars($usuario->getSenha()); ?>" required minlength="6">

      <button type="submit">Salvar alterações</button>
    </form>

    <a href="index.php?controller=usuario&action=listar" class="back-link">Voltar à lista de usuários</a>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>

  <script>
    // Validação extra em JS
    document.getElementById("formEditarUsuario").addEventListener("submit", function(e) {
      const nome = document.getElementById("nome").value.trim();
      const sobrenome = document.getElementById("sobrenome").value.trim();
      const email = document.getElementById("email").value.trim();
      const senha = document.getElementById("senha").value.trim();
      const telefone = document.getElementById("telefone").value.trim();

      let mensagens = [];

      if (nome.length < 2) {
        mensagens.push("O nome deve ter pelo menos 2 caracteres.");
      }
      if (sobrenome.length < 2) {
        mensagens.push("O sobrenome deve ter pelo menos 2 caracteres.");
      }
      if (!email.includes("@") || !email.includes(".")) {
        mensagens.push("Informe um email válido.");
      }
      if (senha.length < 6) {
        mensagens.push("A senha deve ter pelo menos 6 caracteres.");
      }
      if (telefone && !/^[0-9]{8,15}$/.test(telefone)) {
        mensagens.push("Telefone deve conter apenas números (8 a 15 dígitos).");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });
  </script>
</body>
</html>