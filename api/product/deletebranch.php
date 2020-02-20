<?php
require "../db.php";
$id=$_POST['id'];
$bid=$_POST['branch'];
$sql="delete from `product_branch` WHERE  product=? and branch=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id,$bid));
?>