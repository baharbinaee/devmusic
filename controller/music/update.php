<?php
require_once "../../functions/helpers.php";
require_once "../../functions/pdo.php";

$id = $_POST['id'] ?? null;
if (!$id || !is_numeric($id)) {
    redirect("view/admin/music/index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $lyrics = trim($_POST['lyrics'] ?? '');
    $cat_id = intval($_POST['cat_id'] ?? 0);
    $artist_id = intval($_POST['artist_id'] ?? 0);

    if (!$name || !$description || !$cat_id || !$artist_id) {
        $_SESSION['error'] = "❌ لطفا تمام فیلدهای اجباری را پر کنید";
        redirect("view/admin/music/index.php");
        exit;
    }

    // فایل‌ها
    $coverName = null;
    if (!empty($_FILES['cover']['name'])) {
        $coverName = "cover_" . time() . "_" . basename($_FILES['cover']['name']);
        move_uploaded_file($_FILES['cover']['tmp_name'], __DIR__ . "/../../public/music/cover/" . $coverName);
    }

    $fileName = null;
    if (!empty($_FILES['file']['name'])) {
        $fileName = "music_" . time() . "_" . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], __DIR__ . "/../../public/music/" . $fileName);
    }

    // ساخت query پویا بسته به آپلود فایل‌ها
    $fields = "name=?, description=?, lyrics=?, cat_id=?, artist_id=?";
    $params = [$name, $description, $lyrics, $cat_id, $artist_id];

    if ($coverName) {
        $fields .= ", cover=?";
        $params[] = $coverName;
    }
    if ($fileName) {
        $fields .= ", file=?";
        $params[] = $fileName;
    }

    $params[] = $id; // id برای WHERE

    $stmt = $conn->prepare("UPDATE music SET $fields WHERE id=?");
    $stmt->execute($params);

    redirect("view/admin/music/index.php");
}
