<?php
require '../db.php';

$stmt=$conn->prepare("select id,name  from product where id in (select product from product_branch where  branch ='".$_POST['branch']."');");
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowcount();

echo '<option value="">اختر</option>';
   for($i=0;$i<$size;$i++)
   {
        echo '<option value="'.$result[$i][0].'">'.$result[$i][1].'</option>';
   }

?>