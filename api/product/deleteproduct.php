<?php 
require "../db.php";
$id=$_POST['id'];
$sql="delete from `product` WHERE id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
header("location:../../pages/product/products.php")
?>