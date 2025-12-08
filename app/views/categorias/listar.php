<?php
// listar categorias
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Categorias</title>
</head>
<body>
    <h1>Categorias</h1>
    <a href="index.php?controller=categoria&action=cadastrarForm">Nova Categoria</a>
    <br><br>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c->getId()) ?></td>
                <td><?= htmlspecialchars($c->getNome()) ?></td>
                <td>
                    <a href="index.php?controller=categoria&action=editarForm&id=<?= $c->getId() ?>">Editar</a> |
                    <a href="index.php?controller=categoria&action=deletar&id=<?= $c->getId() ?>"
                       onclick="return confirm('Confirma exclusão?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><a href="index.php?controller=suplemento&action=listar">Voltar aos suplementos</a>
</body>
</html>
