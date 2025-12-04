<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Usuário</title>
  <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
  <h2>Cadastro de Usuário</h2>
  <form action="index.php?controller=usuario&action=criar" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>

    <label for="sobrenome">Sobrenome:</label>
    <input type="text" name="sobrenome" id="sobrenome" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" id="telefone">

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required>

    <label for="papel">Papel:</label>
    <select name="papel" id="papel" required>
      <option value="user">Usuário</option>
      <option value="admin">Administrador</option>
    </select>

    <label for="img">Imagem de perfil:</label>
    <input type="text" name="img" id="img">

    <button type="submit">Cadastrar</button>
  </form>
</body>
</html>

