<?php
// editar categoria — supõe que $categoria foi definido no controller
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Categoria</title>

  <link rel="stylesheet" href="public/css/categoria/editar.css">
  <script src="public/js/categoria/editar.js" defer></script>

</head>
<body>
  <div class="container">
    <h1>Editar Categoria: <?= htmlspecialchars($categoria->getNome()) ?></h1>
    <form id="formEditarCategoria" action="index.php?controller=categoria&action=atualizar" method="POST">
      <input type="hidden" name="id" value="<?= $categoria->getId() ?>">

      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($categoria->getNome()) ?>" required minlength="3">

      <button type="submit">Salvar Alterações</button>
    </form>
    <a href="index.php?controller=categoria&action=listar" class="back-link">Voltar à lista de categorias</a>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>