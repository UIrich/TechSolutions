// ----------------- Funções de Empresas -----------------
document.addEventListener("DOMContentLoaded", function () {
    loadEmpresas();

    const form = document.getElementById("form-nova-empresa");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        
        const empresa = form.empresa.value;
        const dono = form.dono.value;
        const cnpj = form.cnpj.value;
        const tipo_servico = form.tipo_servico.value;
        const status = form.status.value;

        const formData = new FormData();
        formData.append("empresa", empresa);
        formData.append("dono", dono);
        formData.append("cnpj", cnpj);
        formData.append("tipo_servico", tipo_servico);
        formData.append("status", status);

        const id = form.dataset.id; 
        let url = "/techsolutions/backend/create-empresa.php"; 
        if (id) {
            formData.append("id", id);
            url = "/techsolutions/backend/update-empresa.php"; 
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
                        loadEmpresas();
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

function loadEmpresas() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/techsolutions/backend/read-empresa.php", true); 
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const empresas = JSON.parse(xhr.responseText);
                const tbody = document.querySelector(".data-table tbody");
                tbody.innerHTML = "";

                empresas.forEach(emp => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${emp.empresa}</td>
                        <td>${emp.dono}</td>
                        <td>${emp.cnpj}</td>
                        <td>${emp.tipo_servico}</td>
                        <td class="${emp.status.toLowerCase() === 'ativo' ? 'status-ativo' : 'status-inativo'}">${emp.status}</td>
                        <td>
                            <a href="#" class="btn-small btn-blue" aria-label="Editar empresa ${emp.empresa}" onclick="editEmpresa(${emp.id}, '${emp.empresa}', '${emp.dono}', '${emp.cnpj}', '${emp.tipo_servico}', '${emp.status}')">Editar</a>
                            <a href="#" class="btn-small btn-red" aria-label="Apagar empresa ${emp.empresa}" onclick="deleteEmpresa(${emp.id})">Apagar</a>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            } catch (err) {
                console.error("Erro ao processar JSON:", err);
                document.getElementById("error-message").textContent = "Erro ao carregar empresas.";
            }
        } else {
            document.getElementById("error-message").textContent = "Erro na comunicação com o servidor.";
        }
    };
    xhr.send();
}

function editEmpresa(id, empresa, dono, cnpj, tipo_servico, status) {
    const form = document.getElementById("form-nova-empresa");
    form.empresa.value = empresa;
    form.dono.value = dono;
    form.cnpj.value = cnpj;
    form.tipo_servico.value = tipo_servico;
    form.status.value = status;
    form.dataset.id = id; 
}

function deleteEmpresa(id) {
    if (!confirm("Tem certeza que deseja excluir esta empresa?")) return;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "/techsolutions/backend/delete-empresa.php?id=" + id, true); 
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    alert(response.message);
                    loadEmpresas();
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
