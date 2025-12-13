<?php
// Supondo que $supl (objeto Suplemento) já foi carregado no controller antes de incluir esta view
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Suplemento</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    form label {
      display: block;
      font-weight: bold;
      margin-bottom: 6px;
      color: #444;
    }

    form input[type="text"],
    form input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 18px;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: border-color 0.3s;
    }

    form input[type="text"]:focus,
    form input[type="number"]:focus {
      border-color: #007bff;
      outline: none;
    }

    h3 {
      margin-top: 25px;
      color: #555;
    }

    .checkbox-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: normal;
      color: #333;
    }

    button {
      background: #007bff;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 15px;
      transition: background 0.3s;
      width: 100%;
    }

    button:hover {
      background: #0056b3;
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }

    .back-link:hover {
      text-decoration: underline;
    }

    select {
  width: 100%;
  padding: 10px;
  margin-bottom: 18px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background: #fff;
  font-size: 15px;
  transition: border-color 0.3s, box-shadow 0.3s;
}

select:focus {
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0,123,255,0.4);
  outline: none;
}

  </style>
</head>
<body>
  <div class="container">
    <h1>Editar Suplemento: <?= htmlspecialchars($supl->getNome()) ?></h1>

    <form action="index.php?controller=suplemento&action=atualizar" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $supl->getId() ?>">

      <label>Nome:</label>
      <input type="text" name="nome" value="<?= htmlspecialchars($supl->getNome()) ?>" required>

      <label>Quantidade total:</label>
      <input type="text" name="quantidade_total" value="<?= htmlspecialchars($supl->getQuantidadeTotal()) ?>">

      <label>Unidade total (UM):</label>
      <input type="text" name="quantidade_total_UM" value="<?= htmlspecialchars($supl->getQuantidadeTotalUM()) ?>">

      <label>Quantidade por porção:</label>
      <input type="text" name="quantidade_por_porcao" value="<?= htmlspecialchars($supl->getQuantidadePorPorcao()) ?>">

      <label>Unidade por porção (UM):</label>
      <input type="text" name="quantidade_por_porcao_UM" value="<?= htmlspecialchars($supl->getQuantidadePorPorcaoUM()) ?>">

      <label>Calorias:</label>
      <input type="text" name="calorias" value="<?= htmlspecialchars($supl->getCalorias()) ?>">

      <label>Sabor:</label>
      <input type="text" name="sabor" value="<?= htmlspecialchars($supl->getSabor()) ?>">

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
      <input type="number" step="0.01" name="preco" value="<?= htmlspecialchars($supl->getPreco()) ?>" required>

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
</body>
</html>