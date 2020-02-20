<?php
require '../db.php';

$stmt=$conn->prepare("select id,branch  from store_branch where store ='".$_POST['id']."';");
$stmt->execute();
$city=$stmt->fetchAll();
$size=$stmt->rowcount();
$msg="";
for($i=0;$i<$size;$i++)
{
    $message[$i]=array("value"=>$city[$i][0],"text"=>$city[$i][1]);
}
$message=json_encode($message);
echo $message;
?>
