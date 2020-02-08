<?php 
require "../db.php";
$id=$_POST['id'];
$sql="delete from `users` WHERE  id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
header("location:../../pages/users/users.php")
?>