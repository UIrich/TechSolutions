<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM empresas WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Empresa excluída com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Ocorreu um erro ao excluir a empresa"]);
}
?>
