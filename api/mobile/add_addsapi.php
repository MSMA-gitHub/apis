<?php 
        require 'db.php';
       // value sent to here by post method
        $name =$_POST['name'];   
        $user =(int)$_POST['user'];

        $file_get = $_FILES['front']['name'];
        $temp = $_FILES['front']['tmp_name'];
        $file = "../assets/front/".$file_get; 
        move_uploaded_file($temp, $file);

        $file_get = $_FILES['back']['name'];
        $temp = $_FILES['back']['tmp_name'];
        $file1 = "../assets/back/".$file_get; 
        move_uploaded_file($temp, $file1);

        $sql="insert into card  values (?,?,?,?);";
	$stmt=$conn->prepare($sql);
	$stmt->execute(array($user,$name,$file,$file1));

        
    ?>