<?php
require_once '../config/db.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = $_POST['role'];

$sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $username, $password, $role);

if ($stmt->execute()) {
    header("Location: ../public/users.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
