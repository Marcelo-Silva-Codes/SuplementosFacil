<?php
// app/views/suplementos/home.php
// $lista = array de suplementos vindo do controller
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>SuplementosFácil - Home</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background:#f4f6f9; }

    /* Navbar */
    .navbar {
      background: #333;
      color: #fff;
      padding: 12px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navbar .logo a {
      color: #fff;
      font-size: 20px;
      font-weight: bold;
      text-decoration: none;
    }
    .nav-links { list-style:none; display:flex; gap:15px; margin:0; padding:0; }
    .nav-links li a { color:#fff; text-decoration:none; font-weight:bold; }
    .nav-links li a:hover { color:#ddd; }

    h1 { text-align:center; margin:30px 0; color:#333; }

    /* Cesta */
    .cesta {
      background:#eee;
      padding:10px;
      margin:0 20px 20px;
      border-radius:6px;
    }
    .cesta strong { margin-right:10px; }
    .cesta span { background:#ddd; padding:4px 8px; border-radius:4px; margin-right:8px; }

    .cesta.over {
  background: #cce5ff;
  border: 2px dashed #546b83ff;
}
    /* Grid */
    .grid {
      display:grid;
      grid-template-columns:repeat(auto-fill,minmax(250px,1fr));
      gap:20px;
      margin:0 20px 40px;
    }
    .card {
      background:#fff;
      border:1px solid #ccc;
      border-radius:8px;
      padding:15px;
      text-align:center;
      box-shadow:0 2px 6px rgba(0,0,0,0.1);
      transition:transform 0.2s;
    }
    .card:hover { transform:translateY(-3px); }
    .card img {
      max-width:100%;
      height:150px;
      object-fit:cover;
      border-radius:5px;
    }
    .price { font-weight:bold; color:green; margin:10px 0; }
    .btn {
      background:#007bff;
      color:#fff;
      padding:8px 12px;
      border:none;
      cursor:pointer;
      margin:5px;
      border-radius:4px;
      transition:background 0.3s;
    }
    .btn:hover { background:#0056b3; }

    .feedback {
      background:#dff0d8;
      padding:8px;
      margin:10px 20px;
      border-radius:4px;
      text-align:center;
    }

     footer {
      text-align:center;
      padding:15px;
      background:#333;
      color:#fff;
      font-size:14px;
    }

    /* 📱 Responsividade */
    @media (max-width: 600px) {
      h1 { font-size: 20px; margin:20px 0; }
      .grid { grid-template-columns:1fr; margin:0 10px 20px; }
      .card img { height:120px; }
      .btn { font-size:14px; padding:6px 10px; }
      .cesta { margin:10px; padding:8px; }
    }

  </style>
</head>
<body>
  <nav class="navbar">
    <div class="logo"><a href="index.php?controller=tela&action=home">SuplementosFacil</a></div>
    <ul class="nav-links">
      <li><a href="index.php?controller=usuario&action=login">Login</a></li>
      <li><a href="index.php?controller=usuario&action=cadastrarForm">Registrar</a></li>
    </ul>
  </nav>

  <h1>Busque seus suplementos na tranquilidade</h1>

  <!-- Barra da cesta -->
<div id="cesta" class="cesta">
  <strong>Cesta de comparação:</strong>
  <div id="cesta-itens"><em>Nenhum suplemento na cesta</em></div>
  <button onclick="limparCesta()" class="btn">Limpar cesta</button>
 <a href="#" class="btn" onclick="return abrirComparacao()">Comparar agora</a>
</div>
<script>
function abrirComparacao() {
  const itens = JSON.parse(localStorage.getItem('comparador')) || [];
  if (itens.length === 0) { alert("Nenhum suplemento na cesta!"); return false; }
  const ids = itens.map(i => i.id).join(",");
  window.location.href = "index.php?controller=tela&action=comparar&ids=" + ids;
  return false;
}
</script>



  <!-- Grid de suplementos -->
  <div class="grid">
    <?php foreach ($lista as $s): ?>
      <div class="card">
        <img src="<?= htmlspecialchars($s->getImg()) ?>" alt="<?= htmlspecialchars($s->getNome()) ?>" loading="lazy">
        <h3><?= htmlspecialchars($s->getNome()) ?></h3>
        <p><strong>Marca:</strong> <?= htmlspecialchars($s->getMarca()) ?></p>
        <p class="price">R$ <?= number_format($s->getPreco(), 2, ',', '.') ?></p>
        <button class="btn btn-add"
                data-id="<?= htmlspecialchars($s->getId()) ?>"
                data-nome="<?= htmlspecialchars($s->getNome()) ?>">
          Adicionar ao comparador
        </button>
      </div>
    <?php endforeach; ?>
  </div>

<footer>
    <p>&copy; 2025 SuplementosFacil</p>
</footer>


  <script>
    // Carregar cesta
    function carregarCesta() {
      const itens = JSON.parse(localStorage.getItem('comparador')) || [];
      const cestaDiv = document.getElementById('cesta-itens');
      if (itens.length === 0) {
        cestaDiv.innerHTML = "<em>Nenhum suplemento na cesta</em>";
      } else {
        cestaDiv.innerHTML = itens.map(item =>
          `<span>${item.nome}</span> 
           <button onclick="removerItem(${item.id})">❌</button>`
        ).join(" ");
      }
    }

    // Adicionar item
function adicionarItem(id, nome) {
  let itens = JSON.parse(localStorage.getItem('comparador')) || [];

  // regra de negócio: máximo 3 suplementos
  if (itens.length >= 3) {
    mostrarFeedback("Você só pode comparar no máximo 3 suplementos!");
    return;
  }

  if (!itens.find(item => item.id === id)) {
    itens.push({ id, nome });
    localStorage.setItem('comparador', JSON.stringify(itens));
    mostrarFeedback(`${nome} adicionado!`);
    carregarCesta();
  } else {
    mostrarFeedback(`${nome} já está na cesta!`);
  }
}



    // Remover item
    function removerItem(id) {
      let itens = JSON.parse(localStorage.getItem('comparador')) || [];
      itens = itens.filter(item => item.id !== id);
      localStorage.setItem('comparador', JSON.stringify(itens));
      carregarCesta();
    }

    // Limpar cesta
    function limparCesta() {
      localStorage.removeItem('comparador');
      carregarCesta();
    }

    // Feedback visual
    function mostrarFeedback(msg) {
      const feedback = document.createElement("div");
      feedback.className = "feedback";
      feedback.textContent = msg;
      document.body.prepend(feedback);
      setTimeout(() => feedback.remove(), 2000);
    }

    // Eventos nos botões
    document.querySelectorAll(".btn-add").forEach(btn => {
      btn.addEventListener("click", () => {
        const id = parseInt(btn.dataset.id);
        const nome = btn.dataset.nome;
        adicionarItem(id, nome);
      });
    });

    // Inicializar
    carregarCesta();
  </script>
<script>
  // Função de drag nos cards
  function handleDragStart(e) {
    const id = this.querySelector(".btn-add").dataset.id;
    const nome = this.querySelector(".btn-add").dataset.nome;
    e.dataTransfer.setData("id", id);
    e.dataTransfer.setData("nome", nome);
    e.dataTransfer.effectAllowed = "copy";
    this.classList.add("dragElem");
  }

  function handleDragEnd() {
    this.classList.remove("dragElem");
  }

  // Tornar cada card arrastável
  document.querySelectorAll(".card").forEach(card => {
    card.setAttribute("draggable", "true");
    card.addEventListener("dragstart", handleDragStart);
    card.addEventListener("dragend", handleDragEnd);
  });

  // Área da cesta como dropzone
  const cesta = document.getElementById("cesta");

  cesta.addEventListener("dragover", e => {
    e.preventDefault(); // necessário para permitir o drop
    cesta.classList.add("over");
  });

  cesta.addEventListener("dragleave", () => {
    cesta.classList.remove("over");
  });

  cesta.addEventListener("drop", e => {
    e.preventDefault();
    cesta.classList.remove("over");
    const id = parseInt(e.dataTransfer.getData("id"));
    const nome = e.dataTransfer.getData("nome");
    if (id && nome) {
      adicionarItem(id, nome); // usa sua função já existente
    }
  });
</script>
</body>
</html>