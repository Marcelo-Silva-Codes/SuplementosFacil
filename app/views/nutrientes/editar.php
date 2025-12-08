<?php
// app/views/nutrientes/editar.php
// Supondo que $nutriente (objeto Nutriente) foi definido pelo controller antes de incluir esta view
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Nutriente</title>
</head>
<body>
    <h1>Editar Nutriente: <?= htmlspecialchars($nutriente->getNome()) ?></h1>

    <form action="index.php?controller=nutriente&action=atualizar" method="POST">
        <input type="hidden" name="id" value="<?= $nutriente->getId() ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($nutriente->getNome()) ?>" required><br><br>

        <label>Tipo / Categoria do nutriente (opcional):</label><br>
        <input type="text" name="tipo" value="<?= htmlspecialchars($nutriente->getTipo()) ?>"><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>

    <br>
    <a href="index.php?controller=nutriente&action=listar">Voltar à lista de nutrientes</a>
</body>
</html>
