<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if id is numeric
    if (is_numeric($id)) {
        // Prepare and execute the SQL statement
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('i', $id);
            $execute = $stmt->execute();

            // Check for execution success
            if ($execute) {
                header("Location: ../public/users.php");
                exit();
            } else {
                echo "Error executing query: " . $stmt->error;
            }
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "ID parameter is not valid.";
    }
} else {
    echo "ID parameter is missing.";
}
?>
