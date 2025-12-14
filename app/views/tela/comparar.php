<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Comparação de Suplementos</title>
  <script src="public/js/comparar.js" defer></script>

  <link rel="stylesheet" href="public/css/comparar.css">

</head>

<body>
  <h2>Comparação de Suplementos</h2>

  <?php if (isset($suplementosComparar) && is_array($suplementosComparar) && count($suplementosComparar) > 0): ?>
    <table>
      <thead>
        <tr>
          <th>Atributo</th>
          <?php foreach ($suplementosComparar as $s): ?>
            <th><?= htmlspecialchars($s->getNome()) ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Preço</td>
          <?php foreach ($suplementosComparar as $s): ?>
            <td>R$ <?= number_format((float)$s->getPreco(), 2, ',', '.') ?></td>
          <?php endforeach; ?>
        </tr>

        <tr>
          <td>Imagem</td>
          <?php foreach ($suplementosComparar as $s): ?>
            <td>
              <?php if ($s->getImg()): ?>
                <img src="<?= htmlspecialchars($s->getImg()) ?>" alt="Imagem de <?= htmlspecialchars($s->getNome()) ?>">
              <?php else: ?>
                <em>Sem imagem</em>
              <?php endif; ?>
            </td>
          <?php endforeach; ?>
        </tr>

        <tr>
          <td>Nutrientes</td>
          <?php foreach ($suplementosComparar as $s): ?>
            <td>
              <ul>
                <?php foreach ($allNutrientes as $nutrienteId => $nutrienteNome): ?>
                  <?php
                  // procura se este suplemento tem esse nutriente
                  $found = null;
                  foreach ($s->getNutrientes() as $n) {
                    if ($n['nutriente_id'] == $nutrienteId) {
                      $found = $n;
                      break;
                    }
                  }
                  ?>
                  <?php if ($found): ?>
                    <li class="nutriente"
                      data-nome="<?= htmlspecialchars($found['nutriente_nome']) ?>"
                      data-valor="<?= (float)$found['quantidade'] ?>"
                      data-unidade="<?= htmlspecialchars($found['unidade_medida']) ?>">
                      <?= htmlspecialchars($found['nutriente_nome']) ?> —
                      <?= number_format((float)$found['quantidade'], 2, ',', '.') ?>
                      <?= htmlspecialchars($found['unidade_medida']) ?>
                    </li>
                  <?php else: ?>
                    <li class="nutriente"
                      data-nome="<?= htmlspecialchars($nutrienteNome) ?>"
                      data-valor=""
                      data-unidade="">
                      <?= htmlspecialchars($nutrienteNome) ?> — <em>Sem informação</em>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </td>
          <?php endforeach; ?>
        </tr>

        <tr>
          <td>Restrições</td>
          <?php foreach ($suplementosComparar as $s): ?>
            <td class="restricoes">
              <?php
              $temAlguma = false;
              if ($s->isVegano()) {
                $temAlguma = true;
                echo "<span>Vegano</span>";
              }
              if ($s->isGluten()) {
                $temAlguma = true;
                echo "<span>Contém glúten</span>";
              }
              if ($s->isLactose()) {
                $temAlguma = true;
                echo "<span>Contém lactose</span>";
              }
              ?>
              <?php if (!$temAlguma): ?>
                <em>Sem restrições</em>
              <?php endif; ?>
            </td>
          <?php endforeach; ?>
        </tr>
      </tbody>
    </table>

    <p class="nota">Destaque verde: maior quantidade do nutriente; vermelho: menor; cinza: igual.</p>
  <?php else: ?>
    <p style="text-align:center;">Nenhum suplemento selecionado para comparar.</p>
  <?php endif; ?>

  <div class="actions">
    <a href="index.php?controller=tela&action=home" class="btn">Voltar</a>
    <button onclick="limparCesta()" class="btn">Limpar cesta</button>
  </div>

  <footer>
    <p>&copy; 2025 SuplementosFacil</p>
  </footer>

</body>

</html>