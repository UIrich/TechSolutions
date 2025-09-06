<?php
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : 'user'; 

$senhaHash = md5($senha); 

$sql = "INSERT INTO usuarios (username, email, senha, cargo) 
        VALUES ('$username', '$email', '$senhaHash', '$cargo')";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Usuário cadastrado com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao cadastrar usuário."]);
}

$conn->close();
?>
