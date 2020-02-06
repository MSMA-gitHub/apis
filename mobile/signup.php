<?php 
        require 'db.php';
       // value sent to here by post method
       try{
        $name =$_POST['name'];   
        $pass =$_POST['pass'];
        $email =$_POST['email'];
        $gender =$_POST['gender'];
        $countrycode =$_POST['countrycode'];
       // $citycode =$_POST['citycode'];
       // $phone =$_POST['phone'];
        $age=$_POST['age'];
        $countrycode = (Int)  $countrycode;
        $age = (Int)  $age;
        $gender = (Int)  $gender;
        $sql="insert into users  values (?,?,?,?,?,?,?,?,?,?);";
	$stmt=$conn->prepare($sql);
        $stmt->execute(array($name,$pass,null,$email,$gender,$countrycode,null,null,$age,null));
        echo json_encode(true);
       }
       catch (PDOException $e)
       {
        if(strpos($e->getmessage(), "for key 'email'") !== false )
        echo json_encode('duplicted');
        
       }
        
    ?>