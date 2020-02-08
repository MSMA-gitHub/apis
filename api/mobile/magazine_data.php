<?php 
    require 'db.php'; 
   
    $m =$_GET['magazine_id'];
    $s =$_GET['store_id'];
   $sql = "SELECT `photo` FROM `magazine_photo` WHERE `id` = $m ";
   

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();
$sql = "SELECT `image` FROM `store` WHERE `id` = $s ";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result1=$stmt->fetchAll();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("photo"=>$result[$i][0],"store"=>$result1[0][0]);
}
$message=json_encode($message);
 echo $message;
 //  result[i][0] = count of magazines
 //  result[i][1] = photo of the store 

?>