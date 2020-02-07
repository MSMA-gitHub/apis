<?php 
    require 'db.php'; 

    $sql="SELECT name,photo,id  FROM subcategory where categoryid = ? ";
  
$stmt=$conn->prepare($sql);
$stmt->execute(array($_GET['id']));
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();
$message[0][0]=$size;

for($i=0;$i<$size;$i++)
{
$message[$i+1][$i]=array("name"=>$result[$i][0],"id"=>$result[$i][2],"photo"=>$result[$i][1]);
}
$message=json_encode($message);
 echo $message;

 //  result[i][0] = name of subcategory
 //  result[i][1] = photo of the subcategory 
//  result[i][2] = id of the subcategory 
?>  