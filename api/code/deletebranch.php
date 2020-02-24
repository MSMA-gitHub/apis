<?php
require "../db.php";
$id=$_POST['id'];
$bid=$_POST['branch'];

$sql="select * from `store_code` WHERE  code=? and branch=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id,$bid));
$s=$stmt->rowCount();
if($s>1)
{$sql="delete from `store_code` WHERE  code=? and branch=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id,$bid));}
else
echo 'لا يمكن حذف اخر فرع احذف الكود او اضف فرع اخر اولا';
?>