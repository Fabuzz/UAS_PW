<?php
require_once '../config/db.php';

$sql = "SELECT id, username, role FROM users";
$result = $conn->query($sql);

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/reports.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Users</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <a href="create_user.php" class="btn btn-success mb-3">Add User</a>
        <div class="card">
        <div class="card-header">
                    User List
                </div>
                <div class="card-body">
        <table class="table table-striped" style="background-color: #fff5cc;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td>
                        <a href="update_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="../actions/delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
                </div>
        </div><br>
        <a href="admin_dashboard.php" class="btn btn-secondary mb-3">Kembali ke Home</a>
    </div>
</body>
</html>
