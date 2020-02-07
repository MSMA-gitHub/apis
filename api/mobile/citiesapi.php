<?php 
        require 'db.php'; 
        $code =$_GET['code'];
        $sql="select city ,id from city where  countrycode= ".$code.";";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$result=$stmt->fetchAll();
    $size=$stmt->rowCount();
    
  
    $message=json_encode($result);
     echo $message;
    
  // result[i][0] = name of the city to be displayed
// result[i][1] = id of the country that will be sent to register api
  

        
    ?>