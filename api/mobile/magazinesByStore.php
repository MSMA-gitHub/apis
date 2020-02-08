<?php 
    require 'db.php'; 
    if(isset($_GET['market-field']))
         $item =$_GET['market-field'];
    date_default_timezone_set('Asia/Riyadh');
    $currentDateTime=date('Y/m/d');
    $u =$_GET['user_id'];
    $s=$_GET['store_id'];
    $newDateTime = date('Y/m/d', strtotime($currentDateTime));
   $sql = "SELECT magazine.id,magazine.end_date,magazine.cover,magazine_branch.branch_name FROM magazine_branch INNER JOIN magazine on magazine_branch.id= magazine.id and  magazine.end_date >= '$newDateTime' and country in ( select country from users where users.id = $u) and magazine_branch.store =$s ";

    if(isset($item))
     $sql.="WHERE magazine_branch.id in  (select magazine_type.id from magazine_type where type = $item)";

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("id"=>$result[$i][0],"end_date"=>$result[$i][1],"photo"=>$result[$i][2],"branch_name"=>$result[$i][3]);
}
$message=json_encode($message);
 echo $message;
 //  result[i][0] = id of magazine
 //  result[i][1] =  end date of magazine
 //  result[i][2] = cover of the magazine 
 //  result[i][2] = store branch of the magazine 

?>