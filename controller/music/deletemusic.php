<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    redirect("view/admin/music/index.php");
    exit;
}

$stmt = $conn->prepare("DELETE FROM music WHERE id = ?");
$stmt->execute([$id]);

redirect("view/admin/music/index.php");
exit;
