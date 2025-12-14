<?php
// app/views/nutrientes/editar.php
// Supondo que $nutriente (objeto Nutriente) foi definido pelo controller antes de incluir esta view
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Editar Nutriente</title>
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

    .container {
      max-width: 600px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      flex: 1;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    form label {
      display: block;
      font-weight: bold;
      margin-bottom: 6px;
      color: #444;
    }

    form input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 18px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    form input[type="text"]:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0,123,255,0.4);
      outline: none;
    }

    button {
      background: #007bff;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 15px;
      transition: background 0.3s;
      width: 100%;
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
      form input[type="text"] {
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

  <!-- Navbar ADM -->
  <nav class="navbar">
    <div class="logo">Painel ADM</div>
    <div class="logout">
      <a href="index.php?controller=usuario&action=logout">Sair</a>
    </div>
  </nav>

  <div class="container">
    <h1>Editar Nutriente: <?= htmlspecialchars($nutriente->getNome()) ?></h1>

    <form id="formEditarNutriente" action="index.php?controller=nutriente&action=atualizar" method="POST">
      <input type="hidden" name="id" value="<?= $nutriente->getId() ?>">

      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nutriente->getNome()) ?>" required minlength="3">

      <label for="tipo">Tipo / Categoria do nutriente (opcional):</label>
      <input type="text" id="tipo" name="tipo" value="<?= htmlspecialchars($nutriente->getTipo()) ?>">

      <button type="submit">Salvar Alterações</button>
    </form>

    <a href="index.php?controller=nutriente&action=listar" class="back-link">Voltar à lista de nutrientes</a>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>

  <script>
    // Validação extra em JS
    document.getElementById("formEditarNutriente").addEventListener("submit", function(e) {
      const nome = document.getElementById("nome").value.trim();
      const tipo = document.getElementById("tipo").value.trim();
      let mensagens = [];

      if (nome.length < 3) {
        mensagens.push("O nome do nutriente deve ter pelo menos 3 caracteres.");
      }
      if (tipo.length > 0 && tipo.length < 2) {
        mensagens.push("Se informado, o campo Tipo deve ter pelo menos 2 caracteres.");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });
  </script>
</body>
</html>

