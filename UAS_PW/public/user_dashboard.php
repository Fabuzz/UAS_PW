<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: index.php");
    exit();
}

$sql = "SELECT id, nama, genre, description, developer, publisher, release_date, image FROM games";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Store Id</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/userdb.css">
</head>
<body>
    <header class="text-dark py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="index.php" class="text-dark font-weight-bold">GameStore</a>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="library.php">Library</a></li>
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
            </div>
            <div class="mb-0 ml-3">
                <a href="../actions/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        </nav>
    </header>

    <main class="mt-0 ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/PUBG.jpeg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>PUBG</h5>
                        <p>Best Battlegrounds Game</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/dota2.jpeg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Dota 2</h5>
                        <p>Best Moba Game On Pc</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/phasmo.jpeg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Phasmopobia</h5>
                        <p>Best Horror Game For Four People</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/LOL.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>League of Legends</h5>
                        <p>Online multiplayer battle arena game</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/4nite.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Fortnite</h5>
                        <p>Battle Royale Game Fortnite is a battle royale game, developed by Epic Games, where 100 players fight against each other to be the last one standing </p>
                    </div>  
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/CS.webp" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>CSGO</h5>
                        <p>Counter-Strike: Global Offensive (CS:GO) expands upon the team-based first person shooter gameplay</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/gta5.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>GTA 5</h5>
                        <p>Most Best Open World Game</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/overwatch.jpeg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Overwatch</h5>
                        <p>Overwatch is an online team-based game generally played as a first-person shooter</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/cod.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>COD</h5>
                        <p>The game simulates the infantry and combined arms warfare of World War II</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/valo.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Valorant</h5>
                        <p>Most Toxic Game FR BRO..</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <section class="library py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Game List</h2>
                <!-- <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="../img/valo.jpg" alt="Game 1">
                            <div class="card-body"> -->
                            
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="Game 1">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                        <a href="detailgame.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            </div>
            </div>
        </section>

    </main>

    <footer class="text-dark py-3">
        <div class="container text-center">
            <p>&copy; 2024 GameStore. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>