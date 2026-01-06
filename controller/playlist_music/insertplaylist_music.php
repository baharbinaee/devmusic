<?php
session_start();
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$musics = $conn->query("SELECT id, name FROM musics")->fetchAll();
$playlists = $conn->query("SELECT id, title FROM playlist")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $music_id = $_POST['music_id'];
    $playlist_id = $_POST['playlist_id'];


    if ($music_id && $playlist_id) {
        $query = "INSERT INTO playlist_music (music_id , playlist_id) VALUES (?,?)";
        $stm = $conn->prepare($query);
        $stm->execute([$music_id , $playlist_id]);
        redirect("view/admin/playlist_music/index.php");
    }
}
?>
