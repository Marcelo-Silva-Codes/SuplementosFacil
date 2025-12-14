<?php
// listar.php — lista todos os usuários
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Usuários</title>
  <link rel="stylesheet" href="public/css/usuario/listar.css">
  
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
    <h1>Usuários</h1>

    <div class="actions">
      <a href="index.php?controller=usuario&action=cadastrarForm">+ Novo Usuário</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Sobrenome</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($usuarios)): ?>
          <?php foreach ($usuarios as $u): ?>
            <tr>
              <td data-label="ID"><?= htmlspecialchars($u->getId()) ?></td>
              <td data-label="Nome"><?= htmlspecialchars($u->getNome()) ?></td>
              <td data-label="Sobrenome"><?= htmlspecialchars($u->getSobrenome()) ?></td>
              <td data-label="Email"><?= htmlspecialchars($u->getEmail()) ?></td>
              <td data-label="Telefone"><?= htmlspecialchars($u->getTelefone()) ?></td>
              <td data-label="Ações" class="table-actions">
                <a href="index.php?controller=usuario&action=editar&id=<?= $u->getId() ?>">✏️ Editar</a> |
                <a href="index.php?controller=usuario&action=excluir&id=<?= $u->getId() ?>"
                   onclick="return confirm('Confirma exclusão?')">🗑️ Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6"><em>Nenhum usuário cadastrado.</em></td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <a href="index.php?controller=suplemento&action=listar" class="back-link">Voltar aos suplementos</a>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>