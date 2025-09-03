<?php
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senhaHash = md5($senha);

$sql = "INSERT INTO usuarios (username, email, senha) 
        VALUES ('$username', '$email', '$senhaHash')";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Usuário cadastrado com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao cadastrar usuário."]);
}

$conn->close();
?>
