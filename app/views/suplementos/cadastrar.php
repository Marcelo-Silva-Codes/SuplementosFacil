<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Suplemento</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }

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

    .container {
      max-width: 800px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
    form input[type="number"],
    form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 18px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    form input:focus,
    form select:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0,123,255,0.4);
      outline: none;
    }

    h3 {
      margin-top: 30px;
      color: #555;
      border-bottom: 1px solid #ddd;
      padding-bottom: 5px;
    }

    .nutriente-item {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 10px;
      margin-bottom: 12px;
      padding: 8px;
      background: #f9f9f9;
      border-radius: 4px;
    }

    .nutriente-item label {
      font-weight: normal;
      margin: 0;
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

    .link-inline {
      font-size: 13px;
      margin-left: 8px;
      color: #007bff;
      text-decoration: none;
    }

    .link-inline:hover {
      text-decoration: underline;
    }

        footer {
      text-align: center;
      padding: 15px;
      background: #333;
      color: #fff;
      font-size: 14px;
    }

    /* 📱 Responsividade */
    @media (max-width: 600px) {
      .container {
        margin: 20px;
        padding: 20px;
      }
      form input[type="text"],
      form input[type="number"],
      form select {
        font-size: 14px;
        padding: 8px;
      }
      button {
        font-size: 14px;
        padding: 10px;
      }
      .nutriente-item {
        flex-direction: column;
        align-items: flex-start;
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

  <div class="container">
    <h1>Cadastrar Novo Suplemento</h1>

    <form id="formSuplemento" action="index.php?controller=suplemento&action=cadastrar" method="POST" enctype="multipart/form-data">

      <label>Nome:</label>
      <input type="text" name="nome" required minlength="3">

      <label>Categoria:</label>
      <select name="categoria_id" required>
        <option value="">-- Selecione categoria --</option>
        <?php foreach ($categorias as $c): ?>
          <option value="<?= $c->getId(); ?>">
            <?= htmlspecialchars($c->getNome()); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <a href="index.php?controller=categoria&action=cadastrarForm" class="link-inline">Nova Categoria</a><br><br>

      <label>Forma de Apresentação:</label>
      <select name="forma_apresentacao" required>
        <option value="">-- Selecione forma --</option>
        <option value="cápsulas">Cápsulas</option>
        <option value="pó">Pó</option>
        <option value="líquido">Líquido</option>
        <option value="tabletes">Tabletes</option>
      </select>

      <label>Quantidade Total do Produto:</label>
      <input type="number" name="quantidade_total" required min="1">

      <label>Unidade de Medida da Quantidade Total:</label>
      <input type="text" name="quantidade_total_UM" required>

      <label>Quantidade por Porção:</label>
      <input type="number" name="quantidade_por_porcao" required min="1">

      <label>Unidade de Medida da Quantidade por Porção:</label>
      <input type="text" name="quantidade_por_porcao_UM" required>

      <label>Calorias por Porção:</label>
      <input type="number" name="calorias" required min="0">

      <label>Sabor:</label>
      <input type="text" name="sabor" required>

      <label>Preço (R$):</label>
      <input type="number" step="0.01" name="preco" required min="0.01">

      <label>Marca:</label>
      <input type="text" name="marca">

      <label>Imagem:</label>
      <input type="file" name="img" accept="image/*">
      <br><br>

      <label>Link:</label>
      <input type="url" name="link">

      <h3>Nutrientes</h3>
      <?php if (!empty($nutrientes)): ?>
        <?php foreach ($nutrientes as $n): ?>
          <div class="nutriente-item">
            <input type="checkbox" name="nutrientes[]" value="<?= $n->getId(); ?>" id="nut_<?= $n->getId(); ?>">
            <label for="nut_<?= $n->getId(); ?>"><?= htmlspecialchars($n->getNome()); ?></label>
            <span>Qtd:</span>
            <input type="number" name="qtd_<?= $n->getId(); ?>" step="any" min="0" style="width:80px;">
            <span>UM:</span>
            <input type="text" name="un_<?= $n->getId(); ?>" style="width:80px;">
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Nenhum nutriente cadastrado. <a href="index.php?c=nutriente&a=cadastrarForm">Cadastre um nutriente primeiro</a></p>
      <?php endif; ?>

      <h3>Restrições / Propriedades Alimentares</h3>
      <div class="checkbox-group">
        <label><input type="checkbox" name="vegano"> Vegano</label>
        <label><input type="checkbox" name="gluten"> Sem Glúten</label>
        <label><input type="checkbox" name="lactose"> Sem Lactose</label>
      </div>

      <button type="submit">Salvar Suplemento</button>
      <br><br>
      <button type="reset">Limpar Formulário</button>

    </form>
  </div>
  <footer>
    <p>&copy; 2025 SuplementosFacil - Painel ADM</p>
  </footer>
  <script>
    // Validação extra em JS
    document.getElementById("formSuplemento").addEventListener("submit", function(e) {
      const nome = this.nome.value.trim();
      const preco = parseFloat(this.preco.value);
      const qtdTotal = parseInt(this.quantidade_total.value);

      let mensagens = [];

      if (nome.length < 3) {
        mensagens.push("O nome deve ter pelo menos 3 caracteres.");
      }
      if (isNaN(preco) || preco <= 0) {
        mensagens.push("Preço deve ser maior que zero.");
      }
      if (isNaN(qtdTotal) || qtdTotal <= 0) {
        mensagens.push("Quantidade total deve ser maior que zero.");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });
  </script>
</body>
</html>
