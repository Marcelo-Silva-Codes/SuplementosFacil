<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Nutriente</title>
</head>
<body>

<h1>Cadastrar Nutriente</h1>

<form action="index.php?controller=nutriente&action=cadastrar" method="POST">

    <label>Nome do nutriente:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Tipo / Categoria do nutriente (opcional):</label><br>
    <input type="text" name="tipo"><br><br>

    <button type="submit">Salvar Nutriente</button>
</form>

<br>
<a href="index.php?controller=suplemento&action=listar">Voltar para suplementos</a>

</body>
</html>
