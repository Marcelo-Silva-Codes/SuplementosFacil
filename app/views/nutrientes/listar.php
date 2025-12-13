<?php
// listar.php — lista todos os nutrientes
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Nutrientes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
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

    .actions {
      text-align: center;
      margin-bottom: 20px;
    }

    .actions a {
      display: inline-block;
      margin: 0 10px;
      text-decoration: none;
      font-weight: bold;
      color: #fff;
      background: #007bff;
      padding: 8px 14px;
      border-radius: 4px;
      transition: background 0.3s;
    }

    .actions a:hover {
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

    .table-actions a {
      margin: 0 5px;
      text-decoration: none;
      font-weight: bold;
      color: #007bff;
    }

    .table-actions a:hover {
      text-decoration: underline;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 30px;
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .back-link:hover {
      text-decoration: underline;
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
    <h1>Nutrientes</h1>

    <div class="actions">
      <a href="index.php?controller=nutriente&action=cadastrarForm">+ Novo Nutriente</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Tipo</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($lista as $n): ?>
          <tr>
            <td><?= htmlspecialchars($n->getId()) ?></td>
            <td><?= htmlspecialchars($n->getNome()) ?></td>
            <td><?= htmlspecialchars($n->getTipo()) ?></td>
            <td class="table-actions">
              <a href="index.php?controller=nutriente&action=editarForm&id=<?= $n->getId() ?>">✏️ Editar</a> |
              <a href="index.php?controller=nutriente&action=deletar&id=<?= $n->getId() ?>"
                 onclick="return confirm('Confirma exclusão?')">🗑️ Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a href="index.php?controller=suplemento&action=listar" class="back-link">Voltar aos suplementos</a>
  </div>
</body>
</html>