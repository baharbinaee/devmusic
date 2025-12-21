<?php
require_once "../layouts/header.php";
$musics = $conn->query("SELECT * FROM `musics`")->fetchAll();
?>

<div class="container">
    <h2>musics</h2>
    <a href="../../../controller/musics/insertmusics.php" class="btn btn-primary mb-3">Add music</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Music</th>
                <th>Name</th>
                <th>Description</th>
                <th>lyrics</th>
                <th>cover</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($musics as $music) { ?>
                <tr>
                    <td><?= $music['id'] ?></td>
                    <td>
                        <?php if (!empty($music['cover'])) { ?>
                            <img src="../../../public/musics/<?= $music['cover'] ?>" width="40" height="40" class="rounded">
                        <?php }
                        ?>
                    </td>
                    <td>
                        <?php if (!empty($music['music'])) { ?>
                            <img src="../../../public/musics/<?= $music['music'] ?>" width="40" height="40" class="rounded">
                        <?php }
                        ?>
                    </td>
                    <td><?= $music['name'] ?></td>
                    <td><?= $music['description'] ?></td>
                    <td><?= $music['lyrics'] ?></td>

                    <td>
                    <a href="<?= url_get('view/Admin/musics/update.php', $music['id']) ?>" class="text-warning">Edit</a>


                        <a href="../../../controller/musics/deletemusics.php?id=<?= $music['id'] ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this music?')">Delete</a>
                    </td>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>