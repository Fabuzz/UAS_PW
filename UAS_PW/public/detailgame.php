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
    <title>Game Detail - GameStore</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/detailgame.css">
</head>
<body>
    <header class=" text-light py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="user_dashboard.php" class="text-dark font-weight-bold">GameStore</a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="user_dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="library.php">Library</a></li>
                    <li class="nav-item"><a class="nav-link" href="comunity.php">Community</a></li>
                    <li class="nav-item"><a class="nav-link" href="support.php">Support</a></li>
                </ul>
            </nav>
            
        </div>
    </header>
    <main class="mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="gameCarousel" class="carousel slide mb-4" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../img/valo.jpg" alt="Game Image 1">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/valo.jpg" alt="Game Image 2">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/valo.jpg" alt="Game Image 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#gameCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#gameCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="game-details">
                        <h2 class="text-dark"><?php echo $game['nama']; ?></h2>
                        <p class="text-dark"><?php echo $game['description']; ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                        
            <thead>
                <tr>
                    <th>Game Name : <?php echo $game['nama']; ?></th><br>
                    <th>Genre : <?php echo $game['genre']; ?></th><br>
                    <th>Developer : <?php echo $game['developer']; ?></th><br>
                    <th>Publisher : <?php echo $game['publisher']; ?></th><br>
                    <th>Release Date : <?php echo $game['release_date']; ?></th>
                </tr>
            </thead>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class=" text-dark py-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 MySteam. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>