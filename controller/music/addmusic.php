<?php
session_start();

require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("view/admin/music/index.php");
    exit;
}

// دریافت دیتا از فرم
$name = trim($_POST['name'] ?? '');
$description = trim($_POST['description'] ?? '');
$lyrics = trim($_POST['lyrics'] ?? '');
$cat_id = intval($_POST['cat_id'] ?? 0);
$artist_id = intval($_POST['artist_id'] ?? 0);
$file = $_FILES['file']['name'] ?? '';
$cover = $_FILES['cover']['name'] ?? '';

// اعتبارسنجی
if (!$name || !$description || !$cat_id || !$artist_id) {
    $_SESSION['error'] = "❌ لطفا تمام فیلدهای اجباری را پر کنید";
    redirect("view/admin/music/index.php");
    exit;
}

// پوشه‌های آپلود
$coverName = $cover ? "cover_" . time() . "_" . basename($cover) : null;
$fileName = $file ? "music_" . time() . "_" . basename($file) : null;

// آپلود فایل‌ها
if ($cover && $_FILES['cover']['tmp_name']) {
    $uploadCoverPath = __DIR__ . "/../../public/music/cover/" . $coverName;
    move_uploaded_file($_FILES['cover']['tmp_name'], $uploadCoverPath);
}

if ($file && $_FILES['file']['tmp_name']) {
    $uploadFilePath = __DIR__ . "/../../public/music/" . $fileName;
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
}

// ذخیره در دیتابیس
$query = "INSERT INTO `music` (`name`, `description`, `lyrics`, `file`, `cover`, `cat_id`, `artist_id`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$name, $description, $lyrics, $fileName, $coverName, $cat_id, $artist_id]);

redirect("view/admin/music/index.php");
exit;
