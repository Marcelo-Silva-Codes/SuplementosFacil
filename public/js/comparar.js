
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
