<?php
require_once "../layouts/header.php";
$playlist = $conn->query("SELECT * FROM `playlist`")->fetchAll();
?>

<div class="container">
    <h2>playlist</h2>
    <a href="../../../controller/playlist/insertplaylist.php" class="btn btn-primary mb-3">Add playlist</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($playlist as $playlist) { ?>
                <tr>
                    <td><?= $playlist['id'] ?></td>
                    <td><?= $playlist['title'] ?></td>

                    <td>
                    <a href="<?= url_get('view/Admin/playlist/update.php', $playlist['id']) ?>" class="text-warning">Edit</a>


                        <a href="../../../controller/playlist/deleteplaylist.php?id=<?= $playlist['id'] ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</a>
                    </td>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>