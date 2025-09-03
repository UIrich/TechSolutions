<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Empresas - TechSolutions</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="admin-page">
    <header class="admin-header" role="banner">
        <h1>Empresas Parceiras</h1>
        <nav role="navigation" aria-label="Menu de empresas">
            <a href="admin.php">Voltar</a>
        </nav>
    </header>

<main class="table-container" id="main-content" aria-label="Tabela de empresas parceiras">

    <table class="data-table" role="table" aria-describedby="Lista de empresas parceiras cadastradas">
        <thead>
            <tr>
                <th scope="col">Empresa</th>
                <th scope="col">Dono</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Tipo de Serviço</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Conteúdo carregado via JS -->
        </tbody>
    </table>

    <!-- Mensagem de erro -->
    <div id="error-message" role="alert" aria-live="polite"></div>

    <!-- Formulário para adicionar ou atualizar empresa -->
    <form id="form-nova-empresa" aria-label="Formulário para cadastrar nova empresa">
        <h2>Cadastrar/Atualizar Empresa</h2>

        <input type="text" name="empresa" placeholder="Nome da Empresa" required />
        <input type="text" name="dono" placeholder="Nome do Dono" required />
        <input type="text" name="cnpj" placeholder="CNPJ (ex: 00.000.000/0001-00)" required />

        <select name="tipo_servico" required>
            <option value="">Tipo de Serviço</option>
            <option value="Sistema Web">Sistema Web</option>
            <option value="Aplicativo Mobile">Aplicativo Mobile</option>
            <option value="Consultoria">Consultoria</option>
            <option value="Outro">Outro</option>
        </select>

        <select name="status" required>
            <option value="">Status</option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
        </select>

        <button type="submit" class="btn">Cadastrar Empresa</button>
    </form>
</main>


    <script src="js/script-empresa.js"></script>
</body>
</html>
