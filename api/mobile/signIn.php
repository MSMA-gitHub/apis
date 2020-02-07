<?php 
        require 'db.php'; 

        $email =$_POST['email'];
       // echo json_encode("email is : ". $email);
        $pass =$_POST['pass'];
        $sql="select *  from users where  email= '".$email."' and pass= '".$pass."';";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
    $size=$stmt->rowCount();
    if($size>0)
       $r=$stmt->fetchAll();
       else
       $r=false;  
    $message=json_encode($r);
     echo $message;
    
  // true  or false 
      
    ?>