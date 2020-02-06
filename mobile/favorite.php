<?php 
    require 'db.php'; 
//send user id throw get request
    $sql="SELECT magazine.id, image  FROM `magazine` where magazine.id in (select magazine from favorite_m where id=?) ";
   
$stmt=$conn->prepare($sql);
$stmt->execute(array($_GET['user_id']));
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();
for($i=0;$i<$size;$i++)
{
$message[$i]=array("id"=>$result[$i][0],"photo"=>$result[$i][1]);

}
$message=json_encode($result);
 echo $message;
 //  result[i][0] = id of magazines
 //  result[i][1] = photo of the store 

?>