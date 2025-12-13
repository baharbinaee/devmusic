<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_GET['id'] ?? null;
if (!$id) redirect("view/admin/artists/index.php");

// گرفتن اطلاعات قبلی
$artist = $conn->prepare("SELECT * FROM artists WHERE id = ?");
$artist->execute([$id]);
$artist = $artist->fetch();
if (!$artist) redirect("view/admin/artists/index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // تصویر قبلی
    $img = $artist['img'];

    // اگر تصویر جدید انتخاب شد
    if (!empty($_FILES['img']['name'])) {
        $img = time().'_'.$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../../public/artists/".$img);
    }

    $stmt = $conn->prepare("UPDATE artists SET name=?, description=?, img=? WHERE id=?");
    $stmt->execute([$name, $description, $img, $id]);

    redirect("view/admin/artists/index.php");
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Update Artist</title>
<style>
body { font-family: Tahoma, sans-serif; background: #f7f7f7; display:flex; justify-content:center; align-items:center; min-height:100vh; margin:0; }
.card { background:#fff; padding:20px 25px; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.1); width:100%; max-width:400px; }
h2 { text-align:center; color:#333; margin-top:0; }
label { display:block; margin-bottom:6px; color:#333; font-size:14px; }
input[type="text"], input[type="file"], textarea { width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc; box-sizing:border-box; font-size:14px; }
textarea { resize:vertical; min-height:100px; }
button { width:100%; padding:12px; background:#2b6cb0; color:#fff; font-size:16px; border:none; border-radius:6px; cursor:pointer; transition:0.3s; }
button:hover { background:#1f4f82; }
img { display:block; max-width:100px; margin-bottom:10px; border-radius:6px; }
</style>
</head>
<body>
<div class="card">
    <h2>ویرایش Artist</h2>
    <form method="post" enctype="multipart/form-data">
        <label>نام Artist</label>
        <input type="text" name="name" value="<?= ($artist['name']) ?>" required>

        <label>توضیحات</label>
        <textarea name="description" required><?= ($artist['description']) ?></textarea>

        <label>تصویر دسته‌بندی</label>
        <?php if (!empty($artist['img'])): ?>
            <img src="../../public/artists/<?= $artist['img'] ?>" alt="Current Image">
        <?php endif; ?>
        <input type="file" name="img" accept="image/*">

        <button type="submit">ذخیره تغییرات</button>
    </form>
</div>
</body>
</html>
