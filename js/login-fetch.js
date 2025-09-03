document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const rememberMe = document.getElementById("rememberMe").checked;
    const usuario = document.getElementById("usuario").value;

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(resp => resp.json())
    .then(data => {
        if (data.success) {
            // Salva ou remove usuário do localStorage conforme checkbox
            if (rememberMe) {
                localStorage.setItem("rememberedUsuario", usuario);
            } else {
                localStorage.removeItem("rememberedUsuario");
            }

            window.location.href = "admin.php"; // ou "admin.php", se preferir
        } else {
            document.getElementById("error-message").textContent = data.message || "Usuário ou senha incorretos.";
        }
    })
    .catch(error => {
        console.error("Erro:", error);
        document.getElementById("error-message").textContent = "Erro na requisição.";
    });
});

// Ao carregar a página, preencher usuário se estiver salvo
document.addEventListener("DOMContentLoaded", function () {
    const savedUsuario = localStorage.getItem("rememberedUsuario");
    if (savedUsuario) {
        document.getElementById("usuario").value = savedUsuario;
        document.getElementById("rememberMe").checked = true;
    }
});
