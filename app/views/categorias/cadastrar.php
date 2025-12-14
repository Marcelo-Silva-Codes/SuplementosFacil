<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Categoria</title>

  <link rel="stylesheet" href="public/css/categoria/cadastrar.css">
  <script src="public/js/categoria/cadastrar.js" defer></script>

</head>
<body>
  <div class="container">
    <h1>Cadastrar Nova Categoria</h1>
    <form id="formCategoria" action="index.php?controller=categoria&action=cadastrar" method="POST">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required minlength="3">
      <button type="submit">Salvar Categoria</button>
    </form>
    <a href="index.php?controller=categoria&action=listar" class="back-link">Voltar à lista de categorias</a>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>