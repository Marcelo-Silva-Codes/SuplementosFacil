<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM</title>
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
    .navbar .logout a:hover { color: #ddd; }

    /* Container */
    .container {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    /* Accordion menu */
    .accordion {
      background: #007bff;
      color: #fff;
      cursor: pointer;
      padding: 14px;
      width: 100%;
      text-align: left;
      border: none;
      outline: none;
      font-size: 16px;
      border-radius: 4px;
      transition: background 0.3s;
      margin-bottom: 8px;
    }
    .accordion:hover {
      background: #0056b3;
    }

    .panel {
      padding: 0 18px;
      display: none;
      background-color: #f9f9f9;
      overflow: hidden;
      border-radius: 4px;
      margin-bottom: 12px;
    }
    .panel a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
    }
    .panel a:hover {
      background: #eef3f9;
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

  <!-- Conteúdo principal -->
  <div class="container">
    <h1>Bem-vindo ao Painel Administrativo</h1>

    <!-- Menu expansível -->
    <button class="accordion">📦 Suplementos</button>
    <div class="panel">
      <a href="index.php?controller=suplemento&action=listar">Listar Suplementos</a>
      <a href="index.php?controller=suplemento&action=cadastrarForm">Cadastrar Suplemento</a>
    </div>

    <button class="accordion">📂 Categorias</button>
    <div class="panel">
      <a href="index.php?controller=categoria&action=listar">Listar Categorias</a>
      <a href="index.php?controller=categoria&action=cadastrarForm">Cadastrar Categoria</a>
    </div>

    <button class="accordion">💊 Nutrientes</button>
    <div class="panel">
      <a href="index.php?controller=nutriente&action=listar">Listar Nutrientes</a>
      <a href="index.php?controller=nutriente&action=cadastrarForm">Cadastrar Nutriente</a>
    </div>
  </div>

  <script>
    // Script para abrir/fechar os menus
    const acc = document.getElementsByClassName("accordion");
    for (let i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
</body>
</html>