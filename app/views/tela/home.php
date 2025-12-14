<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>SuplementosFacil - Home</title>

  <script src="public/js/home.js" defer></script>

  <link rel="stylesheet" href="public/css/home.css">

</head>
<body>
  <nav class="navbar">
    <div class="logo"><a href="index.php?controller=tela&action=home">SuplementosFacil</a></div>
    <ul class="nav-links">
      <li><a href="index.php?controller=usuario&action=login">Login</a></li>
      <li><a href="index.php?controller=usuario&action=cadastrarForm">Registrar</a></li>
    </ul>
  </nav>

  <h1>Busque seus suplementos na tranquilidade</h1>

  <!-- Barra da cesta -->
  <div id="cesta" class="cesta">
    <strong>Cesta de comparação:</strong>
    <div id="cesta-itens"><em>Nenhum suplemento na cesta</em></div>
    <button onclick="limparCesta()" class="btn">Limpar cesta</button>
    <a href="#" class="btn" onclick="return abrirComparacao()">Comparar agora</a>
  </div>

  <!-- Grid de suplementos -->
  <div class="grid">
    <?php foreach ($lista as $s): ?>
      <div class="card">
        <img src="<?= htmlspecialchars($s->getImg()) ?>" alt="<?= htmlspecialchars($s->getNome()) ?>" loading="lazy">
        <h3><?= htmlspecialchars($s->getNome()) ?></h3>
        <p><strong>Marca:</strong> <?= htmlspecialchars($s->getMarca()) ?></p>
        <p class="price">R$ <?= number_format($s->getPreco(), 2, ',', '.') ?></p>
        <button class="btn btn-add"
          data-id="<?= htmlspecialchars($s->getId()) ?>"
          data-nome="<?= htmlspecialchars($s->getNome()) ?>">
          Adicionar ao comparador
        </button>
      </div>
    <?php endforeach; ?>
  </div>
  <footer>
    <p>&copy; 2025 SuplementosFacil</p>
  </footer>

</body>
</html>