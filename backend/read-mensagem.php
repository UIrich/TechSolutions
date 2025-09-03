<?php
include 'db.php';

$sql = "SELECT * FROM mensagens ORDER BY data_envio DESC";
$result = $conn->query($sql);

$mensagens = [];
while ($row = $result->fetch_assoc()) {
    $mensagens[] = $row;
}

header('Content-Type: application/json');
echo json_encode($mensagens);
?>
