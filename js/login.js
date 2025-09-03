// ==============================
// Funções auxiliares para cookies
// ==============================

function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 864e5).toUTCString();
    document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/`;
}

function getCookie(name) {
    return document.cookie
        .split('; ')
        .find(row => row.startsWith(name + '='))
        ?.split('=')[1];
}

// ==============================
// Preenche o campo se o cookie existir
// ==============================

document.addEventListener("DOMContentLoaded", function () {
    const savedUser = getCookie("usuario");

    if (savedUser) {
        document.getElementById("usuario").value = decodeURIComponent(savedUser);
        document.getElementById("rememberMe").checked = true;
    }
});

// ==============================
// Lida com o envio do formulário
// ==============================

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Evita envio padrão

    const usuario = document.getElementById("usuario").value.trim();
    const senha = document.getElementById("senha").value.trim();
    const remember = document.getElementById("rememberMe").checked;
    const errorMessage = document.getElementById("error-message");

    errorMessage.textContent = ""; // Limpa mensagens anteriores

    // Validação básica
    if (!usuario || !senha) {
        errorMessage.textContent = "Por favor, preencha todos os campos.";
        return;
    }

    const formData = new FormData();
    formData.append("usuario", usuario);
    formData.append("senha", senha);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);

                if (response.success) {
                    // Armazenar ou remover cookie
                    if (remember) {
                        setCookie("usuario", usuario, 30); // Salva por 30 dias
                    } else {
                        setCookie("usuario", "", -1); // Remove o cookie
                    }

                    // Redireciona após login bem-sucedido
                    window.location.href = "admin.php";
                } else {
                    errorMessage.textContent = response.message || "Usuário ou senha incorretos.";
                }
            } catch (err) {
                errorMessage.textContent = "Erro inesperado ao processar a resposta.";
            }
        } else {
            errorMessage.textContent = "Erro ao conectar com o servidor.";
        }
    };

    xhr.onerror = function () {
        errorMessage.textContent = "Erro de rede. Verifique sua conexão.";
    };

    xhr.send(formData);
});