<?php
// listar categorias
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Categorias</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 900px;
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

    .new-link {
      display: inline-block;
      margin-bottom: 20px;
      background: #007bff;
      color: #fff;
      padding: 8px 14px;
      border-radius: 4px;
      text-decoration: none;
      font-size: 14px;
    }

    .new-link:hover {
      background: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background: #007bff;
      color: #fff;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }

    tr:nth-child(even) {
      background: #f9f9f9;
    }

    tr:hover {
      background: #f1f1f1;
    }

    .actions a {
      margin: 0 5px;
      text-decoration: none;
      font-weight: bold;
      color: #007bff;
    }

    .actions a:hover {
      text-decoration: underline;
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

    /* Hamburger menu */
    .hamburger-menu {
      position: relative;
      display: inline-block;
      margin: 20px;
    }
    .menu-icon {
      font-size: 26px;
      cursor: pointer;
      color: #333;
    }
    #menu-toggle { display: none; }
    .menu {
      display: none;
      position: absolute;
      top: 35px;
      left: 0;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 6px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      min-width: 180px;
      z-index: 1000;
    }
    .menu a {
      display: block;
      padding: 10px 20px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    .menu a:hover {
      background: #f4f6f9;
    }
    #menu-toggle:checked + .menu-icon + .menu {
      display: block;
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

  <!-- Menu Hambúrguer -->
  <div class="hamburger-menu">
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>
    <div class="menu">
      <a href="index.php?controller=suplemento&action=listar">Suplementos</a>
      <a href="index.php?controller=categoria&action=listar">Categorias</a>
      <a href="index.php?controller=nutriente&action=listar">Nutrientes</a>
    </div>
  </div>
  <div class="container">
    <h1>Categorias</h1>
    <a href="index.php?controller=categoria&action=cadastrarForm" class="new-link">+ Nova Categoria</a>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista as $c): ?>
        <tr>
          <td><?= htmlspecialchars($c->getId()) ?></td>
          <td><?= htmlspecialchars($c->getNome()) ?></td>
          <td class="actions">
            <a href="index.php?controller=categoria&action=editarForm&id=<?= $c->getId() ?>">Editar</a> |
            <a href="index.php?controller=categoria&action=deletar&id=<?= $c->getId() ?>"
               onclick="return confirm('Confirma exclusão?')">Excluir</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a href="index.php?controller=suplemento&action=listar" class="back-link">Voltar aos suplementos</a>
  </div>
</body>
</html>