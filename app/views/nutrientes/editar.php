<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Editar Nutriente</title>
  <link rel="stylesheet" href="public/css/nutriente/editar.css">
  <script src="public/js/nutriente/editar.js" defer></script>

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
</body>
</html>

