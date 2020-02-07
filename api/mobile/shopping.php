<?php 
    require 'db.php'; 
//send user id throw get request
$sql = "SELECT product.id, product.name,subcategory.name  FROM `product`  join product_cat on product.id=product_cat.Product_ID
inner join subcategory on product_cat.Cat_Id=subcategory.id where product.id in (select product from favorite_p where id=?)";
$stmt=$conn->prepare($sql);
$stmt->execute(array($_GET['user_id']));
$result=$stmt->fetchAll();
$size=$stmt->rowCount();
$message=json_encode($result);
 echo $message;
 //  result[i][0] = id of product
 //  result[i][1] = name of the product
  //  result[i][2] = name of the subcategory

?>