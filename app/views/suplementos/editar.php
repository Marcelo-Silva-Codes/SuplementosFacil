<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Editar Suplemento</title>

  <link rel="stylesheet" href="public/css/suplemento/editar.css">

  <script src="public/js/suplemento/editar.js" defer></script>

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
    <h1>Editar Suplemento: <?= htmlspecialchars($supl->getNome()) ?></h1>

    <form action="index.php?controller=suplemento&action=atualizar" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $supl->getId() ?>">

      <label>Nome:</label>
      <input type="text" name="nome" value="<?= htmlspecialchars($supl->getNome()) ?>" required>

      <label>Quantidade total:</label>
      <input type="number" id="quantidade_total" name="quantidade_total" value="<?= htmlspecialchars($supl->getQuantidadeTotal()) ?>" min="1">

      <label>Unidade total (UM):</label>
      <input type="text" id="quantidade_total_UM" name="quantidade_total_UM" value="<?= htmlspecialchars($supl->getQuantidadeTotalUM()) ?>">

      <label>Quantidade por porção:</label>
      <input type="number" id="quantidade_por_porcao" name="quantidade_por_porcao" value="<?= htmlspecialchars($supl->getQuantidadePorPorcao()) ?>" min="1">


      <label>Unidade por porção (UM):</label>
      <input type="text" id="quantidade_por_porcao_UM" name="quantidade_por_porcao_UM" value="<?= htmlspecialchars($supl->getQuantidadePorPorcaoUM()) ?>">


      <label>Calorias:</label>
      <input type="number" id="calorias" name="calorias" value="<?= htmlspecialchars($supl->getCalorias()) ?>" min="0">


      <label>Sabor:</label>
      <input type="text" id="sabor" name="sabor" value="<?= htmlspecialchars($supl->getSabor()) ?>" required>


      <h3>Nutrientes</h3>
      <?php if (!empty($nutrientes)): ?>
        <?php foreach ($nutrientes as $n):
          // procura se este nutriente já está vinculado
          $vinculo = null;
          foreach ($supl->getNutrientes() as $nut) {
            if ($nut['nutriente_id'] == $n->getId()) {
              $vinculo = $nut;
              break;
            }
          }
        ?>
          <div class="nutriente-item">
            <input type="checkbox" name="nutrientes[]" value="<?= $n->getId(); ?>"
              id="nut_<?= $n->getId(); ?>"
              <?= $vinculo ? 'checked' : '' ?>>
            <label for="nut_<?= $n->getId(); ?>"><?= htmlspecialchars($n->getNome()); ?></label>
            <span>Qtd:</span>
            <input type="number" name="qtd_<?= $n->getId(); ?>" step="any" style="width:80px;"
              value="<?= $vinculo['quantidade'] ?? '' ?>">
            <span>Uni.Med.:</span>
            <input type="text" name="un_<?= $n->getId(); ?>" style="width:80px;"
              value="<?= $vinculo['unidade_medida'] ?? '' ?>">
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nenhum nutriente cadastrado.</p>
      <?php endif; ?>

      <label for="categoria_id">Categoria:</label>
      <select id="categoria_id" name="categoria_id" required>
        <!-- Placeholder sem variável fora do foreach -->
        <option value="" <?= !$supl->getCategoriaId() ? 'selected' : '' ?> disabled>Selecione...</option>

        <?php foreach ($categorias as $c): ?>
          <option value="<?= $c->getId() ?>"
            <?= ($supl->getCategoriaId() == $c->getId()) ? 'selected' : '' ?>>
            <?= htmlspecialchars($c->getNome()) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label>Forma de apresentação:</label>
      <input type="text" name="forma_apresentacao" value="<?= htmlspecialchars($supl->getFormaApresentacao()) ?>" required>

      <label>Preço (R$):</label>
      <input type="number" id="preco" step="0.01" name="preco" value="<?= htmlspecialchars($supl->getPreco()) ?>" required min="0.01">

      <label>Marca:</label>
      <input type="text" name="marca" value="<?= htmlspecialchars($supl->getMarca()) ?>">

      <label>Imagem atual:</label><br>
      <?php if ($supl->getImg()): ?>
        <img src="<?= htmlspecialchars($supl->getImg()); ?>"
          alt="Imagem atual"
          style="max-width:150px; height:auto; border:1px solid #ccc; margin-bottom:10px;">
      <?php else: ?>
        <em>Sem imagem cadastrada</em>
      <?php endif; ?>
      <br>

      <label>Trocar imagem:</label>
      <input type="file" name="img" accept="image/*">

      <!-- mantém o caminho antigo caso não troque -->
      <input type="hidden" name="img" value="<?= htmlspecialchars($supl->getImg()); ?>">


      <br><br>
      <label>Link:</label>
      <input type="text" name="link" value="<?= htmlspecialchars($supl->getLink()) ?>">

      <h3>Restrições / Propriedades Alimentares</h3>
      <div class="checkbox-group">
        <label>
          <input type="checkbox" name="vegano" value="1" <?= $supl->isVegano() ? 'checked' : '' ?>>
          Vegano
        </label>
        <label>
          <input type="checkbox" name="gluten" value="1" <?= $supl->isGluten() ? 'checked' : '' ?>>
          Contém glúten
        </label>
        <label>
          <input type="checkbox" name="lactose" value="1" <?= $supl->isLactose() ? 'checked' : '' ?>>
          Contém lactose
        </label>
      </div>

      <button type="submit">Salvar Alterações</button>
    </form>

    <a href="index.php?controller=suplemento&action=listar" class="back-link">Voltar à lista de suplementos</a>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>