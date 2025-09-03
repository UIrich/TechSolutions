<?php
include 'db.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$servico = $_POST['servico'];
$mensagem = $_POST['mensagem'];

$data_envio = date('Y-m-d H:i:s');

$sql = "INSERT INTO mensagens (nome, email, telefone, servico, mensagem, data_envio) 
        VALUES ('$nome', '$email', '$telefone', '$servico', '$mensagem', '$data_envio')";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Mensagem cadastrada com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao cadastrar mensagem."]);
}

$conn->close();
?>
