<?php 
    require 'db.php'; 
    $q =$_GET['char'];
    $sql="SELECT *  FROM brand where name like '".$q."%' ";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("name"=>$result[$i][1],"id"=>$result[$i][0]);
}
$message=json_encode($message);
 echo $message;

?>