<?php
// editar.php — formulário de edição de usuário
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Editar Usuário</title>
  
  <link rel="stylesheet" href="public/css/usuario/editar.css">
  <script src="public/js/usuario/editar.js" defer></script>

</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <a href="index.php?controller=tela&action=home">Painel ADM</a>
    </div>
    <div class="logout">
      <a href="index.php?controller=usuario&action=logout">Sair</a>
    </div>
  </nav>

  <div class="container">
    <h2>Editar Usuário</h2>
    <form id="formEditarUsuario" action="index.php?controller=usuario&action=atualizar" method="POST">
      <!-- Campo oculto para enviar o ID -->
      <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()); ?>">

      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($usuario->getNome()); ?>" required minlength="2">

      <label for="sobrenome">Sobrenome:</label>
      <input type="text" name="sobrenome" id="sobrenome" value="<?= htmlspecialchars($usuario->getSobrenome()); ?>" required minlength="2">

      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?= htmlspecialchars($usuario->getEmail()); ?>" required>

      <label for="telefone">Telefone:</label>
      <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($usuario->getTelefone()); ?>" pattern="[0-9]{8,15}" placeholder="Somente números">

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" value="<?= htmlspecialchars($usuario->getSenha()); ?>" required minlength="6">

      <button type="submit">Salvar alterações</button>
    </form>

    <a href="index.php?controller=usuario&action=listar" class="back-link">Voltar à lista de usuários</a>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>