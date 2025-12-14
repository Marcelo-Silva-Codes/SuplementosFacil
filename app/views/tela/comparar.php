<?php
// app/views/tela/comparar.php
// Usa apenas $suplementosComparar preparado pelo controller:
// - Cada $s é um objeto Suplemento
// - $s->getNutrientes() deve ser um array de vínculos com chaves:
//   ['nutriente_id', 'nutriente_nome', 'quantidade', 'unidade_medida']
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Comparação de Suplementos</title>
  <style>
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  background: #f7f8fa;
  color: #333;
  min-height: 100vh;   /* ocupa toda a altura da tela */
  display: flex;
  flex-direction: column; /* organiza em coluna */
}



    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      background: #fff;
    }

    th,
    td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
      vertical-align: top;
    }

    th {
      background: #f0f3f7;
    }

    img {
      max-width: 120px;
      height: auto;
      border-radius: 4px;
    }

    ul {
      text-align: left;
      margin: 0;
      padding-left: 20px;
      list-style-type: none;
    }

    .restricoes span {
      display: inline-block;
      margin: 3px;
      background: #dff0d8;
      padding: 2px 6px;
      border-radius: 4px;
      font-size: 12px;
    }

    .actions {
      margin-top: 20px;
      text-align: center;
    }

    .btn {
      background: #333;
      color: #fff;
      padding: 10px 16px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }

    .btn:hover {
      background: #555;
    }

    .maior {
      color: green;
      font-weight: bold;
    }

    .menor {
      color: red;
      font-weight: bold;
    }

    .igual {
      color: #555;
    }

    .nota {
      font-size: 12px;
      color: #666;
      text-align: center;
      margin-top: 8px;
    }

footer {
  text-align: center;
  padding: 15px;
  background: #333;
  color: #fff;
  font-size: 14px;
  margin-top: auto;   /* garante que o footer vá para o fim */
}


    /* 📱 Responsividade */
    @media (max-width: 700px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }
      thead {
        display: none;
      }
      tr {
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 10px;
        background: #fff;
      }
      td {
        text-align: left;
        border: none;
        padding: 6px;
      }
      td::before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        margin-bottom: 4px;
      }
    }


  </style>
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

  <script>
  // Função para converter valores para mg (quando aplicável)
  function converterParaMg(valor, unidade) {
    if (valor === null || isNaN(valor)) return null;
    switch ((unidade || '').toLowerCase()) {
      case "kg":
        return valor * 1e6;
      case "g":
        return valor * 1000;
      case "mg":
        return valor;
      case "mcg":
        return valor * 0.001;
      default:
        return valor; // mantém a unidade original se for algo como "IU", "kcal", etc.
    }
  }

  // Comparação automática dos nutrientes ao carregar a página
  document.addEventListener("DOMContentLoaded", function() {
    const itens = document.querySelectorAll(".nutriente");
    const grupos = {};

    itens.forEach(li => {
      const nome = (li.dataset.nome || '').trim();
      const valorRaw = li.dataset.valor;
      const unidade = (li.dataset.unidade || '').trim();

      if (!nome) return;
      const valor = parseFloat(valorRaw);
      if (isNaN(valor)) return;

      const valorMg = converterParaMg(valor, unidade);

      if (!grupos[nome]) grupos[nome] = [];
      grupos[nome].push({
        el: li,
        valor: valorMg
      });
    });

    Object.keys(grupos).forEach(nome => {
      const grupo = grupos[nome];
      if (grupo.length < 2) return; // só faz sentido comparar se há 2+ suplementos

      const valores = grupo.map(g => g.valor);
      const max = Math.max(...valores);
      const min = Math.min(...valores);

      grupo.forEach(g => {
        if (max !== min) {
          if (g.valor === max) {
            g.el.classList.add("maior");
          } else if (g.valor === min) {
            g.el.classList.add("menor");
          }
        } else {
          g.el.classList.add("igual");
        }
      });
    });
  });

  // Função para limpar a cesta de comparação
  function limparCesta() {
    localStorage.removeItem('comparador');
    alert("Cesta limpa!");
    window.location.href = "index.php?controller=tela&action=home";
  }
</script>
</body>

</html>