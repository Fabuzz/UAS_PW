<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menggunakan htmlentities untuk menghindari masalah keamanan
    $nama = isset($_POST['name']) ? htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8') : '';
    $genre = isset($_POST['genre']) ? htmlentities($_POST['genre'], ENT_QUOTES, 'UTF-8') : '';
    $description = isset($_POST['description']) ? htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8') : '';
    $developer = isset($_POST['developer']) ? htmlentities($_POST['developer'], ENT_QUOTES, 'UTF-8') : '';
    $publisher = isset($_POST['publisher']) ? htmlentities($_POST['publisher'], ENT_QUOTES, 'UTF-8') : '';
    $release_date = isset($_POST['release_date']) ? htmlentities($_POST['release_date'], ENT_QUOTES, 'UTF-8') : '';
    $image_path = '';

    if (isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
        $image = $_FILES['image']['name'];
        $target_dir = "../img/";
        
        // Buat direktori jika belum ada
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Error: Unable to move uploaded file.";
            exit();
        }
    }

    // Periksa apakah nama dan deskripsi tidak kosong
    if (!empty($nama) && !empty($description)) {
        $sql = "INSERT INTO games (nama, genre, description, developer, publisher, release_date, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $nama, $genre, $description, $developer, $publisher, $release_date, $image_path);

        if ($stmt->execute()) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: Name and description cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Game</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h1>Add New Game</h1>
        <form action="addgame_admin.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Game Name</label>
                <input type="text" class="form-control" id="nama" name="name" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="developer">Developer</label>
                <input type="text" class="form-control" id="developer" name="developer" required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" required>
            </div>
            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" required>
            </div>
            <div class="form-group">
                <label for="image">Game Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Add Game</button>
        </form>
    </div>
</body>
</html>
