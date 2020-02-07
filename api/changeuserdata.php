<?php 
echo'
<form id="user" action="../pages/users/profile.php" method="POST"> <input type="hidden" name="id" value="'.$_POST['id'].'">
</form>';
        require 'db.php';
       // value sent to here by post method
        $name =$_POST['name']; 
        $email =$_POST['email'];  
        $number =(int)$_POST['number'];
        $gender =(int)$_POST['gender'];
        $country =(int)$_POST['country'];
        $city =(int)$_POST['city'];
        $age =(int)$_POST['age'];
        $id =(int)$_POST['id'];

        $file_get = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $file = "assets/user/".$file_get; 
        move_uploaded_file($temp, $file);


        $sql="UPDATE `users` SET `name`=?,`picture`=?,`email`=?,`gender`=?,`country`=?,`city`=?,`phone`=?,`age`=? WHERE  id=?;";
	$stmt=$conn->prepare($sql);
    $stmt->execute(array($name,$file,$email,$gender,$country,$city,$number,$age,$id));
    // header("location:../pages/users/users.php");
   if($stmt->rowCount()>0)
     echo'<script> document.getElementById("user").submit();</script>';
     else
      echo '<script> alert("no updated data")</script>';
    ?>
