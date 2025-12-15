<?php
// listar.php — lista todos os nutrientes
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Nutrientes</title>

  <link rel="stylesheet" href="public/css/nutriente/listar.css">
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
            <td data-label="ID"><?= htmlspecialchars($n->getId()) ?></td>
            <td data-label="Nome"><?= htmlspecialchars($n->getNome()) ?></td>
            <td data-label="Tipo"><?= htmlspecialchars($n->getTipo()) ?></td>
            <td data-label="Ações" class="table-actions">
              <a href="index.php?controller=nutriente&action=editarForm&id=<?= $n->getId() ?>"> Editar</a> |
              <a href="index.php?controller=nutriente&action=deletar&id=<?= $n->getId() ?>"
                 onclick="return confirm('Confirma exclusão?')"> Excluir</a>
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