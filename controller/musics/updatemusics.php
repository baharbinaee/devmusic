<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_GET['id'];
// if ($id!=" ") {
//     redirect("view/admin/artists/index.php");
// }

$artist = $conn->prepare("SELECT * FROM musics WHERE id = ?");
$music->execute([$id]);
$music = $music->fetch();
if (!$music) redirect("view/admin/musics/index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $lyrics = $_POST['lyrics'];

    // تصویر قبلی
    $cover = $music['cover'];

    // اگر تصویر جدید انتخاب شد
    if (!empty($_FILES['cover']['name'])) {
        $cover = $_FILES['cover']['name'];
        move_uploaded_file($_FILES['cover']['tmp_name'], "../../public/musics/" . $cover);
    }

    $stmt = $conn->prepare("UPDATE musics SET name=?, description=?, cover=? WHERE id=?");
    $stmt->execute([$name, $description, $cover, $id]);

    redirect("view/admin/musics/index.php");
}
