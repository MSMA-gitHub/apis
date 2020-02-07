<?php 
    require 'db.php'; 
    $sql="SELECT name,image,id,price  FROM product where id in ( select Product_ID from product_cat where Cat_ID = ?) and   product.country in( select country from users where users.id = ?) ";
  
$stmt=$conn->prepare($sql);
$stmt->execute(array($_GET['cat'],$_GET['user_id']));
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=array();

for($i=0;$i<$size;$i++)
{
$message[$i]=array("name"=>$result[$i][0],"image"=>$result[$i][1],"id"=>$result[$i][2],"price"=>$result[$i][3]);

}
$message=json_encode($message);
 echo $message;

 //  result[i][0] = name of product
 //  result[i][1] = photo of the product 
//  result[i][2] = id of the product 
//  result[i][3] = price of the product 
?>  