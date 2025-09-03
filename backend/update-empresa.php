<?php
include 'db.php';

$id = $_POST['id'];
$empresa = $_POST['empresa'];
$dono = $_POST['dono'];
$cnpj = $_POST['cnpj'];
$tipo_servico = $_POST['tipo_servico'];
$status = $_POST['status'];

$sql = "UPDATE empresas 
        SET empresa='$empresa', dono='$dono', cnpj='$cnpj', tipo_servico='$tipo_servico', status='$status' 
        WHERE id=$id";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Empresa alterada com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Ocorreu um erro ao alterar a empresa"]);
}
?>
