<?php 
        require 'db.php'; 
        $sql="select country,code,id from country";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$result=$stmt->fetchAll();
    $size=$stmt->rowCount();
    $message=json_encode($result);
     echo $message;
// result[i][0] = name of the country
// result[i][1] = code of the phone that will be displayed
// result[i][2] = id of the country that will be sent to cities api & register api
   
    ?>