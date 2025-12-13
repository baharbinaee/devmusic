<?php
require_once "../layouts/header.php";
$artists = $conn->query("SELECT * FROM `artists`")->fetchAll();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>artists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 p-0 border-end bg-light min-vh-100" id="sidebar">
                <div class="p-3">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-diagram-3 fs-4 me-2 text-primary"></i>
                        <span class="fw-semibold">Navigation</span>
                    </div>
                    <ul class="nav nav-pills flex-column gap-1">
                        <li class="nav-item"><a class="nav-link" href="dashboard.html"><i
                                    class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="books.html"><i
                                    class="bi bi-book me-2"></i>Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="users.html"><i
                                    class="bi bi-people me-2"></i>Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="reservations.html"><i
                                    class="bi bi-journal-check me-2"></i>Reservations</a></li>
                        <li class="nav-item"><a class="nav-link" href="admins.html"><i
                                    class="bi bi-shield-lock me-2"></i>Admins</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9 col-lg-10 p-4" id="content">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h4 mb-0">artists</h1>
                    <div>
                       <a href="../../../controller/artists/insertartists.php"> <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal"><i
                                class="bi bi-plus-lg me-1"></i>Add artist</button></a>
                    </div>
                </div>
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th><img src="../../../public/artists" alt=""></th>
                                        <th>name</th>
                                        <th>description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="books-table-body">
                                <?php foreach ($artists as $artist){ ?>
                                    <tr>
                                        <td><?= $artist['<img src= class="rounded" width="40" height="40"
                                                alt="cover">']?></td>
                                        <td><?= $artist['name']?></td>
                                        <td><?= $artist['description']?></td>
                                        <td>
                                        <a href="create-table.html" class="text-primary me-2"><i class="fas fa-eye"></i></a>
              <a href="<?=url_get("view/admin/artists/updateartists.php" , $artist['id']) ?> " class="text-warning me-2"><i class="fas fa-pencil-alt"></i></a>
              <a href="<?=url_get("controller/artists/deleteartists.php" , $artist['id']) ?> " class="text-danger"><i class="fas fa-trash"></i></a>
            </td>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="addBookModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                    <form method="post" action="<?=url("controller/artists/insertartists.php")?>" enctype="multipart/form-data">   
                    <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add artist</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addBookForm" class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">name</label>
                                        <input name="name" type="title" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">description
                                        </label>
                                        <input name="description" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">uploading image<img src="" alt=""> URL</label>
                                        <input name="img" type="file" class="form-control">
                                        <img id="photoPreview" class="mt-2 rounded" style="max-width: 100px; display: none;" alt="پیش‌نمایش">
                            </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="saveAddBook">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editBookModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Book</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form form action="" method="post" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" value="The Great Book">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">description</label>
                                        <input type="text" class="form-control" value="John Doe"></div>
                                    <div class="col-md-6">
                                        <label class="form-label"><img src="" alt=""> URL</label>
                                        <input type="url" class="form-control" value="assets/img/placeholder.png">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="saveEditBook">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Book</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Are you sure you want to delete this book?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteBook">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="small">Made by Mohammad Rezaei — <a href="https://MOHAMMAD-REZAEI.IR"
                    class="link-light text-decoration-none" target="_blank" rel="noopener">MOHAMMAD-REZAEI.IR</a></span>
            <div class="small opacity-75">© 2025</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>