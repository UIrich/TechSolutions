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
    <title>Mensagens - TechSolutions</title>     
    <link rel="stylesheet" href="style.css"> 
</head> 

<body class="admin-page">     
    <header class="admin-header" role="banner">         
        <h1>Mensagens Recebidas</h1>         
        <nav role="navigation" aria-label="Menu administrativo">             
            <a href="admin.php">Voltar</a>         
        </nav>     
    </header>      

    <main class="table-container" id="main-mensagens" aria-label="Tabela de mensagens recebidas">         
        <!-- Tabela de Mensagens -->
        <table class="data-table" role="table">             
            <thead>                 
                <tr>                     
                    <th scope="col">Nome</th>                     
                    <th scope="col">E-mail</th>                     
                    <th scope="col">Telefone</th>                     
                    <th scope="col">Serviço</th>                     
                    <th scope="col">Data</th>                     
                    <th scope="col">Mensagem</th>       
                    <th scope="col">Ações</th>                 
                </tr>             
            </thead>             
            <tbody id="mensagemTable">
                <!-- Mensagens carregadas via JS -->
            </tbody>         
        </table>

        <!-- Mensagem de erro -->
        <div id="mensagem-error" role="alert" aria-live="polite"></div>

        <!-- Formulário Mensagens -->
        <form id="form-nova-mensagem" aria-label="Formulário para adicionar nova mensagem">
            <h2>Adicionar Nova Mensagem</h2>

            <input type="text" id="mensagem-nome" name="nome" placeholder="Nome..." required>
            <input type="email" id="mensagem-email" name="email" placeholder="E-mail..." required>
            <input type="tel" id="mensagem-telefone" name="telefone" placeholder="Telefone..." required>
            
            <select id="mensagem-servico" name="servico" required>
                <option value="">Selecione um serviço</option>
                <option value="Sistema Web">Sistema Web</option>
                <option value="Aplicativo Mobile">Aplicativo Mobile</option>
                <option value="Consultoria">Consultoria</option>
                <option value="Outro">Outro</option>
            </select>

            <textarea id="mensagem-texto" name="mensagem" placeholder="Digite a mensagem..." required></textarea>

            <button type="submit" class="btn">Enviar Mensagem</button>
        </form>
    </main>

    <script src="js/script-mensagem.js"></script>
</body> 
</html>
