<?php
include 'db.php';

$id = $_GET['id']; 

$sql = "DELETE FROM mensagens WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Mensagem excluída com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao excluir mensagem."]);
}
?>
