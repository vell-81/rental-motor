<?php
require_once '../includes/db.php';
if (isset($_GET['id'])) {
    mysqli_query($conn, "DELETE FROM motor WHERE id=".$_GET['id']);
}
header("Location: list_motor.php");
exit;
?>
