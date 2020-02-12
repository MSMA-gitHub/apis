<?php 
require "../db.php";
$id=$_POST['id'];
$sql="delete from `store` WHERE  id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
header("location:../../pages/stores/stores.php")
?>