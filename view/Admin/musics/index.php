<?php
require_once "../layouts/header.php";

$musics = $conn->query("
SELECT 
    musics.*,
    categories.title AS category_title,
    artists.name AS artist_name
FROM musics
LEFT JOIN categories ON musics.cat_id = categories.id
LEFT JOIN artists ON musics.artist_id = artists.id
")->fetchAll();

?>

<div class="container">
    <h2>music</h2>
    <a href="./insert.php" class="btn btn-primary mb-3">Add Music</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>Description</th>
                <th>cover</th>
                <th>file</th>
                <th>lyrics</th>
                <th>category</th>
                <th>artist</th>
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
                        <img src="../../../public/musics/cover/<?= $music['cover'] ?>" width="50" height="50">
                    </td>
                    <td>
    <audio controls style="width:150px">
        <source src="../../../public/musics/file/<?= $music['file'] ?>" type="audio/mpeg">
        مرورگر پشتیبانی نمی‌کند
    </audio>
</td>
<td>
    <span id="lyrics-short-<?= $music['id'] ?>">
        <?= mb_substr($music['lyrics'], 0, 80) ?>...
    </span>

    <span id="lyrics-full-<?= $music['id'] ?>" style="display:none;">
        <?= $music['lyrics'] ?>
    </span>

    <a href="#" id="read-more-<?= $music['id'] ?>" onclick="
        document.getElementById('lyrics-short-<?= $music['id'] ?>').style.display='none';
        document.getElementById('lyrics-full-<?= $music['id'] ?>').style.display='inline';
        this.style.display='none';
        document.getElementById('read-less-<?= $music['id'] ?>').style.display='inline';
        return false;
    ">Read more</a>

    <a href="#" id="read-less-<?= $music['id'] ?>" style="display:none;" onclick="
        document.getElementById('lyrics-full-<?= $music['id'] ?>').style.display='none';
        document.getElementById('lyrics-short-<?= $music['id'] ?>').style.display='inline';
        this.style.display='none';
        document.getElementById('read-more-<?= $music['id'] ?>').style.display='inline';
        return false;
    ">Read less</a>
</td>

                    <td><?= $music['category_title'] ?></td>
                    <td><?= $music['artist_name'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $music['id'] ?>" class="text-warning">Edit</a>
                        <a href="../../../controller/musics/deletemusics.php?id=<?= $music['id'] ?>"
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
