<?php
// listar.php — lista todos os nutrientes
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Nutrientes</title>
</head>
<body>
    <h1>Nutrientes</h1>

    <a href="index.php?controller=nutriente&action=cadastrarForm">Novo Nutriente</a><br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $n): ?>
                <tr>
                    <td><?= htmlspecialchars($n->getId()) ?></td>
                    <td><?= htmlspecialchars($n->getNome()) ?></td>
                    <td><?= htmlspecialchars($n->getTipo()) ?></td>
                    <td>
                        <a href="index.php?controller=nutriente&action=editarForm&id=<?= $n->getId() ?>">Editar</a> |
                        <a href="index.php?controller=nutriente&action=deletar&id=<?= $n->getId() ?>"
                           onclick="return confirm('Confirma exclusão?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><a href="index.php?controller=suplemento&action=listar">Voltar aos suplementos</a>
</body>
</html>
