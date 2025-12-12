<?php 
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";
$id=$_GET['id'];

if ($_POST['name']!='' && $_POST['description']!='' && $_POST['phonenumber']!='' && $_POST['img']!='' && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['phonenumber']) && isset($_POST['img'])) {
    $query="UPDATE `artists` SET `name`=?, `description`=?, `phonenumber`=? WHERE id='$id'";
    $stm=$conn->prepare($query);
    $stm->execute([$_POST['name'], $_POST['description'], $_POST['phonenumber'], $_POST['img']]);
    redirect("view/admin/artists/index.php");
}else{
    redirect("view/admin/artists/index.php");
}
?>