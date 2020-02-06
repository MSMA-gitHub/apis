<?php 
    require 'db.php'; 
    date_default_timezone_set('Asia/Riyadh');
    $currentDateTime=date('Y-m-d');
    $newDateTime = date('Y-m-d', strtotime($currentDateTime));
    $sql="select product_id	, photo from addvertisement where end_date >  '$newDateTime' and product_id in ( select id from product where   product.country in( select country from users where users.id = ?))";
$stmt=$conn->prepare($sql);
$stmt->execute(array((int)$_GET['user_id']));
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();
for($i=0;$i<$size;$i++)
{
$message[$i]=array("id"=>$result[$i][0],"photo"=>$result[$i][1]);
}
 echo json_encode($message);
 //  result[i][1] =photo to displayed 
 //  result[i][0] =id to go to product page

?>