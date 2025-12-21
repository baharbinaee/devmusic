<?php
session_start();
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $lyrics = $_POST['lyrics'];
    $coverName = null;

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === 0) {
        $coverName = time() . '_' . $_FILES['cover']['name'];
        $location = __DIR__ . "/../../public/musics/";
        move_uploaded_file($_FILES['cover']['tmp_name'], $location . $coverName);
    }
    if (isset($_FILES['music']) && $_FILES['music']['error'] === 0) {
        $musicName = time() . '_' . $_FILES['music']['name'];
        $location = __DIR__ . "/../../public/musics/";
        move_uploaded_file($_FILES['music']['tmp_name'], $location . $musicName);
    }


    if ($name && $description && $lyrics) {
        $query = "INSERT INTO musics (name, description, coverName, musicName, lyrics) VALUES (?, ?, ?, ?, ?)";
        $stm = $conn->prepare($query);
        $stm->execute([$name, $description, $coverName, $musicName, $lyrics]);
        redirect("view/admin/musics/index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Add music</title>
<style>
body { font-family: Tahoma, sans-serif; background: #f7f7f7; display:flex; justify-content:center; align-items:center; min-height:100vh; margin:0; }
.card { background:#fff; padding:20px 25px; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.1); width:100%; max-width:400px; }
h2 { text-align:center; color:#333; margin-top:0; }
label { display:block; margin-bottom:6px; color:#333; font-size:14px; }
input[type="text"], input[type="file"], textarea { width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc; box-sizing:border-box; font-size:14px; }
textarea { resize:vertical; min-height:100px; }
button { width:100%; padding:12px; background:#2b6cb0; color:#fff; font-size:16px; border:none; border-radius:6px; cursor:pointer; transition:0.3s; }
button:hover { background:#1f4f82; }
</style>
</head>
<body>
<div class="card">
    <h2>افزودن music جدید</h2>
    <form method="post" enctype="multipart/form-data">
        <label>نام music</label>
        <input type="text" name="name" placeholder="e.g.: given up by linkin park" required>

        <label>توضیحات</label>
        <textarea name="description" placeholder="توضیح کوتاه درباره music" required></textarea>

        <label>lyrics</label>
        <textarea name="lyrics" placeholder="متن موسیقی" required></textarea>

        <label>تصویر موسیقی</label>
        <input type="file" name="cover" accept="image/*">

        <label> موسیقی</label>
        <input type="file" name="music" accept="music/*">

        <button type="submit">ذخیره</button>
    </form>
</div>
</body>
</html>
