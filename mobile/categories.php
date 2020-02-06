<?php 
    require 'db.php'; 

    $sql="SELECT name,photo,id  FROM category where type =0";
  
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("name"=>$result[$i][0],"id"=>$result[$i][2],"photo"=>$result[$i][1]);

}
$message=json_encode($message);
 echo $message;

 //  result[i][0] = name of category
  //  result[i][1] = photo of the category 
 //  result[i][2] = id of the category 

?>