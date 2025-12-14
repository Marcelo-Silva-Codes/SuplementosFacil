<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Cadastrar Nutriente</title>
 
  <link rel="stylesheet" href="public/css/nutriente/cadastrar.css">
  <script src="public/js/nutriente/cadastrar.js" defer></script>

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
    <h1>Cadastrar Novo Nutriente</h1>

    <form id="formNutriente" action="index.php?controller=nutriente&action=cadastrar" method="POST">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required minlength="3">

      <label for="tipo">Tipo / Unidade / Observação:</label>
      <input type="text" id="tipo" name="tipo">

      <button type="submit">Salvar Nutriente</button>
    </form>

    <a href="index.php?controller=nutriente&action=listar" class="back-link">Voltar à lista de nutrientes</a>
  </div>
   <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>

</body>
</html>

