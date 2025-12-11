
<?php
// app/views/suplementos/listar.php
require_once __DIR__ . '/../../dao/SuplementoNutrienteDAO.php';
$snDao = new SuplementoNutrienteDAO();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>SuplementosFácil - Home</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
    h1 { text-align: center; margin-bottom: 20px; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
    .card { border: 1px solid #ccc; border-radius: 8px; padding: 15px; text-align: center; background: #fafafa; }
    .card img { max-width: 100%; height: 150px; object-fit: cover; border-radius: 5px; }
    .price { font-weight: bold; color: green; margin: 10px 0; }
    .btn { background: #333; color: #fff; padding: 8px 12px; border: none; cursor: pointer; margin: 5px; border-radius: 4px; }
    .btn:hover { background: #555; }
  </style>
</head>
<body>
  <h1>Suplementos Disponíveis</h1>

<!-- Barra da cesta -->
<div style="background:#eee; padding:10px; margin-bottom:20px;">
  <strong>Cesta de comparação:</strong>
  <?php if (!empty($_SESSION['comparador'])): ?>
    <?php foreach ($_SESSION['comparador'] as $id): ?>
      <span style="margin-right:10px;">#<?= htmlspecialchars($id) ?></span>
      <form method="POST" action="index.php?controller=suplemento&action=removerComparador" style="display:inline">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <button type="submit">x</button>
      </form>
    <?php endforeach; ?>
    <a href="index.php?controller=suplemento&action=comparar">Comparar agora</a>
    <form method="POST" action="index.php?controller=suplemento&action=limparComparador" style="display:inline">
      <button type="submit">Limpar cesta</button>
    </form>
  <?php else: ?>
    <em>Nenhum suplemento na cesta</em>
  <?php endif; ?>
</div>

<!-- Grid de suplementos -->
<div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(250px,1fr)); gap:20px;">
  <?php foreach ($lista as $s): ?>
    <div style="border:1px solid #ccc; padding:15px; text-align:center;">
        
      <img src="<?= htmlspecialchars($s->getImg()) ?>" alt="<?= htmlspecialchars($s->getNome()) ?>" style="max-width:100%; height:150px; object-fit:cover;">

      <h3><?= htmlspecialchars($s->getNome()) ?></h3>

      <p><strong>Marca:</strong> <?= htmlspecialchars($s->getMarca()) ?></p>

      <p><strong>R$ <?= number_format($s->getPreco(), 2, ',', '.') ?></strong></p>

      <form method="POST" action="index.php?controller=suplemento&action=adicionarComparador">
        <input type="hidden" name="id" value="<?= htmlspecialchars($s->getId()) ?>">
        <button type="submit">Adicionar ao comparador</button>
      </form>
    </div>
  <?php endforeach; ?>
</div>


</body>
</html>