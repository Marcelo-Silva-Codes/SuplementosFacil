<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuários</title>
  <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
      <p>Bem-vindo, <?= $_SESSION['usuario_nome']; ?>!</p>

<a href="index.php?controller=usuario&action=logout">Sair</a>

    <br>
  <h2>Usuários cadastrados</h2>
  <table border="1" cellpadding="5" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Imagem</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?= $usuario->getId(); ?></td>
            <td><?= $usuario->getNome(); ?></td>
            <td><?= $usuario->getSobrenome(); ?></td>
            <td><?= $usuario->getEmail(); ?></td>
            <td><?= $usuario->getTelefone(); ?></td>
            <td><?= $usuario->getImg(); ?></td>
            <td>
              <a href="index.php?controller=usuario&action=editar&id=<?= $usuario->getId(); ?>">Editar</a> |
              <a href="index.php?controller=usuario&action=excluir&id=<?= $usuario->getId(); ?>">Excluir</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="8">Nenhum usuário cadastrado.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>