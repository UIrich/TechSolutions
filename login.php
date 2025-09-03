<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';

    // Corrigido para bater com os nomes do formulário
    $username = $_POST['usuario'] ?? '';
    $password = $_POST['senha'] ?? '';

    if (!$username || !$password) {
        echo json_encode([
            "success" => false,
            "message" => "Usuário e senha são obrigatórios."
        ]);
        exit;
    }

    // Criptografa a senha com MD5 (recomendo mudar no futuro)
    $passwordHash = md5($password);

    // Preparando a consulta
    $stmt = $conn->prepare("SELECT id, username FROM usuarios WHERE username = ? AND senha = ?");
    $stmt->bind_param("ss", $username, $passwordHash);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $user);
        $stmt->fetch();

        // Login bem-sucedido: cria sessão
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $user;

        echo json_encode(["success" => true]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Usuário ou senha incorretos."
        ]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
