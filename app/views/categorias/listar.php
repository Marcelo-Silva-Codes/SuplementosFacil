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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .container {
      max-width: 900px;
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
      margin-top: 10px;
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

    footer {
      text-align: center;
      padding: 15px;
      background: #333;
      color: #fff;
      font-size: 14px;
    }

    /* 📱 Responsividade */
    @media (max-width: 700px) {
      .container {
        margin: 20px;
        padding: 20px;
      }
      table, thead, tbody, th, td, tr {
        display: block;
      }
      thead {
        display: none;
      }
      tr {
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 10px;
        background: #fff;
      }
      td {
        text-align: left;
        border: none;
        padding: 6px;
      }
      td::before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        margin-bottom: 4px;
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
          <td data-label="ID"><?= htmlspecialchars($c->getId()) ?></td>
          <td data-label="Nome"><?= htmlspecialchars($c->getNome()) ?></td>
          <td data-label="Ações" class="actions">
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

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>