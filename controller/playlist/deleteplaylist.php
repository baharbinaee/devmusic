<?php 
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";
$id=$_GET['id'];

if ($id!='' && isset($id) && $id>0) {
    $query="DELETE FROM `playlist` WHERE id='$id' ";
    $stm=$conn->prepare($query);
    $stm->execute();
    redirect("view/admin/playlist/index.php");
}else{
    redirect("view/admin/playlist/index.php");
}
?>