// ----------------- Funções de Mensagens -----------------
document.addEventListener("DOMContentLoaded", function () {
    loadMensagens();

    const form = document.getElementById("form-nova-mensagem");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const nome = form.nome.value;
        const email = form.email.value;
        const telefone = form.telefone.value;
        const servico = form.servico.value;
        const mensagem = form.mensagem.value;

        const formData = new FormData();
        formData.append("nome", nome);
        formData.append("email", email);
        formData.append("telefone", telefone);
        formData.append("servico", servico);
        formData.append("mensagem", mensagem);

        const id = form.dataset.id;
        let url = "/techsolutions/backend/create-mensagem.php";
        if (id) {
            formData.append("id", id);
            url = "/techsolutions/backend/update-mensagem.php";
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
                        loadMensagens();
                        document.getElementById("mensagem-error").textContent = "";
                    } else {
                        document.getElementById("mensagem-error").textContent = response.message;
                    }
                } catch (err) {
                    console.error("Erro ao processar JSON:", err);
                    document.getElementById("mensagem-error").textContent = "Erro inesperado.";
                }
            } else {
                document.getElementById("mensagem-error").textContent = "Erro na comunicação com o servidor.";
            }
        };
        xhr.onerror = function () {
            document.getElementById("mensagem-error").textContent = "Erro de rede.";
        };
        xhr.send(formData);
    });
});

function loadMensagens() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/techsolutions/backend/read-mensagem.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const mensagens = JSON.parse(xhr.responseText);
                const tbody = document.querySelector(".data-table tbody");
                tbody.innerHTML = "";

                mensagens.forEach(msg => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${msg.nome}</td>
                        <td>${msg.email}</td>
                        <td>${msg.telefone}</td>
                        <td>${msg.servico}</td>
                        <td>${msg.data_envio}</td>
                        <td>${msg.mensagem}</td>
                        <td>
                            <a href="#" class="btn-small btn-blue" aria-label="Editar mensagem de ${msg.nome}" onclick="editMensagem(${msg.id}, '${msg.nome}', '${msg.email}', '${msg.telefone}', '${msg.servico}', '${msg.mensagem}')">Editar</a>
                            <a href="#" class="btn-small btn-red" aria-label="Apagar mensagem de ${msg.nome}" onclick="deleteMensagem(${msg.id})">Apagar</a>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            } catch (err) {
                console.error("Erro ao processar JSON:", err);
                document.getElementById("mensagem-error").textContent = "Erro ao carregar mensagens.";
            }
        } else {
            document.getElementById("mensagem-error").textContent = "Erro na comunicação com o servidor.";
        }
    };
    xhr.send();
}

function editMensagem(id, nome, email, telefone, servico, mensagem) {
    const form = document.getElementById("form-nova-mensagem");
    form.nome.value = nome;
    form.email.value = email;
    form.telefone.value = telefone;
    form.servico.value = servico;
    form.mensagem.value = mensagem;
    form.dataset.id = id;
}

function deleteMensagem(id) {
    if (!confirm("Tem certeza que deseja excluir esta mensagem?")) return;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/techsolutions/backend/delete-mensagem.php?id=" + id, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(response.message);
                    loadMensagens();
                } else {
                    document.getElementById("mensagem-error").textContent = response.message;
                }
            } catch (err) {
                console.error("Erro ao processar JSON:", err);
                document.getElementById("mensagem-error").textContent = "Erro inesperado.";
            }
        } else {
            document.getElementById("mensagem-error").textContent = "Erro na comunicação com o servidor.";
        }
    };
    xhr.onerror = function () {
        document.getElementById("mensagem-error").textContent = "Erro de rede.";
    };
    xhr.send();
}
