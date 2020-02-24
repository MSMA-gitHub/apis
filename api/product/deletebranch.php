<?php
require "../db.php";
$id=$_POST['id'];
$bid=$_POST['branch'];

$sql="select * from `product_branch` WHERE  product=? and branch=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id,$bid));
$s=$stmt->rowCount();
if($s>1)
{$sql="delete from `product_branch` WHERE  product=? and branch=?;";
    $stmt=$conn->prepare($sql);
    $stmt->execute(array($id,$bid));}
else
    echo 'لا يمكن حذف اخر فرع احذف المنتج او اضف فرع اخر اولا';
?>