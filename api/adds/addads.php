<?php 
        require '../db.php';
       // value sent to here by post method
       $store =$_POST['store']; 
        $branch =$_POST['branch']; 
        $product =$_POST['product'];  
        $start =$_POST['start'];
        $end =$_POST['end'];

        $file_get = $_FILES['image']['name'];
        $file="";
        if(!empty($file_get))
         {
        $temp = $_FILES['image']['tmp_name'];
        $file = "assets/adds/".$file_get; 
        move_uploaded_file($temp, "../".$file);
         }
         
         $sql="select countryid from store_branch where id=$branch";
         $stmt=$conn->prepare($sql);
         $stmt->execute();
        $result=$stmt->fetchAll()[0][0];
        $sql="insert into `addvertisement` values(?,?,?,?,?)";
        echo $sql;
	$stmt=$conn->prepare($sql);
    $stmt->execute(array(null,$product,$start,$end,$file));
    $sql="insert into `addvertisement_branch` values(?,?,?,?,?)";
    echo $sql;
    $stmt=$conn->prepare($sql);
$stmt->execute(array($conn->lastInsertId(),$result,$store,$branch,null));
     header("location:../../pages/ads/ads.php");
  
    ?>
