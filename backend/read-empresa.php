<?php
include 'db.php';

$sql = "SELECT * FROM empresas ORDER BY status = 'Ativo' DESC";
$result = $conn->query($sql);

$empresas = [];
while ($row = $result->fetch_assoc()) {
    $empresas[] = $row;
}

header('Content-Type: application/json');
echo json_encode($empresas);
?>
