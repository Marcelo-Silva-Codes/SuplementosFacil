
function abrirComparacao() {
  const itens = JSON.parse(localStorage.getItem('comparador')) || [];
  if (itens.length === 0) { alert("Nenhum suplemento na cesta!"); return false; }
  const ids = itens.map(i => i.id).join(",");
  window.location.href = "index.php?controller=tela&action=comparar&ids=" + ids;
  return false;
}



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
