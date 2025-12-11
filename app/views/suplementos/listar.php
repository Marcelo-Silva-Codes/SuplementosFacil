<?php
// app/views/suplementos/listar.php
require_once __DIR__ . '/../../dao/SuplementoNutrienteDAO.php';
$snDao = new SuplementoNutrienteDAO();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Suplementos</title>
    <style>
      table { border-collapse: collapse; width: 100%; }
      th, td { border: 1px solid #666; padding: 8px; text-align: left; }
      ul { margin: 0; padding-left: 20px; }
      .restricoes span { display: inline-block; margin-right: 8px; background: #dff0d8; padding: 2px 6px; border-radius: 4px; }
    </style>
</head>
<body>
  <h1>Suplementos Cadastrados</h1>
  <a href="index.php?controller=suplemento&action=cadastrarForm">Novo Suplemento</a> |
  <a href="index.php?controller=categoria&action=cadastrarForm">Nova Categoria</a> |
  <a href="index.php?controller=nutriente&action=cadastrarForm">Novo Nutriente</a>
  <br><br>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço (R$)</th>
        <th>Composição (Nutrientes)</th>
        <th>Calorias</th>
        <th>link</th>
        <th>IMG</th>
        <th>quantidade total</th>
        <th>unidade</th>
        <th>Restrições Alimentares</th>
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
                   . " — " . htmlspecialchars($r['quantidade'])
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
        <td><?php 
  $url = $s->getLink();
  if (!empty($url)):
?>
  <a href="<?= htmlspecialchars($url) ?>" target="_blank"> Link do Suplemento</a>
<?php else: ?>
  <em>—</em>
<?php endif; ?>
</td>
        <td>
          <?php if ($s->getImg()): ?>
            <img src="<?= htmlspecialchars($s->getImg()) ?>" alt="Imagem de <?= htmlspecialchars($s->getNome()) ?>" style="max-width:100px; max-height:100px;">
          <?php else: ?>
            <em>Sem imagem</em>
          <?php endif; ?>
        </td>
        
        <td><?= htmlspecialchars($s->getQuantidadeTotal()) ?></td>
        <td><?= htmlspecialchars($s->getQuantidadeTotalUM()) ?></td>
        <td class="restricoes">
          <?php if ($s->isVegano()): ?>
            <span>Vegano</span>
          <?php endif; ?>
          <?php if ($s->isGluten()): ?>
            <span>Contém glúten</span>
          <?php endif; ?>
          <?php if ($s->isLactose()): ?>
            <span>Contém lactose</span>
          <?php endif; ?>
        </td>
        <td>
          <a href="index.php?controller=suplemento&action=editarForm&id=<?= $s->getId() ?>">Editar</a> |
          <a href="index.php?controller=suplemento&action=deletar&id=<?= $s->getId() ?>"
             onclick="return confirm('Confirma exclusão?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
