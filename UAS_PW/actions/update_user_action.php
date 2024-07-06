<?php
require_once '../config/db.php';

$id = $_POST['id'];
$username = $_POST['username'];
$role = $_POST['role'];

$sql = "UPDATE users SET username = ?, role = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssi', $username, $role, $id);

if ($stmt->execute()) {
    header("Location: ../public/users.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
