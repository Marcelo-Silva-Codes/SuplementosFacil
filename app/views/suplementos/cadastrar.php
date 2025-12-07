<?php
// Se houver DAOs para categoria, forma, nutrientes, carregar listas para <select> / checkboxes
require_once __DIR__ . '/../../dao/CategoriaDAO.php';
require_once __DIR__ . '/../../dao/NutrienteDAO.php';

$catDao   = new CategoriaDAO();
$nutDao   = new NutrienteDAO();

$categorias = $catDao->listarTodos();
$nutrientes = $nutDao->listarTodos();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Suplemento</title>
</head>
<body>

<h1>Cadastrar Novo Suplemento</h1>

<form action="index.php?controller=suplemento&action=cadastrar" method="POST">

    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Quantidade do Produto:</label><br>
    <input type="number" name="quantidade_produto" required><br><br>

    <label>Categoria:</label><br>
    <select name="categoria_id" required>
        <option value="">-- Selecione categoria --</option>
        <?php foreach ($categorias as $c): ?>
            <option value="<?= $c->getId(); ?>">
                <?= htmlspecialchars($c->getNome()); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <a href="index.php?c=categoria&a=cadastrarForm">Cadastrar nova categoria</a>
    <br><br>

    <label>Forma de Apresentação:</label><br>
    <select name="forma_apresentacao" required>
        <option value="">-- Selecione forma --</option>
        <option value="cápsulas">Cápsulas</option>
        <option value="pó">Pó</option>
        <option value="líquido">Líquido</option>
        <option value="tabletes">Tabletes</option>
        
    </select>
    <br><br>

    <label>Preço (R$):</label><br>
    <input type="number" step="0.01" name="preco" required><br><br>

    <label>Marca:</label><br>
    <input type="text" name="marca"><br><br>

    <label>Imagem (URL ou caminho):</label><br>
    <input type="text" name="img"><br><br>

    <label>Descrição:</label><br>
    <textarea name="descricao"></textarea><br><br>


    <hr>
    <h3>Associar Nutrientes</h3>

    <?php if (!empty($nutrientes)): ?>
        <?php foreach ($nutrientes as $n): ?>
            <div>
                <input type="checkbox" name="nutrientes[]" value="<?= $n->getId(); ?>" id="nut_<?= $n->getId(); ?>">
                <label for="nut_<?= $n->getId(); ?>"><?= htmlspecialchars($n->getNome()); ?></label>

                Quantidade: <input type="number" name="qtd_<?= $n->getId(); ?>" step="any">
                Unidade:    <input type="text"   name="un_<?= $n->getId(); ?>">
            </div>
            <br>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum nutriente cadastrado. <a href="index.php?c=nutriente&a=cadastrarForm">Cadastre um nutriente primeiro</a></p>
    <?php endif; ?>
    <br>

    <label><input type="checkbox" name="vegano"> Vegano</label><br>
    <label><input type="checkbox" name="gluten"> Contém Glúten</label><br>
    <label><input type="checkbox" name="lactose"> Contém Lactose</label><br><br>

    <button type="submit">Salvar Suplemento</button>
</form>

</body>
</html>
