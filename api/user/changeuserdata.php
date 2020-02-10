<?php 
echo'
<form id="user" action="../../pages/users/profile.php" method="POST"> <input type="hidden" name="id" value="'.$_POST['id'].'">
</form>';
        require '../db.php';
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
        if(empty($file_get))
         $u=0;
         else
         {
           $u=1;
        $temp = $_FILES['image']['tmp_name'];
        $file = "assets/user/".$file_get; 
        move_uploaded_file($temp, "../".$file);
         }

        $sql="UPDATE `users` SET `name`=?,`email`=?,`gender`=?,`country`=?,`city`=?,`phone`=?,`age`=? ";
        if($u==1)
         $sql .=",`picture`='$file' ";
        $sql .="WHERE  id=?;";
	$stmt=$conn->prepare($sql);
    $stmt->execute(array($name,$email,$gender,$country,$city,$number,$age,$id));
    // header("location:../pages/users/users.php");
  if($stmt->rowCount()>0)
     echo'<script> document.getElementById("user").submit();</script>';
     else
      echo '<script> alert("no updated data");
      document.getElementById("user").submit();
      </script>';
    ?>
