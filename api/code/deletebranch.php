<?php
require "../db.php";
$id=$_POST['id'];
$bid=$_POST['branch'];
$sql="delete from `store_code` WHERE  code=? and branch=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id,$bid));
?>