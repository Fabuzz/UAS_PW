<?php
session_start();
require_once '../config/db.php';

$sql = "SELECT id, nama, genre, description, developer, publisher, release_date, image FROM games";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Game Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Chart.js for charts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3">
        <h3 class="text-dark">Admin Dashboard</h3>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin_dashboard.php" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link"><i class="fas fa-users"></i> Users</a>
            </li>
            <li class="nav-item">
                <a href="reports.php" class="nav-link"><i class="fas fa-chart-line"></i> Reports</a>
            </li>
            <li class="nav-item">
                <a href="../actions/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <section class="library py-5 bg-light">
            <div class="container">
                <div class="mb-4">
                    <a href="addgame_admin.php" class="btn btn-success">Add New Game</a>
                </div>
                <h2 class="text-center mb-4">Game Store</h2>
                <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="<?php echo $row['nama']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                        <a href="gamesadmin.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
                <?php endwhile; ?>
            </div>
            </div>
    </section>
</body>
<footer class="text-dark">
    <div class="container text-center">
        <p>&copy; 2024 GameStore. All rights reserved.</p>
    </div>
</footer>
</html>