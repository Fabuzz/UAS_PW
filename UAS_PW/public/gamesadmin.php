<?php
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM games WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $game = $result->fetch_assoc();
    } else {
        echo "Game not found.";
        exit();
    }
} else {
    echo "ID parameter is missing.";
    exit();
}
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <a href="user.php" class="nav-link"><i class="fas fa-users"></i> Users</a>
            </li>
            <li class="nav-item">
                <a href="reports.php" class="nav-link"><i class="fas fa-chart-line"></i> Reports</a>
            </li>
            <li class="nav-item">
                <a href="../actions/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <main class="pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                    <div class="game-details">
                        <h2 class="text-dark"><?php echo $game['nama']; ?></h2>
                        <p class="text-dark"><?php echo $game['description']; ?></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                            <h5 class="card-title">Game Information</h5>
                            <ul class="list-unstyled">
                                <li><strong>Name: <?php echo $game['nama']; ?></strong></li>
                                <li><strong>Genre: <?php echo $game['genre']; ?></strong></li>
                                <li><strong>Developer: <?php echo $game['developer']; ?></strong></li>
                                <li><strong>Publisher: <?php echo $game['publisher']; ?></strong></li>
                                <li><strong>Release Date: <?php echo $game['release_date']; ?></strong></li>
                                    <a href="games_edit.php?id=<?php echo $game['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="../actions/delete_game.php?id=<?php echo $game['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this game?');">Delete</a>
                            </ul>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </main>

</body>
    <footer class=" text-dark py-5">
        <div class="text-center">
            <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
        </div>
    </footer>

    

</html>