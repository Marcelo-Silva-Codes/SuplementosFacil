<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Suplementos</title>
  <script src="public/js/suplemento/listar.js" defer></script>

  <link rel="stylesheet" href="public/css/suplemento/listar.css">

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

  <!-- Menu expansível -->
  <main>
    <div class="container">
      <button class="buttons" aria-expanded="false" aria-controls="panel-suplementos">Suplementos</button>
      <div id="panel-suplementos" class="panel">
        <a href="index.php?controller=suplemento&action=listar">Listar Suplementos</a>
        <a href="index.php?controller=suplemento&action=cadastrarForm">Cadastrar Suplemento</a>
      </div>

      <button class="buttons" aria-expanded="false" aria-controls="panel-categorias">Categorias</button>
      <div id="panel-categorias" class="panel">
        <a href="index.php?controller=categoria&action=listar">Listar Categorias</a>
        <a href="index.php?controller=categoria&action=cadastrarForm">Cadastrar Categoria</a>
      </div>

      <button class="buttons" aria-expanded="false" aria-controls="panel-nutrientes">Nutrientes</button>
      <div id="panel-nutrientes" class="panel">
        <a href="index.php?controller=nutriente&action=listar">Listar Nutrientes</a>
        <a href="index.php?controller=nutriente&action=cadastrarForm">Cadastrar Nutriente</a>
      </div>

      <button class="buttons" aria-expanded="false" aria-controls="panel-usuarios">Usuários</button>
      <div id="panel-usuarios" class="panel">
        <a href="index.php?controller=usuario&action=listar">Listar Usuários</a>
        <a href="index.php?controller=usuario&action=cadastrarForm">Cadastrar Usuário</a>
      </div>
    </div>

    <section>
      <h1>Suplementos Cadastrados</h1>
      <div class="container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Preço (R$)</th>
              <th>Composição (Nutrientes)</th>
              <th>Calorias</th>
              <th>Link</th>
              <th>Imagem</th>
              <th>Qtd Total</th>
              <th>Unidade</th>
              <th>Restrições</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($lista as $s): ?>
              <tr>
                <td><?= htmlspecialchars($s->getId()) ?></td>
                <td><?= htmlspecialchars($s->getNome()) ?></td>
                <td>R$ <?= number_format($s->getPreco(), 2, ',', '.') ?></td>
                <td>
                  <?php if (!empty($s->getNutrientes())): ?>
                    <ul>
                      <?php foreach ($s->getNutrientes() as $n): ?>
                        <li><?= htmlspecialchars($n['nutriente_nome']) ?> —
                          <?= number_format((float)$n['quantidade'], 1, ',', '.') ?>
                          <?= htmlspecialchars($n['unidade_medida']) ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php else: ?>
                    <em>Sem nutrientes cadastrados</em>
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($s->getCalorias()) ?></td>
                <td>
                  <?php $url = $s->getLink(); ?>
                  <?php if (!empty($url)): ?>
                    <a href="<?=$url ?>" target="_blank" rel="noopener">Abrir</a>
                  <?php else: ?>
                    <em>—</em>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if ($s->getImg()): ?>
                    <img src="<?= htmlspecialchars($s->getImg()) ?>" alt="Foto do suplemento <?= htmlspecialchars($s->getNome()) ?>" style="max-width:80px; max-height:80px; border-radius:4px;">
                  <?php else: ?>
                    <em>Sem imagem</em>
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($s->getQuantidadeTotal()) ?></td>
                <td><?= htmlspecialchars($s->getQuantidadeTotalUM()) ?></td>
                <td class="restricoes">
                  <?php if ($s->isVegano()): ?><span>Vegano</span><?php endif; ?>
                  <?php if ($s->isGluten()): ?><span>Sem glúten</span><?php endif; ?>
                  <?php if ($s->isLactose()): ?><span>Sem lactose</span><?php endif; ?>
                </td>
                <td class="table-actions">
                  <a href="index.php?controller=suplemento&action=editarForm&id=<?= $s->getId() ?>"> Editar</a> |
                  <a href="index.php?controller=suplemento&action=deletar&id=<?= $s->getId() ?>" onclick="return confirm('Confirma exclusão?')"> Excluir</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
</body>
</html>