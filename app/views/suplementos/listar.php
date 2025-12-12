<?php
// app/views/suplementos/listar.php
require_once __DIR__ . '/../../dao/SuplementoNutrienteDAO.php';
$snDao = new SuplementoNutrienteDAO();
?>
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
    .navbar {
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
    }

    /* Table */

    

    table {
      border-collapse: collapse;
      width: 90%;
      margin: 0 20px 40px;
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    thead {
      background: #007bff;
      color: #fff;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
      vertical-align: middle;
    }

    tr:nth-child(even) {
      background: #f9f9f9;
    }

    tr:hover {
      background: #f1f1f1;
    }

    ul {
      margin: 0;
      padding-left: 20px;
      text-align: left;
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
      text-decoration: underline;
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
  </style>
</head>

<body>

  <!-- Navbar ADM -->
  <nav class="navbar">
    <div class="logo">Painel ADM</div>
    <div class="logout">
      <a href="index.php?controller=usuario&action=logout">Sair</a>
    </div>
  </nav>
  <!-- Menu expansível -->
  <div class="container">
    <button class="buttons"> Suplementos</button>
    <div class="panel">
      <a href="index.php?controller=suplemento&action=listar">Listar Suplementos</a>
      <a href="index.php?controller=suplemento&action=cadastrarForm">Cadastrar Suplemento</a>
    </div>

    <button class="buttons"> Categorias</button>
    <div class="panel">
      <a href="index.php?controller=categoria&action=listar">Listar Categorias</a>
      <a href="index.php?controller=categoria&action=cadastrarForm">Cadastrar Categoria</a>

    </div>

    <button class="buttons"> Nutrientes</button>
    <div class="panel">
      <a href="index.php?controller=nutriente&action=listar">Listar Nutrientes</a>
      <a href="index.php?controller=nutriente&action=cadastrarForm">Cadastrar Nutriente</a>
    </div>
  </div>


  <h1>Suplementos Cadastrados</h1>

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
            <?php
            $rels = $snDao->buscarNutrientesPorSuplemento($s->getId());
            if (!empty($rels)) {
              echo "<ul>";
              foreach ($rels as $r) {
                echo "<li>"
                  . htmlspecialchars($r['nutriente_nome'])
                  . " — " . number_format((float)$r['quantidade'], 1, ',', '.')
                  . " " . htmlspecialchars($r['unidade_medida'])
                  . "</li>";
              }
              echo "</ul>";
            } else {
              echo "<em>—</em>";
            }
            ?>
          </td>
          <td><?= htmlspecialchars($s->getCalorias()) ?></td>
          <td>
            <?php $url = $s->getLink(); ?>
            <?php if (!empty($url)): ?>
              <a href="<?= htmlspecialchars($url) ?>" target="_blank">Abrir</a>
            <?php else: ?>
              <em>—</em>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($s->getImg()): ?>
              <img src="<?= htmlspecialchars($s->getImg()) ?>" alt="Imagem de <?= htmlspecialchars($s->getNome()) ?>" style="max-width:80px; max-height:80px; border-radius:4px;">
            <?php else: ?>
              <em>Sem imagem</em>
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($s->getQuantidadeTotal()) ?></td>
          <td><?= htmlspecialchars($s->getQuantidadeTotalUM()) ?></td>
          <td class="restricoes">
            <?php if ($s->isVegano()): ?><span>Vegano</span><?php endif; ?>
            <?php if ($s->isGluten()): ?><span>Contém glúten</span><?php endif; ?>
            <?php if ($s->isLactose()): ?><span>Contém lactose</span><?php endif; ?>
          </td>
          <td class="table-actions">
            <a href="index.php?controller=suplemento&action=editarForm&id=<?= $s->getId() ?>">✏️ Editar</a> |
            <a href="index.php?controller=suplemento&action=deletar&id=<?= $s->getId() ?>"
              onclick="return confirm('Confirma exclusão?')">🗑️ Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>