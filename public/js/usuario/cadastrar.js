    document.getElementById("formUsuario").addEventListener("submit", function(e) {
      const nome = document.getElementById("nome").value.trim();
      const sobrenome = document.getElementById("sobrenome").value.trim();
      const email = document.getElementById("email").value.trim();
      const senha = document.getElementById("senha").value.trim();
      const telefone = document.getElementById("telefone").value.trim();

      let mensagens = [];

      if (nome.length < 2) {
        mensagens.push("O nome deve ter pelo menos 2 caracteres.");
      }
      if (sobrenome.length < 2) {
        mensagens.push("O sobrenome deve ter pelo menos 2 caracteres.");
      }
      if (!email.includes("@") || !email.includes(".")) {
        mensagens.push("Informe um email válido.");
      }
      if (senha.length < 6) {
        mensagens.push("A senha deve ter pelo menos 6 caracteres.");
      }
      if (telefone && !/^[0-9]{8,15}$/.test(telefone)) {
        mensagens.push("Telefone deve conter apenas números (8 a 15 dígitos).");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });