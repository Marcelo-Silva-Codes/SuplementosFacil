document.getElementById("formEditarSuplemento").addEventListener("submit", function(e) {
    const nome = document.getElementById("nome").value.trim();
    const preco = parseFloat(document.getElementById("preco").value);
    const qtdTotal = parseInt(document.getElementById("quantidade_total").value);
    const qtdPorcao = parseInt(document.getElementById("quantidade_por_porcao").value);
    const calorias = parseFloat(document.getElementById("calorias").value);

    let mensagens = [];

    if (nome.length < 3) {
      mensagens.push("O nome deve ter pelo menos 3 caracteres.");
    }
    if (isNaN(preco) || preco <= 0) {
      mensagens.push("Preço deve ser maior que zero.");
    }
    if (!isNaN(qtdTotal) && qtdTotal <= 0) {
      mensagens.push("Quantidade total deve ser maior que zero.");
    }
    if (!isNaN(qtdPorcao) && qtdPorcao <= 0) {
      mensagens.push("Quantidade por porção deve ser maior que zero.");
    }
    if (!isNaN(calorias) || calorias < 0) {
      mensagens.push("Calorias não podem ser negativas.");
    }

    if (mensagens.length > 0) {
      e.preventDefault();
      alert(mensagens.join("\n"));
    }
  });

