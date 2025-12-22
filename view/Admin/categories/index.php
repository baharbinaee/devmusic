<?php
require_once "../layouts/header.php";
$categories = $conn->query("SELECT * FROM `categories`")->fetchAll();
?>

<div class="container">
    <h2>categories</h2>
    <a href="../../../controller/categories/insertcategories.php" class="btn btn-primary mb-3">Add categories</a>

    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) { ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td>
                        <?php if (!empty($category['img'])) { ?>
                            <img src="../../../public/categories/<?= $category['img'] ?>" width="40" height="40" class="rounded">
                        <?php }
                        ?>
                    </td>
                    <td><?= $category['title'] ?></td>

                    <td>
                    <a href="<?= url_get('view/Admin/categories/update.php', $category['id']) ?>" class="text-warning">Edit</a>


                        <a href="../../../controller/categories/deletecategories.php?id=<?= $category['id'] ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this artist?')">Delete</a>
                    </td>

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>