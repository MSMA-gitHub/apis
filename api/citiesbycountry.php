<?php
require 'db.php';

$stmt=$conn->prepare("select *  from city where  countrycode ='".$_POST['city']."';");
$stmt->execute();
$city=$stmt->fetchAll();
$size=$stmt->rowcount();
if($size>0)
{
   $result=$stmt->fetchAll();

}
   for($i=0;$i<$size;$i++)
   {
        echo '<option value="'.$city[$i][0].'">'.$city[$i][1].'</option>';
   }

?>