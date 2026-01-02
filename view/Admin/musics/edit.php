<?php
require_once "../../../functions/pdo.php";
require_once "../../../functions/helpers.php";
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM musics WHERE id = ?");
$stmt->execute([$id]);
$musics = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Update Music</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 { text-align: center; margin-top: 0; }
        label { display: block; margin-bottom: 6px; font-size: 14px; }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        textarea { resize: vertical; min-height: 100px; }
        button {
            width: 100%;
            padding: 12px;
            background: #2b6cb0;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="card">
    <h2>بروزرسانی موسیقی</h2>

    <form action="../../../controller/musics/updatemusics.php" method="post" enctype="multipart/form-data">

        <!-- خیلی مهم -->
        <input type="number" name="id" value="<?= $musics['id'] ?>">

        <label>نام موسیقی</label>
        <input type="text" name="name" value="<?= $musics['name'] ?>" required>

        <label>توضیحات</label>
        <textarea name="description" required><?= $musics['description'] ?></textarea>

        <label>متن موسیقی</label>
        <textarea name="lyrics" required><?= $musics['lyrics'] ?></textarea>

        <label>cat_id</label>
        <input type="number" name="cat_id" value="<?= $musics['cat_id'] ?>" required>

        <label>artist_id</label>
        <input type="number" name="artist_id" value="<?= $musics['artist_id'] ?>" required>

        <label>فایل موسیقی</label>
        <input type="file" name="file" accept="audio/*">

        <label>تصویر کاور</label>
        <input type="file" name="cover" accept="image/*">

        <button type="submit">ذخیره</button>
    </form>
</div>
</body>
</html>
