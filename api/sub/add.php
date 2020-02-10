<?php 
        require '../db.php';
       // value sent to here by post method
       $sub =$_POST['sub']; 
        $name =$_POST['name'];  
   

        $file_get = $_FILES['image']['name'];
        $file="";
        if(!empty($file_get))
         {
        $temp = $_FILES['image']['tmp_name'];
        $file = "assets/adds/".$file_get; 
        move_uploaded_file($temp, "../".$file);
         }
      
    $sql="insert into `subcategory` values(?,?,?,?)";
    $stmt=$conn->prepare($sql);
     $stmt->execute(array($sub,$name,null,$file));
     header("location:../../pages/subcategory/subcategory.php");
  
    ?>
