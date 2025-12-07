<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Lista de Nutrientes</title></head><body>
    <h1>Nutrientes</h1>
    <a href="index.php?controller=nutriente&action=cadastrarForm">Novo Nutriente</a><br><br>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Nome</th><th>Tipo</th></tr>
        <?php foreach ($lista as $n): ?>
            <tr>
                <td><?= $n->getId() ?></td>
                <td><?= htmlspecialchars($n->getNome()) ?></td>
                <td><?= htmlspecialchars($n->getTipo()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><a href="index.php?controller=suplemento&action=listar">Voltar aos suplementos</a>
</body></html>
