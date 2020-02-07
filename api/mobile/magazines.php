<?php 
    require 'db.php'; 
    if(isset($_GET['market-field']))
         $item =$_GET['market-field'];
    date_default_timezone_set('Asia/Riyadh');
    $currentDateTime=date('Y/m/d H:i');
    $newDateTime = date('Y/m/d h:i', strtotime($currentDateTime));
   $sql = "SELECT COUNT(magazine.id),image  FROM `magazine`INNER join store on store.id = magazine.store where magazine.end_date < '$newDateTime' and store.id in (select store_branch.id from store_branch where store_branch.countryid in( select country from users where users.id = ?))";

    if(isset($item))
     $sql.="and  magazine.id in  (select magazine_type.id from magazine_type where type = $item)";
$stmt=$conn->prepare($sql);
$stmt->execute(array($_GET['user_id']));
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("count"=>$result[$i][0],"photo"=>$result[$i][1]);
}
$message=json_encode($message);
 echo $message;
 //  result[i][0] = count of magazines
 //  result[i][1] = photo of the store 

?>