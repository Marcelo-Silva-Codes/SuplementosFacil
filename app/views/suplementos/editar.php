<?php
// Supondo que $supl (objeto Suplemento) já foi carregado no controller antes de incluir esta view
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Suplemento</title>
</head>
<body>

<h1>Editar Suplemento: <?= htmlspecialchars($supl->getNome()) ?></h1>

<form action="index.php?controller=suplemento&action=atualizar" method="POST">
    <!-- id escondido -->
    <input type="hidden" name="id" value="<?= $supl->getId() ?>">

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($supl->getNome()) ?>" required><br><br>

    <label>Quantidade total:</label><br>
    <input type="text" name="quantidade_total" value="<?= htmlspecialchars($supl->getQuantidadeTotal()) ?>"><br><br>

    <label>Unidade total (UM):</label><br>
    <input type="text" name="quantidade_total_UM" value="<?= htmlspecialchars($supl->getQuantidadeTotalUM()) ?>"><br><br>

    <label>Quantidade por porção:</label><br>
    <input type="text" name="quantidade_por_porcao" value="<?= htmlspecialchars($supl->getQuantidadePorPorcao()) ?>"><br><br>

    <label>Unidade por porção (UM):</label><br>
    <input type="text" name="quantidade_por_porcao_UM" value="<?= htmlspecialchars($supl->getQuantidadePorPorcaoUM()) ?>"><br><br>

    <label>Calorias:</label><br>
    <input type="text" name="calorias" value="<?= htmlspecialchars($supl->getCalorias()) ?>"><br><br>

    <label>Sabor:</label><br>
    <input type="text" name="sabor" value="<?= htmlspecialchars($supl->getSabor()) ?>"><br><br>

    <label>Categoria (ID):</label><br>
    <input type="number" name="categoria_id" value="<?= htmlspecialchars($supl->getCategoriaId()) ?>" required><br><br>

    <label>Forma de apresentação:</label><br>
    <input type="text" name="forma_apresentacao" value="<?= htmlspecialchars($supl->getFormaApresentacao()) ?>" required><br><br>

    <label>Preço (R$):</label><br>
    <input type="number" step="0.01" name="preco" value="<?= htmlspecialchars($supl->getPreco()) ?>" required><br><br>

    <label>Marca:</label><br>
    <input type="text" name="marca" value="<?= htmlspecialchars($supl->getMarca()) ?>"><br><br>

    <label>Imagem (URL ou caminho):</label><br>
    <input type="text" name="img" value="<?= htmlspecialchars($supl->getImg()) ?>"><br><br>

    <h3>Restrições / Propriedades Alimentares</h3>
    <label>
        <input type="checkbox" name="vegano" value="1" <?= $supl->isVegano() ? 'checked' : '' ?>>
        Vegano
    </label><br>
    <label>
        <input type="checkbox" name="gluten" value="1" <?= $supl->isGluten() ? 'checked' : '' ?>>
        Contém glúten
    </label><br>
    <label>
        <input type="checkbox" name="lactose" value="1" <?= $supl->isLactose() ? 'checked' : '' ?>>
        Contém lactose
    </label><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<br>
<a href="index.php?controller=suplemento&action=listar">Voltar à lista de suplementos</a>

</body>
</html>
