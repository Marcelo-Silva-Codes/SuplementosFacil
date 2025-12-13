<?php
// app/views/tela/comparar.php
// Aqui só usamos $suplementosComparar já preparado pelo controller
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Comparação de Suplementos</title>
  <style>
    /* estilos iguais ao que você já tinha */
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
            <?php if (!empty($s->getNutrientes())): ?>
              <ul>
                <?php foreach ($s->getNutrientes() as $r): ?>
                  <li class="nutriente"
                      data-nome="<?= htmlspecialchars($r['nutriente_nome']) ?>"
                      data-valor="<?= (float)$r['quantidade'] ?>"
                      data-unidade="<?= htmlspecialchars($r['unidade_medida']) ?>">
                    <?= htmlspecialchars($r['nutriente_nome']) ?> —
                    <?= number_format((float)$r['quantidade'], 1, ',', '.') ?>
                    <?= htmlspecialchars($r['unidade_medida']) ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else: ?>
              <em>não contém esse nutriente</em>
            <?php endif; ?>
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
    <button onclick="limparCesta()" class="btn">Limpar cesta</button>
  </div>

  <script>
    // JS para destacar nutrientes (igual ao que você já tinha)
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

    // Limpar cesta no localStorage
    function limparCesta() {
      localStorage.removeItem('comparador');
      alert("Cesta limpa!");
      window.location.href = "index.php?controller=suplemento&action=home";
    }
  </script>
</body>
</html>