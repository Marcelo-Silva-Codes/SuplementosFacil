<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Categoria</title>
</head>
<body>

<h1>Cadastrar Categoria</h1>

<form action="index.php?controller=categoria&action=cadastrar" method="POST">

    <label>Nome da categoria:</label><br>
    <input type="text" name="nome" required><br><br>

    <button type="submit">Salvar Categoria</button>
</form>

<br>
<a href="index.php?controller=categoria&action=listar">Voltar para suplementos</a>

</body>
</html>
