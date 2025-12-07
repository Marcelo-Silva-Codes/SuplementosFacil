<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário</title>
  <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
  <h2>Editar Usuário</h2>
  <form action="index.php?controller=usuario&action=atualizar" method="POST">
    <!-- Campo oculto para enviar o ID -->
    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?= $usuario->getNome(); ?>" required>

    <label for="sobrenome">Sobrenome:</label>
    <input type="text" name="sobrenome" id="sobrenome" value="<?= $usuario->getSobrenome(); ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= $usuario->getEmail(); ?>" required>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" id="telefone" value="<?= $usuario->getTelefone(); ?>">

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" value="<?= $usuario->getSenha(); ?>" required>


    <label for="img">Imagem de perfil:</label>
    <input type="text" name="img" id="img" value="<?= $usuario->getImg(); ?>">

    <button type="submit">Salvar alterações</button>
  </form>
</body>
</html>