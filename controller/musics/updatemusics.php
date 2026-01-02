<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_POST['id'] ?? '';
if (!$id) redirect("view/admin/musics/index.php");

$music = $conn->prepare("SELECT * FROM musics WHERE id = ?");
$music->execute([$id]);
$music = $music->fetch();
if (!$music) redirect("view/admin/musics/index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $lyrics = $_POST['lyrics'];
    $cat_id = $_POST['cat_id'];
    $artist_id = $_POST['artist_id'];

    // فایل‌های قبلی
    $file = $music['file'];
    $cover = $music['cover'];

    // اگر فایل جدید انتخاب شد
    if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], "../../public/musics/file/" . $file);
    }

    if (!empty($_FILES['cover']['name'])) {
        $cover = $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], "../../public/musics/cover/" . $cover);
    }

    $stmt = $conn->prepare(
        "UPDATE musics 
         SET name=?, description=?, lyrics=?, file=?, cover=?, cat_id=?, artist_id=? 
         WHERE id=?"
    );
    $stmt->execute([$name, $description, $lyrics, $file, $cover, $cat_id, $artist_id, $id]);

    redirect("view/admin/musics/index.php");
}
?>
