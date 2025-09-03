// Função para definir cookie
function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 864e5).toUTCString();
    document.cookie = `${name}=${encodeURIComponent(value)}; expires=${expires}; path=/`;
}

// Função para obter cookie
function getCookie(name) {
    const cookie = document.cookie
        .split('; ')
        .find(row => row.startsWith(name + '='));
    return cookie ? decodeURIComponent(cookie.split('=')[1]) : null;
}

// Quando a página carrega, preenche o campo usuário se cookie existir
document.addEventListener("DOMContentLoaded", function () {
    const savedUsername = getCookie("username");
    if (savedUsername) {
        document.getElementById("username").value = savedUsername;
        document.getElementById("rememberMe").checked = true;
    }
});

// Manipula o envio do formulário
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    const remember = document.getElementById("rememberMe").checked;
                    const username = document.getElementById("username").value;

                    if (remember) {
                        setCookie("username", username, 30); // cookie válido por 30 dias
                    } else {
                        setCookie("username", "", -1); // apaga o cookie
                    }

                    window.location.href = "admin.php";
                } else {
                    document.getElementById("error-message").textContent = response.message;
                }
            } catch (err) {
                document.getElementById("error-message").textContent = "Erro inesperado.";
                console.error("Parsing error:", err);
            }
        } else {
            document.getElementById("error-message").textContent = "Erro na requisição.";
        }
    };

    xhr.onerror = function () {
        document.getElementById("error-message").textContent = "Erro de rede.";
    };

    xhr.send(formData);
});
