<?php
// listar categorias
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Categorias</title>
  <link rel="stylesheet" href="public/css/categoria/listar.css">
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