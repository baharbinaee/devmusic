<?php
session_start();
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";


$name=$_POST['name'];
$description=$_POST['description'];
// $img= $_FILES['img']['name'];
// $location = __DIR__ . "/../../public/artists/";
// move_uploaded_file($_FILES['img']['tmp_name'] , "$location".$_FILES['img']['name']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($name) && !empty($description)) {
        $query = "INSERT INTO `artists`(`name`, `description`) VALUES ( ?, ?)";
        $stm = $conn->prepare($query);
        $stm->execute([$name, $description]);
        redirect("view/admin/artists/index.php");
    } else {
        // redirect("view/admin/artists/index.php");
    }
    
}
?>

<!-- <!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>افزودن artist</title>
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
      margin-top: 0;
      text-align: center;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 6px;
      color: #333;
      font-size: 14px;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
      box-sizing: border-box;
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
      transition: background 0.3s;
    }

    button:hover {
      background: #1f4f82;
    }

  </style>
</head>

<body>
  <div class="card">
    <h2>افزودن artist جدید</h2>

    <form action="" method="post" enctype="multipart/form-data">
      <label for="name">نام artist</label>
      <input type="text" id="name" name="name" placeholder="e.g.: linkin park" required>

      <label for="description">توضیحات</label>
      <textarea id="description" name="description" placeholder="توضیحی کوتاه درباره artist" required></textarea>

      <label for="image">تصویر دسته‌بندی</label>
      <input type="file" id="image" name="image" accept="image/*">

      <button type="submit">ذخیره</button>
    </form>
  </div>
</body>

</html>
 -->



