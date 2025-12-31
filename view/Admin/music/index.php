<?php
require_once "../layouts/header.php";

$musics = $conn->query("
    SELECT *
    FROM music
    INNER JOIN categories ON music.cat_id = categories.id
")->fetchAll();
?>

<div class="container">
    <h2>music</h2>
    <a href="./add.php" class="btn btn-primary mb-3">Add Music</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>Description</th>
                <th>cover</th>
                <th>cat_id</th>
                <th>artist_id</th>
                <th>actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($musics as $music) { ?>
                <tr>
                    <td><?= $music['id'] ?></td>
                    <td><?= $music['name'] ?></td>
                    <td><?= $music['description'] ?></td>
                    <td>
                        <img src="../../../public/music/<?= $music['cover'] ?>" width="50" height="50">
                    </td>
                    <td><?= $music['cat_id'] ?></td>
                    <td><?= $music['artist_id'] ?></td>
                    <td>
                        <a href="<?= url_get('view/Admin/music/edit.php', $music['id']) ?>" class="text-warning">Edit</a>
                        <a href="../../../controller/music/deletemusic.php?id=<?= $music['id'] ?>"
                           class="text-danger"
                           onclick="return confirm('Are you sure you want to delete this artist?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
