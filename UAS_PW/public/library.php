<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - GameStore </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/library.css">
</head>
<body>
    <header class="text-dark py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="user_dashboard.php" class="font-weight-bold">GameStore</a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="user_dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="comunity.php">Community</a></li>
                    <li class="nav-item"><a class="nav-link" href="support.php">Support</a></li>
                </ul>
                <div class="container">
            <form class="search-bar" action="search.php" method="GET">
                <input type="text" name="search" placeholder="Search for games...">
                <button type="submit">Search</button>
            </form>
            <div class="results">
                <!-- Hasil pencarian akan ditampilkan di sini -->
            </div>
            </nav>
           
        </div>
    </header>

    <main class="mt-0">
        <section class="library py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">My Game Library</h2>
                <div class="row">
                    <!-- Game 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="../img/valo.jpg" alt="Game 1">
                            <div class="card-body">
                                <h5 class="card-title">Valorant</h5>
                                <p class="card-text">Exciting adventure game</p>
                                <a href="" class="btn btn-primary">Play</a>
                            </div>
                        </div>
                    </div>
                    <!-- Game 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="../img/th.jpeg" alt="Game 2">
                            <div class="card-body">
                                <h5 class="card-title">PUBG</h5>
                                <p class="card-text">Challenging puzzle game</p>
                                <a href="" class="btn btn-primary">Play</a>
                            </div>
                        </div>
                    </div>
                    <!-- Game 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="../img/phasmo.jpeg" alt="Game 3">
                            <div class="card-body">
                                <h5 class="card-title">Phasmophobia</h5>
                                <p class="card-text">Fun action game</p>
                                <a href="" class="btn btn-primary">Play</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class=" text-dark py-3">
        <div class="container text-center">
            <p>&copy; 2024 GameStore. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>