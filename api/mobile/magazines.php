<?php 
    require 'db.php'; 
    if(isset($_GET['market-field']))
         $item =$_GET['market-field'];
    date_default_timezone_set('Asia/Riyadh');
    $currentDateTime=date('Y/m/d');
    $u =$_GET['user_id'];
    $newDateTime = date('Y/m/d', strtotime($currentDateTime));
   $sql = "SELECT COUNT(magazine_branch.id),store.image,store.id from magazine_branch INNER join store on magazine_branch.store=store.id WHERE magazine_branch.id in (SELECT magazine.id FROM magazine WHERE magazine.end_date >= ' $newDateTime' ) and magazine_branch.country in( select country from users where users.id = $u) ";

    if(isset($item))
     $sql.="and magazine_branch.id in  (select magazine_type.id from magazine_type where type = $item)";
    $sql .="GROUP by store"; 

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("count"=>$result[$i][0],"photo"=>$result[$i][1],"store"=>$result[$i][2]);
}
$message=json_encode($message);
 echo $message;
 //  result[i][0] = count of magazines
 //  result[i][1] = photo of the store 

?>