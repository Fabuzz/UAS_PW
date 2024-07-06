<?php
require_once '../config/db.php';

if (!isset($_GET['id'])) {
    echo "ID parameter is missing.";
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM games WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../public/admin_dashboard.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>
