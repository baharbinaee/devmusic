<?php
require_once "../layouts/header.php";
$playlist_musics = $conn->query("
SELECT 
    playlist_music.*,
    musics.name AS music_name,
    playlist.title AS playlist_title
FROM playlist_music
LEFT JOIN musics ON playlist_music.music_id = musics.id
LEFT JOIN playlist ON playlist_music.playlist_id = playlist.id
")->fetchAll();

?>

<div class="container">
    <h2>playlist</h2>
    <a href="./insert.php" class="btn btn-primary mb-3">Add playlist</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>music</th>
                <th>playlist</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playlist_musics as $playlist_music) { ?>
                <tr>
                    <td><?= $playlist_music['id'] ?></td>
                    <select name="music_id" class="form-control">
                    <td><?= $playlist_music['music_name'] ?></td>
                    <td><?= $playlist_music['playlist_title'] ?></td>

                    <td>
                    <a href="<?= url_get('view/Admin/playlist_music/update.php', $playlist_music['id']) ?>" class="text-warning">Edit</a>


                        <a href="../../../controller/playlist_music/deleteplaylist_music.php?id=<?= $playlist_music['id'] ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</a>
                    </td>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>