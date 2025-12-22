<?php 
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";
$id=$_GET['id'];

if ($id!='' && isset($id) && $id>0) {
    $query="DELETE FROM `categories` WHERE id='$id' ";
    $stm=$conn->prepare($query);
    $stm->execute();
    redirect("view/admin/categories/index.php");
}else{
    redirect("view/admin/categories/index.php");
}
?>