<?php
include 'db.php';

$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $conn->query($sql);

$usuarios = [];
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

header('Content-Type: application/json');
echo json_encode($usuarios);
?>
