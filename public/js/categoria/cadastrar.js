    // Validação extra em JS
    document.getElementById("formCategoria").addEventListener("submit", function(e) {
      const nome = document.getElementById("nome").value.trim();
      let mensagens = [];

      if (nome.length < 3) {
        mensagens.push("O nome da categoria deve ter pelo menos 3 caracteres.");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });