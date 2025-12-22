<?php
session_start();
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'] ?? null;
    $imgName = '';

    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
        $imgName = time() . '_' . $_FILES['img']['name'];
        $location = __DIR__ . "/../../public/categories/";
        move_uploaded_file($_FILES['img']['tmp_name'], $location . $imgName);
    }

    if ($title) {
        $query = "INSERT INTO categories (title, img) VALUES (?, ?)";
        $stm = $conn->prepare($query);
        $stm->execute([$title, $imgName]);
        redirect("view/admin/categories/index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Add category</title>
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
    <h2>افزودن category جدید</h2>
    <form method="post" enctype="multipart/form-data">
        <label>نام category</label>
        <input type="text" name="title" placeholder="e.g.: Jazz " required>

        <label>تصویر دسته‌بندی</label>
        <input type="file" name="img" accept="image/*">

        <button type="submit">ذخیره</button>
    </form>
</div>
</body>
</html>
