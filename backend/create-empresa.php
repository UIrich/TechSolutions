<?php
include 'db.php';

$empresa = $_POST['empresa'];
$dono = $_POST['dono'];
$cnpj = $_POST['cnpj'];
$tipo_servico = $_POST['tipo_servico'];
$status = $_POST['status']; 

$sql = "INSERT INTO empresas (empresa, dono, cnpj, tipo_servico, status) 
        VALUES ('$empresa', '$dono', '$cnpj', '$tipo_servico', '$status')";

if ($conn->query($sql)) {
    echo json_encode(["success" => true, "message" => "Empresa cadastrada com sucesso."]);
} else {
    echo json_encode(["success" => false, "message" => "Ocorreu um erro ao cadastrar a empresa"]);
}
?>
