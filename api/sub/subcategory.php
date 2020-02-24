<?php
require '../db.php'; 
$t=$_POST['cat'];
$sql="SELECT name,id  FROM subcategory where categoryid =$t";

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
echo '<option value="">اختر<option>';
for($i=0;$i<$size;$i++)
{
echo '<option value="'.$result[$i][1].'">'.$result[$i][0].'<option>';
}
?>