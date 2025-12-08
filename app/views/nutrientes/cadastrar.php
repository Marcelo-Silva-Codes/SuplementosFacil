<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Nutriente</title>
</head>
<body>
    <h1>Cadastrar Novo Nutriente</h1>

    <form action="index.php?controller=nutriente&action=cadastrar" method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Tipo / Unidade / Observação:</label><br>
        <input type="text" name="tipo"><br><br>

        <button type="submit">Salvar</button>
    </form>

    <br><a href="index.php?controller=nutriente&action=listar">Voltar à lista de nutrientes</a>
</body>
</html>