<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Suplementos</title></head>
<body>

<h1>Lista de Suplementos</h1>
<a href="index.php?c=suplemento&a=cadastrarForm">Novo Suplemento</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        
    </tr>
    <?php foreach ($lista as $s): ?>
        <tr>
            <td><?= $s->getId() ?></td>
            <td><?= htmlspecialchars($s->getNome()) ?></td>
            <td>R$ <?= number_format($s->getPreco(),2,',','.') ?></td>
            <td>
                <a href="index.php?c=suplemento&a=editarForm&id=<?= $s->getId() ?>">Editar</a>
                |
                <a href="index.php?c=suplemento&a=deletar&id=<?= $s->getId() ?>"
                   onclick="return confirm('Confirma exclusão?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
