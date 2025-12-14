    // Validação extra em JS
    document.getElementById("formEditarNutriente").addEventListener("submit", function(e) {
      const nome = document.getElementById("nome").value.trim();
      const tipo = document.getElementById("tipo").value.trim();
      let mensagens = [];

      if (nome.length < 3) {
        mensagens.push("O nome do nutriente deve ter pelo menos 3 caracteres.");
      }
      if (tipo.length > 0 && tipo.length < 2) {
        mensagens.push("Se informado, o campo Tipo deve ter pelo menos 2 caracteres.");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });