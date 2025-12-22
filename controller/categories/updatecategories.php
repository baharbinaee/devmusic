<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_GET['id'];


$category = $conn->prepare("SELECT * FROM categories WHERE id = ?");
$category->execute([$id]);
$category = $category->fetch();
if (!$category) redirect("view/admin/categories/index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];

    // تصویر قبلی
    $img = $category['img'];

    // اگر تصویر جدید انتخاب شد
    if (!empty($_FILES['img']['name'])) {
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../../public/categories/" . $img);
    }

    $stmt = $conn->prepare("UPDATE categories SET title=?, img=? WHERE id=?");
    $stmt->execute([$title, $img, $id]);

    redirect("view/admin/categories/index.php");
}
