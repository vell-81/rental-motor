<?php
include 'includes/db.php';

$sql = "SELECT * FROM motor ORDER BY id DESC";
$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
$conn->close();
?>
