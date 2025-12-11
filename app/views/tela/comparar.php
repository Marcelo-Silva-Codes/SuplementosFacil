<?php
// app/views/tela/comparar.php
require_once __DIR__ . '/../../dao/SuplementoNutrienteDAO.php';
$snDao = new SuplementoNutrienteDAO();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Comparação de Suplementos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    h2 { text-align: center; margin-bottom: 20px; }
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #666; padding: 10px; text-align: center; vertical-align: top; }
    img { max-width: 120px; height: auto; }
    ul { text-align: left; margin: 0; padding-left: 20px; }
    .restricoes span {
      display: inline-block;
      margin: 3px;
      background: #dff0d8;
      padding: 2px 6px;
      border-radius: 4px;
      font-size: 12px;
    }
    .btn {
      background: #333; color: #fff; padding: 8px 12px;
      border: none; cursor: pointer; border-radius: 4px;
    }
    .btn:hover { background: #555; }
    .actions { margin-top: 20px; text-align: center; }
    .maior { color: green; font-weight: bold; }
    .menor { color: red; font-weight: bold; }
    .igual { color: black; }
  </style>
</head>
<body>
  <h2>Comparação de Suplementos</h2>

  <?php if (!empty($suplementosComparar)): ?>
    <table>
      <tr>
        <th>Atributo</th>
        <?php foreach ($suplementosComparar as $s): ?>
          <th><?= htmlspecialchars($s->getNome()) ?></th>
        <?php endforeach; ?>
      </tr>
      <tr>
        <td>Preço</td>
        <?php foreach ($suplementosComparar as $s): ?>
          <td>R$ <?= number_format($s->getPreco(), 2, ',', '.') ?></td>
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
            <?php
            $rels = $snDao->buscarNutrientesPorSuplemento($s->getId());
            if (!empty($rels)) {
              echo "<ul>";
              foreach ($rels as $r) {
                echo "<li class='nutriente'
                          data-nome='" . htmlspecialchars($r['nutriente_nome']) . "'
                          data-valor='" . (float)$r['quantidade'] . "'
                          data-unidade='" . htmlspecialchars($r['unidade_medida']) . "'>"
                     . htmlspecialchars($r['nutriente_nome']) . " — "
                     . htmlspecialchars($r['quantidade']) . " "
                     . htmlspecialchars($r['unidade_medida'])
                     . "</li>";
              }
              echo "</ul>";
            } else {
              echo "<em>não contém esse nutriente</em>";
            }
            ?>
          </td>
        <?php endforeach; ?>
      </tr>
      <tr>
        <td>Restrições</td>
        <?php foreach ($suplementosComparar as $s): ?>
          <td class="restricoes">
            <?php if ($s->isVegano()): ?><span>Vegano</span><?php endif; ?>
            <?php if ($s->isGluten()): ?><span>Contém glúten</span><?php endif; ?>
            <?php if ($s->isLactose()): ?><span>Contém lactose</span><?php endif; ?>
            <?php if (!$s->isVegano() && !$s->isGluten() && !$s->isLactose()): ?>
              <em>Sem restrições</em>
            <?php endif; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    </table>
  <?php else: ?>
    <p style="text-align:center;">Nenhum suplemento selecionado para comparar.</p>
  <?php endif; ?>

  <div class="actions">
    <a href="index.php?controller=suplemento&action=home" class="btn">Voltar</a>
    <form method="POST" action="index.php?controller=suplemento&action=limparComparador" style="display:inline;">
      <button type="submit" class="btn">Limpar cesta</button>
    </form>
  </div>
</body>
<script>
function converterParaMg(valor, unidade) {
  switch (unidade.toLowerCase()) {
    case "kg": return valor * 1e6;
    case "g":  return valor * 1000;
    case "mg": return valor;
    case "mcg":return valor * 0.001;
    default:   return valor;
  }
}

document.addEventListener("DOMContentLoaded", function() {
  const nutrientes = document.querySelectorAll(".nutriente");
  let grupos = {};

  nutrientes.forEach(li => {
    let nome = li.dataset.nome;
    let valor = parseFloat(li.dataset.valor);
    let unidade = li.dataset.unidade;
    let valorMg = converterParaMg(valor, unidade);

    if (!grupos[nome]) grupos[nome] = [];
    grupos[nome].push({ el: li, valor: valorMg });
  });

  for (let nome in grupos) {
    let grupo = grupos[nome];
    if (grupo.length > 1 && grupo.length <= 3) {
      let max = Math.max(...grupo.map(g => g.valor));
      let min = Math.min(...grupo.map(g => g.valor));

      grupo.forEach(g => {
        if (g.valor === max && max !== min) {
          g.el.classList.add("maior");
        } else if (g.valor === min && max !== min) {
          g.el.classList.add("menor");
        } else {
          g.el.classList.add("igual");
        }
      });
    }
  }
});
</script>
</html>