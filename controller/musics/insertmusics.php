<?php
session_start();
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $lyrics = $_POST['lyrics'];
    $cat_id = $_POST['cat_id'];
    $artist_id = $_POST['artist_id'];

    $fileName = '';
    $coverName = '';

    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $fileName = time() . '_' . $_FILES['file']['name'];
        $location = __DIR__ . "/../../public/musics/file/";
        move_uploaded_file($_FILES['file']['tmp_name'], $location . $fileName);
    }

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === 0) {
        $coverName = time() . '_' . $_FILES['cover']['name'];
        $location = __DIR__ . "/../../public/musics/cover/";
        move_uploaded_file($_FILES['cover']['tmp_name'], $location . $coverName);
    }

    if ($name && $description && $cat_id && $artist_id) {
        $query = "INSERT INTO musics (name, description, lyrics, file, cover, cat_id, artist_id)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stm = $conn->prepare($query);
        $stm->execute([$name, $description, $lyrics, $fileName, $coverName, $cat_id, $artist_id]);
        redirect("view/admin/musics/index.php");
    }
}
?>