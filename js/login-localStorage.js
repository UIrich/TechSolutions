// Ao carregar a página, verifica se há um usuário salvo no localStorage
document.addEventListener("DOMContentLoaded", function () {
    const savedUsuario = localStorage.getItem("rememberedUsuario");

    if (savedUsuario) {
        document.getElementById("usuario").value = savedUsuario;
        document.getElementById("rememberMe").checked = true;
    }
});

// Evento de envio do formulário
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = document.getElementById("loginForm");
    const formData = new FormData(form);
    const rememberMe = document.getElementById("rememberMe").checked;
    const usuario = document.getElementById("usuario").value;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);

                if (response.success) {
                    // Salva ou remove o nome de usuário no localStorage
                    if (rememberMe) {
                        localStorage.setItem("rememberedUsuario", usuario);
                    } else {
                        localStorage.removeItem("rememberedUsuario");
                    }

                    // Redireciona para o painel administrativo
                    window.location.href = "admin.php";
                } else {
                    document.getElementById("error-message").textContent = response.message || "Usuário ou senha incorretos.";
                }
            } catch (err) {
                document.getElementById("error-message").textContent = "Erro inesperado ao processar a resposta.";
            }
        } else {
            document.getElementById("error-message").textContent = "Erro na requisição ao servidor.";
        }
    };

    xhr.onerror = function () {
        document.getElementById("error-message").textContent = "Erro de rede. Verifique sua conexão.";
    };

    xhr.send(formData);
});
