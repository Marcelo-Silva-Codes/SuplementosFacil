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
 