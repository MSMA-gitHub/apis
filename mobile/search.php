<?php 
    require 'db.php'; 
    $item =$_GET['search-field'];
    $sql="";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=json_encode($result);
 echo $message;
 //  result[i][1] =
 //  result[i][0] =

?>