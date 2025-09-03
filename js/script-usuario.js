// ----------------- Funções de Usuários -----------------
document.addEventListener("DOMContentLoaded", function () {
    loadUsuarios();

    const form = document.getElementById("form-novo-usuario");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const username = form.username.value;
        const email = form.email.value;
        const senha = form.senha.value;

        // Validação simples
        if (!username || !email || !senha) {
            document.getElementById("error-message").textContent = "Todos os campos são obrigatórios.";
            return;
        }

        const formData = new FormData();
        formData.append("username", username);
        formData.append("email", email);
        formData.append("senha", senha);

        const id = form.dataset.id;
        let url = "/techsolutions/backend/create-usuario.php";
        if (id) {
            formData.append("id", id);
            url = "/techsolutions/backend/update-usuario.php";
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert(response.message);
                        form.reset();
                        form.removeAttribute("data-id");
                        loadUsuarios();
                    } else {
                        document.getElementById("error-message").textContent = response.message;
                    }
                } catch (err) {
                    console.error("Erro ao processar JSON:", err);
                    document.getElementById("error-message").textContent = "Erro inesperado.";
                }
            } else {
                document.getElementById("error-message").textContent = "Erro na comunicação com o servidor.";
            }
        };
        xhr.onerror = function () {
            document.getElementById("error-message").textContent = "Erro de rede.";
        };
        xhr.send(formData);
    });
});

function loadUsuarios() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/techsolutions/backend/read-usuario.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const usuarios = JSON.parse(xhr.responseText);
                const tbody = document.querySelector(".data-table tbody");
                tbody.innerHTML = "";

                usuarios.forEach(user => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${user.username}</td>
                        <td>${user.email}</td>
                        <td>
                            <a href="#" class="btn-small btn-blue" aria-label="Editar usuário ${user.username}" onclick="editUsuario(${user.id}, '${user.username}', '${user.email}')">Editar</a>
                            <a href="#" class="btn-small btn-red" aria-label="Apagar usuário ${user.username}" onclick="deleteUsuario(${user.id})">Apagar</a>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            } catch (err) {
                console.error("Erro ao processar JSON:", err);
                document.getElementById("error-message").textContent = "Erro ao carregar usuários.";
            }
        } else {
            document.getElementById("error-message").textContent = "Erro na comunicação com o servidor.";
        }
    };
    xhr.send();
}

function editUsuario(id, username, email) {
    const form = document.getElementById("form-novo-usuario");
    form.username.value = username;
    form.email.value = email;
    form.dataset.id = id;
}

function deleteUsuario(id) {
    if (!confirm("Tem certeza que deseja excluir este usuário?")) return;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/techsolutions/backend/delete-usuario.php?id=" + id, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(response.message);
                    loadUsuarios();
                } else {
                    document.getElementById("error-message").textContent = response.message;
                }
            } catch (err) {
                console.error("Erro ao processar JSON:", err);
                document.getElementById("error-message").textContent = "Erro inesperado.";
            }
        } else {
            document.getElementById("error-message").textContent = "Erro na comunicação com o servidor.";
        }
    };
    xhr.onerror = function () {
        document.getElementById("error-message").textContent = "Erro de rede.";
    };
    xhr.send();
}
