<?php
// editar categoria — supõe que $categoria foi definido no controller
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Categoria</title>
</head>
<body>
    <h1>Editar Categoria: <?= htmlspecialchars($categoria->getNome()) ?></h1>
    <form action="index.php?controller=categoria&action=atualizar" method="POST">
        <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= htmlspecialchars($categoria->getNome()) ?>" required><br><br>
        <button type="submit">Salvar Alterações</button>
    </form>
    <br><a href="index.php?controller=categoria&action=listar">Voltar à lista de categorias</a>
</body>
</html>
