<?php
require '../db.php'; 
$t=$_POST['type'];
$sql="SELECT name,id  FROM category where type =$t";

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$msg= '<option value="">اختر<option>';
for($i=0;$i<$size;$i++)
{
$msg.= '<option value="'.$result[$i][1].'">'.$result[$i][0].'<option>';
}
echo $msg;
?>