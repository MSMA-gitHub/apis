<?php 
        require '../db.php';
       // value sent to here by post method
       $name =$_POST['name']; 
        $tag =$_POST['tag']; 
        $file_get = $_FILES['image']['name'];
        $file="";
        if(!empty($file_get))
         {
        $temp = $_FILES['image']['tmp_name'];
        $file = "assets/store/".$file_get; 
        move_uploaded_file($temp, "../".$file);
         }
    $sql="insert into `store` values(?,?,?,?)";
    echo $sql;
    $stmt=$conn->prepare($sql);
$stmt->execute(array(null,$name,$file,$tag));
     header("location:../../pages/stores/stores.php");
  
    ?>
