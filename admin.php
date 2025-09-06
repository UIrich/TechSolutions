<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

include 'backend/db.php';

$totalUsuarios = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM usuarios");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalUsuarios = $row['total'];
}

$totalMensagens = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM mensagens");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalMensagens = $row['total'];
}

$totalEmpresas = 0;
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM empresas");
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalEmpresas = $row['total'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - TechSolutions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-page">
    <header class="admin-header" role="banner">
        <h1>Painel Administrativo - <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <nav role="navigation" aria-label="Menu do painel administrativo">
            <a href="usuarios.php">Usuários</a>
            <a href="mensagens.php">Mensagens</a>
            <a href="empresas.php">Empresas</a>
            <a href="logout.php" class="btn">Sair</a>
        </nav>
    </header>

<main class="admin-dashboard" id="main-content" aria-label="Visão geral do painel administrativo">
    <section class="welcome-message" role="region" aria-label="Mensagem de boas-vindas">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <h3 align="center">É ótimo ter você de volta ao Painel Administrativo da TechSolutions.</h3>
    </section>

    <section class="card" role="region" aria-labelledby="usuarios-registrados">
        <h3 id="usuarios-registrados">Usuários Registrados</h3>
        <p class="numero"><?php echo $totalUsuarios; ?></p>
    </section>
    <section class="card" role="region" aria-labelledby="mensagens-recebidas">
        <h3 id="mensagens-recebidas">Mensagens Recebidas</h3>
        <p class="numero"><?php echo $totalMensagens; ?></p>
    </section>
    <section class="card" role="region" aria-labelledby="empresas-ativas">
        <h3 id="empresas-ativas">Empresas Ativas</h3>
        <p class="numero"><?php echo $totalEmpresas; ?></p>
    </section>
</main>

</body>
</html>
