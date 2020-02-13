<?php 
require "../db.php";
$id=$_POST['id'];
$sql="delete from `magazine` WHERE id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
header("location:../../pages/product/products.php")
?>