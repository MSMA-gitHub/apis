<?php 
require "../db.php";
$id=$_POST['id'];
$sql="delete from `addvertisement_branch` WHERE  add_id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
header("location:../../pages/ads/ads.php")
?>