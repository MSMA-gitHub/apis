<?php 
require "../db.php";
$id=$_POST['id'];
$sql="delete from `code` WHERE  id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
if($_GET['i']==0)
header("location:../../pages/coupons/coupons.php");
else
header("location:../../pages/offers/offers.php");
?>