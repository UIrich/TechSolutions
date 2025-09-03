<?php
include 'db.php';

$id = $_POST['id']; 
$username = $_POST['username'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($senha) {
    $senha = md5($senha); 
}

$sql = "UPDATE usuarios 
        SET username='$username', email='$email', senha='$senha' 
        WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Usuário atualizado com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao atualizar usuário."]);
}

$conn->close();
?>
