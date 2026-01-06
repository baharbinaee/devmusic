<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_GET['id'];
$playlist = $conn->prepare("SELECT * FROM playlist_music WHERE id = ?");
$playlist->execute([$id]);
$playlist = $playlist->fetch();
if (!$playlist) redirect("view/admin/playlist_music/index.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $music_id = $_POST['music_id'];
    $playlist_id = $_POST['playlist_id'];


    $stmt = $conn->prepare("UPDATE playlist_music SET music_id=? , playlist_id=?  WHERE id=?");
    $stmt->execute([$music_id , $playlist_id, $id]);

    redirect("view/admin/playlist_music/index.php");
}
