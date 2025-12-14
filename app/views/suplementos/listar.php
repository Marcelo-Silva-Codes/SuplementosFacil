<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Painel ADM - Suplementos</title>
  <script src="public/js/buttons_menu.js" defer></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f6f9;
    }

    /* Navbar */
    header nav.navbar {
      background: #333;
      color: #fff;
      padding: 12px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar .logo {
      font-size: 20px;
      font-weight: bold;
    }

    .navbar .logout a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    .navbar .logout a:hover {
      color: #ddd;
    }


    h1 {
      margin: 30px 20px;
      color: #333;
      text-align: center;
    }

    table {
      border-collapse: collapse;
      width: 85%;
      margin: 0 20px 40px;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      overflow-x: auto;        /* scroll horizontal */
      white-space: nowrap;

    }

    
    thead {
      background: #007bff;
      color: #fff;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
      vertical-align: middle;
    }

    ul {
      margin: 0;
      padding-left: 15px;
      text-align: left;
      list-style-type: none;
    }

    .restricoes span {
      display: inline-block;
      margin: 3px;
      background: #dff0d8;
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 12px;
    }

    .table-actions a {
      margin: 0 5px;
      text-decoration: none;
      font-weight: bold;
      color: #007bff;
    }

    .table-actions a:hover {
      color: #054991ff;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;


    }

    .buttons {
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      margin: 5px;
      padding: 14px;
      width: 40%;
      transition: background 0.3s;
    }

    .buttons:hover {
      background: #0056b3;

    }

    .panel {
      padding: 0 18px;
      display: none;
      background-color: #f9f9f9;
      overflow: hidden;
      border-radius: 4px;
      margin-bottom: 12px;
    }

    .panel a {
      display: block;
      padding: 10px;
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
    }

    .panel a:hover {
      background: #eef3f9;
    }

    footer {
      text-align: center;
      padding: 15px;
      background: #333;
      color: #fff;
      font-size: 14px;
    }

@media (max-width: 768px) {
  .navbar {
    flex-direction: column;
    align-items: flex-start;
  }
  .buttons {
    width: 100%;
    font-size: 14px;
  }
  table {
    font-size: 12px;
  }
}

@media (max-width: 600px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  tr {
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 10px;
    background: #fff;
  }
  th {
    display: none;
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
  }
}

  </style>
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
                    <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener">Abrir</a>
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