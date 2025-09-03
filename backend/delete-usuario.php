<?php
include 'db.php';

$id = $_GET['id']; 

$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Usuário excluído com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Erro ao excluir usuário."]);
}
?>
