<?php
// Supondo que $lista (array de Suplemento) já foi definido antes, no controller
require_once __DIR__ . '/../../dao/SuplementoNutrienteDAO.php';
$snDao = new SuplementoNutrienteDAO();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Suplementos</title>
</head>
<body>

<h1>Lista de Suplementos</h1>
<a href="index.php?c=suplemento&a=cadastrarForm">Novo Suplemento</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ingredientes / Nutrientes</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($lista as $s): ?>
        <tr>
            <td><?= $s->getId() ?></td>
            <td><?= htmlspecialchars($s->getNome()) ?></td>
            <td>R$ <?= number_format($s->getPreco(), 2, ',', '.') ?></td>
            <td>
                <?php
                // Buscar nutrientes vinculados a esse suplemento
                $rels = $snDao-> buscarNutrientesPorSuplementos($s->getId());
                if ($rels) {
                    echo "<ul>";
                    foreach ($rels as $r) {
                        // supondo que $r tem ['nutriente_nome'], ['quantidade'], ['unidade_medida']
                        echo "<li>" 
                              . htmlspecialchars($r['nutriente_nome']) 
                              . " — " . htmlspecialchars($r['quantidade'])
                              . " " . htmlspecialchars($r['unidade_medida'])
                              . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "-";
                }
                ?>
            </td>
            <td>
                <a href="index.php?c=suplemento&a=editarForm&id=<?= $s->getId() ?>">Editar</a> |
                <a href="index.php?c=suplemento&a=deletar&id=<?= $s->getId() ?>"
                   onclick="return confirm('Confirma exclusão?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
