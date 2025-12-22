<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Suplemento</title>
 <link rel="stylesheet" href="public/css/suplemento/cadastrar.css">
<script src="public/js/suplemento/cadastrar.js" defer></script>

</head>
<body>
  <header>
    <!-- Navbar ADM -->
    <nav class="navbar">
      <div class="logo">Painel ADM</div>
      <div class="logout">
        <a href="index.php?controller=usuario&action=logout">Sair</a>
      </div>
    </nav>
  </header>

  <div class="container">
    <h1>Cadastrar Novo Suplemento</h1>

    <form id="formSuplemento" action="index.php?controller=suplemento&action=cadastrar" method="POST" enctype="multipart/form-data">

      <label>Nome:</label>
      <input type="text" name="nome" required minlength="3">

      <label>Categoria:</label>
      <select name="categoria_id" required>
        <option value="">-- Selecione categoria --</option>
        <?php foreach ($categorias as $c): ?>
          <option value="<?= $c->getId(); ?>">
            <?= htmlspecialchars($c->getNome()); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <a href="index.php?controller=categoria&action=cadastrarForm" class="link-inline">Nova Categoria</a><br><br>

      <label>Forma de Apresentação:</label>
      <select name="forma_apresentacao" required>
        <option value="">-- Selecione forma --</option>
        <option value="cápsulas">Cápsulas</option>
        <option value="pó">Pó</option>
        <option value="líquido">Líquido</option>
        <option value="tabletes">Tabletes</option>
      </select>

      <label>Quantidade Total do Produto:</label>
      <input type="number" name="quantidade_total" required min="1">

      <label>Unidade de Medida da Quantidade Total:</label>
      <input type="text" name="quantidade_total_UM" required>

      <label>Quantidade por Porção:</label>
      <input type="number" name="quantidade_por_porcao" required min="1">

      <label>Unidade de Medida da Quantidade por Porção:</label>
      <input type="text" name="quantidade_por_porcao_UM" required>

      <label>Calorias por Porção:</label>
      <input type="number" name="calorias"  step="0.01" required min="0.01">

      <label>Sabor:</label>
      <input type="text" name="sabor" required>

      <label>Preço (R$):</label>
      <input type="number" step="0.01" name="preco" required min="0.01">

      <label>Marca:</label>
      <input type="text" name="marca">

      <label>Imagem:</label>
      <input type="file" name="img" accept="image/*">
      <br><br>

      <label>Link:</label>
      <input type="url" name="link">

      <h3>Nutrientes</h3>
      <?php if (!empty($nutrientes)): ?>
        <?php foreach ($nutrientes as $n): ?>
          <div class="nutriente-item">
            <input type="checkbox" name="nutrientes[]" value="<?= $n->getId(); ?>" id="nut_<?= $n->getId(); ?>">
            <label for="nut_<?= $n->getId(); ?>"><?= htmlspecialchars($n->getNome()); ?></label>
            <span>Qtd:</span>
            <input type="number" name="qtd_<?= $n->getId(); ?>" step="any" min="0" style="width:80px;">
            <span>UM:</span>
            <input type="text" name="un_<?= $n->getId(); ?>" style="width:80px;">
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nenhum nutriente cadastrado. <a href="index.php?c=nutriente&a=cadastrarForm">Cadastre um nutriente primeiro</a></p>
      <?php endif; ?>

      <h3>Restrições / Propriedades Alimentares</h3>
      <div class="checkbox-group">
        <label><input type="checkbox" name="vegano"> Vegano</label>
        <label><input type="checkbox" name="gluten"> Sem Glúten</label>
        <label><input type="checkbox" name="lactose"> Sem Lactose</label>
      </div>

      <button type="submit">Salvar Suplemento</button>
      <br><br>
      <button type="reset">Limpar Formulário</button>

    </form>
  </div>
  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>
