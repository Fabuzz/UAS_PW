<?php
session_start();
require_once '../config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT id, username, password, role FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $username, $hashed_password, $role);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        switch ($role) {
            case 'admin':
                header("Location: ../public/admin_dashboard.php");
                break;
            default:
                header("Location: ../public/user_dashboard.php");
                break;
        }
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found.";
}
?>
