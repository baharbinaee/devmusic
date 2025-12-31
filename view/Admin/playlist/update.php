<?php
require_once "../../../functions/helpers.php";
require_once "../../../functions/pdo.php";

$id = $_GET['id'];
$playlist = $conn->query("SELECT * FROM `playlist` WHERE id=$id")->fetch();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Update playlist</title>
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

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
            font-size: 14px;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2b6cb0;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #1f4f82;
        }

        img {
            display: block;
            max-width: 100px;
            margin-bottom: 10px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>ویرایش playlist</h2>
        <form method="POST" action="<?= url_get('controller/playlist/updateplaylist.php', $playlist['id']) ?>" enctype="multipart/form-data">
            <p>شناسه# <?= $playlist['id'] ?></p>
            <label>نام playlist</label>
            <input type="text" name="title" value="<?= $playlist['title'] ?>" required>

            <button type="submit">ذخیره تغییرات</button>
        </form>
    </div>
</body>

</html>