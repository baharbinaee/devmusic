<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_GET['id'];


$playlist = $conn->prepare("SELECT * FROM playlist WHERE id = ?");
$playlist->execute([$id]);
$playlist = $playlist->fetch();
if (!$playlist) redirect("view/admin/playlist/index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];


    $stmt = $conn->prepare("UPDATE playlist SET title=? WHERE id=?");
    $stmt->execute([$title, $id]);

    redirect("view/admin/playlist/index.php");
}
