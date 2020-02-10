<?php 
        require '../db.php';
       // value sent to here by post method
       $sub =$_POST['sub']; 
        $name =$_POST['name'];  
        $file_get = $_FILES['image']['name'];
        $f=0;
        if(!empty($file_get))
         {
        $f=1;
        $temp = $_FILES['image']['tmp_name'];
        $file = "assets/adds/".$file_get; 
        move_uploaded_file($temp, "../".$file);
         }
      
    $sql="update  `subcategory` set categoryid =?, name=?";
    if($f==1)
      $sql.=",image='$file'";
    $sql.="where id= ?";
    $stmt=$conn->prepare($sql);
     $stmt->execute(array($sub,$name,$_POST['id']));
     header("location:../../pages/subcategory/subcategory.php");
  
    ?>
