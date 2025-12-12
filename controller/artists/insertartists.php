<?php
require_once "../../functions/pdo.php";
require_once "../../functions/helpers.php";


$name=$_POST['name'];
$description=$_POST['description'];
$phonenumber=$_POST['phonenumber'];
$img= $_FILES['img']['name'];
$location = __DIR__ . "/../../public/artists/";
move_uploaded_file($_FILES['img']['tmp_name'] , "$location".$_FILES['img']['name']);

if ($_POST['name'] != '' && $_POST['description'] != '' && $_POST['phonenumber'] != '' && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['phonenumber'])) {
    $query="INSERT INTO `artists` (`name`, `description`, `phonenumber`, `img`, `img`) VALUES (? , ? , ? , ? , ? )";
    $stm=$conn->prepare($query);
    $stm->execute([$name , $description , $phonenumber , $img , $img]);
     redirect("view/admin/artists/index.php");
} else {
    // redirect("view/admin/artists/index.php");
}
