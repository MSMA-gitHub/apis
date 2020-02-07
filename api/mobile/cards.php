<?php 
    require 'db.php'; 

    $sql="SELECT *  FROM card where id= ? ";
  
$stmt=$conn->prepare($sql);
$stmt->execute(array($_GET['user_id']));
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("name"=>$result[$i][1],"front"=>$result[$i][2],"back"=>$result[$i][3]);
}
$message=json_encode($message);
 echo $message;
 //  message[i][0] = name of card
 //  message[i][1] =front  photo of the card
 // message[i][2] =back  photo of the card

?>