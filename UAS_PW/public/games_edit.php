<?php
require_once '../config/db.php';

if (!isset($_GET['id'])) {
    echo "ID parameter is missing.";
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM games WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "No game found with this ID.";
    exit();
}

$game = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = isset($_POST['name']) ? htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8') : '';
    $genre = isset($_POST['genre']) ? htmlentities($_POST['genre'], ENT_QUOTES, 'UTF-8') : '';
    $description = isset($_POST['description']) ? htmlentities($_POST['description'], ENT_QUOTES, 'UTF-8') : '';
    $developer = isset($_POST['developer']) ? htmlentities($_POST['developer'], ENT_QUOTES, 'UTF-8') : '';
    $publisher = isset($_POST['publisher']) ? htmlentities($_POST['publisher'], ENT_QUOTES, 'UTF-8') : '';
    $release_date = isset($_POST['release_date']) ? htmlentities($_POST['release_date'], ENT_QUOTES, 'UTF-8') : '';
    $image_path = $game['image'];

    if (isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
        $image = $_FILES['image']['name'];
        $target_dir = "../img/";
        
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

    if (!empty($nama) && !empty($genre) && !empty($description) && !empty($developer) && !empty($publisher) && !empty($release_date)) {
        $sql = "UPDATE games SET nama = ?, genre = ?, description = ?, developer = ?, publisher = ?, release_date = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $nama, $genre, $description, $developer, $publisher, $release_date, $image_path, $id);

        if ($stmt->execute()) {
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Game</h1>
        <form action="games_edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Game Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($game['nama']); ?>" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo htmlspecialchars($game['genre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($game['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="developer">Developer</label>
                <input type="text" class="form-control" id="developer" name="developer" value="<?php echo htmlspecialchars($game['developer']); ?>" required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo htmlspecialchars($game['publisher']); ?>" required>
            </div>
            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="<?php echo htmlspecialchars($game['release_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Game Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="<?php echo htmlspecialchars($game['image']); ?>" alt="Current Image" style="max-width: 200px; margin-top: 10px;">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
