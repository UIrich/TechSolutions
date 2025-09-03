<?php
include 'db.php';

$id = $_POST['id']; 
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$servico = $_POST['servico'];
$mensagem = $_POST['mensagem'];

$sql = "UPDATE mensagens 
        SET nome='$nome', email='$email', telefone='$telefone', servico='$servico', mensagem='$mensagem' 
        WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Mensagem atualizada com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao atualizar mensagem."]);
}
?>
