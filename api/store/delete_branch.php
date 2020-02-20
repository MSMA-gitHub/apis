<?php

require "../db.php";
$id=$_POST['id'];
$sql="select store from `store_branch` WHERE  id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
$s=$stmt->fetchAll();
$sql="delete from `store_branch` WHERE  id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));

echo '<form id="user" action="../../pages/stores/store.php" method="POST"> <input type="hidden" name="id" value="' . $s[0][0] . '">
</form>';
echo '<script> document.getElementById("user").submit();</script>';
?>