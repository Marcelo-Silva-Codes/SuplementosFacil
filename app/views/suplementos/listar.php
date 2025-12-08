<?php
// Supondo que $lista (array de objetos Suplemento) já foi definido no controller
require_once __DIR__ . '/../../dao/SuplementoNutrienteDAO.php';

$snDao = new SuplementoNutrienteDAO();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Suplementos</title>
</head>
<body>

<h1>Suplementos Cadastrados</h1>
<a href="index.php?controller=suplemento&action=cadastrarForm"> Novo Suplemento</a>
<a href="index.php?controller=categoria&action=cadastrarForm">Nova Categoria</a>
<a href="index.php?controller=nutriente&action=cadastrarForm">Novo Nutriente</a>
<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço (R$)</th>
            <th>Nutrientes / Composição</th>
            <th>Restrição Alimentar</th>
            <th> </th>    
            <th>Ações</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach ($lista as $s): ?>
        <tr>
            <td><?= htmlspecialchars($s->getId()) ?></td>
            <td><?= htmlspecialchars($s->getNome()) ?></td>
            <td><?= number_format($s->getPreco(), 2, ',', '.') ?></td>
            <td>
                <?php
                $rels = $snDao->buscarNutrientesPorSuplemento($s->getId());
                if (count($rels) > 0) {
                    echo "<ul>";
                    foreach ($rels as $r) {
                        echo "<li>"
                            . htmlspecialchars($r['nutriente_nome'])
                            . " — " . htmlspecialchars($r['quantidade'])
                            . " " . htmlspecialchars($r['unidade_medida'])
                            . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<em>Nenhum nutriente associado</em>";
                }
                ?>
            </td>
            <?php if ($sup->isVegano()): ?>
    <span>✔ Vegano</span><br>
<?php endif; ?>

<?php if ($sup->isSemGluten()): ?>
    <span>✔ Sem glúten</span><br>
<?php endif; ?>

<?php if ($sup->isSemLactose()): ?>
    <span>✔ Sem lactose</span><br>
<?php endif; ?>
            <td>
                <a href="index.php?c=suplemento&a=editarForm&id=<?= $s->getId() ?>">Editar</a> |
                <a href="index.php?c=suplemento&a=deletar&id=<?= $s->getId() ?>"
                   onclick="return confirm('Confirmar exclusão?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
