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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - TechSolutions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-page">
    <header class="admin-header" role="banner">
        <h1>Gerenciamento de Usuários</h1>
        <nav role="navigation" aria-label="Menu administrativo">
            <a href="admin.php">Voltar</a>
        </nav>
    </header>

    <main class="table-container" id="main-usuarios" aria-label="Tabela de usuários">
        <table class="data-table" role="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody id="usuarioTable">
                <!-- Usuários carregados via JS -->
            </tbody>
        </table>

        <!-- Mensagem de erro -->
        <div id="error-message" role="alert" aria-live="polite"></div>

        <!-- Formulário para adicionar ou atualizar usuário -->
        <form id="form-novo-usuario" aria-label="Formulário para adicionar novo usuário">
            <h2>Cadastrar/Atualizar Usuário</h2>

            <input type="text" id="username" name="username" placeholder="Nome de usuário..." required>
            <input type="email" id="email" name="email" placeholder="E-mail..." required>
            <input type="password" id="senha" name="senha" placeholder="Senha..." required>

            <button type="submit" class="btn">Salvar Usuário</button>
        </form>
    </main>

    <script src="js/script-usuario.js"></script>
</body>
</html>
