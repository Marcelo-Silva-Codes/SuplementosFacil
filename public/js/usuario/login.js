    document.getElementById("formLogin").addEventListener("submit", function(e) {
      const email = document.getElementById("email").value.trim();
      const senha = document.getElementById("senha").value.trim();
      let mensagens = [];

      if (!email.includes("@") || !email.includes(".")) {
        mensagens.push("Informe um email válido.");
      }
      if (senha.length < 6) {
        mensagens.push("A senha deve ter pelo menos 6 caracteres.");
      }

      if (mensagens.length > 0) {
        e.preventDefault();
        alert(mensagens.join("\n"));
      }
    });