<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Lista de Categorias

        </title>
    </head>
    <body>
    <h1>Categorias</h1>
    <a href="index.php?controller=categoria&action=cadastrarForm">Nova Categoria</a>
    <br><br>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Nome</th></tr>
        <?php foreach ($lista as $c): ?>
            <tr>
                <td><?= $c->getId() ?></td>
                <td><?= htmlspecialchars($c->getNome()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php?controller=suplemento&action=listar">Voltar aos suplementos</a>
</body>
</html>
